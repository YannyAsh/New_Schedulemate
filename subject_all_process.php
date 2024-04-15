<?php
session_start();

include_once('db.php');

$subYear = "";
$subSem = "";
$subCode = "";
$subDesc = "";
$subUnits = "";
$subLabhours = "";
$subLechours = "";
$subStatus = 0;
$subID = 0;
$sub_edit_state = false;

//saving records
// Check if the form was submitted
if (isset($_POST['sub_add_new'])) {
    // Access submitted data using array names
    $subYear = $_POST['subYear'];
    $subSem = $_POST['subSem'];
    $subCode = $_POST['subCode'];
    $subDesc = $_POST['subDesc'];
    $subUnits = $_POST['subUnits']; // Access as array
    $subLabhours = $_POST['subLabhours']; // Access as array
    $subLechours = $_POST['subLechours']; // Access as array
    $subStatus = isset($_POST['subStatus']) ? $_POST['subStatus'] : array_fill(0, count($subCode), 1); // Default status to 1 for each entry

    // echo"<pre>";
    // var_dump($subDesc);
    // echo"</pre>";
    // die;

    
    
    // Loop through each entry and insert into the database
    for($i=1; $i < count($subCode); $i++) {
        $stmt = $conn->prepare("INSERT INTO tb_subjects (subYear, subSem, subCode, subDesc, subUnits, subLabhours, subLechours, subStatus) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", $subYear ,$subSem, $subCode[$i], $subDesc[$i], $subUnits[$i], $subLabhours[$i], $subLechours[$i], $subStatus[$i]);
        $stmt->execute();
    }

    if ($stmt->affected_rows > 0) {
        $_SESSION['message'] = "Subject Details Saved Successfully";
    } else {
        echo "Error inserting entry"; // Handle error as needed
    }
    $stmt->close();
    // Redirect after all entries are saved (assuming successful)
    header("Location: subject_index.php");
}


//For updating records
if (isset($_POST["sub_update"])) {
    $subYear = $_POST['subYear'];
    $subSem = $_POST['subSem'];
    $subCode = $_POST['subCode'];
    $subDesc = $_POST['subDesc'];
    $subUnits = $_POST['subUnits'];
    $subLabhours = $_POST['subLabhours'];
    $subLechours = $_POST['subLechours'];
    $subStatus = $_POST['subStatus'];
    $subID = $_POST['subID'];

    $stmt = $conn->prepare("UPDATE tb_subjects SET subYear=?, subSem=?, subCode=?, subDesc=?, subUnits=?, subLabhours=?, subLechours=?, subStatus=? WHERE subID=?");
    $stmt->bind_param("ssssssssi", $subYear, $subSem, $subCode, $subDesc, $subUnits, $subLabhours, $subLechours, $subStatus, $subID);
    $stmt->execute();

    if ($stmt) {
        $_SESSION["message"] = "Subject Details Updated Successfully";
        header('Location: subject_index.php');
    } else {
        echo "Error: ";
    }
    $stmt->close();
}

// Toggle Active and Inactive
if (isset($_POST['sub_toggle_status'])) {
    $subID = $_POST['subID'];

    $stmt = $conn->prepare("SELECT subStatus FROM tb_subjects WHERE subID=?");
    $stmt->bind_param("i", $subID);
    $stmt->execute();
    $stmt->bind_result($currentStatus);
    $stmt->fetch();
    $stmt->close();

    $newStatus = ($currentStatus == 1) ? 0 : 1;

    $stmt = $conn->prepare("UPDATE tb_subjects SET subStatus=? WHERE subID=?");
    $stmt->bind_param("ii", $newStatus, $subID);
    $stmt->execute();

    if ($stmt) {
        $_SESSION["message"] = "Status Updated Successfully";
        header('Location: subject_index.php');
    } else {
        echo "Error: ";
    }
    $stmt->close();
}