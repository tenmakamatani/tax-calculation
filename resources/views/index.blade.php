<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>tax-calculation</title>
  <link href="/css/style.css" rel="stylesheet"></link>
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
  </section>
  <section class="register">
    <h1 class="register__ttl">消費税設定の新規登録</h1>
    <div class="register__form-container">
      <form action="/create" method="POST" class="register__form-container__form">
        <input type="text" name="date" class="register__form-container__form--date">
        <input type="text" name="percentage" class="register__form-container__form--percentage">
        <span　class="register__container--percent-chara">％</span>
        <button type="submit" class="register__form-container__form--button">登録</button>
      </form>
    </div>
  </section>
  <section class="calculate">
    <h1 class="calculate__ttl">消費税計算</h1>
    <div class="calculate__form-container">
      <form action="/calculate" method="POST" class="calculate__form-container__form">
        <input type="text" name="date" class="calculate__form-container__form--date">
        <input type="text" name="percentage" class="calculate__form-container__form--percentage">
        <span>円</span>
        <button type="submit" class="calculate__form-container__form--button">計算</button>
      </form>
    </div>
    <div class="calculate__result-container">
      <div class="calculate__result-container__result">
        <p class="calculate__result-container__result__inner">12000</p>
      </div>
      <p>円（税込）</p>
    </div>
  </section>
</body>
</html>