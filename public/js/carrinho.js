const CEP         = document.getElementById('cep');
const INPUT_CHECK = document.getElementById('input-check');
const DROP_FORM   = document.getElementById('drop_form')
const FORM        = document.getElementById('form-endereco');

if (DROP_FORM) {
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
}

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

function atualizarQtd(btn, qtd) {
    btn.parentNode.children[1].value = Number(btn.parentNode.children[1].value) + qtd;
    btn.parentNode.parentElement.submit();
}
