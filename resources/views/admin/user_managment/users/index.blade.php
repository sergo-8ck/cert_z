@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title') Список пользователей @endslot
            @slot('parent') Главная @endslot
            @slot('active') Пользователи @endslot
        @endcomponent

        <hr>
        <a href="{{route('admin.user_managment.user.create')}}" class="btn btn-primary pull-right">
            <i class="fa fa-plus-square-o"></i> Создать пользователя
        </a>
        <br>
        <table class="table table-striped">
            <thead>
            <th>Имя</th>
            <th>Email</th>
            <th>Роль</th>
            <th>Действие</th>
            </thead>
            <tbody>
            @forelse ($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        @foreach($user->roles as $role)
                            {{$role->name}}
                        @endforeach
                    </td>
                    <td>

                        <form onsubmit="if(confirm('Вы действительно хотите удалить пользователя?')){return true}else{return false}" action="{{route('admin.user_managment.user.destroy', $user)}}"  method="post">
                            {{ method_field('DELETE') }}
                            {{csrf_field()}}
                            <a href="{{route('admin.user_managment.user.edit', $user)}}" class="btn btn-default"><i class="fa fa-edit"></i></a>
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
                            {{$users->links()}}
                        </ul>
                    </nav>
                </td>
            </tr>
            </tfoot>
        </table>

    </div>

@endsection