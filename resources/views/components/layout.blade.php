<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WCA Quiz</title>
    @vite(['resources/css/app.css', 'resources/js/app.js']);
</head>
<body>
    <div class="min-vh-100">
        {{ $slot }}
    </div>
</body>
</html>