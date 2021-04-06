<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
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

        $b64_img = $post->thumbnail_photo_path;

        if ($rq->hasFile('thumbnail_photo_path')) {
            $b64_img = $this->_uploadFileService->getBase64Image($rq->file('thumbnail_photo_path'));
        }
        
        $this->_post->updatePost(base64_decode($rq->id), [
            'title' => $rq->title,
            'description' => $rq->description,
            'content' => $rq->content,
            'thumbnail_photo_path' => $b64_img,
            'meta_data' => [
                'keywords' => $rq->keywords,
                'source' => $rq->source,
                'view' => $post->meta_data->view
            ],
            'category_id' => 2,
            'user_id' => $post->user->id
        ]);

        return redirect()->back();
    }

    public function updateThumbnail(Request $rq)
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
