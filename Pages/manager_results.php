<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if (!isset($_SESSION["email"]) && isset($_SESSION["root"])) {
    header("location:../index.php");
}
$fname = $_SESSION['fname'];
?>
<?php

include('function.php');

?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <!-- Custom fonts for this template-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="library/jstable.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="library/jstable.css" />

    <script src="library/jstable.min.js" type="text/javascript"></script>
    <script src="library/jstable.min.js" type="text/javascript"></script>
    <link href="../css/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    
    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
            var actions = $("table td:last-child").html();
            // Append table with add row form on add new button click
            $(".add-new").click(function () {
                $(this).attr("disabled", "disabled");
                var index = $("table tbody tr:last-child").index();
                var row = '<tr>' +
                    '<td><input type="text" class="form-control" name="name" id="name"></td>' +
                    '<td><input type="text" class="form-control" name="department" id="department"></td>' +
                    '<td><input type="text" class="form-control" name="phone" id="phone"></td>' +
                    '<td>' + actions + '</td>' +
                    '</tr>';
                $("table").append(row);
                $("table tbody tr").eq(index + 1).find(".add, .edit").toggle();
                $('[data-toggle="tooltip"]').tooltip();
            });
            // Add row on add button click
            $(document).on("click", ".add", function () {
                var empty = false;
                var input = $(this).parents("tr").find('input[type="text"]');
                input.each(function () {
                    if (!$(this).val()) {
                        $(this).addClass("error");
                        empty = true;
                    } else {
                        $(this).removeClass("error");
                    }
                });
                $(this).parents("tr").find(".error").first().focus();
                if (!empty) {
                    input.each(function () {
                        $(this).parent("td").html($(this).val());
                    });
                    $(this).parents("tr").find(".add, .edit").toggle();
                    $(".add-new").removeAttr("disabled");
                }
            });
            // Edit row on edit button click
            $(document).on("click", ".edit", function () {
                $(this).parents("tr").find("td:not(:last-child)").each(function () {
                    $(this).html('<input type="text" class="form-control" value="' + $(this).text() + '">');
                });
                $(this).parents("tr").find(".add, .edit").toggle();
                $(".add-new").attr("disabled", "disabled");
            });
            // Delete row on delete button click
            $(document).on("click", ".delete", function () {
                $(this).parents("tr").remove();
                $(".add-new").removeAttr("disabled");
            });
        });
    </script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="manager.php">
                <img style="width:100px;" src="../images/logo1.png" alt="logo">

            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Heading -->
            <div style="margin-top:10px ;" class="sidebar-heading">
                Tables
            </div>
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="manager.php">
                    <img style="margin-right:5px;" src="../images/png/profile-user.png" alt="">
                    <span>Users</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="manager_results.php">
                    <img style="margin-right:5px;" src="../images/png/checklist.png" alt="">
                    <span>Results</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="manager_matches.php">
                    <img style="margin-right:5px;" src="../images/png/football.png" alt="">
                    <span>Matches</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="manager_news.php">
                    <img style="margin-right:5px;" src="../images/png/news.png" alt="">
                    <span>News</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <img style="margin-right:5px;" src="../images/png/team.png" alt="">
                    <span>Team</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">All Players:</h6>
                        <a class="collapse-item" href="manager_gk.php">GK</a>
                        <a class="collapse-item" href="manager_defender.php">Defenders</a>
                        <a class="collapse-item" href="manager_midfielder.php">Midfielders</a>
                        <a class="collapse-item" href="manager_attacker.php">Attackers</a>
                    </div>
                </div>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="manager_carpooling.php">
                    <img style="margin-right:5px;" src="../images/png/car.png" alt="">
                    <span>Carpooling</span></a>
            </li>



            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                        <span style="font-size:15px;font-weight:700;"
                                class="mr-2 d-none d-lg-inline text-gray-600 small">
                                <?php echo "Welcome ".$fname ?>
                            </span>
                    <div class="topbar-divider d-none d-sm-block "></div>

                    <!-- Nav Item - User Information -->
                    <li style="display:flex;width:100%;" class="nav-item dropdown no-arrow">
                        <a style="margin-left: auto;" class="nav-link dropdown-toggle" href="" id="userDropdown"
                            role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img style="object-fit:cover;border:3px black solid;" class="img-profile rounded-circle"
                                src="../images/userpic.webp">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="../php/signout.php">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Results</h1>
                    </div>

                    <div class="container table-responsive">
                        <span id="success_message"></span>

                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col col-md-6">All Results:</div>
                                    <div class="col col-md-6" align="right">
                                        <button type="button" name="add_data" id="add_data"
                                            class="btn btn-success btn-sm">Add</button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="customer_table" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Email</th>
                                                <th>Gender</th>
                                                <th nowrap >Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php echo fetch_top_five_data($connect); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
</body>

</html>


<div class="modal" id="customer_modal" tabindex="-1">
    <form method="post" id="customer_form">

        <div class="modal-dialog">

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title" id="modal_title">Add Customer</h5>

                    <button type="button" class="btn-close" id="close_modal" data-bs-dismiss="modal"
                        aria-label="Close"></button>

                </div>

                <div class="modal-body">

                    <div class="mb-3">
                        <label class="form-label">First Name</label>
                        <input type="text" name="first_name" id="first_name" class="form-control" />
                        <span class="text-danger" id="first_name_error"></span>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Last Name</label>
                        <input type="text" name="last_name" id="last_name" class="form-control" />
                        <span class="text-danger" id="last_name_error"></span>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="text" name="customer_email" id="customer_email" class="form-control" />
                        <span class="text-danger" id="customer_email_error"></span>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Gender</label>
                        <select name="customer_gender" id="customer_gender" class="form-control">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>

                </div>

                <div class="modal-footer">

                    <input type="hidden" name="customer_id" id="customer_id" />
                    <input type="hidden" name="action" id="action" value="Add" />
                    <button type="button" class="btn btn-primary" id="action_button">Add</button>
                </div>
            </div>
        </div>

</div>

</form>

</div>

<div class="modal-backdrop fade show" id="modal_backdrop" style="display:none;"></div>

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2023</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Bootstrap core JavaScript-->
<script src="../css/vendor/jquery/jquery.min.js"></script>
<script src="../css/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="../css/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../js/sb-admin-2.min.js"></script>
<script>

    var table = new JSTable("#customer_table", {
        serverSide: true,
        deferLoading: <?php echo count_all_data($connect); ?>,
        ajax: "fetch.php"
    });

    function _(element) {
        return document.getElementById(element);
    }

    function open_modal() {
        _('modal_backdrop').style.display = 'block';
        _('customer_modal').style.display = 'block';
        _('customer_modal').classList.add('show');
    }

    function close_modal() {
        _('modal_backdrop').style.display = 'none';
        _('customer_modal').style.display = 'none';
        _('customer_modal').classList.remove('show');
    }

    function reset_data() {
        _('customer_form').reset();
        _('action').value = 'Add';
        _('first_name_error').innerHTML = '';
        _('last_name_error').innerHTML = '';
        _('customer_email_error').innerHTML = '';
        _('modal_title').innerHTML = 'Add Data';
        _('action_button').innerHTML = 'Add';
    }

    _('add_data').onclick = function () {
        open_modal();
        reset_data();
    }

    _('close_modal').onclick = function () {
        close_modal();
    }

    _('action_button').onclick = function () {

        var form_data = new FormData(_('customer_form'));

        _('action_button').disabled = true;

        fetch('action.php', {

            method: "POST",

            body: form_data

        }).then(function (response) {

            return response.json();

        }).then(function (responseData) {

            _('action_button').disabled = false;

            if (responseData.success) {
                _('success_message').innerHTML = responseData.success;

                close_modal();

                table.update();
            }
            else {
                if (responseData.first_name_error) {
                    _('first_name_error').innerHTML = responseData.first_name_error;
                }
                else {
                    _('first_name_error').innerHTML = '';
                }

                if (responseData.last_name_error) {
                    _('last_name_error').innerHTML = responseData.last_name_error;
                }
                else {
                    _('last_name_error').innerHTML = '';
                }

                if (responseData.customer_email_error) {
                    _('customer_email_error').innerHTML = responseData.customer_email_error;
                }
                else {
                    _('customer_email_error').innerHTML = '';
                }
            }

        });

    }

    function fetch_data(id) {
        var form_data = new FormData();

        form_data.append('id', id);

        form_data.append('action', 'fetch');

        fetch('action.php', {

            method: "POST",

            body: form_data

        }).then(function (response) {

            return response.json();

        }).then(function (responseData) {

            _('first_name').value = responseData.first_name;

            _('last_name').value = responseData.last_name;

            _('customer_email').value = responseData.customer_email;

            _('customer_gender').value = responseData.customer_gender;

            _('customer_id').value = id;

            _('action').value = 'Update';

            _('modal_title').innerHTML = 'Edit Data';

            _('action_button').innerHTML = 'Edit';

            open_modal();

        });
    }

    function delete_data(id) {
        if (confirm("Are you sure you want to remove it?")) {
            var form_data = new FormData();

            form_data.append('id', id);

            form_data.append('action', 'delete');

            fetch('action.php', {

                method: "POST",

                body: form_data

            }).then(function (response) {

                return response.json();

            }).then(function (responseData) {

                _('success_message').innerHTML = responseData.success;

                table.update();

            });
        }
    }

</script>

</body>

</html>