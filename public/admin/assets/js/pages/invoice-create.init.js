/*
Template Name: Tailwick - Admin & Dashboard Template
Author: Themesdesign
Website: https://themesdesign.in/
Contact: Themesdesign@gmail.com
File: Invoice create init Js File
*/

// price calculation
const addBtn = document.querySelector('#addBtn');
addBtn.addEventListener('click', (event) => {
    new_link()
});
const customSoftSwitch = document.querySelector('#customSoftSwitch');
customSoftSwitch.addEventListener('change', (event) => {
    billingFunction()
});
function inputSpinComponents() {
    isData();
    function isData() {
        const plusElements = document.querySelectorAll('button.btn-plus');
        const minusElements = document.querySelectorAll('button.btn-minus');

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
        var productRow = quantityInput.closest('.item');
        var productList = quantityInput.closest('.item-list');
        var price = parseFloat(productRow.querySelector('.item-price')?.value || 0);

        var quantity = parseFloat(quantityInput.value);
        var linePrice = price * quantity;
        Array.from(productRow.getElementsByClassName('item-line-price')).forEach(function (e) {
            e.value = linePrice.toFixed(2);
            recalculateCart();
        });
    }
    // Add remove button functionality
    function removeBtn(productElement) {
        var productRow = productElement.closest('.item');
        var removeButton = productRow.querySelector('.remove-button');
        if (removeButton) {
            removeButton.addEventListener('click', function () {
                productRow.remove();
                recalculateCart();
            });
        }
    }
    function recalculateCart() {
        var elm = document.querySelectorAll(".item-list");
        var subtotal = 0;

        Array.from(elm).forEach(function (element) {
            Array.from(element.getElementsByClassName("item")).forEach(function (item) {
                Array.from(item.getElementsByClassName('item-line-price')).forEach(function (e) {
                    subtotal += parseFloat(e.value);
                });
            });
        });
        var itemList = document.querySelector(".item-list");

        var currencySign = "$";
        var taxRate = document.querySelector(".item-text")?.value || 0;
        var shippingRate = 85.00;
        var discountRate = document.querySelector(".item-discount").value;
        /* Calculate totals */
        var tax = (taxRate > 0) ? (subtotal * taxRate) / 100 : subtotal;
        var discount = (discountRate > 0) ? (subtotal * discountRate) / 100 : subtotal;
        // var discount = subtotal * discountRate;

        var shipping = (subtotal > 0 ? shippingRate : 0);
        var newTotal = subtotal + tax + shipping - discount;

        // set value in inputs
        const cartSubtitle = itemList.parentElement.querySelector("#totalAmount .cart-subtotal")
        if (cartSubtitle) {
            cartSubtitle.value = currencySign + subtotal.toFixed(2);
        }
        const cartTex = itemList.parentElement.querySelector("#totalAmount .cart-tax")
        if (cartTex) {
            cartTex.value = currencySign + tax.toFixed(2);
        }
        const cartShipping = itemList.parentElement.querySelector("#totalAmount .cart-shipping")
        if (cartShipping) {
            cartShipping.value = currencySign + shipping.toFixed(2);
        }
        const cartTotal = itemList.parentElement.querySelector("#totalAmount .cart-total")
        if (cartTotal) {
            cartTotal.value = currencySign + newTotal.toFixed(2);
        }
        const cartDiscountinvoce = itemList.parentElement.querySelector(".item-list .cart-discount")
        if (cartDiscountinvoce) {
            cartDiscountinvoce.value = "-" + currencySign + discount.toFixed(2);
        }
        const cartDiscount = itemList.parentElement.querySelector("#totalAmount .cart-discount")
        if (cartDiscount) {
            cartDiscount.value = "-" + currencySign + discount.toFixed(2);
        }
        const totalPaymentUInput = document.querySelector("#totalPayment")
        if (totalPaymentUInput) {
            totalPaymentUInput.value = currencySign + newTotal.toFixed(2);
        }
    }
}

// Function to get the input element from the parent hierarchy
function getDivFromTheElement(element) {
    let temp = element.parentNode.querySelector('input.item-quantity');

    if (!temp) {
        const upperParent = element.parentNode;
        return getDivFromTheElement(upperParent);
    }
    return temp;
}
inputSpinComponents();

var count = 2;
function new_link() {
    var delLink =
        ` <tbody class="before:block before:h-3 item-list">
            <tr class="item">
                <td class="border border-slate-200 dark:border-zink-500">
                    <input type="text" id="itemName`+ count + `" class="px-3.5 py-2.5 border-none form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="نام ایتم" required>
                </td>
                <td class="w-40 border border-slate-200 dark:border-zink-500">
                    <div class="flex justify-center text-center input-step">
                        <button type="button" class="border w-9 h-9 leading-[15px] btn-minus bg-white dark:bg-zink-700 dark:border-zink-500 ltr:rounded-l rtl:rounded-r transition-all duration-200 ease-linear border-slate-200 text-slate-500 dark:text-zink-200 hover:bg-custom-500 dark:hover:bg-custom-500 hover:text-custom-50 dark:hover:text-custom-50 hover:border-custom-500 dark:hover:border-custom-500 focus:bg-custom-500 dark:focus:bg-custom-500 focus:border-custom-500 dark:focus:border-custom-500 focus:text-custom-50 dark:focus:text-custom-50"><i data-lucide="minus" class="inline-block w-4 h-4"></i></button>
                        <input type="number" class="w-12 text-center ltr:pl-2 rtl:pr-2 h-9 border-y product-quantity dark:bg-zink-700 focus:shadow-none dark:border-zink-500 item-quantity" value="0" min="0" max="100" readonly="">
                        <button type="button" class="transition-all duration-200 ease-linear bg-white border dark:bg-zink-700 dark:border-zink-500 ltr:rounded-r rtl:rounded-l w-9 h-9 border-slate-200 btn-plus text-slate-500 dark:text-zink-200 hover:bg-custom-500 dark:hover:bg-custom-500 hover:text-custom-50 dark:hover:text-custom-50 hover:border-custom-500 dark:hover:border-custom-500 focus:bg-custom-500 dark:focus:bg-custom-500 focus:border-custom-500 dark:focus:border-custom-500 focus:text-custom-50 dark:focus:text-custom-50"><i data-lucide="plus" class="inline-block w-4 h-4"></i></button>
                    </div>
                </td>
                <td class="w-40 border border-slate-200 dark:border-zink-500">
                    <input type="number" id="itemName`+ count + `" class="px-3.5 py-2.5 border-none form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200 item-price" placeholder="$00.00" required>
                </td>
                <td class="w-40 border border-slate-200 dark:border-zink-500">
                    <input type="text" id="itemName`+ count + `" class="px-3.5 py-2.5 border-none form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="0%" required>
                </td>
                <td class="w-40 border border-slate-200 dark:border-zink-500">
                    <input type="text" id="itemName`+ count + `" class="px-3.5 py-2.5 border-none form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="0%" required>
                </td>
                <td class="border border-slate-200 dark:border-zink-500" rowspan="2">
                    <div class="mb-1">
                        <input type="text" id="ItemTotal" class="px-3.5 py-2.5 border-none form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200 item-line-price" placeholder="$00.00" readonly>
                    </div>
                    <input type="text" id="itemDiscountsInput" class="px-3.5 pb-2.5 pt-0 border-none form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200 cart-discount" placeholder="-$00.00" readonly>
                </td>
            </tr>
            <tr>
                <td class="border border-slate-200 dark:border-zink-500">
                    <input type="text" id="itemdescription`+ count + `" class="px-3.5 py-2.5 border-none form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="توضیحات را وارد کنید (اختیاری)" required>
                </td>
                <td class="border border-slate-200 dark:border-zink-500 px-3.5 py-1.5 text-center">
                    <button type="button" class="px-2 py-1.5 text-xs text-red-500 bg-red-100 btn hover:text-white hover:bg-red-600 focus:text-white focus:bg-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:ring active:ring-red-100 dark:bg-red-500/20 dark:text-red-500 dark:hover:bg-red-500 dark:hover:text-white dark:focus:bg-red-500 dark:focus:text-white dark:active:bg-red-500 dark:active:text-white dark:ring-red-400/20 product-removal"><i data-lucide="trash-2" class="inline-block w-3 h-3 mr-1 align-middle"></i> <span class="align-middle">حذف</span></button>
                </td>
                <td colspan="3" class="border border-slate-200 dark:border-zink-500"></td>
            </tr>
        </tbody>`
    document.getElementById("invoiceTable").insertAdjacentHTML("beforeBegin", delLink);
    count++;

    // Assuming "invoiceTable" is the ID of the element you want to append to
    var genericExamples = document.querySelectorAll("[data-trigger]");
    Array.from(genericExamples).forEach(function (genericExamp) {
        var element = genericExamp;
        new Choices(element, {
            placeholderValue: "This is a placeholder set in the config",
            searchPlaceholderValue: "This is a search placeholder",
        });
    });

    // reinitialize js
    lucide.createIcons();
    inputSpinComponents();
    remove()
}

//Lucide icons js
function remove() {
    var removeProduct = document.querySelectorAll(".item-list .product-removal")
    Array.from(removeProduct).forEach(function (el) {
        el.addEventListener("click", function (e) {
            removeItem(e);
        });
    });
}

/* Remove item from cart */
function removeItem(removeButton) {
    removeButton.target.closest("tbody").remove();
}
remove();


//Address
function billingFunction() {
    if (document.getElementById("customSoftSwitch").checked) {
        document.getElementById("fullNameBillingInput").value =
            document.getElementById("fullNameShippingInput").value;
        document.getElementById("phoneNoBillingInput").value =
            document.getElementById("phoneNoShippingInput").value;
        document.getElementById("alternativeNoBillingInput").value =
            document.getElementById("alternativeNoShippingInput").value;
        document.getElementById("taxBillingInput").value =
            document.getElementById("taxShippingInput").value;
        document.getElementById("addressBillingInput").value =
            document.getElementById("addressShippingInput").value;
    } else {
        document.getElementById("fullNameBillingInput").value = "";
        document.getElementById("phoneNoBillingInput").value = "";
        document.getElementById("alternativeNoBillingInput").value = "";
        document.getElementById("taxBillingInput").value = "";
    }
}

document.querySelector(".changeAddress").addEventListener("change", (event) => {
    billingFunction();
})