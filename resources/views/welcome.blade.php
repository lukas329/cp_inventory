<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link href="/css/bootstrap.css" rel="stylesheet">
</head>
<body>
<div class="flex-center position-ref full-height">

    <div class="content">
        <div class="title m-b-md">
            Laravel
        </div>

        <div class="links">
            <a href="{{ route('cars.index') }}" class="btn btn-primary">Cars</a>
            <a href="{{ route('parts.index') }}" class="btn btn-secondary">Parts</a>
        </div>
    </div>
</div>
<script src="/js/bootstrap.js"></script>
</body>
</html>
