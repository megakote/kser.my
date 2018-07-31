<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\User;
use Carbon\Carbon;
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
//        $validator = Validator::make($request->all(), [
//            'type' => 'required',
//        ]);
//
//        if ($validator->passes()) {

        $form = Form::create($request->all());
        return response()->json($this->convertForm($form));

//        }

//        return response()->json(['error' => $validator->errors()->all()]);
    }

    public function addFeedback(Request $request)
    {

        $form = Feedback::create([
            'name' => $request->name,
            'body' => $request->body . ' ' .$request->contact,
            'stars' => $request->stars
        ]);
        Form::create([
            'type' => 9,
            'name' => $request->name,
            'contact' => $request->contact,
            'comment' => $request->body,
        ]);
        return response()->json($this->convertFeedback($form));
    }

    public function workStatus(Request $request)
    {
        if (Order::where('nomer', $request->id)->first()) {
            return response()->json(['success' => 'Есть такой']);
        }

        return response()->json(['error' => 'Данный номер не зарегистрирован, попробуйте позже']);
    }

    public function createOrder(Request $request)
    {

        $data = $request->all();
        $user = User::find($data['id']);
        $text = '<?xml version="1.0" encoding="UTF-8"?>
                    <data>
                      <site>ксер.рф</site>
                    </data>';
        $text = html_entity_decode($text, ENT_NOQUOTES, 'UTF-8');
        $xml = new SimpleXMLElement($text);
        $sn = '00000' . time();
        $xml->sn = $sn;
        $xml->date = Carbon::now()->format('d.m.Y');
        $xml->time = Carbon::now()->format('H:m:s');
        $xml->id_client = $user->client->id;
        $xml->name_client = $user->client->faces()->find($data['face'])->name;
        $xml->face = $user->client->faces()->find($data['face'])->name;
        $xml->name_dop = '';
        $xml->id_dop = '';
        $xml->tele = $data['tel'];
        $xml->tele2 = $data['mob_tel'];
        $xml->email = $data['email'];
        $xml->id_order = '';
        $xml->messages = $data['comment'];
        $xml->street = $data['address'];


        $xml->order = "Создана завявка в ЛК. в Офис логин: $data[office] на работы: $data[works], аппарат(ы): $data[apparat] желаемая дата с $data[date_from] по $data[date_to]";;

        Form::create([
            'type'    => $data['type'],
            'name'    => $xml->name_client,
            'contact' => $data['email'] ? $data['email'] : $data['tel'],
            'comment' => $data['comment']
        ]);


        return $this->sendTo1C($xml, $data['type']);
    }

    private function convertForm($form)
    {
        $text = '<?xml version="1.0" encoding="UTF-8"?>
                    <data>
                      <site>ксер.рф</site>
                    </data>';
        $text = html_entity_decode($text, ENT_NOQUOTES, 'UTF-8');
        $xml = new SimpleXMLElement($text);
        $sn = '00000' . time();
        $xml->sn = $sn;

        $xml->date = $form->created_at->format('d.m.Y');
        $xml->time = $form->created_at->format('H:m:s');


        if ($form->name)
            $xml->face = $form->name;
        if ($form->contacts['email'])
            $xml->email = $form->contact;
        if ($form->contacts['tel'])
            $xml->tele = $form->contact;
        if ($form->comment)
            $xml->order = $form->comment;
        if ($form->description)
            $xml->type = $form->description;

        return $this->sendTo1C($xml, $form->type);
    }
    private function convertFeedback($form)
    {
        $text = '<?xml version="1.0" encoding="UTF-8"?>
                    <data>
                      <site>Сервиспринт.рф</site>
                    </data>';
        $text = html_entity_decode($text, ENT_NOQUOTES, 'UTF-8');
        $xml = new SimpleXMLElement($text);
        $sn = '00000' . time();
        $xml->sn = $sn;

        $xml->date = $form->created_at->format('d.m.Y');
        $xml->time = $form->created_at->format('H:m:s');


        $xml->order = " Имя: $form->name \n Звезд: $form->stars \n Текст отзыва: $form->body \n Ссылка на отзыв: http://www.xn----ctbinb4ameeder.xn--p1ai/admin/feedback/$form->id/edit";

        return $this->sendTo1C($xml, 9);
    }

    private function sendTo1C($xml, $type)
    {
        //Storage::delete(Storage::files('new_order'));
        //Storage::delete(Storage::files('order_res'));

        $path = 'new_order/' . substr($xml->sn, -5) . '_' . $type . '.xml';

        if (Storage::put($path, $xml->asXML())) {
            $sleepped = 0;
            sleep(1);
            while ($sleepped < 15) {
                $result = 'order_res/' . $xml->sn . '.xml';

                if (Storage::exists($result)) {
                    $xml = Storage::get($result);
                    $arr = new SimpleXMLElement($xml);
                    $message = str_replace(" ", "", $arr->nomer);
                    return ['success' => $message];
                }
                sleep(1);
                $sleepped++;
            }
            // Не получен ответ от 1С
            return ['error' => ' К сожалению Ваше обращение не может быть доставлено сейчас. Пожалуйста, напишите нам по эл.почте по адресу  <a href="mailto:abc@print.ru" style="font-size: 18px;">abc@print.ru</a> или позвоните по телефону <a href="tel:88001006550" style="font-size: 18px;">8(800) 100-65-50</a>. Спасибо. Приносим свои извинения.'];
        } else {
            // Не удалось сохранить файл
            return ['error' => ' К сожалению Ваше обращение не может быть доставлено сейчас. Пожалуйста, напишите нам по эл.почте по адресу  <a href="mailto:abc@print.ru" style="font-size: 18px;">abc@print.ru</a> или позвоните по телефону <a href="tel:88001006550" style="font-size: 18px;">8(800) 100-65-50</a>. Спасибо. Приносим свои извинения.'];
        }
    }
}
