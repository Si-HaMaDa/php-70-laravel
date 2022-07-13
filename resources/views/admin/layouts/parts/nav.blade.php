<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link  {{ Route::getCurrentRoute()->uri == 'admin' ? 'active' : '' }}" aria-current="page"
                    href="{{ route('admin.') }}">
                    <span data-feather="home"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ strpos(Route::getCurrentRoute()->uri, 'admin/users') === false ? '' : 'active' }}"
                    href="{{ route('admin.users.index') }}">
                    <span data-feather="users"></span>
                    @lang('users.plural')
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ strpos(Route::getCurrentRoute()->uri, 'admin/skills') === false ? '' : 'active' }}"
                    href="{{ url('/admin/skills') }}">
                    <span data-feather="link"></span>
                    Skills
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ strpos(Route::getCurrentRoute()->uri, 'admin/categories') === false ? '' : 'active' }}"
                    href="{{ url('/admin/categories') }}">
                    <span data-feather="book-open"></span>
                    Categories
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ strpos(Route::getCurrentRoute()->uri, 'admin/jobs') === false ? '' : 'active' }}"
                    href="{{ url('/admin/jobs') }}">
                    <span data-feather="briefcase"></span>
                    Jobs
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ strpos(Route::getCurrentRoute()->uri, 'admin/applications') === false ? '' : 'active' }}"
                    href="{{ url('/admin/applications') }}">
                    <span data-feather="paperclip"></span>
                    Applications
                </a>
            </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Account pages</span>
            <a class="link-secondary" href="#" aria-label="Add a new report">
                <span data-feather="plus-circle"></span>
            </a>
        </h6>
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('home') }}">
                    <span data-feather="home"></span>
                    {{ __('Home') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/logout') }}">
                    <form id="logout-form" action="{{ url('logout') }}" method="POST" class="d-inline-block">
                        @csrf
                        <button class="btn btn-sm btn-outline p-0" type="submit">
                            <span data-feather="log-out"></span>
                            Sign Out
                        </button>
                    </form>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/login') }}">
                    <span data-feather="log-in"></span>
                    Sign In
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/register') }}">
                    <span data-feather="user-plus"></span>
                    Sign UP
                </a>
            </li>
        </ul>
    </div>
</nav>
