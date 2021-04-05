<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    protected $_post, $_cate;

    public function __construct(Post $post, Category $cate)
    {
        $this->_post = $post;

        $this->_cate = $cate;
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
        $post = $this->_post->getById(base64_decode($rq->id))->firstOrFail();

        $this->authorize('post.update',$post);

        $parent_cates = $this->_cate->getParentWith(['id', 'title'])->get();

        return view('admin.post.edit',[
            'post'=>$post, 
            'parent_cates' => $parent_cates,
        ]);
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

        $this->_post->updatePost(base64_decode($rq->id), [
            '' => $b64
        ]);

        return response()->axios([
            'error' => false,
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
        // $post = $this->_post->getById(base64_decode($id))->firstOrFail();

        // $this->authorize('post.delete', $post);

        $this->_post->destroyPost($rq->id_arr);

        return response()->axios([
            'error' => false,
        ]);
    }
    
    public function restore(Request $rq)
    {
        $this->_post->restorePost($rq->id_arr);

        return response()->axios([
            'error' => false,
        ]);
    }

    public function forceDelete(Request $rq)
    {
        $this->_post->forceDeletePost($rq->id_arr);

        return response()->axios([
            'error' => false,
        ]);
    }

    public function perform(Request $rq)
    {
        $type =$rq->type;
        
      switch ($type) {
            case 1:
                return $this->destroy($rq);
                break;
            case 2:
                return $this->restore($rq);
                break;
            case 3:
                return $this->forceDelete($rq);
                break;
            default:
                // code...
                break;
        }  
    }
}
