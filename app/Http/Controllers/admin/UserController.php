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

    public function VerifyEmail(Request $rq)
    {
        
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
                return $this->restore($rq);
                break;
            case 3:
                return $this->upgrade($rq);
                break;
            case 4:
                return $this->downgrade($rq);
                break;
            case 5:
                return $this->forceDelete($rq);
                break;
            default:
                break;
        }
    }
}
