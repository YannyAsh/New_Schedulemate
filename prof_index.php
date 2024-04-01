<?php
session_start();
include 'prof_all_process.php';

if (isset($_GET['prof_edit'])) {
    $profID = $_GET['prof_edit'];
    $prof_edit_state = true;
    $record = mysqli_query($conn, "SELECT * FROM tb_professor WHERE profID=$profID");
    $data = mysqli_fetch_array($record);
    $profFname  = $data['profFname'];
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
                <a href="dashboard.php" class="list-group-item list-group-item bg-transparent second-text fw-bold"><i class="fas fa-house me-2"></i>Dashboard</a>

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

                <!-- schedule -->
                <a href="schedule_index.php" class="list-group-item list-group-item bg-transparent second-text fw-bold"><i class="fas fa-regular fa-calendar-plus me-2"></i>Schedule</a>

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
                                <li><a class="dropdown-item" href="#">Profile</a></li>
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
                                        <a href="#addProf" class="btn btn-success" data-bs-toggle="modal"><i class="material-icons">&#xE147;</i><span>Add New Professor</span></a>
                                    </div>
                                </div>
                            </div>
                            <!-- makes the table responsive -->
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>proID</th>
                                            <th>No.</th>
                                            <th>First Name</th>
                                            <th style="display: none;">Middle Name</th>
                                            <th>Last Name</th>
                                            <th>Mobile No.</th>
                                            <th>Address</th>
                                            <th>Educational Attainment</th>
                                            <th>Expertise/Specialization</th>
                                            <th>Professor's Rank</th>
                                            <th>Units</th>
                                            <th>Employment Status</th>
                                            <th>profStatus</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="myTable">
                                        <?php
                                        $result_active = mysqli_query($conn, "SELECT * FROM tb_professor WHERE profStatus = 1");
                                        $result_inactive = mysqli_query($conn, "SELECT * FROM tb_professor WHERE profStatus = 0");
                                        $i = 1;

                                        // Display Active Room
                                        while ($row = mysqli_fetch_array($result_active)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $row["profID"] ?></td>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $row["profFname"] ?></td>
                                                <td><?php echo $row["profLname"] ?></td>
                                                <td><?php echo $row["profMobile"] ?></td>
                                                <td><?php echo $row["profAddress"] ?></td>
                                                <td><?php echo $row["profEduc"] ?></td>
                                                <td><?php echo $row["profExpert"] ?></td>
                                                <td><?php echo $row["profRank"] ?></td>
                                                <td><?php echo $row["profUnit"] ?></td>
                                                <td><?php echo $row["profEmployStatus"] ?></td>
                                                <td><?php echo "Active" ?>
                                                </td>
                                                <td>
                                                    <a href="" name="prof_edit" class="edit" data-bs-toggle="modal"><i class="material-icons" data-bs-toggle="tooltip" title="Edit">&#xe254;</i></a>
                                                    <input type="hidden" name="profID" value="<?php echo $row['profID']; ?>">
                                                    <a href="#statusProf" class="status" data-bs-toggle="modal" data-roomid="<?php echo $row['profID']; ?>"><i class="material-icons" data-bs-toggle="tooltip" title="Status">&#xe909;</i></a>
                                                </td>
                                            </tr>
                                        <?php
                                            $i++;
                                        }

                                        // Display Inactive Room
                                        while ($row = mysqli_fetch_array($result_inactive)) {
                                        ?>
                                            <tr style="color: #999; /* Gray out inactive room */">
                                                <td><?php echo $row["profID"] ?></td>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $row["profFname"] ?></td>
                                                <td><?php echo $row["profLname"] ?></td>
                                                <td><?php echo $row["profMobile"] ?></td>
                                                <td><?php echo $row["profAddress"] ?></td>
                                                <td><?php echo $row["profEduc"] ?></td>
                                                <td><?php echo $row["profExpert"] ?></td>
                                                <td><?php echo $row["profRank"] ?></td>
                                                <td><?php echo $row["profUnit"] ?></td>
                                                <td><?php echo $row["profEmployStatus"] ?></td>
                                                <td><?php echo "Inactive"; ?></td>
                                                <td>
                                                    <a href="" name="prof_edit" class="edit" data-bs-toggle="modal"><i class="material-icons" data-bs-toggle="tooltip" title="Edit">&#xe254;</i></a>
                                                    <input type="hidden" name="profID" value="<?php echo $row['profID']; ?>">
                                                    <a href="#statusProf" class="status" data-bs-toggle="modal" data-roomid="<?php echo $row['profID']; ?>"><i class="material-icons" data-bs-toggle="tooltip" title="Status">&#xe909;</i></a>
                                                </td>
                                            </tr>
                                        <?php
                                            $i++;
                                        }
                                        ?>

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
                                    <input type="hidden" name="profID" value="<?php echo $profID; ?>">
                                    <input type="hidden" name="profStatus" value="1"> <!-- Always set to "1" for active status -->.

                                    <div class="modal-header">
                                        <h5 class="modal-title">Add New Professor</h5>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col">
                                                    <label>First Name</label>
                                                    <input type="text" class="form-control" name="profFname" required value="<?php echo $profFname; ?>">
                                                </div>
                                                <!-- <div class="col">
                                                    <div class="form-group">
                                                        <label>Middle Name</label>
                                                        <input type="text" class="form-control" name="profLname" required>
                                                    </div>
                                                </div> -->
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Last Name</label>
                                                        <input type="text" class="form-control" name="profLname" required value="<?php echo $profLname; ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Mobile No.</label>
                                                        <input type="number" class="form-control" name="profMobile" required value="<?php echo $profMobile; ?>">
                                                    </div>
                                                </div>
                                                <div class=" col">
                                                    <div class="form-group">
                                                        <label>Address</label>
                                                        <input type="text" class="form-control" name="profAddress" required value="<?php echo $profAddress; ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class=" row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Educational Attainment</label>
                                                        <textarea class="form-control" rows="4" name="profEduc" required value="<?php echo $profEduc; ?>"></textarea>
                                                    </div>
                                                </div>
                                                <div class=" col">
                                                    <div class="form-group">
                                                        <label>Expertise/Specialization</label>
                                                        <textarea class="form-control" rows="4" name="profExpert" required value="<?php echo $profEduc; ?>"></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Professor's Rank</label>
                                                        <select class="form-control" required name="profRank">
                                                            <option value="" disabled selected>Select Professors Rank</option>
                                                            <option value="Instructor 1" <?= ($profRank == "Instructor 1") ? "selected" : ""; ?>>Instructor 1</option>
                                                            <option value="Instructor 2" <?= ($profRank == "Instructor 2") ? "selected" : ""; ?>>Instructor 2</option>
                                                            <option value="Instructor 3" <?= ($profRank == "Instructor 3") ? "selected" : ""; ?>>Instructor 3</option>
                                                            <option value="Instructor 4" <?= ($profRank == "Instructor 4") ? "selected" : ""; ?>>Instructor 4</option>
                                                            <option value="Instructor 5" <?= ($profRank == "Instructor 5") ? "selected" : ""; ?>>Instructor 5</option>
                                                            <option value="Instructor 6" <?= ($profRank == "Instructor 6") ? "selected" : ""; ?>>Instructor 6</option>
                                                            <option value="Instructor 7" <?= ($profRank == "Instructor 7") ? "selected" : ""; ?>>Instructor 7</option>
                                                            <option value="Assistant Prof. 1" <?= ($profRank == "Assistant Prof. 1") ? "selected" : ""; ?>>Assistant Prof. 1</option>
                                                            <option value="Assistant Prof. 2" <?= ($profRank == "Assistant Prof. 2") ? "selected" : ""; ?>>Assistant Prof. 2</option>
                                                            <option value="Assistant Prof. 3" <?= ($profRank == "Assistant Prof. 3") ? "selected" : ""; ?>>Assistant Prof. 3</option>
                                                            <option value="Assistant Prof. 4" <?= ($profRank == "Assistant Prof. 4") ? "selected" : ""; ?>>Assistant Prof. 4</option>
                                                            <option value="Assistant Prof. 5" <?= ($profRank == "Assistant Prof. 5") ? "selected" : ""; ?>>Assistant Prof. 5</option>
                                                            <option value="Assistant Prof. 6" <?= ($profRank == "Assistant Prof. 6") ? "selected" : ""; ?>>Assistant Prof. 6</option>
                                                            <option value="Assistant Prof. 7" <?= ($profRank == "Assistant Prof. 7") ? "selected" : ""; ?>>Assistant Prof. 7</option>
                                                            <option value="Associate Prof. 1" <?= ($profRank == "Associate Prof. 1") ? "selected" : ""; ?>>Associate Prof. 1</option>
                                                            <option value="Associate Prof. 2" <?= ($profRank == "Associate Prof. 2") ? "selected" : ""; ?>>Associate Prof. 2</option>
                                                            <option value="Associate Prof. 3" <?= ($profRank == "Associate Prof. 3") ? "selected" : ""; ?>>Associate Prof. 3</option>
                                                            <option value="Associate Prof. 4" <?= ($profRank == "Associate Prof. 4") ? "selected" : ""; ?>>Associate Prof. 4</option>
                                                            <option value="Associate Prof. 5" <?= ($profRank == "Associate Prof. 5") ? "selected" : ""; ?>>Associate Prof. 5</option>
                                                            <option value="Associate Prof. 6" <?= ($profRank == "Associate Prof. 6") ? "selected" : ""; ?>>Associate Prof. 6</option>
                                                            <option value="Associate Prof. 7" <?= ($profRank == "Associate Prof. 7") ? "selected" : ""; ?>>Associate Prof. 7</option>
                                                            <option value="Professor 1" <?= ($profRank == "Professor 1") ? "selected" : ""; ?>>Professor 1</option>
                                                            <option value="Professor 2" <?= ($profRank == "Professor 2") ? "selected" : ""; ?>>Professor 2</option>
                                                            <option value="Professor 3" <?= ($profRank == "Professor 3") ? "selected" : ""; ?>>Professor 3</option>
                                                            <option value="Professor 4" <?= ($profRank == "Professor 4") ? "selected" : ""; ?>>Professor 4</option>
                                                            <option value="Professor 5" <?= ($profRank == "Professor 5") ? "selected" : ""; ?>>Professor 5</option>
                                                            <option value="Professor 6" <?= ($profRank == "Professor 6") ? "selected" : ""; ?>>Professor 6</option>
                                                            <option value="Professor 7" <?= ($profRank == "Professor 7") ? "selected" : ""; ?>>Professor 7</option>
                                                            <option value="Professor 8" <?= ($profRank == "Professor 8") ? "selected" : ""; ?>>Professor 8</option>
                                                            <option value="Professor 9" <?= ($profRank == "Professor 9") ? "selected" : ""; ?>>Professor 9</option>
                                                            <option value="Professor 10" <?= ($profRank == "Professor 10") ? "selected" : ""; ?>>Professor 10</option>
                                                            <option value="Professor 11" <?= ($profRank == "Professor 11") ? "selected" : ""; ?>>Professor 11</option>
                                                            <option value="Professor 12" <?= ($profRank == "Professor 12") ? "selected" : ""; ?>>Professor 12</option>
                                                            <option value="Univ. Professor" <?= ($profRank == "Univ. Professor") ? "selected" : ""; ?>>Univ. Professor</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Maximum Units</label>
                                                        <input type="number" class="form-control" name="profUnit" required value="<?php echo $profUnit; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- <div class="form-group">
                                                        <label>Employment Status</label>
                                                        <select class="form-control" required name="Status">
                                                            <option value="" disabled selected>Select Status</option>
                                                            <option value="active">Active</option>
                                                            <option value="inactive">Inactive</option>
                                                        </select>
                                                    </div> -->
                                    </div>

                                    <div class="modal-footer">
                                        <input type="button" class="btn" data-bs-dismiss="modal" value="Cancel">
                                        <input type="submit" class="btn" name="prof_add_new" value="Add">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Edit Modal HTML -->
                    <div id="editProf" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form method="POST" action="prof_all_process.php">
                                    <input type="hidden" name="profID" id="profID" value="<?php echo $profID; ?>">
                                    <input type="hidden" name="profStatus" value="1"> <!-- Always set to "1" for active status -->

                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Professor</h5>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input type="text" class="form-control" name="" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Mobile No.</label>
                                            <input type="number" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Address</label>
                                            <textarea class="form-control" rows="2" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Educational Attainment</label>
                                            <textarea class="form-control" rows="4" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Expertise/Specialization</label>
                                            <textarea class="form-control" rows="4" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Professor's Rank</label>
                                            <select name="profRank">
                                                <option value="" disabled selected>Select Professors Rank</option>
                                                <option value="Instructor 1" <?= ($profRank == "Instructor 1") ? "selected" : ""; ?>>Instructor 1</option>
                                                <option value="Instructor 2" <?= ($profRank == "Instructor 2") ? "selected" : ""; ?>>Instructor 2</option>
                                                <option value="Instructor 3" <?= ($profRank == "Instructor 3") ? "selected" : ""; ?>>Instructor 3</option>
                                                <option value="Instructor 4" <?= ($profRank == "Instructor 4") ? "selected" : ""; ?>>Instructor 4</option>
                                                <option value="Instructor 5" <?= ($profRank == "Instructor 5") ? "selected" : ""; ?>>Instructor 5</option>
                                                <option value="Instructor 6" <?= ($profRank == "Instructor 6") ? "selected" : ""; ?>>Instructor 6</option>
                                                <option value="Instructor 7" <?= ($profRank == "Instructor 7") ? "selected" : ""; ?>>Instructor 7</option>
                                                <option value="Assistant Prof. 1" <?= ($profRank == "Assistant Prof. 1") ? "selected" : ""; ?>>Assistant Prof. 1</option>
                                                <option value="Assistant Prof. 2" <?= ($profRank == "Assistant Prof. 2") ? "selected" : ""; ?>>Assistant Prof. 2</option>
                                                <option value="Assistant Prof. 3" <?= ($profRank == "Assistant Prof. 3") ? "selected" : ""; ?>>Assistant Prof. 3</option>
                                                <option value="Assistant Prof. 4" <?= ($profRank == "Assistant Prof. 4") ? "selected" : ""; ?>>Assistant Prof. 4</option>
                                                <option value="Assistant Prof. 5" <?= ($profRank == "Assistant Prof. 5") ? "selected" : ""; ?>>Assistant Prof. 5</option>
                                                <option value="Assistant Prof. 6" <?= ($profRank == "Assistant Prof. 6") ? "selected" : ""; ?>>Assistant Prof. 6</option>
                                                <option value="Assistant Prof. 7" <?= ($profRank == "Assistant Prof. 7") ? "selected" : ""; ?>>Assistant Prof. 7</option>
                                                <option value="Associate Prof. 1" <?= ($profRank == "Associate Prof. 1") ? "selected" : ""; ?>>Associate Prof. 1</option>
                                                <option value="Associate Prof. 2" <?= ($profRank == "Associate Prof. 2") ? "selected" : ""; ?>>Associate Prof. 2</option>
                                                <option value="Associate Prof. 3" <?= ($profRank == "Associate Prof. 3") ? "selected" : ""; ?>>Associate Prof. 3</option>
                                                <option value="Associate Prof. 4" <?= ($profRank == "Associate Prof. 4") ? "selected" : ""; ?>>Associate Prof. 4</option>
                                                <option value="Associate Prof. 5" <?= ($profRank == "Associate Prof. 5") ? "selected" : ""; ?>>Associate Prof. 5</option>
                                                <option value="Associate Prof. 6" <?= ($profRank == "Associate Prof. 6") ? "selected" : ""; ?>>Associate Prof. 6</option>
                                                <option value="Associate Prof. 7" <?= ($profRank == "Associate Prof. 7") ? "selected" : ""; ?>>Associate Prof. 7</option>
                                                <option value="Professor 1" <?= ($profRank == "Professor 1") ? "selected" : ""; ?>>Professor 1</option>
                                                <option value="Professor 2" <?= ($profRank == "Professor 2") ? "selected" : ""; ?>>Professor 2</option>
                                                <option value="Professor 3" <?= ($profRank == "Professor 3") ? "selected" : ""; ?>>Professor 3</option>
                                                <option value="Professor 4" <?= ($profRank == "Professor 4") ? "selected" : ""; ?>>Professor 4</option>
                                                <option value="Professor 5" <?= ($profRank == "Professor 5") ? "selected" : ""; ?>>Professor 5</option>
                                                <option value="Professor 6" <?= ($profRank == "Professor 6") ? "selected" : ""; ?>>Professor 6</option>
                                                <option value="Professor 7" <?= ($profRank == "Professor 7") ? "selected" : ""; ?>>Professor 7</option>
                                                <option value="Professor 8" <?= ($profRank == "Professor 8") ? "selected" : ""; ?>>Professor 8</option>
                                                <option value="Professor 9" <?= ($profRank == "Professor 9") ? "selected" : ""; ?>>Professor 9</option>
                                                <option value="Professor 10" <?= ($profRank == "Professor 10") ? "selected" : ""; ?>>Professor 10</option>
                                                <option value="Professor 11" <?= ($profRank == "Professor 11") ? "selected" : ""; ?>>Professor 11</option>
                                                <option value="Professor 12" <?= ($profRank == "Professor 12") ? "selected" : ""; ?>>Professor 12</option>
                                                <option value="Univ. Professor" <?= ($profRank == "Univ. Professor") ? "selected" : ""; ?>>Univ. Professor</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Maximum Units</label>
                                            <input type="number" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Employment Status</label>
                                            <select class="form-control" required name="Status">
                                                <option value="" disabled selected>Select Status</option>
                                                <option value="active">Active</option>
                                                <option value="inactive">Inactive</option>
                                            </select>
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
                    <div id="statusProf" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form>
                                    <div class="modal-header">
                                        <h5 class="modal-title">Change Employment Status</h5>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
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
</body>

</html>