<div class="form-group">
    <label for="">Статус</label>
    <select name="published" class="form-control">
    @if (isset($article->id))
            <option value="1" @if ($article->published == 1) selected="" @endif>Опубликовано</option>
            <option value="0" @if ($article->published == 0) selected="" @endif>Не опубликовано</option>
        @else
            <option value="1">Опубликовано</option>
            <option value="0">Не опубликовано</option>
        @endif
    </select>
</div>
<div class="form-group">
    <label for="">Фамили Имя Отчество</label>
    <input type="text" class="form-control" name="title" placeholder="Фамили Имя Отчество" value="{{$article->title or ""}}" required>
</div>

<div class="form-group">
    <label for="">Slug (уникальное значение)</label>
    <input type="text" class="form-control" name="slug" placeholder="Автоматическая генерация" value="{{$article->slug or ""}}" readonly="">
</div>
<div class="form-group">
    <label for="">Программа обучения</label>
    <select class="form-control" name="categories[]" multiple="">
        @include('admin.articles.partials.categories', ['categories' => $categories])
    </select>
</div>
{{--<label for="">Краткое описание</label>--}}
{{--<textarea class="form-control" id="description_short" name="description_short">{{$article->description_short or ""}}</textarea>--}}

<div class="form-group">
    <label for="">Дата окончания обучения</label>
    <input type="date" name="date" class="form-control" value="{{$article->date or old('date', date('Y-m-d'))}}" required>
</div>


<div class="form-group">
    <label for="">Документ</label>
    <select id="docvidselect" name="docvid" class="form-control">
        @if (isset($article->id))
            <option value="1" @if (isset($article->datedoc)) selected="" @endif>Свидетельство</option>
            <option value="0" @if (!isset($article->datedoc)) selected="" @endif>Диплом</option>
        @else
            <option value="1">Свидетельство</option>
            <option value="0">Диплом</option>
        @endif
    </select>










</div>
<div class="form-group">
    <label for="">Номер документа</label>
    <input type="text" class="form-control" name="document" placeholder="Номер документа" value="{{$article->document or ""}}" required>
</div>
@if (isset($article->id))
@if (isset($article->datedoc))
<div class="form-group" id="srokdoc">
    <label for="">Срок действия документа</label>
    <input type="date" id="srokdocinput" name="datedoc" class="form-control" value="{{$article->datedoc or old('datedoc', date('Y-m-d'))}}">
</div>
@elseif(!isset($article->datedoc))
<div class="form-group" id="srokdoc" style="display: none;">
    <label for="">Срок действия документа</label>
    <input type="text" id="srokdocinput" name="datedoc" class="form-control" value="">
</div>
@endif
@else
    <div class="form-group" id="srokdoc">
        <label for="">Срок действия документа</label>
        <input type="date" id="srokdocinput" name="datedoc" class="form-control" value="{{$article->datedoc or old('datedoc', date('Y-m-d'))}}">
    </div>
@endif
<div class="form-group">
    <label for="">Комментарий</label>
    <textarea class="form-control" id="description" name="description">{{$article->description or ""}}</textarea>
</div>
<hr>

<hr>
<div class="form-group">
    <input class="btn btn-primary" type="submit" value="Сохранить">
</div>