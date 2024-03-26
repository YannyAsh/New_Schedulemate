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
    <title>Room</title>
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
                            <a href="professor_index.php" class="submenu-item list-group-item bg-transparent second-text fw-bold">Professors</a>
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
                            <a href="pbs.php" class="submenu-item list-group-item bg-transparent second-text fw-bold">PBS</a>
                        </li>
                        <li>
                            <a href="pbt.php" class="submenu-item list-group-item bg-transparent second-text fw-bold">PBT</a>
                        </li>
                        <li>
                            <a href="pbru.php" class="submenu-item list-group-item bg-transparent second-text fw-bold">PBRU</a>
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
                                            <th>MIS Code</th>
                                            <th>Academic Year</th>
                                            <th>Semester</th>
                                            <th>Program</th>
                                            <th>Subject</th>
                                            <th>Section</th>
                                            <th>Room</th>
                                            <th>Professor</th>
                                            <th>Schedule</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="myTable">
                                        <tr>
                                            <td>1</td>
                                            <td>PC4112</td>
                                            <td>2023-2024</td>
                                            <td>1st Semester</td>
                                            <td>BSIT</td>
                                            <td>System Administration</td>
                                            <td>1 A</td>
                                            <td>ST 101</td>
                                            <td>John Doe</td>
                                            <td>Monday 8:00-9:00</td>
                                            <td>
                                                <a href="#editRoom" class="edit" data-bs-toggle="modal"><i class="material-icons" data-bs-toggle="tooltip" title="Edit">&#xe254;</i></a>
                                                <a href="#statusRoom" class="status" data-bs-toggle="modal"><i class="material-icons" data-bs-toggle="tooltip" title="Status">&#xe909;</i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>PC4112</td>
                                            <td>2023-2024</td>
                                            <td>1st Semester</td>
                                            <td>BSIT</td>
                                            <td>System Administration</td>
                                            <td>1 A</td>
                                            <td>ST 101</td>
                                            <td>John Doe</td>
                                            <td>Monday 8:00-9:00</td>
                                            <td>
                                                <a href="#editRoom" class="edit" data-bs-toggle="modal"><i class="material-icons" data-bs-toggle="tooltip" title="Edit">&#xe254;</i></a>
                                                <a href="#statusRoom" class="status" data-bs-toggle="modal"><i class="material-icons" data-bs-toggle="tooltip" title="Status">&#xe909;</i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>PC4112</td>
                                            <td>2023-2024</td>
                                            <td>1st Semester</td>
                                            <td>BSIT</td>
                                            <td>System Administration</td>
                                            <td>1 A</td>
                                            <td>ST 101</td>
                                            <td>John Doe</td>
                                            <td>Monday 8:00-9:00</td>
                                            <td>
                                                <a href="#editRoom" class="edit" data-bs-toggle="modal"><i class="material-icons" data-bs-toggle="tooltip" title="Edit">&#xe254;</i></a>
                                                <a href="#statusRoom" class="status" data-bs-toggle="modal"><i class="material-icons" data-bs-toggle="tooltip" title="Status">&#xe909;</i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>PC4112</td>
                                            <td>2023-2024</td>
                                            <td>1st Semester</td>
                                            <td>BSIT</td>
                                            <td>System Administration</td>
                                            <td>1 A</td>
                                            <td>ST 101</td>
                                            <td>John Doe</td>
                                            <td>Monday 8:00-9:00</td>
                                            <td>
                                                <a href="#editRoom" class="edit" data-bs-toggle="modal"><i class="material-icons" data-bs-toggle="tooltip" title="Edit">&#xe254;</i></a>
                                                <a href="#statusRoom" class="status" data-bs-toggle="modal"><i class="material-icons" data-bs-toggle="tooltip" title="Status">&#xe909;</i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>PC4112</td>
                                            <td>2023-2024</td>
                                            <td>1st Semester</td>
                                            <td>BSIT</td>
                                            <td>System Administration</td>
                                            <td>1 A</td>
                                            <td>ST 101</td>
                                            <td>John Doe</td>
                                            <td>Monday 8:00-9:00</td>
                                            <td>
                                                <a href="#editRoom" class="edit" data-bs-toggle="modal"><i class="material-icons" data-bs-toggle="tooltip" title="Edit">&#xe254;</i></a>
                                                <a href="#statusRoom" class="status" data-bs-toggle="modal"><i class="material-icons" data-bs-toggle="tooltip" title="Status">&#xe909;</i></a>
                                            </td>
                                        </tr>
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
                    <div id="addSchedule" class="modal fade">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <form>
                                    <div class="modal-header">
                                        <h5 class="modal-title">Add New Schedule</h5>
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
                                                        <option value="" disabled selected>Select Academic Year</option>
                                                        <option value="2022-2023">2022-2023</option>
                                                        <option value="2021-2022">2021-2022</option>
                                                    </select>
                                                </div>
                                                <div class="col">
                                                    <label>Semester</label>
                                                    <select class="form-control" required name="Semester">
                                                        <option value="" disabled selected>Select Semester</option>
                                                        <option value="1st Semester">1st Semester</option>
                                                        <option value="2nd Semester">2nd Semester</option>
                                                    </select>
                                                </div>
                                                <div class="col">
                                                    <label>Program</label>
                                                    <select class="form-control" required name="Program">
                                                        <option value="" disabled selected>Select Program</option>
                                                        <option value="BSIT">BSIT</option>
                                                        <option value="BIT">BIT</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col">
                                                    <label>Subject</label>
                                                    <select class="form-control" required name="Subject">
                                                        <option value="" disabled selected>Select Subject</option>
                                                        <option value="SysAd">SysAd</option>
                                                        <option value="CrossPlat">CrossPlat</option>
                                                    </select>
                                                </div>

                                                <div class="col">
                                                    <label>Section</label>
                                                    <select class="form-control" required name="Section">
                                                        <option value="" disabled selected>Select Section</option>
                                                        <option value="A">A</option>
                                                        <option value="B">B</option>
                                                    </select>
                                                </div>

                                                <div class="col">
                                                    <label>Room</label>
                                                    <select class="form-control" required name="Room">
                                                    <option value="" disabled selected>Select Room</option>
                                                        <option value="ST 101">ST 101</option>
                                                        <option value="ST 102">ST 102</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <label>Professor</label>
                                            <select class="form-control" required name="Professor">
                                            <option value="" disabled selected>Select Professor</option>
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

                                            <label>Status</label>
                                            <select class="form-control" required name="Status">
                                                <option value="" disabled selected>Select Status</option>
                                                <option value="active">Active</option>
                                                <option value="inactive">Inactive</option>
                                            </select>
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
                <!-- Edit Modal HTML -->
                <div id="editSchedule" class="modal fade">
                    <div class="modal-dialog" role="document">
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

                                    <label>Status</label>
                                    <select class="form-control" required name="Status">
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
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
            <div id="statusSchedule" class="modal fade">
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
</body>

</html>