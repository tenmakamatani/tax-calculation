<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>tax-calculation</title>
  <link href="/css/style.css" rel="stylesheet">
  <link href="/favicon.ico" rel="shortcut icon">
</head>
<body>
  <section class="taxes">
    <h1 class="taxes__ttl">消費税設定の一覧</h1>
    <div class="taxes__detail">
      <div class="taxes__detail__element">
        <p class="taxes__detail__element__head">開始日付</p>
      </div>
      <div class="taxes__detail__element">
        <p class="taxes__detail__element__head">税率</p>
      </div>
      <div class="taxes__detail__element">
        <p class="taxes__detail__element__head">操作</p>
      </div>
    </div>
    @foreach ($taxes as $tax)
      <div class="taxes__detail">
        <div class="taxes__detail__element">
          <p class="taxes__detail__element__head">{{$tax->date}}</p>
        </div>
        <div class="taxes__detail__element">
          <p class="taxes__detail__element__head">{{$tax->percent}}</p>
        </div>
        <div class="taxes__detail__element">
          <form action="/delete/<?php echo $tax->id; ?>" method="POST">
            {{ csrf_field() }}
            <button type="submit" class="taxes__detail__element__button">削除</button>
          </form>
        </div>
      </div>
    @endforeach
  </section>
  <section class="register">
    <h1 class="register__ttl">消費税設定の新規登録</h1>
    <div class="register__form-container">
      <form action="/create" method="POST" class="register__form-container__form">
        {{ csrf_field() }}
        <input type="text" name="date_create" class="register__form-container__form--date" value="{{ old('date_create') }}">
        <input type="text" name="percent" class="register__form-container__form--percentage" value="{{ old('percent') }}">
        <span　class="register__container--percent-chara">％</span>
        <button type="submit" class="register__form-container__form--button">登録</button>
      </form>
    </div>
  </section>
  <section class="calculate">
    <h1 class="calculate__ttl">消費税計算</h1>
    <div class="calculate__form-container">
      <form action="/" method="POST" class="calculate__form-container__form">
        {{ csrf_field() }}
        <input type="text" name="date_calculate" class="calculate__form-container__form--date" value="{{ old('date_calculate') }}">
        <input type="text" name="money" class="calculate__form-container__form--percentage" value="{{ old('money') }}">
        <span>円</span>
        <button type="submit" class="calculate__form-container__form--button">計算</button>
      </form>
    </div>
    <div class="calculate__result-container">
      <div class="calculate__result-container__result">
        @if ($result != "")
          <p class="calculate__result-container__result__inner">{{$result}}</p>
        @endif
      </div>
      <p>円（税込）</p>
    </div>
  </section>
  @if (count($errors) > 0)
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  @endif
  <script type="text/javascript">
    const inputItem = document.getElementsByTagName("input");
    for (var i=0; i<inputItem.length; i++){
      inputItem[i].autocomplete = "off";
    }
  </script>
</body>
</html>