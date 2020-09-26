<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card image generator</title>
    <link href="style.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
</head>
<body>
<section id="mainSection">
  <span>
    Это генератор простых изображений, которые удобно печатать и сканировать камерой смартфона из банковских приложений. Это может пригодиться, если вы хотите принимать переводы на карту, но по каким-либо причинам не желаете раскрывать номер телефона, привязанный к карте. Удобства такого способа очевидны: вам не нужна физическая карта (срок действия карты и фамилия остаётся в тайне), это быстрее чем вводить номер карты вручную (вероятность ошибки минимальная).
  </span>
  <form>
    <div>
      <label for="cardNumber">Номер карты (16 цифр):</label>
      <input id="cardNumber" v-model.number="cardNumber" v-on:input="drawText" maxlength="16"/>
      <label for="numberColor">Цвет:</label>
      <input id="numberColor" type="color" name="number" v-model.lazy="colors.number" v-on:input="event => { colorChanged(event); }">
    </div>
    <div>
      <label for="cardNumber">Имя держателя:</label>
      <input id="cardNumber" v-model="cardHolderName" v-on:input="drawText" maxlength="20"/>
      <label for="holderColor">Цвет:</label>
      <input id="holderColor" type="color" name="holder" v-model.lazy="colors.holder" v-on:input="event => { colorChanged(event); }">
    </div>
    <div>
      <label for="cardColor">Цвет фона:</label>
      <input id="cardColor" type="color" name="card" v-model.lazy="colors.card" v-on:input="event => { colorChanged(event); }">
    </div>
  </form>
  <canvas id="cardImage" width="856" height="540" :download="imageName"></canvas>
  <a v-if="linkAvailable" :download="imageName" :key="cardNumber+cardHolderName" :href="imageLink()">Сохранить как..</a>
</section>
<script src="scripts/common.js"></script>
</body>
</html>