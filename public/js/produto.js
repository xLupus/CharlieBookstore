let pictures    = document.querySelectorAll('.book-pictures');
let picture     = document.getElementById('book-picture');


for (let i = 0; i < pictures.length; i++) {
    pictures[i].addEventListener('click', function() {
        picture.src = pictures[i].src
    })
}
