<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends MainController
{
    public function index()
    {
    	return view('index');
    }
}
