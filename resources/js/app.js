require('./bootstrap');

let firstField = document.getElementById("password1");
let secondField = document.getElementById('password2');

function checkPasswordEquality() {
    let submitInscriptionForm = $('#createAccountButton');
    if(firstField.value !== secondField.value) {
        document.getElementById('incorrectPasswordText').style.display = 'block';
    } else {
        document.getElementById('incorrectPasswordText').style.display = 'none';
        submitInscriptionForm.prop('disabled', false);

    }
}
if(firstField  && secondField) {
    firstField.onchange = checkPasswordEquality;
    secondField.onchange = checkPasswordEquality;
}

if($('#CGUConfirmation').length) {

    $('#CGUConfirmation').click(() => {
        if(!$('#CGUConfirmation').is(':checked')) {
            $('#createAccountButton').prop('disabled', true);
        } else if($('#CGUConfirmation').is(':checked')){
            $('#createAccountButton').prop('disabled', false);
        }
    })
}


//remove genre
if($('#removeGenreButton').length && $('#addGenreButton').length) {
    $('#removeGenreButton').preventDefault;
    $('#removeGenreButton').click(() => {
        let keyword = $('#oldGenreInput').val();
        window.location = `/removekeyword/${keyword}`;
    });

    $('#addGenreButton').preventDefault;
    $('#addGenreButton').click(() => {
        let keyword = $('#newGenreInput').val();
        window.location = `/addkeyword/${keyword}`;
    });
}

//add music
if($('#addMusicButton').length && $('#removeMusicButton')) {
    $('#addMusicButton').preventDefault;
    $('#addMusicButton').click(() => {
        let music = $('#newMusicInput').val();
        window.location = `/addTrackToAccount/${music}`;
    });

    $('#removeMusicButton').preventDefault;
    $('#removeMusicButton').click(() => {
        let music = $('#oldMusicInput').val();
        window.location = `/removetrack/${music}`;
    });
}

if($('#openMenu').length && $('#modalMenu').length) {
    let openMenu = $('#openMenu');
    let modalMenu = $('#modalMenu');
    let closeMenu = $('#closeMenu');
    openMenu.click(() => {
        modalMenu.show();
        $("body").css("overflow", "hidden");
    });

    closeMenu.click(() => {
        modalMenu.hide();
        $("body").css("overflow", "visible");
    })
}

function setDarkMode() {
    const body = $('body')[0];
    body.classList.toggle('darkmode');
}

$('#darkModeLink').click(() => setDarkMode());
