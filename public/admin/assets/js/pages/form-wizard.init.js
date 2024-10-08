document.addEventListener('DOMContentLoaded', function () {
    const tabs = document.querySelectorAll('ul.form-wizard a[data-tab-toggle]');
    const tabContents = document.querySelectorAll('.tab-pane');
    const prevBtn = document.querySelector('[data-action="prev"]');
    const nextBtn = document.querySelector('[data-action="next"]');

    let currentTab = 1;

    function switchTab(tabIndex) {
        activeHeaderTab(tabIndex)
        tabs.forEach(tab => tab.classList.remove('active'));
        tabContents.forEach(content => content.classList.add('hidden'));
        tabContents.forEach((content) => {
            if (content.getAttribute("data-tab-id") == tabIndex) {
                content.classList.remove("hidden")
            }
        });
        currentTab = tabIndex;
        updateButtonState();
    }

    function prevTab() {
        if (currentTab > 1) {
            switchTab(currentTab - 1);
        }
    }

    function nextTab() {
        if (validateForm()) {
            switchTab(++currentTab);
            clearErrors()
        }
    }
    function validateForm() {
        var isValid = true
        const currentTabele = document.getElementsByClassName("tab-pane")[currentTab - 1];
        const inputs = currentTabele.getElementsByTagName("input");

        // Example: Validate each input field
        for (let i = 0; i < inputs.length; i++) {
            if (inputs[i].type === "radio") {
                // Check if at least one radio button is selected in the group
                const radioGroup = document.getElementsByName(inputs[i].name);
                const isRadioSelected = Array.from(radioGroup).some(radio => radio.checked);

                if (!isRadioSelected) {
                    isValid = false;
                    return isValid;
                }
            }else if (inputs[i].value === "") {
                isValid = false;
                validate(currentTab)
                return isValid;
            }
        }

        return isValid;
    }
 
    function validate(currentTab) {
        var valid = true
         // First tab
        valid = validateField('nameInput', 'nameError', 'Name is required') && valid;
        valid = validateField('usernameInput', 'usernameError', 'UserName is required') && valid;
        valid = validateField('phoneNumberInput', 'phoneNumberError', 'Phone Number is required') && valid;
        valid = validateField('emailAddressInput', 'emailError', 'Email is required') && valid;
        valid = validateField('passwordInput', 'passwordError', 'Password is required') && valid;
        valid = validateField('passwordConfirmInput', 'cpasswordError', 'Confirm Password is required') && valid;

        // Second tab
        valid = validateField('FirstNameInput', 'FirstNameInputError', 'First Name is required') && valid;
        valid = validateField('lastNameInput', 'lastNameInputError', 'Last Name is required') && valid;
        valid = validateField('positionInput', 'positionInputError', 'position is required') && valid;
        valid = validateField('phoneNumberPersonalInput', 'phoneNumberPersonalInputError', 'Phone Number is required') && valid;
        valid = validateField('emailPersonalInput', 'emailPersonalInputError', 'Email is required') && valid;
        valid = validateField('joiningDateInput', 'joiningDateInputError', 'date is required') && valid;
        valid = validateField('birthDateInput', 'birthDateInputError', 'date is required') && valid;

        // Third tab
        valid = validateField('FirstNameAddressInput', 'FirstNameAddressInputError', 'First Name is required') && valid;
        valid = validateField('middleNameAddressInput', 'middleNameAddressInputError', 'Middle Name is required') && valid;
        valid = validateField('lastNameAddressInput', 'lastNameAddressInputError', 'Last Name is required') && valid;
        valid = validateField('phoneNumberAddressInput', 'phoneNumberAddressInputError', 'Phone Number is required') && valid;
        valid = validateField('emailAddress2Input', 'emailAddress2InputError', 'Email is required') && valid;
        valid = validateField('addressLineInput', 'addressLineInputError', 'Address Line 1 is required') && valid;
        valid = validateField('addressLine2', 'addressLine2Error', 'Address Line 2 is required') && valid;
        valid = validateField('cityAddressInput', 'cityAddressInputError', 'City is required') && valid;
        valid = validateField('stateAddressInput', 'stateAddressInputError', 'State is required') && valid;
        valid = validateField('countryAddressInput', 'countryAddressInputError', 'Country is required') && valid;
        valid = validateField('zipcodeAddressInput', 'zipcodeAddressInputError', 'Zipcode is required') && valid;
        valid = validateField('vtaAddressInput', 'vtaAddressInputError', 'VTA is required') && valid;
        valid = validateField('prefixAddressInput', 'prefixAddressInputError', 'Prefix is required') && valid;
        return valid;
    }

    function validateField(inputId, errorId, errorMessage) {
        const input = document.getElementById(inputId);
        const errorElement = document.getElementById(errorId);
        let valid = true;
        if (input.value.trim() === '') {
            valid = false;
            errorElement.innerText = errorMessage;
        }
        return valid;
    }
 
    function clearErrors() {
        const errorElements = document.querySelectorAll('div.text-red-500');
        errorElements.forEach(errorElement => {
            errorElement.innerText = '';
        });
    }

    function updateButtonState() {
        prevBtn.disabled = currentTab == 0;
        currentTab == tabContents.length ? nextBtn.classList.add("hidden") : nextBtn.classList.remove("hidden") ;
    }

    tabs.forEach((tab) => {
        tab.addEventListener('click', function (event) {
            var id = tab.getAttribute('data-tab-id')
            event.preventDefault();
            switchTab(id);
        });
    });

    prevBtn.addEventListener('click', function (event) {
        event.preventDefault();
        prevTab();
    });

    nextBtn.addEventListener('click', function (event) {
        event.preventDefault();
        nextTab();
    });
    function activeHeaderTab(index) {
        document.querySelectorAll(".form-wizard li a").forEach((ev) => {
            if (ev.getAttribute("data-tab-id") == index) {
                ev.parentElement.classList.add("active")
            } else {
                ev.parentElement.classList.remove("active")

            }
        })
        // Get the active element
        const activeElement = document.querySelector('.form-wizard li.active');
        // Check if the active element exists
        if (activeElement) {
            // Get all previous siblings of the active element
            let previousElements = [];
            let previousSibling = activeElement.previousElementSibling;
            while (previousSibling) {
                previousElements.push(previousSibling);
                previousSibling = previousSibling.previousElementSibling;
            }
            // Add the "done" class to each previous element
            previousElements.forEach(element => {
                element.classList.add('done');
            });
        }
    }
});