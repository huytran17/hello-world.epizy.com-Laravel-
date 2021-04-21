<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\UserCommentRequest;
use App\Http\Requests\UserReplyCommentRequest;

class CommentController extends Controller
{
    protected $_cmt;

    public function __construct(Comment $cmt)
    {
        $this->_cmt = $cmt;
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }

    public function store(UserCommentRequest $rq)
    {
        $this->_cmt->createComment([
            'content' => $rq->content,
            'user_id' => auth()->id(),
            'post_id' => $rq->pid
        ]);

        return redirect()->back();
    }

    public function reply(UserReplyCommentRequest $rq)
    {
        $this->_cmt->createComment([
            'content' => $rq->content_rep,
            'user_id' => auth()->id(),
            'post_id' => $rq->pid,
            'parent_id' => $rq->id
        ]);

        return redirect()->back();
    }
}
