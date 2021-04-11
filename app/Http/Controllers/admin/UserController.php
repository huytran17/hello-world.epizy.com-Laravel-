<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateAvatarRequest;
use App\Http\Requests\UpdateUsernameRequest;
use App\Http\Requests\UpdateEmailRequest;
use App\Http\Requests\UpdatePwdRequest;
use App\Services\UploadFileService;
use App\Services\EmailChangeService;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    const UPDATE_AVATAR = 0, UPDATE_EMAIL = 1, UPDATE_PWD = 2;

    protected $_user, $_uploadFileService, $_emailChange;

    public function __construct(User $user, EmailChangeService $emailChangeService, UploadFileService $uploadFileService)
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
        return view('admin.user-panel');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $rq)
    {
        $this->_user->store($rq->except('repass'));

        return response()->axios([
            'error' => false
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $rq)
    {
        $user = $this->_user->getById($rq->id)->firstOrFail();

        return view('admin.user.show-user',['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $rq)
    {
        $user = $this->_user->getById($rq->id)->firstOrFail();

        $this->authorize('user.update', $user);

        return view('admin.user.edit',['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

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

        return redirect()->route('admin.view.dashboard');
    }

    public function VerifyEmail(Request $rq)
    {
        
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $rq)
    {
        $this->_user->destroyUser($rq->id_arr);

        return response()->axios([
            'error' => false,
        ]);
    }

    public function restore(Request $rq)
    {
        $this->_user->restoreUser($rq->id_arr);

        return response()->axios([
            'error' => false,
        ]);
    }

    public function forceDelete(Request $rq)
    {

        $this->_user->forceDeleteUser($rq->id_arr);

        return response()->axios([
            'error' => false,
        ]);
    }

    public function upgrade(Request $rq)
    {
        // $uid = base64_decode($rq->uid);

        $this->_user->upgrade($rq->id_arr);

        return response()->json([
            'error' => false,
        ]);
    }

    public function downgrade(Request $rq)
    {
        // $uid = base64_decode($rq->uid);

        $this->_user->downgrade($rq->id_arr);

        return response()->axios([
            'error' => false,
        ]);

    }

    public function perform(Request $rq)
    {
        $type = $rq->type;
      
        switch ($type) {
            case 1:
                return $this->destroy($rq);
                break;
            case 2:
                return $this->upgrade($rq);
                break;
            case 3:
                return $this->downgrade($rq);
                break;
            case 4:
                return $this->restore($rq);
                break;
            case 5:
                return $this->forceDelete($rq);
                break;
            default:
                break;
        }
    }
}
