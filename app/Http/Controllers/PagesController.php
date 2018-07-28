<?php

namespace App\Http\Controllers;

use App\Models\Contacts;
use App\Models\Feedback;
use App\Models\Form;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function contacts()
    {
        $data = [
            'contacts' => Contacts::all()
        ];
        return view('contacts', $data);
    }

    public function about()
    {
        $data = [];
        return view('about', $data);
    }

}
