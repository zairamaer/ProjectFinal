<!-- resources/views/auth/login.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    @if (session('success'))
    <div>{{ session('success') }}</div>
    @endif
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="container">
                <div class="whole">
                    <div class="whole1">
                    <img src="{{ asset('images/logo.png') }}">
                    </div>
                        <div class="tae">
                            <h1>Login</h1>
                            <label for="email">Email:</label><br>
                            <input type="Email" id="email" name="email"><br><br>

                            <label for="password">Password:</label><br>
                            <input type="Password" id="password" name="password"><br><br>

                            <button type="submit">Login</button>

                            <div class="register-link">
                                <p>Don't have an account? </p>
                                <a href="{{ route('users.create') }}">
                                Register
                                </a>
                            </div>

                        </div>

                </div>
            </div>
        </form>
</body>
</html>