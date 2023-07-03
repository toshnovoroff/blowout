// Развертка меню
burgerBtn.onclick = () => {
    if (document.getElementById('burgerNavList').className==('burger-nav-bottom-open')){
        burgerNavList.classList.toggle('burger-nav-bottom')
    } else{
        burgerNavList.classList.toggle('burger-nav-bottom-open')
    }
}