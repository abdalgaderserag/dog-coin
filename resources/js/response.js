//TODO :add event when the height change
let height = document.getElementsByClassName('nav-bar')[0].offsetHeight;
height = window.innerHeight - height;
// let height = window.innerHeight;
document.getElementsByClassName('container')[0].style.height = height + 'px';


let image = document.getElementsByClassName('transfer-image')[0].children[1];
height = image.offsetLeft - 20;
image.style.left = height + 'px';