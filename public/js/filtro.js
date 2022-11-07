const PRECO_MIN = document.getElementById('precoMin');
const PRECO_MAX = document.getElementById('precoMax');
const INPUT_RANGE = document.querySelectorAll('.form-range');

INPUT_RANGE[0].oninput = function() { //min
    if (this.value < INPUT_RANGE[1].value) {
        PRECO_MIN.textContent = `${this.value}, 00`;
        this.max = INPUT_RANGE[1].value - 1;
    } else {
        console.log('entroy aqyi2');
        PRECO_MIN.textContent = `${this.value}, 00`;
    }
}

INPUT_RANGE[1].oninput = function() { //max
    if (this.value > INPUT_RANGE[0].value) {
        PRECO_MAX.textContent = `${this.value}, 00`;
        this.min = parseInt(INPUT_RANGE[0].value) + 1;
    } else {
        PRECO_MAX.textContent = `${this.value}, 00`;
    }
}
