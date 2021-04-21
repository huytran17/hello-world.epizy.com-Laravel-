<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\EmailChange;
use Illuminate\Support\Str;
use App\Mail\UserChangeEmail;
use Mail;

class EmailChangeService {

    private $_emailChange, $_token;

    public function __construct(EmailChange $emailChange)
    {
        $this->_emailChange = $emailChange;

        $this->_token = Str::random(25);
    }

    public function verify($email_new)
    {
        $this->storeEmailChange($email_new);

        $this->sendVerifyMail($email_new);
    } 

    public function sendVerifyMail($email_new)
    {
        Mail::to($email_new, $this->_token)->send(new UserChangeEmail($this->_token));
    }

    public function storeEmailChange($email_new)
    {
        return $this->_emailChange->store([
            'email' => auth()->user()->email,
            'token' => $this->_token,
            'email_new' => $email_new
        ]);
    }

    public function destroyChangedEmail($email)
    {
        return $this->_emailChange->destroyByEmail($email);
    }

    public function getEmailToChange($token)
    {
        return $this->_emailChange->getByToken($token)->firstOrFail();
    }

    public function checkPast($minute)
    {
        return Carbon::parse($this->_emailChange->getByEmail(auth()->user()->email)->firstOrFail()->created_at)->addMinutes($minute)->isPast();
    }

    public function isCurrentEmail($email_new)
    {
        return auth()->user()->email==$email_new;
    }
}