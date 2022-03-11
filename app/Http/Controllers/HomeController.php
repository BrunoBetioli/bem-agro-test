<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() 
    {
        $homeActive = ' active';

        return view('home.index')
                    ->with('homeActive', $homeActive)
                    ->with('namePage', 'Home');
    }
}
