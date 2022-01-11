<ul class="dropdown-menu">
    @foreach($childMenuData as $child)
        @if($child->getChild->count()>0)
            <li class=" first">
                <a title="Kathmandu Car Rental"
                   href=""> {{$child->category_name}}
                    <b class="caret navbar-toggle sub-arrow"></b></a>

                @if($child->getChild->count()>0)
                    @include('frontend.layouts.menu-list',['childMenuData' => $child->getChild])
                @endif
            </li>
        @else
            <li><a href="">{{$child->category_name}}</a></li>
        @endif
    @endforeach
</ul>

