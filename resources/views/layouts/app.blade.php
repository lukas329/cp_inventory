<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Car Parts Inventory</title>
    <link href="/css/bootstrap.css" rel="stylesheet">

</head>
<body>
<div id="app">
    @yield('content')
</div>
<script src="/js/bootstrap.js"></script>

</body>
</html>
