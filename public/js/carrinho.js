const CEP         = document.getElementById('cep');
const INPUT_CHECK = document.getElementById('input-check');
const DROP_FORM   = document.getElementById('drop_form')
const FORM        = document.getElementById('form-endereco');

DROP_FORM.addEventListener('click', () => {

    if (DROP_FORM.value == 'show') {
        FORM.classList.remove('d-none');
        DROP_FORM.value = 'hide';
        DROP_FORM.innerText = 'Fechar formulario';

    } else if (DROP_FORM.value == 'hide') {
        FORM.classList.add('d-none');
        DROP_FORM.value = 'show';
        DROP_FORM.innerText = 'Adicionar novo endereço';
    }

})

CEP.oninput = function() {
    const CEP_VALUE = CEP.value;

    fetch(`https://viacep.com.br/ws/${CEP_VALUE}/json/`)
    .then((result) => {
        return result.json();
    })
    .then((json) => {
        const LOGRADOURO  = document.getElementById('logradouro');
        const BAIRRO      = document.getElementById('bairro');
        const LOCALIDADE  = document.getElementById('cidade');
        const UF          = document.getElementById('uf');

        LOGRADOURO.value  = json.logradouro;
        BAIRRO.value      = json.bairro;
        LOCALIDADE.value  = json.localidade;
        UF.value          = json.uf;
    })
    .catch( (error) => {
        console.log(error);
    });
}
/*
INPUT_CHECK.onclick = function() {


    if (INPUT_CHECK.checked) {
        const DIV   = document.createElement('div');
        const INPUT = document.createElement('input');
        const BTN   = document.createElement('input');

        DIV.id = 'input-nome';
        DIV.classList = 'd-inline-flex';

        INPUT.classList = 'rounded-pill form-control form-control-lg me-3';
        INPUT.setAttribute('type', 'text');
        INPUT.setAttribute('name', 'rotulo');
        INPUT.setAttribute('placeholder', 'Rotulo');

        BTN.classList = 'btn btn-light btn-lg rounded-pill w-50';
        BTN.value     = 'Salvar';
        BTN.setAttribute('type', 'submit');

        DIV.appendChild(INPUT);
        DIV.appendChild(BTN);
        FORM.appendChild(DIV);
    } else {
        const DIV = document.getElementById('input-nome')
        DIV.remove()
    }
}
*/
function atualizarQtd(btn, qtd) {
    btn.parentNode.children[1].value = Number(btn.parentNode.children[1].value) + qtd;
    btn.parentNode.parentElement.submit();
}
