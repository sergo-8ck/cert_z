@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title') Добавление роли @endslot
            @slot('parent') Главная @endslot
            @slot('active') Роли @endslot
        @endcomponent
        <hr>
        <form class="form-horizontal" action="{{route('role.store')}}" method="post">
            {{ csrf_field() }}

            {{-- Form include --}}
            @include('admin.role.partials.form')
            {{--<input type="hidden" name="created_by" value="{{Auth::id()}}">--}}
        </form>
    </div>

@endsection