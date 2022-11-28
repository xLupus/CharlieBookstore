const STATUS = document.querySelectorAll('.status');
const PAGAMENTO = document.querySelectorAll('.pagamento');
const METODO_PAGAMENTO = ['Boleto', 'Pix', 'Cartão de Credito', 'Transferencia Bancaria'];

PAGAMENTO.forEach(item => {
    const SORTEIO = Math.floor(Math.random() * METODO_PAGAMENTO.length);
    item.innerText = METODO_PAGAMENTO[SORTEIO];
});

STATUS.forEach(item => {
    switch (item.innerText) {
        case 'Pendente':
            mudarEstilo(item, 'text-bg-warning');
            break;

        case 'Cancelado':
            mudarEstilo(item, 'text-bg-danger');
            break;

        case 'Finalizado':
            mudarEstilo(item, 'text-bg-success');
            break;

        case 'Em andamento':
            mudarEstilo(item, 'text-bg-secondary');
            break;

        default:
            break;
    }
});

function mudarEstilo(item, bgColor) {
    item.classList.add(bgColor);
}
