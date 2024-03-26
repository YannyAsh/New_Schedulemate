<?php session_start();

if (isset($_POST["submit"])) {
    $fname = $_POST["userFname"];
    $lname = $_POST["userLname"];
    $email = $_POST["userEmail"];
    $position = $_POST["userPosition"];
    $dept = $_POST["userDept"];
    $prog = $_POST["userProgram"];
    $password = $_POST["userPass"];
    $passwordRepeat = $_POST["userPasscon"];

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    $errors = array();

    //detect errors
    if (empty($fname) or empty($lname) or empty($email) or empty($position) or empty($dept) or empty($prog) or empty($password) or empty($passwordRepeat)) {
        array_push($errors, "All fields are required");
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, "Email is not valid");
    }
    if (strlen($password) < 8) {
        array_push($errors, "Password must be at least 8 charactes long");
    }
    if ($password !== $passwordRepeat) {
        array_push($errors, "Password does not match");
    }
    require_once dirname(__FILE__) . "/db.php";

    //restrictations
    $sql = "SELECT * FROM tb_register WHERE userEmail = '$email'";
    $result = mysqli_query($conn, $sql);
    $rowCount = mysqli_num_rows($result);


    if ($rowCount > 0) {
        array_push($errors, "Email already exists!");
    }
    if (count($errors) > 0) {
        $_SESSION['errors'] = $errors;
        print_r($errors);
        header("Location: index.php");
    } else {

        //add user 
        $sql = "INSERT INTO tb_register (userFname, userLname, userEmail, userPosition, userDept, userProgram, userPass) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        $prepareStmt = mysqli_stmt_prepare($stmt, $sql);

        if ($prepareStmt) {
            mysqli_stmt_bind_param($stmt, "sssssss", $fname, $lname, $email, $position, $dept, $prog, $passwordHash);
            mysqli_stmt_execute($stmt);
            $_SESSION["success"] = 1;

            if ($position === 'admin') 
            {
                header("Location: admin_dashboard.php");
            } 
            elseif ($position === 'dean') 
            {
                header("Location: dean_dashboard.php");
            } 
            elseif ($position === 'chairperson') 
            {
                header("Location: chair_dashboard.php");
            }
        } 
        else 
        {
            die("Something went wrong");
        }
    }
}
