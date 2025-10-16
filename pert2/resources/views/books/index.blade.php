<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Daftar Buku</title>
</head>

<body>
    <h1>Daftar Buku</h1>
    <ul>
        @foreach ($books as $book)
            <li>{{ $book->title }} - <em>by {{ $book->author->name }}</em></li>
        @endforeach
    </ul>
</body>

</html>
