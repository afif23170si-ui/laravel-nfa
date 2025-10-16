<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Genre</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 40px;
        }

        h1 {
            color: #333;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            background-color: #f4f4f4;
            margin: 5px 0;
            padding: 10px;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <h1>Daftar Genre Buku</h1>

    <ul>
        @foreach ($genres as $genre)
            <li>{{ $genre['name'] }}</li>
        @endforeach
    </ul>
</body>

</html>
