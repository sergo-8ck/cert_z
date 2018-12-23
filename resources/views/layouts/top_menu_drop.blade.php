@foreach($categories as $category)

    @if($category->children->where('published', 1)->count())

        <a class="dropdown-item" href="{{url("/blog/category/$category->slug")}}">{{$category->title}}</a>

    @else
        <a class="dropdown-item" href="{{url("/blog/category/$category->slug")}}">{{$category->title}}</a>

    @endif
@endforeach