<!-- resources/views/users/create.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>

    <link rel="stylesheet" href="{{ asset('css/register.css') }}">

</head>
<body>
    <form method="POST" action="{{ route('users.store') }}">
        @csrf

        <div class="container">
            <div class="whole">
                <div class="whole1">
                    <img src="{{ asset('images/logo.png') }}">
                </div>
                <div class="tae">
                    <h1>Create User</h1>
                    <label for="name">Name:</label><br>
                    <input type="text" id="name" name="name"><br><br>

                    <label for="email">Email:</label><br>
                    <input type="email" id="email" name="email"><br><br>

                    <label for="password">Password:</label><br>
                    <input type="password" id="password" name="password"><br><br>

                    <button type="submit">Submit</button>

                    <a href="{{ route('login') }}">
                        Back to Login
                    </a>
                </div>
                <!-- <div class="register-link">
                    <a href="{{ route('login') }}">
                        Back to Login
                    </a> -->
                </div>
            </div>
        </div>
    </form>
</body>
</html>


