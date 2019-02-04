<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('includes.head')
</head>
<body>
        <header>
            @include('includes.header')
        </header>
        <main class="py-4">
            @yield('content')
        </main>
    <footer>
        @include('includes.footer')
    </footer>
</body>
</html>
