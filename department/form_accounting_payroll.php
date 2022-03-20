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

	<title>Payroll: Accounting Dept. </title>

    <style>
        .modal-content{height: 50%;border-radius: 50px;}
        .totalfunds{color: green; cursor: pointer}
        .totalfunds:hover{color: orange}
        
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
					<h5>Payroll
						<a href="#" class="circle">
							<img src="../img/dt.png">
						</a>
					</h5>
				</div>
			</div>
		</section>

        <div id="content" class="container col-md-12">
            <div>
                <div id="London" class="w3-container city" style="margin-top: 50px; margin-left: 50px; margin-right: 50px;">
                    <hr>
                    <h5 style="text-align: center;">Payroll</h5>
                    <hr>
                    <div id="content" class="container col-md-12">
                        <?php
                        // create object of functions class
                        $function = new functions;

                        // create array variable to store data from database
                        $data = array();

                        if (isset($_GET['keyword'])) {
                            // check value of keyword variable
                            $keyword = $function->sanitize($_GET['keyword']);
                            $bind_keyword = "%" . $keyword . "%";
                        } else {
                            $keyword = "";
                            $bind_keyword = $keyword;
                        }

                        if (empty($keyword)) {
                            $sql_query = "SELECT salary_id, employee_name, job_position, department, facilitated_by, working_hours, salary, date_added, time_added
                            FROM payroll
                            ORDER BY salary_id ASC";
                        } else {
                            $sql_query = "SELECT salary_id, employee_name, job_position, department, facilitated_by, working_hours, salary, date_added, time_added
                            FROM payroll
                            WHERE employee_name LIKE ? 
                            ORDER BY salary_id ASC";
                        }


                        $stmt = $connect->stmt_init();
                        if ($stmt->prepare($sql_query)) {
                            // Bind your variables to replace the ?s
                            if (!empty($keyword)) {
                                $stmt->bind_param('s', $bind_keyword);
                            }
                            // Execute query
                            $stmt->execute();
                            // store result 
                            $stmt->store_result();
                            $stmt->bind_result(
                                $data['salary_id'],
                                $data['employee_name'],
                                $data['job_position'],
                                $data['department'],
                                $data['facilitated_by'],
                                $data['working_hours'],
                                $data['salary'],
                                $data['date_added'],
                                $data['time_added']
                            );
                            // get total records
                            $total_records = $stmt->num_rows;
                        }

                        // check page parameter
                        if (isset($_GET['page'])) {
                            $page = $_GET['page'];
                        } else {
                            $page = 1;
                        }

                        // number of data that will be display per page		
                        $offset = 5;

                        //lets calculate the LIMIT for SQL, and save it $from
                        if ($page) {
                            $from     = ($page * $offset) - $offset;
                        } else {
                            //if nothing was given in page request, lets load the first page
                            $from = 0;
                        }

                        if (empty($keyword)) {
                            $sql_query = "SELECT salary_id, employee_name, job_position, department, facilitated_by, working_hours, salary, date_added, time_added
                            FROM payroll
                            ORDER BY salary_id ASC LIMIT ?, ?";
                        } else {
                            $sql_query = "SELECT salary_id, employee_name, job_position, department, facilitated_by, working_hours, salary, date_added, time_added
                            FROM payroll
                            WHERE employee_name LIKE ? 
                            ORDER BY salary_id ASC LIMIT ?, ?";
                        }

                        $stmt_paging = $connect->stmt_init();
                        if ($stmt_paging->prepare($sql_query)) {
                            // Bind your variables to replace the ?s
                            if (empty($keyword)) {
                                $stmt_paging->bind_param('ss', $from, $offset);
                            } else {
                                $stmt_paging->bind_param('sss', $bind_keyword, $from, $offset);
                            }
                            // Execute query
                            $stmt_paging->execute();
                            // store result 
                            $stmt_paging->store_result();
                            $stmt_paging->bind_result(
                                $data['salary_id'],
                                $data['employee_name'],
                                $data['job_position'],
                                $data['department'],
                                $data['facilitated_by'],
                                $data['working_hours'],
                                $data['salary'],
                                $data['date_added'],
                                $data['time_added']

                            );
                            // for paging purpose
                            $total_records_paging = $total_records;
                        }

                        // if no data on database show "No Reservation is Available"
                        if ($total_records_paging == 0) {
                            echo "
                        <h3 style='text-align: center; margin-top: 5%;'>Data Not Shown!</h3>
                        <div class='alert alert-warning cattxtbox'>
                            <h6> Unfortunately, the page you were looking for could not be found. It may be temporarily unavailable, moved or no longer exists </h6>
                            <div style='display: flex; justify-content: center; align-items: center; margin-top: 25px;'>
                                <img style='opacity: 0.8;' src='../img/inmaintenance.png'/>
                            </div>
                        </div>
                        ";
                        ?>

                        <?php
                            // otherwise, show data
                        } else {
                            $row_number = $from + 1;
                        ?>
                            <!-- Search -->
                            <div class="search_content">
                                <form class="list_header" method="get">
                                    <label>
                                        Search:
                                        <input type="text" class=" r_search" name="keyword" value="<?php echo isset($_GET['keyword']) ? $_GET['keyword'] : "" ?>" />
                                        <button type="submit" class="btn btn-primary" name="btnSearch" value="Search"><i class="bx bx-search-alt"></i></button>
                                    </label>
                                </form>
                            </div>
                            <!-- end of search form -->

                            <div class="col-md-12">
                                <table id="viewdetails" style="margin-bottom: 30px; margin-top: 30px; text-align: center;">
                                    <thead>
                                        <tr class="t_head" style="text-align: center;">
                                            <th width="5%" style="text-align: center;">Salary ID</th>
                                            <th width="15%" style="text-align: center;">Name</th>
                                            <th width="15%" style="text-align: center;">Job Position</th>
                                            <th width="15%" style="text-align: center;">Department</th>
                                            <th width="15%" style="text-align: center;">Facilitated by</th>
                                            <th width="5%" style="text-align: center;">Working Hours</th>
                                            <th width="15%" style="text-align: center;">Salary</th>
                                            <th width="25%" style="text-align: center;">Date Added</th>
                                            <th width="15%" style="text-align: center;">Time Added</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    while ($stmt_paging->fetch()) { ?>
                                        <tbody>
                                            <tr class="table-row">
                                                <td><strong><?php echo $data['salary_id']; ?></strong></td>
                                                <td><?php echo $data['employee_name']; ?></td>
                                                <td><?php echo $data['job_position']; ?></td>
                                                <td><strong><?php echo $data['department']; ?></strong></td>
                                                <td><?php echo $data['facilitated_by'] ?></td>
                                                <td><?php echo $data['working_hours']; ?></td>
                                                <td>₱ <?php echo $data['salary']; ?></td>
                                                <td><?php echo $data['date_added']; ?></td>
                                                <td><?php echo $data['time_added']; ?></td>
                                            </tr>
                                        </tbody>
                                <?php
                                    }
                                }
                                ?>
                                </table>
                            </div>
                            <br>
                            <div style="float: right; margin-right: 50px;">
                                <label for=""><strong> Total: </strong> ₱ <?php echo $payroll_total_amount; ?></label>
                            </div>
                            <br>
                            <div class="col-md-12 pagination">
                                <h4 class="page">
                                    <?php
                                    // for pagination purpose
                                    $function->doPages($offset, 'accounting_income_page.php', '', $total_records, $keyword);
                                    ?>
                                </h4>

                            </div>
                    </div>
				</div>
			</div>

		<div class="separator"> </div>
		</div>
		<br>
		<br>
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

</html>