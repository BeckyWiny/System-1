<?php include "session_manager.php"; ?>

<!DOCTYPE html>
<html>
<head>
    <title>HOME</title>
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
.button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-align: center;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s;
            cursor: pointer;
        }

        .button:hover {
            background-color: #45a049;
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

<!-- Page info  -->
<section class="cool-section">
    <div class="container">
        <h2>Welcome to Uganda Prisons</h2>
        <p>
            The Uganda Prisons Service plays a vital role in maintaining public safety and ensuring the welfare of inmates. With a strong commitment to professionalism and effective rehabilitation, we strive to create a secure and supportive environment for both staff and prisoners.
        </p>
        <p>
            Our dedicated staff members work tirelessly to ensure the safety and security of our facilities, as well as provide essential services and programs to promote prisoner rehabilitation and reintegration into society.
        </p>
        <p>
            We are proud to contribute to the justice system in Uganda and uphold the principles of fairness, accountability, and respect for human rights. Our goal is to foster a safer community by providing opportunities for positive change and reducing reoffending rates.
        </p>
        <p>
            We welcome you to explore our website and learn more about our initiatives, staff, prisoners, and the various services we provide. Feel free to contact us if you have any questions or need further information.
        </p>
    </div>
</section>



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