const formDataEvent = document.querySelectorAll('.formDataEvent');
const ShippingFormSubmit = document.querySelector('#ShippingFormSubmit');

//Input fields

for (let formDataInput of formDataEvent) {
    formDataInput.addEventListener('focusin', function() {
        this.classList.add('formDataFocus');
        this.previousElementSibling.classList.add('clickFormData');
    })
}

for (let formDataInput of formDataEvent) {
    formDataInput.addEventListener('focusout', function() {
        this.classList.remove('formDataFocus');
        if (this.value === "") {
            this.previousElementSibling.classList.remove('clickFormData');
        }
    })
}

//Validating Input Data

const cardnumber = document.querySelector('#cardnumber');
cardnumber.addEventListener('input', function() {
    const pat_cardnumber = new RegExp("^(?:4[0-9]{12}(?:[0-9]{3})?|[25][1-7][0-9]{14}|6(?:011|5[0-9][0-9])[0-9]{12}|3[47][0-9]{13}|3(?:0[0-5]|[68][0-9])[0-9]{11}|(?:2131|1800|35\d{3})\d{11})$");
    if (pat_cardnumber.test(cardnumber.value)) {
        this.classList.remove('formDataInvalid');
        this.classList.add('formDataValid');
        ShippingFormSubmit.removeAttribute('disabled');
        ShippingFormSubmit.classList.remove('formItemDisabled');
    } else {
        this.classList.add('formDataInvalid');
        ShippingFormSubmit.setAttribute('disabled', 'disabled');
        ShippingFormSubmit.classList.add('formItemDisabled');
    }
})

const securitycode = document.querySelector('#securitycode');
securitycode.addEventListener('input', function() {
    const pat_securitycode = new RegExp("^[0-9]{3,4}$");
    if (pat_securitycode.test(securitycode.value)) {
        this.classList.remove('formDataInvalid');
        this.classList.add('formDataValid');
        ShippingFormSubmit.removeAttribute('disabled');
        ShippingFormSubmit.classList.remove('formItemDisabled');
    } else {
        this.classList.add('formDataInvalid');
        ShippingFormSubmit.setAttribute('disabled', 'disabled');
        ShippingFormSubmit.classList.add('formItemDisabled');
    }
})

securitycode.addEventListener('focusin' , function() {
    this.setAttribute('placeholder', '3 or 4 digits code on the card');
})
securitycode.addEventListener('focusout' , function() {
    this.setAttribute('placeholder', '');
})

const expdate = document.querySelector('#exdate');
expdate.addEventListener('input', function() {
    const pat_expdate = new RegExp("^(0[1-9]|1[0-2])\/?([0-9]{2})$");
    if (pat_expdate.test(expdate.value)) {
        this.classList.remove('formDataInvalid');
        this.classList.add('formDataValid');
        ShippingFormSubmit.removeAttribute('disabled');
        ShippingFormSubmit.classList.remove('formItemDisabled');
    } else {
        this.classList.add('formDataInvalid');
        ShippingFormSubmit.setAttribute('disabled', 'disabled');
        ShippingFormSubmit.classList.add('formItemDisabled');
    }
})

expdate.addEventListener('focusin' , function() {
    this.setAttribute('placeholder', 'MM/YY');
})
expdate.addEventListener('focusout' , function() {
    this.setAttribute('placeholder', '');
})

const formEvents = document.querySelectorAll('.formEvent');

const cashOption = document.querySelector('#cash');
cashOption.addEventListener('click', function(e) {
    if (cashOption.checked){
        for (let formEvent of formEvents) {
            formEvent.classList.add('hide');
        }
        document.querySelectorAll('.formEvent');
        cardnumber.setAttribute('disabled','disabled');
        (document.getElementById('visa')).setAttribute('disabled', 'disabled');
        (document.getElementById('american')).setAttribute('disabled', 'disabled');
        (document.getElementById('others')).setAttribute('disabled', 'disabled');
        (document.getElementById('exdate')).setAttribute('disabled', 'disabled');
        (document.getElementById('securitycode')).setAttribute('disabled', 'disabled');
        (document.getElementById('firstname')).setAttribute('disabled', 'disabled');
        (document.getElementById('lastname')).setAttribute('disabled', 'disabled');

    }
})

const paypalOption = document.querySelector('#paypal');
paypalOption.addEventListener('click', function(e) {
    if (paypalOption.checked){
        for (let formEvent of formEvents) {
            formEvent.classList.add('hide');
        }
        cardnumber.setAttribute('disabled','disabled');
        (document.getElementById('visa')).setAttribute('disabled', 'disabled');
        (document.getElementById('american')).setAttribute('disabled', 'disabled');
        (document.getElementById('others')).setAttribute('disabled', 'disabled');
        (document.getElementById('exdate')).setAttribute('disabled', 'disabled');
        (document.getElementById('securitycode')).setAttribute('disabled', 'disabled');
        (document.getElementById('firstname')).setAttribute('disabled', 'disabled');
        (document.getElementById('lastname')).setAttribute('disabled', 'disabled');
    }
})

const cardOption = document.querySelector('#cardOption')
cardOption.addEventListener('click', function(e) {
    if (cardOption.checked){
        for (let formEvent of formEvents) {
            formEvent.classList.remove('hide');
        }
        cardnumber.removeAttribute('disabled');
        (document.getElementById('visa')).removeAttribute('disabled');
        (document.getElementById('american')).removeAttribute('disabled');
        (document.getElementById('others')).removeAttribute('disabled');
        (document.getElementById('exdate')).removeAttribute('disabled');
        (document.getElementById('securitycode')).removeAttribute('disabled');
        (document.getElementById('firstname')).removeAttribute('disabled');
        (document.getElementById('lastname')).removeAttribute('disabled');
    }
})
