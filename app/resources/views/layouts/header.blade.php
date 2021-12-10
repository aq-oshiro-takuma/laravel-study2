<nav id="header" class="navbar navbar-expand-md navbar-dark shadow-sm d-flex">
    <div class="d-flex justify-content-between w-100">
        <div class="col-3">
            <span class="menu" data-feather="menu"></span>
            <a class="navbar-brand" href="{{ url('/') }}">
                <span data-feather="youtube"></span>
                {{ config('app.name', 'Laravel') }}
            </a>
        </div>

        <div class="col-md-5 d-inline-flex">
            <input class="search" placeholder="検索">
            <a href="#"><span data-feather="search"></span></a>
        </div>

        <div class="navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">
                                <span class="nav-link header-text">ログイン</span>
                            </a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link header-text" href="{{ route('register') }}">
                                <span class="nav-link header-text">会員登録</span>
                            </a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle header-text" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('ログアウト') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
