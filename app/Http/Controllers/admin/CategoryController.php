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
        $uid = base64_decode($rq->uid);

        return $this->_category->destroy($uid);
    }

    public function restore(Request $rq)
    {
        $uid = base64_decode($rq->uid);

        return $this->_category->restore($uid);
    }

    public function forceDelete(Request $rq)
    {
        $uid = base64_decode($rq->uid);

        return $this->_category->forceDelete($uid);
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
