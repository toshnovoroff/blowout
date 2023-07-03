function handleChange() {
    const input = document.querySelector('input[type="file"]');
    const span = document.querySelector('.input-file span');

    input.addEventListener('change', function () {
        span.textContent = input.files[0].name;
    });
}

handleChange();

addOpenBtn.addEventListener('click', function (e) {
    addModalCont.style.display = 'flex'
    body.classList.add('scroll-lock')
})

addModalCont.onclick = (e) => {
    e.stopPropagation();
    addModalCont.style.display = 'none'
    body.classList.remove('scroll-lock')
}

addCloseBtn.addEventListener('click', function (e) {
    e.stopPropagation();
    addModalCont.style.display = 'none'
    body.classList.remove('scroll-lock')
})

addModal.onclick = (e) => {
    e.stopPropagation();
}

document.addEventListener("DOMContentLoaded", function () {
    const addButton = document.querySelector('.add-button');
    addButton.addEventListener('click', function (event) {
        event.preventDefault(); // Prevent the default form submission behavior
        const form = document.querySelector('.aut-add-modal-form');
        form.submit(); // Manually trigger the form submission
    });
});