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
                                            <th>No.</th>
                                            <th>First Name</th>
                                            <th>Middle Name</th>
                                            <th>Last Name</th>
                                            <th>Mobile No.</th>
                                            <th>Address</th>
                                            <th>Educational Attainment</th>
                                            <th>Expertise/Specialization</th>
                                            <th>Professor's Rank</th>
                                            <th>Units</th>
                                            <th>Employment Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="myTable">
                                        <tr>
                                            <td>1</td>
                                            <td>Rover</td>
                                            <td>Lopez</td>
                                            <td>Hardy</td>
                                            <td>09025844575</td>
                                            <td>89 Chiaroscuro Rd, Portland, USA</td>
                                            <td>College Graduate</td>
                                            <td>Web Developer</td>
                                            <td>Instructor 1</td>
                                            <td>60</td>
                                            <td>Active</td>
                                            <td>
                                                <a href="#editProf" class="edit" data-bs-toggle="modal"><i class="material-icons" data-bs-toggle="tooltip" title="Edit">&#xe254;</i></a>
                                                <a href="#statusProf" class="status" data-bs-toggle="modal"><i class="material-icons" data-bs-toggle="tooltip" title="Status">&#xe909;</i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Thomas</td>
                                            <td>Lopez</td>
                                            <td>Hardy</td>
                                            <td>09025844575</td>
                                            <td>89 Chiaroscuro Rd, Portland, USA</td>
                                            <td>College Graduate</td>
                                            <td>Web Developer</td>
                                            <td>Instructor 1</td>
                                            <td>60</td>
                                            <td>Active</td>
                                            <td>
                                                <a href="#editProf" class="edit" data-bs-toggle="modal"><i class="material-icons" data-bs-toggle="tooltip" title="Edit">&#xe254;</i></a>
                                                <a href="#statusProf" class="status" data-bs-toggle="modal"><i class="material-icons" data-bs-toggle="tooltip" title="Status">&#xe909;</i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Thomas</td>
                                            <td>Lopez</td>
                                            <td>Hardy</td>
                                            <td>09025844575</td>
                                            <td>89 Chiaroscuro Rd, Portland, USA</td>
                                            <td>College Graduate</td>
                                            <td>Web Developer</td>
                                            <td>Instructor 1</td>
                                            <td>60</td>
                                            <td>Active</td>
                                            <td>
                                                <a href="#editProf" class="edit" data-bs-toggle="modal"><i class="material-icons" data-bs-toggle="tooltip" title="Edit">&#xe254;</i></a>
                                                <a href="#statusProf" class="status" data-bs-toggle="modal"><i class="material-icons" data-bs-toggle="tooltip" title="Status">&#xe909;</i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Thomas</td>
                                            <td>Lopez</td>
                                            <td>Hardy</td>
                                            <td>09025844575</td>
                                            <td>89 Chiaroscuro Rd, Portland, USA</td>
                                            <td>College Graduate</td>
                                            <td>Web Developer</td>
                                            <td>Instructor 1</td>
                                            <td>60</td>
                                            <td>Active</td>
                                            <td>
                                                <a href="#editProf" class="edit" data-bs-toggle="modal"><i class="material-icons" data-bs-toggle="tooltip" title="Edit">&#xe254;</i></a>
                                                <a href="#statusProf" class="status" data-bs-toggle="modal"><i class="material-icons" data-bs-toggle="tooltip" title="Status">&#xe909;</i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>Thomas</td>
                                            <td>Lopez</td>
                                            <td>Hardy</td>
                                            <td>09025844575</td>
                                            <td>89 Chiaroscuro Rd, Portland, USA</td>
                                            <td>College Graduate</td>
                                            <td>Web Developer</td>
                                            <td>Instructor 1</td>
                                            <td>60</td>
                                            <td>Active</td>
                                            <td>
                                                <a href="#editProf" class="edit" data-bs-toggle="modal"><i class="material-icons" data-bs-toggle="tooltip" title="Edit">&#xe254;</i></a>
                                                <a href="#statusProf" class="status" data-bs-toggle="modal"><i class="material-icons" data-bs-toggle="tooltip" title="Status">&#xe909;</i></a>
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
                    <div id="addProf" class="modal fade">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <form>
                                    <div class="modal-header">
                                        <h5 class="modal-title">Add New Professor</h5>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col">
                                                    <label>First Name</label>
                                                    <input type="text" class="form-control" required>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Middle Name</label>
                                                        <input type="text" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Last Name</label>
                                                        <input type="text" class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Mobile No.</label>
                                                        <input type="number" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Address</label>
                                                        <input type="text" class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Educational Attainment</label>
                                                        <textarea class="form-control" rows="4" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Expertise/Specialization</label>
                                                        <textarea class="form-control" rows="4" required></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Professor's Rank</label>
                                                        <select class="form-control" required name="ProfRank">
                                                            <option value="" disabled selected>Select Professor's Rank</option>
                                                            <option value="Instructor 1">Instructor 1</option>
                                                            <option value="Instructor 2">Instructor 2</option>
                                                            <option value="Instructor 3">Instructor 3</option>
                                                            <option value="Instructor 4">Instructor 4</option>
                                                            <option value="Instructor 5">Instructor 5</option>
                                                            <option value="Instructor 6">Instructor 6</option>
                                                            <option value="Instructor 7">Instructor 7</option>
                                                            <option value="Assistant Prof. 1">Assistant Prof. 1</option>
                                                            <option value="Assistant Prof. 2">Assistant Prof. 2</option>
                                                            <option value="Assistant Prof. 3">Assistant Prof. 3</option>
                                                            <option value="Assistant Prof. 4">Assistant Prof. 4</option>
                                                            <option value="Assistant Prof. 5">Assistant Prof. 5</option>
                                                            <option value="Assistant Prof. 6">Assistant Prof. 6</option>
                                                            <option value="Assistant Prof. 7">Assistant Prof. 7</option>
                                                            <option value="Professor 1">Professor 1</option>
                                                            <option value="Professor 2">Professor 2</option>
                                                            <option value="Professor 3">Professor 3</option>
                                                            <option value="Professor 4">Professor 4</option>
                                                            <option value="Professor 5">Professor 5</option>
                                                            <option value="Professor 6">Professor 6</option>
                                                            <option value="Professor 7">Professor 7</option>
                                                            <option value="Professor 8">Professor 8</option>
                                                            <option value="Professor 9">Professor 9</option>
                                                            <option value="Professor 10">Professor 10</option>
                                                            <option value="Professor 11">Professor 11</option>
                                                            <option value="Professor 12">Professor 12</option>
                                                            <option value="Univ. Professor">Univ. Professor</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Maximum Units</label>
                                                        <input type="number" class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
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
                    <!-- Edit Modal HTML -->
                    <div id="editProf" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form>
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Professor</h5>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input type="text" class="form-control" required>
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
                                            <select class="form-control" required name="ProfRank">
                                                <option value="" disabled selected>Select Professor's Rank</option>
                                                <option value="Instructor 1">Instructor 1</option>
                                                <option value="Instructor 2">Instructor 2</option>
                                                <option value="Instructor 3">Instructor 3</option>
                                                <option value="Instructor 4">Instructor 4</option>
                                                <option value="Instructor 5">Instructor 5</option>
                                                <option value="Instructor 6">Instructor 6</option>
                                                <option value="Instructor 7">Instructor 7</option>
                                                <option value="Assistant Prof. 1">Assistant Prof. 1</option>
                                                <option value="Assistant Prof. 2">Assistant Prof. 2</option>
                                                <option value="Assistant Prof. 3">Assistant Prof. 3</option>
                                                <option value="Assistant Prof. 4">Assistant Prof. 4</option>
                                                <option value="Assistant Prof. 5">Assistant Prof. 5</option>
                                                <option value="Assistant Prof. 6">Assistant Prof. 6</option>
                                                <option value="Assistant Prof. 7">Assistant Prof. 7</option>
                                                <option value="Professor 1">Professor 1</option>
                                                <option value="Professor 2">Professor 2</option>
                                                <option value="Professor 3">Professor 3</option>
                                                <option value="Professor 4">Professor 4</option>
                                                <option value="Professor 5">Professor 5</option>
                                                <option value="Professor 6">Professor 6</option>
                                                <option value="Professor 7">Professor 7</option>
                                                <option value="Professor 8">Professor 8</option>
                                                <option value="Professor 9">Professor 9</option>
                                                <option value="Professor 10">Professor 10</option>
                                                <option value="Professor 11">Professor 11</option>
                                                <option value="Professor 12">Professor 12</option>
                                                <option value="Univ. Professor">Univ. Professor</option>
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