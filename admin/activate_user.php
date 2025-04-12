<?php
// Include the database connection file
include('db_con.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the 'userId' parameter is set in the POST request
    if (isset($_POST['userId'])) {
        // Sanitize and get the user ID from the POST data
        $userId = mysqli_real_escape_string($con, $_POST['userId']);

        // Update the user's activation status to 'active'
        $update_query = "UPDATE add_user SET ACC_STATUS = 'active' WHERE s_no = '$userId' AND TYPE = 'USER'";

        if (mysqli_query($con, $update_query)) {
            // The user has been successfully activated
            echo "User has been activated.";
        } else {
            // Error updating the activation status
            echo "Error: " . mysqli_error($con);
        }
    } else {
        // 'userId' parameter is not set in the POST data
        echo "User ID is missing.";
    }
} else {
    // Invalid request method
    echo "Invalid request method.";
}

// Close the database connection
mysqli_close($con);
?>
