let cep        = document.getElementById('cep');
let inputCheck = document.getElementById('input-check');

inputCheck.checked = false

cep.onchange = getCEP;

function getCEP() {
    let cep_value = cep.value;

    fetch(`https://viacep.com.br/ws/${cep_value}/json/`)
        .then( (result) => {
            return result.json();
        })
        .then( (json) => {
            let logradouro  = document.getElementById('logradouro');
            let bairro      = document.getElementById('bairro');
            let localidade  = document.getElementById('cidade');
            let uf          = document.getElementById('uf');

            logradouro.value  = json.logradouro
            bairro.value      = json.bairro
            localidade.value  = json.localidade
            uf.value          = json.uf
        })
        .catch( (error) => {
            console.log(error);
        })
}

function atualizaQtd(btn, qtd) {
    btn.parentNode.children[1].value = Number(btn.parentNode.children[1].value) + qtd ;
    btn.parentNode.parentElement.submit()
}

inputCheck.addEventListener('click', () => {
    console.log(inputCheck.checked);

    let form = document.getElementById('form-endereco');

    if (inputCheck.checked === true) {
        let div   = document.createElement('div')
        let input = document.createElement('input')
        let btn   = document.createElement('input')

        div.id = 'input-nome'
        div.classList = 'd-flex'

        input.classList = 'rounded-pill h-100 py-2 mb-3 form-control w-50 me-3';
        input.setAttribute('type', 'text')
        input.setAttribute('name', 'nome')
        input.setAttribute('placeholder', 'Rotulo')

        btn.classList = 'h-100 btn btn-light rounded-pill px-4 py-3 border w-25';
        btn.value     = 'Salvar'
        btn.setAttribute('type', 'submit')

        div.appendChild(input);
        div.appendChild(btn)
        form.appendChild(div);

    } else if (inputCheck.checked === false) {
        let div = document.getElementById('input-nome')
        div.remove()
    }
})
