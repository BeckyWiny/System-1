<?php include "session_manager.php"; ?>
<!DOCTYPE html>
<html>
<head>
<title>Add Prisoner</title>
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
    /* .container {
        display: flex;
        max-width: 960px;
        margin:20px;
        padding: 20px;
        background-color: rgba(255, 255, 255, 0.8);
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    } */

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
    <!-- Add Prisoner Form -->
    <section id="add-prisoner" class="section">
        <h1>Register Prisoner</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <label>
                Name:<br>
                <input type="text" name="name" required>
            </label><br>
            <label>
                Date of Birth:<br>
                <input type="date" name="date_of_birth" required>
            </label><br>
            <label>
                Gender:<br>
                <input type="radio" name="gender" value="Male" required>Male
                <input type="radio" name="gender" value="Female" required>Female
            </label><br>
            <label>
                Nationality:<br>
                <select name="nationality" required>
                    <option value="Kenyan">Kenyan</option>
                    <option value="Tanzanian">Tanzanian</option>
                    <option value="Zimbabwean">Zimbabwean</option>
                    <option value="Ugandan">Ugandan</option>
                    <option value="Rwandan">Rwandan</option>
                </select>
            </label><br>
            <label>
                Offenses:<br>
                <input type="text" name="offenses" required>
            </label><br>
            <label>
                Image of Prisoner:<br>
                <input type="file" name="image" required>
            </label><br>
            <label>
                Sentence Length:<br>
                <input type="text" name="sentence_length" required>
            </label><br>
            <label>
                Cell ID:<br>
                <input type="text" name="cell_id" required>
            </label><br>
            <label>
                Incarceration Date:<br>
                <input type="date" name="incarsaration_date" required>
            </label><br>
            <input type="submit" name="register" value="Register Prisoner">
        </form>
    </section>
</div>

<?php
include("connect.php");

if(isset($_POST["register"])){
    // Validate and sanitize user inputs
    $name = mysqli_real_escape_string($con, $_POST["name"]);
    $date_of_birth = $_POST["date_of_birth"];
    $gender = $_POST["gender"];
    $nationality = mysqli_real_escape_string($con, $_POST["nationality"]);
    $offenses = mysqli_real_escape_string($con, $_POST["offenses"]);
    $sentence_length = $_POST["sentence_length"];
    $cell_id = $_POST["cell_id"];
    $incarsaration_date = $_POST["incarsaration_date"];

    // Process image upload
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["image"]["size"] > 50000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow only specific image file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            // Insert prisoner data into the database
            $query = "INSERT INTO prisoner (name, date_of_birth, gender, nationality, offenses, image_url, sentence_length, cell_id, incarsaration_date) VALUES ('$name', '$date_of_birth', '$gender', '$nationality', '$offenses', '$target_file', '$sentence_length', '$cell_id', '$incarsaration_date')";
            $result = mysqli_query($con, $query);
            if($result){
                echo "Prisoner registered successfully.";
            } else {
                echo "Error registering prisoner: " . mysqli_error($con);
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

mysqli_close($con);
?>


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
