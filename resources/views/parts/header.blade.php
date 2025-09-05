<nav class="app-header navbar navbar-expand bg-body">
    <div class="container-fluid">
        <ul class="navbar-nav">
            <li class="nav-item"> <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button"> <i class="bi bi-list"></i> </a> </li>
        </ul>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown user-menu"> <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <img src="{{ Vite::asset('resources/images/user2-160x160.jpg') }}" class="user-image rounded-circle shadow" alt="User Image">
                    <span class="d-none d-md-inline">{{ auth()->user()->name }}</span> </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                    <li class="user-header text-bg-primary"> <img src="{{ Vite::asset('resources/images/user2-160x160.jpg') }}" class="rounded-circle shadow" alt="User Image">
                        <p>
                            {{ auth()->user()->name }}
                        </p>
                    </li>
                    <li class="user-footer">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-default btn-flat float-end">Logout</button>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
