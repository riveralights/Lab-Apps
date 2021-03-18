<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Lab Apps</title>
    @include('includes.admin.style')
    <link rel="stylesheet" href="{{ asset('backend/assets/css/pages/auth.css') }}">
</head>

<body>
    <div id="auth">

        @yield('content')

    </div>
</body>

</html>