<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorController extends Controller
{
    public function RouteNotFound()
    {
        return view('errors.routenotfound');
    }

}
