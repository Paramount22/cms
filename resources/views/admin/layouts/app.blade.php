<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Custom fonts for this template-->
    <link href=" {{asset('template/vendor/fontawesome-free/css/all.min.css')}} " rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/ui-lightness/jquery-ui.css">

    <link rel="stylesheet" href="{{asset('css/dataTable.css')}}">

    <!-- Custom styles for this template-->
    <link href="{{ asset('template/css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">
    @include('_partials._sidebar')

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
            @include('_partials._logoutMessage')
            @include('_partials._topbar')
            @yield('content')
        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; EMS 2021</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

@include('_partials._logout-modal')


<!-- Bootstrap core JavaScript-->
<script src=" {{asset('template/vendor/jquery/jquery.min.js')}} "></script>
<script src=" {{asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js')}} "></script>

<!-- Core plugin JavaScript-->
<script src=" {{asset('template/vendor/jquery-easing/jquery.easing.min.js')}} "></script>

<!-- Custom scripts for all pages-->
<script src=" {{asset('template/js/sb-admin-2.min.js')}} "></script>

<!-- Page level plugins -->
<script src=" {{asset('js/dataTables.min.js')}} "></script>
<script src="{{asset('template/vendor/chart.js/Chart.min.js')}}"></script>

<!-- Page level custom scripts -->
<script src=" {{asset('template/js/demo/chart-area-demo.js')}} "></script>
<script src=" {{asset('template/js/demo/chart-pie-demo.js')}} "></script>

<!-- Datepicker -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!-- custom scripts -->
<script src="{{asset('js/main.js')}}"></script>

</body>
</html>
