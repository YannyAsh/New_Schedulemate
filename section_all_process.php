<?php
session_start();

include_once('db.php');

$secProgram = "";
$secYearlvl = 0;
$secName = "";
$secSession = 0;
$secStatus = 0;
$secID = 0;
$sec_edit_state = false;

//saving records
if (isset($_POST['sec_add_new'])) {
    $secProgram = $_POST["secProgram"];
    $secYearlvl = $_POST["secYearlvl"];
    $secName = $_POST["secName"];
    $secSession = $_POST["secSession"];
    $secStatus = $_POST["secStatus"] ? $_POST["secStatus"] : 1; // 1 as a default value or whatever suits your logic;

    // Validate secYearlvl as a non-negative integer
    if (!is_numeric($secYearlvl) || $secYearlvl < 0) {
        $_SESSION['error'] = "Year Level must be a non-negative integer.";
        header("Location: section_index.php");
        exit();
    }

    $stmt = $conn->prepare("INSERT INTO tb_section (secProgram, secYearlvl, secName, secSession, secStatus) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sisss", $secProgram, $secYearlvl, $secName, $secSession, $secStatus);
    $stmt->execute();

    if ($stmt) {
        $_SESSION['message'] = "Section Details Saved Successfully";
        header("Location: section_index.php");
    } else {
        echo "Error: ";
    }
    $stmt->close();
}



//For updating records
if (isset($_POST['sec_update'])) {
    $secProgram = $_POST["secProgram"];
    $secYearlvl = $_POST["secYearlvl"];
    $secName = $_POST["secName"];
    $secSession = $_POST["secSession"];
    $secStatus = $_POST["secStatus"];
    $secID = $_POST['secID'];

    // echo"<pre>";
    // var_dump($secID);
    // echo"</pre>";
    // die;


    $stmt = $conn->prepare("UPDATE tb_section SET secProgram=?, secYearlvl=?, secName=?, secSession=?, secStatus=? WHERE secID=?");
    $stmt->bind_param("sisssi", $secProgram, $secYearlvl, $secName, $secSession, $secStatus, $secID);
    $stmt->execute();

    if ($stmt) {
        $_SESSION["message"] = "Section Details Updated Successfully";
        header('Location: section_index.php');
    } else {
        echo "Error: ";
    }
    $stmt->close();
}

// Toggle Active and Inactive
if (isset($_POST['sec_toggle_status'])) {
    $secID = $_POST['secID'];

    $stmt = $conn->prepare("SELECT secStatus FROM tb_section WHERE secID=?");
    $stmt->bind_param("i", $secID);
    $stmt->execute();
    $stmt->bind_result($currentStatus);
    $stmt->fetch();
    $stmt->close();

    // echo"<pre>";
    // var_dump($secID);
    // echo"</pre>";
    // die;

    $newStatus = ($currentStatus == 1) ? 0 : 1;

    $stmt = $conn->prepare("UPDATE tb_section SET secStatus=? WHERE secID=?");
    $stmt->bind_param("ii", $newStatus, $secID);
    $stmt->execute();

    if ($stmt) {
        $_SESSION["message"] = "Status Updated Successfully";
        header('Location: section_index.php');
    } else {
        echo "Error: ";
    }
    $stmt->close();
}