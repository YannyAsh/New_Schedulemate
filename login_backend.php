<?php
session_start();

// Include database connection
include_once('db.php');

// Handle login
if (isset($_POST["login"])) {
    $email = $_POST["userEmail"];
    $password = $_POST["userPass"];
    $errors = array();

    // Select user from database based on email
    $sql = "SELECT * FROM tb_register WHERE userEmail = '$email'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

    // Check if user exists and password is correct
    if ($user && password_verify($password, $user["userPass"])) {
        $_SESSION["user"] = "yes";

        // Check user approval status
        $userApproval = $user['userApproval'];

        if ($userApproval == "approved") {
            // Redirect to appropriate dashboard based on user position
            if ($user['userPosition'] === 'admin') {
                header("Location: admin_dashboard.php");
            } elseif ($user['userPosition'] === 'dean') {
                header("Location: dean_dashboard.php");
            } elseif ($user['userPosition'] === 'chairperson') {
                header("Location: chair_dashboard.php");
            }
            exit(); // Always exit after header redirect
        } elseif ($userApproval == "pending") {
            $_SESSION["errors"] = array("Your account is still pending for approval");
        }
    } else {
        $_SESSION["errors"] = array("Invalid email or password");
    }

    header("Location: index.php"); // Redirect back to login page with errors
    exit();
}
?>
