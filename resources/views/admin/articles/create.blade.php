@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title') Добавление сертификата @endslot
            @slot('parent') Главная @endslot
            @slot('active') Сертификаты @endslot
        @endcomponent
        <hr>
        <form class="form-horizontal" action="{{route('admin.article.store')}}" method="post">
            {{ csrf_field() }}

            {{-- Form include --}}
            @include('admin.articles.partials.form')
            <input type="hidden" name="created_by" value="{{Auth::id()}}">
        </form>
    </div>

@endsection