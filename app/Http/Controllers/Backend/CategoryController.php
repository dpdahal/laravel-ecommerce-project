<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class CategoryController extends BackendController
{

    public function index(Request $request)
    {
        if (!empty($request->cat_parent_id)) {
            $this->date('categoryData', Category::where('parent_id', '=', $request->cat_parent_id)->get());
            return view($this->pagePath . 'category.index', $this->data);
        } else {
            $this->date('categoryData', Category::where('parent_id', '=', 0)->get());
            return view($this->pagePath . 'category.index', $this->data);
        }
    }


    public function create()
    {
        $parentData = Category::pluck('category_name', 'id');
        $this->date('parentCategory', $parentData);
        return view($this->pagePath . 'category.create', $this->data);
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'category_name' => 'required',
            'category_slug' => 'required|unique:categories,category_slug',
        ]);

        $catObject = new Category();
        $catObject->category_name = $request->category_name;
        $catObject->category_slug = Str::slug($request->category_slug);
        $catObject->meta_title = $request->meta_title;
        $catObject->meta_description = $request->meta_description;
        $catObject->parent_id = $request->parent_id ?? 0;
        $catObject->status = $request->status;
        $catObject->is_menu = $request->is_menu;
        $catObject->is_footer = $request->is_footer;
        $catObject->description = $request->description;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $imageName = md5(microtime()) . '.' . $ext;
            $uploadPath = public_path('uploads/category-image/');
            if (!$file->move($uploadPath, $imageName)) {
                return redirect()->back()->with('error', 'file upload errors');
            }
            $imagePath = 'uploads/category-image/' . $imageName;
            $catObject->image = $imagePath;
        }

        if ($catObject->save()) {
            return redirect()->route('admin-category.index')->with('success', 'Category was created');
        } else {
            return redirect()->back()->with('error', 'there was a problems');
        }

    }


    public function show($id)
    {
        $this->date('categoryData', Category::findOrFail($id));
        return view($this->pagePath . 'category.show', $this->data);

    }

    public function deleteImage($filePath)
    {

        $getFilePath = $filePath;
        if (file_exists($getFilePath) && is_file($getFilePath)) {
            unlink($getFilePath);
            return true;
        }
        return true;
    }


    public function edit($id)
    {

        $parentData = Category::pluck('category_name', 'id');
        $this->date('parentCategory', $parentData);
        $this->date('categoryData', Category::findOrFail($id));
        return view($this->pagePath . 'category.update', $this->data);
    }


    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'category_name' => 'required',
            'category_slug' => 'required|', [
                Rule::unique('categories', 'category_slug')->ignore($id)
            ],
        ]);

        $catObject = Category::findOrFail($id);
        $catObject->category_name = $request->category_name;
        $catObject->category_slug = Str::slug($request->category_slug);
        $catObject->meta_title = $request->meta_title;
        $catObject->meta_description = $request->meta_description;
        $catObject->parent_id = $request->parent_id ?? 0;
        $catObject->status = $request->status;
        $catObject->is_menu = $request->is_menu;
        $catObject->is_footer = $request->is_footer;
        $catObject->description = $request->description;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $imageName = md5(microtime()) . '.' . $ext;
            $uploadPath = public_path('uploads/category-image/');
            if ($this->deleteImage($catObject->image) && $file->move($uploadPath, $imageName)) {
                $imagePath = 'uploads/category-image/' . $imageName;
                $catObject->image = $imagePath;
            } else {
                return redirect()->back()->with('error', 'file upload errors');
            }

        }

        if ($catObject->save()) {
            return redirect()->route('admin-category.index')->with('success', 'Category was created');
        } else {
            return redirect()->back()->with('error', 'there was a problems');
        }
    }


    public function destroy($id)
    {
        //
    }
}
