<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
	public function __construct()
	{
		$this->middleware('guest', ['except' => 'logout']);
	}

    public function login(Request $rq)
    {   
        $credentials = $rq->only(['email', 'password']);

        $remember = $rq->remember_me ? true : false;

        if (Auth::viaRemember() or auth()->attempt($credentials, $remember)) {
            return $this->authenticated();
        }
        return redirect()->back()->withInput($credentials)->withErrors(['email' => 'Email hoặc mật khẩu không đúng']);
    }

    protected function authenticated()
	{
	 	return auth()->user()->isAdministrator() ? redirect()->route('admin.view.dashboard') : redirect()->intended('/');
	}
}
