const swiper = new Swiper('.swiper', {
    spaceBetween: 40,
    freeMode: true,
    slidesPerView: 3,
    grabCursor: true,
    slidesOffsetBefore: 300
});

document.addEventListener("DOMContentLoaded", function () {
    const addToCartBtn = document.querySelector(".product-add-btn");
    addToCartBtn.addEventListener("click", addToCart);

    function addToCart(event) {
        const productId = event.target.getAttribute("data-product-id");
        const url = "/add-to-cart";
        const data = {
            product_id: productId
        };

        fetch(url, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify(data)
        })
            .then(response => response.json())
            .then(result => {
                console.log(result);
                // Handle the result as needed
            })
            .catch(error => {
                console.error("Error:", error);
            });
    }
});