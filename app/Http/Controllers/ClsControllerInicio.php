<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClsControllerInicio extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function fncMostrarInicio()
    {
        return view('home');
    }
}
