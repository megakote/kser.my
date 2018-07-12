<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use SimpleXMLElement;
use Storage;

use App\Models\Form;
use App\Models\Order;

class FormController extends Controller
{
    public function addForm(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'type' => 'required',
        ]);

        if ($validator->passes()) {
            $form = Form::create($request->all());
            return response()->json($this->sendTo1C($form));
        }

        return response()->json(['error' => $validator->errors()->all()]);
    }

    public function workStatus(Request $request)
    {
        if (Order::where('nomer', $request->id)->first()) {
            return response()->json(['success' => 'Есть такой']);
        }

        return response()->json(['error' => 'Данный номер не зарегистрирован, попробуйте позже']);
    }

    private function sendTo1C($form)
    {
        $text = '<?xml version="1.0" encoding="UTF-8"?>
                    <data>
                      <site>ксер.рф</site>
                    </data>';
        $text = html_entity_decode($text, ENT_NOQUOTES, 'UTF-8');
        $xml = new SimpleXMLElement($text);
        $sn = '00000' . time();
        $xml->sn = $sn;
        $xml->time = $form->created_at->format('h:m:s');
        $xml->date = $form->created_at->format('d.m.Y');


        if ($form->name)
            $xml->face = $form->name;
        if ($form->contacts['email'])
            $xml->email = $form->contact;
        if ($form->contacts['tel'])
            $xml->tele = $form->contact;
        if ($form->comment)
            $xml->order = $form->comment;

        $path = 'new_order/' . substr($sn, -5) . '_' . $form->type . '.xml';

        if (Storage::put($path, $xml->asXML())) {
            $sleepped = 0;
            sleep(1);
            while ($sleepped < 7) {
                $result = 'order_res/' . substr($sn, -5) . '.xml';

                if (file_exists($result)) {
                    $xml = Storage::get($result);
                    $arr = new SimpleXMLElement($xml);
                    $message = 'Сообдение №' . $arr->nomer . ' отправлено. Сотрудник компании свяжется с вами в течении 5-10 минут. Спасибо за Ваше обращение!';
                    return ['success' => $message];
                }
                sleep(1);
                $sleepped++;
            }
            // Не получен ответ от 1С
            return ['error' => 'К сожалению Ваше обращение не может быть доставлено сейчас. Напишите нам по эл.почте на адрес <a href="mailto:kser1@list.ru">kser1@list.ru</a>. Спасибо. Приносим свои извинения.'];
        } else {
            // Не удалось сохранить файл
            return ['error' => 'К сожалению Ваше обращение не может быть доставлено сейчас. Напишите нам по эл.почте на адрес <a href="mailto:kser1@list.ru">kser1@list.ru</a>. Спасибо. Приносим свои извинения.'];
        }
    }
}
