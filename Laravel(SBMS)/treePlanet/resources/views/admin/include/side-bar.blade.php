<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic"  aria-expanded="false" aria-controls="ui-basic">
                <i class="mdi mdi-circle-outline menu-icon"></i>
                <span class="menu-title">Category</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('add-category') }}">Add-Category</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('manage-category') }}">Manage-Category</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                <i class="mdi mdi-circle-outline menu-icon"></i>
                <span class="menu-title text-info">Product</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="collapseExample">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('add-product') }}">Add-Product</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('manage-product') }}">Manage-product</a></li>
                </ul>
            </div>
        </li>
{{--        =============================--}}
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">--}}
{{--                <i class="mdi mdi-circle-outline menu-icon"></i>--}}
{{--                <span class="menu-title text-info">Product</span>--}}
{{--                <i class="menu-arrow"></i>--}}
{{--            </a>--}}
{{--            <div class="collapse" id="ui-basic">--}}
{{--                <ul class="nav flex-column sub-menu">--}}
{{--                    <li class="nav-item"> <a class="nav-link" href="{{ route('add-product') }}">Add-Product</a></li>--}}
{{--                    <li class="nav-item"> <a class="nav-link" href="{{ route('manage-product') }}">Manage-product</a></li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </li>--}}


{{--        ==============================--}}
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#collapseExample2" role="button"  aria-expanded="false" aria-controls="collapseExample2">
                <i class="mdi mdi-account menu-icon"></i>
                <span class="menu-title text-info">Customer</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="collapseExample2">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('add-customer') }}">Add-Customer</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('manage-customer') }}">Manage-customer</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#collapseExample3" role="button" aria-expanded="false" aria-controls="collapseExample3">
                <i class="mdi mdi-account menu-icon"></i>
                <span class="menu-title text-info">Supplier</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="collapseExample3">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('add-supplier') }}">Add-Supplier</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('manage-supplier') }}">Manage-Supplier</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#collapseExample4" role="button" aria-expanded="false" aria-controls="collapseExample4">
                <i class="mdi mdi-view-headline menu-icon"></i>
                <span class="menu-title">Purchase Module</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="collapseExample4">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('add-purchase') }}"> Purchase </a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('manage-purchase') }}"> Purchase-Details </a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#collapseExample5" role="button" aria-expanded="false" aria-controls="collapseExample5">
                <i class="mdi mdi-view-headline menu-icon"></i>
                <span class="menu-title">Sales Module</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="collapseExample5">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('add-sales') }}"> Sales </a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('sales-manage') }}"> Sales-Details </a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('display-stock') }}">
                <i class="mdi mdi-chart-pie menu-icon"></i>
                <span class="menu-title">Stock Report</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#collapseExample6" role="button" aria-expanded="false" aria-controls="collapseExample6">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Report Module</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="collapseExample6">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('purchase-report') }}"> Purchase Reports </a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('sales-report') }}"> Sales Reports</a></li>

                </ul>
            </div>
        </li>
    </ul>
</nav>
