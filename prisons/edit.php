<?php
include "session_manager.php";
require "connect.php";

// Retrieve the prisoner ID from the URL
if (isset($_GET['prisoner_id'])) {
    $prisoner_id = $_GET['prisoner_id'];
} else {
    // Handle the case when the ID is not provided
    // You can redirect the user or display an error message
    echo "Prisoner ID not provided.";
    exit;
}

// Retrieve the prisoner's information from the database
$query = "SELECT prisoner.*, IFNULL(prisoner.image_url, '') AS image_url FROM prisoner WHERE prisoner_id = ?";
$stmt = $con->prepare($query);
$stmt->bind_param('i', $prisoner_id);
$stmt->execute();
$result = $stmt->get_result();
$prisonerData = $result->fetch_assoc();
$stmt->close();

// Handle the image upload
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $date_of_birth = $_POST['date_of_birth'];
    $gender = $_POST['gender'];
    $nationality = $_POST['nationality'];
    $offenses = $_POST['offenses'];
    $sentence_length = $_POST['sentence_length'];
    $cell_id = $_POST['cell_id'];

    // Check if the image file was uploaded
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image = $_FILES['image'];

        // Retrieve the file details
        $image_name = $image['name'];
        $image_tmp = $image['tmp_name'];

        // Move the uploaded file to the desired location
        $destination = 'D:\wamp\www\prisons\edits' . $image_name;
        if (is_uploaded_file($image_tmp)) {
            move_uploaded_file($image_tmp, $destination);

            // Update the image_url field in your database
            $update_query = "UPDATE prisoner SET
                            name = ?,
                            date_of_birth = ?,
                            gender = ?,
                            nationality = ?,
                            offenses = ?,
                            sentence_length = ?,
                            cell_id = ?,
                            image_url = ?
                            WHERE prisoner_id = ?";
            $update_stmt = $con->prepare($update_query);
            $update_stmt->bind_param('ssssssisi', $name, $date_of_birth, $gender, $nationality, $offenses, $sentence_length, $cell_id, $image_name, $prisoner_id);
            $update_stmt->execute();
            $update_stmt->close();
        } else {
            // Display an error message if the file upload failed
            echo 'Failed to upload the image.';
        }
    } else {
        // Update the prisoner information without changing the image
        $update_query = "UPDATE prisoner SET
                        name = ?,
                        date_of_birth = ?,
                        gender = ?,
                        nationality = ?,
                        offenses = ?,
                        sentence_length = ?,
                        cell_id = ?
                        WHERE prisoner_id = ?";
        $update_stmt = $con->prepare($update_query);
        $update_stmt->bind_param('ssssssii', $name, $date_of_birth, $gender, $nationality, $offenses, $sentence_length, $cell_id, $prisoner_id);
        $update_stmt->execute();
        $update_stmt->close();
    }

    // Redirect the user to the prisoner list page
    header('Location: view_prisoner.php');
    exit;
}

// Close the database connection
mysqli_close($con);
?>




<!DOCTYPE html>
<html>
<head>
    <title>Update Prisoner</title>
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
  justify-content: center; /* Center align the form vertically */
  height: 100%; /* Set the form height to cover the entire section */
}

.container label {
  font-weight: bold;
  margin-bottom: 5px;
}

.container input[type="text"],
.container input[type="number"],
.container input[type="date"],
.container textarea,
.container select {
  padding: 8px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
  font-size: 14px;
  width: 100%;
}

.container input[type="submit"] {
  padding: 10px 20px;
  background-color: #4CAF50;
  color: white;
  border: none;
  border-radius: 4px;
  font-size: 16px;
  cursor: pointer;
  width: auto;
  margin-top: 10px;
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

.container section {
  height: 100%; /* Set the section height to cover the entire container */
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
    </div>
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

<!-- Update Prisoner Form -->
<div class="container">
    <section id="add-prisoner" class="section">
        <br><h1>Update Prisoner</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" value="<?php echo $prisonerData['name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="date_of_birth">Date of Birth:</label>
                <input type="date" name="date_of_birth" id="date_of_birth" value="<?php echo $prisonerData['date_of_birth']; ?>" required>
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select name="gender" id="gender" required>
                    <option value="Male" <?php if ($prisonerData['gender'] == 'Male') echo 'selected'; ?>>Male</option>
                    <option value="Female" <?php if ($prisonerData['gender'] == 'Female') echo 'selected'; ?>>Female</option>
                </select>
            </div>
            <div class="form-group">
                <label for="nationality">Nationality:</label>
                <input type="text" name="nationality" id="nationality" value="<?php echo $prisonerData['nationality']; ?>" required>
            </div>
            <div class="form-group">
                <label for="offenses">Offenses:</label>
                <textarea name="offenses" id="offenses" rows="4" required><?php echo $prisonerData['offenses']; ?></textarea>
            </div>

            <div class="form-group">
    <label for="image">Image:</label>
    <input type="file" name="image" id="image">
    <?php if (!empty($prisonerData['image_url'])): ?>
        <img src="<?php echo $prisonerData['image_url']; ?>" alt="Prisoner Image" style="width: 200px;">
    <?php endif; ?>
</div>

<br>
            <div class="form-group">
                <label for="sentence_length">Sentence Length:</label>
                <input type="text" name="sentence_length" id="sentence_length" value="<?php echo $prisonerData['sentence_length']; ?>" required>
            </div>
            <div class="form-group">
                <label for="cell_id">Cell ID:</label>
                <input type="text" name="cell_id" id="cell_id" value="<?php echo $prisonerData['cell_id']; ?>" required>
            </div>
            <input type="submit" name="update" value="Update">
        </form>
    </section>
</div>

<!-- Footer -->
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
