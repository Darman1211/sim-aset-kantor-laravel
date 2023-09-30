<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    {{-- Boxicons --}}
    <script src="https://unpkg.com/boxicons@2.1.2/dist/boxicons.js"></script>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />
    <!-- Datatables -->
    <link href="{!! asset('datatables/DataTables-1.12.1/css/dataTables.bootstrap5.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('datatables/Buttons-2.2.3/css/buttons.bootstrap5.min.css') !!}" rel="stylesheet">
    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- ICON -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <!-- Custom styles for this template -->
    <link href="{!! asset('css/dashboard.css') !!}" rel="stylesheet">

    <style>
        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background: none;
            color: black !important;
            border-radius: 4px;
            border: 1px solid #828282;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:active {
            background: none;
            color: black !important;
        }

        a {
            text-decoration: none;
            cursor: ;
        }

        a:hover {
            color: white;
        }

        .divider {
            width: 100%;
            height: 1px;
            background: #BBB;
            margin: 1rem 0;
        }

        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }
    </style>

</head>

<body>

    @include('dashboard.layouts.header')

    <div class="container-fluid">
        <div class="row">

            @include('dashboard.layouts.sidebar')

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                @yield('container')
            </main>
        </div>
    </div>

    {{-- JQuery --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <!-- DataTables -->
    <script src="{!! asset('datatables/DataTables-1.12.1/js/jquery.dataTables.min.js') !!}"></script>
    <script src="{!! asset('datatables/DataTables-1.12.1/js/dataTables.bootstrap5.min.js') !!}"></script>
    <script src="{!! asset('datatables/Buttons-2.2.3/js/dataTables.buttons.min.js') !!}"></script>
    <script src="{!! asset('datatables/Buttons-2.2.3/js/buttons.bootstrap5.min.js') !!}"></script>
    <script src="{!! asset('datatables/Buttons-2.2.3/js/buttons.colVis.min.js') !!}"></script>
    <script src="{!! asset('datatables/JSZip-2.5.0/jszip.min.js') !!}"></script>
    <script src="{!! asset('datatables/pdfmake-0.1.36/pdfmake.min.js') !!}"></script>
    <script src="{!! asset('datatables/pdfmake-0.1.36/vfs_fonts.js') !!}"></script>
    <script src="{!! asset('datatables/Buttons-2.2.3/js/buttons.html5.min.js') !!}"></script>
    <script src="{!! asset('datatables/Buttons-2.2.3/js/buttons.print.min.js') !!}"></script>
    
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'copyHtml5',
                        exportOptions: {
                            columns: [ 0, ':visible' ]
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: [ 0, 1, 2, 5 ]
                        }
                    },
                    'colvis'
                ]
            } );
        } );
        // $(document).ready(function() {
        //     var table = $('#myTable').DataTable( {
        //         lengthChange: false,
        //         buttons: [ 'colvis', 'copy', 'print', 'excel', 'pdf' ]
        //     } );
        
        //     table.buttons().container()
        //         .appendTo( '#myTable_wrapper .col-md-6:eq(0)' );
        // } );
        
        // $(document).ready(function () {
        //     $('#myTable').DataTable({
        //         dom: 'Bfrtip',
                // buttons: [
                //     {
                //         extend: 'print',
                //         exportOptions: {
                //             stripHtml : false,
                //             columns: [0, 1, 2, 3, 4, 5, 6, 7, 8] 
                //             //specify which column you want to print
    
                //         }
                //     }
    
                // ]
        //     });
    
        // });
    </script>

    {{-- JS Icons --}}
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
    </script>
    {{-- JS Dari Public --}}
    <script src="/js/dashboard.js"></script>
    <script src="/js/sidebars.js"></script>
    <script src="{!! asset('js/jquery.printPage.js') !!}"></script>

</body>

</html>
