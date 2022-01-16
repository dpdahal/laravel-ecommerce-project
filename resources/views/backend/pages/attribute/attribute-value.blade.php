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
                            <h2><i class="fa fa-eye"></i> Manage Attribute Value</h2>
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
                                    <form action="" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">Attribute Value:
                                                <a href="">{{$errors->first('attribute_value')}}</a>
                                            </label>
                                            <input type="text" name="attribute_value" class="form-control" id="name">
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-success"> Add Attribute Value</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-12">
                                    <ul>
                                        @if($attributeValueData)
                                            @foreach($attributeValueData as $value)
                                                <li>{{$value->attribute_value}}</li>

                                            @endforeach
                                        @endif
                                    </ul>
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
