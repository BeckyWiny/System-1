<?php
include "session_manager.php";
include "connect.php";

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect the user to the login page
    header("Location: login.php");
    exit();
}

if (isset($_GET['prisoner_id'])) {
    $prisonerId = $_GET['prisoner_id'];

    // Check if the delete request is received
    if (isset($_POST['confirm_delete'])) {
        // Delete the record from the database
        $query = "DELETE FROM prisoner WHERE prisoner_id = $prisonerId";
        $result = mysqli_query($con, $query);

        if ($result) {
            // Record deleted successfully
            header("Location: view_prisoner.php"); // Redirect to view_prisoner.php
            exit();
        } else {
            echo "Error deleting record: " . mysqli_error($con);
        }
    } else {
        // Retrieve the prisoner information for confirmation
        $query = "SELECT * FROM prisoner WHERE prisoner_id = $prisonerId";
        $result = mysqli_query($con, $query);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
        } else {
            echo "Error retrieving prisoner information: " . mysqli_error($con);
        }
    }
} else {
    echo "Invalid prisoner ID.";
}

mysqli_close($con);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Prisoner</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Add custom styles for the confirmation page */
        .container {
            text-align: center;
        }

        .confirmation-message {
            font-size: 20px;
            margin-top: 20px;
        }

        .delete-button {
            padding: 10px 20px;
            background-color: #f44336;
            color: white;
            text-align: center;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s;
            cursor: pointer;
            margin-top: 20px;
        }

        .delete-button:hover {
            background-color: #d32f2f;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Delete Prisoner Confirmation</h2>
        <div class="confirmation-message">
            Are you sure you want to delete the prisoner: <?php echo $row['name']; ?>?
        </div>
        <form method="post">
            <input type="submit" name="confirm_delete" value="Delete" class="delete-button">
            <a href="view_prisoner.php" class="delete-button">Cancel</a>
        </form>
    </div>
</body>
</html>
