@extends('backend.master.master')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2><i class="fa fa-plus"></i> Add New Category</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                       aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Settings 1</a>
                                        <a class="dropdown-item" href="#">Settings 2</a>
                                    </div>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="{{route('admin-category.store')}}" method="post"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label for="category_name">Category Name:
                                                        <a style="color: red;text-decoration: none;">
                                                            {{$errors->first('category_name')}}
                                                        </a>
                                                    </label>
                                                    <input type="text" name="category_name" class="form-control"
                                                           id="category_name"
                                                           value="{{old('category_name')}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="category_slug">Category Slug:
                                                        <a style="color: red;text-decoration: none;">
                                                            {{$errors->first('category_slug')}}
                                                        </a>
                                                    </label>
                                                    <input type="text" name="category_slug" class="form-control"
                                                           id="category_slug"
                                                           value="{{old('category_slug')}}">
                                                </div>

                                                <div class="form-group">
                                                    <label for="meta_title">Meta Title:
                                                        <a style="color: red;text-decoration: none;">
                                                            {{$errors->first('meta_title')}}
                                                        </a>
                                                    </label>
                                                    <textarea id="meta_title" class="form-control" rows="3"
                                                              name="meta_title">{{old('meta_title')}}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="meta_description">Meta Description:
                                                        <a style="color: red;text-decoration: none;">
                                                            {{$errors->first('meta_description')}}
                                                        </a>
                                                    </label>
                                                    <textarea id="meta_description" class="form-control" rows="3"
                                                              name="meta_description">{{old('meta_description')}}</textarea>
                                                </div>

                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="parent_id">Parent</label>
                                                    <select name="parent_id" id="parent_id" class="form-control">
                                                        <option value="" selected readonly>---Select Parent---</option>
                                                        @foreach($parentCategory as $key=>$value)
                                                            <option value="{{$key}}">{{$value}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="status">Status</label>
                                                    <select name="status" id="status" class="form-control">
                                                        <option value="1">Public</option>
                                                        <option value="0">Draft</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="is_menu">Is Menu</label>
                                                    <select name="is_menu" id="is_menu" class="form-control">
                                                        <option value="0">No</option>
                                                        <option value="1">Yes</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="is_footer">Is Footer</label>
                                                    <select name="is_footer" id="is_footer" class="form-control">
                                                        <option value="0">No</option>
                                                        <option value="1">Yes</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="image">Image</label> <br>
                                                    <input type="file" class="btn btn-default">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="description_id">Description</label>
                                            <textarea name="description"
                                                      class="form-control"
                                                      id="description_id">{{old('description')}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-success">
                                                <i class="fa fa-plus"></i> Add Category
                                            </button>
                                        </div>


                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
@endsection
