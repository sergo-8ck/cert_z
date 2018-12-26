@extends('admin.layouts.app_admin')

@section('content')

<div class="container">
    @component('admin.components.breadcrumb')
        @slot('title') Список профессий @endslot
        @slot('parent') Главная @endslot
        @slot('active') Профессии @endslot
    @endcomponent

    <hr>
    <a href="{{route('admin.category.create')}}" class="btn btn-primary">
        <i class="fa fa-plus-square-o"></i> Добавить профессию
    </a>

    <form action="{{ route('admin.category.index') }}" method="get" class="float-right">
        <div class="form-group float-left">
            <input type="search" class="form-control" name="s" placeholder="Поиск" value="{{ isset($s) ? $s : '' }}">
        </div>


    </form>
    <br>
    <table class="table table-striped">
        <thead>
            <th>Наименование</th>
            <th>Публикация</th>
            <th>Действие</th>
        </thead>
        <tbody>
        @forelse ($categories as $category)
            <tr>
                <td><a href="/admin/article/cat/{{$category->id}}">{{$category->title}}</a></td>
                <td>{{$category->published}}</td>
                <td>

                    <form onsubmit="if(confirm('Вы действительно хотите удалить профессию?')){return true}else{return false}" action="{{route('admin.category.destroy',$category)}}"  method="post">
                        <input type="hidden" name="_method" value="DELETE">
                        {{csrf_field()}}
                        <a href="{{route('admin.category.edit', $category)}}" class="btn btn-default"><i class="fa fa-edit"></i></a>
                        <button type="submit" class="btn"><i class="fa fa-trash-o"></i></button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3" class="text-center"><h2>Данные отсутствуют</h2></td>
            </tr>
        @endforelse
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3">
                    <nav aria-label="Page navigation">
                        <ul class="pagination pull-right">
                            {{$categories->links()}}
                        </ul>
                    </nav>
                </td>
            </tr>
        </tfoot>
    </table>
    
</div>

@endsection