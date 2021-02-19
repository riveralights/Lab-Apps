<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Detail Berita Acara')</title>
    @include('includes.admin.style')
</head>

<body>
    @include('includes.admin.navbar')
    @yield('content')
</body>

</html>