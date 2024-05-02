<?php
include_once('db.php');

if (isset($_POST['approve'])) {
    $userID = $_POST['userID'];
    $userPosition = $_POST['userPosition']; // Assuming you have access to user position in the form

    // Make sure userID is set in the session
    $_SESSION['userID'] = $userID;

    $select = "UPDATE tb_register SET userApproval = 'approved' WHERE userID = '$userID'";
    $result = mysqli_query($conn, $select);

    $_SESSION['message'] = "User Approved";
    $_SESSION["userPosition"] = $userPosition; // Set user position in session

    if ($result) {
        $_SESSION['message'] = "User Approved";
        if ($userPosition === 'chairperson') {
            header("Location: dean_dashboard.php");
            exit();
        } elseif ($userPosition === 'dean') {
            header("Location: admin_dashboard.php");
            exit();
        }
    } else {
        $_SESSION['error'] = "Error: " . mysqli_error($conn);
        if ($userPosition === 'chairperson') {
            header("Location: dean_dashboard.php");
            exit();
        } elseif ($userPosition === 'dean') {
            header("Location: admin_dashboard.php");
            exit();
        }
    }
}

if (isset($_POST['deny'])) {
    $userID = $_POST['userID'];
    $userPosition = $_POST['userPosition']; // Assuming you have access to user position in the form

    // Make sure userID is set in the session
    $_SESSION['userID'] = $userID;

    $select = "DELETE FROM tb_register WHERE userID = '$userID'";
    $result = mysqli_query($conn, $select);

    $_SESSION['message'] = "User Denied";
    $_SESSION["userPosition"] = $userPosition; // Set user position in session

    if ($result) {
        $_SESSION['message'] = "User Denied";
        if ($userPosition === 'chairperson') {
            header("Location: dean_dashboard.php");
            exit();
        } elseif ($userPosition === 'dean') {
            header("Location: admin_dashboard.php");
            exit();
        }
    } else {
        $_SESSION['error'] = "Error: " . mysqli_error($conn);
        if ($userPosition === 'chairperson') {
            header("Location: dean_dashboard.php");
            exit();
        } elseif ($userPosition === 'dean') {
            header("Location: admin_dashboard.php");
            exit();
        }
    }
}
?>
