<?php
include 'login_backend.php';
include 'schedule_all_process.php';
if (isset($_GET['sched_edit'])) {
    $plotID = $_GET['sched_edit'];
    $sched_edit_state = true;
    $record = mysqli_query($conn, "SELECT * FROM tb_plotting WHERE plotID=$plotID");
    $data = mysqli_fetch_array($record);
    $plotSubj = $data['plotSubj'];
    $plotSection = $data['plotSection'];
    $plotRoom = $data['plotRoom'];
    $plotProf = $data['plotProf'];
    $plotDay = $data['plotDay'];
    $plotTimeStart = $data['plotTimeStart'];
    $plotTimeEnd = $data['plotTimeEnd'];
}


// Display data for dropdown
$stmnt = "SELECT subID, subCode  FROM tb_subjects ";
$result_subject = mysqli_query($conn, $stmnt);

$stmnt = "SELECT secID, secProgram, secYearlvl, secName  FROM tb_section ";
$result_section = mysqli_query($conn, $stmnt);

$stmnt = "SELECT roomID, roomBuild, roomNum  FROM tb_room ";
$result_room = mysqli_query($conn, $stmnt);

$stmnt = "SELECT profID, profFname, profLname  FROM tb_professor ";
$result_professor = mysqli_query($conn, $stmnt);


function generateAcademicYears()
{
    $currentYear = date("Y");
    $options = "";

    for ($i = $currentYear; $i <= $currentYear + 10; $i++) {
        $nextYear = $i + 1;
        $academicYear = "SY " . $i . " - " . $nextYear;
        $plotYear = "SY " . $i . " - " . $nextYear;
        $options .= "<option value=\" $plotYear\">$academicYear</option>";
    }

    return $options;
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- sidebar style -->
    <link rel="stylesheet" href="CSS/dashboard.css" />
    <!-- table style -->
    <link rel="stylesheet" href="CSS/content.css" />
    <title>Schedule</title>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="secondary-bg" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold border-bottom">
                <img src="images/logo.png" alt="smlogo" class="logo">
            </div>

            <!-- sidebar menu -->
            <div class="list-group list-group-flush my-3">
                <!-- Conditional links based on user position -->
                <?php if ($_SESSION["userPosition"] === 'admin') { ?>
                    <a href="admin_dashboard.php" class="list-group-item list-group-item bg-transparent second-text fw-bold"><i class="fas fa-user-shield me-2"></i>Admin Dashboard</a>
                <?php } elseif ($_SESSION["userPosition"] === 'dean') { ?>
                    <a href="dean_dashboard.php" class="list-group-item list-group-item bg-transparent second-text fw-bold"><i class="fas fa-user-graduate me-2"></i>Dean Dashboard</a>
                <?php } ?>
                
                <!-- schedule -->
                <a href="schedule_index.php" class="list-group-item list-group-item bg-transparent second-text active"><i class="fas fa-regular fa-calendar-plus me-2"></i>Schedule</a>

                <!-- entries -->
                <a href="#" class="list-group-submenu list-group-item bg-transparent second-text fw-bold"><i class="fas fa-square-plus me-2"></i>Entries <i class="fa-solid fa-caret-down"></i></a>
                <div class="sidebar-submenu">
                    <ul>
                        <li>
                            <a href="section_index.php" class="submenu-item list-group-item bg-transparent second-text fw-bold">Sections</a>
                        </li>
                        <li>
                            <a href="prof_index.php" class="submenu-item list-group-item bg-transparent second-text fw-bold">Professors</a>
                        </li>
                        <li>
                            <a href="subject_index.php" class="submenu-item list-group-item bg-transparent second-text fw-bold">Subjects</a>
                        </li>
                        <li>
                            <a href="room_index.php" class="submenu-item list-group-item bg-transparent second-text fw-bold">Rooms</a>
                        </li>
                    </ul>
                </div>

                <!-- reports -->
                <a href="#" class="list-group-submenu list-group-item bg-transparent second-text fw-bold"><i class="fas fa-solid fa-clipboard me-2"></i>Reports <i class="fa-solid fa-caret-down"></i></a>
                <div class="sidebar-submenu">
                    <ul>
                        <li>
                            <a href="pbs_index.php" class="submenu-item list-group-item bg-transparent second-text fw-bold">PBS</a>
                        </li>
                        <li>
                            <a href="pbt_index.php" class="submenu-item list-group-item bg-transparent second-text fw-bold">PBT</a>
                        </li>
                        <li>
                            <a href="pbru_index.php" class="submenu-item list-group-item bg-transparent second-text fw-bold">PBRU</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">

                <!-- menu toggle -->
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left fs-4 me-3" id="menu-toggle"></i>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- profile settings -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i>John Doe
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Start of the contents -->
            <div class="container-fluid px-4">
                <div class="row g-3 my-2">
                    <div class="container">
                        <div class="table-wrapper">
                            <div class="table-title">
                                <div class="row">
                                    <div class="col-sm-7">
                                        <h2>Manage Schedule Entries</h2>
                                    </div>
                                    <div class="col-sm-3">
                                        <input class="form-control" id="tableSearch" type="text" placeholder="Search">
                                    </div>
                                    <div class="col">
                                        <a href="#addSchedule" class="btn btn-success" data-bs-toggle="modal"><i class="material-icons">&#xE147;</i><span>Add New Schedule</span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Academic Year</th>
                                            <th>Semester</th>
                                            <th>Program & Section</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="myTable">
                                        <?php
                                        $result_plot = mysqli_query($conn, "SELECT * FROM tb_plotting ORDER BY plotYear, plotSem, plotSection");
                                        $prevSem = "";
                                        $prevYear = "";
                                        $prevSection = "";
                                        $prevSubject = "";
                                        $prevRoom = "";
                                        $prevProf = "";

                                        while ($row_plot = mysqli_fetch_array($result_plot)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $row_plot["plotID"] ?></td>
                                                <td><?php
                                                    if ($prevYear != $row_plot["plotYear"]) {
                                                        echo $row_plot["plotYear"];
                                                    }
                                                    $prevYear = $row_plot["plotYear"];
                                                    ?>
                                                </td>
                                                <td><?php
                                                    if ($prevSem != $row_plot["plotSem"]) {
                                                        echo $row_plot["plotSem"];
                                                    }
                                                    $prevSem = $row_plot["plotSem"];
                                                    ?>
                                                </td>
                                                <td><?php
                                                    if ($prevSection != $row_plot["plotSection"]) {
                                                        echo $row_plot["plotSection"];
                                                    }
                                                    $prevSection = $row_plot["plotSection"];
                                                    ?>
                                                </td>
                                                <td>
                                                    <form method="POST" action="schedule_all_process.php">
                                                        <a href="#viewSchedule" class="view" data-bs-toggle="modal"><i class="material-icons" data-bs-toggle="tooltip" title="View">&#xe8f4;</i></a>
                                                        <input type="hidden" name="secID" value="<?php echo $row['plotID']; ?>">
                                                        <a href="#statusSchedule" class="status" data-bs-toggle="modal"><i class="material-icons" data-bs-toggle="tooltip" title="Status">&#xe909;</i></a>
                                                        <!-- Always forgotten form end tag -->
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php
                                            // $i++;
                                        } ?>
                                    </tbody>
                                </table>
                                <div class="clearfix">
                                    <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                                    <ul class="pagination">
                                        <li class="page-item"><a href="#" class="page-link">Previous</a></li>
                                        <li class="page-item"><a href="#" class="page-link">1</a></li>
                                        <li class="page-item"><a href="#" class="page-link">2</a></li>
                                        <li class="page-item active"><a href="#" class="page-link">3</a></li>
                                        <li class="page-item"><a href="#" class="page-link">4</a></li>
                                        <li class="page-item"><a href="#" class="page-link">5</a></li>
                                        <li class="page-item"><a href="#" class="page-link">Next</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Add Modal HTML -->
                    <div id="addSchedule" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <form method="POST" action="schedule_all_process.php">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Add New Schedule</h5>
                                        <button type="button" class="close-2" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <div class="row">

                                                <div class="col">
                                                    <select name="plotYear" id="plotYear" class="form-control">
                                                        <option value="" disabled selected>Select Academic Year</option>
                                                        <?php echo generateAcademicYears(); ?>
                                                    </select>
                                                </div>
                                                <div class="col">
                                                    <select class="form-control" name="plotSem" id="plotSem">
                                                        <option value="" disabled selected>Select Semester</option>
                                                        <option value="1st Semester">1st Semester</option>
                                                        <?php
                                                        // Check if the 1st Semester is selected, and hide the 2nd Semester option
                                                        if ($_POST['plotSem'] !== "1st Semester") {
                                                        ?>
                                                            <option value="2nd Semester">2nd Semester</option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col">
                                                    <select class="form-control" name="plotSection" id="plotSection">
                                                        <option value="" disabled selected>Select Section</option>
                                                        <?php
                                                        if (mysqli_num_rows($result_section) > 0) {
                                                            while ($row = mysqli_fetch_assoc($result_section)) {
                                                        ?>
                                                                <option value="<?= $row['secProgram'] ?><?= $row['secYearlvl'] ?><?= $row['secName'] ?> "><?= $row['secProgram'] ?> <?= $row['secYearlvl'] ?> <?= $row['secName'] ?></option>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <label for="numRows">Enter the number of rows:</label>
                                                <input type="number" class="form-control" id="numRows" placeholder="Number of Rows">
                                                <button type="button" class="btn btn-primary" id="createRowsBtn">Create
                                                    Rows</button>
                                            </div>
                                            <div id="formInputs">
                                                <!-- Initial form inputs -->

                                                <div class="form-row" id="rowTemplate" style="display: none;">
                                                    <div class="label-container">
                                                        <hr>
                                                        <label class="row-label"></label>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <select class="form-control" name="plotSubj" id="plotSubj">
                                                                <option value="" disabled selected>Select Subject</option>
                                                                <?php
                                                                if (mysqli_num_rows($result_subject) > 0) {
                                                                    while ($row = mysqli_fetch_assoc($result_subject)) {
                                                                ?>
                                                                        <option value="<?= $row['subCode'] ?> "><?= $row['subCode'] ?></option>
                                                                <?php
                                                                    }
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>

                                                        <div class="col">
                                                            <select class="form-control" name="plotProf" id="plotProf">
                                                                <option value="" disabled selected>Select Professor</option>
                                                                <?php
                                                                if (mysqli_num_rows($result_professor) > 0) {
                                                                    while ($row = mysqli_fetch_assoc($result_professor)) {
                                                                ?>
                                                                        <option value="<?= $row['profFname'] ?><?= $row['profLname'] ?> "><?= $row['profFname'] ?> <?= $row['profLname'] ?></option>
                                                                <?php
                                                                    }
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>

                                                        <div class="col">
                                                            <select class="form-control" name="plotRoom" id="plotRoom">
                                                                <option value="" disabled selected>Select Room</option>
                                                                <?php
                                                                if (mysqli_num_rows($result_room) > 0) {
                                                                    while ($row = mysqli_fetch_assoc($result_room)) {
                                                                ?>
                                                                        <option value="<?= $row['roomBuild'] ?> <?= $row['roomNum'] ?>"><?= $row['roomBuild'] ?> <?= $row['roomNum'] ?></option>
                                                                <?php
                                                                    }
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col">
                                                            <h6 class="day-heading">MONDAY</h6>
                                                            <input type="hidden" name="plotMon" value="Monday">
                                                            <label>Time Starts</label>
                                                            <input name="tsMon" type="time" id="timeStartMon" class="form-control">
                                                            <label>Time Ends</label>
                                                            <input name="teMon" type="time" id="timeEndMon" class="form-control">
                                                        </div>
                                                        <div class="col">
                                                            <h6 class="day-heading">TUESDAY</h6>
                                                            <input type="hidden" name="plotTue" value="Tuesday">
                                                            <label>Time Starts</label>
                                                            <input name="tsTue" type="time" id="timeStartTue" class="form-control">
                                                            <label>Time Ends</label>
                                                            <input name="teTue" type="time" id="timeEndTue" class="form-control">
                                                        </div>
                                                        <div class="col">
                                                            <h6 class="day-heading">WEDNESDAY</h6>
                                                            <input type="hidden" name="plotWed" value="Wednesday">
                                                            <label>Time Starts</label>
                                                            <input name="tsWed" type="time" id="timeStartWed" class="form-control">
                                                            <label>Time Ends</label>
                                                            <input name="teWed" type="time" id="timeEndWed" class="form-control">
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col">
                                                            <h6 class="day-heading">THURSDAY</h6>
                                                            <input type="hidden" name="plotThu" value="Thursday">
                                                            <label>Time Starts</label>
                                                            <input name="tsThu" type="time" id="timeStartThu" class="form-control">
                                                            <label>Time Ends</label>
                                                            <input name="teThu" type="time" id="timeEndThu" class="form-control">
                                                        </div>
                                                        <div class="col">
                                                            <h6 class="day-heading">FRIDAY</h6>
                                                            <input type="hidden" name="plotFri" value="Friday">
                                                            <label>Time Starts</label>
                                                            <input name="tsFri" type="time" id="timeStartFri" class="form-control">
                                                            <label>Time Ends</label>
                                                            <input name="teFri" type="time" id="timeEndFri" class="form-control">
                                                        </div>
                                                        <div class="col">
                                                            <h6 class="day-heading">SATURDAY</h6>
                                                            <input type="hidden" name="plotSat" value="Saturday">
                                                            <label>Time Starts</label>
                                                            <input name="tsSat" type="time" id="timeStartSat" class="form-control">
                                                            <label>Time Ends</label>
                                                            <input name="teSat" type="time" id="timeEndSat" class="form-control">
                                                        </div>
                                                        <div class="col">
                                                            <h6 class="day-heading">SUNDAY</h6>
                                                            <input type="hidden" name="plotSun" value="Sunday">
                                                            <label>Time Starts</label>
                                                            <input name="tsSun" type="time" id="timeStartSun" class="form-control">
                                                            <label>Time Ends</label>
                                                            <input name="teSun" type="time" id="timeEndSun" class="form-control">
                                                        </div>
                                                    </div>
                                                    <button type="button" class="btn btn-danger remove-btn" disabled>Remove</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="button" class="btn" data-bs-dismiss="modal" value="Cancel">
                                        <input type="submit" name="sched_add_new" class="btn" value="Add">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Custom modal for confirmation -->
                    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="confirmModalLabel">Confirmation</h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to remove this row?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn" data-bs-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn" id="confirmDeleteBtn">OK</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- View Modal HTML -->
                    <div id="viewSchedule" class="modal fade">
                        <div class=" modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">View Schedule Details</h5>
                                    <button type="button" class="close-2" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Academic Year</th>
                                                    <th>Semester</th>
                                                    <th>Program & Section</th>
                                                </tr>
                                            </thead>
                                            <tbody id="myTable">
                                                <?php
                                                $result_plot = mysqli_query($conn, "SELECT * FROM tb_plotting ORDER BY plotYear, plotSem, plotSection");
                                                $prevSem = "";
                                                $prevYear = "";
                                                $prevSection = "";
                                                $prevSubject = "";
                                                $prevRoom = "";
                                                $prevProf = "";

                                                while ($row_plot = mysqli_fetch_array($result_plot)) {
                                                ?>

                                                    <tr>
                                                        <!-- <td><?php echo $row_plot["plotID"] ?></td> -->
                                                        <td><?php
                                                            if ($prevYear != $row_plot["plotYear"]) {
                                                                echo $row_plot["plotYear"];
                                                            }
                                                            $prevYear = $row_plot["plotYear"];
                                                            ?>
                                                        </td>
                                                        <td><?php
                                                            if ($prevSem != $row_plot["plotSem"]) {
                                                                echo $row_plot["plotSem"];
                                                            }
                                                            $prevSem = $row_plot["plotSem"];
                                                            ?>
                                                        </td>
                                                        <td><?php
                                                            if ($prevSection != $row_plot["plotSection"]) {
                                                                echo $row_plot["plotSection"];
                                                            }
                                                            $prevSection = $row_plot["plotSection"];
                                                            ?>
                                                        </td>
                                            </tbody>
                                        </table>
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>MIS Code</th>
                                                    <th>Subject</th>
                                                    <th>Professor</th>
                                                    <th>Room</th>
                                                    <th>Days & Time</th>
                                                </tr>
                                            </thead>
                                            <tbody id="myTable">
                                                <?php
                                                    $result_week = mysqli_query($conn, "SELECT * FROM tb_week WHERE plotID = " . $row_plot['plotID'] . " ORDER BY
                                        CASE WHEN plotDay = 'Monday' THEN 1
                                        WHEN plotDay = 'Tuesday' THEN 2
                                        WHEN plotDay = 'Wednesday' THEN 3
                                        WHEN plotDay = 'Thursday' THEN 4
                                        WHEN plotDay = 'Friday' THEN 5
                                        WHEN plotDay = 'Saturday' THEN 6
                                        WHEN plotDay = 'Sunday' THEN 7 END ASC");

                                                ?>
                                                <tr>
                                                    <?php
                                                    while ($row_week = mysqli_fetch_array($result_week)) {
                                                    ?>
                                                        <td></td>
                                                        <td><?php
                                                            if ($prevSubject != $row_plot["plotSubj"]) {
                                                                echo $row_plot["plotSubj"];
                                                            }
                                                            $prevSubject = $row_plot["plotSubj"];
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if ($prevProf != $row_plot["plotProf"]) {
                                                                echo $row_plot["plotProf"];
                                                            }
                                                            $prevProf = $row_plot["plotProf"];
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if ($prevRoom != $row_plot["plotRoom"]) {
                                                                echo $row_plot["plotRoom"];
                                                            }
                                                            $prevRoom = $row_plot["plotRoom"];
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            echo $row_week["plotDay"] . " - " . date("h:i A", strtotime($row_week["plotTimeStart"])) . " - " . date("h:i A", strtotime($row_week["plotTimeEnd"]));
                                                            ?>
                                                        </td>
                                                </tr>
                                            <?php
                                                    } ?>
                                        <?php
                                                } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <form method="POST" action="schedule_all_process.php">
                                        <input type="button" class="btn" data-bs-dismiss="modal" value="Close">
                                        <input type="hidden" name="subID" value="<?php echo $row['plotID']; ?>">
                                        <a class="btn btn-default" data-bs-toggle="modal" data-bs-dismiss="modal" href="#editSchedule" role="button">Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Edit Modal HTML -->
                    <div id="editSchedule" class="modal fade">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Schedule</h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>MIS Code</label>
                                                    <input type="text" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <label>Academic Year</label>
                                                <select class="form-control" required name="Academic Year">
                                                    <option value="2022-2023">2022-2023</option>
                                                    <option value="2021-2022">2021-2022</option>
                                                </select>
                                            </div>
                                            <div class="col">
                                                <label>Semester</label>
                                                <select class="form-control" required name="Semester">
                                                    <option value="1st Semester">1st Semester</option>
                                                    <option value="2nd Semester">2nd Semester</option>
                                                </select>
                                            </div>
                                            <div class="col">
                                                <label>Program</label>
                                                <select class="form-control" required name="Program">
                                                    <option value="BSIT">BSIT</option>
                                                    <option value="BIT">BIT</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <label>Subject</label>
                                                <select class="form-control" required name="Program">
                                                    <option value="SysAd">SysAd</option>
                                                    <option value="CrossPlat">CrossPlat</option>
                                                </select>
                                            </div>

                                            <div class="col">
                                                <label>Section</label>
                                                <select class="form-control" required name="Section">
                                                    <option value="A">A</option>
                                                    <option value="B">B</option>
                                                </select>
                                            </div>

                                            <div class="col">
                                                <label>Room</label>
                                                <select class="form-control" required name="Room">
                                                    <option value="ST 101">ST 101</option>
                                                    <option value="ST 102">ST 102</option>
                                                </select>
                                            </div>
                                        </div>

                                        <label>Professor</label>
                                        <select class="form-control" required name="Program">
                                            <option value="BSIT">John Doe</option>
                                            <option value="BIT">May Naur</option>
                                        </select>


                                        <div class="row">
                                            <div class="col">
                                                <h6 class="day-heading">MONDAY</h6>
                                                <label>Time Starts</label>
                                                <input type="time" class="form-control" required>
                                                <label>Time Ends</label>
                                                <input type="time" class="form-control" required>
                                            </div>
                                            <div class="col">
                                                <h6 class="day-heading">TUESDAY</h6>
                                                <label>Time Starts</label>
                                                <input type="time" class="form-control" required>
                                                <label>Time Ends</label>
                                                <input type="time" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <h6 class="day-heading">WEDNESDAY</h6>
                                                <label>Time Starts</label>
                                                <input type="time" class="form-control" required>
                                                <label>Time Ends</label>
                                                <input type="time" class="form-control" required>
                                            </div>
                                            <div class="col">
                                                <h6 class="day-heading">THURSDAY</h6>
                                                <label>Time Starts</label>
                                                <input type="time" class="form-control" required>
                                                <label>Time Ends</label>
                                                <input type="time" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <h6 class="day-heading">FRIDAY</h6>
                                                <label>Time Starts</label>
                                                <input type="time" class="form-control" required>
                                                <label>Time Ends</label>
                                                <input type="time" class="form-control" required>
                                            </div>
                                            <div class="col">
                                                <h6 class="day-heading">SATURDAY</h6>
                                                <label>Time Starts</label>
                                                <input type="time" class="form-control" required>
                                                <label>Time Ends</label>
                                                <input type="time" class="form-control" required>
                                            </div>
                                        </div>

                                        <h6 class="day-heading">SUNDAY</h6>
                                        <div class="row">
                                            <div class="col">
                                                <label>Time Starts</label>
                                                <input type="time" class="form-control" required>
                                            </div>
                                            <div class="col">
                                                <label>Time Ends</label>
                                                <input type="time" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="button" class="btn" data-bs-dismiss="modal" value="Cancel">
                                    <input type="submit" class="btn" value="Add">
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Change Status Modal HTML -->
                    <div id="statusSchedule" Schedule class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form>
                                    <div class="modal-header">
                                        <h5 class="modal-title">Change Schedule Status</h5>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <h6>Are you sure you want to inactivate this Schedule?</h6>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="button" class="btn" data-bs-dismiss="modal" value="Cancel">
                                        <input type="submit" class="btn" value="Confirm Status">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
    </div>
    <!-- /#page-content-wrapper -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function() {
            el.classList.toggle("toggled");
        };

        var dropdown = document.getElementsByClassName("list-group-submenu");
        var i;

        for (i = 0; i < dropdown.length; i++) {
            dropdown[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var dropdownContent = this.nextElementSibling;
                if (dropdownContent.style.display === "block") {
                    dropdownContent.style.display = "none";
                } else {
                    dropdownContent.style.display = "block";
                }
            });
        }
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            // Activate tooltip
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>

    <script>
        // Filter table

        $(document).ready(function() {
            $("#tableSearch").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
    <!-- Bootstrap JS and jQuery -->
    <!-- creating rows modal -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            var rowToRemove; // Store the row to be removed
            var rowCount = 1; // Initialize row count

            // Initialize the modal with one form row
            var rowTemplate = $('#rowTemplate').clone();
            rowTemplate.removeAttr('id').removeAttr('style');
            rowTemplate.find('.row-label').text('Subject ' + rowCount + ':');
            rowCount++;
            $('#formInputs').append(rowTemplate);

            $('#createRowsBtn').click(function() {
                var numRows = $('#numRows').val();
                if (!numRows || isNaN(numRows) || numRows <= 0) {
                    alert('Please enter a valid number of rows.');
                    return;
                }

                for (var i = 0; i < numRows; i++) {
                    var newRow = rowTemplate.clone();
                    newRow.find('.row-label').text('Subject ' + rowCount + ':');
                    rowCount++;
                    newRow.find('.remove-btn').prop('disabled',
                        false); // Enable the remove button for the new row
                    $('#formInputs').append(newRow);
                }
            });

            // Remove row button functionality (for existing rows and dynamically added rows)
            $(document).on('click', '.remove-btn', function() {
                var formRow = $(this).closest('.form-row');
                var formRows = formRow.siblings('.form-row');
                if (formRows.length === 0) {
                    alert('At least one form is required.');
                } else {
                    // Store the row to be removed
                    rowToRemove = formRow;
                    $('#confirmModal').modal('show'); // Show the custom confirmation modal
                }
            });

            // Handle confirm deletion in the custom modal
            $('#confirmDeleteBtn').click(function() {
                rowToRemove.remove();
                $('#confirmModal').modal('hide'); // Hide the custom modal

                // Update the subject numbers after row deletion
                var subjectRows = $('.form-row');
                // index = 1
                subjectRows.each(function(index) {
                    $(this).find('.row-label').text('Subject ' + (index) + ':');
                });

                // Reset rowCount based on the current number of rows in adding new rows
                rowCount = subjectRows.length + 1;
            });


        });
    </script>
</body>

</html>