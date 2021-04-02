<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\CreateUserRequest;

class UserController extends Controller
{
    protected $_user;

    public function __construct(User $user)
    {
        $this->_user = $user;
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
        return $this->_user->store($rq->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show(Request $rq)
    // {
    //     $user = $this->_user->getById(base64_decode($rq->id))->firstOrFail();

    //     $this->authorize('user.view', $user);

    //     return view('admin.user.show',['user'=>$user]);
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $rq)
    {
        $user = $this->_user->getById(base64_decode($rq->id))->firstOrFail();

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
    public function update(Request $rq)
    {
        $user = $this->_user->getById(base64_decode($rq->id))->firstOrFail();

        $this->authorize('user.update', $user);

        return $user->updateUser($rq->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($uid)
    {
        // $uid = base64_decode($rq->uid);

        $user = $this->_user->getById($uid)->firstOrFail();

        $this->authorize('user.delete', $user);

        return $this->_user->destroyUser($user);
    }

    public function restore($uid)
    {
        // $uid = base64_decode($rq->uid);

        $user = $this->_user->getById($uid)->firstOrFail();

        $this->authorize('user.restore', $user);

        return $this->_user->restoreUser($user);
    }

    public function forceDelete($uid)
    {
        // $uid = base64_decode($rq->uid);

        $user = $this->_user->getById($uid)->firstOrFail();

        $this->authorize('user.forceDelete', $user);

        return $this->_user->forceDeleteUser($user);
    }

    public function upgrade($uid)
    {
        // $uid = base64_decode($rq->uid);

        return $this->_user->upgrade($uid);
    }

    public function downgrade($uid)
    {
        // $uid = base64_decode($rq->uid);

        return $this->_user->downgrade($uid);
    }

    public function perform(Request $rq)
    {
        $val = $rq->operabox;
        $id = base64_decode($rq->id);
        switch ($val) {
            case 1:
                $this->destroy($id);
                break;
            case 2:
                $this->upgrade($id);
                break;
            case 3:
                $this->downgrade($id);
                break;
            case 4:
                $this->restore($id);
                break;
            case 5:
                $this->forceDelete($id);
                break;
            default:
                break;
        }
    }
}
