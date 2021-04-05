<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;

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
    public function update(UpdateUserRequest $rq)
    {
        $user = $this->_user->getById(base64_decode($rq->id))->firstOrFail();

        $this->authorize('user.update', $user);

        $user->updateUser($rq->except(['repass', '_token']));

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
