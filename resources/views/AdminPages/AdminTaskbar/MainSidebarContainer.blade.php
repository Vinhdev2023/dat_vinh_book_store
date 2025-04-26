<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="/admin_plugin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/admin_plugin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="/admin/logout" class="d-block">{{auth()->user()->name}}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item @if($path == '/admin') {{' menu-open'}} @endif">
                    <a href="/admin" class="nav-link @if($path == '/admin') {{' active'}} @endif">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item @if($path == '/admin/orders' || $path == '/admin/order/detail') {{'menu-open'}} @endif">
                    <a href="/admin/orders" class="nav-link @if($path == '/admin/orders' || $path == '/admin/order/detail') {{'active'}} @endif">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>
                            Orders
                            <span class="right badge badge-danger">0 News</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item @if($path == '/admin/products' || $path == '/admin/product/add-form' || $path == '/admin/product/detail' || $path == '/admin/product/edit-form') {{'menu-open'}} @endif">
                    <a href="/admin/products" class="nav-link @if($path == '/admin/products' || $path == '/admin/product/add-form' || $path == '/admin/product/detail' || $path == '/admin/product/edit-form') {{'active'}} @endif">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Books
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">0</span>
                        </p>
                    </a>
                        <ul class="nav nav-treeview">
                            @if($path == '/admin/product/edit-form')
                                <li class="nav-item menu-open">
                                    <a href="/admin/product/edit-form/{{$book->id}}" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Edit Book</p>
                                    </a>
                                </li>
                            @else
                                <li class="nav-item @if($path == '/admin/product/add-form') {{'menu-open'}} @endif">
                                    <a href="/admin/product/add-form" class="nav-link @if($path == '/admin/product/add-form') {{'active'}} @endif">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add A New Book</p>
                                    </a>
                                </li>
                            @endif
                            <li class="nav-item @if($path == '/admin/products' || $path == '/admin/product/detail') {{'menu-open'}} @endif">
                                <a href="@if($path == '/admin/product/detail'){{'/admin/product/detail/'.$book->id}}@else{{'/admin/products'}}@endif" class="nav-link @if($path == '/admin/products' || $path == '/admin/product/detail') {{'active'}} @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>@if($path == '/admin/product/detail'){{'Book detail'}}@else{{'Books'}}@endif</p>
                                </a>
                            </li>
                            @if($path == '/admin/product/detail')
                                <li class="nav-item">
                                    <a href="/admin/products" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Books</p>
                                    </a>
                                </li>
                            @endif
                        </ul>
                </li>
                <li class="nav-item @if($path == '/admin/categories' || $path == '/admin/category/add-form' || $path == '/admin/category/edit-form') {{'menu-open'}} @endif">
                    <a href="/admin/categories" class="nav-link @if($path == '/admin/categories' || $path == '/admin/category/add-form' || $path == '/admin/category/edit-form') {{'active'}} @endif">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Categories
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">0</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if($path == '/admin/category/edit-form')
                            <li class="nav-item menu-open">
                                <a href="/admin/category/edit-form/{{$category[0]->id}}" class="nav-link active">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Edit Category</p>
                                </a>
                            </li>
                        @else
                            <li class="nav-item @if($path == '/admin/category/add-form') {{'menu-open'}} @endif">
                                <a href="/admin/category/add-form" class="nav-link @if($path == '/admin/category/add-form') {{'active'}} @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add A New Category</p>
                                </a>
                            </li>
                        @endif
                        <li class="nav-item @if($path == '/admin/categories') {{'menu-open'}} @endif">
                            <a href="/admin/categories" class="nav-link @if($path == '/admin/categories') {{'active'}} @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Categories</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item  @if($path == '/admin/publishers' || $path == '/admin/publisher/add-form' || $path == '/admin/publisher/edit-form') {{'menu-open'}} @endif">
                    <a href="/admin/publishers" class="nav-link @if($path == '/admin/publishers' || $path == '/admin/publisher/add-form' || $path == '/admin/publisher/edit-form') {{'active'}} @endif">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Publishers
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">6</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if($path == '/admin/publisher/edit-form')
                            <li class="nav-item menu-open">
                                <a href="/admin/publisher/edit-form/{{$publisher[0]->id}}" class="nav-link active">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Edit Publisher</p>
                                </a>
                            </li>
                        @else
                            <li class="nav-item @if($path == '/admin/publisher/add-form') {{'menu-open'}} @endif">
                                <a href="/admin/publisher/add-form" class="nav-link @if($path == '/admin/publisher/add-form') {{'active'}} @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add A New Publisher</p>
                                </a>
                            </li>
                        @endif
                        <li class="nav-item @if($path == '/admin/publishers') {{'menu-open'}} @endif">
                            <a href="/admin/publishers" class="nav-link @if($path == '/admin/publishers') {{'active'}} @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Publishers</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item @if($path == '/admin/statistics' || $path == '/admin/statistics/data'){{'open-menu'}}@endif">
                    <a href="/admin/statistics" class="nav-link @if($path == '/admin/statistics' || $path == '/admin/statistics/data'){{'active'}}@endif">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Statistics
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

