// Развертка опций выбора пола
sexButton.onclick = () => {
    if (document.getElementById('sexOptions').className==('sex-option')){
        sexButton.classList.toggle('input-box-arrow-open')
        sexOptions.classList.toggle('sex-options-open')
    } else{
        sexButton.classList.toggle('input-box-arrow-open')
        sexOptions.classList.toggle('sex-options-open')
    }
}

sexButton.addEventListener('click', function() {
    if (sexOptions.style.display=='flex'){
        sexOptions.style.display='none'
    }
})

//Выбор и замена пола
const checkboxes = document.querySelectorAll(".box-box");
const inputBoxText = document.querySelector(".input-box-text");

for (let i = 0; i < checkboxes.length; i++) {
  checkboxes[i].addEventListener('click', function() {
    if (this.checked) {
      for (let j = 0; j < checkboxes.length; j++) {
        if (checkboxes[j] !== this) {
          checkboxes[j].checked = false;
        }
      }
      inputBoxText.innerText = this.name;
    } else {
      inputBoxText.innerText = 'Sex';
    }
  });
}

//Маска даты
const bDate = document.querySelector('#bDate');
const alert = document.createElement('span');
alert.innerText = 'Invalid date format';
alert.style.display = 'none';
const alertContainer = document.createElement('div');
alertContainer.classList.add('alert-container');
alertContainer.appendChild(alert);
bDate.parentNode.insertBefore(alertContainer, bDate.nextSibling);

bDate.addEventListener('input', (e) => {
  const value = e.target.value;
  const lastChar = value[value.length - 1];
  if (isNaN(parseInt(lastChar))) {
    e.target.value = value.substring(0, value.length - 1);
  }
  if (value.length === 4 || value.length === 7) {
    e.target.value += '-';
  }
  if (value.length > 10) {
    e.target.value = value.substring(0, 10);
  }
  if (value.length === 10) {
    const [year, month, day] = value.split('-');
    if (month > 12 || day > 31 || year.length > 4 || month.length > 2 || day.length > 2) {
      alert.style.display = 'inline';
      bDate.style.borderColor = '#ff0000'
    } else {
      alert.style.display = 'none';
      bDate.style.borderColor = '#000000'
    }
  }
  if (value.length === 0) {
    alert.style.display = 'none';
    bDate.style.borderColor = '#000000'
  }
});