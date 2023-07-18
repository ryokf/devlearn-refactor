<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#000000" />
    @include('layouts.partial.link')
    <title>Index | Notus Tailwind JS by Creative Tim</title>
</head>

<body class="text-blueGray-700 antialiased">
    @include('layouts.partial.header')
    @yield('content')
    @include('layouts.partial.footer')
</body>
@include('layouts.partial.script')

</html>
