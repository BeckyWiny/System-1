<?php
session_start();
include "connect.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST["login"])) {
        // User Authentication
        $username = mysqli_real_escape_string($con, $_POST["username"]);
        $password = mysqli_real_escape_string($con, $_POST["password"]);

        $query = "SELECT * FROM staff WHERE user_name = '$username' AND password = '$password'";
        $result = mysqli_query($con, $query);

        if ($result) {
            // Authentication successful, set the session variables and redirect to the desired page
            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                $_SESSION['username'] = $username;
                $_SESSION['role'] = $row['role']; // Store the user's role in the session
                header("Location: view_prisoner.php"); // Redirect to view_prisoner.php
                exit();
            } else {
                echo "Invalid username or password.";
            }
        } else {
            echo "Query failed: " . mysqli_error($con);
        }

        mysqli_close($con);
    } elseif (isset($_POST["signup"])) {
        // Process signup logic here
        // Redirect to the desired page after successful signup
        header("Location: user.php"); // Redirect to user.php
        exit();
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Login page</title>
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
        margin: 10px;
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
    #login {
        flex: 1;
        margin-left: 20px;
    }
    #login h1 {
        font-size: 28px;
        font-weight: bold;
        color: #333;
        margin-top: 0;
    }
    #login form {
        margin-top: 20px;
    }
    #login form label {
        display: block;
        margin-bottom: 10px;
    }
    #login form input[type="text"],
    #login form input[type="password"] {
        width: 100%;
        padding: 6px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    #login form input[type="submit"] {
        display: block;
        margin-top: 10px;
        padding: 6px 12px;
        background-color: maroon;
        color: yellow;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    #login form input[type="submit"]:hover {
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
    .copyright {
        background-color: black;
        padding: 5px;
        color: white;
        text-align: center;
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


    <!-- login form -->
    <div class="container">
        <section id="login" class="section">
            <h1>Login</h1>
            <form action="" method="post">
                <label>
                    Username:<br>
                    <input type="text" name="username" required>
                </label><br>
                <label>
                    Password:<br>
                    <input type="password" name="password" required>
                </label><br>
                <input type="submit" name="login" value="Login">
            </form>
            <p>Don't have an account? <a href="user.php">Create one</a></p>
        </section>
    </div>


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
                    <li><a href="https://www.upf.go.ug/">Uganda Police</a></li>
                </ul>
            </div>
            <div id="contact-info">
                <p>The Uganda Prisons Service</p>
                <p>Plot 13/15 Parliament Avenue</p>
                <p>P.O.Box 7182 Kampala</p>
                <p>Tel(1): 256414342136</p>
                <p>Tel(2): 256414256751</p>
                <p>Fax(1): 256414343330</p>
                <p>Fax(2): 256414344014</p>
                <p>Email: info@ugandaprisons.go.ug</p>
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
</body>
</html>
