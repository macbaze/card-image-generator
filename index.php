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
		<input type="text" v-model="cardNumber" v-on:input="drawRect" maxlength="16"/>
		<input type="text" v-model="cardHolderName" v-on:input="drawRect" maxlength="20"/>
	</form>
	<canvas id="cardImage" width="856" height="540"></canvas>
	<button>Сохранить как..</button>
</section>
<script src="scripts/common.js"></script>
</body>
</html>