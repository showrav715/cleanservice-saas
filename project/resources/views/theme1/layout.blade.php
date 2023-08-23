<!doctype html>
<html class="no-js" lang="en">

<head>
    @include('common.meta')
    @include('common.style')
</head>

<body>
    @include('common.common')
    @include('common.header')
    <main>
        @yield('content')
    </main>
    
    @include('common.footer')
    @include('common.script')
</body>

</html>
