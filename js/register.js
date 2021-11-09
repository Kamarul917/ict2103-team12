function checkInputs() {
    var isValid = true;
    $('input').filter('[required]').each(function () {
        if ($(this).val() === '') {
            document.getElementById("register-btn").disabled = true;
            isValid = false;
            return false;
        }
    });
    if (isValid) {
        document.getElementById("register-btn").disabled = false;
    }
    return isValid;
}

function checkPassword() {
    $('#pwd').keyup(function () {
        var password = $('#pwd').val();

        if (password.length === 0) {
            $('#password-strength').removeClass('progress-bar-danger');
            $('#result').removeClass('text-danger');
            $('#result').removeClass('text-success');
            $('#result').removeClass('text-warning');
            $('#result').addClass('text-dark').text('Password not entered!');
            $('#password-strength').css('width', '0%');
            document.getElementById("register-btn").disabled = true;
        } else {
            if (checkStrength(password) === true) {
                document.getElementById("register-btn").disabled = false;
            } else {
                document.getElementById("register-btn").disabled = true;
            }
        }
    });

    function checkStrength(password) {
        var strength = 0;

        //If password contains both lower and uppercase characters, increase strength value.
        if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) {
            strength += 1;
            $('.low-upper-case').addClass('text-success');
            $('.low-upper-case i').removeClass('bx bx-x').addClass('bx bx-check');
            $('#popover-password-top').addClass('hide');


        } else {
            $('.low-upper-case').removeClass('text-success');
            $('.low-upper-case i').removeClass('bx bx-check').addClass('bx bx-x');
            $('#popover-password-top').removeClass('hide');
        }

        //If it has numbers and characters, increase strength value.
        if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) {
            strength += 1;
            $('.one-number').addClass('text-success');
            $('.one-number i').removeClass('bx bx-x').addClass('bx bx-check');
            $('#popover-password-top').addClass('hide');

        } else {
            $('.one-number').removeClass('text-success');
            $('.one-number i').removeClass('bx bx-check').addClass('bx bx-x');
            $('#popover-password-top').removeClass('hide');
        }

        //If it has one special character, increase strength value.
        if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) {
            strength += 1;
            $('.one-special-char').addClass('text-success');
            $('.one-special-char i').removeClass('bx bx-x').addClass('bx bx-check');
            $('#popover-password-top').addClass('hide');

        } else {
            $('.one-special-char').removeClass('text-success');
            $('.one-special-char i').removeClass('bx bx-check').addClass('bx bx-x');
            $('#popover-password-top').removeClass('hide');
        }

        if (password.length > 7) {
            strength += 1;
            $('.eight-character').addClass('text-success');
            $('.eight-character i').removeClass('bx bx-x').addClass('bx bx-check');
            $('#popover-password-top').addClass('hide');

        } else {
            $('.eight-character').removeClass('text-success');
            $('.eight-character i').removeClass('bx bx-check').addClass('bx bx-x');
            $('#popover-password-top').removeClass('hide');
        }

        // If value is less than 2

        if (strength < 2) {
            $('#result').removeClass();
            $('#password-strength').addClass('progress-bar-danger');
            $('#result').addClass('text-danger').text('Weak');
            $('#password-strength').css('width', '10%');

        } else if (strength < 4 && strength >= 2) {
            $('#result').removeClass();
            $('#password-strength').removeClass('progress-bar-danger');
            $('#password-strength').addClass('progress-bar-warning');
            $('#result').addClass('text-warning').text('Moderate');
            $('#password-strength').css('width', '60%');

        } else if (strength === 4) {
            $('#result').removeClass();
            $('#password-strength').removeClass('progress-bar-warning');
            $('#password-strength').addClass('progress-bar-success');
            $('#result').addClass('text-success').text('Strong');
            $('#password-strength').css('width', '100%');
            return true;
        }

        if ($('#pwd').val().length < 1) {
            $('#password-strength').removeClass('progress-bar-danger');
            $('#result').removeClass('text-danger');
            $('#result').addClass('text-dark').text('Password not entered!');
            $('#password-strength').css('width', '0%');
        }
    }
}

//Enable or disable button based on if inputs are filled or not
$('input').filter('[required]').on('keyup', function () {
    checkInputs();
    checkPassword();
});

checkInputs();
checkPassword();

console.log(checkInputs());
console.log(checkPassword());