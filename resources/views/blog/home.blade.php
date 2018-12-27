@extends('layouts.app')

@section('title', 'Главная')
@section('meta_keyword', 'главная')
@section('meta_description', 'Главная страница')

@section('content')
    <main role="main">
        @if(!isset($details))
        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading"><b>Автономная некоммерческая организация</b></h1>
                <br>
                <h2 class="jumbotron-heading">"Всесоюзный научно-исследовательский институт сертификации продукции машиностроения"</h2>
                <br>
                <img src="{{ asset('images/logo.jpg') }}" width="250px">
                <hr class="my-4">
                <p class="lead"><b>Агентство по техническому регулированию и метрологии в
                    добровольной системе сертификации «Открытая территория качества» (СДС «ОТК»), регистрационный номер № РОСС RU.И1884.04КЗЛ0</b></p>
            </div>
        </section>

        @endif

        <div class="album py-5 bg-light">
            <div class="container">
                @include('blog.layouts.searching')
                @if(!isset($details))
                    @include('blog.layouts.table')
                @endif
                @include('blog.layouts.license')
            </div>
        </div>
    </main>

@endsection