<?php
include "session_manager.php";
include "connect.php";

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect the user to the login page
    header("Location: login.php");
    exit();
}

if (isset($_GET['visit_id'])) {
    $visitId = $_GET['visit_id'];

    // Check if the delete request is received
    if (isset($_POST['confirm_delete'])) {
        // Delete the record from the database
        $query = "DELETE FROM visit WHERE visit_id = $visitId";
        $result = mysqli_query($con, $query);

        if ($result) {
            // Record deleted successfully
            header("Location: visitors.php"); // Redirect to view_prisoner.php
            exit();
        } else {
            echo "Error deleting record: " . mysqli_error($con);
        }
    } else {
        // Retrieve the prisoner information for confirmation
        $query = "SELECT * FROM visit WHERE visit_id = $visitId";
        $result = mysqli_query($con, $query);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
        } else {
            echo "Error retrieving visitor information: " . mysqli_error($con);
        }
    }
} else {
    echo "Invalid visitor ID.";
}

mysqli_close($con);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Visitor</title>
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
        <h2>Delete Visitor Confirmation</h2>
        <div class="confirmation-message">
            Are you sure you want to delete the visitor: <?php echo $row['name']; ?>?
        </div>
        <form method="post">
            <input type="submit" name="confirm_delete" value="Delete" class="delete-button">
            <a href="visitors.php" class="delete-button">Cancel</a>
        </form>
    </div>
</body>
</html>
