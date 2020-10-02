require('./bootstrap');

let firstField = document.getElementById("password1");
let secondField = document.getElementById('password2');

function checkPasswordEquality() {
    if(firstField.value()!== secondField.value()) {
        document.getElementById('incorrectPasswordText').style.display = 'block';
    } else {
        document.getElementById('incorrectPasswordText').style.display = 'none';
    }
}

