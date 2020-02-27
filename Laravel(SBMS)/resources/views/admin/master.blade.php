<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Majestic Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('/')}}admin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{asset('/')}}admin/assets/vendors/base/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="{{asset('/')}}admin/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('/')}}admin/assets/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{asset('/')}}admin/assets/images/favicon.png" />

</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    @include('admin.include.nav-bar')

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.include.side-bar')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                @yield('body')


            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2018 <a href="https://www.urbanui.com/" target="_blank">Urbanui</a>. All rights reserved.</span>
                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
                </div>
            </footer>
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- plugins:js -->
<script src="{{asset('/')}}admin/assets/vendors/base/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<script src="{{asset('/')}}admin/assets/vendors/chart.js/Chart.min.js"></script>
<script src="{{asset('/')}}admin/assets/vendors/datatables.net/jquery.dataTables.js"></script>
<script src="{{asset('/')}}admin/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="{{asset('/')}}admin/assets/js/off-canvas.js"></script>
<script src="{{asset('/')}}admin/assets/js/hoverable-collapse.js"></script>
<script src="{{asset('/')}}admin/assets/js/template.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{asset('/')}}admin/assets/js/dashboard.js"></script>
<script src="{{asset('/')}}admin/assets/js/data-table.js"></script>
<script src="{{asset('/')}}admin/assets/js/jquery.dataTables.js"></script>
<script src="{{asset('/')}}admin/assets/js/dataTables.bootstrap4.js"></script>


<!-- End custom js for this page-->
</body>

</html>

