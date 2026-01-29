<aside class="admin-sidebar">
    <div class="sidebar-brand">
        <a href="{{ route('main.index') }}" class="brand-link">
            <img src="{{ asset('imgs/technical/logo.png') }}" class="brand-image">
            <a class="indie-flower-regular fw-bold text-nowrap" href="{{ route('main.index') }}"><span class="title-geek">Geek</span>-Print33</a>
        </a>
    </div>

    <nav>
        <ul class="nav sidebar-menu flex-column">
            <li class="nav-header">Администрирование</li>

            <li class="nav-item">
                <a href="{{ route('admin.manage.products') }}" class="nav-link">
                    <i class="fa-solid fa-boxes-stacked"></i>
                    <span>Товары</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.manage.categories') }}" class="nav-link">
                    <i class="fa-solid fa-list"></i>
                    <span>Категории</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.manage.tags') }}" class="nav-link">
                    <i class="fa-solid fa-tags"></i>
                    <span>Теги</span>
                </a>
            </li>
        </ul>
    </nav>
    <div class="text-center admin-logout">
        <form method="post" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Выйти</button>
        </form>
    </div>
</aside>
