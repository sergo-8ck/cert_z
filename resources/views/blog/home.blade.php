@extends('layouts.app')

@section('title', 'Главная')
@section('meta_keyword', 'главная')
@section('meta_description', 'Главная страница')

@section('content')
    <main role="main">
        @if(!isset($details))
        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">Автономная некоммерческая организация</h1>
                <h2 class="jumbotron-heading">"Всесоюзный научно-исследовательский институт сертификации продукции машиностроения"</h2>
                <p class="lead text-muted">Агентство по техническому регулированию и метрологии в добровольной системе сертификации «Открытая территория качества» (СДС «ОТК»), регистрационный номер № РОСС RU.И1884.04КЗЛ0</p>
                {{--<p>--}}
                    {{--<a href="#" class="btn btn-primary my-2">Отправьте заявку</a>--}}
                {{--</p>--}}
            </div>
        </section>

        @endif

        <div class="album py-5 bg-light">
            <div class="container">
                @include('blog.layouts.searching')
                @include('blog.layouts.table')


                @include('blog.layouts.license')



            </div>
        </div>
    </main>

@endsection