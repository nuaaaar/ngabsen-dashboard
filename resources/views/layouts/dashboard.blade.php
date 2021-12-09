<!DOCTYPE html>
<html class="loaded" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description"
        content="Frest admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Frest admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <link rel="apple-touch-icon" href="/app-assets/images/logo/logo-ngabsen.png">
    <link rel="shortcut icon" type="image/x-icon" href="/app-assets/images/logo/logo-ngabsen.png">
    <title>@yield('title') - NGABSEN</title>
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,600%7CIBM+Plex+Sans:300,400,500,600,700"
        rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/extensions/toastr.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/ui/prism.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/forms/select/select2.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/extensions/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/pickers/pickadate/pickadate.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/pickers/daterange/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.11.3/b-2.0.1/b-colvis-2.0.1/b-html5-2.0.1/b-print-2.0.1/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/forms/spinner/jquery.bootstrap-touchspin.css">

    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="/app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/components.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="/app-assets/css/themes/semi-dark-layout.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/plugins/forms/validation/form-validation.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/plugins/extensions/toastr.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/pages/app-invoice.css">

    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
    <style>
        div#DataTables_Table_0_wrapper{
            width: 100% !important;
        }
    </style>
    @yield('style')
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body
    class="vertical-layout 2-columns navbar-sticky sticky-footer pace-done menu-expanded vertical-menu-modern"
    data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" style="overflow: auto;">

    <!-- BEGIN: Header-->
    <div class="header-navbar-shadow"></div>
    <nav class="header-navbar main-header-navbar navbar-expand-lg navbar navbar-with-menu fixed-top navbar-light">
        <div class="navbar-wrapper">
            <div class="navbar-container content">
                <div class="navbar-collapse" id="navbar-mobile">
                    <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                        <ul class="nav navbar-nav">
                            <li class="nav-item mobile-menu d-xl-none mr-auto"><a
                                    class="nav-link nav-menu-main menu-toggle hidden-xs is-active"
                                    href="javascript:void(0);"><i class="ficon bx bx-menu"></i></a></li>
                        </ul>


                    </div>
                    <ul class="nav navbar-nav float-right">
                        <li class="dropdown dropdown-user nav-item">
                            <a class="dropdown-toggle nav-link dropdown-user-link" href="javascript:void(0);" data-toggle="dropdown">
                                <div class="user-nav d-sm-flex d-none">
                                    <span class="user-name text-capitalize">{{ Auth::user()->nama }}</span>
                                    <span class="user-status text-capitalize">{{ Auth::user()->username }}</span>
                                </div>
                                <span class="round text-center" style="overflow: hidden !important; background: #000 !important; height: 40px !important; width: 40px !important">
                                    <img src="{{ Auth::user()->foto_diri ?? '/app-assets/images/profile/user-uploads/user.jpg' }}" style="height: 40px !important; width: auto !important" alt="avatar" >
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{ route('dashboard.user.edit', Auth::user()->id) }}">
                                    <i class="bx bx-user mr-50"></i> Edit Profil
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}">
                                    <i class="bx bx-power-off mr-50"></i> Keluar
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light bg-white menu-accordion menu-shadow expanded" data-scroll-to-active="true"
        style="touch-action: none; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
        <div class="navbar-header expanded">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand"
                        href="javascript:;">
                        <div class="brand-logo">
                            <img src="/app-assets/images/logo/logo-ngabsen.png" height="27px" width="27px" class="align-top">
                        </div>
                        <h2 class="brand-text mb-0">NGABSEN</h2>
                    </a></li>
                <li class="nav-item nav-toggle">
                    <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
                        <i class="bx-x d-block d-xl-none font-medium-4 primary toggle-icon bx-disc bx"></i>
                        <i class="toggle-icon bx-disc font-medium-4 d-none d-xl-block primary bx" data-ticon="bx-disc"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content ps">
            <ul class="navigation navigation-main bg-white" id="main-menu-navigation" data-menu="menu-navigation"
                data-icon-style="lines">
                <li class="nav-item">
                    <a href="{{ route('dashboard.index') }}">
                        <i class="menu-livicon livicon-evo-holder" data-icon="desktop" style="visibility: visible; width: 60px;"> </i>
                        <span class="menu-title text-truncate">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('dashboard.user.index') }}">
                        <i class="menu-livicon livicon-evo-holder" data-icon="users" style="visibility: visible; width: 60px;"> </i>
                        <span class="menu-title text-truncate">Pengguna</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('dashboard.attendance.index') }}">
                        <i class="menu-livicon livicon-evo-holder" data-icon="grid" style="visibility: visible; width: 60px;"> </i>
                        <span class="menu-title text-truncate">Riwayat Absensi</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('dashboard.setting.index') }}">
                        <i class="menu-livicon livicon-evo-holder" data-icon="gear" style="visibility: visible; width: 60px;"> </i>
                        <span class="menu-title text-truncate">Pengaturan</span>
                    </a>
                </li>
            </ul>
            <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
            </div>
            <div class="ps__rail-y" style="top: 0px; right: 0px;">
                <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
            </div>
        </div>
    </div>
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-body">
                @yield('content')
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"
        style="touch-action: pan-y; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
    </div>
    <div class="drag-target"
        style="touch-action: pan-y; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
    </div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-light">
        <p class="clearfix mb-0">
            <span class="float-left d-inline-block">2021 © Kelompok 3 PAPB Kelas A</span>
            <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="bx bx-up-arrow-alt"></i></button>
        </p>
    </footer>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="/app-assets/vendors/js/vendors.min.js"></script>
    <script src="/app-assets/fonts/LivIconsEvo/js/LivIconsEvo.tools.js"></script>
    <script src="/app-assets/fonts/LivIconsEvo/js/LivIconsEvo.defaults.js"></script>
    <script src="/app-assets/fonts/LivIconsEvo/js/LivIconsEvo.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="/app-assets/vendors/js/ui/prism.min.js"></script>
    <script src="/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="/app-assets/vendors/js/forms/inputmask/inputmask.min.js"></script>
    <script src="/app-assets/vendors/js/forms/inputmask/jquery.inputmask.min.js"></script>
    <script src="/app-assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js"></script>
    <script src="/app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
    <script src="/app-assets/vendors/js/extensions/polyfill.min.js"></script>
    <script src="/app-assets/vendors/js/extensions/moment.min.js"></script>
    <script src="/app-assets/vendors/js/pickers/pickadate/picker.js"></script>
    <script src="/app-assets/vendors/js/pickers/pickadate/picker.date.js"></script>
    <script src="/app-assets/vendors/js/pickers/pickadate/picker.time.js"></script>
    <script src="/app-assets/vendors/js/pickers/pickadate/legacy.js"></script>
    <script src="/app-assets/vendors/js/pickers/daterange/daterangepicker.js"></script>
    {{-- <script src="/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js"></script> --}}
    {{-- <script src="/app-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="/app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js"></script>
    <script src="/app-assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
    <script src="/app-assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
    <script src="/app-assets/vendors/js/tables/datatable/buttons.bootstrap4.min.js"></script>
    <script src="/app-assets/vendors/js/tables/datatable/pdfmake.min.js"></script>
    <script src="/app-assets/vendors/js/tables/datatable/vfs_fonts.js"></script> --}}
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.11.3/b-2.0.1/b-colvis-2.0.1/b-html5-2.0.1/b-print-2.0.1/datatables.min.js"></script>
    <script src="/app-assets/vendors/js/extensions/toastr.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="/app-assets/js/scripts/configs/vertical-menu-dark.js"></script>
    <script src="/app-assets/js/core/app-menu.js"></script>
    <script src="/app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="/app-assets/js/scripts/pages/app-invoice.js"></script>
    <!-- END: Page JS-->
    <script>
        if ($("a[href='{{ Request::url() }}']")[0])
        {
            $("a[href='{{ Request::url() }}']").closest("li").addClass("active");
        }

        if ($(".pickadate")[0])
        {
            $(".pickadate").pickadate({
                format: "yyyy-mm-dd",
            });
        }

        // if ($(".pickatime")[0])
        // {
        //     $(".pickatime").pickatime({
        //         format: "H:i",
        //     });
        // }

        if ($(".select2")[0]) {
            $(".select2").select2({
                dropdownAutoWidth: true,
                width: '100%'
            });
        }

        if ($(".currency")[0]) {
            $(".currency").inputmask({
                alias: "numeric",
                removeMaskOnSubmit: !0,
                rightAlign: 0,
                nullable: 0,
                digits: 0,
                prefix: "",
                placeholder: "",
                groupSeparator: "."
            });
        }

        if ($(".numeric")[0]) {
            $(".numeric").inputmask({
                "mask": "9{*}"
            });
        }

        if ($(".select2")[0]) {
            $(".select2").select2({
                dropdownAutoWidth: true,
                width: '100%'
            });
        }
        if ($(".touchspin")[0]) {
            $(".touchspin").TouchSpin({
                buttondown_class: "btn btn-primary",
                buttonup_class: "btn btn-primary",
            });
        }

        if($(".datatable")[0])
        {
            $(document).ready(function()
            {
                $(".datatable").each(function (index, element) {
                    var table = $(this).DataTable( {
                        "columnDefs": [ {
                            "searchable": false,
                            "orderable": false,
                            "targets": 0
                        } ],
                    } );
                    table.on( 'order.dt search.dt', function () {
                        table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                            cell.innerHTML = i+1;
                        } );
                    } ).draw();
                    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
                        table.columns.adjust().draw()
                    })
                })
            });
        }

        function number_format (number, decimals, dec_point, thousands_sep) {
            number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
            var n = !isFinite(+number) ? 0 : +number,
                prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                s = '',
                toFixedFix = function (n, prec) {
                    var k = Math.pow(10, prec);
                    return '' + Math.round(n * k) / k;
                };
            s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
            if (s[0].length > 3) {
                s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
            }
            if ((s[1] || '').length < prec) {
                s[1] = s[1] || '';
                s[1] += new Array(prec - s[1].length + 1).join('0');
            }
            return s.join(dec);
        }
    </script>
    @if (session('ERR'))
        <script>
            Swal.fire({
                title: "ERROR!",
                text: "{{ session('ERR') }}",
                icon: "error",
                confirmButtonClass: "btn btn-primary",
            });
        </script>
    @endif
    @if (session('OK'))
        <script>
            Swal.fire({
                title: "OK!",
                text: "{{ session('OK') }}",
                icon: "success",
                confirmButtonClass: "btn btn-primary",
            });
        </script>
    @endif

    @yield('script')
    <!-- BEGIN: Page JS-->

</body>
<!-- END: Body-->

</html>

</html>
