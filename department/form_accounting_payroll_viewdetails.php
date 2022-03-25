<?php
session_start();

include "../db/conn.php";
include "../db/documents.php";
include('../announcement_includes/functions.php');
include "../db/viewdetinsert.php";
include('../send_email.php');
include("../db/accounting.php");
include("../timezone.php");
include("../db/accounting_computation.php");

if (!isset($_SESSION["type"])) {
    header("location: 0index.php");
}
?>

<?php
$user = '';

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
}
?>
<?php
$emailaddress = '';

if (isset($_SESSION['emails'])) {
    $emailaddress = $_SESSION['emails'];
}
?>
<?php
$dept = '';

if (isset($_SESSION['type'])) {
    $dept = $_SESSION['type'];
}
?>

<?php $random_num = '';
$random_num = rand(10000000, 999999); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!--<title> Responsive Sidebar Menu  | CodingLab </title>-->
    <link rel="stylesheet" href="../css/styles.css">

    <link rel="stylesheet" href="../css/admincompviewdet.css">
    <link rel="stylesheet" href="../announcement_css/custom.css">
    <link rel="stylesheet" href="../css/accounting.css">
    <script src="../resident-js/sweetalert.min.js"></script>
    <link rel="stylesheet" href="../css/documentprint.css">

    <!--Font Styles-->
    <link rel="icon" type="image/png" href="../img/Brgy-Commonwealth.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&display=swap" rel="stylesheet">

    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Payroll: Accounting Dept. </title>

    <style>
        .modal {
            display: none;
            position: absolute;
            z-index: 9999;
            padding-top: 50px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;

            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.6);
        }

        /* Modal Content (image) */
        .modal-content {
            display: absolute;
            margin: auto;
            max-width: 700px;
            width: 50%;
            height: 45%;


        }

        span.topright {
            text-align: right;
            padding: 8px 24px;
            font-size: 25px;
        }

        .topright:hover {
            color: red;
            cursor: pointer;
            float: right;
            padding: 8px 24px;
        }

        .totalfunds {
            color: green;
            cursor: pointer
        }

        .totalfunds:hover {
            color: orange
        }

        /* .viewdetails tbody tr:last-of-type {
            border-bottom: 2px solid #c4c4c4;
        } */
        td {
            margin-bottom: 15px;
        }

        @media print {
            * {
                margin: 0;
                padding: 0;
                font-size: 25px;
                width: 100%;
            }

            div.generatebtn,
            div.instruc,
            span.topright {
                visibility: hidden;
            }

            div.sidebar,
            ul.nav-list,
            div.logo-details {
                visibility: hidden;
            }

            .modal-content {
                border: none;
            }

            td {
                width: auto;
            }

        }
        

        a.print_payroll:link,
        a.print_payroll:visited {
            background-color: white;
            color: black;
            border: 2px solid green;
            padding: 10px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
        }

        a.print_payroll:hover,
        a.print_payroll:active {
            background-color: green;
            color: white;
        }

        button.view_approvebtn{width: 100px;}
    </style>
</head>

<body>
    <!-- Side Navigation Bar-->
    <div class="sidebar">
        <div class="logo-details">
            <img class="brgy_icon" src="../img/Brgy-Commonwealth.png" alt="" />
            <div class="logo_name">Accounting Department</div>
            <i class='bx bx-menu menu' id="btn"></i>
        </div>
        <ul class="nav-list">
            <li>
                <a class="side_bar nav-button" href="accounting_dashboard.php">
                    <i class='bx bx-category-alt dash'></i>
                    <span class="links_name">Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
            </li>

            <li>
                <a class="side_bar nav-button" href="accounting_attendance_list.php">
                    <i class='bx bx-calendar-check ongoing'></i>
                    <span class="links_name">Attendance List</span>
                </a>
                <span class="tooltip">Attendance List</span>
            </li>


            <li>
                <a class="side_bar nav-button" href="accounting_salary.php">
                    <i class='fa fa-users salary'></i>
                    <span class="links_name">Employee Salary</span>
                </a>
                <span class="tooltip">Employee Salary</span>
            </li>

            <li>
                <a class="side_bar nav-button" href="accounting_funds.php">
                    <i class='bx bx-coin-stack budget'></i>
                    <span class="links_name">Storage Funds</span>
                </a>
                <span class="tooltip">Storage Funds</span>
            </li>

            <li>
                <a class="side_bar nav-button nav-active
                " href="accounting_payroll.php">
                    <i class='fa fa-money payroll'></i>
                    <span class="links_name">Payroll</span>
                </a>
                <span class="tooltip">Payroll</span>
            </li>

            <li class="profile">
                <div class="profile-details">
                    <div class="name_job">
                        <div class="job"><strong><?php echo $user; ?></strong></div>
                        <div class="job" id=""><?php echo $dept; ?> | Online</div>
                    </div>
                </div>
                <a href="emplogout.php">
                    <i class='bx bx-log-out d_log_out' id="log_out"></i>
                </a>
            </li>
        </ul>
    </div>
    <!-- Middle Section -->
    <section class="home-section">
        <!-- Top Section -->
        <section class="top-section">
            <div class="top-content">
                <div>
                    <h5>Payroll > View Details
                        <a href="#" class="circle">
                            <img src="../img/dt.png">
                        </a>
                    </h5>
                </div>
            </div>
        </section>
        <br>
        <div style="float: right; display: inline-block; margin-right: 50px;">
            <a href="accounting_payroll.php">
                <img src="../img/back.png" title="Back?" class="hoverback" style="width: 50px; height: 50; cursor: pointer;" alt="Back?">
            </a>

        </div>
        <div id="content" class="container col-md-12">
            <div>
                <div id="London" class="w3-container city" style="margin-top: 50px; margin-left: 50px; margin-right: 50px;">
                    <hr>
                    <h5 style="text-align: center;">Details</h5>
                    <hr>

                    <!-- Search -->
                    <div class="search_content">
                        <label>
                            Search:
                            <input class="r_search" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for Dates" title="Type in a name">

                        </label>
                    </div>
                    <div class="col-md-12">
                        <table id="viewdetails" style="margin-bottom: 30px; margin-top: 30px;">

                            <thead>
                                <tr>
                                    <th width="8%" style="text-align:center;">Employee ID</th>
                                    <th width="15%" style="text-align:center;">Name</th>
                                    <th width="15%" style="text-align:center;">Job Position</th>
                                    <th width="15%" style="text-align:center;">Working Hours</th>
                                    <th width="15%" style="text-align:center;">Salary</th>
                                    <th width="15%" style="text-align:center;">Date Added</th>
                                    <th width="15%" style="text-align:center;">Time Added</th>
                                    <th width="15%" style="text-align:center;">Facilitated by</th>

                                </tr>
                            </thead>
                            <?php
                            if (isset($_GET['id'])) {
                                $ID = $_GET['id'];
                            } else {
                                $ID = "";
                            }

                            // create array variable to store data from database
                            $data = array();

                            $total_salary = '';
                            $total_hours = '';
                            $workingdays = '';

                            $result = mysqli_query($connect, "SELECT SUM(salary) AS salary FROM payroll WHERE user_id = $ID");

                            while ($row = mysqli_fetch_array($result)) {
                                $total_salary = $row['salary'];
                            }

                            $result = mysqli_query($connect, "SELECT SUM(working_days) AS working_days FROM payroll WHERE user_id = $ID");

                            while ($row = mysqli_fetch_array($result)) {
                                $workingdays = $row['working_days'];
                            }

                            $result = mysqli_query($connect, "SELECT SUM(working_hours) AS working_hours FROM payroll WHERE user_id = $ID");

                            while ($row = mysqli_fetch_array($result)) {
                                $total_hours = $row['working_hours'];
                            }

                            $payroll = '';

                            $stmt = $db->prepare("SELECT * FROM payroll WHERE user_id = $ID ORDER BY user_id DESC");
                            $stmt->execute();
                            $imagelist = $stmt->fetchAll();
                            if (count($imagelist) > 0) {
                                foreach ($imagelist as $data) {
                            ?>
                                    <tbody>
                                        <tr>
                                            <td style="text-align:center;"><?php echo $data['user_id']; ?></td>
                                            <td style="text-align:center;"><?php echo $data['employee_name']; ?></td>
                                            <td style="text-align:center;"><?php echo $data['job_position'] ?></td>

                                            <td style="text-align:center;"><?php echo $data['working_hours']; ?></td>
                                            <td style="text-align:center;"><?php echo $data['salary']; ?></td>
                                            <td style="text-align:center;"><?php echo $data['date_added']; ?></td>
                                            <td style="text-align:center;"><?php echo $data['time_added']; ?></td>
                                            <td style="text-align:center;"><?php echo $data['facilitated_by']; ?></td>

                                        </tr>
                                    </tbody>
                            <?php
                                }
                            } else {
                                $payroll = "<div class='errormessage' style='text-align: center; font-size: 14px;'>
                                            <i class='bx bx-error'></i>
                                            No data shown!
                                    </div>";
                            }
                            ?>

                        </table>
                        <?php echo $payroll; ?>

                        <!-- <div style="display: block;float: right; margin-right: 25px;">
                            <p>Hours: <strong><?php echo $total_hours; ?> hrs</strong></p>
                            <p>Salary: <strong>₱<?php echo $total_salary; ?></strong></p>

                        </div> -->
                        <div style="margin-top: -10px">
                            <button class="view_approvebtn" onclick="document.getElementById('id01').style.display='block'"> View</button>
                        </div>
                        <br>
                        <br>
                        <!--Modal form for Login-->
                        <div id="formatValidatorName">
                            <div id="id01" class="modal">
                                <div class="modal-content animate">
                                    <span onclick="document.getElementById('id01').style.display='none'" class="topright">&times;</span>



                                    <div class="col-md-12">
                                        <div style="text-align: center;">
                                            <h5>Payslip</h5>
                                        </div>
                                        <br>
                                        <br>
                                        <table class="viewdetails" style="margin-left: 50px; margin-right: 50px">
                                            <thead>
                                                <tr>
                                                    <td width="15%">Date Joined</td>
                                                    <td width="15%"><strong><?php echo $data['date_added']; ?></strong></td>
                                                    <td width="15%">Name</th>
                                                    <td width="15%"><strong><?php echo $data['employee_name']; ?></strong></td>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Pay Period</td>
                                                    <td>
                                                        <select class="form-control form-text auto-save" style=" border:none;font-weight: 800; padding-left: -10px" name="indigencyid_type" id="indigencyid_type">
                                                            <option>--Select--</option>
                                                            <option>January 2022</option>
                                                            <option>February 2022</option>
                                                            <option>March 2022</option>
                                                            <option>April 2022</option>
                                                            <option>May 2022</option>
                                                            <option>June 2022</option>
                                                            <option>July 2022</option>
                                                            <option>August 2022</option>
                                                            <option>September 2022</option>
                                                            <option>October 2022</option>
                                                            <option>November 2022</option>
                                                            <option>December 2022</option>
                                                        </select>

                                                    </td>
                                                    <td>Job Position</td>
                                                    <td><strong><?php echo $data['job_position']; ?></strong></td>

                                                </tr>
                                                <tr>
                                                    <td width="15%">Worked Days</th>
                                                    <td width="15%"><strong><?php echo $workingdays ?> days </strong></td>
                                                    <td>Department</td>
                                                    <td><strong><?php echo $data['department']; ?></strong></td>

                                                </tr>
                                                <tr>
                                                    <td width="15%">Worked hours</th>
                                                    <td width="15%"><strong><?php echo $total_hours; ?> hrs </strong></td>
                                                    <td>Salary</td>
                                                    <td><strong>₱<?php echo $total_salary; ?></strong></td>

                                                </tr>
                                            </tbody>
                                        </table>

                                        <div style="float: right; margin-right: 25px;">
                                            <a href="accounting_print_payroll.php?id=<?php echo $data['user_id']; ?>" class="print_payroll" target="_blank"><i class="bx bx-printer" ></i> Print</a>
                                        </div>

                                    </div>
                                    <br>
                                    <br>
                                </div>
                            </div>

    </section>

</body>

<?php
if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
?>
    <script>
        swal({
            title: "<?php echo $_SESSION['status']; ?>",
            // text: "You can now print the document",
            icon: "<?php echo $_SESSION['status_code']; ?>",
            button: "Ok Done!",
        });
    </script>
<?php
    unset($_SESSION['status']);
}
?>

<?php
if (isset($_SESSION['editstatus']) && $_SESSION['editstatus'] != '') {
?>
    <script>
        swal({
            title: "<?php echo $_SESSION['editstatus']; ?>",
            // text: "You can now print the document",
            icon: "<?php echo $_SESSION['editstatus_code']; ?>",
            button: "Ok Done!",
        });
    </script>
<?php
    unset($_SESSION['editstatus']);
}
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    function calculateTotal() {

        let item = {};

        item.working_employee_rate = ($("#working_hours").val() * $("#rate").val())
        $("#total").val(item.working_employee_rate);

        let total = item.working_employee_rate;


        $("#total_value").text(total);

    }

    $(function() {
        $(".qty").on("change keyup", calculateTotal)
    })
</script>
<script>
    function myFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("viewdetails");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[5];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>
<script>
    document.querySelector("#date_issued").valueAsDate = new Date();
</script>

</html>