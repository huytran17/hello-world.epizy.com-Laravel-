<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Requests\UserSubscribeRequest;
use App\Models\User;
use App\Http\Requests\UpdateAvatarRequest;
use App\Http\Requests\UpdatePwdRequest;
use App\Http\Requests\UpdateUsernameRequest;
use App\Services\EmailChangeService;
use App\Services\UploadFileService;
use App\Http\Requests\UpdateEmailRequest;

class UserController extends Controller
{
    protected $_user;

    public function __construct(User $user, UploadFileService $uploadFileService, EmailChangeService $emailChangeService)
    {
        $this->_user = $user;   

        $this->_uploadFileService = $uploadFileService;

        $this->_emailChangeService = $emailChangeService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $rq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function subscribe(UserSubscribeRequest $rq)
    {
        $this->_user->subscribe($rq->all());

        return view('notice', ['message' => 'Chúc mừng bạn đã đăng ký thành công dịch vụ nhận thông báo về bài viết mới nhất tại '.config('app.name', 'hello-world.epizy.com').'. Cảm ơn bạn đã quan tâm theo dõi, chúc bạn luôn mạnh khỏe và hạnh phúc!']);
    }

    public function updateAvatar(UpdateAvatarRequest $rq)
    {
        $user = $this->_user->getById($rq->id)->firstOrFail();

        $this->authorize('user.update', $user);

        $b64_img = $this->_uploadFileService->getBase64Image($rq->file('profile_photo_path'));

        $this->_user->updateUser($rq->id, [
            'profile_photo_path' => $b64_img,
        ]);

        return redirect()->back();
    }

    public function updateName(UpdateUsernameRequest $rq)
    {
        $user = $this->_user->getById($rq->id)->firstOrFail();

        $this->authorize('user.update', $user);

        $user->name = $rq->name;

        $user->slug = $rq->name;

        $user->save();

        return response()->axios([
            'error' => false
        ]);
    }

    public function updateEmail(UpdateEmailRequest $rq)
    {
        $user = $this->_user->getById($rq->id)->firstOrFail();

        $this->authorize('user.update', $user);

        if (!$this->_emailChangeService->isCurrentEmail($rq->email)) {
            $this->_emailChangeService->verify($rq->email);
        }
        
        return response()->axios([
            'error' => false
        ]);
    }

    public function changeEmail(Request $rq)
    {
        $user = $this->_user->getById($rq->id)->firstOrFail();

        $this->authorize('user.update', $user);

        $email = $this->_emailChangeService->getEmailToChange($rq->_token)->email_new;

        if ($this->_emailChangeService->checkPast(720)) return 'Yêu cầu đã hết hạn';

        $this->_user->updateUser(auth()->id(), ['email' => $email]);

        $this->_emailChangeService->destroyChangedEmail($this->_emailChangeService->getEmailToChange($rq->_token)->email);

        return redirect()->route('home');
    }

    public function updatePassword(UpdatePwdRequest $rq)
    {
        $user = $this->_user->getById($rq->id)->firstOrFail();

        $this->authorize('user.update', $user);

        $user->password = $rq->password;

        $user->save();

        return response()->axios([
            'error' => false
        ]);
    }

}
