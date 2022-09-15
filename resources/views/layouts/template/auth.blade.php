<!-- Begin page -->
<div id="wrapper">

    <!-- Topbar Start -->
    @include('layouts.header.auth')
    <!-- end Topbar -->

    <!-- ========== Left Sidebar Start ========== -->
    @include('layouts.menu.auth')
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    @yield('content')

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->
    @include('layouts.footer.auth')
</div>
<!-- END wrapper -->
