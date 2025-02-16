<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
</head>
<body class="antialiased">
    <div><a href="{{ route('authors.index') }}">Daftar Penulis</a></div>
    <div><a href="{{ route('books.index') }}">Daftar Buku</a></div>
</body>
</html>
