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
                            // sample data mapping
                            var dataSet = raw;
                            if (typeof raw.data !== 'undefined') {
                                dataSet = raw.data;
                            }
                            return dataSet;
                        }
                    },
                },
                pageSize: 10,
                serverPaging: true,
                serverFiltering: true
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
            sortable: false,

            pagination: true,

            search: {
                input: $('#kt_datatable_search_query'),
                key: 'search'
            },
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
                field: 'allergen',
                title: 'Type'
            }
            , {
                field: 'Actions',
                title: 'Actions',
                sortable: false,
                width: 125,
                overflow: 'visible',
                autoHide: false,
                template: function(row) {
                    return '\
                        <a href = "javascript:addIngredient(\''+row.name+'\',\''+row.code+'\',\''+row.allergen+'\')" class="add_btn btn btn-sm btn-clean btn-icon mr-2" title="Add Ingredient">\
                            <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Code\Plus.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
                                    <rect x="0" y="0" width="24" height="24"/>\
                                    <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>\
                                    <path d="M11,11 L11,7 C11,6.44771525 11.4477153,6 12,6 C12.5522847,6 13,6.44771525 13,7 L13,11 L17,11 C17.5522847,11 18,11.4477153 18,12 C18,12.5522847 17.5522847,13 17,13 L13,13 L13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 L11,13 L7,13 C6.44771525,13 6,12.5522847 6,12 C6,11.4477153 6.44771525,11 7,11 L11,11 Z" fill="#000000"/>\
                                </g>\
                            </svg><!--end::Svg Icon--></span>\
                        </a>\
                    ';
                },
            }],

        });
        $("#ingredient").on('click','tbody .add_btn', function(){
            var data_row = datatable.row($(this).closest('tr')).data();
        })
        $('#ingredient').on('click', 'tbody.add_btn', function () {
            var data_row = datatable.row($(this).closest('tr')).data();
        })
		$('#kt_datatable_search_status').on('change', function() {
            datatable.search($(this).val().toLowerCase(), 'category');
        });
		$('#search_btn').on('click', function(){
			datatable.search($('#kt_datatable_search_type').val().toLowerCase(),'search');
		});
        $('#kt_datatable_search_status, #kt_datatable_search_type').selectpicker();
    };
    var selectbox = function() {
        $('#kt_select2_11').select2({
            placeholder: "Add catetory",
            tags: true
        });
    }
    $(".navi-item>a").click(function(){
        alert($(this).index());
    });
    return {
        // public functions
        init: function() {
            demo();
            selectbox();
        },
    };
}();

jQuery(document).ready(function() {
    KTDatatableRemoteAjaxDemo.init();
});

/******/ })()
;
//# sourceMappingURL=data-ajax.js.map
function addIngredient(name, code, allergen){
    var str =   '<li class="navi-item">\
                    <span class="navi-item">\
                        <div class="navi-link">\
                            <div class="navi-text">\
                                <div class="font-weight-bold" name="name">'+name+'</div>\
                                <div class="text-muted"><span name="code">'+code+'</span>, <span name"allenger">'+allergen+'</span></div>\
                            </div>\
                            <div class="navi-icon mr-2">\
                                <i class="flaticon2-cross text-danger"></i>\
                            </div>\
                        </div>\
                    </span>\
                </li>';
    $(".ingredients").append(str);
}