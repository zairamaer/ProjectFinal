<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Properties</title>
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
        a.button {
            display: inline-block;
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
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
        form {
            display: inline;
        }
        form button {
            background-color: #dc3545;
            color: #fff;
            border: none;
            padding: 8px 12px;
            border-radius: 4px;
            cursor: pointer;
        }
        form button:hover {
            background-color: #c82333;
        }
        .actions {
            display: flex;
            gap: 10px;
        }
        .edit-button {
            background-color: #28a745;
            color: #fff;
            border: none;
            padding: 8px 12px;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }
        .edit-button:hover {
            background-color: #218838;
        }
                /* Navigation Styles */
                .navbar {
            background-color: #333;
            color: #fff;
            padding: 10px;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .container .navbar-brand {
            font-size: 24px;
            text-decoration: none;
            color: #fff;
        }

        .container .navbar-nav {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: flex;
            gap: 15px;
        }

        .container .navbar-nav li a {
            text-decoration: none;
            color: #fff;
            font-size: 18px;
            transition: color 0.3s;
        }

        .container .navbar-nav li a:hover {
            color: #ffc107;
        }
    </style>
</head>
<body>
    <div class="container">
        <nav class="navbar">
            <a class="navbar-brand" href="#">Admin Panel</a>
            <ul class="navbar-nav">
                <li><a href="#">Dashboard</a></li>
                <li><a href="{{ route('admin.bookings.index') }}">Bookings</a></li>
                <li><a href="{{ route('admin.properties.index') }}">Properties</a></li>
                <!-- Add more navigation items as needed -->
            </ul>
        </nav>
        <h1>Admin Properties</h1>

        @if(session('success'))
            <div class="success-message">{{ session('success') }}</div>
        @endif

        <a href="{{ route('admin.properties.create') }}" class="button">Create New Property</a>

        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($properties as $property)
                    <tr>
                        <td>{{ $property->name }}</td>
                        <td>{{ $property->description }}</td>
                        <td>{{ $property->price }}</td>
                        <td class="actions">
                            <a href="{{ route('admin.properties.edit', $property->id) }}" class="edit-button">Edit</a>
                            <form action="{{ route('admin.properties.destroy', $property->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
