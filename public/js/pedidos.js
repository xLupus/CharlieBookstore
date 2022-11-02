let pagamento       = document.querySelectorAll('.pagamento');
let metodoPagamento = ['Boleto', 'Pix', 'Cartão de Credito', 'Transferencia Bancaria'];

pagamento.forEach( (item, i) => {
    let sorteio = Math.floor(Math.random() * metodoPagamento.length);
    item.innerText = metodoPagamento[sorteio];
});
