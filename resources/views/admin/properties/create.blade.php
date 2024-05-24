    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Create Property</title>

        <link rel="stylesheet" href="{{ asset('css/createadmin.css') }}">
    </head>
    <body>
            <h1>Create Property</h1>
        <div class="container">
            <form action="{{ route('admin.properties.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" autocomplete="name">
                
                <label for="description">Description:</label>
                <textarea id="description" name="description" autocomplete="description"></textarea>
                
                <label for="price">Price:</label>
                <input type="number" id="price" name="price" autocomplete="price">
                
                <label for="location">Location:</label>
                <input type="text" id="location" name="location" autocomplete="location">

                <label for="image">Image:</label>
                <input type="file" id="image" name="image">
                
                <button type="submit">Create Property</button>
            </form>

            <div class="go-back">
                <a href="/admin">Go back to /admin</a>
            </div>
        </div>
    </body>
    </html>
