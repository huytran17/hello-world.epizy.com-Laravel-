<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
        $this->authorize('user.view', auth()->user());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $rq)
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
    public function destroy(Request $rq)
    {
        $uid = base64_decode($rq->uid);

        return $this->_user->destroy();
    }

    public function restore(Request $rq)
    {
        $uid = base64_decode($rq->uid);

        return $this->_user->restore();
    }

    public function forceDelete(Request $rq)
    {
        $uid = base64_decode($rq->uid);

        return $this->_user->forceDelete();
    }

    public function upgrade(Request $rq)
    {
        $uid = base64_decode($rq->uid);

        return $this->_user->upgrade($uid);
    }

    public function downgrade(Request $rq)
    {
        $uid = base64_decode($rq->uid);

        return $this->_user->downgrade($uid);
    }

    public function perform(Request $rq)
    {
        $val = $rq->operabox;

        switch ($val) {
            case 1:
                $this->destroy();
                break;
            case 2:
                $this->upgrade();
                break;
            case 3:
                $this->downgrade();
                break;
            case 4:
                $this->restore();
                break;
            case 5:
                $this->forceDelete();
                break;
            default:
                break;
        }
    }
}
