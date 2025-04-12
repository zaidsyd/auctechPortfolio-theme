<?php
session_start();

if(isset($_POST['submit'])) {
    include 'db_con.php';
    
    // Sanitize user input to prevent SQL injection
    $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $username = mysqli_real_escape_string($con, $_POST['email']); // Fixed variable name
    $mob_number = mysqli_real_escape_string($con, $_POST['mob_number']);
    $register = mysqli_real_escape_string($con, $_POST['register']);
    $suggestion = mysqli_real_escape_string($con, $_POST['suggestion']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($con, $_POST['confirm_password']);
   

    // Generate a random user_id (you can adjust the range as needed)
    $user_id = rand(111, 9999999);
    $currentDate = date("Y-m-d");

    // Hash the password for security (you should use a proper password hashing library)
    // $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert the user data into the database using prepared statements
    $ins_que = "INSERT INTO add_user (user_id, firstname, lastname, username, email, mobile_no, register, suggestion, password, confirm_password, LAST_LOGIN) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)";
    
    // Create a prepared statement
    $stmt = mysqli_stmt_init($con);
    if (mysqli_stmt_prepare($stmt, $ins_que)) {
        // Bind the parameters
        mysqli_stmt_bind_param($stmt, "issssssssss", $user_id, $firstname, $lastname, $username, $email, $mob_number, $register, $suggestion, $password, $confirm_password, $currentDate);
        
        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            // Data saved successfully
            ?>
            <script>
                alert('Data saved successfully!');
                window.location = '../index.php';
            </script>
            <?php
        } else {
            // Error occurred during insertion
            echo "Error: " . mysqli_error($con);
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        // Error in preparing the statement
        echo "Error: " . mysqli_error($con);
    }

    // Close the database connection
    mysqli_close($con);
} else {
    // Form not submitted, redirect to the add_users.php page
    header('location: add_users.php');
}
?>
