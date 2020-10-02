require('./bootstrap');

firstField = document.getElementById("password1");
secondField = document.getElementById('password2')

function checkPasswordEquality() {
    if(firstField.value() === secondField.value()) {
        //c'est ok
    } else {
        //pas bon
    }
}

