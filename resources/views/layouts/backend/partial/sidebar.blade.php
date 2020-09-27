<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ url('/admin')}}" class="brand-link">
    <img src="{{asset('assets/backend/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light">Dashboard</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{asset('assets/backend/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
             <li class="nav-item has-treeview menu-open">
              <a href="{{url('backend/home ')}}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>          
            </li>
        
        <li class="nav-header">Admin</li>
        @if (check_user_permissions(request(), "Permission@index"))
        <li class="nav-item">
          <a href="{{route('backend.permission.index')}}" class="nav-link">
            <i class="nav-icon far fa-circle text-danger"></i>
            <p class="text">Permission</p>
          </a>
        </li>
        @endif
        @if (check_user_permissions(request(), "Role@index"))
        <li class="nav-item">
          <a href="{{route('backend.role.index')}}" class="nav-link">
            <i class="nav-icon far fa-circle text-warning"></i>
            <p>Roles</p>
          </a>
        </li>
        @endif
        @if (check_user_permissions(request(), "User@index"))
        <li class="nav-item">
          <a href="{{route('backend.user.index')}}" class="nav-link">
            <i class="nav-icon far fa-circle text-info"></i>
            <p>Users</p>
          </a>
        </li>
        @endif
        <li class="nav-header">Settings</li>
        <li class="nav-item">
          <a href="{{route('logout')}}" class="nav-link"
                   onclick="event.preventDefault(); document.getElementById('logout').submit();"><i class="nav-icon far fa-circle text-info"></i>
                   <p>Logout</p></a>
                   <form action="{{route('logout')}}" method="POST" id="logout" style="display:none">
                        @csrf
                   </form>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
