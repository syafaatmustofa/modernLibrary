<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        @if (Auth::user()->role == 'admin')
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/dashboard">
                    <span data-feather="home" class="align-text-bottom"></span>
                    dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/buku">
                    <span data-feather="book" class="align-text-bottom"></span>
                    Buku
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="/kategori">
                    <span data-feather="bookmark" class="align-text-bottom"></span>
                    Kategori
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="/datauser">
                    <span data-feather="users" class="align-text-bottom"></span>
                    User
                </a>
            </li>
        </ul>
        @else
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/dashboard">
                    <span data-feather="home" class="align-text-bottom"></span>
                    dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/buku">
                    <span data-feather="book" class="align-text-bottom"></span>
                    Buku
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="/datauser">
                    <span data-feather="users" class="align-text-bottom"></span>
                    User
                </a>
            </li>
        </ul>
        @endif
    </div>
</nav>
