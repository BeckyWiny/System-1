<?php
include "session_manager.php";

// Redirect the user to the login page if not logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Visitors</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }
        .container {
    max-width: 100%;
    margin: 0 auto;
    padding: 20px;
    background-color: rgba(255, 255, 255, 0.8);
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    min-height: 100vh; /* Set min-height to 100vh to ensure the container takes up the full height of the viewport */
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

    .search-form {
         margin-left: 200px;
         margin-right: 10px;
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

/* Table styles */

.container h1 {
    font-size: 24px;
    margin-bottom: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
}

thead {
    background-color: #9F322F;
    color: #FFF;
}

th, td {
    padding: 10px;
    text-align: left;
}

tbody tr:nth-child(even) {
    background-color: #f2f2f2;
}

tbody tr:hover {
    background-color: #e0e0e0;
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
    /* ADD prisoner button */
.add-visitor-button {
    float: right;
    margin-top: -50px;
    background-color: #4CAF50;
    color: white;
    border: none;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    border-radius: 5px;
    transition: background-color 0.3s;
}

.add-visitor-button:hover {
    background-color: #45a049;
}
</style>
<header>
    <div class="logo">
        <img src="prisons.png" alt="Prisons Logo" style="width: 400px;">
    </div>
    <h1>Prison Management System</h1>
   <!-- search bar -->
   <div class="search-form">
        <form action="visitors.php" method="GET">
            <input type="text" name="query" placeholder="Search">
            <input type="submit" value="Search">
        </form>
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

<div class="container">
    <div class="content">
        <br>
        <h1>Visitor Table</h1>
        <?php
            // Check if the user is an admin to display the Add Prisoner button
            if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
                echo '<a href="add_visitors.php" class="add-visitor-button">Add Visitors</a>';
            }
            ?>   
         <!-- View Visitors Table -->
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Prisoner ID</th>
                    <th>Visit Date</th>
                    <th>Reason for Visit</th>
                    <th>Contact Number</th>
                    <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>
                        <th>Actions</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
            <?php
            include("connect.php");

            // Check if a search query is provided
            if (isset($_GET['query'])) {
                $searchQuery = $_GET['query'];
                $query = "SELECT * FROM visit WHERE name LIKE '%$searchQuery%'";
            } else {
                $query = "SELECT * FROM visit";
            }

            // Fetch visitor records from the database
            $result = mysqli_query($con, $query);

            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    // Output data of each row
                    echo "<tr>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["prisoner_id"] . "</td>";
                    echo "<td>" . $row["visit_date"] . "</td>";
                    echo "<td>" . $row["reason"] . "</td>";
                    echo "<td>" . $row["contact"] . "</td>";

                    if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
                        echo "<td>";
                        echo "<a href='edit_visitor.php?visit_id=" . $row['visit_id'] . "' class='btn btn-success' style='text-decoration: none; color: white; background-color: green; padding: 5px 10px; border-radius: 5px;'>Edit</a>";
                        echo "<a href='delete_visitor.php?visit_id=" . $row['visit_id'] . "' class='btn btn-danger' style='text-decoration: none; color: white; background-color: red; padding: 5px 5px; border-radius: 5px;'>Delete</a>";
                        echo "</td>";
                    }

                    echo "</tr>";
                }

                // Check if no visitors found
                if (mysqli_num_rows($result) == 0) {
                    echo "<tr><td colspan='5'>No visitors found.</td></tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Error retrieving visitor records: " . mysqli_error($con) . "</td></tr>";
            }

            mysqli_close($con);
            ?>

            </tbody>
        </table>
    </div>
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