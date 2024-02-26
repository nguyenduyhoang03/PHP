<!-- resources/views/layout.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management System</title>
</head>
<body>
<header>
    <h1>Employee Management System</h1>
    <nav>
        <ul>
            <li><a href="{{ route('employees.index') }}">Employees</a></li>
        </ul>
    </nav>
</header>
<main>
    @yield('content')
</main>
<footer>
    <p>&copy; 2024 Employee Management System</p>
</footer>
</body>
</html>
