<?php
include "session_manager.php";
include "connect.php";

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect the user to the login page
    header("Location: login.php");
    exit();
}

if (isset($_GET['employee_id'])) {
    $employeeId = $_GET['employee_id'];

    // Check if the delete request is received
    if (isset($_POST['confirm_delete'])) {
        // Delete the record from the database
        $query = "DELETE FROM employee WHERE employee_id = $employeeId";
        $result = mysqli_query($con, $query);

        if ($result) {
            // Record deleted successfully
            header("Location: staff.php"); // Redirect to staff.php (or any desired page)
            exit();
        } else {
            echo "Error deleting record: " . mysqli_error($con);
        }
    } else {
        // Retrieve the employee information for confirmation
        $query = "SELECT * FROM employee WHERE employee_id = $employeeId";
        $result = mysqli_query($con, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
        } else {
            echo "Error retrieving employee information: " . mysqli_error($con);
        }
    }
} else {
    echo "Invalid employee ID.";
}

mysqli_close($con);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Employee</title>
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
        <h2>Delete Employee Confirmation</h2>
        <?php if(isset($row)): ?>
        <div class="confirmation-message">
            Are you sure you want to delete the employee: <?php echo $row['name']; ?>?
        </div>
        <form method="post">
            <input type="submit" name="confirm_delete" value="Delete" class="delete-button">
            <a href="staff.php" class="delete-button">Cancel</a>
        </form>
        <?php else: ?>
        <div class="confirmation-message">
            Employee not found.
        </div>
        <?php endif; ?>
    </div>
</body>
</html>
