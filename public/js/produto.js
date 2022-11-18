let pictures      = document.querySelectorAll('.book-pictures');
let picture       = document.getElementById('book-picture');

const BTN_MAIS    = document.getElementById('qtd-mais');
const BTN_MENOS   = document.getElementById('qtd-menos');
const PRODUTO_QTD = document.getElementById('produto-qtd');

for (let i = 0; i < pictures.length; i++) {
    pictures[i].addEventListener('click', function() {
        picture.src = pictures[i].src;
    })
}

BTN_MAIS.addEventListener('click', function() {
    let qtd = Number(PRODUTO_QTD.value);

    if (qtd < PRODUTO_QTD.max)
        PRODUTO_QTD.value =  qtd + 1;

    if (qtd < 1)
        PRODUTO_QTD.value = 1;

    if (qtd > PRODUTO_QTD.max)
        PRODUTO_QTD.value = PRODUTO_QTD.max;
})

BTN_MENOS.addEventListener('click', function() {
    let qtd = Number(PRODUTO_QTD.value)

    if (qtd > 1 )
        PRODUTO_QTD.value =  qtd - 1;

    if (qtd < 1)
        PRODUTO_QTD.value = 1;

    if (qtd > PRODUTO_QTD.max)
        PRODUTO_QTD.value = PRODUTO_QTD.max;
})
