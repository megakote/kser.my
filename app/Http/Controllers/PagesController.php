<?php

namespace App\Http\Controllers;

use App\Models\Contacts;
use App\Models\AboutPageSection;
use App\Models\AboutPageAchievement;
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
        $data['sections'] = AboutPageSection::all();
        $data['achievements'] = AboutPageAchievement::all();
        return view('about', $data);
    }

}
