<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NegocioController extends Controller
{
    public function check(Request $request)
    {
        if ($request->user()->can('ver-negocio')) {

        dd('You can only see this page if you are logged in and subscribe to the monthly plane');
        }
    }
}
