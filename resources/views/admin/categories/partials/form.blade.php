<label for="">Статус</label>
<select name="published" class="form-control">
    @if (isset($category->id))
        <option value="1" @if ($category->published == 1) selected="" @endif>Опубликовано</option>
        <option value="0" @if ($category->published == 0) selected="" @endif>Не опубликовано</option>
    @else
        <option value="1">Опубликовано</option>
        <option value="0">Не опубликовано</option>
    @endif
</select>

<label for="">Название</label>
<input type="text" class="form-control" name="title" placeholder="Название" value="{{$category->title or ""}}" required>

<label for="">Slug</label>
<input type="text" class="form-control" name="slug" placeholder="Автоматическая генерация" value="{{$category->slug or ""}}" readonly="">

<label for="">Родительская категория</label>
<select name="parent_id" class="form-control">
    <option value="0">-- без родительской категории --</option>
    @include('admin.categories.partials.categories', ['categories' => $categories])
</select>

<hr>

<input class="btn btn-primary" type="submit" value="Сохранить">