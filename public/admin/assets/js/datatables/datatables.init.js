/*
Template Name: Tailwick - Admin & Dashboard Template
Author: Themesdesign
Version: 1.1.0
Website: https://themesdesign.in/
Contact: Themesdesign@gmail.com
File: Main Js File
*/

//basic example
new DataTable('#basic_tables');

//row Borders example
new DataTable('#rowBorder');

//Hoverable example
new DataTable('#hoverableTable');

//Hoverable example
new DataTable('#borderedTable');

//Alternative pagination
new DataTable('#alternativePagination', {
    pagingType: 'full_numbers'
});

//Hidden columns
new DataTable('#hiddenColumns', {
    columnDefs: [
        {
            target: 2,
            visible: false,
            searchable: false
        },
        {
            target: 3,
            visible: false
        }
    ]
});

//add rows
function addNewRow() {
    table.row
        .add([
            counter + '.1',
            counter + '.2',
            counter + '.3',
            counter + '.4',
            counter + '.5'
        ])
        .draw(false);

    counter++;
}

const table = new DataTable('#example');
let counter = 1;

document.querySelector('#addRow').addEventListener('click', addNewRow);

// Automatically add a first row of data
addNewRow();

//Show / hide columns dynamically

const tableDynamically = new DataTable('#tableDynamically', {
    pageLength: 5,
});

document.querySelectorAll('button.toggle-vis').forEach((el) => {
    el.addEventListener('click', function (e) {
        e.preventDefault();

        let columnIdx = e.target.getAttribute('data-column');
        let column = tableDynamically.column(columnIdx);

        // Toggle the visibility
        column.visible(!column.visible());
    });
});

//Row selection and deletion (single row)

const rowSelectionDeletion = new DataTable('#rowSelectionDeletion');

rowSelectionDeletion.on('click', 'tbody tr', (e) => {
    let classList = e.currentTarget.classList;

    if (classList.contains('selected')) {
        classList.remove('selected');
    }
    else {
        rowSelectionDeletion.rows('.selected').nodes().each((row) => row.classList.remove('selected'));
        classList.add('selected');
    }
});

document.querySelector('#deleteButton').addEventListener('click', function () {
    rowSelectionDeletion.row('.selected').remove().draw(false);
});

//Custom filtering - range search
const minEl = document.querySelector('#min');
const maxEl = document.querySelector('#max');

// Custom range filtering function
DataTable.ext.search.push(function (settings, data, dataIndex) {
    let min = parseInt(minEl.value, 10);
    let max = parseInt(maxEl.value, 10);
    let age = parseFloat(data[3]) || 0; // use data for the age column

    if (
        (isNaN(min) && isNaN(max)) ||
        (isNaN(min) && age <= max) ||
        (min <= age && isNaN(max)) ||
        (min <= age && age <= max)
    ) {
        return true;
    }

    return false;
});

const customFiltering = new DataTable('#customFiltering');

// Changes to the inputs will trigger a redraw to update the table
minEl.addEventListener('input', function () {
    customFiltering.draw();
});
maxEl.addEventListener('input', function () {
    customFiltering.draw();
});