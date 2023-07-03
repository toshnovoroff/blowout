// Работа модального окна изменения данных пользователя
editOpenBtn.addEventListener('click', function(e) {
    bigEditModal.style.display='flex'
    body.classList.add('scroll-lock')
})

bigEditModal.onclick = (e) => {
    e.stopPropagation();
    bigEditModal.style.display = 'none'
    body.classList.remove('scroll-lock')
}

editCloseBtn.addEventListener('click', function(e) {
    e.stopPropagation();
    bigEditModal.style.display='none'
    body.classList.remove('scroll-lock')
})
    
minorEditModal.onclick = (e) => {
    e.stopPropagation();
}

// Развертка опций выбора пола
// sexButton.onclick = () => {
//     if (document.getElementById('minorEditModal').className==('edit-page-modal')){
//         sexButton.classList.toggle('input-box-arrow-open')
//         sexOptions.classList.toggle('sex-options-open')
//         minorEditModal.classList.remove('edit-page-modal')
//         minorEditModal.classList.add('edit-page-modal-low') 
//     } else{
//         sexButton.classList.toggle('input-box-arrow-open')
//         sexOptions.classList.toggle('sex-options-open')
//         minorEditModal.classList.remove('edit-page-modal-low')
//         minorEditModal.classList.add('edit-page-modal')
//     }
// }

// sexButton.addEventListener('click', function() {
//     if (sexOptions.style.display=='flex'){
//         sexOptions.style.display='none'
//     }
// })

//Выбор и замена пола
// const checkboxes = document.querySelectorAll(".box-box");
// const inputBoxText = document.querySelector(".input-box-text");

// for (let i = 0; i < checkboxes.length; i++) {
//   checkboxes[i].addEventListener('click', function() {
//     if (this.checked) {
//       for (let j = 0; j < checkboxes.length; j++) {
//         if (checkboxes[j] !== this) {
//           checkboxes[j].checked = false;
//         }
//       }
//       inputBoxText.innerText = this.name;
//     } else {
//       inputBoxText.innerText = 'Sex';
//     }
//   });
// }

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
      alert.style.color = 'red';
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

//Маска почты
const emailInput = document.querySelector('#eMail');
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

// Работа модального окна с описанием услуги
// serviceOpenBtn.addEventListener('click', function() {
//     bigServiceModal.style.display='flex'
//     body.classList.add('scroll-lock')
// })

// bigServiceModal.onclick = (e) => {
//     e.stopPropagation();
//     bigServiceModal.style.display = 'none'
//     body.classList.remove('scroll-lock')
// }

// serviceCloseBtn.addEventListener('click', function(e) {
//     e.stopPropagation();
//     bigServiceModal.style.display='none'
//     body.classList.remove('scroll-lock')
// })
    
// minorServiceModal.onclick = (e) => {
//     e.stopPropagation();
// }


const editForm = document.querySelector('#editForm');

editForm.addEventListener('submit', function (e) {
    e.preventDefault();

    // Perform AJAX request to update account info
    const formData = new FormData(this);
    const url = this.getAttribute('action');
    const method = this.getAttribute('method');

    fetch(url, {
        method: method,
        body: formData
    })
        .then(response => response.json())
        .then(data => {
            // Handle response data (e.g., display success message)
            console.log(data);
        })
        .catch(error => {
            // Handle error (e.g., display error message)
            console.error(error);
        });
});