<div class="form-group">
    <label for="name">Название роли</label>
    <input type="text" class="form-control" name="name" placeholder="Название роли" value="{{$role->name or ""}}" required>
</div>
<div class="form-group">
    <label for="display_name">Display Name</label>
    <input type="text" class="form-control" name="display_name" placeholder="Display Name" value="{{$role->display_name or ""}}">
</div>
<div class="form-group">
    <label for="description">Description</label>
    <input type="text" class="form-control" name="description" placeholder="Description" value="{{$role->description or ""}}">
</div>

<div class="form-group">
    <h3>Permissions</h3>
    @foreach($permissions as $permission)
    <input type="checkbox" name="permission[]" value="{{ $permission->id }}"> {{ $permission->name }}<br>
    @endforeach
</div>

<hr>

{{--<label for="">Мета заголовок</label>--}}
{{--<input type="text" class="form-control" name="meta_title" placeholder="Мета заголовок" value="{{$article->meta_title or ""}}" required>--}}

{{--<label for="">Мета описание</label>--}}
{{--<input type="text" class="form-control" name="meta_description" placeholder="Мета описание" value="{{$article->meta_description or ""}}" required>--}}

{{--<label for="">Ключевые слова</label>--}}
{{--<input type="text" class="form-control" name="meta_keyword" placeholder="Ключевые слова, через запятую" value="{{$article->meta_keyword or ""}}" required>--}}

<hr>

<input class="btn btn-primary" type="submit" value="Сохранить">