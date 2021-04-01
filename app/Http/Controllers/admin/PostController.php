<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    protected $_post;

    public function __construct(Post $post)
    {
        $this->_post = $post;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.post-panel');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.post.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show(Request $rq)
    // {
        
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $rq)
    {
        $post = $this->_post->getById(base64_decode($rq->id));

        $this->authorize('post.update',$post);

        return view('admin.post.edit',['$post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $rq)
    {
        $post = $this->_post->getById(base64_decode($rq->id))->firstOrFail();

        $this->authorize('post.update', $post);

        return $post->updatePost($rq->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = $this->_post->getById(base64_decode($id));

        $this->authorize('post.delete', $post);

        return $this->_post->destroyPost();
    }
    
    public function restore($id)
    {
        $post = $this->_post->getById(base64_decode($id));

        $this->authorize('post.restore', $post);

        return $this->_post->restorePost();
    }

    public function forceDelete($id)
    {
        $post = $this->_post->getById(base64_decode($id));

        $this->authorize('post.forceDelete', $post);

        return $this->_post->forceDeletePost();
    }

    public function perform(Request $rq)
    {
        $val =$rq->operabox;
        $id = base64_decode($rq->id);
      switch ($val) {
            case 1:
                $this->destroy($id);
                break;
            case 2:
                $this->restore($id);
                break;
            case 3:
                $this->forceDelete($id);
                break;
            default:
                // code...
                break;
        }  
    }
}
