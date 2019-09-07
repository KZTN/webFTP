var btnFile = document.querySelector('#app input[name="btnFile"]');
var btnSubmit = document.querySelector('#app input[name="btnSubmit"]');

btnFile.onchange = function enabeBtnSubmit() {
    btnSubmit.removeAttribute('disabled');
}