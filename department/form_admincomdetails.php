<?php
    session_start();

    include "../db/conn.php";
    include "../db/documents.php";
    include('../announcement_includes/functions.php'); 
    include "../db/viewdetinsert.php";
    include('../send_email.php');

    if(!isset($_SESSION["type"])) {
        header("location: 0index.php");
    }

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
        <link rel="stylesheet" href="../css/styles.css">
        <link rel="stylesheet" href="../announcement_css/custom.css">

        <!--Font Styles-->
        <link rel="icon" type="image/png" href="../img/Brgy-Commonwealth.png">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&display=swap" rel="stylesheet">
        
        <!-- Boxicons CDN Link -->
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title> Admin Complaint Details </title>
        
        <style>
            *{font-size: 13px;}
            .home-section{
                min-height: 95vh;
                }

            .home-section{
                min-height: 95vh;
            }
            #viewdetails {
                border-collapse: collapse;
                width: 100%;
            }
            #viewdetails td, #viewdetails th {
                border: 1px solid #ddd;
                padding: 8px;
            }
            #viewdetails tr:nth-child(even){background-color: #f2f2f2;}
            #viewdetails tr:hover {background-color: #ddd;}
            #viewdetails th {
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: left;
                background-color: #D6EACA;
                color: black;
            }
            .btnmargin{margin-bottom: 5px;}
            #myImg {
                border-radius: 5px;
                cursor: pointer;
                transition: 0.3s;
            }
            #myImg:hover {opacity: 0.7;}
            /* The Modal (background) */
            .modal {
                display: none; 
                position: absolute; 
                z-index: 9999;
                padding-top: 50px; /* Location of the box */
                left: 0;
                top: 0;
                width: 100%; /* Full width */
                height: 100%; /* Full height */
                background-color: rgb(0,0,0); /* Fallback color */
                background-color: rgba(0,0,0,0.6); /* Black w/ opacity */
            }
            /* Modal Content (image) */
            .modal-content {
                display: absolute;
                margin: auto;
                max-width: 700px;
                width: 60%;
            }
            /* Add Animation */
            .modal-content, #caption {  
                -webkit-animation-name: zoom;
                -webkit-animation-duration: 0.6s;
                animation-name: zoom;
                animation-duration: 0.6s;
            }
            @-webkit-keyframes zoom {
                from {-webkit-transform:scale(0)} 
                to {-webkit-transform:scale(1)}
            }
            @keyframes zoom {
                from {transform:scale(0)} 
                to {transform:scale(1)}
            }
            /* The Close Button */
            .close {
                position: absolute;
                top: 15px;
                right: 35px;
                color: #f1f1f1;
                font-size: 25px;
                font-weight: bold;
                transition: 0.3s;
            }
            .close:hover,
            .close:focus {
                color: #bbb;
                text-decoration: none;
                cursor: pointer;
            }
            .emailwidth{width: 95%; }
            .main-content{display:flex;}
            .main-content-email{padding: 20px;}
            span.topright{
                text-align: right;
                padding:8px 24px;
                font-size: 25px;
            }
            .topright:hover {
                color: red;
                cursor: pointer;
                float: right;
                padding:8px 24px;
            }
            .viewbtn{width: 100%; height: 35px;  background-color: white; color: black; border: 1px solid #008CBA;}
            .viewbtn:hover{ background-color: #008CBA;color: white;}
            .usersel{pointer-events: none; border: 1px solid orange}
	    </style>
    </head>
    <body>      
	    <!-- Side Navigation Bar-->
        <div class="sidebar">
			<div class="logo-details">
			    <img class="brgy_icon" src="../img/Brgy-Commonwealth.png" alt=""/>
				<div class="logo_name">Barangay Commonwealth</div>
				<i class='bx bx-menu menu' id="btn"></i>
			</div>
			<ul class="nav-list">
                <li>
                    <a class="side_bar nav-button nav-active" href="compAdmin_dashboard.php">
                        <i class='bx bx-grid-alt dash'></i>
                        <span class="links_name">Dashboard</span>
                    </a>
                    <span class="tooltip">Dashboard</span>
			    </li>
			    <li>
                    <a class="side_bar nav-button" href="compAdmin_Lupon.php">
                        <i class='bx bx-user-circle lupon'></i>
                        <span class="links_name">Lupon</span>
                    </a>
                    <span class="tooltip">Lupon</span>
                </li>
                <li>
                    <a class="side_bar nav-button" href="compAdmin_BPSO.php">
                        <i class='bx bx-user bpso'></i>
                        <span class="links_name">BPSO</span>
                    </a>
                    <span class="tooltip">BPSO</span>
                </li>
                <li>
                    <a class="side_bar nav-button" href="compAdmin_Vawc.php">
                        <i class='bx bx-user-check vawc'></i>
                        <span class="links_name">VAWC</span>
                    </a>
                    <span class="tooltip">VAWC</span>
                </li>
                <li>
                    <a class="side_bar nav-button" href="compAdmin_BCPC.php">
                        <i class='bx bx-user-pin bcpc'></i>
                        <span class="links_name">BCPC</span>
                    </a>
                    <span class="tooltip">BCPC</span>
                </li>
                <li class="profile">
                    <div class="profile-details">
                        <div class="name_job">
                            <div class="job"><strong><?php echo $user;?></strong></div>
                            <div class="job" id=""><?php echo $dept; ?>|| Online</div>
                        </div>
                    </div>
                    <a href="../emplogout.php">
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
						<h5>Dashboard >> View Admin Complaint Details
						    <a href="#" class="circle"><img src="../img/dt.png"></a>
					    </h5>	  
					</div>
                </div>
            </section>
            <div id="content" class="container col-md-12">
                <?php 
                    if(isset($_GET['id'])){
                        $ID = $_GET['id'];
                    }else{
                        $ID = "";
                    }
                    
                    // create array variable to store data from database
                    $data = array();
                    
                    // get all data from menu table and category table
                    $sql_query = "SELECT  blotter_id, n_complainant, comp_age, comp_gender, comp_address, inci_address,contactno, bemailadd, n_violator, violator_age,violator_gender, relationship, violator_address, witnesses, blotterid_image, complaints, status FROM blotterdb WHERE blotter_id = ?";
                    
                    $stmt = $connect->stmt_init();
                    if($stmt->prepare($sql_query)) {	
                        // Bind your variables to replace the ?s
                        $stmt->bind_param('s', $ID);
                        // Execute query
                        $stmt->execute();
                        // store result 
                        $stmt->store_result();
                        $stmt->bind_result(
                            $data['blotter_id'], 
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
                            $data['blotterid_image'],
                            $data['complaints'],
                            $data['status']
                        );
                        $stmt->fetch();
                        $stmt->close();
                    }

                    if(isset($_POST['btnEditt'])){
                    
                        $status	= $_POST['status'];
                        $blotter_id	= $_POST['blotter_id'];

                        $sql = "UPDATE blotterdb SET status = 'Done' WHERE blotter_id = $blotter_id";

                        if (mysqli_query($connect, $sql)) {
                          echo "<script>
                                    alert('Mark as Done Successfully!');
                                    window.location.href='compAdmin_dashboard.php';
                                </script>";
                        } else {
                          echo "Error updating record: " . mysqli_error($connect);
                        }
                    }

                    if(isset($_POST['btnDeny'])){
                    
                        $status	= $_POST['status'];
                        $blotter_id = $_POST['blotter_id'];
  
                        $sql = "UPDATE blotterdb SET status = 'Deny' WHERE blotter_id = $blotter_id";
  
                        if (mysqli_query($connect, $sql)) {
                          echo "<script>
                                    alert('Denied Request!');
                                    window.location.href='compAdmin_dashboard.php';
                                </script>";
                        } else {
                          echo "Error updating record: " . mysqli_error($connect);
                        }
                    }
                ?>
                <hr>
                <div style="text-align: center;">
                    <h5>
                    View: Admin Complaints
                    </h5>
                </div>
                <hr>
                <?php
                    if(ISSET($_SESSION['statusadmincomp'])){
                        if($_SESSION['statusadmincomp'] == "ok"){
                ?>
                <div style="text-align: center;" class="alert alert-info messcompose"><?php echo $_SESSION['resultadmincomp']?> <i style="font-size:20px;" class="bx bx-checkbox-checked"></i></div>
                <?php }else{ ?>
                <div class="alert alert-danger messcompose"><?php echo $_SESSION['resultadmincomp']?></div>
                <?php
                    }
                        unset($_SESSION['resultadmincomp']);
                        unset($_SESSION['statusadmincomp']);
                    }
                ?>
                <div style="float: right; display: inline-block;">
                    <button style="background: none; padding: 0;" onclick="document.getElementById('eemail').style.display='block'">
                        <img src="../img/gmail.png" title="Send a message" class="hoverback" style="margin-left: 10px; width: 40px; height: 40px; cursor: pointer;" alt="Gmail">
                    </button>
   
                    <button style="background: none; padding: 0;" onclick="document.getElementById('ssms').style.display='block'">
                        <img src="../img/sms.png" title="Send a message" class="hoverback" style="margin-left: 10px; width: 40px; height: 40px; cursor: pointer;" alt="Gmail">
                    </button>
                    <a href="compAdmin_dashboard.php">
                        <img src="../img/back.png" title="Back?" class="hoverback" style="margin-left: 5px;width: 50px; height: 50px; cursor: pointer;" alt="Back?">
                    </a>

                </div>
                
                <iframe type="file" style="width:100%; height: 500px;" src="../img/fileupload_blotter/<?php echo $data['blotterid_image']; ?>">Here's the Document</iframe>
                <br>
                
                 <div>
              
                <?php
                        if(ISSET($_SESSION['status'])){
                        if($_SESSION['status'] == "ok"){
                    ?>
                   
                        <form action="" method="post">
                            <div class="alert alert-info messcompose"><?php echo $_SESSION['result']?> <?php echo $data['bemailadd']; ?>
                               
                                <input type="hidden" name="blotter_id" id="blotter_id" value="<?php echo $data['blotter_id']; ?>">
                                <input type="hidden" name="status" id="status" value="Done">
                                <button type="submit" style="cursor: pointer;" class="form-control generate viewbtn done" name="btnEditt">Mark as done</button>
                            </div>
                        </form>
                    <?php
                        }else{
                    ?>
                        <div class="alert alert-danger messcompose"><?php echo $_SESSION['result']?></div>
                    <?php
                        }
                        unset($_SESSION['result']);
                        unset($_SESSION['status']);
                        }
                    ?>
                <?php if(!isset($filename)){ $filename = "author"; } ?>
                   
                <!--Modal form for Login-->
                <div id="formatValidatorName" >
                    <div id="eemail" class="modal">
                        <div class="modal-content animate">
                            <span onclick="document.getElementById('eemail').style.display='none'" class="topright">&times;</span>	
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
                                            <p>Subject:</p>
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
                                        <script type="text/javascript" src="../announcement_css/js/ckeditor/ckeditor.js"></script>
                                        <script type="text/javascript">                        
                                            CKEDITOR.replace( 'message' );
                                        </script>
                                    </div>
                                    <div class="sendi">
                                        <button name="admincompsendemail" class="form-control viewbtn" style="margin-top: 10px; width: 100%; cursor: pointer;"><span class="glyphicon glyphicon-envelope"></span> Send <i class="bx bx-send"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- SMS -->
                <div id="formatValidatorName" >
                    <div id="ssms" class="modal">
                        <div class="modal-content animate">
                            <span onclick="document.getElementById('ssms').style.display='none'" class="topright">&times;</span>	
                            <form method="POST" action="../send_sms.php" class="body">
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
                    <label><strong>Complaints: </strong></label>
                    <strong>
                        <textarea class="form-control inputtext" style="padding: 20px; background: #D6EACA;  " disabled="disabled" id="" cols="175" rows="5" ><?php echo $data['complaints']; ?></textarea>
                    </strong>
                    <br>
                 <form method="POST" action="" enctype="multipart/form-data">
                    <div style="display: flex;">
                    <table id="viewdetails" class="font-sizee" style="margin-right: 20px;">
                        <tr>
                            <th width="30%">ID No.</th>
                            <td><input type="hidden" name="admincomp_id" value="<?php echo $data['blotter_id']; ?>"><?php echo $data['blotter_id']; ?></td>
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
                            <td><input type="hidden" name="comp_gender" value="<?php echo $data['comp_gender']; ?>"><strong><?php echo $data['comp_gender']; ?></strong></td>
                        </tr>
                        <tr>
                            <th width="30%">Complainant's Name</th>
                            <td><input type="hidden" name="comp_address" value="<?php echo $data['comp_address']; ?>"><?php echo $data['comp_address']; ?></td>
                        </tr>
                        <tr>
                            <th width="30%">Incident Address</th>
                            <td><input type="hidden" name="inci_address" value="<?php echo $data['inci_address']; ?>"><?php echo $data['inci_address']; ?></td>
                        </tr>
                       
                        <tr>
                            <th width="30%">Contact No</th>
                            <td><input type="hidden" name="contactno" value="<?php echo $data['contactno']; ?>"><?php echo $data['contactno']; ?></td>
                        </tr>
                        <tr>
                            <th width="30%">Email</th>
                            <td><input type="hidden" name="bemailadd" value="<?php echo $data['bemailadd']; ?>"><?php echo $data['bemailadd']; ?></td>
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
                        <input type="hidden" name="complaints" value="<?php echo $data['complaints']; ?>">
                        
                    </table>
                    </div>
                   
                    <div class="information col">
						<label class="employee-label"> Department </label>
							<select class="form-control inputtext control-label" style="padding: 5px;"  id="dept" name="dept" >
							    <option disabled>--Select--</option>
								<option value="BCPC">BCPC</option>
								<option value="VAWC">VAWC</option>
								<option value="LUPON">LUPON</option>
								<option value="BPSO">BPSO</option>

							</select>
					</div>
																
					<div class="information col">
						<label class="employee-label ">Approval Date </label>
							<input type="date" class="form-control inputtext control-label" id="app_date"  style="padding: 5px;" name="app_date" readonly>
					</div>

			        <div class="information col">
						<label class="employee-label"> Approved By </label>
							<input class="form-control inputtext control-label"  style="padding: 5px;" id="app_by" name="app_by" value="<?php echo $user; ?>" type="text" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" readonly> 
					</div>
                    <div class="information col">
						<label class="employee-label ">Attach File </label>
							<input type="file" class="form-control inputtext control-label" id="blotterid_image"  style="padding: 5px;" name="blotterid_image">
                            <div style="color: red; text-align: center;"><strong><?php echo isset($error['blotterid_image']) ? $error['blotterid_image'] : '';?></strong></div>
					</div>
                    <br>
                    <div id="option_menu">
                        <a><button class="btn btn-success font-sizee form-control btnmargin" name="insertAdminComp">Submit</button></a>
                    </div>
                </div>
                </form>      

                        <form action="" method="post">
                                <input type="hidden" name="blotter_id" id="blotter_id" value="<?php echo $data['blotter_id']; ?>">
                                <input type="hidden" name="status" id="status" value="Deny">
                                 <a><button class="btn btn-danger font-sizee form-control btnmargin" name="btnDeny">Deny</button></a>
                            </div>
                        </form>

                <br>
                </div>
                
                </div>
                            
                <div class="separator"> </div>
            </div>       
	</section>	
    <script>
        document.querySelector("#app_date").valueAsDate = new Date();
    </script>
    <script>
     var modal = document.getElementById('eemail');
            window.onclick = function (event) {
                if (event.target == modal) {
                modal.style.display = "none";
            }
        }  
        var modal = document.getElementById('ssms');
            window.onclick = function (event) {
                if (event.target == modal) {
                modal.style.display = "none";
            }
        }  
    </script>
	</body>
</html>