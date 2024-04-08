<?php
include_once('db.php');

$plotYear = "";
$plotSem = "";
$plotSubj = "";
$plotSection = "";
$plotRoom = "";
$plotProf = "";
$plotDay = "";
$plotTimeStart = 0;
$plotTimeEnd = 0;
$plotID = 0;
$sched_edit_state = false;

//saving records
if (isset($_POST['sched_add_new'])) {
    // echo"<pre>";
    // var_dump($_POST);
    // echo"</pre>";
    // die;
    $plotYear = $_POST["plotYear"];
    $plotSem = $_POST["plotSem"];
    $plotSubj = $_POST["plotSubj"];
    $plotSection = $_POST["plotSection"];
    $plotRoom = $_POST["plotRoom"];
    $plotProf = $_POST["plotProf"];

    // echo"<pre>";
    // var_dump($plotYear);
    // echo"</pre>";
    // die;

    $stmt = $conn->prepare("INSERT INTO tb_plotting (plotYear, plotSem, plotSubj, plotSection, plotRoom, plotProf) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $plotYear, $plotSem, $plotSubj, $plotSection, $plotRoom, $plotProf);
    $stmt->execute();

    $result = $conn->query("SELECT * FROM tb_plotting ORDER BY plotID DESC limit 1");
    $row = $result->fetch_row();
    // echo"<pre>";
    // var_dump($row[0]);
    // echo"</pre>";
    // die;

    //sub table
    if (!empty($_POST["plotMon"]) && !empty($_POST["tsMon"]) && !empty($_POST["teMon"])) {
        $plotDay = $_POST["plotMon"];
        $plotTimeStart = $_POST["tsMon"];
        $plotTimeEnd = $_POST["teMon"];

        $stmt = $conn->prepare("INSERT INTO tb_week (plotDay, plotTimeStart, plotTimeEnd, plotID) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $plotDay, $plotTimeStart, $plotTimeEnd, $row[0]);
        $stmt->execute();
    }

    if (!empty($_POST["plotTue"]) && !empty($_POST["tsTue"]) && !empty($_POST["teTue"])) {
        $plotDay = $_POST["plotTue"];
        $plotTimeStart = $_POST["tsTue"];
        $plotTimeEnd = $_POST["teTue"];

        $stmt = $conn->prepare("INSERT INTO tb_week (plotDay, plotTimeStart, plotTimeEnd, plotID) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $plotDay, $plotTimeStart, $plotTimeEnd, $row[0]);
        $stmt->execute();
    }

    if (!empty($_POST["plotWed"]) && !empty($_POST["tsWed"]) && !empty($_POST["teWed"])) {
        $plotDay = $_POST["plotWed"];
        $plotTimeStart = $_POST["tsWed"];
        $plotTimeEnd = $_POST["teWed"];

        $stmt = $conn->prepare("INSERT INTO tb_week (plotDay, plotTimeStart, plotTimeEnd, plotID) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $plotDay, $plotTimeStart, $plotTimeEnd, $row[0]);
        $stmt->execute();
    }

    if (!empty($_POST["plotThu"]) && !empty($_POST["tsThu"]) && !empty($_POST["teThu"])) {
        $plotDay = $_POST["plotThu"];
        $plotTimeStart = $_POST["tsThu"];
        $plotTimeEnd = $_POST["teThu"];

        $stmt = $conn->prepare("INSERT INTO tb_week (plotDay, plotTimeStart, plotTimeEnd, plotID) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $plotDay, $plotTimeStart, $plotTimeEnd, $row[0]);
        $stmt->execute();
    }

    if (!empty($_POST["plotFri"]) && !empty($_POST["tsFri"]) && !empty($_POST["teFri"])) {
        $plotDay = $_POST["plotFri"];
        $plotTimeStart = $_POST["tsFri"];
        $plotTimeEnd = $_POST["teFri"];

        $stmt = $conn->prepare("INSERT INTO tb_week (plotDay, plotTimeStart, plotTimeEnd, plotID) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $plotDay, $plotTimeStart, $plotTimeEnd, $row[0]);
        $stmt->execute();
    }

    if (!empty($_POST["plotSat"]) && !empty($_POST["tsSat"]) && !empty($_POST["teSat"])) {
        $plotDay = $_POST["plotSat"];
        $plotTimeStart = $_POST["tsSat"];
        $plotTimeEnd = $_POST["teSat"];

        $stmt = $conn->prepare("INSERT INTO tb_week (plotDay, plotTimeStart, plotTimeEnd, plotID) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $plotDay, $plotTimeStart, $plotTimeEnd, $row[0]);
        $stmt->execute();
    }

    if (!empty($_POST["plotSun"]) && !empty($_POST["tsSun"]) && !empty($_POST["teSun"])) {
        $plotDay = $_POST["plotSun"];
        $plotTimeStart = $_POST["tsSun"];
        $plotTimeEnd = $_POST["teSun"];

        $stmt = $conn->prepare("INSERT INTO tb_week (plotDay, plotTimeStart, plotTimeEnd, plotID) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $plotDay, $plotTimeStart, $plotTimeEnd, $row[0]);
        $stmt->execute();
    }


    if ($stmt) {
        $_SESSION['message'] = "Schedule Details Saved Successfully";
        header("Location: schedule_index.php");
    } else {
        echo "Error: ";
    }
    $stmt->close();
}



//For updating records
if (isset($_POST['sched_update'])) {
    $plotSubj = $_POST["plotSubj"];
    $plotSection = $_POST["plotSection"];
    $plotRoom = $_POST["plotRoom"];
    $plotProf = $_POST["plotProf"];
    $plotWeek  = $_POST["plotWeek"];
    $plotTimeStart  = $_POST["plotTimeStart"];
    $plotTimeEnd = $_POST["plotTimeEnd"];
    $plotID = $_POST['plotID'];

    $stmt = $conn->prepare("UPDATE tb_plotting SET plotSubj=?, plotSection=?, plotRoom=?, plotProf=?, plotWeek=? , plotTimeStart=?, plotTimeEnd=? WHERE plotID=?");
    $stmt->bind_param("sssssssi", $plotSubj, $plotSection, $plotRoom, $plotProf,  $plotWeek, $plotTimeStart, $plotTimeEnd, $plotID);
    $stmt->execute();

    if ($stmt) {
        $_SESSION["message"] = "Schedule Details Updated Successfully";
        header('Location:   schedule_index.php');
    } else {
        echo "Error: ";
    }
    $stmt->close();
}
