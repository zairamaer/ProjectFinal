<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link rel="stylesheet" href="{{ asset('css/properties.css') }}">

</head>
<body>
    
    <div class="head">
        <h1>MiniStay</1>
        <div class="head1">
            <div class="head2">
                <a href="welcome">P</a>
            </div>
        </div>
    </div>

    <div class="container">
        <a href="#">Home</a>
        <a href="{{ route('user_bookings') }}">My Bookings</a>
        <a href="welcome">Contacts</a>
    </div>

    <div class="both">

        <div class="filter">
            <!-- Filter Form -->
            <form action="{{ route('users.property.index') }}" method="GET">
                <label for="location"><br>Filter by Location:</label>
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

            
        </div>

        <!-- properties -->
        <div class="container1">
                <ul>
                    @foreach($properties as $property)
                        <li>
                            <a href="{{ route('users.property.show', $property->id) }}" class="property">
                                @if($property->image)
                                    <img src="{{ asset($property->image) }}" alt="{{ $property->name }}">
                                @else
                                    <div class="no-image">
                                        <p>No image available</p>
                                    </div>
                                @endif
                                <div class="property-details">
                                    <h3>Name: {{ $property->name }}</h3>
                                    <p class="price">Price: {{ $property->price }}</p>
                                    <p class="des">Description:</p>
                                    <p>{{ $property->description }}</p>
                                    
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
    </div>
</body>
</html>




