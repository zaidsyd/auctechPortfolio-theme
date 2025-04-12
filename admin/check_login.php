<?php
session_start();

if (isset($_POST['Submit'])) {
    include '../db_con.php';

    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepared statement use karein
    $stmt = $con->prepare("SELECT * FROM add_user WHERE email = ? AND password = ? AND TYPE = 'ADMIN'");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['login_status'] = true;
        $_SESSION['firstname'] = $row['firstname'];
        $_SESSION['id'] = $row['user_id'];

        header('Location: dashboard.php');
        exit(); // Ensure script stops executing after redirection
    } else {
        ?>
        <script>
            alert('Email or Password is incorrect!');
            window.location = 'login.php';
        </script>
        <?php
    }
} else {
    echo "No data submitted!";
}
?>
