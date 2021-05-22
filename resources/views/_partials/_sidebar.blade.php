<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('/')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-user-shield"></i>
        </div>
        <div class="sidebar-brand-text mx-3">EMS</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{url('/')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <li class="sidebar-heading">
        Interface
    </li>

    <!-- Nav Item - Pages Collapse Menu -->

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse-department"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-columns"></i>
            <span>Departments</span>
        </a>
        <div id="collapse-department" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Actions:</h6>
                @if(isset( auth()->user()->role->permission['name']['department']['can-add'] ))
                    <a class="collapse-item" href="{{route('departments.create')}}">Create</a>
                @endif
                @if(isset( auth()->user()->role->permission['name']['department']['can-list'] ))
                    <a class="collapse-item" href="{{route('departments.index')}}">View</a>
                @endif
            </div>
        </div>
    </li>


    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse-role"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-user-tag"></i>
            <span>Roles</span>
        </a>
        <div id="collapse-role" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Actions:</h6>
                @if(isset( auth()->user()->role->permission['name']['role']['can-add'] ))
                    <a class="collapse-item" href="{{route('roles.create')}}">Create</a>
                @endif
                @if(isset( auth()->user()->role->permission['name']['role']['can-list'] ))
                    <a class="collapse-item" href="{{route('roles.index')}}">View</a>
                @endif
            </div>
        </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    @if(isset( auth()->user()->role->permission['name']['user']['can-add'] ) ||  isset( auth()->user()
    ->role->permission['name']['user']['can-list'] ))
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse-user"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-users"></i>
            <span>Users</span>
        </a>
        <div id="collapse-user" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Actions:</h6>
            @if(isset( auth()->user()->role->permission['name']['user']['can-add'] ) )
            <a class="collapse-item" href="{{route('users.create')}}">Create</a>
                @endif
            @if(isset( auth()->user()->role->permission['name']['user']['can-list'] ) )
            <a class="collapse-item" href="{{route('users.index')}}">View</a>
            @endif

</div>
</div>
</li>
@endif

<!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse-permission"
        aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-user-lock"></i>
            <span>Permissions</span>
        </a>
        <div id="collapse-permission" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Actions:</h6>
                @if(isset( auth()->user()->role->permission['name']['permission']['can-add'] ))
                    <a class="collapse-item" href="{{route('permissions.create')}}">Create</a>
                @endif
                @if(isset( auth()->user()->role->permission['name']['permission']['can-list'] ))
                    <a class="collapse-item" href="{{route('permissions.index')}}">View</a>
                @endif
            </div>
        </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse-leave"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-door-open"></i>
            <span>Leaves</span>
        </a>
        <div id="collapse-leave" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Actions:</h6>
                <a class="collapse-item" href="{{route('leaves.create')}}">Create</a>
                @if(isset( auth()->user()->role->permission['name']['leave']['can-list'] ))
                    <a class="collapse-item" href="{{route('leaves.index')}}">View</a>
                @endif
            </div>
        </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse-notice"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-book"></i>
            <span>Notices</span>
        </a>
        <div id="collapse-notice" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Actions:</h6>
                <a class="collapse-item" href="{{route('notices.create')}}">Create</a>
                @if(isset( auth()->user()->role->permission['name']['notice']['can-list'] ))
                    <a class="collapse-item" href="{{route('notices.index')}}">View</a>
                @endif
            </div>
        </div>
    </li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
<button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>



</ul>
<!-- End of Sidebar -->


