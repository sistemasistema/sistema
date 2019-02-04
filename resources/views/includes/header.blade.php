<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ __('menu.autoCarParts') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            @guest
            @else
                <ul class="navbar-nav mr-auto">
                    @if (!Auth::guest() && Auth::user()->isAdmin())
                        <li class="nav-item">
                            <a class="nav-link" href="/users">{{ __('menu.users') }}</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="/clients">{{ __('menu.clients') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/suppliers">{{ __('menu.suppliers') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/car-part-cards">{{ __('menu.carParts') }}</a>
                    </li>
                    <li class="nav-item">
{{--                        <a class="nav-link" href="/purchases">{{ __('menu.purchases') }}</a>--}}
                    </li>
                </ul>
        @endguest
        <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li><a class="nav-link" href="{{ route('login') }}">{{ __('menu.login') }}</a></li>
                    <li><a class="nav-link" href="{{ route('register') }}">{{ __('menu.register') }}</a></li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}<span class="caret"></span>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('menu.logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ __('menu.language') }}
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    @foreach (Config::get('app.languages') as $language)
                        @if ($language != App::getLocale())
                                <a class="dropdown-item"  href="{{ route('langroute', $language) }}">{{ $language }}</a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</nav>