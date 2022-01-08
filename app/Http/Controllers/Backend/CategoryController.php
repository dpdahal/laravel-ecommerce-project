<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends BackendController
{

    public function index()
    {

        $this->date('categoryData', Category::all());
        return view($this->pagePath . 'category.index', $this->data);
    }


    public function create()
    {
        $parentData = Category::pluck('category_name', 'id');
        $this->date('parentCategory',$parentData);
        return view($this->pagePath . 'category.create', $this->data);
    }


    public function store(Request $request)
    {
        dd($request->all());
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
