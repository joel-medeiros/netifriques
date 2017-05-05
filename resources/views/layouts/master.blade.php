<html>
<head>
    <title>NetFríques - @yield('title')</title>
    <link rel="stylesheet" href="/css/app.css"/>
    <link rel="stylesheet" href="/css/custom.css"/>
</head>
<body>
<div class="container">
    @include('common.errors')

    @yield('content')
</div>
</body>
<script src="/js/app.js"></script>
</html>