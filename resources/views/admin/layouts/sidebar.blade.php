<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ Storage::url(Auth::guard('admin')->user()->image) }}" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ Auth::guard('admin')->user()->name ?? 'Admin' }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                @can('view dashboard')
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ Route::is('admin.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                @endcan



                @can('view setting')
                <li class="nav-item">
                    <a href="{{ route('admin.settings.index') }}" class="nav-link {{ Route::is('admin.settings.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Settings
                        </p>
                    </a>
                </li>
                @endcan

                <li class="nav-item">
                    <a href="{{ route('admin.department.index') }}" class="nav-link {{ Route::is('admin.department.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-building"></i>
                        <p>Department</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.position.index') }}" class="nav-link {{ Route::is('admin.position.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-briefcase"></i>
                        <p>Position</p>
                    </a>
                </li>

                 <li class="nav-item">
                    <a href="{{ route('admin.staff.index') }}" class="nav-link {{ Route::is('admin.staff.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Employee</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.customers.index') }}" class="nav-link {{ Route::is('admin.customers.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-friends"></i>
                        <p>Customers</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.salary.index') }}" class="nav-link {{ Route::is('admin.salary.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-money-bill-wave"></i>
                        <p>Salary</p>
                    </a>
                </li>
               



                <!-- Role Managment  -->
               @can(['view role','view user'])
                {{--<li class="nav-item {{ Route::is('admin.roles.*') || Route::is('admin.users.*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-circle"></i>
                        <p>
                            User Management
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('view user')
                        <li class="nav-item">
                            <a href="{{ route('admin.users.index') }}" class="nav-link {{ Route::is('admin.users.*') ? 'active' : '' }}">
                                <i class="fa fa-angle-right nav-icon"></i>
                                <p>User</p>
                            </a>
                        </li>
                        @endcan
                        @can('view role')
                        <li class="nav-item">
                            <a href="{{ route('admin.roles.index') }}" class="nav-link {{ Route::is('admin.roles.*') ? 'active' : '' }}">
                                <i class="fa fa-angle-right nav-icon"></i>
                                <p>Roles</p>
                            </a>
                        </li>
                        @endcan

                    </ul>
                </li>--}}
                @endcan
           

        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>