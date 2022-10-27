let cep = document.getElementById('cep');
cep.onchange = getCEP;

function getCEP(){
    let cep_value = cep.value;
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

    //console.log(btn.parentNode, btn.parentElement);
    //
    btn.parentNode.children[1].value = Number(btn.parentNode.children[1].value) + qtd ;


    btn.parentNode.parentElement.submit()

}
