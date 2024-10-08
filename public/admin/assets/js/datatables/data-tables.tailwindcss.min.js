/*! DataTables Tailwind CSS integration
 */

/*
 * This is a tech preview of Tailwind CSS integration with DataTables.
 */

// Set the defaults for DataTables initialisation
$.extend( true, DataTable.defaults, {
	dom:
		"<'grid grid-cols-12 lg:grid-cols-12 gap-3'" +
			"<'self-center col-span-12 lg:col-span-6'l>" +
			"<'self-center col-span-12 lg:col-span-6 lg:place-self-end'f>" +
			"<'my-2 col-span-12 overflow-x-auto lg:col-span-12'tr>" +
			"<'self-center col-span-12 lg:col-span-6'i>" +
			"<'self-center col-span-12 lg:place-self-end lg:col-span-6'p>" +
		">",
	renderer: 'tailwindcss'
} );


// Default class modification
$.extend( DataTable.ext.classes, {
	sWrapper:      "dataTables_wrapper dt-tailwindcss",
	sFilterInput:  "form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200 inline-block w-auto ml-2",
	sLengthSelect: "px-3 py-2 form-select border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200 inline-block w-auto",
	sProcessing:   "dt-processing uk-panel",
	tailwindcss: {
		paging: {
			active: 'font-semibold bg-slate-100 dark:bg-zink-600',
			notActive: 'bg-white dark:bg-zink-700',
			button: 'relative inline-flex justify-center items-center space-x-2 border px-4 py-2 -mr-px leading-6 hover:z-10 focus:z-10 active:z-10 border-slate-200 active:border-slate-200 active:shadow-none dark:border-zink-500 dark:active:border-zink-400',
			first: 'rounded-l-lg',
			last: 'rounded-r-lg',
			enabled: 'text-slate-800 hover:text-slate-900 hover:border-slate-200 hover:shadow-sm focus:ring focus:ring-slate-300 focus:ring-opacity-25 dark:text-slate-100 dark:hover:border-zink-500 dark:hover:text-zink-50 dark:focus:ring-zink-500 dark:focus:ring-opacity-40',
			notEnabled: 'text-slate-300 dark:text-slate-300'
		},
		table: 'dataTable w-full text-sm align-middle whitespace-nowrap',
		thead: {
			row: 'border-b border-slate-200 dark:border-zink-500',
			cell: 'px-3 py-4 text-slate-900 bg-slate-200/50 font-semibold text-left dark:text-zink-50 dark:bg-zink-600 group-[.bordered]:border group-[.bordered]:border-slate-200 dark:group-[.bordered]:border-zink-500'
		},
		tbody: {
			row: 'group-[.stripe]:even:bg-slate-50 group-[.stripe]:dark:even:bg-zink-600 transition-all duration-150 ease-linear group-[.hover]:hover:bg-slate-50 dark:group-[.hover]:hover:bg-zink-600 [&.selected]:bg-custom-500 dark:[&.selected]:bg-custom-500 [&.selected]:text-custom-50 dark:[&.selected]:text-custom-50',
			cell: 'p-3 group-[.bordered]:border group-[.bordered]:border-slate-200 group-[.bordered]:dark:border-zink-500'
		},
		tfoot: {
			row: 'group-[.stripe]:even:bg-slate-50 group-[.stripe]:dark:even:bg-zink-600 transition-all duration-150 ease-linear group-[.hover]:hover:bg-slate-50 dark:group-[.hover]:hover:bg-zink-600',
			cell: 'p-3 text-left group-[.bordered]:border group-[.bordered]:border-slate-200 group-[.bordered]:dark:border-zink-500'
		},
	}
} );

// Abstract out DataTable's awful class property names were we can,
// others are handled below
DataTable.ext.classes.sTable = DataTable.ext.classes.tailwindcss.table;
DataTable.ext.classes.sStripeOdd = DataTable.ext.classes.tailwindcss.tbody.row;
DataTable.ext.classes.sStripeEven = DataTable.ext.classes.tailwindcss.tbody.row;
DataTable.ext.classes.sHeaderTH = DataTable.ext.classes.tailwindcss.thead.cell;
DataTable.ext.classes.sFooterTH = DataTable.ext.classes.tailwindcss.tfoot.cell;
DataTable.defaults.column.sClass = DataTable.ext.classes.tailwindcss.tbody.cell;

// Eventually the classes and styles to apply from above will be merged into
// DataTables core, but for now we add them in a Tailwind CSS specific file
// since this is the only one that uses them this way at the moment.
$(document).on('init.dt', function (e, settings) {
	let thead = settings.nTHead;
	let classes = DataTable.ext.classes.tailwindcss;

	$(thead).addClass(classes.thead.row);
});


/* UIkit paging button renderer */
DataTable.ext.renderer.pageButton.tailwindcss = function ( settings, host, idx, buttons, page, pages ) {
	var api     = new DataTable.Api( settings );
	var classes = settings.oClasses.tailwindcss.paging;
	var lang    = settings.oLanguage.oPaginate;
	var aria = settings.oLanguage.oAria.paginate || {};
	var btnDisplay;

	var attach = function( container, buttons ) {
		var i, ien, node, button;
		var clickHandler = function ( e ) {
			e.preventDefault();
			if ( !$(e.currentTarget).hasClass('disabled') && api.page() != e.data.action ) {
				api.page( e.data.action ).draw( 'page' );
			}
		};

		for ( i=0, ien=buttons.length ; i<ien ; i++ ) {
			button = buttons[i];

			if ( Array.isArray( button ) ) {
				attach( container, button );
			}
			else {
				let enabled = false;
				let active = false;

				btnDisplay = '';

				switch ( button ) {
					case 'ellipsis':
						btnDisplay = '&#x2026;';
						break;

					case 'first':
						btnDisplay = lang.sFirst;

						if (page > 0) {
							enabled = true;
						}
						break;

					case 'previous':
						btnDisplay = lang.sPrevious;

						if (page > 0) {
							enabled = true;
						}
						break;

					case 'next':
						btnDisplay = lang.sNext;

						if (page < pages-1) {
							enabled = true;
						}
						break;

					case 'last':
						btnDisplay = lang.sLast;

						if (page < pages-1) {
							enabled = true;
						}
						break;

					default:
						btnDisplay = button + 1;
						enabled = true;

						if (page === button) {
							active = true;
						}
						break;
				}

				if ( btnDisplay ) {
					var className = classes.button + ' ' +
						(active ? classes.active : classes.notActive) + ' ' +
						(enabled ? classes.enabled : classes.notEnabled);

					node = $('<a>', {
							'href': enabled ? '#' : null,
							'aria-controls': settings.sTableId,
							'aria-disabled': enabled ? null : 'true',
							'aria-label': aria[ button ],
							'role': 'link',
							'aria-current': active ? 'page' : null,
							'data-dt-idx': button,
							'tabindex': enabled ? settings.iTabIndex : -1,
							'class': className,
							'id': idx === 0 && typeof button === 'string' ?
								settings.sTableId +'_'+ button :
								null
						} )
						.html( btnDisplay )
						.appendTo( container );

					settings.oApi._fnBindAction(
						node, {action: button}, clickHandler
					);
				}
			}
		}
	};

	var hostEl = $(host);
	var activeEl = hostEl.find(document.activeElement).data('dt-idx');
	var paginationEl = hostEl.children('ul.pagination');

	if (paginationEl.length) {
		paginationEl.empty();
	}
	else {
		paginationEl = hostEl
			.html('<div class="text-center dark:text-slate-100"/>')
			.children('div');
	}

	attach(
		paginationEl,
		buttons
	);

	paginationEl.children(':first-child').addClass(classes.first);
	paginationEl.children(':last-child').addClass(classes.last);

	if ( activeEl !== undefined ) {
		hostEl.find('[data-dt-idx='+activeEl+']').trigger('focus');
	}
};

