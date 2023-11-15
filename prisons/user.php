<?php include "session_manager.php"; ?>

<!DOCTYPE html>
<html>
<head>
<title>Sign Up</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    <style>
        /* Global Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            display: flex;
            max-width: 960px;
            margin: 0 auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
        /* Header Styles */
        header {
            background-color: #9F322F;
            display: flex;
            align-items: center;
            padding: 20px;
            color: #FFF;
        }
        header .logo {
            margin-right: 20px;
            padding-left: 20px;
        }
        header h1 {
            font-weight: bold;
            margin: 10;
            font-size: 34px;
            color: #FFF;
        }
        /* Menu Styles */
        .menu {
            flex: 1;
            background-color: #452424;
        }
        .menu-items {
            display: flex;
            justify-content: center;
            align-items: center;
            list-style-type: none;
            padding: 0;
            margin: 0;
            font-size: 13px;
        }
        .menu-items li {
            margin-bottom: 10px;
            margin-top: 10px;
            margin-left: 10px;
        }
        .menu-items li a {
            display: block;
            padding: 6px;
            text-decoration: none;
            color: #fff;
            border-right: 1px solid #fff;
        }
        /* Form Styles */
        #create-admin {
            flex: 1;
            margin-left: 20px;
        }
        #create-admin h1 {
            font-size: 28px;
            font-weight: bold;
            color: #333;
            margin-top: 0;
        }
        #create-admin form {
            margin-top: 20px;
        }
        #create-admin form label {
            display: block;
            margin-bottom: 10px;
        }
        #create-admin form input[type="text"],
        #create-admin form input[type="password"],
        #create-admin form input[type="email"],
        #create-admin form input[type="number"] {
            width: 100%;
            padding: 6px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        #create-admin form input[type="submit"] {
            display: block;
            margin-top: 10px;
            padding: 6px 12px;
            background-color: maroon;
            color: yellow;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        #create-admin form input[type="submit"]:hover {
            background-color: #800000;
        }
        /* footer */
        footer {
        margin-top: 10px;
        padding: 5px;
        background-color: #9F322F;
        color: #fff;
        text-align: left;
    }

    #contact {
        display: flex;
        justify-content: space-around;
        margin-top: 10px;
        padding: 5px;
        color: white;
    }

    #links {
        list-style-type: none;
        padding: 0;
    }

    #links li {
        display: flex;
        align-items: center;
    }

    #links li:before {
        content: "\2022";
        color: white;
        display: inline-block;
        width: 1em;
        margin-left: -1em;
    }

    #links a {
        text-decoration: none;
        color: white;
        margin-left: 5px;
    }
    #links h3 {
        text-align: center;
    }
    .copyright {
        background-color: black;
        padding: 5px;
        color: white;
        text-align: center;
    }
    #links,
    #menu {
        list-style-type: none;
        padding: 0;
    }

    #links li,
    #menu li {
        display: flex;
        align-items: center;
    }

    #links li:before,
    #menu li:before {
        content: "\2022";
        color: white;
        display: inline-block;
        width: 1em;
        margin-left: -1em;
    }

    #links a,
    #menu a {
        text-decoration: none;
        color: white;
        margin-left: 5px;
    }

    #links h3,
    #menu h3 {
        text-align: left;
    }

    #contact-info {
        text-align: left;
    }

    #menu {
        margin-left: 20px;
    }
 /* Button Styles */
 .menu-items,
    .logout-buttons,
    .login-signup-buttons {
        display: flex;
        align-items: center;
    }
    .logout-button,
    .login-button,
    .signup-button {
        padding: 10px 20px;
        border-radius: 5px;
        margin-right: 10px;
    }
    .logout-button {
        background-color: red;
        margin-left: 100px;

    }
    .login-button {
        background-color: red;
        margin-left: 100px;

    }
    .signup-button {
        background-color: green;
    }
    </style>
</head>
<body>
<header>
    <div class="logo">
        <img src="prisons.png" alt="Prisons Logo" style="width: 400px;">
    </div>
    <h1>Prison Management System</h1>
</header>

<!-- Menu -->
<nav class="menu">
    <div class="menu-bar">
        <ul class="menu-items">
        <li><a href="home.php">HOME</a></li>
                <li><a href="staff.php">STAFF</a></li>
                <li><a href="visitors.php">VISITORS</a></li>
                <li><a href="view_prisoner.php">PRISONERS</a></li>
            <li class="login-signup">
                <?php
                // Check if the user is logged in
                if (isset($_SESSION['username'])) {
                    // User is logged in, show logout button
                    echo '<div class="logout-buttons">
                            <a href="logout.php" class="logout-button">Logout</a>
                        </div>';
                } else {
                    // User is not logged in, show login and signup buttons
                    echo '<div class="login-signup-buttons">
                            <a href="login.php" class="login-button">Login</a>
                            <a href="user.php" class="signup-button">Sign Up</a>
                        </div>';
                }
                ?>
            </li>
        </ul>
    </div>
</nav>


    <div class="container">
        <section id="create-admin" class="section">
            <!-- Create Form -->
            <h1>Create Account</h1>
            <form action="" method="post">
                <label>
                    Username:<br>
                    <input type="text" name="username" required>
                </label><br>
                <label>
                    Password:<br>
                    <input type="password" name="password" required>
                </label><br>
                <label>
                    Email:<br>
                    <input type="email" name="email" required>
                </label><br>
                <p>Position:</p>
                <input type="text" name="position" required><br>
                <p>Department:</p>
                <input type="text" name="department" required><br>
                <p>Contact:</p>
                <input type="text" name="contact" required><br>
                <input type="hidden" name="role" value="admin">
                <p>Already have an account? <a href="login.php">Login here</a>.</p>
                <input type="submit" name="create_admin" value="Create Account">
            </form>
        </section>
    </div>
    <?php
include("connect.php");

// Create Account
if (isset($_POST["create_admin"])) {
    $username = mysqli_real_escape_string($con, $_POST["username"]);
    $password = mysqli_real_escape_string($con, $_POST["password"]);
    $email = mysqli_real_escape_string($con, $_POST["email"]);
    $position = mysqli_real_escape_string($con, $_POST["position"]);
    $department = mysqli_real_escape_string($con, $_POST["department"]);
    $contact = mysqli_real_escape_string($con, $_POST["contact"]);

    $query = "INSERT INTO staff (user_name, password, email, position, department, contact) VALUES ('$username', '$password', '$email', '$position', '$department', '$contact')";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo "Account created successfully.";
    } else {
        echo "Error creating account: " . mysqli_error($con);
    }
}

mysqli_close($con);
?>


<!-- footer -->
<footer>
    <section id="contact" class="section">
        <div id="links">
            <h3>Useful Links</h3>
            <ul>
                <li><a href="https://www.uganda.go.ug/">Government Web Portal</a></li>
                <li><a href="https://www.mia.go.ug/">Ministry of Internal Affairs</a></li>
                <li><a href="https://www.judiciary.go.ug/">The Judiciary</a></li>
                <li><a href="https://www.dpp.go.ug/">Directorate of Public Prosecutions</a></li>
                <li><a href="https://jlos.go.ug/">Justice Law and Order Sector</a></li>
                <li><a href="https://eeas.europa.eu/delegations/uganda_en">European Union</a></li>
                <li><a href="https://www.gov.uk/world/uganda">British High Commission</a></li>
                <li><a href="https://www.netherlandsandyou.nl/countries/uganda">Netherlands Embassy</a></li>
                <li><a href="https://www.un.org/uganda/">United Nations Uganda</a></li>
            </ul>
        </div>
        <div id="contact-info">
            <h3>Contact Information</h3>
            <p><strong>Uganda Prisons Service Headquarters</strong></p>
            <p>Plot 12 Johnstone Road</p>
            <p>P.O. Box 7182, Kampala, Uganda</p>
            <p>Tel: +256-41-4351200</p>
            <p>Email: info@prisons.go.ug</p>
        </div>
        <div id="menu">
                <h3>Menu</h3>
                <ul>
                <li><a href="home.php">HOME</a></li>
                <li><a href="staff.php">STAFF</a></li>
                <li><a href="visitors.php">VISITORS</a></li>
                <li><a href="view_prisoner.php">PRISONERS</a></li>
                </ul>
            </div>
    </section>
    </footer>
    <div class="copyright">
        <p>&copy; 2023 Prison Management System. All rights reserved.</p>
    </div>

<!-- End of footer -->
</body>
</html>
