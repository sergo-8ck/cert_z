@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title') Список сертификатов @endslot
            @slot('parent') Главная @endslot
            @slot('active') Сертификаты
            @endslot
        @endcomponent
        <hr>
            @role('superuser')
                <a href="{{route('admin.article.create')}}" class="btn btn-primary ">
                    <i class="fa fa-plus-square-o"></i> Добавить сертификат
                </a>
            @endrole

            <form action="{{ route('admin.article.index') }}" method="get" class="float-right">
                <div class="form-group float-left">
                    <input type="search" class="form-control" name="s" placeholder="Поиск" value="{{ isset($s) ? $s : '' }}">
                </div>
            </form>
        <br>
        <table class="table table-striped">
            <thead>
            <th>Заявитель</th>
            <th>Номер документа</th>
            <th>Статус</th>
            <th>Действие</th>
            </thead>
            <tbody>
            @forelse ($articles as $article)
                <tr>
                    <td>
                        <a href="{{route('article', $article->slug)}}">{{$article->title}}</a>
                    </td>
                    <td>{{$article->doc_number}}</td>
                    <td>{{config('article.status.' . $article->status . '.name')}}</td>
                    <td>

                        <form onsubmit="if(confirm('Вы действительно хотите удалить ученика?')){return true}else{return false}" action="{{route('admin.article.destroy', $article)}}"  method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            {{csrf_field()}}
                            <a href="{{route('admin.article.edit', $article)}}" class="btn btn-default"><i class="fa fa-edit"></i></a>
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
                               {{$articles->links()}}
                            </ul>
                        </nav>
                    </td>
                </tr>
            </tfoot>
        </table>

    </div>

@endsection