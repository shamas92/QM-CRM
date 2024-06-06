<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\resolution;


class resolutionController extends Controller
{
    //
    function tasklist()

    {
        $data = resolution::all();

        return view('pages.app.resolutions', ["tasklist" => $data]);
    }
}
