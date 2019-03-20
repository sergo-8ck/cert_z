<div class="form-group">
    <label for="">Статус</label>
    <select name="status" class="form-control">
        @if (isset($article->id))
            <option value="1" @if ($article->status == 1) selected="" @endif>Действует
            </option>
            <option value="2" @if ($article->status == 2) selected="" @endif>Приостановлен
            </option>
            <option value="3" @if ($article->status == 3) selected="" @endif>Отозван
            </option>
            <option value="4" @if ($article->status == 4) selected="" @endif>Не действует
            </option>
        @else
            <option value="1">Действует</option>
            <option value="2">Приостановлен</option>
            <option value="3">Отозван</option>
            <option value="4">Не действует</option>
        @endif
    </select>
</div>

<div class="form-group">
    <label for="">Номер документа</label>
    <input type="text"
           id="searchmain"
           class="form-control"
           name="doc_number"
           placeholder="Номер документа"
           value="{{$article->doc_number or ""}}"
           pattern="[A-Za-z]{2}\s[A-Za-z]-[A-Za-z]{2}.[A-Za-z]{2}[0-9]{2}.[A-Za-z].[0-9]{5}"
           minlength="8"
           required>
</div>

<div class="form-group">
    <label for="">Slug (уникальное значение)</label>
    <input type="text" class="form-control" name="slug" placeholder="Автоматическая генерация"
           value="{{$article->slug or ""}}" readonly="">
</div>

<div class="form-group">
    <label for="">Кто выдал</label>
    <input type="text" class="form-control" name="author" placeholder="Кто выдал"
           value="{{$article->author or ""}}" required>
</div>

<div class="form-group">
    <label for="">Заявитель</label>
    <input type="text" class="form-control" name="title" placeholder="Заявитель"
           value="{{$article->title or ""}}" required>
</div>

<div class="form-group">
    <label for="">Изготовитель</label>
    <input type="text" class="form-control" name="manufacturer" placeholder="Изготовитель"
           value="{{$article->manufacturer or ""}}" required>
</div>

<div class="form-group">
    <label for="">Продукция или услуга</label>
    <select id="docvidselect" name="product" class="form-control">
        @if (isset($article->id))
            <option value="1" @if ($article->product == 1) selected="" @endif>Продукция
            </option>
            <option value="0" @if ($article->product == 0) selected="" @endif>Услуга</option>
        @else
            <option value="1">Продукция</option>
            <option value="0">Услуга</option>
        @endif
    </select>
</div>

<div class="form-group">
    <label for="">Наименование продукции или услуги</label>
    <input type="text" class="form-control" name="product_title" placeholder="Наименование"
           value="{{$article->product_title or ""}}" required>
</div>

<div class="form-group">
    <label for="">Соответствует требованиям</label>
    <input type="text" class="form-control" name="meets_requirements" placeholder="Соответствует требованиям"
           value="{{$article->meets_requirements or ""}}" required>
</div>

<div class="form-group">
    <label for="">Выдан на основании</label>
    <input type="text" class="form-control" name="base" placeholder="Выдан на основании"
           value="{{$article->base or ""}}" required>
</div>

<div class="form-group">
    <label for="">Дата выдачи</label>
    <input type="date" name="date_debut" class="form-control"
           value="{{$article->date_debut or old('date_debut', date('Y-m-d'))}}" required>
</div>

<div class="form-group">
    <label for="">Срок действия</label>
    <input type="date" name="date_fin" class="form-control"
           value="{{$article->date_fin or old('date_fin', date('Y-m-d'))}}" required>
</div>

<div class="form-group">
    <label for="">Комментарий</label>
    <textarea class="form-control" id="description"
              name="description">{{$article->description or ""}}</textarea>
</div>

<hr>

<hr>
<div class="form-group">
    <input class="btn btn-primary" type="submit" value="Сохранить">
</div>