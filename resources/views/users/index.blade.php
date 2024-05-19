<!-- resources/views/bookings/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Bookings</title>
</head>
<body>
    <h1>My Bookings</h1>

    @if ($bookings && count($bookings) > 0)
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
            </tr>
        </thead>
        <tbody>
            @foreach ($bookings as $booking)
            <tr>
                <td>{{ $booking->id }}</td>
                <td>{{ $booking->property->name }}</td>
                <td>{{ $booking->property->description }}</td>
                <td>{{ $booking->property->price }}</td>
                <td>{{ $booking->check_in }}</td>
                <td>{{ $booking->check_out }}</td>
                <td>{{ ucfirst($booking->status) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>No bookings found.</p>
    @endif
</body>
</html>
