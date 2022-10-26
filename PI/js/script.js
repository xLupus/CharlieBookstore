const CARD_NAME = document.getElementById('cardName');
const CARD_NUMBER = document.getElementById('cardNumber');
const CARD_CVV = document.getElementById('cardCVV');

CARD_NAME.oninput = () => {
    CARD_NAME.value === '' ? document.getElementById('name').textContent = 'LOREM IPSUM' : document.getElementById('name').textContent = CARD_NAME.value;
}

CARD_NUMBER.oninput = () => {
    CARD_NUMBER.value === '' ? document.querySelector('.credit-card-number').textContent = '0000 0000 0000 0000' : document.querySelector('.credit-card-number').textContent = CARD_NUMBER.value;
}

CARD_CVV.oninput = () => {
    CARD_CVV.value === '' ? document.querySelector('.cvv-number').textContent = '000' : document.querySelector('.cvv-number').textContent = CARD_CVV.value;
}
