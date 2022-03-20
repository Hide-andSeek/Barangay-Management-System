<?php
session_start();

include "../db/conn.php";
include "../db/documents.php";
include('../announcement_includes/functions.php');
include "../db/viewdetinsert.php";
include('../send_email.php');
include("../db/accounting.php");

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
$dept = '';

if (isset($_SESSION['type'])) {
    $dept = $_SESSION['type'];
}
?>


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

    <!--Font Styles-->
    <link rel="icon" type="image/png" href="../img/Brgy-Commonwealth.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&display=swap" rel="stylesheet">

    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        .employee-label {
            margin-bottom: 10px;
            margin-top: 5px;
        }
    </style>
    <title> View Details Salary: Accounting Dept. </title>

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
                <a class="side_bar nav-button nav-active" href="accounting_salary.php">
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
				<a class="side_bar nav-button" href="accounting_payroll.php">
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
                    <h5>Employee Salary >> View Details
                        <a href="#" class="circle">
                            <img src="../img/dt.png">
                        </a>
                    </h5>
                </div>
            </div>
        </section>

        <div id="content" class="container col-md-12">
            <?php
            if (isset($_GET['id'])) {
                $ID = $_GET['id'];
            } else {
                $ID = "";
            }

            // create array variable to store data from database
            $data = array();

            // get all data from menu table and category table
            $sql_query = "SELECT  workinghrs_id, user_id, employee_name, user_type, department, time_in, time_out, facilitated_by, date_logged, working_hours, date_added, time_added, status
                            FROM working_hours
                            WHERE workinghrs_id = ? ";

            $stmt = $connect->stmt_init();
            if ($stmt->prepare($sql_query)) {
                // Bind your variables to replace the ?s
                $stmt->bind_param('s', $ID);
                // Execute query
                $stmt->execute();
                // store result 
                $stmt->store_result();
                $stmt->bind_result(
                    $data['workinghrs_id'],
                    $data['user_id'],
                    $data['employee_name'],
                    $data['user_type'],
                    $data['department'],
                    $data['time_in'],
                    $data['time_out'],
                    $data['facilitated_by'],
                    $data['date_logged'],
                    $data['working_hours'],
                    $data['date_added'],
                    $data['time_added'],
                    $data['status']
                );
                $stmt->fetch();
                $stmt->close();
            }

            if (isset($_POST['savetopayroll'])) {

                $status  = $_POST['status'];
                $user_id = $_POST['user_id'];

                $sql = "UPDATE  working_hours SET status = 'Done' WHERE user_id = $user_id";

                if (mysqli_query($connect, $sql)) {
                } else {
                    echo "Error updating record: " . mysqli_error($connect);
                }
            }
            ?>

            <div>

                <?php
                if (isset($_SESSION['statusadmincomp'])) {
                    if ($_SESSION['statusadmincomp'] == "ok") {
                ?>

                        <div style="text-align: center;" class="alert alert-info messcompose"><?php echo $_SESSION['resultadmincomp'] ?> <?php echo $data['bemailadd']; ?> <i style="font-size:20px;" class="bx bx-checkbox-checked"></i>
                        </div>
                    <?php
                    } else {
                    ?>
                        <div class="alert alert-danger messcompose"><?php echo $_SESSION['resultadmincomp'] ?></div>
                <?php
                    }
                    unset($_SESSION['resultadmincomp']);
                    unset($_SESSION['statusadmincomp']);
                }
                ?>
                <br>
                <div style="float: right; display: inline-block;">
                    <a href="accounting_salary.php">
                        <img src="../img/back.png" title="Back?" class="hoverback" style="width: 50px; height: 50; cursor: pointer;" alt="Back?">
                    </a>

                </div>

                <br>

                <form method="POST" action="">
                    <div id="London" class="w3-container city" style="margin-top: 50px;">
                        <hr>
                        <h5 style="text-align: center;">Employee Salary: Rate</h5>
                        <hr>
                        <div class="col-md-12">
                            <table id="viewdetails" style="margin-bottom: 30px; margin-top: 30px; text-align: center;">
                                <thead>
                                    <tr class="t_head">
                                        <th width="5%" style="text-align: center; margin: 20px;">Position</th>
                                        <th width="5%" style="text-align: center; margin: 20px;">Regular Employee</th>
                                        <th width="5%" style="text-align: center; margin: 20px;">Contractual Employee</th>
                                        <th width="5%" style="text-align: center; margin: 20px;">Administrator</th>
                                        <th width="5%" style="text-align: center; margin: 20px;">Barangay Official</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="table-row">
                                        <td><strong>Rate</strong></td>
                                        <td>50</td>
                                        <td>50</td>
                                        <td>70</td>
                                        <td>80</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="row align-items-start">
                            <div class="information col">
                                <label class="employee-label">Employee ID:</label>
                                <input required class="form-control inputtext widthinp" type="text" value="<?php echo $data['user_id']; ?>" readonly>
                            </div>

                            <div class="information col">
                                <label class="employee-label">Name:</label>
                                <input required class="form-control inputtext widthinp" type="text" value="<?php echo $data['employee_name']; ?>" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" style="text-transform: uppercase;" name="employee_name" readonly>
                            </div>

                        </div>
                        <div class="row align-items-start">
                            <div class="information col">
                                <label class="employee-label"> Job Position </label>
                                <input required class="form-control inputtext widthinp" type="text" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" value="<?php echo $data['user_type']; ?>" name="job_position" readonly>
                            </div>

                            <div class="information col">
                                <label class="employee-label"> Department </label>
                                <input required class="form-control inputtext widthinp" type="text" placeholder="Address" value="<?php echo $data['department']; ?>" name="department" readonly>
                            </div>
                        </div>

                        <div class="row align-items-start">
                            <div class="information col">
                                <label class="employee-label"> Time In </label>
                                <input class="form-control inputtext widthinp" type="text" value="<?php echo $data['time_in']; ?>"  placeholder="Time in" readonly>
                            </div>

                            <div class="information col">
                                <label class="employee-label"> Time Out </label>
                                <input class="form-control inputtext widthinp" type="text" placeholder="Time out" value="<?php echo $data['time_out']; ?>" readonly>
                            </div>
                        </div>

                        <div class="row align-items-start">
                            <div class="information col">
                                <label class="employee-label"> Facilitated by: </label>
                                <input class="form-control inputtext widthinp" type="text" placeholder="Facilated By" name="facilitated_by" value="<?php echo $user; ?>" readonly>
                            </div>

                            <div class="information col">
                                <label class="employee-label"> Date Added: </label>
                                <input class="form-control inputtext widthinp " type="text" placeholder="Added On" value="<?php echo $data['date_added']; ?> | <?php echo $data['time_added']; ?>" readonly>
                            </div>
                        </div>


                    </div>
            </div>

            <input type="hidden" name="user_id" id="user_id" value="<?php echo $data['user_id']; ?>">
            <input type="hidden" name="status" id="status" value="Done" readonly>

            <br>

            <div class="row align-items-start">
                <div class="information col">
                    <label class="employee-label"> Working Hours </label>

                    <input type="number" style="text-align: center;" class="form-control inputtext widthinp qty" name="working_hours" id="working_hours" placeholder="Please do specify Working Hours" onKeyPress="if(this.value.length==2) return false;" value="<?php echo $data['working_hours']; ?>" readonly>
                </div>

                <div class="information col">
                    <label class="employee-label"> Rate </label>
                    <input type="number" style="text-align: center;" class="form-control inputtext widthinp qty" id="rate" placeholder="Employees Rate" onKeyPress="if(this.value.length==2) return false;">
                </div>

                <div class="information col">
                    <label class="employee-label"> Computation </label>
                    <input type="text" style="text-align: center;" class="form-control inputtext widthinp" name="salary" id="total" placeholder="Please do specify Working Hours" onKeyPress="if(this.value.length==3) return false;" value="0" readonly>
                </div>
            </div>
            <br>
            <div style="text-align: center;">
                <i style="font-size: 12px;">(Working Hours <strong style="color: red">x</strong> Rate = Salary)</i>
            </div>
            <br>
            <a><button class=" font-sizee form-control btnmargin button" name="savetopayroll" id=""><span> Save </span></button></a>
            </form>
        </div>

        </div>

        <div class="separator"> </div>
        </div>
        <br>
        <br>
    </section>
    </body>
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

</html>