<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Property</title>
    <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
</head>
<body>

    <h1>Edit Property</h1>

    <div class="container">
        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('admin.properties.update', $property->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name', $property->name) }}" required>
            
            <label for="description">Description:</label>
            <textarea id="description" name="description" required>{{ old('description', $property->description) }}</textarea>
            
            <label for="price">Price:</label>
            <input type="number" id="price" name="price" value="{{ old('price', $property->price) }}" required min="0">

            <label for="location">Location:</label>
            <input type="text" id="location" name="location" value="{{ old('location', $property->location) }}" autocomplete="address-line1" required>

            <label for="image">Image:</label>
            <input type="file" id="image" name="image">
            
            <button type="submit">Update Property</button>
            <a href="{{ route('admin.properties.index') }}" class="go-back-button">Go Back</a>
        </form>
    </div>
</body>
</html>
