<!-- navigation.blade.php -->

<style>
    .navbar {
        background-color: #333;
        color: #fff;
        padding: 10px;
    }

    .container {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .navbar-brand {
        font-size: 24px;
        text-decoration: none;
        color: #fff;
    }

    .navbar-nav {
        list-style-type: none;
        padding: 0;
        margin: 0;
        display: flex;
    }

    .navbar-nav li {
        margin-right: 15px;
    }

    .navbar-nav li a {
        text-decoration: none;
        color: #000; /* Change text color to black */
        font-size: 18px;
        transition: color 0.3s;
    }

    .navbar-nav li a:hover {
        color: #ffc107;
    }
</style>

<nav class="navbar">
    <div class="container">
        <a class="navbar-brand" href="#">Admin Panel</a>
        <ul class="navbar-nav">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Bookings</a></li>
            <li><a href="#">Properties</a></li>
            <!-- Add more navigation items as needed -->
        </ul>
    </div>
</nav>
