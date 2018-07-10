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

        $text = '<?xml version="1.0" encoding="WINDOWS-1251"?>
                    <data>
                      <site>ксер.рф</site>
                    </data>';

        $xml = new SimpleXMLElement($text);

        $xml->sn = substr('00000' . time(), -5);
        $xml->time = $form->created_at->format('h:m:s');
        $xml->date = $form->created_at->format('Y.m.d');


        if ($form->name)
            $xml->date = $form->name;
        if ($form->contact)
            $xml->email = $form->contact;
        if ($form->comment)
            $xml->text = $form->comment;

        $path = env('FILES_EXCHANGE') . 'forms/' . time() . '_' . $form->type . '.xml';


        if (Storage::put($path, $xml->asXML())) {
            $sleepped = 0;
            sleep(1);
            while ($sleepped < 7) {
                $result = env('FILES_EXCHANGE') . 'order_res/' . $form->type . '.xml';

                if (file_exists($result)) {
                    $response = file_get_contents($result);
                    $xml = @file_get_contents($result);
                    $arr = @simplexml_load_string($xml);
                    $message = 'Сообдение №' . $arr->nomer . ' отправлено. Сотрудник компании свяжется с вами в течении 5-10 минут. Спасибо за Ваше обращение!';
                    return ['success' => 'Added new records.'];
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
