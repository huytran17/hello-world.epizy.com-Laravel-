<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    protected $_post, $_cate;

    public function __construct(Post $post, Category $category)
    {
        $this->_post = $post;

        $this->_cate = $category;
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
    public function show($pid, $cate_slug, $post_slug)
    {
        if ($this->_cate->getBySlug($cate_slug)->exists() && $this->_post->getBySlug($post_slug)->exists() && $this->_post->getById($pid)->exists()) {

            $post = $this->_post->getById($pid)->with(['user', 'comments', 'category'])->withCount('comments')->first();

            $cates = $this->_cate->getSuggestCates(['id', 'slug', 'title'], 'desc', 5);

            $popular_posts = $this->_post->getPopularPosts('desc', 3);

            return view('client.post.show', [
                'post' => $post, 
                'cates' => $cates, 
                'popular_posts' => $popular_posts
            ]);
        }
        return abort(404);
    }

    public function newest(Request $rq)
    {
        $newest = $this->_post->withCount('comments')->latest()->get();

        return view('client.post.newest', ['newest' => $newest]);
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
    public function destroy($id)
    {
        //
    }

    public function search(Request $rq)
    {
        $search_result = $this->_post->getByKey($rq->key)->withCount('comments')->get();

        return view('client.post.newest', ['newest' => $search_result]);
    }

    public function searchTag(Request $rq)
    {
        $search_result = $this->_post->getByTag($rq->tag)->withCount('comments')->get();

        return view('client.post.newest', ['newest' => $search_result]);
    }
}
