/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!****************************************************************!*\
  !*** ../demo1/src/js/pages/crud/ktdatatable/base/data-ajax.js ***!
  \****************************************************************/

// Class definition

var KTDatatableRemoteAjaxDemo = function() {
    // Private functions

    // basic demo
    var demo = function() {

        var datatable = $('#ingredient').KTDatatable({
            // datasource definition
            data: {
                type: 'remote',
                source: {
                    read: {
                        url: HOST_URL + 'customer/ingredient/api',
                        // sample custom headers
                        headers: {'x-my-custom-header': 'some value', 'x-test-header': 'the value'},
                        map: function(raw) {
							console.log(raw);
                            // sample data mapping
                            var dataSet = raw;
                            if (typeof raw.data !== 'undefined') {
                                dataSet = raw.data;
                            }
                            return dataSet;
                        },
						params : {
							"category" : $("#kt_datatable_search_status").val(),
							"product" : $("#kt_datatable_search_query").val()
						},
                    },
                },
                pageSize: 10,
                serverPaging: true,
                serverFiltering: true,
                serverSorting: true
				// autoColumns: true
            },

            // layout definition
            layout: {
                scroll: false,
                footer: false
				// icons:{
				// 	pagination: {
				// 		next: 'la la-angle-right',
				// 		prev: 'la la-angle-left',
				// 		first: 'la la-angle-double-left',
				// 		last: 'la la-angle-double-right',
				// 		more: 'la la-ellipsis-h'
				// 	  }
				// },
            },
			
            // column sorting
            sortable: true,

            pagination: true,

            // search: {
            //     input: $('#kt_datatable_search_query'),
            //     key: 'generalSearch'
            // },
			// columns definition
            columns: [{
                field: 'code',
                title: 'Code',
            }, {
                field: 'name',
                title: 'Name'
            }, {
                field: 'type',
                title: 'Type'
            }, {
                field: 'Actions',
                title: 'Actions',
                sortable: false,
                width: 125,
                overflow: 'visible',
                autoHide: false,
                template: function() {
                    return '\
                        <a href="javascript:;" class="btn btn-sm btn-clean btn-icon mr-2" title="Edit details">\
                            <span class="svg-icon svg-icon-md">\
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
                                        <rect x="0" y="0" width="24" height="24"/>\
                                        <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero"\ transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>\
                                        <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>\
                                    </g>\
                                </svg>\
                            </span>\
                        </a>\
                    ';
                },
            }],

        });

		$('#kt_datatable_search_status').on('change', function() {
            datatable.search($(this).val().toLowerCase(), 'Status');
        });

        $('#kt_datatable_search_type').on('change', function() {
            datatable.search($(this).val().toLowerCase(), 'Type');
        });

        $('#kt_datatable_search_status, #kt_datatable_search_type').selectpicker();
    };

    return {
        // public functions
        init: function() {
            demo();
        },
    };
}();

jQuery(document).ready(function() {
    KTDatatableRemoteAjaxDemo.init();
});

/******/ })()
;
//# sourceMappingURL=data-ajax.js.map