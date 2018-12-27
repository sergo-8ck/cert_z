<h2>Поиск по реестру</h2>
<form action="{{ URL::to('home') }}" method="POST" role="search" class="form-inline input-group py-4">
    {{ csrf_field() }}
    <label for="s" class="px-4"><b>Номер документа:</b> </label>
    <input type="text" class="form-control mr-sm-2"
           name="s"
           placeholder="RU A-RU.AA11.A.11111 или RU 1111111"
           pattern="[A-Za-z]{2}\s[A-Za-z]-[A-Za-z]{2}.[A-Za-z]{2}[0-9]{2}.[A-Za-z].[0-9]{5}|[A-Za-z]{2}\s[0-9]{7}"
           minlength="8"
           required>
    <label for="d" class="px-4"><b>Срок действия документа:</b> </label>
    <input type="date" class="form-control mr-sm-2" name="d" required>
    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Поиск</button>
</form>

<p>Чтобы найти сертификат учебного центра АНО ВНИИС ПродМаш воспользуйтесь поиском по реестру. </p>
<p>Для этого нужно ввести в поле поиска номер сертификата или номер бланка вследующем формате:
    <span class="font-weight-bold">RU A-RU.AA11.A.11111</span> или <span>RU 1111111</span>.</p>
@if(isset($details))
    <div class="alert alert-info" role="alert">
        <p>
            Результат поиска по запросу:
            <span class="text-monospace font-weight-bold"> {{$query}}</span>.
        </p>
    </div>

    <table class="table table-striped">
        <thead>
        <th>Заявитель</th>
        <th>Номер документа</th>
        <th>Дата документа</th>
        </thead>
        <tbody>
        @foreach ($details as $artic)
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