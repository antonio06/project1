<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller {
    
    public function main(Request $request) {

        if (Auth::check()) {
            return View::make('main');
        } else {
            return View::make('login');
        }
    }
}
