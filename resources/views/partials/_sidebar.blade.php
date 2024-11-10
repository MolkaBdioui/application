<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
        data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="#" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
            </a>

        </li>
        <li class="nav-item">
            <a href="{{ route('accounts') }}" class="nav-link {{ Request::is('accounts') ? 'active' : '' }}">
                <i class="nav-icon far fa-user"></i>
                <p>
                    Accounts
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('projects') }}" class="nav-link">
                <i class="nav-icon fas fa-columns"></i>
                <p>
                    Projects
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('tasks') }}" class="nav-link">
                <i class="nav-icon fas fa-columns"></i>
                <p>
                    Tasks
                </p>
            </a>
        </li>
    </ul>
</nav>
