<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ asset('admin') }}" class="brand-link navbar-indigo">
        <img src="{{ asset('template/dist/img/Logo.jpg') }}" alt="Sampah Bank"
            class="brand-image img-circle elevation-3" style="opacity: .8" height="128" width="128">
        <span class="brand-text font-weight-light">Sampah Bank</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('template/dist/img/user2-160x160.JPG') }}" class="img-circle elevation-2"
                    alt="User Image" width="160" height="160">
            </div>
            <div class="info">
                <a href="#" class="d-block">Dzul Maarij</a>
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
            <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ URL::to('/admin/user') }}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            User
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ URL::to('/admin/trash') }}" class="nav-link">
                        <i class="nav-icon fas fa-trash"></i>
                        <p>
                            Trash
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ URL::to('/admin/deposit') }}" class="nav-link">
                        <i class="nav-icon fas fa-truck-loading"></i>
                        <p>
                            Deposit
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ URL::to('/admin/pickup') }}" class="nav-link">
                        <i class="nav-icon fas fa-truck-moving"></i>
                        <p>
                            Pickup
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ URL::to('/admin/warehouse') }}" class="nav-link">
                        <i class="nav-icon fas fa-dumpster"></i>
                        <p>
                            Warehouse
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ URL::to('/admin/savings') }}" class="nav-link">
                        <i class="nav-icon fas fa-credit-card"></i>
                        <p>
                            Savings
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ URL::to('/admin/withdrawal') }}" class="nav-link">
                        <i class="nav-icon fas fa-money-check-alt"></i>
                        <p>
                            Withdrawal
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ URL::to('/admin/sale') }}" class="nav-link">
                        <i class="nav-icon fas fa-hand-holding-usd"></i>
                        <p>
                            Sale
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ URL::to('/admin/finance') }}" class="nav-link">
                        <i class="nav-icon fas fa-wallet"></i>
                        <p>
                            Finance
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
