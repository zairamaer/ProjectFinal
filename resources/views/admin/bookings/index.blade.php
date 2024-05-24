<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Bookings</title>

    <link rel="stylesheet" href="{{ asset('css/adminbooking.css') }}">
</head>
<body>
    <h1>LIST OF BOOKINGS</h1>
    <div class="container">
        <nav class="navbar">
            <a class="navbar-brand" href="{{ route('admin.properties.index') }}">Admin Panel</a>
            <ul class="navbar-nav">
                <li><a href="{{ route('admin.dashboard.index') }}">Users</a></li>
                <li><a href="{{ route('admin.bookings.index') }}">Bookings</a></li>
                <li><a href="{{ route('admin.properties.index') }}">Properties</a></li>
                <!-- Add more navigation items as needed -->
            </ul>
        </nav>


        @if (count($bookings) > 0)
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                   
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
