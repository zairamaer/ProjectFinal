<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 40px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            margin-top: 0;
            margin-bottom: 20px;
            text-align: center;
        }
        .success-message {
            margin-bottom: 20px;
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            border-radius: 4px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f9f9f9;
        }
        .navbar {
            background-color: #333;
            color: #fff;
            padding: 10px;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .navbar .navbar-brand {
            font-size: 24px;
            text-decoration: none;
            color: #fff;
        }
        .navbar .navbar-nav {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: flex;
            gap: 15px;
        }
        .navbar .navbar-nav li a {
            text-decoration: none;
            color: #fff;
            font-size: 18px;
            transition: color 0.3s;
        }
        .navbar .navbar-nav li a:hover {
            color: #ffc107;
        }
    </style>
</head>
<body>
    <div class="container">
        <nav class="navbar">
            <a class="navbar-brand" href="#">Admin Panel</a>
            <ul class="navbar-nav">
                <li><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></li>
                <li><a href="{{ route('admin.bookings.index') }}">Bookings</a></li>
                <li><a href="{{ route('admin.properties.index') }}">Properties</a></li>
                <!-- Add more navigation items as needed -->
            </ul>
        </nav>
        <h1>All Users</h1>

        <!-- You can add a success message if needed -->

        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
