<?php
session_start();
include('announcement_includes/functions.php');
require 'db/conn.php';

if(!isset($_SESSION["type"]))
{
    header("location: 0index.php");
}
?>


<?php
	$user = '';
	if(isset($_SESSION['user'])){
		$user = $_SESSION['user'];
	}
	
	$dept = '';
	if(isset($_SESSION['type'])){
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
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/admincompviewdet.css">
    <link rel="stylesheet" href="announcement_css/custom.css">

    <!--Font Styles-->
    <link rel="icon" type="image/png" href="../img/Brgy-Commonwealth.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&display=swap" rel="stylesheet">

    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
       div.align-box {
			padding-top: 23px;
			display: flex;
			align-items: center;
		}

		.box-report {
			width: 300px;
			font-size: 14px;
			border: 4px solid #7dc748;
			padding: 30px;
			margin: 10px;
			border-radius: 5px;
			align-items: center;
		}

		* {
			font-size: 13px;
		}

		a {
			text-decoration: none;
		}

		.addannounce {
			margin-top: 340px;
			margin-left: 25px;
			font-size: 13px;
		}

		.fileupload {
			font-size: 13px;
			margin-left: 15px;
		}

		.pagination {
			margin-top: 32%
		}

		.page {
			margin-left: 15px;
		}
    </style>
     <title> BPSO Dashboard </title>

    <!-- Side Navigation Bar-->
	<div class="sidebar">
			<div class="logo-details">
			    <img class="brgy_icon" src="img/Brgy-Commonwealth.png" alt=""/>
				<div class="logo_name">Barangay Commonwealth</div>
				<i class='bx bx-menu menu' id="btn"></i>
			</div>
			<ul class="nav-list">
			  <li>
			  <a class="side_bar" href="     ">
				  <i class='bx bx-grid-alt dash'></i>
				  <span class="links_name">Dashboard</span>
				</a>
				 <span class="tooltip">Dashboard</span>
			  </li>
			  
              

			 <li>
			   <a class="side_bar" href="bpso_violators.php">
				 <i class='bx bx-error'></i>
				 <span class="links_name">Violations</span>
			   </a>
			   <span class="tooltip">Violations</span>
			 </li>
			 <li>
			   <a class="side_bar" href="bpso_patrols.php">
				 <i class='bx bx-walk'></i>
				 <span class="links_name">Night Patrol</span>
			   </a>
			   <span class="tooltip">Night Patrol</span>
			 </li>
			 <li class="profile">
				 <div class="profile-details">
				   <img class="profile_pic" src="img/1.jpeg">
				   <div class="name_job">
				   		<div class="job"><strong><?php echo $user;?></strong></div>
						<div class="job" id=""><?php echo $dept; ?></div>
				   </div>
				 </div>
				 <a href="emplogout.php">
					<i class='bx bx-log-out d_log_out' id="log_out" ></i>
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
						<h5>BARANGAY PUBLIC SAFETY OFFICER (BPSO)
						<a href="#" class="circle">
							 <img src="img/dt.png" >
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
            $sql_query = "SELECT  admincomp_id, n_complainant, comp_age, comp_gender, comp_address, inci_address,contactno, bemailadd, n_violator, violator_age, violator_gender, relationship, violator_address, witnesses, complaints, dept, app_date, app_by, blotterid_image
                            FROM admin_complaints
                            WHERE admincomp_id = ?";

            $stmt = $connect->stmt_init();
            if ($stmt->prepare($sql_query)) {
                // Bind your variables to replace the ?s
                $stmt->bind_param('s', $ID);
                // Execute query
                $stmt->execute();
                // store result 
                $stmt->store_result();
                $stmt->bind_result(
                    $data['admincomp_id'],
                    $data['n_complainant'],
                    $data['comp_age'],
                    $data['comp_gender'],
                    $data['comp_address'],
                    $data['inci_address'],
                    $data['contactno'],
                    $data['bemailadd'],
                    $data['n_violator'],
                    $data['violator_age'],
                    $data['violator_gender'],
                    $data['relationship'],
                    $data['violator_address'],
                    $data['witnesses'],
                    $data['complaints'],
                    $data['dept'],
                    $data['app_date'],
                    $data['app_by'],
                    $data['blotterid_image']
                );
                $stmt->fetch();
                $stmt->close();
            }

            if (isset($_POST['closeCase'])) {

                $ongoing_stat	= $_POST['ongoing_stat'];
                $ongoingcase_id = $_POST['ongoingcase_id'];

                $sql = "UPDATE bcpc_ongoingcase SET ongoing_stat  = 'Closed' WHERE ongoingcase_id = $ongoingcase_id";

                if (mysqli_query($connect, $sql)) {
                    echo "<script>
                                    alert('Case Closed!');
                                    window.location.href='bcpc_ongoing.php';
                                </script>";
                } else {
                    echo "Error updating record: " . mysqli_error($connect);
                }
            }


            if (isset($_POST['closeCase'])) {

                $status    = $_POST['status'];
                $admincomp_id = $_POST['admincomp_id'];

                $sql = "UPDATE admin_complaints SET status = 'Closed' WHERE admincomp_id = $admincomp_id";

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
                <div style="float: right; display: inline-block;">

                    <button style="background: none; padding: 0;" onclick="document.getElementById('eemail').style.display='block'">
                        <img src="img/gmail.png" title="Send a message" class="hoverback" style="margin-left: 10px; width: 40px; height: 40px; cursor: pointer;" alt="Gmail">
                    </button>

                    <a href="bpso_violators.php">
                        <img src="img/back.png" title="Back?" class="hoverback" style="width: 50px; height: 50; cursor: pointer;" alt="Back?">
                    </a>

                </div>
                <!--Modal form for Login-->
                <div id="formatValidatorName">
                    <div id="eemail" class="modal">
                        <div class="modal-content animate">
                            <span onclick="document.getElementById('eemail').style.display='none'" class="topright">&times;</span>,
                            <form method="POST" action="" class="body" enctype="multipart/form-data">
                                <div class="main-content-email">

                                    <div class="main-content main-content1">
                                        <div class="information col">
                                            <p> Fullname: </p>
                                            <input class="form-control emailwidth" id="fullname" name="fullname" value="<?php echo $data['n_complainant']; ?>" type="text" placeholder="Enter Fullname">
                                        </div>

                                        <div class="information col">
                                            <p> To: </p>
                                            <input required class="form-control emailwidth" id="email" name="email" style="width:100%" value="<?php echo $data['bemailadd']; ?>" type="text" placeholder="Enter Email Address">
                                        </div>
                                    </div>
                                    <div class="main-content">
                                        <div class="information col">
                                            <p>Subject: </p>
                                            <input required class="form-control" style="width: 100%" id="subject" name="subject" type="text" placeholder="Subject">
                                        </div>


                                        <!-- <div class="information col">
                                                    <p>Attachment: </p>
                                                    <input class="form-control emailwidth" style="background: white;" id="fileattach" name="fileattach" type="file" value=""> 
                                                </div> -->
                                    </div>

                                    <div class="information col">
                                        <p>Body: </p>
                                        <textarea name="message" id="message" class="form-control inputtext" rows="32" placeholder="Your message"></textarea>
                                        <script type="text/javascript" src="announcement_css/js/ckeditor/ckeditor.js"></script>
                                        <script type="text/javascript">
                                            CKEDITOR.replace('message');
                                        </script>
                                    </div>

                                    <input class="form-control" style="width: 100%" id="gmail" name="gmail" type="hidden" value="sent" placeholder="gmail">

                                    <input class="form-control" style="width: 100%" id="admincomp_id" name="admincomp_id" type="hidden" value="<?php echo $data['admincomp_id']; ?>" placeholder="gmail">

                                    <div class="sendi">
                                        <button name="admincompsendemail" class="form-control viewbtn" style="margin-top: 10px; width: 100%; cursor: pointer;"><span class="glyphicon glyphicon-envelope"></span> Send <i class="bx bx-send"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- SMS -->
                <div id="formatValidatorName">
                    <div id="ssms" class="modal">
                        <div class="modal-content animate">
                            <span onclick="document.getElementById('ssms').style.display='none'" class="topright">&times;</span>
                            <form method="POST" action="send_sms.php" class="body">
                                <div class="main-content-email">

                                    <div class="main-content">
                                        <div class="information col">
                                            <p> Fullname: </p>
                                            <input class="form-control emailwidth" id="fullname" name="fullname" value="<?php echo $data['n_complainant']; ?>" type="text" placeholder="Enter Fullname">
                                        </div>

                                        <div class="information col">
                                            <p> Contact Number: </p>
                                            <input required class="form-control emailwidth" id="number" name="number" value="<?php echo $data['contactno']; ?>" type="text" placeholder="Enter Contact No">
                                        </div>
                                    </div>

                                    <div class="information col">
                                        <p>Body: </p>
                                        <textarea name="msg" id="msg" class="form-control inputtext" rows="16" placeholder="Your message"></textarea>
                                    </div>

                                    <div class="sendi">
                                        <button name="sendSms" class="form-control viewbtn" style="margin-top: 10px; width: 100%; cursor: pointer;"><span class="glyphicon glyphicon-envelope"></span> Send <i class="bx bx-send"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                
                <br>
                <br>
                <table id="viewdetails" class="font-sizee" style="margin-bottom: -10px;">
                        <tr>
                            <th width="30%">Assigned Department: </th>
                            <td><strong><?php echo $data['dept']; ?> Dept.</strong></td>
                        </tr>
                        <tr>
                            <th width="30%">Approved Date: </th>
                            <td><strong><?php echo $data['app_date']; ?></strong></td>
                        </tr>
                        <tr>
                            <th width="30%">Facilitated by: </th>
                            <td><strong><?php echo $data['app_by']; ?></strong></td>
                        </tr>
                        <!-- <tr>
                                <th width="30%">Created on </th>
                                <td><strong><?php echo $data['created_on']; ?></strong></td>
                            </tr> -->
                    </table>
            <form method="POST" action="" enctype="multipart/form-data">
                    <br>
                    <br>
                    <div style="display: flex;">
                        <table id="viewdetails" class="font-sizee" style="margin-right: 25px;">
                            <tr>
                                <th width="30%">ID No.</th>
                                <td><input type="hidden" name="admincomp_id" value="<?php echo $data['admincomp_id']; ?>"><?php echo $data['admincomp_id']; ?></td>
                            </tr>
                            <tr>
                                <th width="30%">Complainant's Name</th>
                                <td><input type="hidden" name="n_complainant" value="<?php echo $data['n_complainant']; ?>"><strong><?php echo $data['n_complainant']; ?></strong></td>
                            </tr>
                            <tr>
                                <th width="30%">Complainant's Age</th>
                                <td><input type="hidden" name="comp_age" value="<?php echo $data['comp_age']; ?>"><strong><?php echo $data['comp_age']; ?></strong></td>
                            </tr>
                            <tr>
                                <th width="30%">Complainant's Gender</th>
                                <td><input type="hidden" name="comp_gender" value="<?php echo $data['comp_gender']; ?>"><?php echo $data['comp_gender']; ?></td>
                            </tr>
                            <tr>
                                <th width="30%">Complainant's Address</th>
                                <td><input type="hidden" name="comp_address" value="<?php echo $data['comp_address']; ?>"><?php echo $data['comp_address']; ?></td>
                            </tr>
                            <tr>
                                <th width="30%">Incident Address</th>
                                <td><input type="hidden" name="inci_address" value="<?php echo $data['inci_address']; ?>"><?php echo $data['inci_address']; ?></td>
                            </tr>

                            <tr>
                                <th width="30%">Contact No</th>
                                <td><input type="hidden" name="contactno" value="<?php echo $data['contactno']; ?>"><strong><?php echo $data['contactno']; ?></strong></td>
                            </tr>
                            <tr>
                                <th width="30%">Email</th>
                                <td><input type="hidden" name="bemailadd" value="<?php echo $data['bemailadd']; ?>"><strong><?php echo $data['bemailadd']; ?></strong></td>
                            </tr>
                    </div>
                    </table>

                    <table id="viewdetails" class="font-sizee">
                        <tr>
                            <th width="30%">Name of Violator</th>
                            <td><input type="hidden" name="n_violator" value="<?php echo $data['n_violator']; ?>"><strong><?php echo $data['n_violator']; ?></strong></td>
                        </tr>
                        <tr>
                            <th width="30%">Violator's Age</th>
                            <td><input type="hidden" name="violator_age" value="<?php echo $data['violator_age']; ?>"><strong><?php echo $data['violator_age']; ?></strong></td>
                        </tr>
                        <tr>
                            <th width="30%">Violator's Gender</th>
                            <td><input type="hidden" name="violator_gender" value="<?php echo $data['violator_gender']; ?>"><?php echo $data['violator_gender']; ?></td>
                        </tr>
                        <tr>
                            <th width="30%">Relationship</th>
                            <td><input type="hidden" name="relationship" value="<?php echo $data['relationship']; ?>"><?php echo $data['relationship']; ?></td>
                        </tr>
                        <tr>
                            <th width="30%">Violator's Address</th>
                            <td><input type="hidden" name="violator_address" value="<?php echo $data['violator_address']; ?>"><?php echo $data['violator_address']; ?></td>
                        </tr>
                        <tr>
                            <th width="30%">Witnesses</th>
                            <td><input type="hidden" name="witnesses" value="<?php echo $data['witnesses']; ?>"><?php echo $data['witnesses']; ?></td>
                        </tr>

                    </table>
                    <br>
            </div>
            <br>
                    <h5><strong>Complaints: </strong></h5>
                    <strong>
                        <textarea class="form-control inputtext" style="padding: 20px; background: #D6EACA; text-align: justify;" disabled="disabled" id="" cols="175" rows="7"><?php echo $data['complaints']; ?></textarea>
                        <input type="hidden" name="complaints" value="<?php echo $data['complaints']; ?>">
                    </strong>
                    <br>

                    <input type="hidden" name="dept" value="<?php echo $data['dept']; ?>">
                    <input type="hidden" name="app_date" value="<?php echo $data['app_date']; ?>">
                    <input type="hidden" name="app_by" value="<?php echo $data['app_by']; ?>">

                    <hr>
        <div style="text-align: center;">
            <label style="font-size: 14px;">Case Trials</label>
        </div>
        <hr>
                    <table id="viewdetails" style="margin-bottom: 30px; margin-top: 30px;">
						
						<?php	
                            if (isset($_GET['id'])) {
                            $ID = $_GET['id'];
                            } else {
                                $ID = "";
                            }
                
                            // create array variable to store data from database
                            $data = array();	

							$mquery = "SELECT * FROM lupondb";
						$countemployee = $db->query($mquery)
						?>

							<thead>
								<tr class="t_head">
									<th>Case No.</th>
									<th>Complainant</th>
									<th>Accussed</th>
									<th>Address</th>
									<th>Time And Date:</th>
									<th>Contact No.</th>
									<th>Complaints:</th>
									<th>Status</th>
									<th>Action</th>
									
								</tr>                       
							</thead>
							<?php
							foreach($countemployee as $data) 
							{
							?>
							<tr class="table-row">
									<td><?php echo $data ['CaseNo']; ?></td>
									<td><?php echo $data ['Complainant']; ?></td>
									<td><?php echo $data ['Accussed']; ?></td>
									<td><?php echo $data ['Address']; ?></td>
									<td><?php echo $data ['DateandTime']; ?></td>
									<td><?php echo $data ['ContactNo']; ?></td>
									<td><?php echo $data ['Complaint']; ?></td>
									<td>Active</td>
									<td>
								
										<button class="form-control btn-info"  data-toggle="modal" style="font-size: 13px; width: 100px;"  onclick="location.href='lupon_update.php?id=<?php echo $data['CaseNo'];?>'"><i class="fa fa-check-circle"></i>View Details</button>
										
									</td>	
								</tr>
							</tbody>
							<?php
							}
							?>
						
						</table>
        </div>
		
                    <div class="information col">
                        <label class="employee-label ">Hearing Date</label>
                        <input type="date" class="form-control inputtext control-label" id="hearing_date" style="padding: 5px;" name="hearing_date">
                        <?php echo isset($error['hearing_date']) ? $error['hearing_date'] : ''; ?>
                    </div>

                    <div class="information col">
                        <label class="employee-label"> Facilitated By </label>
                        <input class="form-control inputtext control-label" style="padding: 5px;" id="ongoing_appby" name="ongoing_appby" value="<?php echo $user; ?>" type="text" readonly>
                        <?php echo isset($error['ongoing_appby']) ? $error['ongoing_appby'] : ''; ?>
                    </div>

                    <div class="information col">
                        <label class="employee-label"> Remarks </label>
                        <textarea name="remarks" id="remarks" class="form-control inputtext" rows="4" placeholder="Your message"></textarea>
                        <?php echo isset($error['remarks']) ? $error['remarks'] : ''; ?>
                    </div>

                    <div class="information col" style="margin-bottom: 15px;">
                        <label class="employee-label ">Attach File </label>
                        <input type="file" class="form-control inputtext control-label" id="ongoingcase_file" style="padding: 5px;" name="ongoingcase_file">
                        <div style="color: red; text-align: center;"><strong><?php echo isset($error['ongoingcase_file']) ? $error['ongoingcase_file'] : ''; ?></strong></div>
                    </div>
                    <button class="btn btn-success font-sizee form-control btnmargin" name="saveCasebtn">Save</button>
                    <br>
        </form>
        
        <form action="" method="post">
            <input type="hidden" name="ongoingcase_id" id="ongoingcase_id" value="<?php echo $data['admincomp_id']; ?>">
            <input type="hidden" name="admincomp_id" id="admincomp_id" value="<?php echo $data['admincomp_id']; ?>">
            <input type="hidden" name="ongoing_stat" id="ongoing_stat" value="Closed">
            <input type="hidden" name="status" id="status" value="Closed">

            <a><button class="btn btn-danger font-sizee form-control btnmargin" name="closeCase">Close</button></a>
        </form>
       

        </div>

        <div class="separator"> </div>
        </div>
        <br>
        <br>
    </section>
    <?php
    if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
    ?>
        <script>
            swal({
                title: "<?php echo $_SESSION['status']; ?>",
                // text: "Ongoing Saved Successfully",
                icon: "<?php echo $_SESSION['status_code']; ?>",
                button: "Ok Done!",
            });
        </script>
    <?php
        unset($_SESSION['status']);
    }
    ?>

<?php
    if (isset($_SESSION['close_status']) && $_SESSION['close_status'] != '') {
    ?>
        <script>
            swal({
                title: "<?php echo $_SESSION['close_status']; ?>",
                // text: "Ongoing Saved Successfully",
                icon: "<?php echo $_SESSION['close_status_code']; ?>",
                button: "Ok Done!",
            });
        </script>
    <?php
        unset($_SESSION['close_status']);
    }
    ?>
    </body>

</html>