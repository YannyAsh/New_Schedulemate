<?php
include 'admin_approval.php';
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
                <!-- Conditional links based on user position -->
                <?php if ($_SESSION["userPosition"] === 'admin') { ?>
                    <a href="admin_dashboard.php" class="list-group-item list-group-item bg-transparent second-text fw-bold"><i class="fas fa-user-shield me-2"></i>Admin Dashboard</a>
                <?php } elseif ($_SESSION["userPosition"] === 'dean') { ?>
                    <a href="dean_dashboard.php" class="list-group-item list-group-item bg-transparent second-text fw-bold"><i class="fas fa-user-graduate me-2"></i>Dean Dashboard</a>
                <?php } ?>

                <!-- schedule -->
                <a href="schedule_index.php" class="list-group-item list-group-item bg-transparent second-text fw-bold"><i class="fas fa-regular fa-calendar-plus me-2"></i>Schedule</a>

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
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left fs-4 me-3" id="menu-toggle"></i>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i>John Doe
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><a class="dropdown-item" href="#">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid px-4">
                <div class="row g-3 my-2 box">
                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">#</h3>
                                <p class="fs-5">Professors</p>
                            </div>
                            <i class="fas fa-chalkboard-user fs-1 primary-text p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">#</h3>
                                <p class="fs-5">Subjects</p>
                            </div>
                            <i class="fas fa-book fs-1 primary-text p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">#</h3>
                                <p class="fs-5">Rooms</p>
                            </div>
                            <i class="fas fa-school fs-1 primary-text p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">#</h3>
                                <p class="fs-5">Schedules</p>
                            </div>
                            <i class="fas fa-calendar fs-1 primary-text p-3"></i>
                        </div>
                    </div>
                </div>

                <div class="container-fluid px-4">
                    <div class="row g-3 my-2">
                        <div class="container">

                            <!-- this is for the alerts -->
                            <?php if (isset($_SESSION['message'])) : ?>
                                <script>
                                    Swal.fire({
                                        icon: 'success',
                                        title: '<?php echo $_SESSION['message']; ?>',
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                                </script>
                            <?php unset($_SESSION['message']);
                            endif; ?>

                            <?php if (isset($_SESSION['error'])) : ?>
                                <script>
                                    Swal.fire({
                                        icon: 'error',
                                        title: '<?php echo $_SESSION['error']; ?>',
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                                </script>
                            <?php unset($_SESSION['error']);
                            endif; ?>

                            <div class="table-wrapper">
                                <div class="table-title">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h2>Pending Approvals</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Employee ID</th>
                                                <th>Name</th>
                                                <th>Program</th>
                                                <th>Position</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                           $query = "SELECT * FROM tb_register WHERE userApproval = 'pending' AND userPosition = 'chairperson' ORDER BY userID ASC";
                                            $result = mysqli_query($conn, $query); // Corrected variable name from $result to $query
                                            while ($row = mysqli_fetch_array($result)) {
                                            ?>

                                                <tr>
                                                    <td><?php echo $row['userEmployID']; ?></td>
                                                    <td><?php echo $row['userFname'] . ' ' . $row['userMname'] . ' ' . $row['userLname']; ?></td>
                                                    <td><?php echo $row['userProgram']; ?></td>
                                                    <td><?php echo $row['userPosition']; ?></td>
                                                    <td>
                                                        <form method="POST" action="admin_approval.php">
                                                            <input type="hidden" name="userID" value="<?php echo $row['userID']; ?>">
                                                            <input type="hidden" name="userPosition" value="<?php echo $row['userPosition']; ?>">
                                                            <button type="submit" name="approve" class="approve" value="Approve" data-bs-toggle="modal">
                                                                <i class="material-icons" data-bs-toggle="tooltip" title="Edit">&#xe86c;</i>
                                                            </button>
                                                            <button type="submit" name="deny" class="disapprove" value="Deny" data-bs-toggle="modal">
                                                                <i class="material-icons" data-bs-toggle="tooltip" title="Status">&#xe5c9;</i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php
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
</body>

</html>