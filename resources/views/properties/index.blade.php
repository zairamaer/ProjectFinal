<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Properties</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
        }
        ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        li {
            margin-bottom: 20px;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
        .property {
            display: flex;
            align-items: center;
            padding: 10px;
            background-color: #fff;
        }
        .property img {
            max-width: 150px;
            margin-right: 20px;
            border-radius: 8px;
        }
        .property-details {
            flex-grow: 1;
        }
        .property-details h3 {
            font-size: 20px;
            margin: 0 0 10px;
        }
        .property-details p {
            margin: 0 0 5px;
        }
        .property-details p.price {
            font-weight: bold;
        }
        .no-image {
            padding: 10px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>All Properties</h1>

        <!-- Filter Form -->
        <form action="{{ route('property.index') }}" method="GET">
            <label for="location">Filter by Location:</label>
            <select name="location" id="location">
                <option value="">All</option>
                @foreach($locations as $location)
                    <option value="{{ $location }}" {{ request()->input('location') == $location ? 'selected' : '' }}>
                        {{ $location }}
                    </option>
                @endforeach
            </select>
            <button type="submit">Filter</button>
        </form>


        <ul>
            @foreach($properties as $property)
                <li>
                    <a href="{{ route('property.show', $property->id) }}" class="property">
                        @if($property->image)
                            <img src="{{ asset($property->image) }}" alt="{{ $property->name }}">
                        @else
                            <div class="no-image">
                                <p>No image available</p>
                            </div>
                        @endif
                        <div class="property-details">
                            <h3>{{ $property->name }}</h3>
                            <p>{{ $property->description }}</p>
                            <p class="price">Price: {{ $property->price }}</p>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>
