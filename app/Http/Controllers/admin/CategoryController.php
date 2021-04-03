<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;

class CategoryController extends Controller
{
    protected $_category;

    public function __construct(Category $category)
    {
        $this->_category = $category;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.category-panel');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $rq)
    {
        return $this->_category->store($rq->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $rq)
    {
        $cate = $this->_category->getById(base64_decode($rq->id))->with(['children', 'posts'])->firstOrFail();

        return view('admin.category.show', ['cate' => $cate]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $rq)
    {
        $cate = $this->_category->getById(base64_decode($rq->id))->firstOrFail();

        $this->authorize('category.update', $cate);

        $parents = $this->_category->getParentWith(['id', 'title'])->get();

        return view('admin.category.edit', ['cate' => $cate, 'parents' => $parents]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $rq)
    {
        $cate = $this->_category->getById(base64_decode($rq->id))->firstOrFail();

        $this->authorize('category.update', $cate);

        return $cate->updateCategory($rq->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $rq)
    {
        return $this->_category->destroyCategory($rq->id);
    }

    public function restore($id)
    {
        $cate = $this->_category->getById($id)->firstOrFail();

        return $this->_category->restoreCategory($cate);
    }

    public function forceDelete($id)
    {
        $cate = $this->_category->getById($id)->firstOrFail();

        return $this->_category->forceDeleteCategory($cate);
    }

    public function perform(Request $rq)
    {
        $val = $rq->operabox;

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
                break;
        }
    }
}
