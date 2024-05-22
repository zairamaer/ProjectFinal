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
        img.property-image {
            max-width: 100px;
            height: auto;
            border-radius: 4px;
        }
                /* Style for "View Details" button */
                .view-details-button {
            background-color: #ffc107; /* Yellow background color */
            color: #212529; /* Dark text color */
            border: none; /* Remove border */
            padding: 8px 12px; /* Padding around the text */
            border-radius: 4px; /* Rounded corners */
            cursor: pointer; /* Add pointer cursor on hover */
            text-decoration: none; /* Remove underline */
            transition: background-color 0.3s; /* Smooth transition for background color */
        }

        .view-details-button:hover {
            background-color: #ffca2b; /* Darken the background color on hover */
        }
    </style>
    <script>
        function confirmDeletion(event) {
            if (!confirm('Are you sure you want to delete this property?')) {
                event.preventDefault();
            }
        }
    </script>
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
                    <th>Location</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($properties as $property)
                    <tr>
                        <td>{{ $property->name }}</td>
                        <td>{{ $property->description }}</td>
                        <td>{{ $property->price }}</td>
                        <td>{{ $property->location }}</td>
                        <td class="actions">
                            <a href="{{ route('admin.properties.edit', $property->id) }}" class="edit-button">Edit</a>
                            <form action="{{ route('admin.properties.destroy', $property->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="confirmDeletion(event)">Delete</button>
                            </form>
                            <a href="{{ route('admin.properties.show', $property->id) }}" class="view-details-button">View Details</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
