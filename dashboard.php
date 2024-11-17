<?php
session_start();
if (!isset($_SESSION['login_user'])) {
    header("location: login.php");
    die();
}
include('config.php');
$action = isset($_POST['action']) ? $_POST['action'] : '';
$user_id = $_SESSION['user_id'];
if ($action == 'order_now') {
    $item_name = $_POST['item_name'];
    $amount = $_POST['amount'];
    $query = "INSERT INTO orders (user_id, item_name, amount) VALUES ('$user_id', '$item_name', '$amount')";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Order placed successfully!');
              window.location.href = 'order_success.php';</script>";
    } else {
        echo "<script>alert('Error placing order: " . mysqli_error($conn) . "');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ninja Food Dashboard</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="gallery.css">
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <style>
        /* Reset CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        /* Global Styles */
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #fff3e0;
        }
        .container {
            max-width: 80%;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .banner {
            background-color: #ff7043;
            color: #fff;
            text-align: center;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .greeting {
            /* background-color: #ff7043; */
            /* color: #fff; */
            text-align: center;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        .menu-section {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .menu-section .menu-box {
            flex: 1;
            background-color: #ffe0b2;
            color: #333;
            text-align: center;
            padding: 20px;
            margin: 10px;
            border-radius: 10px;
            transition: background-color 0.3s ease;
        }
        .menu-section .menu-box:hover {
            background-color: #ffab91;
        }
        .food-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
        }
        .food-item img {
            width: 100px;
            height: 100px;
            border-radius: 5px;
            object-fit: cover;
            margin-right: 20px;
        }
        .food-item .details {
            flex: 1;
        }
        .food-item h2 {
            font-size: 24px;
            margin-bottom: 5px;
        }
        .food-item p {
            font-size: 16px;
            color: #666;
            margin-bottom: 10px;
        }
        .food-item .price {
            font-size: 20px;
            font-weight: bold;
            color: #d32f2f;
        }
        .order-btn {
            background-color: #ff7043;
            color: #fff;
            padding: 8px 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .order-btn:hover {
            background-color: #e64a19;
        }
        header {
            background-color: #e64a19;
            padding: 10px 0;
        }
        #searchInput {
            width: 300px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-right: 10px;
        }
        #searchForm button {
            padding: 8px 16px;
            background-color: #ff7043;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        /* Additional styles for search results */
        .search-result {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .search-result h3 {
            margin-bottom: 5px;
            color: #333;
        }
        .search-result p {
            color: #666;
        }

        nav ul {
            list-style-type: none;
            text-align: center;
        }
        nav ul li {
            display: inline;
            margin-right: 20px;
        }
        nav ul li a {
            color: #fff;
            text-decoration: none;
            font-size: 18px;
            transition: color 0.3s ease;
        }
        nav ul li a:hover {
            color: #ff7043;
        }
        footer {
            text-align: center;
            padding: 20px 0;
            background-color: #e64a19;
            color: #fff;
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="dashboard.php">Home</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <div class="banner">
            <h1>Welcome to Ninja Food, <?php echo htmlspecialchars($_SESSION['login_user']); ?>!</h1>
            <p>Your favorite meals, delivered fast.</p>
        </div>
        <div class="menu-section">
            <div class="menu-box">
                <h2>Breakfast</h2>
                <p>Start your day with our delicious breakfast options.</p>
            </div>
            <div class="menu-box">
                <h2>Lunch</h2>
                <p>Hearty and healthy lunch specials.</p>
            </div>
            <div class="menu-box">
                <h2>Evening Snacks</h2>
                <p>Tasty snacks for your evening cravings.</p>
            </div>
            <div class="menu-box">
                <h2>Dinner</h2>
                <p>Delightful dinners to end your day right.</p>
            </div>
        </div>
        <div class="food-item">
            <img src="food1.jpeg" alt="Spaghetti">
            <div class="details">
                <h2>Spaghetti</h2>
                <p>Delicious pasta served with marinara sauce.</p>
                <p class="price">₹249</p>
            </div>
            <button class="order-btn" onclick="processPayment('Spaghetti', 249)">Order Now</button>
        </div>
        <div class="food-item">
            <img src="food2.jpeg" alt="Veg Loaded Pizza">
            <div class="details">
                <h2>Veg Loaded Pizza</h2>
                <p>Vegetarian pizza loaded with fresh veggies.</p>
                <p class="price">₹399</p>
            </div>
            <button class="order-btn" onclick="processPayment('Veg Loaded Pizza', 399)">Order Now</button>
        </div>
        <div class="food-item">
            <img src="food3.jpeg" alt="Honey Chilly Potato">
            <div class="details">
                <h2>Honey Chilly Potato</h2>
                <p>Spicy and sweet potato snack tossed in honey and chili sauce.</p>
                <p class="price">₹249</p>
            </div>
            <button class="order-btn" onclick="processPayment('Honey Chilly Potato', 249)">Order Now</button>
        </div>
        <div class="food-item">
            <img src="food4.jpeg" alt="Paneer Tandoori Roll">
            <div class="details">
                <h2>Paneer Tandoori Roll</h2>
                <p>Soft paneer wrapped in a tandoori-flavored roll.</p>
                <p class="price">₹129</p>
            </div>
            <button class="order-btn" onclick="processPayment('Paneer Tandoori Roll', 129)">Order Now</button>
        </div>
    </div>

    <div class="greeting">
            <h1>Get the authentic taste from all over the world.</h1>
            <p>Your favorite meals, delivered fast.</p>
     </div>


    <div class="wrapper">
            <div class="items">
                <div class="item" tabindex="0" style="background-image: url(https://e22u.short.gy/KTU286)"></div>
                <div class="item" tabindex="0" style="background-image: url(https://e22u.short.gy/SMBrES)"></div>
                <div class="item" tabindex="0" style="background-image: url(https://e22u.short.gy/f8spJ8)"></div>
                <div class="item" tabindex="0" style="background-image: url(https://e22u.short.gy/SwM7dn)"></div>
                <div class="item" tabindex="0" style="background-image: url(https://e22u.short.gy/8Oipim)"></div>
                <div class="item" tabindex="0" style="background-image: url(https://e22u.short.gy/BWYQgv)"></div>
                <div class="item" tabindex="0" style="background-image: url(https://e22u.short.gy/KzNDfr)"></div>
                <div class="item" tabindex="0" style="background-image: url(https://e22u.short.gy/ne5nuX)"></div>
                <div class="item" tabindex="0" style="background-image: url(https://e22u.short.gy/cwZrVj)"></div>
                <div class="item" tabindex="0" style="background-image: url(https://e22u.short.gy/Xvf2a1)"></div>
                <div class="item" tabindex="0" style="background-image: url(https://e22u.short.gy/pCrIJq)"></div>
                <div class="item" tabindex="0" style="background-image: url(https://e22u.short.gy/mSLCrl)"></div>
                <div class="item" tabindex="0" style="background-image: url(https://e22u.short.gy/EwQcy5)"></div>
            </div>
        </div>


    <footer>
        <p>&copy; 2024 Ninja Food. All rights reserved.</p>
    </footer>
    <form id="orderForm" method="post" style="display:none;">
        <input type="hidden" name="item_name" id="item_name">
        <input type="hidden" name="amount" id="amount">
        <input type="hidden" name="action" value="order_now">
    </form>
    <script>
    function processPayment(itemName, amount) {
        var options = {
            "key": "rzp_test_XxcBi4GZcRiCLQ", // Replace with your Razorpay Key ID
            "amount": amount * 100, // Amount in paise
            "currency": "INR",
            "name": "Ninja Food",
            "description": "Payment for " + itemName,
            "handler": function(response) {
                document.getElementById('item_name').value = itemName;
                document.getElementById('amount').value = amount;
                document.getElementById('orderForm').submit();
            },
            "prefill": {
                "name": "<?php echo htmlspecialchars($_SESSION['login_user']); ?>",
                "email": "" // Add user's email if available
            },
            "theme": {
                "color": "#ff7043"
            }
        };
        var rzp1 = new Razorpay(options);
        rzp1.open();
    }
    </script>

</body>
</html>
