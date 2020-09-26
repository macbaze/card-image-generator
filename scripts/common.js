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
    cContext: null,
    cHTMLElem: null,
    cardNumber: "1234567890123456",
    cardHolderName: "Имя Ф.",
    colors: {number: "#00AA00", holder: "#FFFFFF", card: "#000000", throttled: "#FF0000"},
    throttling: {timer: 0, state: false}
  },
  mounted() {
    let card_font = new FontFace('Credit Card', 'url(CREDC___.ttf)');
    card_font.load().then((font) => {
      document.fonts.add(font);
      this.cHTMLElem = document.getElementById('cardImage');
      this.cContext = this.cHTMLElem.getContext('2d');
      this.drawText();
    });
  },
  methods: {
    drawRect: function () {
      this.cContext.clearRect(0, 0, 856, 540);

      this.cContext.lineJoin = "round";
      this.cContext.lineWidth = 60;
      this.cContext.beginPath();
      this.cContext.rect(30, 30, 796, 480);
      this.cContext.strokeStyle = this.colors.card;
      this.cContext.fillStyle = this.colors.card;
      this.cContext.fillRect(60, 60, 736, 420);
      this.cContext.stroke();
    },
    drawText: function () {
      if (this.cContext) {
        this.drawRect();

        this.cContext.font = "46px Credit Card";
        this.cContext.fillStyle = this.colors.number;
        this.cContext.textAlign = "start";
        this.cContext.textBaseline = "top";
        this.cContext.fillText(formatNumber(this.cardNumber), 83, 311);

        this.cContext.font = "bold 40px Monospace";
        this.cContext.fillStyle = this.colors.holder;
        this.cContext.fillText(uppercaseHolderName(this.cardHolderName), 56, 440);
      }
    },
    colorChanged: function (pickerEvent) {
      this.colors.throttled = pickerEvent.target.value;
      if (!this.throttling.state) {
        //alert('nt'+pickerEvent.target.value)
        this.throttling.state = true;
        this.drawText();
        this.throttling.timer = setTimeout(function () {
            app.throttling.state = false;
            app.colors[pickerEvent.target.name] = app.colors.throttled;
            app.drawText();
          }, 200);
      }
    },
    imageLink: function () {
      if (this.cContext) {
        return this.cHTMLElem.toDataURL();
      }
    }
  },
  computed: {
    linkAvailable: function () {
      return this.cardNumber.length > 4;
    },
    imageName: function() {
      return this.cardNumber.slice(-4) + '.png';
    }
  }
});