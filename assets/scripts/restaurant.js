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

        var datatable = $('#restaurant').KTDatatable({
            // datasource definition
            data: {
                type: 'remote',
                source: {
                    read: {
                        url: HOST_URL + 'admin/restaurant/api',
                        // sample custom headers
                        headers: {'x-my-custom-header': 'some value', 'x-test-header': 'the value'},
                        map: function(raw) {
                            var dataSet = raw;
                            if (typeof raw.data !== 'undefined') {
                                dataSet = raw.data;
                            }
                            return dataSet;
                        }
                    },
                },
                pageSize: 10,
                serverPaging: false,
                serverFiltering: false,
                serverSorting: false
				// autoColumns: true
            },

            // layout definition
            layout: {
                scroll: false,
                footer: false,
				icons:{
					pagination: {
						next: 'la la-angle-right',
						prev: 'la la-angle-left',
						first: 'la la-angle-double-left',
						last: 'la la-angle-double-right',
						more: 'la la-ellipsis-h'
					  }
				},
            },
			
            // column sorting
            sortable: true,

            pagination: true,

            search: {
                input: $('#kt_datatable_search_query'),
                key: 'generalSearch'
            },
			// columns definition
            columns: [{
                field: 'name',
                title: 'Name',
            }, {
                field: 'address',
                title: 'Address'
            }, {
                field: 'contact_info',
                title: 'Address'
            }, {
                field: 'created_date',
                title: 'Created Date'
            }, {
                field: 'user_name',
                title: 'Create User'
            }, {
                field: 'content',
                title: 'Description'
            },
             {
                field: 'Actions',
                title: 'Actions',
                sortable: false,
                width: 125,
                overflow: 'visible',
                autoHide: false,
                template: function() {
                    return '\
                        <span class="add_btn btn btn-sm btn-clean btn-icon mr-2" title="Add Ingredient">\
                            <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Code\Plus.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
                                    <rect x="0" y="0" width="24" height="24"/>\
                                    <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>\
                                    <path d="M11,11 L11,7 C11,6.44771525 11.4477153,6 12,6 C12.5522847,6 13,6.44771525 13,7 L13,11 L17,11 C17.5522847,11 18,11.4477153 18,12 C18,12.5522847 17.5522847,13 17,13 L13,13 L13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 L11,13 L7,13 C6.44771525,13 6,12.5522847 6,12 C6,11.4477153 6.44771525,11 7,11 L11,11 Z" fill="#000000"/>\
                                </g>\
                            </svg><!--end::Svg Icon--></span>\
                        </span>\
                    ';
                },
            }],

        });
        $("#restaurant").on('click','tbody .add_btn', function(){
            var data_row = datatable.row($(this).closest('tr')).data();
        })
		// $('#kt_datatable_search_status').on('change', function() {
        //     datatable.search($(this).val().toLowerCase(), 'category');
        // });
		// $('#search_btn').on('click', function(){
		// 	datatable.search($('#kt_datatable_search_type').val().toLowerCase(),'search');
		// });
        // $('#kt_datatable_search_status, #kt_datatable_search_type').selectpicker();
    };
    var temp = function (){
        $("form").submit(function (event) {
            var formData = {
                name: $("#name").val(),
                address: $("#address").val(),
                contact_info: $("#contact_info").val(),
                content: $("#content").val(),
            };
            $.ajax({
                type: "POST",
                url: HOST_URL + "admin/restaurant/save",
                data: formData,
                dataType: "json",
                encode: true,
            }).done(function (data) {
                if (data["success"] == true ){
                    toastr.success(data["msg"]);
                    $("#kt_select2_modal").modal('toogle');
                    datatable.reload()
                }else{
               
              }
              
            });
            event.preventDefault();
        });
    }
    return {
        // public functions
        init: function() {
            demo();
            temp();
        },
    };
}();

jQuery(document).ready(function() {
    KTDatatableRemoteAjaxDemo.init();
});

/******/ })()
;
//# sourceMappingURL=data-ajax.js.map