@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title') Список ролей @endslot
            @slot('parent') Главная @endslot
            @slot('active') Роли @endslot
        @endcomponent

        <hr>
        <a href="{{route('role.create')}}" class="btn btn-primary float-right">
            <i class="fa fa-plus-square-o"></i> Добавить роли
        </a>
        {{--<form action="{{ route('admin.article.index') }}" method="get" class="float-right">--}}
            {{--<div class="form-group float-left">--}}
                {{--<input type="search" class="form-control" name="s" placeholder="Поиск" value="{{ isset($s) ? $s : '' }}">--}}
            {{--</div>--}}


        {{--</form>--}}
        <br>
        <table class="table table-striped">
            <thead>
            <th>Название</th>
            <th>Display Name</th>
            <th>Описание</th>
            <th>Действие</th>
            </thead>
            <tbody>
            @forelse ($roles as $role)
                <tr>
                    <td>{{$role->name}}</td>
                    <td>{{$role->display_name}}</td>
                    <td>{{$role->description}}</td>
                    <td>

                        <form onsubmit="if(confirm('Вы действительно хотите удалить роль?')){return true}else{return false}" action="{{route('role.destroy', $role->id)}}"  method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            {{csrf_field()}}
                            <a href="{{route('role.edit', $role->id)}}" class="btn btn-default"><i class="fa fa-edit"></i></a>
                            <button type="submit" class="btn"><i class="fa fa-trash-o"></i></button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center"><h2>Данные отсутствуют</h2></td>
                </tr>
            @endforelse
            </tbody>

        </table>

    </div>

@endsection