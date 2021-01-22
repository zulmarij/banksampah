<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ asset('template/index3.html') }}" class="brand-link">
      <img src="{{ asset('template/dist/img/AdminLTELogo.png') }}" alt="Sampah Bank" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Sampah Bank</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('template/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
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
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-users"></i>
              <p>
                User
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ URL::to('/admin/nasabah') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Nasabah</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ URL::to('/admin/pengurus1') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengurus1</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{ URL::to('/admin/pengurus2') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengurus2</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{ URL::to('/admin/bendahara') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bendahara</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ URL::to('/admin/trash') }}" class="nav-link">
              <i class="nav-icon fas fa-trash"></i>
              <p>
                Trash Input
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>