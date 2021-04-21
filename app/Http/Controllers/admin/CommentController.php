<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    protected $_comment;

    public function __construct(Comment $comment)
    {
        $this->_comment = $comment;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.comment-panel');
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
    public function show($id)
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
    public function destroy(Request $rq)
    {
        $comment = $this->_comment->getById($rq->id);

        $this->authorize('comment.delete', $comment);

        return $this->_comment->destroyComment($comment);
    }

    public function forceDelete(Request $rq)
    {
        $comment = $this->_comment->getById($rq->id);

        $this->authorize('comment.forceDelete', $comment);

        return $this->_comment->forceDeleteComment($comment);
    }

    public function restore(Request $rq)
    {
        $comment = $this->_comment->getById($rq->id);

        $this->authorize('comment.restore', $comment);

        return $this->_comment->restoreComment($comment);
    }
}
