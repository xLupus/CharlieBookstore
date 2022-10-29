const CARD_NAME = document.getElementById('cardName');
const CARD_NUMBER = document.getElementById('cardNumber');
const CARD_CVV = document.getElementById('cardCVV');
const CARD_MONTH = document.getElementById('cardMonth');
const CARD_YEAR = document.getElementById('cardYear');
const CARD_VAL = new Array(
    document.querySelector('.card-val div:first-child'),
    document.querySelector('.card-val div:last-child')
);

//gera meses
for (let a = 1; a <= 12; a++) {
    const OPTION_MONTH = document.createElement('option');
    OPTION_MONTH.value = a;
    OPTION_MONTH.appendChild(document.createTextNode(a <= 9 ? `0${a}` : a));
    CARD_MONTH.appendChild(OPTION_MONTH);

    CARD_MONTH.oninput = function() {
        console.log(this.value);
        CARD_VAL[0].textContent = this.value <= 9 ? `0${this.value}` : this.value;
    }
}

//gera ano
for (let a = 22; a <= 47; a++) {
    const OPTION_YEAR = document.createElement('option');
    OPTION_YEAR.value = a;
    OPTION_YEAR.appendChild(document.createTextNode(a));
    CARD_YEAR.appendChild(OPTION_YEAR);

    CARD_YEAR.oninput = function() {
        console.log(this.value);
        CARD_VAL[1].textContent = this.value;
    }
}

CARD_NUMBER.oninput = function() {
    this.value = this.value.replace(/[^0-9]/g, '').replace(/(.{4})/g, '$1 ').trim();
    document.querySelector('.credit-card-number').textContent = this.value === '' ? '0000 0000 0000 0000' : this.value;
}

CARD_NAME.oninput = function() {
    this.value = this.value.replace(/[0-9]/g, '');
    document.getElementById('name').textContent = this.value === '' ? 'LOREM IPSUM' : this.value;
}

CARD_CVV.oninput = function() {
    this.value = this.value.replace(/[^0-9]/g, '').replace(/(.{3})/g, '$1 ').trim();
    document.querySelector('.cvv-number').textContent = this.value === '' ? '000' : this.value;
}
