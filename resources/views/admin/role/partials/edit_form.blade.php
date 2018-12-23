<div class="form-group">
    <label for="name">Название роли</label>
    <input type="text" class="form-control" name="name" placeholder="Название роли" value="{{$role->name}}" required>
</div>
<div class="form-group">
    <label for="display_name">Display Name</label>
    <input type="text" class="form-control" name="display_name" placeholder="Display Name" value="{{$role->display_name}}">
</div>
<div class="form-group">
    <label for="description">Description</label>
    <input type="text" class="form-control" name="description" placeholder="Description" value="{{$role->description}}">
</div>

<div class="form-group">
    <h3>Permissions</h3>
    @foreach($permissions as $permission)
        <input type="checkbox" {{in_array($permission->id,$role_permissions)?"checked":""}}  name="permission[]" value="{{ $permission->id }}"> {{ $permission->name }}<br>
    @endforeach
</div>

<hr>


<hr>

<input class="btn btn-primary" type="submit" value="Сохранить">