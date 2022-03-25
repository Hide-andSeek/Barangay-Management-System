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
    <link rel="stylesheet" href="../css/accounting.css">
    <link rel="stylesheet" href="../announcement_css/custom.css">
    <script src="../resident-js/sweetalert.min.js"></script>

    <!--Font Styles-->
    <link rel="icon" type="image/png" href="../img/Brgy-Commonwealth.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&display=swap" rel="stylesheet">

    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
       .employee-label{margin-bottom: 10px; margin-top: 5px;}
       .hoverback:hover {background: orange; border-radius: 70%;}
    </style>

    <title> View Details: Accounting Dept. </title>

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
                <a class="side_bar nav-button nav-active" href="accounting_attendance_list.php">
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
                    <h5>Attendance List >> View Details
                        <a href="#" class="circle">
                            <img src="../img/dt.png">
                        </a>
                    </h5>
                </div>
            </div>
        </section>

        <div id="content" class="container col-md-12" >
            <?php
            if (isset($_GET['id'])) {
                $ID = $_GET['id'];
            } else {
                $ID = "";
            }

            // create array variable to store data from database
            $data = array();

            // get all data from menu table and category table
            $sql_query = "SELECT  user_id, username, user_type, department, status
                            FROM usersdb
                            WHERE user_id = ? ";

            $stmt = $connect->stmt_init();
            if ($stmt->prepare($sql_query)) {
                // Bind your variables to replace the ?s
                $stmt->bind_param('s', $ID);
                // Execute query
                $stmt->execute();
                // store result 
                $stmt->store_result();
                $stmt->bind_result(
                    $data['user_id'],
                    $data['username'],
                    $data['user_type'],
                    $data['department'],
                    $data['status'],
                );
                $stmt->fetch();
                $stmt->close();
            }

            $sql_query = "SELECT time_loged
                            FROM users_activity
                            WHERE user_id = ? ORDER BY activity_id ASC";

            $stmt = $connect->stmt_init();
            if ($stmt->prepare($sql_query)) {
                // Bind your variables to replace the ?s
                $stmt->bind_param('s', $ID);
                // Execute query
                $stmt->execute();
                // store result 
                $stmt->store_result();
                $stmt->bind_result(
                    $data['time_loged']
                );
                $stmt->fetch();
                $stmt->close();
            }
           

            $sql_query = "SELECT  time_out
                            FROM user_activityout
                            WHERE user_id = ? ORDER BY outactivity_id DESC";

            $stmt = $connect->stmt_init();
            if ($stmt->prepare($sql_query)) {
                // Bind your variables to replace the ?s
                $stmt->bind_param('s', $ID);
                // Execute query
                $stmt->execute();
                // store result 
                $stmt->store_result();
                $stmt->bind_result(
                    $data['time_out']
                );
                $stmt->fetch();
                $stmt->close();
            }


            if (isset($_POST['savebtnworkinghrs'])) {

                $user_status    = $_POST['user_status'];
                $user_id = $_POST['user_id'];

                $sql = "UPDATE usersdb SET user_status = 'Done' WHERE user_id = $user_id";

                if (mysqli_query($connect, $sql)) {
                } else {
                    echo "Error updating record: " . mysqli_error($connect);
                }
            }

            if (isset($_POST['savebtnworkinghrs'])) {

                $timelog_status    = $_POST['timelog_status'];
                $user_id = $_POST['user_id'];

                $sql = "UPDATE users_activity SET timelog_status = 'Done' WHERE user_id = $user_id";

                if (mysqli_query($connect, $sql)) {
                } else {
                    echo "Error updating record: " . mysqli_error($connect);
                }
            }

            if (isset($_POST['savebtnworkinghrs'])) {

                $timeout_status  = $_POST['timeout_status'];
                $user_id = $_POST['user_id'];

                $sql = "UPDATE user_activityout SET timeout_status = 'Done' WHERE user_id = $user_id";

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
                <div style="float: right; display: inline-block; margin-right: 50px;">
                    <a href="accounting_attendance_list.php">
                        <img src="../img/back.png" title="Back?" class="hoverback" style="width: 50px; height: 50; cursor: pointer;" alt="Back?">
                    </a>

                </div>

                <br>
            <form method="POST" action="">
                    <div id="London" class="w3-container city" style="margin-top: 50px; margin-left: 50px; margin-right: 50px;">
                        <hr>
                        <h5 style="text-align: center;">Add Working Hours</h5>
                        <hr>
                        <br>
                        <div class="row align-items-start">
                            <div class="information col">
                                <label class="employee-label">Employee ID:</label>
                                <input required class="form-control inputtext widthinp" type="text" name="user_id" value="<?php echo $data['user_id']; ?>" readonly>
                            </div>

                            <div class="information col">
                                <label class="employee-label">Name:</label>
                                <input required class="form-control inputtext widthinp" type="text" value="<?php echo $data['username']; ?>" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" style="text-transform: uppercase;" name="employee_name" readonly>
                            </div>

                        </div>
                        <div class="row align-items-start">
                            <div class="information col">
                                <label class="employee-label"> User Type </label>
                                <input required class="form-control inputtext widthinp" type="text" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" value="<?php echo $data['user_type']; ?>" name="user_type" readonly>
                            </div>

                            <div class="information col">
                                <label class="employee-label"> Department </label>
                                <input required class="form-control inputtext widthinp" type="text" placeholder="Address" value="<?php echo $data['department']; ?>" name="department" readonly>
                            </div>
                        </div>

                        <div class="row align-items-start">
                            <div class="information col">
                                <label class="employee-label"> Time In </label>
                                <input required class="form-control inputtext widthinp" type="text" value="<?php echo $data['time_loged']; ?>" name="time_in" placeholder="Time in" readonly>
                            </div>

                            <div class="information col">
                                <label class="employee-label"> Time Out </label>
                                <input required class="form-control inputtext widthinp" type="text" placeholder="Time out" name="time_out" value="<?php echo $data['time_out']; ?>" readonly>
                            </div>
                        </div>

                        <div class="row align-items-start">
                            <div class="information col">
                                <label class="employee-label"> Facilitated by: </label>
                                <input class="form-control inputtext widthinp" type="text" placeholder="Facilated By" name="facilitated_by" value="<?php echo $user; ?>" readonly>
                            </div>

                            <div class="information col">
                                <label class="employee-label"> Date: </label>
                                <input class="form-control inputtext widthinp " type="text" placeholder="Added On" name="date_logged" value="Null" readonly>
                            </div>
                        </div>

                        
                    </div>
            </div>



            <div  style="margin-left: 50px; margin-right: 50px;">
                <table id="viewdetails" style="margin-bottom: 30px; margin-top: 30px; ">
                <?php
                    if (isset($_GET['id'])) {
                        $ID = $_GET['id'];
                    } else {
                        $ID = "";
                    }

                           $query = $db->query("SELECT * FROM usersdb inner join users_activity on  users_activity.user_id=usersdb.user_id inner join user_activityout on user_activityout.user_id=usersdb.user_id where usersdb.user_id= '$ID' AND timelog_status = 'Pending' AND timeout_status = 'Pending' ORDER BY usersdb.user_id DESC");
                ?>
               
                    <thead>
                        <tr class="t_head">
                            <th width="5%">Date Logged</th>
                            <th width="5%">Name</th>
                            <th width="5%">User type</th>
                            <th width="5%">Department</th>
                            <th width="5%">Time Logged</th>
                            <th width="5%">Time Out</th>
                            <th width="5%">Status</th>
                        </tr>
                    </thead>
                    <?php
                           while($row = $query->fetch())
                           {
                               $user_id = $row['user_id'];
                               $username = $row['username'];
                               $user_fname = $row['user_fname'];
                               $user_mname = $row['user_mname'];
                               $user_lname = $row['user_lname'];
                               $user_type = $row['user_type'];
                               $department = $row['department'];
                               $status = $row['status'];
                               $time_out = $row['time_out'];
                               $time_loged = $row['time_loged'];	
                           

                    ?>
                    <tbody>
                        <tr class="table-row">
                            <td><?php echo $row['time_loged']; ?></td>
							<td><?php echo $row['username']; ?></td>
							<td><?php echo $row['user_type']; ?></td>
							<td><?php echo $row['department']; ?></td>
							<td><?php echo $row['time_loged']; ?></td>
							<td><?php echo $row['time_out']; ?></td>
							<td><?php echo $row['status']; ?></td>
                        </tr>
                    </tbody>
                    <?php
                           }
                    ?>
                </table>

            </div>
        
                <input type="hidden" name="user_id" id="user_id" value="<?php echo $data['user_id']; ?>">
                <input type="hidden" name="status" id="status" value="Done" readonly>
                <input type="hidden" name="timelog_status" id="timelog_status" value="Done" readonly>
                <input type="hidden" name="timeout_status" id="timeout_status" value="Done" readonly>

                <div class="information col" style="margin-left: 50px; margin-right: 50px;">
                    <label class="employee-label"> Working Hours </label>
                    <input type="number" class="form-control inputtext" name="working_hours" id="working_hours" placeholder="Please do specify Working Hours" onKeyPress="if(this.value.length==2) return false;">
                    <br>
                    <a><button class=" font-sizee form-control btnmargin button" name="savebtnworkinghrs" id="savebtnworkinghrs"><span>Save </span></button></a>
                </div>
                <br>
                
            </form>
                <!-- <a href="accounting_attendance_list.php"><button class="btn btn-danger font-sizee form-control btnmargin">Cancel</button></a> -->
        </div>

        </div>

        <div class="separator"> </div>
        </div>
        <br>
        <br>
    </section>
    </body>

</html>