<?php
include "session_manager.php";
include "connect.php";

// Define variables and set to empty values
$name = $contact = $email = $dateofbirth = $department_id = $role = "";

// Retrieve departments from the database
$departments = array();
$query = "SELECT * FROM department";
$result = mysqli_query($con, $query);
while ($row = mysqli_fetch_assoc($result)) {
  $departments[] = $row;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize the data
    $name = mysqli_real_escape_string($con, $_POST["name"]);
    $contact = mysqli_real_escape_string($con, $_POST["contact"]);
    $email = mysqli_real_escape_string($con, $_POST["email"]);
    $dateofbirth = mysqli_real_escape_string($con, $_POST["dateofbirth"]);
    $department_id = intval($_POST["department_id"]);
    $role = mysqli_real_escape_string($con, $_POST["role"]);

    // Prepare the SQL statement
    $sql = "INSERT INTO employee (name, contact, email, dateofbirth, department_id, role)
            VALUES ('$name', '$contact', '$email', '$dateofbirth', $department_id, '$role')";

    // Execute the query
    $result = mysqli_query($con, $sql);

    if ($result) {
        // Redirect to a success page or perform any other actions
        header("Location: staff.php");
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
    <title>Add Staff</title>
</script>

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
            font-size: 34px;
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
  <h1>Add Employee</h1>
  <!-- Add Employee Form -->
  <section id="add-employee" class="section">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" required>
      <br><br>
      <label for="contact">Contact:</label>
      <input type="text" id="contact" name="contact" required>
      <br><br>
      <label for="email">Email:</label>
      <input type="text" id="email" name="email" required>
      <br><br>
      <label for="dateofbirth">Date of Birth:</label>
      <input type="date" id="dateofbirth" name="dateofbirth" required>
      <br><br>
      <label for="department">Department:</label>
                <select id="department" name="department_id" required>
                    <?php foreach ($departments as $department) : ?>
                        <option value="<?php echo $department['department_id']; ?>"><?php echo $department['name']; ?></option>
                    <?php endforeach; ?>
                </select>
                
      <br><br>
      <label for="role">Role:</label>
      <input type="text" id="role" name="role" required>
      <br><br>
      <input type="submit" value="Add Employee">
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
