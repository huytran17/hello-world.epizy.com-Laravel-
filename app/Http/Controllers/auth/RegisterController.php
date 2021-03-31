<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserRegisterRequest;
use App\Models\User;

class RegisterController extends Controller
{
	protected $user;

    public function __construct(User $user)
    {
    	$this->user = $user;    
    }

    public function register(UserRegisterRequest $rq)
    {
        $user = $this->user->createUser([
            'name' => $rq->name,
            'email' => $rq->email,
            'slug' => $rq->name,
            'password' => $this->user->makeHash($rq->password),
        ]);

        auth()->login($user);

        return redirect('/');
    }
}
