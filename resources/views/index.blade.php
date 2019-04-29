<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>tax-calculation</title>
  <link href="/css/style.css" rel="stylesheet"></link>
  <link href="/favicon.ico" rel="shortcut icon"></link>
</head>
<body>
  <section class="forms">
    <div class="forms__form">
      <h1 class="forms__form__ttl">消費税設定の登録</h1>
      <form action="/create" method="POST">
        {{ csrf_field() }}
        <input type="text" name="date_create" placeholder="開始日付（例：2000-01-01）" class="forms__form__input" autocomplete="off">
        <input type="text" name="percent" placeholder="税率（例：5）" class="forms__form__input" autocomplete="off">
        <br>
        <button type="submit" class="forms__form__btn">登録</button>
      </form>
      <div class="forms__form__message">
        <p class="forms__form__message__error">{{ $errors->first('date_create') }}</p>
        <p class="forms__form__message__error">{{ $errors->first('percent') }}</p>
      </div>
    </div>
    <div class="forms__form">
      <h1 class="forms__form__ttl">消費税の計算</h1>
      <form action="/" method="POST">
        {{ csrf_field() }}
        <input type="text" name="date_calculate" placeholder="日付（例：2000-01-01）" class="forms__form__input" autocomplete="off">
        <input type="text" name="money" placeholder="金額（例：10000）" class="forms__form__input" autocomplete="off">
        <br>
        <button type="submit" class="forms__form__btn">計算</button>
      </form>
      <div class="forms__form__message">
        <p class="forms__form__message__error">{{ $errors->first('date_calculate') }}</p>
        <p class="forms__form__message__error">{{ $errors->first('money') }}</p>
      </div>
      @if ($result != "")
        <div class="forms__form__result">
          <p>{{$date_calculate}}</p>
          <p>{{$result}}</p>
        </div>
      @endif
    </div>
  </section>
  <section class="list">
    <h1 class="list__ttl">消費税設定一覧</h1>
    <div class="list__children">
      <div class="list__children__date">
        <p class="list__children__date__inner">開始日付</p>
      </div>
      <div class="list__children__percent">
        <p class="list__children__percent__inner">税率</p>
      </div>
      <div class="list__children__operate">
        <p class="list__children__operate__inner">操作</p>
      </div>
    </div>
    @foreach ($taxes as $tax)
      <div class="list__children">
        <div class="list__children__date">
          <p class="list__children__date__inner">{{$tax->date}}</p>
        </div>
        <div class="list__children__percent">
          <p class="list__children__percent__inner">{{$tax->percent}}％</p>
        </div>
        <div class="list__children__delete">
          <form action="/delete/{{$tax->id}}" method="POST" class="list__children__delete__form">
            {{ csrf_field() }}
            <button type="submit" class="list__children__delete__form__button">削除</button>
          </form>
        </div>
      </div>
    @endforeach
  </section>
</body>
</html>