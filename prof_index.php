<?php
include 'prof_all_process.php';

if (isset($_GET['prof_edit'])) {
    $profID = $_GET['prof_edit'];
    $prof_edit_state = true;
    $record = mysqli_query($conn, "SELECT * FROM tb_professor WHERE profID=$profID");
    $data = mysqli_fetch_array($record);
    $profFname  = $data['profFname'];
    $profMname  = $data['profMname'];
    $profLname = $data['profLname'];
    $profMobile = $data["profMobile"];
    $profAddress = $data["profAddress"];
    $profEduc = $data["profEduc"];
    $profExpert = $data["profExpert"];
    $profRank = $data["profRank"];
    $profUnit = $data["profUnit"];
    $profEmployStatus = $data["profEmployStatus"];
    $profStatus = $data["profStatus"];
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- sidebar style -->
    <link rel="stylesheet" href="CSS/dashboard.css" />
    <!-- table style -->
    <link rel="stylesheet" href="CSS/content.css" />
    <title>Professor</title>
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
                <a href="dashboard.php" class="list-group-item list-group-item bg-transparent second-text fw-bold"><i
                        class="fas fa-house me-2"></i>Dashboard</a>

                <!-- entries -->
                <a href="#" class="list-group-submenu list-group-item bg-transparent second-text fw-bold"><i
                        class="fas fa-square-plus me-2"></i>Entries <i class="fa-solid fa-caret-down"></i></a>
                <div class="sidebar-submenu">
                    <ul>
                        <li>
                            <a href="section_index.php"
                                class="submenu-item list-group-item bg-transparent second-text fw-bold">Sections</a>
                        </li>
                        <li>
                            <a href="prof_index.php"
                                class="submenu-item list-group-item bg-transparent second-text fw-bold">Professors</a>
                        </li>
                        <li>
                            <a href="subject_index.php"
                                class="submenu-item list-group-item bg-transparent second-text fw-bold">Subjects</a>
                        </li>
                        <li>
                            <a href="room_index.php"
                                class="submenu-item list-group-item bg-transparent second-text fw-bold">Rooms</a>
                        </li>
                    </ul>
                </div>

                <!-- schedule -->
                <a href="schedule_index.php"
                    class="list-group-item list-group-item bg-transparent second-text fw-bold"><i
                        class="fas fa-regular fa-calendar-plus me-2"></i>Schedule</a>

                <!-- reports -->
                <a href="#" class="list-group-submenu list-group-item bg-transparent second-text fw-bold"><i
                        class="fas fa-solid fa-clipboard me-2"></i>Reports <i class="fa-solid fa-caret-down"></i></a>
                <div class="sidebar-submenu">
                    <ul>
                        <li>
                            <a href="pbs_index.php"
                                class="submenu-item list-group-item bg-transparent second-text fw-bold">PBS</a>
                        </li>
                        <li>
                            <a href="pbt_index.php"
                                class="submenu-item list-group-item bg-transparent second-text fw-bold">PBT</a>
                        </li>
                        <li>
                            <a href="pbru_index.php"
                                class="submenu-item list-group-item bg-transparent second-text fw-bold">PBRU</a>
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

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- profile settings -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i>John Doe
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="profile_index.php">Profile</a></li>
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
                                        <h2>Manage Professor Entries</h2>
                                    </div>
                                    <div class="col-sm-3">
                                        <input class="form-control" id="tableSearch" type="text" placeholder="Search">
                                    </div>
                                    <div class="col">
                                        <a href="#addProf" class="btn btn-success" data-bs-toggle="modal"><i
                                                class="material-icons">&#xE147;</i><span>Add New Professor</span></a>
                                    </div>
                                </div>
                            </div>
                            <!-- makes the table responsive -->
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th style="display: none;">profID</th>
                                            <th>No.</th>
                                            <th>First Name</th>
                                            <th>Middle Name</th>
                                            <th>Last Name</th>
                                            <th>Rank</th>
                                            <th>Employment Status</th>
                                            <th>Actions</th>

                                        </tr>
                                    </thead>
                                    <tbody id="myTable">
                                        <?php
                                        $result = mysqli_query($conn, "SELECT * FROM tb_professor");
                                        $i = 1;
                                        while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                        <tr>
                                            <td style="display: none;"><?php echo $row["profID"] ?></td>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $row["profFname"] ?></td>
                                            <td><?php echo $row["profMname"] ?></td>
                                            <td><?php echo $row["profLname"] ?></td>
                                            <td><?php echo $row["profRank"] ?></td>
                                            <td><?php echo $row["profEmployStatus"] ?></td>
                                            <!-- <td><?php
                                                            if ($row['profStatus'] == "1") {
                                                                echo "Active";
                                                            } else {
                                                                echo "Inactive";
                                                            } ?></td> -->
                                            <td>
                                                <form method="POST" action="prof_all_process.php">
                                                    <a href="#viewProf" class="view" data-bs-toggle="modal"><i
                                                            class="material-icons" data-bs-toggle="tooltip" title="View"
                                                            data-id='<?php echo $row['profID']; ?>'>&#xe8f4;</i></a>
                                                    <input type="hidden" name="profID" value="<?php echo $profID; ?>">
                                                    <a href="#statusProf" class="status" data-bs-toggle="modal"><i
                                                            class="material-icons" data-bs-toggle="tooltip"
                                                            title="Status">&#xe909;</i></a>
                                                </form>
                                            </td>

                                        </tr>
                                        <?php
                                            $i++;
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
                    <div id="addProf" class="modal fade">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <form method="POST" action="prof_all_process.php">
                                    <!-- <input type="hidden" name="profID" value="<?php echo $profID; ?>"> -->
                                    <input type="hidden" name="profStatus" value="1">
                                    <!-- Always set to "1" for active status -->

                                    <div class="modal-header">
                                        <h5 class="modal-title">Add New Professor</h5>
                                        <button type="button" class="close" data-bs-dismiss="modal"
                                            aria-hidden="true">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col">
                                                    <label>First Name</label>
                                                    <input type="text" name="profFname" class="form-control"
                                                        value="<?php echo $profFname; ?>">
                                                </div>
                                                <div class=" col">
                                                    <div class="form-group">
                                                        <label>Middle Name</label>
                                                        <input type="text" name="profMname" class="form-control"
                                                            value="<?php echo $profLname; ?>">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Last Name</label>
                                                        <input type="text" name="profLname" class="form-control"
                                                            value="<?php echo $profMname; ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Mobile No.</label>
                                                        <input type="number" name="profMobile" class="form-control"
                                                            value="<?php echo $profMobile; ?>">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Address</label>
                                                        <input type="text" name="profAddress" class="form-control"
                                                            value="<?php echo $profAddress; ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Educational Attainment</label>
                                                        <textarea class="form-control" name="profEduc"
                                                            rows="4"><?php echo $profEduc; ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Expertise/Specialization</label>
                                                        <textarea class="form-control" name="profExpert"
                                                            rows="4"><?php echo $profExpert; ?></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Professor's Rank</label>
                                                        <select class="form-control" required name="profRank"
                                                            id="profRank">
                                                            <option value="" disabled>Select Professors Rank</option>
                                                            <option value="Instructor 1"
                                                                <?= ($profRank == "Instructor 1") ? "selected" : ""; ?>>
                                                                Instructor 1</option>
                                                            <option value="Instructor 2"
                                                                <?= ($profRank == "Instructor 2") ? "selected" : ""; ?>>
                                                                Instructor 2</option>
                                                            <option value="Instructor 3"
                                                                <?= ($profRank == "Instructor 3") ? "selected" : ""; ?>>
                                                                Instructor 3</option>
                                                            <option value="Instructor 4"
                                                                <?= ($profRank == "Instructor 4") ? "selected" : ""; ?>>
                                                                Instructor 4</option>
                                                            <option value="Instructor 5"
                                                                <?= ($profRank == "Instructor 5") ? "selected" : ""; ?>>
                                                                Instructor 5</option>
                                                            <option value="Instructor 6"
                                                                <?= ($profRank == "Instructor 6") ? "selected" : ""; ?>>
                                                                Instructor 6</option>
                                                            <option value="Instructor 7"
                                                                <?= ($profRank == "Instructor 7") ? "selected" : ""; ?>>
                                                                Instructor 7</option>
                                                            <option value="Assistant Prof. 1"
                                                                <?= ($profRank == "Assistant Prof. 1") ? "selected" : ""; ?>>
                                                                Assistant Prof. 1</option>
                                                            <option value="Assistant Prof. 2"
                                                                <?= ($profRank == "Assistant Prof. 2") ? "selected" : ""; ?>>
                                                                Assistant Prof. 2</option>
                                                            <option value="Assistant Prof. 3"
                                                                <?= ($profRank == "Assistant Prof. 3") ? "selected" : ""; ?>>
                                                                Assistant Prof. 3</option>
                                                            <option value="Assistant Prof. 4"
                                                                <?= ($profRank == "Assistant Prof. 4") ? "selected" : ""; ?>>
                                                                Assistant Prof. 4</option>
                                                            <option value="Assistant Prof. 5"
                                                                <?= ($profRank == "Assistant Prof. 5") ? "selected" : ""; ?>>
                                                                Assistant Prof. 5</option>
                                                            <option value="Assistant Prof. 6"
                                                                <?= ($profRank == "Assistant Prof. 6") ? "selected" : ""; ?>>
                                                                Assistant Prof. 6</option>
                                                            <option value="Assistant Prof. 7"
                                                                <?= ($profRank == "Assistant Prof. 7") ? "selected" : ""; ?>>
                                                                Assistant Prof. 7</option>
                                                            <option value="Associate Prof. 1"
                                                                <?= ($profRank == "Associate Prof. 1") ? "selected" : ""; ?>>
                                                                Associate Prof. 1</option>
                                                            <option value="Associate Prof. 2"
                                                                <?= ($profRank == "Associate Prof. 2") ? "selected" : ""; ?>>
                                                                Associate Prof. 2</option>
                                                            <option value="Associate Prof. 3"
                                                                <?= ($profRank == "Associate Prof. 3") ? "selected" : ""; ?>>
                                                                Associate Prof. 3</option>
                                                            <option value="Associate Prof. 4"
                                                                <?= ($profRank == "Associate Prof. 4") ? "selected" : ""; ?>>
                                                                Associate Prof. 4</option>
                                                            <option value="Associate Prof. 5"
                                                                <?= ($profRank == "Associate Prof. 5") ? "selected" : ""; ?>>
                                                                Associate Prof. 5</option>
                                                            <option value="Associate Prof. 6"
                                                                <?= ($profRank == "Associate Prof. 6") ? "selected" : ""; ?>>
                                                                Associate Prof. 6</option>
                                                            <option value="Associate Prof. 7"
                                                                <?= ($profRank == "Associate Prof. 7") ? "selected" : ""; ?>>
                                                                Associate Prof. 7</option>
                                                            <option value="Professor 1"
                                                                <?= ($profRank == "Professor 1") ? "selected" : ""; ?>>
                                                                Professor 1</option>
                                                            <option value="Professor 2"
                                                                <?= ($profRank == "Professor 2") ? "selected" : ""; ?>>
                                                                Professor 2</option>
                                                            <option value="Professor 3"
                                                                <?= ($profRank == "Professor 3") ? "selected" : ""; ?>>
                                                                Professor 3</option>
                                                            <option value="Professor 4"
                                                                <?= ($profRank == "Professor 4") ? "selected" : ""; ?>>
                                                                Professor 4</option>
                                                            <option value="Professor 5"
                                                                <?= ($profRank == "Professor 5") ? "selected" : ""; ?>>
                                                                Professor 5</option>
                                                            <option value="Professor 6"
                                                                <?= ($profRank == "Professor 6") ? "selected" : ""; ?>>
                                                                Professor 6</option>
                                                            <option value="Professor 7"
                                                                <?= ($profRank == "Professor 7") ? "selected" : ""; ?>>
                                                                Professor 7</option>
                                                            <option value="Professor 8"
                                                                <?= ($profRank == "Professor 8") ? "selected" : ""; ?>>
                                                                Professor 8</option>
                                                            <option value="Professor 9"
                                                                <?= ($profRank == "Professor 9") ? "selected" : ""; ?>>
                                                                Professor 9</option>
                                                            <option value="Professor 10"
                                                                <?= ($profRank == "Professor 10") ? "selected" : ""; ?>>
                                                                Professor 10</option>
                                                            <option value="Professor 11"
                                                                <?= ($profRank == "Professor 11") ? "selected" : ""; ?>>
                                                                Professor 11</option>
                                                            <option value="Professor 12"
                                                                <?= ($profRank == "Professor 12") ? "selected" : ""; ?>>
                                                                Professor 12</option>
                                                            <option value="Univ. Professor"
                                                                <?= ($profRank == "Univ. Professor") ? "selected" : ""; ?>>
                                                                Univ. Professor</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Maximum Units</label>
                                                        <input type="number" name="profUnit" class="form-control"
                                                            value="<?php echo $profUnit; ?>">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Employment Status</label>
                                                        <select class="form-control" name="profEmployStatus">
                                                            <option value="" disabled selected>Select Professor's
                                                                Employment
                                                                Status
                                                            </option>
                                                            <option id="profPart" value="Part-Time"
                                                                <?= ($profEmployStatus == "Part-Time") ? "selected" : ""; ?>>
                                                                Part-Time</option>
                                                            <option id="profFull" value="Full-Time"
                                                                <?= ($profEmployStatus == "Full-Time") ? "selected" : ""; ?>>
                                                                Full-Time</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" required name="Status">
                                                <option value="" disabled selected>Select Status</option>
                                                <option value="active">Active</option>
                                                <option value="inactive">Inactive</option>
                                            </select>
                                        </div> -->
                                    </div>
                                    <div class="modal-footer">
                                        <input type="button" class="btn" data-bs-dismiss="modal" value="Cancel">
                                        <input type="submit" name="prof_add_new" class="btn" value="Add">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- View Modal HTML -->
                    <div id="viewProf" class="modal fade">
                        <div class=" modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">View Professor Details</h5>
                                    <button type="button" class="close" data-bs-dismiss="modal"
                                        aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>First Name</th>
                                                    <th>Middle Name</th>
                                                    <th>Last Name</th>
                                                    <th>Mobile No.</th>
                                                    <th>Address</th>
                                                    <th>Educational Attaintment</th>
                                                    <th>Expertise/Specialization</th>
                                                    <th>Rank</th>
                                                    <th>Maximum Units</th>
                                                    <th>Employment Status</th>

                                                </tr>
                                            </thead>
                                            <tbody id="myTable">
                                                <?php
                                        $result = mysqli_query($conn, "SELECT * FROM tb_professor");
                                        $i = 1;
                                        while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                                <tr>
                                                    <td><?php echo $row["profFname"] ?></td>
                                                    <td><?php echo $row["profMname"] ?></td>
                                                    <td><?php echo $row["profLname"] ?></td>
                                                    <td><?php echo $row["profMobile"] ?></td>
                                                    <td><?php echo $row["profAddress"] ?></td>
                                                    <td><?php echo $row["profEduc"] ?></td>
                                                    <td><?php echo $row["profExpert"] ?></td>
                                                    <td><?php echo $row["profRank"] ?></td>
                                                    <td><?php echo $row["profUnit"] ?></td>
                                                    <td><?php echo $row["profEmployStatus"] ?></td>
                                                </tr>
                                                <?php
                                        } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="button" class="btn" data-bs-dismiss="modal" value="Close">
                                    <a class="btn btn-default" data-bs-toggle="modal" data-bs-dismiss="modal"
                                        href="#editProf" role="button">Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Edit Modal HTML -->
                    <div id="editProf" class="modal fade">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <form method="POST" action="prof_all_process.php">
                                    <input type="hidden" name="profID" id="profID" value="<?php echo $profID; ?>">
                                    <input type="hidden" name="profStatus" value="1">

                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Professor</h5>
                                        <button type="button" class="close" data-bs-dismiss="modal"
                                            aria-hidden="true">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>First Name</label>
                                                    <input type=" text" name="profFname" id="profFname"
                                                        class="form-control" required value="<?php echo $profFname; ?>">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Middle Name</label>
                                                    <input type="text" name="profMname" id="profMname"
                                                        class="form-control" required value="<?php echo $profMname; ?>">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Last Name</label>
                                                    <input type="text" name="profLname" id="profLname"
                                                        class="form-control" required value="<?php echo $profLname; ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Mobile No.</label>
                                                    <input type="number" name="profMobile" id="profMobile"
                                                        class="form-control" required
                                                        value="<?php echo $profMobile; ?>">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <textarea class="form-control" name="profAddress" id="profAddress"
                                                        required><?php echo $profAddress; ?></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Educational Attainment</label>
                                                    <textarea class="form-control" name="profEduc" id="profEduc"
                                                        rows="4"
                                                        required><?php echo $profEduc; ?><?php echo $profEduc; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Expertise/Specialization</label>
                                                    <textarea class="form-control" name="profExpert" id="profExpert"
                                                        rows="4" required><?php echo $profExpert; ?></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Rank</label>
                                                    <select class="form-control" required name="profRank" id="profRank">
                                                        <option value="" disabled>Select Professors Rank</option>
                                                        <option value="Instructor 1"
                                                            <?= ($profRank == "Instructor 1") ? "selected" : ""; ?>>
                                                            Instructor 1
                                                        </option>
                                                        <option value="Instructor 2"
                                                            <?= ($profRank == "Instructor 2") ? "selected" : ""; ?>>
                                                            Instructor 2
                                                        </option>
                                                        <option value="Instructor 3"
                                                            <?= ($profRank == "Instructor 3") ? "selected" : ""; ?>>
                                                            Instructor 3
                                                        </option>
                                                        <option value="Instructor 4"
                                                            <?= ($profRank == "Instructor 4") ? "selected" : ""; ?>>
                                                            Instructor 4
                                                        </option>
                                                        <option value="Instructor 5"
                                                            <?= ($profRank == "Instructor 5") ? "selected" : ""; ?>>
                                                            Instructor 5
                                                        </option>
                                                        <option value="Instructor 6"
                                                            <?= ($profRank == "Instructor 6") ? "selected" : ""; ?>>
                                                            Instructor 6
                                                        </option>
                                                        <option value="Instructor 7"
                                                            <?= ($profRank == "Instructor 7") ? "selected" : ""; ?>>
                                                            Instructor 7
                                                        </option>
                                                        <option value="Assistant Prof. 1"
                                                            <?= ($profRank == "Assistant Prof. 1") ? "selected" : ""; ?>>
                                                            Assistant Prof. 1</option>
                                                        <option value="Assistant Prof. 2"
                                                            <?= ($profRank == "Assistant Prof. 2") ? "selected" : ""; ?>>
                                                            Assistant Prof. 2</option>
                                                        <option value="Assistant Prof. 3"
                                                            <?= ($profRank == "Assistant Prof. 3") ? "selected" : ""; ?>>
                                                            Assistant Prof. 3</option>
                                                        <option value="Assistant Prof. 4"
                                                            <?= ($profRank == "Assistant Prof. 4") ? "selected" : ""; ?>>
                                                            Assistant Prof. 4</option>
                                                        <option value="Assistant Prof. 5"
                                                            <?= ($profRank == "Assistant Prof. 5") ? "selected" : ""; ?>>
                                                            Assistant Prof. 5</option>
                                                        <option value="Assistant Prof. 6"
                                                            <?= ($profRank == "Assistant Prof. 6") ? "selected" : ""; ?>>
                                                            Assistant Prof. 6</option>
                                                        <option value="Assistant Prof. 7"
                                                            <?= ($profRank == "Assistant Prof. 7") ? "selected" : ""; ?>>
                                                            Assistant Prof. 7</option>
                                                        <option value="Associate Prof. 1"
                                                            <?= ($profRank == "Associate Prof. 1") ? "selected" : ""; ?>>
                                                            Associate Prof. 1</option>
                                                        <option value="Associate Prof. 2"
                                                            <?= ($profRank == "Associate Prof. 2") ? "selected" : ""; ?>>
                                                            Associate Prof. 2</option>
                                                        <option value="Associate Prof. 3"
                                                            <?= ($profRank == "Associate Prof. 3") ? "selected" : ""; ?>>
                                                            Associate Prof. 3</option>
                                                        <option value="Associate Prof. 4"
                                                            <?= ($profRank == "Associate Prof. 4") ? "selected" : ""; ?>>
                                                            Associate Prof. 4</option>
                                                        <option value="Associate Prof. 5"
                                                            <?= ($profRank == "Associate Prof. 5") ? "selected" : ""; ?>>
                                                            Associate Prof. 5</option>
                                                        <option value="Associate Prof. 6"
                                                            <?= ($profRank == "Associate Prof. 6") ? "selected" : ""; ?>>
                                                            Associate Prof. 6</option>
                                                        <option value="Associate Prof. 7"
                                                            <?= ($profRank == "Associate Prof. 7") ? "selected" : ""; ?>>
                                                            Associate Prof. 7</option>
                                                        <option value="Professor 1"
                                                            <?= ($profRank == "Professor 1") ? "selected" : ""; ?>>
                                                            Professor
                                                            1
                                                        </option>
                                                        <option value="Professor 2"
                                                            <?= ($profRank == "Professor 2") ? "selected" : ""; ?>>
                                                            Professor
                                                            2
                                                        </option>
                                                        <option value="Professor 3"
                                                            <?= ($profRank == "Professor 3") ? "selected" : ""; ?>>
                                                            Professor
                                                            3
                                                        </option>
                                                        <option value="Professor 4"
                                                            <?= ($profRank == "Professor 4") ? "selected" : ""; ?>>
                                                            Professor
                                                            4
                                                        </option>
                                                        <option value="Professor 5"
                                                            <?= ($profRank == "Professor 5") ? "selected" : ""; ?>>
                                                            Professor
                                                            5
                                                        </option>
                                                        <option value="Professor 6"
                                                            <?= ($profRank == "Professor 6") ? "selected" : ""; ?>>
                                                            Professor
                                                            6
                                                        </option>
                                                        <option value="Professor 7"
                                                            <?= ($profRank == "Professor 7") ? "selected" : ""; ?>>
                                                            Professor
                                                            7
                                                        </option>
                                                        <option value="Professor 8"
                                                            <?= ($profRank == "Professor 8") ? "selected" : ""; ?>>
                                                            Professor
                                                            8
                                                        </option>
                                                        <option value="Professor 9"
                                                            <?= ($profRank == "Professor 9") ? "selected" : ""; ?>>
                                                            Professor
                                                            9
                                                        </option>
                                                        <option value="Professor 10"
                                                            <?= ($profRank == "Professor 10") ? "selected" : ""; ?>>
                                                            Professor 10
                                                        </option>
                                                        <option value="Professor 11"
                                                            <?= ($profRank == "Professor 11") ? "selected" : ""; ?>>
                                                            Professor 11
                                                        </option>
                                                        <option value="Professor 12"
                                                            <?= ($profRank == "Professor 12") ? "selected" : ""; ?>>
                                                            Professor 12
                                                        </option>
                                                        <option value="Univ. Professor"
                                                            <?= ($profRank == "Univ. Professor") ? "selected" : ""; ?>>
                                                            Univ.
                                                            Professor</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Maximum Units</label>
                                                    <input type="number" name="profUnit" id="profUnit"
                                                        class="form-control" required value="<?php echo $profUnit; ?>">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="profEmployStatus">Employment Status</label>
                                                    <select name="profEmployStatus" class="form-control" required>
                                                        <option value="" disabled>Select Professor's Employment
                                                            Status
                                                        </option>
                                                        <option id="profPart" value="Part-Time"
                                                            <?= ($profEmployStatus == "Part-Time") ? "selected" : ""; ?>>
                                                            Part-Time</option>
                                                        <option id="profFull" value="Full-Time"
                                                            <?= ($profEmployStatus == "Full-Time") ? "selected" : ""; ?>>
                                                            Full-Time</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control" required name="Status">
                                            <option value="" disabled selected>Select Status</option>
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                        </select>
                                    </div> -->
                                    </div>
                                    <div class="modal-footer">
                                        <a class="btn btn-default" data-bs-toggle="modal" data-bs-dismiss="modal"
                                            href="#viewProf" role="button">Cancel</a>
                                        <input type="submit" name="prof_update" class="btn" value="Update">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Change Status Modal HTML -->
                    <div id="statusProf" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form>
                                    <div class="modal-header">
                                        <h5 class="modal-title">Change Status</h5>
                                        <button type="button" class="close" data-bs-dismiss="modal"
                                            aria-hidden="true">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <h6>Are you sure you want to inactivate this Professor?</h6>
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

    <script>
    $(document).ready(function() {

        // display Edit modal

        $('.edit').on('click', function() {

            $('#editProf').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.find("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);
            $('#profID').val(data[0]);

            $('#profFname').val(data[2]);
            $('#profMname').val(data[3]);
            $('#profLname').val(data[4]);
            $('#profMobile').val(data[5]);
            $('#profAddress').val(data[6]);
            $('#profEduc').val(data[7]);
            $('#profExpert').val(data[8]);
            $('#profRank').val(data[9]);
            $('#profUnit').val(data[10]);
            // $('#profPart').val(data[11]);
            // $('#profFull').val(data[12]);
        });

    });
    </script>

    <script>
    $(document).ready(function() {

        // display Edit modal

        $('.view').on('click', function() {

            $('#viewProf').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.find("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);
            $('#profID').val(data[0]);

            $('#profFname').val(data[2]);
            $('#profMname').val(data[3]);
            $('#profLname').val(data[4]);
            $('#profMobile').val(data[5]);
            $('#profAddress').val(data[6]);
            $('#profEduc').val(data[7]);
            $('#profExpert').val(data[8]);
            $('#profRank').val(data[9]);
            $('#profUnit').val(data[10]);
            $('#profPart').val(data[11]);
            $('#profFull').val(data[12]);
        });

    });
    </script>

</body>

</html>