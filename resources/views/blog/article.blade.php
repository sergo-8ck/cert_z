@extends('layouts.app')

@section('title', $article->meta_title)
@section('meta_keyword', $article->meta_keyword)
@section('meta_description', $article->meta_description)

@section('content')
    <main role="main">
        <div class="container py-4">
        <div class="row">
            <div class="col-sm-12">

                <div class="container py-4">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <h1>{{$article->title}}</h1>
                        </div>
                        <div class="col-12 col-sm-6">
                            @role('superuser')
                            <form onsubmit="if(confirm('Вы действительно хотите удалить ученика?')){return true}else{return false}" action="{{route('admin.article.destroy', $article)}}"  method="post">
                                <input type="hidden" name="_method" value="DELETE">
                                {{csrf_field()}}
                                <a href="{{route('admin.article.edit', $article)}}" class="btn btn-default"><i class="fa fa-edit"></i></a>
                                <button type="submit" class="btn"><i class="fa fa-trash-o"></i></button>
                            </form>
                            @endrole
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-6 py-4">
                            <p><b>Кто выдал:</b> {!! $article->author !!}</p>
                            <p><b>Заявитель:</b> {!! $article->applicant !!}</p>
                            <p><b>Изготовитель:</b> {!! $article->manufacturer !!}</p>
                            <p><b>{{config('article.product.' .
                            $article->product . '.name')}}:</b> {!! $article->product_title!!}</p>
                            <p><b>Соответствует требованиям:</b> {!! $article->meets_requirements !!}</p>
                            <p><b>Выдан на основании:</b> {!! $article->base !!}</p>
                            <p><b>Дата выдачи и срок действия:</b> с {!! $article->date_debut !!} по
                                {!! $article->date_fin !!}
                            </p>
                            <p><b>Текущий статус:</b> {{config('article.status.' .
                            $article->status . '.name')}}</p>
                        </div>
                        <div class="col-12 col-sm-6">
                            {!! QrCode::size(200)->margin(2)->generate('http://' .
                            $_SERVER['HTTP_HOST'] . '/cert/' . $article->slug); !!}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </main>
@endsection