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

	<!-- Boxicons CDN Link -->
	<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Total Funds: Accounting Dept. </title>

    <style>
        .modal-content{height: 50%;border-radius: 50px;}
        .totalfunds{color: green; cursor: pointer}
        .totalfunds:hover{color: orange}
    </style>

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
				<a class="side_bar nav-button nav-active" href="accounting_funds.php">
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

			<li>
                <a class="side_bar nav-button" href="accounting_transaction_history.php">
                    <i class='fa fa-money payroll'></i>
                    <span class="links_name">Transaction History</span>
                </a>
                <span class="tooltip">Transaction History</span>
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
					<h5>Total Funds >> View Details
						<a href="#" class="circle">
							<img src="../img/dt.png">
						</a>
					</h5>
				</div>
			</div>
		</section>

		<div id="content" class="container col-md-12">
			<?php
			if (isset($_POST['totalfundssavebtn'])) {

				$name = $_POST['name'];
				$amount = $_POST['amount'];
				$added_by = $_POST['added_by'];
				$date_added = date("Y-m-d", strtotime("now"));
				$time_added = date("Y-m-d H:i:s", strtotime("now"));

				// create array variable to handle error
				$error = array();

				if (empty($name)) {
					$error['name'] = "<span class='label label-danger cattxtbox errormsg'>Name is required field!</span>";
				}

				if (empty($amount)) {
					$error['amount'] = "<span class='label label-danger cattxtbox errormsg'>Amount is required field!</span>";
				}

				if (
					!empty($name) &&
					!empty($amount)
				) {

					$stmt = $db->prepare("INSERT INTO total_funds (name, amount, added_by, date_added, time_added) VALUES (:name, :amount, :added_by, :date_added, :time_added)");

					$stmt->bindParam(':name', $name);
					$stmt->bindParam(':amount', $amount);
					$stmt->bindParam(':added_by', $added_by);
					$stmt->bindParam(':date_added', $date_added);
					$stmt->bindParam(':time_added', $time_added);

					if ($stmt->execute()) {
						$_SESSION['status'] = "Submitted Successfully";
						$_SESSION['status_code'] = "success";
					} else {
						$_SESSION['status'] = "Error";
						$_SESSION['status_code'] = "error";
					}
				}
			}
			?>
			<?php
			if (isset($_GET['id'])) {
				$ID = $_GET['id'];
			} else {
				$ID = "";
			}

			if (isset($_POST[''])) {

				$id = $_POST['id'];
				$name  = $_POST['name'];
				$amount = $_POST['amount'];

				$sql = "UPDATE equip_budget SET name = ? AND SET amount = ? WHERE id = $ID";

				if (mysqli_query($connect, $sql)) {
				} else {
					echo "Error updating record: " . mysqli_error($connect);
				}
			}

			if (isset($_POST['editequip'])) {
				$id = $_POST['id'];
				$name = $_POST['name'];
				$amount = $_POST['amount'];

				$query = mysqli_query($connect, "UPDATE total_funds SET name='$name', amount='$amount', id='$id' WHERE id='$id'");
				$_SESSION['editstatus'] = "Edit Successfully";
				$_SESSION['editstatus_code'] = "success";
			}
			?>
			<div>

				<br>
				<div style="float: right; display: inline-block;">
					<a href="accounting_funds.php">
						<img src="../img/back.png" title="Back?" class="hoverback" style="width: 50px; height: 50; cursor: pointer;" alt="Back?">
					</a>

				</div>

				<br>
				<div id="London" class="w3-container city" style="margin-top: 50px;">
					<hr>
					<h5 style="text-align: center;">Total Funds</h5>
                    <hr>
					<div class="col-md-12">
						<table id="viewdetails" style="margin-bottom: 30px; margin-top: 30px; text-align: center;">
							<?php
							$query = $db->query("SELECT * FROM total_funds ORDER BY id ASC");
							?>

							<thead>
								<tr class="t_head">
									<th width="5%" style="text-align: center; margin: 20px;">Equipment ID</th>
									<th width="5%" style="text-align: center; margin: 20px;">Equipment Name</th>
									<th width="5%" style="text-align: center; margin: 20px;">Added by</th>
									<th width="5%" style="text-align: center; margin: 20px;">Dated added</th>
									<th width="5%" style="text-align: center; margin: 20px;">Time added</th>
									<th width="5%" style="text-align: center; margin: 20px;">Equipment Amount</th>
								</tr>
							</thead>
							<?php
							while ($data = $query->fetch()) {
								$id = $data['id'];
								$name = $data['name'];
								$amount = $data['amount'];
								$added_by = $data['added_by'];
								$date_added = $data['date_added'];
								$time_added = $data['time_added'];
							?>
								<tbody>
									<tr class="table-row" onclick="document.getElementById('check_<?php echo $data['id']; ?>').style.display='block'">
										<td>EID4257<?php echo $data['id']; ?></td>
										<td><?php echo $data['name']; ?></td>
										<td><?php echo $data['added_by']; ?></td>
										<td><?php echo $data['date_added']; ?></td>
										<td><?php echo $data['time_added']; ?></td>
										<td>₱ <?php echo $data['amount']; ?></td>
									</tr>
								</tbody>
								<div id="check_<?php echo $data['id']; ?>" class="employeemanagement-modal modal">
									<div class="modal-contentemployee animate">
										<form method="POST" action="">
											<div style="float: right;">
												<span onclick="document.getElementById('check_<?php echo $data['id']; ?>').style.display='none'" class="topright" style="font-size: 18px;">&times;</span>
											</div>
											<div id="London" class="w3-container city" style="margin-top: 50px;">
												<h5 style="text-align: center;">Update Equipment Category</h5>
												<br>
												<div class="row align-items-start">
													<div class="information col">
														<label class="employee-label">Equipment ID:</label>
														<input required class="form-control inputtext widthinp" type="text" name="id" value="<?php echo $data['id']; ?>" readonly>
													</div>

													<div class="information col">
														<label class="employee-label">Equipment Name:</label>
														<input required class="form-control inputtext widthinp" type="text" value="<?php echo $data['name']; ?>" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" style="text-transform: uppercase;" name="name">
													</div>

												</div>
												<div class="row align-items-start">
													<div class="information col">
														<label class="employee-label"> Amount: </label>
														<input required class="form-control inputtext widthinp" type="number" value="<?php echo $data['amount']; ?>" onKeyPress="if(this.value.length==6) return false;" name="amount">
													</div>
												</div>
												<br>
												<button type="submit" id="editequip" name="editequip" class="inputtext submtbtn button">
													<span>Save </span>
												</button>
											</div>
										</form>
									</div>
								<?php
							}
								?>
						</table>
						<div style="float: right; margin-right: 50px;">
                            <label>
                                <strong>Total Funds: </strong>₱ <?php echo $total_amount; ?>
                                
                            </label>
                            <br>
							<label><strong class="totalfunds" onclick="document.getElementById('funds').style.display='block'">Current Funds: </strong>
								₱ <?php $total_summary = $total_amount - ($project_total_amount + $equip_total_amount + $payroll_total_amount);

									echo $total_summary + $payment_amount;
								?>
							</label>
						</div>
                        <div id="funds" class="employeemanagement-modal employee-modal modal">
									<div class="modal-contentemployee modal-content animate">
										<form method="POST" action="">
											<div style="float: right;">
												<span onclick="document.getElementById('funds').style.display='none'" class="topright" style="font-size: 18px;">&times;</span>
											</div>
											<div id="London" class="w3-container city" style="margin-top: 50px;">
												<h5 style="text-align: center;">Computation for Total Funds</h5>
												<br>
                                                
                                                <table id="viewdetails" style="margin-bottom: 30px; margin-top: 30px; text-align: center;">
                                                <div>
                                                <thead>
                                                    <tr class="t_head">
                                                        <th width="5%" style="text-align: center;">Total Funds</th>
                                                        <th width="5%" style="text-align: center;">Equipment Budget</th>
                                                        <th width="5%" style="text-align: center;">Project Budget</th>
                                                        <th width="5%" style="text-align: center;">Income</th>
														<th width="5%" style="text-align: center;">Payroll</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>₱ <?php echo $total_amount; ?></td>
                                                        <td>₱ <?php echo -$equip_total_amount; ?></td>
                                                        <td>₱ <?php echo -$project_total_amount; ?></td>
                                                        <td>₱ <?php echo +$payment_amount; ?></td>
														<td>₱ <?php echo +$payroll_total_amount; ?></td>
                                                    </tr>
                                                </tbody>
                                                </table>
                                                <div style="text-align: center;">
                                                    <label>₱ <?php echo $total_amount; ?> - (₱ <?php echo $equip_total_amount; ?> + ₱ <?php echo $project_total_amount; ?> + ₱ <?php echo $payroll_total_amount; ?>) = ₱ <?php echo $total_summary?> + ₱ <?php echo $payment_amount; ?> = <strong>₱ <?php echo $total_summary + $payment_amount;?> </strong></label>
                                                </div>
                                                </div>
											</div>
										</form>
									</div>
                        
					</div>
                    <br>
                    <br> 
                        
					<form method="POST" action="">
						<div class="row align-items-start">
							<div class="information col">
								<label class="employee-label">Fund Name:</label>
								<input class="form-control inputtext widthinp" type="text" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);"  name="name" placeholder="Please specify name">
                                <?php echo isset($error['name']) ? $error['name'] : '';?>
							</div>

							<div class="information col">
								<label class="employee-label"> Amount: </label>
								<input class="form-control inputtext widthinp" type="currency" name="amount" placeholder="Please specify amount">
                                <?php echo isset($error['amount']) ? $error['amount'] : '';?>
							</div>
						</div>
						<div class="row align-items-start">
							<div class="information col">
								<label class="employee-label"> Added by: </label>
								<input class="form-control inputtext widthinp" type="text" placeholder="Added by" value="<?php echo $user; ?>" name="added_by" readonly>
							</div>
						</div>

						<br>
						<a><button class="font-sizee form-control btnmargin button" name="totalfundssavebtn" id=""><span>Submit </span></button></a>
					</form>
				</div>
			</div>


			<!-- <a href="accounting_salary.php"><button class="btn btn-danger font-sizee form-control btnmargin">Cancel</button></a> -->


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