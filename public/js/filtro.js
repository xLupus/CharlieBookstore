const PRECO_MIN = document.getElementById('precoMin');
const PRECO_MAX = document.getElementById('precoMax');
const RANGE = document.querySelectorAll('.form-range');

RANGE[0].oninput = function() {
    PRECO_MIN.textContent = `${this.value}, 00`;
    PRECO_MIN.min = RANGE[1].value;
}

RANGE[1].oninput = function() {
    PRECO_MAX.textContent = `${this.value}, 00`;
    PRECO_MAX.max = RANGE[0].value;
}
