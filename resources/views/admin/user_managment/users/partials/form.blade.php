@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="form-group">
    <label for="">Имя</label>
    <input type="text" class="form-control" name="name" placeholder="Имя" value="@if(old('name')){{old('name')}}@else{{$user->name or ""}}@endif" required>
</div>
<div class="form-group">
    <label for="">Email</label>
    <input type="email" class="form-control" name="email" placeholder="Email" value="@if(old('email')){{old('email')}}@else{{$user->email or ""}}@endif" required>
</div>
<div class="form-group">
    <label for="">Пароль</label>
    <input type="password" class="form-control" name="password">
</div>
<div class="form-group">
    <label for="">Подтверждение</label>
    <input type="password" class="form-control" name="password_confirmation">
</div>
<div class="form-group">
    <select name="roles[]" multiple>
        @foreach($allRoles as $role)
            <option value="{{ $role->id }}" selected="selected">{{ $role->name }}</option>
        @endforeach
    </select>
</div>
<hr>

<input class="btn btn-primary" onclick="$('#role-form').submit" type="submit" value="Сохранить">