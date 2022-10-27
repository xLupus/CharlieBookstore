let cep        = document.getElementById('cep');
let inputCheck = document.getElementById('input-check');

cep.onchange = getCEP;

function getCEP() {
    let cep_value = cep.value;

    console.log(cep_value);
    let request = new XMLHttpRequest();
    request.open('GET',`https://viacep.com.br/ws/${cep_value}/json/`, true);
    request.send();
    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            let response = JSON.parse(request.responseText);

            let logradouro  = document.getElementById('logradouro');
            let bairro      = document.getElementById('bairro');
            let localidade  = document.getElementById('cidade');
            let uf          = document.getElementById('uf');

            logradouro.value  = response.logradouro
            bairro.value      = response.bairro
            localidade.value  = response.localidade
            uf.value          = response.uf

            console.log(response);
        }
    }
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

        div.id = 'input-nome'

        input.classList = 'rounded-pill h-100 py-2 mb-3 form-control';
        input.setAttribute('type', 'text')
        input.setAttribute('name', 'nome')
        input.setAttribute('placeholder', 'Rotulo')

        div.appendChild(input);
        form.appendChild(div);

        console.log(div, input);
    } else if (inputCheck.checked === false) {
        let div = document.getElementById('input-nome')

        div.remove()
    }
})
