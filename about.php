<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Ninja Food</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            color: #333;
        }

        header {
            background-color: #e64a19;
            padding: 10px 0;
            text-align: center;
        }

        header nav ul {
            list-style-type: none;
            padding: 0;
        }

        header nav ul li {
            display: inline;
            margin: 0 15px;
        }

        header nav ul li a {
            color: #fff;
            text-decoration: none;
            font-size: 18px;
            transition: color 0.3s ease;
        }

        header nav ul li a:hover {
            color: #9c27b0;
        }

        .container {
            max-width: 80%;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        h1 {
            text-align: center;
            font-family: 'Sriracha', cursive;
            font-size: 36px;
            color: #333;
            margin-bottom: 20px;
        }

        .about-section, .team-section {
            margin-bottom: 40px;
        }

        .about-section p, .team-section p {
            font-size: 18px;
            line-height: 1.6;
            color: #666;
        }

        .team {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }

        .team-member {
            max-width: 30%;
            text-align: center;
            margin: 20px 0;
        }

        .team-member h3 {
            font-size: 22px;
            margin-bottom: 5px;
        }

        .team-member p {
            font-size: 16px;
            color: #777;
        }

        footer {
            text-align: center;
            padding: 20px 0;
            background-color:  #e64a19;
            color: #fff;
            position: relative;
            width: 100%;
            bottom: 0;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="dashboard.php">Home</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <h1>About Us</h1>
        <div class="about-section">
            <h2>Our Story</h2>
            <p>Ninja Food was founded with a mission to provide delicious and healthy food to our customers. We believe in using the freshest ingredients to create mouth-watering dishes that satisfy your cravings and nourish your body. Our journey started in a small kitchen, and today we are proud to serve our culinary delights to a growing community of food lovers.</p>
        </div>

        <div class="team-section">
            <h2>Our Team</h2>
            <div class="team">
                <div class="team-member">
                    <h3>Shovan Nayak</h3>
                </div>
                <div class="team-member">
                    <h3>Manab Bhattacharjee</h3>
                </div>
                <div class="team-member">
                    <h3>Swaraj Singh</h3>
                </div>
                <div class="team-member">
                    <h3>Snigdhadip Ghosh</h3>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Ninja Food. All rights reserved.</p>
    </footer>
</body>
</html>
