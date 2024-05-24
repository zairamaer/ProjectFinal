<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Property Details</title>
    <link rel="stylesheet" href="{{ asset('css/show.css') }}">

</head>
<body>
    <h1>Admin Property Details</h1>
    <div class="container">

        <div class="lmn">
            <h2>{{ $property->name }}</h2>
            <p><strong>Description:</strong> {{ $property->description }}</p>
            <p><strong>Price:</strong> {{ $property->price }}</p>

            <!-- Display Image -->
            @if($property->image)
                <img src="{{ asset($property->image) }}" alt="{{ $property->name }}">
            @else
                <p>No image available</p>
            @endif
        </div>
    </div>
</body>
</html>
