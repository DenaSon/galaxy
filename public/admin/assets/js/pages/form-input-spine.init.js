// Function to get the input element from the parent hierarchy
function getDivFromTheElement(element) {
    let temp = element.parentNode.querySelector('input.product-quantity');

    if (!temp) {
        const upperParent = element.parentNode;
        return getDivFromTheElement(upperParent);
    }
    return temp;
}


function isData() {
    const plusElements = document.querySelectorAll('button.plusBtn');
    const minusElements = document.querySelectorAll('button.minusBtn');

    if (plusElements.length) {
        plusElements.forEach(element => {
            element.addEventListener('click', (event) => {
                const inputElement = getDivFromTheElement(event.target);
                let inputVal = Number(inputElement.value);
                const maxVal = Number(inputElement.getAttribute('max'));
                if (inputVal < maxVal) {
                    inputElement.value = inputVal + 1;
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
                }
            });
        });
    }
}

isData()