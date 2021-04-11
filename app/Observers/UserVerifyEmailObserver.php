<?php

namespace App\Observers;

use App\Models\User;

use Mail;
use Illuminate\Support\Str;
use App\Mail\UserVerifyEmail;
class UserVerifyEmailObserver
{
    // public $token;

    // public function __construct()
    // {
    //     $this->token = Str::random(25);
    // }
    /**
     * Handle the User "created" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function created(User $user)
    {

        Mail::to($user->email)->send(new UserVerifyEmail());
    }
}
