<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card image generator</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <!--<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.12/vue.min.js"></script>
    <link href="style.css" rel="stylesheet">
</head>
<body>
<section id="mainSection">
  <span>
    Это генератор простыx изображений, которые удобно печатать и сканировать камерой смартфона из банковских приложений. Это может пригодиться, если вы хотите принимать переводы на карту, но по каким-либо причинам не желаете раскрывать номер телефона, привязанный к карте. Удобства такого способа очевидны: вам не нужна физическая карта (срок действия карты и фамилия остаётся в тайне), это быстрее чем вводить номер карты вручную (вероятность ошибки минимальная).
  </span>
  <form>
    <div class="wide">
      <label for="cardNumber">Номер карты (16 цифр):</label>
      <input id="cardNumber" v-model="cardNumber" v-on:input="drawText" maxlength="16"/>
    </div>
    <div>
      <label for="numberColor">Цвет:</label>
      <input id="numberColor" type="color" name="number" v-model.lazy="colors.number" v-on:input="event => { colorChanged(event); }">
    </div>
    <div class="wide">
      <label for="cardHolderName">Имя держателя:</label>
      <input id="cardHolderName" v-model="cardHolderName" v-on:input="drawText" maxlength="20"/>
    </div>
    <div>
      <label for="holderColor">Цвет:</label>
      <input id="holderColor" type="color" name="holder" v-model.lazy="colors.holder" v-on:input="event => { colorChanged(event); }">
    </div>
    <div>
      <label for="cardColor">Цвет фона:</label>
      <input id="cardColor" type="color" name="card" v-model.lazy="colors.card" v-on:input="event => { colorChanged(event); }">
    </div>
  </form>
  <canvas id="cardImage" width="856" height="540" :download="imageName"></canvas>
  <a v-if="linkAvailable" :download="imageName" :key="cardNumber+cardHolderName" :href="imageLink()">Сохранить</a>
</section>
<script src="scripts/common.js"></script>
</body>
</html>