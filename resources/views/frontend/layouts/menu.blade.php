@section('menu')
    <!-- menu -->
    <section id="menu">
        <div class="container">
            <div class="menu-area">
                <!-- Navbar -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="navbar-collapse collapse">
                        <!-- Left nav -->
                        <ul class="nav navbar-nav">
                            <li><a href="{{route('index')}}">Home</a></li>
                            @foreach($categoryData as $category)
                                @if($category->getChild->count()>0)
                                    <li><a href="#">{{$category->category_name}} <span class="caret"></span></a>
                                        @if($category->getChild->count()>0)
                                            @include('frontend.layouts.menu-list',['childMenuData' => $category->getChild])
                                        @endif
                                    </li>
                                @else
                                    <li><a href="">{{$category->category_name}}</a></li>
                                @endif
                            @endforeach

                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>
    </section>
    <!-- / menu -->

@endsection
