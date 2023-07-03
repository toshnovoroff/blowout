function handleChange() {
    const input = document.querySelector('input[type="file"]');
    const span = document.querySelector('.input-file span');

    input.addEventListener('change', function () {
        span.textContent = input.files[0].name;
    });
}

handleChange();

const addOpenBtn = document.getElementById('addOpenBtn');
const addModalCont = document.getElementById('addModalCont');
const body = document.getElementById('body');

addOpenBtn.addEventListener('click', function (e) {
    addModalCont.style.display = 'flex';
    body.classList.add('scroll-lock');

    // Get the review ID
    const reviewId = e.target.getAttribute('data-review-id');

    // Set the form action dynamically
    const addReplyForm = document.querySelector('.aut-add-modal-form');
    addReplyForm.action = '/reviews/' + reviewId + '/add-reply';

    // Set the review ID value in the hidden input field
    const reviewIdInput = document.querySelector('input[name="review_id"]');
    reviewIdInput.value = reviewId;
});

addModalCont.addEventListener('click', function (e) {
    if (e.target.id === 'addModalCont') {
        addModalCont.style.display = 'none';
        body.classList.remove('scroll-lock');
    }
});

const addCloseBtn = document.getElementById('addCloseBtn');
addCloseBtn.addEventListener('click', function (e) {
    addModalCont.style.display = 'none';
    body.classList.remove('scroll-lock');
});

const addModal = document.getElementById('addModal');
addModal.addEventListener('click', function (e) {
    e.stopPropagation();
});

document.addEventListener("DOMContentLoaded", function () {
    const addButton = document.querySelector('.add-button');
    addButton.addEventListener('click', function (event) {
        event.preventDefault(); // Prevent the default form submission behavior
        const form = document.querySelector('.aut-add-modal-form');
        form.submit(); // Manually trigger the form submission
    });
});
