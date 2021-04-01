<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

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
        return 0;
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
        $id = base64_decode($rq->id);

        return $this->_category->destroyCategory($id);
    }

    public function restore(Request $rq)
    {
        $id = base64_decode($rq->id);

        return $this->_category->restoreCategory($id);
    }

    public function forceDelete(Request $rq)
    {
        $id = base64_decode($rq->id);

        return $this->_category->forceDeleteCategory($id);
    }

    public function perform(Request $rq)
    {
        $val = $rq->operabox;

        switch ($val) {
            case 1:
                $this->destroy();
                break;
            case 2:
                $this->restore();
                break;
            case 3:
                $this->forceDelete();
                break;
            default:
                break;
        }
    }
}
