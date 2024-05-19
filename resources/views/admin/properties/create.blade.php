    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Create Property</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                background-color: #f4f4f4;
                text-align: center; /* Centering the body content */
            }
            .container {
                max-width: 600px;
                margin: 100px auto 20px; /* Added margin-top */
                padding: 20px;
                background-color: #fff;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                text-align: left; /* Reset text-align for inner content */
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
            }
            form button:hover {
                background-color: #0056b3;
            }
            .go-back {
                margin-top: 20px;
                text-align: center;
            }
            .go-back a {
                color: #007bff;
                text-decoration: none;
                font-weight: bold;
            }
            .go-back a:hover {
                text-decoration: underline;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>Create Property</h1>
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
