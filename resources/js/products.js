// Открытие фильтров
filterOpenBtn.onclick = () => {
    productsFilters.style.display = 'flex'
    filterOpenBtn.style.display='none'
}

filtersCloseBtn.addEventListener('click', function() {
    productsFilters.style.display = 'none'
    filterOpenBtn.style.display='block'
})

//Скрытие функции фильтра
const filters = document.querySelectorAll('.filter-option');

filters.forEach(filter => {
    const filterButton = filter.querySelector('.open-dropdown');

    filterButton.addEventListener('click', () => {
        filterButton.classList.toggle('open-dropdown--open');

        const filterOptions = filter.querySelector('.options');

        filterOptions.classList.toggle('options--close');
    });
});