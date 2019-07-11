//TODO :add event when the height change
let height = document.getElementsByClassName('nav-bar')[0].offsetHeight;
height = window.innerHeight - height;
document.getElementsByClassName('container')[0].style.height = height + 'px';

