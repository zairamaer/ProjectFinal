<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Details</title>

    <link rel="stylesheet" href=" {{ asset('css/userproperty.css') }}">

</head>
<body>
    <h1>Property Details</h1>
    
    @if ($errors->any())
        <div class="error-message">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Display success message -->
    @if (session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif


    <div class="lahat">
        <div class="details">

            <a href="{{ route('users.property.index') }}">
                < Back to Home
            </a>

            <h2>Name: {{ $property->name }}</h2>
            <!-- Display Image -->
            @if($property->image)
                <img src="{{ asset($property->image) }}" alt="{{ $property->name }}">
            @else
                <p>No image available</p>
            @endif

            <p>Price: {{ $property->price }}</p>

            <p>Description: {{ $property->description }}</p>
            
        </div>
            <!-- Booking Form -->
            <div class="container">
                <form action="{{ route('users.property.book', $property->id) }}" method="POST">
                    @csrf
                    <label for="check_in">Check-in Date:<br></label>
                    <input type="date" id="check_in" name="check_in" required min="{{ date('Y-m-d', strtotime('+1 day')) }}"><br><br>
                    <label for="check_out">Check-out Date:<br></label>
                    <input type="date" id="check_out" name="check_out" required min="{{ date('Y-m-d', strtotime('+1 day')) }}"><br><br>
                    <button type="submit">Book Now</button>
                </form>
            </div>
    </div>        
</body>
</html>
