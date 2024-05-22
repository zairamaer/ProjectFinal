<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Property Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
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
            margin-bottom: 10px;
        }
        p {
            color: #666;
            margin-bottom: 5px;
        }
        img {
            max-width: 100%;
            height: auto;
            display: block;
            margin-top: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Admin Property Details</h1>

        <div>
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
