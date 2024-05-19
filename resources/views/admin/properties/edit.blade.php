<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Property</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 100px auto 20px; /* Added margin-top */
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            margin-top: 0;
            margin-bottom: 20px;
        }
        form label {
            display: block;
            margin-bottom: 5px;
        }
        form input[type="text"],
        form textarea,
        form input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        form button {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 12px 20px;
            cursor: pointer;
            font-size: 16px;
            margin-right: 10px;
        }
        form button:hover {
            background-color: #0056b3;
        }
        .go-back-button {
            background-color: #6c757d;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 12px 20px;
            cursor: pointer;
            font-size: 16px;
            text-decoration: none;
            display: inline-block;
        }
        .go-back-button:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Property</h1>
        <form action="{{ route('admin.properties.update', $property->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ $property->name }}">
            
            <label for="description">Description:</label>
            <textarea id="description" name="description">{{ $property->description }}</textarea>
            
            <label for="price">Price:</label>
            <input type="number" id="price" name="price" value="{{ $property->price }}">

            <label for="location">Location:</label>
            <input type="text" id="location" name="location" autocomplete="location">

            <input type="file" name="image">
            
            <button type="submit">Update Property</button>
            <a href="{{ route('admin.properties.index') }}" class="go-back-button">Go Back</a>
        </form>
    </div>
</body>
</html>
