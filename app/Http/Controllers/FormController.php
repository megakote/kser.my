<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

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
            Form::create($request->all());
            return response()->json(['success'=>'Added new records.']);
        }

        return response()->json(['error'=>$validator->errors()->all()]);
    }

    public function workStatus(Request $request)
    {
        if (Order::where('nomer', $request->id)->first()) {
            return response()->json(['success'=>'Есть такой']);
        }

        return response()->json(['error'=> 'Данный номер не зарегистрирован, попробуйте позже']);
    }
}
