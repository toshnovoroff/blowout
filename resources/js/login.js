const emailInput = document.querySelector('#AutEMailInput');
const emailAlert = document.createElement('span');
emailAlert.textContent = 'Please enter a valid email address';
emailAlert.style.color = 'red';
emailInput.insertAdjacentElement('afterend', emailAlert);
emailAlert.style.display = 'none';

emailInput.addEventListener('input', function() {
    if (this.value === '') {
        emailAlert.style.display = 'none';
        this.style.borderColor = 'black';
    } else if (this.value.includes('@')) {
        this.style.borderColor = 'black';
        emailAlert.style.display = 'none';
    } else {
        this.style.borderColor = 'red';
        emailAlert.style.display = 'block';
    }
});

const form = document.querySelector('.aut-form');
const passwordInput = document.querySelector('#AutPasInput');
const formAlert = document.createElement('span');
formAlert.textContent = 'Please fill in all required fields';
formAlert.style.color = 'red';
form.insertAdjacentElement('beforebegin', formAlert);
formAlert.style.display = 'none';

form.addEventListener('submit', function(event) {
    if (emailInput.value === '' || passwordInput.value === '') {
        event.preventDefault();
        formAlert.style.display = 'block';
    } else {
        formAlert.style.display = 'none';
    }
});

emailInput.addEventListener('input', function() {
    if (this.value === '' && passwordInput.value === '') {
        formAlert.style.display = 'none';
    }
});

passwordInput.addEventListener('input', function() {
    if (this.value === '' && emailInput.value === '') {
        formAlert.style.display = 'none';
    }
});