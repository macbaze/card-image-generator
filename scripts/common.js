function uppercaseHolderName(value) {
	return value.toUpperCase();
}
function formatNumber(value) {
	var onlyNumbers = value.replace(/\D/g,'0').replace(/\d{4}/g, '$& ').trim();
	return onlyNumbers;
}
var app = new Vue({
  el: '#mainSection',
  data: {
    vueCanvas: null,
    cardNumber: "1234567890123456",
    cardHolderName: "Имя Ф.",
    cardColor: "#00000099",
    numberColor: "#FFFFFFFF",
    holderNameColor: "#FFFFFFFF"
  },
  mounted() {
    let card_font = new FontFace('Credit Card', 'url(CREDC___.ttf)');
    card_font.load().then((font) => {
      document.fonts.add(font);
      let c = document.getElementById('cardImage');
      let ctx = c.getContext('2d');
      this.vueCanvas = ctx;
      this.drawRect();
      //console.log('Font loaded');
    });
  },
  methods: {
    drawRect() {
      this.vueCanvas.clearRect(0, 0, 856, 540);

      this.vueCanvas.lineJoin = "round";
      this.vueCanvas.lineWidth = 60;
      this.vueCanvas.beginPath();
      this.vueCanvas.rect(30, 30, 796, 480);
      this.vueCanvas.strokeStyle = this.cardColor;
      this.vueCanvas.fillStyle = this.cardColor;
      this.vueCanvas.fillRect(60, 60, 736, 420);
      this.vueCanvas.stroke();


      this.vueCanvas.font = "46px Credit Card";
      this.vueCanvas.fillStyle = this.numberColor;
      this.vueCanvas.textAlign = "start";
      this.vueCanvas.textBaseline = "top";
      this.vueCanvas.fillText(formatNumber(this.cardNumber), 83, 311);

      this.vueCanvas.font = "bold 40px Monospace";
      this.vueCanvas.fillStyle = this.holderNameColor;
      this.vueCanvas.fillText(uppercaseHolderName(this.cardHolderName), 56, 440);
    }
  }
});