<?php
include 'subject_all_process.php';
if (isset($_GET['sub_edit'])) {
    $subID = $_GET['sub_edit'];
    $sub_edit_state = true;
    $record = mysqli_query($conn, "SELECT * FROM tb_subjects WHERE subID=$subID");
    $data = mysqli_fetch_array($record);
    $subCode = $data['subCode'];
    $subDesc = $data['subDesc'];
    $subUnits = $data['subUnits'];
    $subLabhours = $data['subLabhours'];
    $subLechours = $data['subLechours'];
    $subStatus = $data['subStatus'];
}

// Function to generate academic year options dynamically
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- sidebar style -->
    <link rel="stylesheet" href="CSS/dashboard.css" />
    <!-- table style -->
    <link rel="stylesheet" href="CSS/content.css" />
    <title>Subject</title>
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
                                        <h2>Manage Subject Entries</h2>
                                    </div>
                                    <div class="col-sm-3">
                                        <input class="form-control" id="tableSearch" type="text" placeholder="Search">
                                    </div>
                                    <div class="col">
                                        <a href="#addSubj" class="btn btn-success" data-bs-toggle="modal"><i class="material-icons">&#xE147;</i><span>Add New Subject</span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Subject Code</th>
                                            <th>Subject Description</th>
                                            <th>Subject Units</th>
                                            <th>Subject Lab Hours</th>
                                            <th>Subject Lec Hours</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="myTable">
                                        <?php
                                        $result = mysqli_query($conn, "SELECT * FROM tb_subjects");
                                        $i = 1;
                                        while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $row["subID"] ?></td>
                                                <td><?php echo $row["subCode"] ?></td>
                                                <td><?php echo $row["subDesc"] ?></td>
                                                <td><?php echo $row["subUnits"] ?></td>
                                                <td><?php echo $row["subLabhours"] ?></td>
                                                <td><?php echo $row["subLechours"] ?></td>

                                                <!-- <?php
                                                        if ($row['secStatus'] == "1") {
                                                            echo "Active";
                                                        } else {
                                                            echo "Inactive";
                                                        } ?> -->
                                                <td>
                                                    <form method="POST" action="subject_all_process.php">
                                                        <a href="" name="sub_edit" class="edit" data-bs-toggle="modal"><i class="material-icons" data-bs-toggle="tooltip" title="Edit">&#xe254;</i></a>
                                                        <input type="hidden" name="subID" value="<?php echo $row['subID']; ?>">
                                                        <a href="#statusSubj" class="status" data-bs-toggle="modal"><i class="material-icons" data-bs-toggle="tooltip" title="Status">&#xe909;</i></a>
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
                    <div id="addSubj" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <form method="POST" action="subject_all_process.php">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Add New Subject</h5>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="plotYear">Academic Year</label>
                                            <select name="plotYear" class="upper-form-control" id="plotYear">
                                                <option value="" disabled selected>Select Academic Year</option>
                                                <!-- Function to generate academic year options -->
                                                <?php echo generateAcademicYears(); ?>
                                            </select>

                                            <label for="plotSem" class="upper-label">Semester</label>
                                            <select name="plotSem" class="upper-form-control" id="plotSem">
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
                                        <div class="form-group">
                                            <label for="numRows">Enter the number of rows:</label>
                                            <input type="number" class="form-control" id="numRows" placeholder="Number of Rows">
                                            <button type="button" class="btn btn-primary" id="createRowsBtn">Create Rows</button>
                                        </div>
                                        <div id="formInputs">
                                            <!-- Initial form inputs -->
                                            <div class="form-row" id="rowTemplate" style="display: none;">
                                                <div class="label-container">
                                                    <label class="row-label"></label>
                                                </div>
                                                <div class="col">
                                                    <label for="subCode[]">Subject Code</label>
                                                    <input type="text" placeholder="Subject Code" name="subCode[]" id="subCode" class="form-control" value="<?php echo $subCode ?>">
                                                    <label for="subLabhours[]">Subject Lab Hours</label>
                                                    <input type="number" placeholder="Subject Lab Hours" name="subLabhours[]" id="subLabhours" class="form-control" value="<?php echo $subLabhours ?>">
                                                    <button type="button" class="btn btn-danger remove-btn" disabled>Remove</button>
                                                </div>
                                                <div class="col">
                                                    <label for="subDesc[]">Subject Description</label>
                                                    <input type="text" placeholder="Subject Description" name="subDesc[]" id="subDesc" class="form-control" value="<?php echo $subDesc ?>">
                                                    <label for="subLechours[]">Subject Lec Hours</label>
                                                    <input type="number" placeholder="Subject Lec Hours" name="subLechours[]" id="subLechours" class="form-control" value="<?php echo $subLechours ?>">
                                                </div>
                                                <div class="col">
                                                    <label for="subUnits[]">Subject Hours</label>
                                                    <input type="number" placeholder="Subject Hours" name="subUnits[]" id="subUnits" class="form-control" value="<?php echo $subUnits ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="button" class="btn" data-bs-dismiss="modal" value="Cancel">
                                        <input type="submit" name="sub_add_new" class="btn" value="Add">

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
                    <!-- Edit Modal HTML -->
                    <div id="editSubj" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <form method="POST" action="subject_all_process.php">
                                    <input type="hidden" name="subID" id="subID" value="<?php echo $subID; ?>">
                                    <input type="hidden" name="subStatus" value="<?php echo $subStatus; ?>">

                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Subject</h5>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Subject Code</label>
                                            <input type="text" name="subCode" id="subCode" class="form-control" required value="<?php echo $subCode ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Subject Description</label>
                                            <input type="text" name="subDesc" id="subDesc" class="form-control" required value="<?php echo $subDesc ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Subject Units</label>
                                            <input type="number" name="subUnits" id="subUnits" class="form-control" required value="<?php echo $subUnits ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Subject Lab Hours</label>
                                            <input type="number" name="subLabhours" id="subLabhours" class="form-control" required value="<?php echo $subLabhours ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Subject Lec Hours</label>
                                            <input type="number" name="subLechours" id="subLechours" class="form-control" required value="<?php echo $subLechours ?>">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="button" class="btn" data-bs-dismiss="modal" value="Cancel">
                                        <input type="submit" name="sub_update" class="btn" value="Update">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Change Status Modal HTML -->
                    <div id="statusSubj" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form>
                                    <div class="modal-header">
                                        <h5 class="modal-title">Change Subject Status</h5>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <h6>Are you sure you want to inactivate this Subject?</h6>
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
                    newRow.find('.remove-btn').prop('disabled', false); // Enable the remove button for the new row
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

            // Prevent modal from closing
            var modal = document.getElementById('addSubj');
            modal.addEventListener('hide.bs.modal', function(event) {
                var confirmClose = confirm("Are you sure you want to close the modal? Any unsaved changes will be lost.");
                if (!confirmClose) {
                    event.preventDefault();
                }
            });

        });
    </script>

    <!-- Saving edit modal -->
    <script>
        $(document).ready(function() {

            // display Edit modal

            $('.edit').on('click', function() {

                $('#editSubj').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.find("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);
                $('#subID').val(data[0]);
                $('#subCode').val(data[1]);
                $('#subDesc').val(data[2]);
                $('#subUnits').val(data[3]);
                $('#subLabhours').val(data[4]);
                $('#subLechours').val(data[5]);
                // $('#secDay').val(data[4]);
                // $('#secNight').val(data[5]);
                $('#secStatus').val(data[6]);

                // if (data[4] == 'Day') {


                // }

            });

        });
    </script>
</body>

</html>