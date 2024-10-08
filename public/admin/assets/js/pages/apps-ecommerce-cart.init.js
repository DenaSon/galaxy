// Function to get the input element from the parent hierarchy
function getDivFromTheElement(element) {
    let temp = element.parentNode.querySelector('input.products-quantity');

    if (!temp) {
        const upperParent = element.parentNode;
        return getDivFromTheElement(upperParent);
    }
    return temp;
}

function inputSpinComponents() {
    isData();

        function isData() {
            const plusElements = document.querySelectorAll('button.plus-value');
            const minusElements = document.querySelectorAll('button.minus-value');

            if (plusElements.length) {
                plusElements.forEach(element => {
                    element.addEventListener('click', (event) => {
                        const inputElement = getDivFromTheElement(event.target);
                        let inputVal = Number(inputElement.value);
                        const maxVal = Number(inputElement.getAttribute('max'));
                        if (inputVal < maxVal) {
                            inputElement.value = inputVal + 1;
                            updateQuantity(inputElement);
                            removeBtn(inputElement)
                        }
                    });
                });
            }

            if (minusElements.length) {
                minusElements.forEach(element => {
                    element.addEventListener('click', (event) => {
                        const inputElement = getDivFromTheElement(event.target);
                        let inputVal = Number(inputElement.value);
                        const minVal = Number(inputElement.getAttribute('min'));
                        if (inputVal > minVal) {
                            inputElement.value = inputVal - 1;
                            updateQuantity(inputElement);
                            removeBtn(inputElement)
                        }
                    });
                });
            }
        }

    function updateQuantity(quantityInput) {
        var productRow = quantityInput.closest('.products');
        var productList = quantityInput.closest('.products-list');
        var price = parseFloat(productRow.querySelector('.products-price span')?.innerHTML || 0);
        var quantity = parseFloat(quantityInput.value);
        var linePrice = price * quantity;

        Array.from(productRow.getElementsByClassName('products-line-price')).forEach(function (e) {
            e.innerHTML = linePrice.toFixed(2);
            recalculateCart();
        });
    }
    // Add remove button functionality
    function removeBtn(productElement) {
        var productRow = productElement.closest('.products');
        var removeButton = productRow.querySelector('.remove-button');
        if (removeButton) {
            removeButton.addEventListener('click', function () {
                document.querySelector("#deleteRecord").addEventListener("click", () => {
                    productRow.remove();
                    recalculateCart();
                })
            });
        }
    }
    function recalculateCart() {
        var elm = document.querySelector(".products-list");
        var subtotal = 0;
        Array.from(elm.getElementsByClassName("products")).forEach(function (item) {
            Array.from(item.getElementsByClassName('products-line-price')).forEach(function (e) {
                subtotal += parseFloat(e.innerHTML);
            });
        });
        var currencySign = "$";
        var taxRate = 0.125;
        var shippingRate = 65.00;
        var discountRate = 0.15;
        /* Calculate totals */
        var tax = subtotal * taxRate;
        var discount = subtotal * discountRate;

        var shipping = (subtotal > 0 ? shippingRate : 0);
        var newTotal = subtotal + tax + shipping - discount;
        const cartSubtitle = elm.parentElement.querySelector(".table-total .cart-subtotal")
        if (cartSubtitle) {
            cartSubtitle.innerHTML = currencySign + subtotal.toFixed(2);
        }
        const cartTex = elm.parentElement.querySelector(".table-total .cart-tax")
        if (cartTex) {
            cartTex.innerHTML = currencySign + tax.toFixed(2);
        }
        const cartShipping = elm.parentElement.querySelector(".table-total .cart-shipping")
        if (cartShipping) {
            cartShipping.innerHTML = currencySign + shipping.toFixed(2);
        }
        const cartTotal = elm.parentElement.querySelector(".table-total .cart-total")
        if (cartTotal) {
            cartTotal.innerHTML = currencySign + newTotal.toFixed(2);
        }
        const cartDiscount = elm.parentElement.querySelector(".table-total .cart-discount")
        if (cartDiscount) {
            cartDiscount.innerHTML = "-" + currencySign + discount.toFixed(2);
        }
    }
}
inputSpinComponents()

// Lucid icons js
document.querySelector(".products-list").addEventListener("click", function (e) {
    if (e.target.classList.contains("remove-button")) {
        handleRemoveClick(e.target.closest(".products"));
    }
});

/* Handle remove button click */
function handleRemoveClick(productsElement) {
    document.getElementById("deleteRecord").addEventListener("click", function () {
        productsElement.remove();
    });
}
