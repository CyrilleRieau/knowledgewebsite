

window.onload=function() {
let inscript = document.querySelector('.inscription');
let connex = document.querySelector('.connexion');
let formconn = document.querySelector('.formconn');
let forminsc = document.querySelector('.forminsc');
inscript.addEventListener('click', function () {
    if (formconn.style.display === 'none' || formconn.style.display === '') {
        formconn.style.display = 'block';
    } else {
        formconn.style.display = 'none';
    }
});
connex.addEventListener('click', function () {
    if (forminsc.style.display === 'none' || forminsc.style.display === '') {
        forminsc.style.display = 'block';
    } else {
        forminsc.style.display = 'none';
    }
});
};
let logou = document.querySelector('.logout');
logou.addEventListener('click', function () {
    Database::logout();
});