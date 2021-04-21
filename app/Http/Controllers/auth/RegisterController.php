<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserRegisterRequest;
use App\Models\User;

class RegisterController extends Controller
{
	protected $_user;

    public function __construct(User $user)
    {
    	$this->_user = $user;    
    }

    public function register(UserRegisterRequest $rq)
    {
        $user = $this->_user->store([
            'name' => $rq->name,
            'email' => $rq->email,
            'slug' => $rq->name,
            'password' => $rq->password,
        ]);

        auth()->login($user);

        return redirect('/');
    }
}
