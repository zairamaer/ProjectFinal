<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        h2 {
            color: #333;
        }
        p {
            color: #666;
            margin: 5px 0;
        }
        img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 20px auto;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        form {
            margin-top: 20px;
        }
        label {
            font-weight: bold;
        }
        input[type="date"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        /* Style for error message */
        .error-message {
            background-color: #f8d7da; 
            color: #721c24; 
            padding: 10px; 
            border-radius: 4px; 
            margin-bottom: 20px; 
        }
                /* Style for success message */
        .success-message {
            background-color: #d4edda; 
            color: #155724; 
            padding: 10px; 
            border-radius: 4px;
            margin-bottom: 20px; 
        }
    </style>
</head>
<body>
    <div class="container">
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

        <div>
            <h2>{{ $property->name }}</h2>
            <p>Description: {{ $property->description }}</p>
            <p>Price: {{ $property->price }}</p>

            <!-- Display Image -->
            @if($property->image)
                <img src="{{ asset($property->image) }}" alt="{{ $property->name }}">
            @else
                <p>No image available</p>
            @endif

            <!-- Booking Form -->
            <form action="{{ route('users.property.book', $property->id) }}" method="POST">
                @csrf
                <label for="check_in">Check-in Date:</label>
                <input type="date" id="check_in" name="check_in" required min="{{ date('Y-m-d', strtotime('+1 day')) }}"><br><br>
                <label for="check_out">Check-out Date:</label>
                <input type="date" id="check_out" name="check_out" required min="{{ date('Y-m-d', strtotime('+1 day')) }}"><br><br>
                <button type="submit">Book Now</button>
            </form>
        </div>
    </div>
</body>
</html>
