// Работа ползунка оценки при оставлении отзыва
const value = document.querySelector("#value")
const input = document.querySelector("#range")
value.textContent = input.value
input.addEventListener("input", (event) => {
  value.textContent = event.target.value
})

// Работа модального окна с оставлением отзывов
reviewOpenBtn.addEventListener('click', function() {
    bigReviewModal.style.display='flex'
    body.classList.add('scroll-lock')
})

bigReviewModal.onclick = (e) => {
    e.stopPropagation();
    bigReviewModal.style.display = 'none'
    body.classList.remove('scroll-lock')
}

reviewCloseBtn.addEventListener('click', function(e) {
    e.stopPropagation();
    bigReviewModal.style.display='none'
    body.classList.remove('scroll-lock')
})
    
minorReviewModal.onclick = (e) => {
    e.stopPropagation();
}

function handleChange() {
    const input = document.querySelector('input[type="file"]');
    const span = document.querySelector('.input-file span');

    input.addEventListener('change', function () {
        span.textContent = input.files[0].name;
    });
}

handleChange();