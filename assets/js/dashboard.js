$(document).ready(function () {
    var gArrayFonts = ['Amethysta', 'Poppins', 'Poppins-Bold', 'Poppins-Black', 'Poppins-Extrabold', 'Poppins-Extralight', 'Poppins-Light', 'Poppins-Medium', 'Poppins-Semibold', 'Poppins-Thin'];
    // Summernote
    $('.summernote').summernote({
        fontNames: gArrayFonts,
        fontNamesIgnoreCheck: gArrayFonts,
        fontSizes: ['8', '9', '10', '11', '12', '13', '14', '15', '16', '18', '20', '22', '24', '28', '32', '36', '40', '48'],
    })
    //Date range picker
    $('#reservation').daterangepicker({
        locale: {
            format: 'YYYY-MM-DD',
            separator: " s/d "
        }
    })

    $('#table1').DataTable({
        dom: 'Bfrtip',
        lengthMenu: [
            [50, 70, 100, -1],
            [50, 70, 100, 'All'],
        ],
        buttons: [
            {
                extend: 'collection',
                text: 'Export',
                buttons: [
                    {
                        extend: 'print',
                        text: 'Print all',
                        exportOptions: {
                            modifier: {
                                selected: null
                            },
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'print',
                        text: 'Print selected',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'copy',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'pdf',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'csv',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },

                ]
            },
            {
                extend: 'colvis',
                postfixButtons: ['colvisRestore']
            },
            'pageLength'

        ],
        columnDefs: [{
            targets: [-1, -8, -9, -10,],
            visible: false
        }],
        "autoWidth": false,
        select: true,
        "fixedHeader": true,
        "autoWidth": false,
        paging: true,
        scrollY: 400,
        scrollCollapse: true,
        scroller: true,
        "pageLength": 50,
        scrollX: true,
    });
    $('#table2').DataTable({
        dom: 'Bfrtip',
        lengthMenu: [
            [50, 70, 100, -1],
            [50, 70, 100, 'All'],
        ],
        buttons: [
            {
                extend: 'collection',
                text: 'Export',
                buttons: [
                    {
                        extend: 'print',
                        text: 'Print all',
                        exportOptions: {
                            modifier: {
                                selected: null
                            },
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'print',
                        text: 'Print selected',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'copy',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'pdf',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'csv',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },

                ]
            },
            {
                extend: 'colvis',
                postfixButtons: ['colvisRestore']
            },
            'pageLength'

        ],
        columnDefs: [{
            targets: [-1, -7, -8, -9,],
            visible: false
        }],
        "autoWidth": false,
        select: true,
        "fixedHeader": true,
        "autoWidth": false,
        paging: true,
        scrollY: 400,
        scrollCollapse: true,
        scroller: true,
        "pageLength": 50,
        scrollX: true,
    });
    $('#example1').DataTable({
        dom: 'Bfrtip',
        lengthMenu: [
            [50, 70, 100, -1],
            [50, 70, 100, 'All'],
        ],
        buttons: [
            {
                extend: 'collection',
                text: 'Export',
                buttons: [
                    {
                        extend: 'print',
                        text: 'Print all',
                        exportOptions: {
                            modifier: {
                                selected: null
                            },
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'print',
                        text: 'Print selected',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'copy',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'pdf',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'csv',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },

                ]
            },
            'colvis',
            'pageLength'

        ],
        columnDefs: [{
            visible: false
        }],
        "autoWidth": false,
        select: true,
        "fixedHeader": true,
        "autoWidth": false,
        paging: true,
        scrollY: 400,
        scrollCollapse: true,
        scroller: true,
        "pageLength": 50,
        scrollX: true,
    });
    $('#table').DataTable({
        lengthMenu: [
            [50, 70, 100, -1],
            [50, 70, 100, 'All'],
        ],
        buttons: [{
            extend: 'collection',
            text: 'Export',
            buttons: [{
                extend: 'print',
                text: 'Print all',
                exportOptions: {
                    modifier: {
                        selected: null
                    },
                    columns: ':visible'
                }
            },
            {
                extend: 'print',
                text: 'Print selected',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'copy',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdf',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'csv',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'excel',
                exportOptions: {
                    columns: ':visible'
                }
            },

            ]
        },
            'colvis',
            'pageLength'
        ],
        dom: 'Bf<"toolbar">rtip',
        columnDefs: [{
            visible: false
        }],
        select: true,
        "fixedHeader": true,
        "responsive": true,
        "lengthChange": true,
        "autoWidth": false,
        "pageLength": 50,
        paging: true,
        scrollY: 400,
        scrollCollapse: true,
        scroller: true,
    });
    $('div.toolbar').html(`<div class="custom-control custom-checkbox">
    <input type="checkbox" class="custom-control-input" id="exp" onChange="change()" checked>
    <label class="custom-control-label" for="exp">Filter <small><i>(*ceklis : periode aktif)</i></small></label>
  </div>`);
    $('#example2').DataTable({
        "paging": false,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": false,
        "autoWidth": false,
        "responsive": true,
    });
    $('#example4').DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'collection',
                text: 'Export',
                buttons: [
                    {
                        extend: 'print',
                        text: 'Print all',
                        exportOptions: {
                            modifier: {
                                selected: null
                            },
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'print',
                        text: 'Print selected',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'copy',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'pdf',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'csv',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },

                ]
            },
            'colvis',
            'pageLength'

        ],
        columnDefs: [{
            visible: false
        }],
        "fixedHeader": true,
        "responsive": true,
        "lengthChange": true,
        "autoWidth": false,

        select: true,
        paging: true,
        scrollY: 400,
        scrollCollapse: true,
        scroller: true,
        "pageLength": 50
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
});


const flashDataSts = $('.flash-data-sts').data('flashdata');
const flashDataSuccess = $('.flash-data-success').data('flashdata');
const flashDataWarning = $('.flash-data-warning').data('flashdata');
const flashDataDanger = $('.flash-data-danger').data('flashdata');
var Toast = Swal.mixin({
    toast: false,
    position: 'center',
    showConfirmButton: true,
    timer: 6000
});
var Toast2 = Swal.mixin({
    position: 'center',
    showConfirmButton: true,
    timer: 3000
});
if (flashDataSuccess) {
    Toast.fire({
        icon: 'success',
        title: flashDataSuccess,
    })
}
if (flashDataWarning) {
    Toast.fire({
        icon: 'warning',
        title: flashDataWarning
    })
}
if (flashDataDanger) {
    Toast2.fire({
        icon: 'warning',
        title: flashDataDanger
    })
}
