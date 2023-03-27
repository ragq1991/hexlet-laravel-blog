<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About</title>
</head>
<body>
    <div class="container mt-4">
        <h1>О блоге</h1>
        <p>Эксперименты с Ларавелем на Хекслете</p>
        <!-- BEGIN (write your solution here) -->
        @foreach ($team as $employee)
            <h1>Employee name is {{ $employee['name'] }} and position as {{ $employee['position'] }}</h1>
        @endforeach
        <!-- END -->
    </div>
</body>
</html>
