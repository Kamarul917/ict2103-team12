
// returns true or false
function validateCreditCardNumber(cardNumber) {
    cardNumber = cardNumber.split(' ').join("");
    if (parseInt(cardNumber) <= 0 || (!/\d{15,16}(~\W[a-zA-Z])*$/.test(cardNumber)) || cardNumber.length > 16) {
        return false;
    }
    var carray = new Array();
    for (var i = 0; i < cardNumber.length; i++) {
        carray[carray.length] = cardNumber.charCodeAt(i) - 48;
    }
    carray.reverse();
    var sum = 0;
    for (var i = 0; i < carray.length; i++) {
        var tmp = carray[i];
        if ((i % 2) != 0) {
            tmp *= 2;
            if (tmp > 9) {
                tmp -= 9;
            }
        }
        sum += tmp;
    }
    return ((sum % 10) === 0);
}

function cardType(cardNumber) { // returns card type
    cardNumber = cardNumber.split(' ').join("");
    var o = {
        electron: /^(4026|417500|4405|4508|4844|4913|4917)\d+$/,
        maestro: /^(5018|5020|5038|5612|5893|6304|6759|6761|6762|6763|0604|6390)\d+$/,
        dankort: /^(5019)\d+$/,
        unionpay: /^(62|88)\d+$/,
        visa: /^4[0-9]{12}(?:[0-9]{3})?$/,
        mastercard: /^5[1-5][0-9]{14}$/,
        amex: /^3[47][0-9]{13}$/
    };
    for (var k in o) {
        if (o[k].test(cardNumber)) {
            return k;
        }
    }
    return null;
}

var validcc = false;
var validdate = false;

function update(cardNumber) {
    var img = document.getElementById("cc-img");
    if (validateCreditCardNumber(cardNumber)) {
        img.src = "images/" + (cardType(cardNumber) || "cc") + ".png";
        valid.innerText = "Valid credit card number.";
        validcc = true;
        
        var check1 = document.getElementById("creditcardwrong-error");
        if (check1 !== null) {
            check1.remove();
        }
    } else {
        validcc = false;
        img.src = "images/cc.png";
        valid.innerText = "Please enter a valid credit card number.";
        document.getElementById("proceedbutton1").disabled = true;
        var check = document.getElementById("creditcardwrong-error");
        if (check === null) {
            var tag = document.createElement("p");
            tag.setAttribute("id", "creditcardwrong-error");
            var text = document.createTextNode("Please enter a valid credit card number.");
            document.getElementById("proceedbutton1").disabled = true;
            tag.appendChild(text);
        }
        var element = document.getElementById("messages");
        element.appendChild(tag);
    }
}

function dateCheck() {
    //update value every run
    var expiry_month = document.getElementById("expireMM").value;
    var expiry_year = document.getElementById("expireYY").value;
    var today = new Date();
    var selDate = new Date();
    if (today.getTime() > selDate.setFullYear(expiry_year, expiry_month)) {
        validdate = false;
        //expiry date is before current time --> wrong expiry date
        document.getElementById("proceedbutton1").disabled = true;
        var check = document.getElementById("ccdatewrong-error");
        if (check === null) {
            var tag = document.createElement("p");
            tag.setAttribute("id", "ccdatewrong-error");
            var text = document.createTextNode("Expiry month and year cannot be blank / Expiry month and year is before today month and year.");
            tag.appendChild(text);
        }
        var element = document.getElementById("messages");
        element.appendChild(tag);
        return false;
    } else {
        //expiry date is after current time
        validdate = true;
        var check1 = document.getElementById("ccdatewrong-error");
        if (check1 !== null) {
            check1.remove();
        }
    }
}

function checkInputs() {
    var isValid = true;
    $('input').filter('[required]').each(function () {
        if ($(this).val() === '') {
            $('#proceedbutton1').prop('disabled', true);
            isValid = false;
            return false;
        }
    });
    
    $('select').filter('[required]').each(function () {
        if (($(this).val() === 'Month') || ($(this).val() === 'Year')) {
            $('#proceedbutton1').prop('disabled', true);
            isValid = false;
            return false;
        }
    });
    
    if ((isValid) && (validcc) && (validdate)) {
        $('#proceedbutton1').prop('disabled', false);
    }
    return isValid;
}

//Enable or disable button based on if inputs are filled or not
$('input').filter('[required]').on('keyup change', function () {
    checkInputs();
});

$('select').filter('[required]').on('keyup change', function () {
    checkInputs();
});

checkInputs();
      