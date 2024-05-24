<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Properties</title>

    <link rel="stylesheet" href="{{ asset('css/adminproperty.css') }}">
    <script>
        function confirmDeletion(event) {
            if (!confirm('Are you sure you want to delete this property?')) {
                event.preventDefault();
            }
        }
    </script>
</head>
<body>
        <nav class="navbar">
            <a class="navbar-brand" href="#">Admin Panel</a>
            <ul class="navbar-nav">
                <li><a href="{{ route('admin.dashboard.index') }}">Users</a></li>
                <li><a href="{{ route('admin.bookings.index') }}">Bookings</a></li>
                <li><a href="{{ route('admin.properties.index') }}">Properties</a></li>
                <!-- Add more navigation items as needed -->
            </ul>
        </nav>
        <h1>ADMIN PROPERTIES</h1>

    <div class="container">

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
