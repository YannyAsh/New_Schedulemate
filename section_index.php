<?php
include 'section_all_process.php';
if (isset($_GET['sec_edit'])) {
    $secID = $_GET['sec_edit'];

    $record = mysqli_query($conn, "SELECT * FROM tb_section WHERE secID=$secID");
    $data = mysqli_fetch_array($record);
    $secProgram = $data['secProgram'];
    $secYearlvl = $data['secYearlvl'];
    $secName = $data['secName'];
    $secSession = $data['secSession'];
    $secStatus = $data['secStatus'];
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
    <title>Section</title>
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
                                        <h2>Manage Section Entries</h2>
                                    </div>
                                    <div class="col-sm-3">
                                        <input class="form-control" id="tableSearch" type="text" placeholder="Search">
                                    </div>
                                    <div class="col">
                                        <a href="#addSection" class="btn btn-success" data-bs-toggle="modal"><i class="material-icons">&#xE147;</i><span>Add New Section</span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th style="display: none;">secID</th>
                                            <th>No.</th>
                                            <th>Section Program</th>
                                            <th>Section Year Level</th>
                                            <th>Section Name</th>
                                            <th>Session</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="myTable">
                                        <?php
                                        $result_active = mysqli_query($conn, "SELECT * FROM tb_section WHERE secStatus = 1");
                                        $result_inactive = mysqli_query($conn, "SELECT * FROM tb_section WHERE secStatus = 0");
                                        $i = 1;

                                        // Display Active Sections
                                        while ($row = mysqli_fetch_array($result_active)) {
                                        ?>
                                            <tr>
                                                <td style="display: none;"><?php echo $row["secID"] ?></td>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $row["secProgram"] ?></td>
                                                <td><?php echo $row["secYearlvl"] ?></td>
                                                <td><?php echo $row["secName"] ?></td>
                                                <td><?php echo $row["secSession"] ?></td>
                                                <td><?php echo "Active"; ?></td>
                                                <td>
                                                    <a href="" name="sec_edit" class="edit" data-bs-toggle="modal"><i class="material-icons" data-bs-toggle="tooltip" title="Edit">&#xe254;</i></a>
                                                    <input type="hidden" name="secID" value="<?php echo $row['secID']; ?>">
                                                    <a href="#statusSection" class="status" data-bs-toggle="modal" data-secid="<?php echo $row['secID']; ?>"><i class="material-icons" data-bs-toggle="tooltip" title="Status">&#xe909;</i></a>
                                                </td>
                                            </tr>
                                        <?php
                                            $i++;
                                        }

                                        // Display Inactive Sections
                                        while ($row = mysqli_fetch_array($result_inactive)) {
                                        ?>
                                            <tr style="color: #999; /* Gray out inactive sections */">
                                                <td style="display: none;"><?php echo $row["secID"] ?></td>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $row["secProgram"] ?></td>
                                                <td><?php echo $row["secYearlvl"] ?></td>
                                                <td><?php echo $row["secName"] ?></td>
                                                <td><?php echo $row["secSession"] ?></td>
                                                <td><?php echo "Inactive"; ?></td>
                                                <td>
                                                    <a href="" name="sec_edit" class="edit" data-bs-toggle="modal"><i class="material-icons" data-bs-toggle="tooltip" title="Edit">&#xe254;</i></a>
                                                    <input type="hidden" name="secID" value="<?php echo $row['secID']; ?>">
                                                    <a href="#statusSection" class="status" data-bs-toggle="modal" data-secid="<?php echo $row['secID']; ?>"><i class="material-icons" data-bs-toggle="tooltip" title="Status">&#xe909;</i></a>
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
                    <div id="addSection" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <form method="POST" action="section_all_process.php">
                                    <input type="hidden" name="secID" value="<?php echo $secID; ?>">
                                    <input type="hidden" name="secStatus" value="1"> <!-- Always set to "1" for active status -->


                                    <div class="modal-header">
                                        <h5 class="modal-title">Add New Section</h5>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label style="font-weight: bold;">Section Program</label>
                                            <input type="text" name="secProgram" class="form-control" required value="<?php echo $secProgram ?>">
                                        </div>
                                        <div class="form-group">
                                            <label style="font-weight: bold;">Section Year Level</label>
                                            <select class="form-control" required name="secYearlvl" value="<?php echo $secYearlvl ?>">
                                                <option value="" disabled>Select Year Level</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label style="font-weight: bold;">Section Name</label>
                                            <input type="text" name="secName" class="form-control" required value="<?php echo $secName ?>">
                                        </div>
                                        <div class="form-group">
                                            <label style="font-weight: bold;">Session</label>
                                            <select class="form-control" required name="secSession">
                                                <option value="" disabled>Select Session</option>
                                                <option id="secDay" value="Day" <?= ($secSession == "Day") ? "selected" : ""; ?>>Day Class</option>
                                                <option id="secNight" value="Night" <?= ($secSession == "Night") ? "selected" : ""; ?>>Night Class</option>
                                            </select>
                                        </div>
                                        <!-- <div class="form-group">
                                            <label style="font-weight: bold;">Status</label>
                                            <select class="form-control" required name="secStatus">
                                                <option value="" disabled selected>Select Status</option>
                                                <option value="active">Active</option>
                                                <option value="inactive">Inactive</option>
                                            </select>
                                        </div> -->
                                    </div>
                                    <div class="modal-footer">
                                        <input type="button" class="btn" data-bs-dismiss="modal" value="Cancel">
                                        <input type="submit" name="sec_add_new" class="btn" value="Add">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Edit Modal HTML -->
                    <div id="editSection" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <form method="POST" action="section_all_process.php">
                                    <input type="hidden" name="secID" id="secID" value="<?php echo $secID; ?>">
                                    <input type="hidden" name="secStatus" value="1"> <!-- Always set to "1" for active status -->


                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Section</h5>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label style="font-weight: bold;">Section Program</label>
                                            <input type="text" name="secProgram" id="secProgram" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label style="font-weight: bold;">Section Year Level</label>
                                            <select class="form-control" id="secYearlvl" required name="secYearlvl">
                                                <option value="" disabled selected>Select Year Level</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label style="font-weight: bold;">Section Name</label>
                                            <input type="text" name="secName" id="secName" class="form-control" required value="<?php echo $secName ?>">
                                        </div>
                                        <div class="form-group">
                                            <label style="font-weight: bold;" for="secSession">Session</label>
                                            <select name="secSession" class="form-control" required>
                                                <option value="" disabled>Select Session</option>
                                                <option id="secDay" value="day" <?= ($secSession == "Day") ? "selected" : ""; ?>>Day Class</option>
                                                <option id="secNight" value="night" <?= ($secSession == "Night") ? "selected" : ""; ?>>Night Class</option>
                                            </select>
                                        </div>
                                        <!-- <div class="form-group">
                                            <label style="font-weight: bold;" for="secStatus">Status</label>
                                            <select name="secStatus" id="secStatus" class="form-control" required>
                                                <option value="" disabled selected>Select Status</option>
                                                <option value="active"  >Active</option>
                                                <option value="inactive">Inactive</option>
                                            </select>
                                        </div> -->
                                    </div>
                                    <div class="modal-footer">
                                        <input type="button" class="btn" data-bs-dismiss="modal" value="Cancel">
                                        <input type="submit" name="sec_update" class="btn" value="Update">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Change Status Modal HTML -->
                    <div id="statusSection" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form method="POST" action="section_all_process.php">
                                    <input type="hidden" name="secID" id="secID" value="<?php echo $secID; ?>">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Change Section Status</h5>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <h6>Are you sure you want to change the Status of this Section?</h6>
                                        <input type="hidden" name="secID" id="status_secID" value="">
                                    </div>
                                    <div class="modal-footer">
                                        <input type="button" class="btn" data-bs-dismiss="modal" value="Cancel">
                                        <input type="submit" class="btn" name="sec_toggle_status" value="Confirm Status">
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

                $('#editSection').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.find("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);
                $('#secID').val(data[1]);
                $('#secProgram').val(data[2]);
                $('#secYearlvl').val(data[3]);
                $('#secName').val(data[4]);
                // $('#secDay').val(data[4]);
                // $('#secNight').val(data[5]);
                $('#secStatus').val(data[6]);
                if (data[5] == 'Day') {


                }
            });
        });
    </script>

    <script>
        //this script is for the secStatus 

        // JavaScript to set secID when opening status modal
        $('.status').on('click', function() {
            var secID = $(this).data('secid');
            $('#status_secID').val(secID); // Set secID to the hidden input field
            $('#statusSection').modal('show');
        });
    </script>

</body>

</html>