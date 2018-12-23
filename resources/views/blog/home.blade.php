@extends('layouts.app')

@section('title', 'Главная')
@section('meta_keyword', 'главная')
@section('meta_description', 'Главная страница')

@section('content')
    <main role="main">
        @if(!isset($details))
        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">Центр дистанционного обучения</h1>
                <h2 class="jumbotron-heading">Учебный центр АНО ВНИИС ПродМаш</h2>
                <p class="lead text-muted">Государственная лицензия. Широкий выбор специальностей. Дистанционная программа обучения. Ваш персональный менеджер. Доступная цена курсов. Повышение квалификации.</p>
                {{--<p>--}}
                    {{--<a href="#" class="btn btn-primary my-2">Отправьте заявку</a>--}}
                {{--</p>--}}
            </div>
        </section>

        @endif
        <div class="album py-5 bg-light">
            <div class="container">
                <h2>Поиск по реестру</h2>
                <form action="{{ URL::to('home') }}" method="POST" role="search" class="form-inline input-group py-4">
                    {{ csrf_field() }}
                    <label for="s" class="px-4"><b>Номер документа:</b> </label>
                    <input type="text" class="form-control mr-sm-2" name="s" placeholder="ХХХХХ-ХХХХХХ" pattern="[0-9]{5}-[0-9]{6}" minlength="12" required>
                    <label for="d" class="px-4"><b>Дата документа:</b> </label>
                    <input type="date" class="form-control mr-sm-2" name="d" placeholder="XX.XX.XXXX" required>
                    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Поиск</button>
                </form>

                <p>Чтобы найти выпускника учебного центра АНО ВНИИС ПродМаш воспользуйтесь поиском по реестру. </p>
                <p>Для этого нужно ввести в поле поиска номер документа выпускника в следующем формате:     <span class="font-weight-bold">ХХХХХ-ХХХХХХ</span>, где вместо <span class="font-weight-bold">Х</span> должна быть цифра. </p>
                <p>Например: <span class="text-monospace font-weight-bold">12345-678901</span> (пять знаков и шесть)</p>
            @if(isset($details))
                    <div class="alert alert-info" role="alert">
                        <p>Результат поиска по запросу: <span class="text-monospace font-weight-bold"> {{$query}}</span>.</p>
                    </div>

                <table class="table table-striped">
                    <thead>
                    <th>Фамилия Имя Отчество</th>
                    <th>Номер документа</th>
                    <th>Дата документа</th>
                    </thead>
                    <tbody>
                    @foreach ($details as $artic)
{{--                        @if($s==$article->document and $d==$article->date)--}}
                            <tr>
                                <td>
                                    <a href="{{route('article', $artic->slug)}}">{{$artic->title}}</a>
                                </td>
                                <td>{{$artic->document}}</td>
                                <td>{{$artic->date}}</td>
                            </tr>
                        {{--@endif--}}
                    @endforeach
                    </tbody>
                </table>

            @elseif(isset($message))
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @endif

                <div class="container">
                    <div class="row py-4">
                        <h2>Лицензия</h2>
                        <div class="col-12">
                            <div class="row">
                                <a href="{{ asset('images/lic/license-page-1.jpg') }}" data-lightbox="mygallery" class="col-lg-3 col-md-4 col-6 my-3">
                                    <img src="{{ asset('images/lic/license-page-1.jpg') }}" class="img-fluid card">
                                </a>
                                <a href="{{ asset('images/lic/license-page-2.jpg') }}" data-lightbox="mygallery" class="col-lg-3 col-md-4 col-6 my-3">
                                    <img src="{{ asset('images/lic/license-page-2.jpg') }}" class="img-fluid card">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

@endsection