<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - All Bookings</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            margin-top: 0;
            margin-bottom: 20px;
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
        .actions {
            display: flex;
            gap: 10px;
        }
        .actions button {
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .approve {
            background-color: #4caf50;
            color: #fff;
        }
        .decline {
            background-color: #f44336;
            color: #fff;
        }
        .status {
            text-transform: capitalize;
        }
        .no-bookings {
            margin-top: 20px;
            color: #888;
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
                <li><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></li>
                <li><a href="{{ route('admin.bookings.index') }}">Bookings</a></li>
                <li><a href="{{ route('admin.properties.index') }}">Properties</a></li>
                <!-- Add more navigation items as needed -->
            </ul>
        </nav>

        <h1>All Bookings</h1>

        @if (count($bookings) > 0)
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Email</th>
                    <th>Property</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Check In</th>
                    <th>Check Out</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookings as $booking)
                <tr>
                    <td>{{ $booking->id }}</td>
                    <td>{{ $booking->user->name }}</td>
                    <td>{{ $booking->user->email }}</td>
                    <td>{{ $booking->property->name }}</td>
                    <td>{{ $booking->property->description }}</td>
                    <td>P{{ $booking->property->price }}</td>
                    <td>{{ $booking->check_in }}</td>
                    <td>{{ $booking->check_out }}</td>
                    <td class="status">{{ $booking->status }}</td>
                    <td class="actions">
                        @if($booking->status == 'pending')
                            <form action="{{ route('admin.bookings.updateStatus', $booking->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="status" value="approved">
                                <button class="approve" type="submit">Approve</button>
                            </form>
                            <form action="{{ route('admin.bookings.updateStatus', $booking->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="status" value="declined">
                                <button class="decline" type="submit">Decline</button>
                            </form>
                        @else
                            {{ ucfirst($booking->status) }}
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <p class="no-bookings">No bookings found.</p>
        @endif
    </div>
</body>
</html>
