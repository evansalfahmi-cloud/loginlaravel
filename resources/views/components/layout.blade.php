<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ ucfirst(request()->segment(1) ?? 'Home') }}</title>
    @vite(['resources/sass/app.scss','resources/js/app.js'])
</head>
<body>

<x-navbar />

<!-- Header Dinamis -->
<x-header title="{{ ucfirst(request()->segment(1) ?? 'Home') }}" />

<div class="container mt-4">
    {{ $slot }}
</div>

<x-footer />

</body>
</html>
