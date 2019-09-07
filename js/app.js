var btnFile = document.querySelector('#app input[name="btnFile"]');
var btnSubmit = document.querySelector('#app input[name="btnSubmit"]');
console.log("i'm here 1");

btnFile.onchange = function enabeBtnSubmit() {
    btnSubmit.removeAttribute('disabled');
}