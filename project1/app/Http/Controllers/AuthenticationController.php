<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Person;

class AuthenticationController extends Controller {

    public function login(Request $request) {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            session(['login' => 'yes']);
            return redirect('/');
        }
    }

    public function logout(Request $request) {
        $request->session()->flush();
        return redirect('/');
    }
}