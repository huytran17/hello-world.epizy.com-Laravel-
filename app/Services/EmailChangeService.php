<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\EmailChange;
use Illuminate\Support\Str;
use App\Mail\UserChangeEmail;

class EmailChangeService {

    private $_emailChange, $_token;

    public function __construct(EmailChange $emailChange)
    {
        $this->_emailChange = $emailChange;

        $this->_token = Str::random(10);
    }

    public function verify($email_new)
    {
        $this->storeEmailChange($email_new);

        $this->sendVerifyMail();
    } 

    public function sendVerifyMail()
    {
        Mail::to(auth()->user()->email, $this->_token)->send(new UserChangeEmail($this->_token));
    }

    public function storeEmailChange($email_new)
    {
        return $this->_emailChange->store([
            'email' => auth()->user()->email,
            'token' => $this->_token,
            'email_new' => $email_new
        ]);
    }

    public function getEmailToChange($token)
    {
        return $this->_emailChange->getByToken($token)->firstOrFail()->email_new;
    }

    public function checkPast($minute)
    {
        return Carbon::parse($this->_emailChange->getByEmail(auth()->user()->created_at))->addMinutes($minute)->isPast();
    }

    public function isCurrentEmail($email_new)
    {
        return auth()->user()->email==$email_new ? true : false;
    }
}