<?php
include 'conn/conn.php';
include 'room_all_process.php';
include 'include/header.php';
$db = new DatabaseHandler();

if (isset($_GET['room_edit'])) {
    $roomID = $_GET['room_edit'];
    $room_edit_state = true;
    $record = mysqli_query($conn, "SELECT * FROM tb_room WHERE roomID=$roomID");
    $data = mysqli_fetch_array($record);
    $roomBuild = $data['roomBuild'];
    $roomFloornum = $data['roomFloornum'];
    $roomNum = $data['roomNum'];
    $roomStatus = $data['roomStatus'];
}
?>
<<<<<<< HEAD
=======

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

    <!-- sweetalert2 js -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                                <li><a class="dropdown-item" href="profile_index.php">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

>>>>>>> d50c17f9aa181a628050f13a07dc80bd50c68851
            <!-- Start of the contents -->
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
                                    <div class="col-sm-7">
                                        <h2>Manage Room Entries</h2>
                                    </div>
                                    <div class="col">
                                        <a href="#addRoom" class="btn btn-success" data-bs-toggle="modal"><i class="material-icons">&#xE147;</i><span>Add New Room</span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="myTable" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Building Name</th>
                                            <th>Floor Number</th>
                                            <th>Room Number</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody >
                                        <?php
                                        $sql = $db->getAllRowsFromTable('tb_room');
                                        $i = 1;
                                        // Display Active Room
                                        foreach ($sql as $row) {
                                        ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $row["roomBuild"] ?></td>
                                                <td><?php echo $row["roomFloornum"] ?></td>
                                                <td><?php echo $row["roomNum"] ?></td>
                                                </td>
                                                <td>
                                                    <a href="" name="room_edit" class="edit"
                                                    data-id = "<?php echo $row["roomID"] ?>"
                                                    data-bs-toggle="modal"><i class="material-icons" data-bs-toggle="tooltip" title="Edit">&#xe254;</i></a>
                                                    <input type="hidden" name="roomID" value="<?php echo $row['roomID']; ?>">
                                                    <a href="#statusRoom" class="status" data-bs-toggle="modal" data-roomid="<?php echo $row['roomID']; ?>"><i class="material-icons" data-bs-toggle="tooltip" title="Status">&#xe909;</i></a>
                                                </td>
                                            </tr>

                                            <?php
                                        $i++;
                                        }
                                        $conditions = ['status=1'];
                                        $sql = $db->getAllRowsFromTableWhere('tb_room',$conditions);
                                        // Display Active Room
                                        foreach ($sql as $row) {
                                        ?>
                                            <tr>
                                                <td class="text-danger"> <?php echo $i; ?></td>
                                                <td class="text-danger"> <?php echo $row["roomBuild"] ?></td>
                                                <td class="text-danger"> <?php echo $row["roomFloornum"] ?></td>
                                                <td class="text-danger"> <?php echo $row["roomNum"] ?></td>
                                                </td>
                                                <td></td>
                                            </tr>
                                        <?php
                                            $i++;
                                        }

                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Add Modal HTML -->
                    <div id="addRoom" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form method="POST" action="php/action_page.php">
                                    <input type="hidden" name="roomID" value="<?php echo $roomID; ?>">
                                    <input type="hidden" name="roomStatus" value="1"> <!-- Always set to "1" for active status -->

                                    <div class="modal-header">
                                        <h5 class="modal-title">Add New Room</h5>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label style="font-weight: bold;">Building Name</label>
                                            <input type="text" name="roomBuild" class="form-control" required value="<?php echo $roomBuild; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label style="font-weight: bold;">Floor Number</label>
                                            <input type="number" name="roomFloornum" class="form-control" required value="<?php echo $roomFloornum; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label style="font-weight: bold;">Room Number</label>
                                            <input type="number" name="roomNum" class="form-control" required value="<?php echo $roomNum; ?>">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="button" class="btn" data-bs-dismiss="modal" value="Cancel">
                                        <input type="submit" name="room_add_new" class="btn" value="Add">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Edit Modal HTML -->
                    <div id="editRoom" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form method="POST" action="room_all_process.php">
                                    <input type="hidden" name="roomID" id="roomID" value="<?php echo $roomID; ?>">
                                    <input type="hidden" name="roomStatus" value="1"> <!-- Always set to "1" for active status -->

                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Room</h5>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label style="font-weight: bold;">Building Name</label>
                                            <input type="text" name="roomBuild" id="roomBuild" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label style="font-weight: bold;">Floor Number</label>
                                            <input type="number" name="roomFloornum" id="roomFloornum" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label style="font-weight: bold;">Room Number</label>
                                            <input type="number" name="roomNum" id="roomNum" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="button" class="btn" data-bs-dismiss="modal" value="Cancel">
                                        <input type="submit" name="room_update" class="btn" value="Save Changes">
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Change Status Modal HTML -->
                    <div id="statusRoom" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form method="POST" action="room_all_process.php">
                                    <input type="hidden" name="roomID" id="roomID" value="<?php echo $roomID; ?>">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Change Room Status</h5>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <h6>Are you sure you want to change the Status of this Room?</h6>.
                                        <input type="hidden" name="roomID" id="status_roomID" value="">
                                    </div>
                                    <div class="modal-footer">
                                        <input type="button" class="btn" data-bs-dismiss="modal" value="Cancel">
                                        <input type="submit" class="btn" name="room_toggle_status" value="Confirm Status">
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

<!-- display edit modal -->
    <script>
        $(document).ready(function() {

            $('.edit').on('click', function() {

                $('#editRoom').modal('show');

                $tr = $(this).closest('tr');
                id = $(this).data('id')
                var data = $tr.find("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);
                $('#roomID').val(id);
                $('#roomBuild').val(data[1]);
                $('#roomFloornum').val(data[2]);
                $('#roomNum').val(data[3]);
                $('#roomStatus').val('Active');
            });

        });
    </script>

    <script>
        //this script is for the secStatus 

        // JavaScript to set secID when opening status modal
        $('.status').on('click', function() {
            var roomID = $(this).data('roomid');
            $('#status_roomID').val(roomID); // Set roomID to the hidden input field
            $('#statusRoom').modal('show');
        });
    </script>
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.dataTables.min.css">
<script src="https://cdn.datatables.net/2.0.5/js/dataTables.min.js"></script>
<script>
    $('#myTable').DataTable();
</script>