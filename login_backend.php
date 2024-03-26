<?php
session_start();

//login
if (isset($_POST["login"])) {
    $email = $_POST["userEmail"];
    $password = $_POST["userPass"];
    $errors = array();
    require_once dirname(__FILE__) . "/db.php";


    $sql = "SELECT * FROM tb_register WHERE userEmail = '$email'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

    //restriction 
    if ($user) {
        if (password_verify($password, $user["userPass"])) {
            $_SESSION["user"] = "yes";
            $_SESSION["success"] = 2;

            // Assuming userPosition is stored in your database
            if ($user['userPosition'] === 'admin')
            {
                header("Location: admin_dashboard.php");
            }
            else if ($user['userPosition'] === 'dean') 
            {
                header("Location: dean_dashboard.php");
            } 
            else if ($user['userPosition'] === 'chairperson')
            {
                header("Location: chair_dashboard.php");
            }
            exit(); // Always exit after header redirect
        } else {
            array_push($errors, "Password does not match");
        }
    } else {
        array_push($errors, "Invalid email");
    }
    
    $_SESSION["errors"] = $errors;
    header("Location: index.php"); // Redirect back to login page with errors
    exit();
}
