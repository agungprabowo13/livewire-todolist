<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo List | LiveWire</title>
    @vite('public/style.css')
</head>
<body>
    <div class="mx-auto max-w-4xl my-20">
        {{ $slot }}
    </div>
</body>
</html>