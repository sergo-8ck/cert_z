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
                            <p><b>Программа обучения:</b>
                                {{ $article->categories()->pluck('title')->implode(', ') }}</p>
                            <p><b>Дата окончания обучения:</b> {!! $article->date !!}</p>
                            <p><b>Номер документа:</b> {!! $article->document !!}</p>
                            @if(isset($article->datedoc))
                            <p><b>Вид документа: </b> свидетельство</p>
                            <p><b>Срок действия документа:</b> {!! $article->datedoc !!}</p>
                            @else
                            <p><b>Вид документа: </b> диплом</p>
                            @endif
                        </div>
                        <div class="col-12 col-sm-6">
                            {!! QrCode::size(200)->margin(2)->generate('http://' . $_SERVER['HTTP_HOST'] . '/blog/article/' . $article->slug); !!}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </main>
@endsection