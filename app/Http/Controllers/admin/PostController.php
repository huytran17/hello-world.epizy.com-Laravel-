<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Requests\UpdateThumbnailPostRequest;
use App\Services\UploadFileService;

class PostController extends Controller
{
    protected $_post, $_cate;

    public function __construct(Post $post, Category $cate, UploadFileService $uploadFileService)
    {
        $this->_post = $post;

        $this->_cate = $cate;

        $this->_uploadFileService = $uploadFileService;
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
        $parentCates = $this->_cate->getParentHasChildWith(['id', 'title'])->get();

        $childCates = $this->_cate->getChildWith(['id', 'title'], $parentCates->first()->id)->get();

        return view("admin.post.create")->with([
            'parent_cates' => $parentCates,
            'child_cates' => $childCates
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(CreatePostRequest $rq)
    {
        $this->_post->store($rq->all());

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
        $post = $this->_post->getById($rq->id)->with(['category'])->firstOrFail();

        $this->authorize('post.update',$post);

        $parent_cates = $this->_cate->getParentHasChildWith(['id', 'title'])->get();

        $child_cates = $this->_cate->getChildWith(['id', 'title'], $post->category->parent->id)->get();

        return view('admin.post.edit',[
            'post'=>$post, 
            'parent_cates' => $parent_cates,
            'child_cates' => $child_cates
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
        //$post = $this->_post->getById(base64_decode($rq->id))->firstOrFail();

        //$this->authorize('post.update', $post);

        $this->_post->updatePost($rq->id, $rq->all());

        return response()->axios([
            'error' => false
        ]);
    }

    public function updateThumbnail(UpdateThumbnailPostRequest $rq)
    {
        //$post = $this->_post->getById(base64_decode($rq->id))->firstOrFail();

        //$this->authorize('post.update', $post);

        $b64_img = $this->_uploadFileService->getBase64Image($rq->file('thumbnail_photo_path'));

        $this->_post->updatePost($rq->id, [
            'thumbnail_photo_path' => $b64_img,
        ]);

        return redirect()->back();
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
