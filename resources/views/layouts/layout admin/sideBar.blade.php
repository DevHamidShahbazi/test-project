<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">


    <!-- Sidebar -->
    <div class="sidebar">
        <div>
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3">
                <div  style="text-align: center"></div>
                <a href="#" style="text-align: center" class="d-block">پروژه تستی</a>
            </div>


            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard') }}" class="nav-link @section('dashboard') @show">
                            <i class="fas fa-tachometer-alt"></i>
                            <p>
                                داشبورد
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.product.index') }}" class="nav-link @section('products') @show">
                            <i class="fa fa-shopping-basket"></i>
                            <p>
                                مدیریت محصولات
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.order.index') }}" class="nav-link @section('orders') @show">
                            <i class="fa fa-list"></i>
                            <p>
                                مدیریت سفارشات
                            </p>
                        </a>
                    </li>

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
    </div>
    <!-- /.sidebar -->
</aside>
