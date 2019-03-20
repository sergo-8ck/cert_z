@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
        <div class="row text-center">
            <div class="col-sm-6">
                <div class="jumbotron">
                    <button type="button" class="btn btn-primary">
                        Сертификатов <span class="badge badge-light">{{$count_articles}}</span>
                    </button>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="jumbotron">
                    <button type="button" class="btn btn-primary">
                        Администаторов <span class="badge badge-light">{{$count_users}}</span>
                    </button>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-sm-8 offset-sm-2">

                <a href="{{route('admin.article.create')}}" class="btn btn-secondary
                btn-block">Добавить сертификат</a>

                <div class="list-group">
                    @foreach($articles as $article)
                        <a href="{{route('admin.article.edit', $article)}}" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">{{$article->title}}</h5>
                            </div>
                            <p class="mb-1">
                                {{$article->product_title}}
                            </p>
                        </a>
                    @endforeach


                </div>
            </div>
        </div>
    </div>
@endsection