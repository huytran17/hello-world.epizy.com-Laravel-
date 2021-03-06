<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $_cate, $_post;

    public function __construct(Category $cate, Post $post)
    {
        $this->_cate = $cate;

        $this->_post = $post;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cates = $this->_cate->getParent()->with(['user', 'children'])->withCount('children')->get();

        return view('client.category.index', ['cates' => $cates]);
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
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function showPost(Request $rq)
    {
        if ($this->_cate->isChildBelongsToParent($rq->slug_parent, $rq->slug_child)) {

            $posts = $this->_cate->getBySlug($rq->slug_child)->firstOrFail()->postsActive;

            return view('client.post.index', ['posts' => $posts]);
        }
        abort(404);
    }

    public function showChildren(Request $rq)
    {
        $cate = $this->_cate->getBySlug($rq->slug)->firstOrFail();

        return view('client.category.show-children', ['cate' => $cate]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
