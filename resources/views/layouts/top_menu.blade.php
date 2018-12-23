@foreach($categories as $category)

    @if($category->children->where('published', 1)->count())

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="{{url("/blog/category/$category->slug")}}" role="button" aria-haspopup="true"
               aria-expanded="false">
                {{$category->title}}
            </a>
            <div class="dropdown-menu">
                @include('layouts.top_menu_drop', ['categories' => $category->children])
            </div>

    @else
        <li class="nav-item">
            <a href="{{url("/blog/category/$category->slug")}}" class="nav-link">{{$category->title}}</a>

    @endif
        </li>


@endforeach