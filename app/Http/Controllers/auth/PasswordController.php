<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\EmailResetPasswordRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Models\PasswordReset;
use App\Models\User;
use Illuminate\Support\Str;
use Mail;
use App\Mail\ResetPasswordEmail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
	protected $_pwdreset;

	public function __construct(User $user, PasswordReset $pwdreset)
	{
	    $this->_pwdreset = $pwdreset;

	    $this->_user = $user;
	}

    public function forgotPassword(Request $rq)
    {
        return view('auth.email');
    }

    public function passwordEmail(EmailResetPasswordRequest $rq)
    {
        $token = Str::random(20);

        $this->_pwdreset->createPasswordReset(['email' => $rq->email, 'token' => $token]);

        $this->sendMailToUser($rq->email, $token);

        return view('email.verify');
    }

    public function sendMailToUser($email, $token)
    {
        Mail::to($email, $token)->send(new ResetPasswordEmail($token));
    }

    public function resetPasswordForm(Request $rq, $token)
    {
        $pr = $this->_pwdreset->getByToken($token);

        if ($this->checkPast($pr->updated_at, 720)) {
            $pr->delete();
            return 'Yêu cầu đã hết hạn';
        }

        return view('auth.reset-password')->with('token', $token);
    }

    public function resendResetPasswordEmail(Request $rq)
    {
        return $this->forgotPassword($rq);
    }

    public function resetPassword(ResetPasswordRequest $rq, $token)
    {
        $pr = $this->_pwdreset->getByToken($token);

        $user = $this->_user->getByEmail($pr->email)->firstOrFail();

        $user->updateUser($user->id, [
            'password' => Hash::make($rq->password),
        ]);

        $pr->delete();

        return redirect()->route('login');
    }

    public function checkPast($time, $minute)
    {
        return Carbon::parse($time)->addMinutes($minute)->isPast();
    }
}
