<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Form;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $data['feedback'] = Feedback::paginate(15);
        $data['all'] = Feedback::all()->count();
        $data['arithmetic'] = Feedback::all()->avg('stars');
        $stars = [];
        foreach (Feedback::all()->groupBy('stars') as $star => $collection) {
            $stars[$star] = ['count' => $collection->count(), 'percent' => ($collection->count() * 100) / $data['all'] ];

        }
        krsort($stars);
        $data['stars'] = $stars;
        return view('feedback', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Form::create([
            'type' => 9,
            'name' => $request->name,
            'contact' => $request->contact,
            'comment' => $request->body,

        ]);
        return redirect()->back()->with('status', 'Отзыв добавлен');
    }

}
