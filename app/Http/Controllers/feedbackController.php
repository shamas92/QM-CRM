<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\feedback;


class feedbackController extends Controller
{
    function feedbacklist()

    {
        $data = feedback::all();
        return view('pages.app.feedbacks', ["feedbacks" => $data]);
    }
}
