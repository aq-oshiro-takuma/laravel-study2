<nav class="sidebar col-md-2 d-none d-md-block p-0">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="{{ request()->is('*dashboard*') ? 'nav-link active' : 'nav-link' }}" href="{{route('home.index')}}">
                    <i data-feather="layout"></i>
                    ホーム
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ request()->is('*order*') ? 'nav-link active' : 'nav-link' }}"
                   href="#">
                    <i data-feather="file"></i>
                    探索
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ request()->is('*estimate*') ? 'nav-link active' : 'nav-link' }}"
                   href="#">
                    <i data-feather="dollar-sign"></i>
                    <!-- Products -->
                    登録チャンネル
                </a>
            </li>
        </ul>
    </div>
</nav>

