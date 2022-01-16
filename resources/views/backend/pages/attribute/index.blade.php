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
                            <h2><i class="fa fa-eye"></i> Manage Attribute</h2>
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
                                    @include('backend.layouts.message')
                                </div>
                                <div class="col-md-12">
                                    <form action="{{route('admin-attribute.store')}}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">Attribute Name:
                                                <a href="">{{$errors->first('attribute_name')}}</a>
                                            </label>
                                            <input type="text" name="attribute_name" class="form-control" id="name">
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-success"> Add Attribute</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-12">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>S.n</th>
                                            <th>Attribute Name</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($attributeData as $key=>$attribute)
                                            <tr>
                                                <td>{{++$key}}</td>
                                                <td>
                                                    {{$attribute->attribute_name}}

                                                </td>

                                                <td>
                                                    <form action="" method="post">
                                                        @csrf

                                                        <a href="{{route('admin-attribute.edit',$attribute->id)}}"
                                                           class="btn btn-primary">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <button class="btn btn-danger"><i class="fa fa-trash"></i>
                                                        </button>

                                                        <a href="{{route('add-attribute-value',$attribute->id)}}">Add Attribute Value</a>
                                                    </form>

                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
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
