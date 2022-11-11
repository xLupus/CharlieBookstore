const BTN = document.querySelectorAll('.order-btn');
let svg = new Array();
let path = '';

for (let i = 4, j = 0; i <= 6; j++, i++) {
    svg[j] = document.querySelectorAll('svg')[i];
}

BTN.forEach(function(btn) {
    btn.addEventListener('click', () => {
        !btn.classList.contains('collapsed') ? changeSVG('bi bi-plus ms-2', 'M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z', btn) : changeSVG('bi bi-dash ms-2', 'M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z', btn);
    });
})

function changeSVG(className, pathValue, currentBtn) {
    currentBtn.lastElementChild.classList = className;
    currentBtn.lastElementChild.id === 'btnOrder' ? changePATH('d', pathValue, 4) : (currentBtn.lastElementChild.id === 'btnCategory' ? changePATH('d', pathValue, 5) : changePATH('d', pathValue, 6));

    function changePATH(pathAtribute, pathValue, index) {
        path = document.querySelectorAll('path')[index];
        path.removeAttribute(pathAtribute);
        path.setAttribute(pathAtribute, pathValue);
    }
}
