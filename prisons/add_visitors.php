<?php
include "session_manager.php";
include "connect.php";

// Define variables and set to empty values
$name = $prisonerID = $visitDate = $reason = $contactNumber = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize the data
    $name = mysqli_real_escape_string($con, $_POST["name"]);
    $prisonerID = intval($_POST["prisoner_id"]);
    $visitDate = mysqli_real_escape_string($con, $_POST["visit_date"]);
    $reason = mysqli_real_escape_string($con, $_POST["reason"]);
    $contactNumber = mysqli_real_escape_string($con, $_POST["contact"]);

    // Prepare the SQL statement
    $sql = "INSERT INTO visit (name, prisoner_id, visit_date, reason, contact) 
            VALUES ('$name', $prisonerID, '$visitDate', '$reason', '$contactNumber')";

    // Execute the query
    $result = mysqli_query($con, $sql);

    if ($result) {
        // Redirect to a success page or perform any other actions
        header("Location: visitors.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($con);
    }
}

mysqli_close($con);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Visitor</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
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
            font-size: 35px;
            color: #FFF;
        }

    .container {
        max-width: 960px;
        margin: 20px auto;
        padding: 20px;
        background-color: #FFF;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
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
/* form code */
.container {
  max-width: 960px;
  margin: 20px auto;
  padding: 20px;
  background-color: #FFF;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

.container form {
  display: flex;
  flex-direction: column;
}

.container label {
  font-weight: bold;
  margin-bottom: 5px;
}
.container h1 {
  margin-bottom: 5px;
  text-align: center;
}

.container input[type="text"],
.container input[type="number"],
.container input[type="date"],
.container textarea {
  padding: 8px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
  font-size: 14px;
}

.container input[type="submit"] {
  padding: 10px 20px;
  background-color: #4CAF50;
  color: white;
  border: none;
  border-radius: 4px;
  font-size: 16px;
  cursor: pointer;
}

.container input[type="submit"]:hover {
  background-color: #45a049;
}

.container input[type="submit"]:focus {
  outline: none;
}

.container textarea {
  resize: vertical;
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
        background-color: blue;
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
      <h1>Add Visitor</h1>
        <!-- Add Visitor Form -->
        <section id="add-visitor" class="section">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
                <br><br>
                <label for="prisoner_id">Prisoner ID:</label>
                <input type="text" id="prisoner_id" name="prisoner_id" required>
                <br><br>
                <label for="visit_date">Visit Date:</label>
                <input type="date" id="visit_date" name="visit_date" required>
                <br><br>
                <label for="reason">Reason for Visit:</label>
                <textarea id="reason" name="reason" rows="4" required></textarea>
                <br><br>
                <label for="contact">Contact Number:</label>
                <input type="text" id="contact" name="contact" required>
                <br><br>
                <input type="submit" value="Add Visitor">
            </form>
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
        <br>
    </footer>
    <div class="copyright">
        <p>&copy; 2023 Prison Management System. All rights reserved.</p>
    </div>
</body>
</html>
