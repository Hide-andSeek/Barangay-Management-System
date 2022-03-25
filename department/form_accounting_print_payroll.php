<?php
session_start();

include "../db/conn.php";
include('../announcement_includes/functions.php');
include "../db/viewdetinsert.php";
include("../db/accounting.php");
require('../send_email.php');
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="icon" type="image/png" href="../img/Brgy-Commonwealth.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payroll Receipt</title>
    <style>
            @media print{

            * {
            margin: 0;
            padding: 0;
            }

            div.generatebtn, div.instruc{
                visibility: hidden;
            }

         
            div.main-content-email{
                display: none;
            }
            
            div.barangay_permit{
                display: absolute;
                margin-left: 50px;
                
            }
          
        

        }
       
        .inp{border: none; }
		.borderb{border-bottom: 1px solid black}
		.offic{font-size:13px;}
        .borderstyle{border: none; font-size: 15px;}  
        .barangay_permit{display: flex; align-items: center; justify-content: center; margin-left: 15px; margin-top: -35px;}
        .viewbtn{width: 100%; height: 35px; background-color: #008CBA;color: white;  }
        .viewbtn:hover{  background-color: white; color: black; border: 1px solid #008CBA;}
        .done{width: 30%; font-size: 11px;}
        .inputtext, .inputpass {
			font-family: 'Montserrat', sans-serif;
			font-size: 14px;
			height: 35px;
			width:  96%;
			padding: 10px 10px;
			margin: 4px 25px;
			display: inline-block;
			border: 1px solid #ccc;
			box-sizing: border-box;
		}

		.messcompose, .send{top: 0; display: flex;justify-content: center; align-items: center;  border: 1px solid #D8D8D8; padding: 10px;border-radius: 5px; font-size: 11px; text-transform: uppercase; background-color: rgb(236, 255, 216); color: green; text-align: center; margin-bottom: 25px;}
		.submtbtn{height: 40px;}
		.submtbtn:hover{
			background: #04AA6D;
			color: orange;
			height: 40px;
		}
		.user, .email{width:87.5%}
		.textareaa{width: 94%; margin-left: 25px;}
		span.topright{margin-left: -50px; margin-top: -15px; text-align: right; font-size: 25px;}
		span.topright:hover {text-align: right;color: red; cursor: pointer;}
		.display{display: flex;}
		.usersel{pointer-events: nne; border: 1px solid orange}

		.textarea{padding-left: 40px; padding-right: 40px; padding-top: 10px; margin-bottom: 15px;}
 
        .sendi{margin-top: 20px;}

        img {  
        user-drag: none;  
        user-select: none;
        -moz-user-select: none;
        -webkit-user-drag: none;
        -webkit-user-select: none;
        -ms-user-select: none;
        }
        
        .viewdetails tbody tr:last-of-type {
        border-bottom: 2px solid #009879;
        }
        tr.worked_days{border-bottom: 2px solid gray}
    </style>
</head>
<body>
    <main>
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
                                }
                            } else {
                                $payroll = "<div class='errormessage' style='text-align: center; font-size: 14px;'>
                                            <i class='bx bx-error'></i>
                                            No data shown!
                                    </div>";
                            }
                ?>
    <div id="indigency_file" style="margin-top: 30px;">
    <br>
            <div>
                    <?php
                        if(ISSET($_SESSION['status'])){
                        if($_SESSION['status'] == "ok"){
                    ?>
                            <div class="alert alert-info messcompose"><?php echo $_SESSION['result']?>  <strong><?php echo $emailaddress;  ?></strong>
                            </div>
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
									<section class="barangay_permit">
                                    <form action="" method="post">
                                    <div style="padding-top: 15px; width: 965px;  height: 344px;">
											<div style="display: flex;">
												<img style="float: left; width: 130px; height: 125px; margin-left: 55px;" src="../img/QCSeal.png">
													<div style="margin-left: 140px;">
														<p class="center_description" style="font-size: 17px; padding-left: 75px;">REPUBLIKA NG PILIPINAS</p>
														<p class="center_description" style="font-size: 20px; font-weight: 600; padding-left: 29px; color: red;">ACCOUNTING DEPARTMENT</p>
														<p class="center_description" style=" font-size: 17px; padding-left: 40px; padding-bottom: 15px; ">BARANGAY COMMONWEALTH</p>
														<p class="center_description" style="font-size: 17px; margin-left: 40px;margin-top: -15px;">DISTRITO II, LUNGSOD QUEZON</p>
													</div>
												<img style=" display: flex; float: right;  margin-left: 175px; " class="commonwealthlogo" src="../img/Brgy-Commonwealth.png">
											</div>
											<div>
										</div>
                                        <br>
                                        <br>
                     
                                        <div class="col-md-12">
                                            <div style="text-align: center;">
                                                <h3>Accounting Department</h3>
                                                <h3>Payslip</h3>
                                            </div>
                                        <br>
                                        <br>
                                        <div style="margin-top: -40px; margin-left: 290px; position: absolute;"><img src="../img/Brgy-Commonwealth150x150.png" style="width: 190%; height:  0%; opacity: 0.2" alt=""></div>   
                                        <table class="viewdetails" style="margin-left: 50px; margin-right: 50px">
                                            <thead>
                                                <tr style="margin-bottom: 50px;">
                                                    <td width="15%">Employee ID</td>
                                                    <td width="15%"><strong><?php echo $data['user_id']; ?></strong></td>
                                                    <td width="15%">Receipt #</th>
                                                    <td width="15%"><strong><?php echo $random_num; ?></strong></td>
                                                </tr>
                                                <tr>
                                                    <td width="15%">Date Joined</td>
                                                    <td width="15%"><strong><?php echo $data['date_added']; ?></strong></td>
                                                    <td width="15%">Name</th>
                                                    <td width="15%"><strong><?php echo $data['employee_name']; ?></strong></td>

                                                </tr>
                                            </thead>
                                            <tbody style="border-bottom: 2px solid ">
                                                <tr>
                                                    <td>Pay Period</td>
                                                    <td>
                                                        <select class="form-control form-text auto-save" style="font-size: 15px; cursor: pointer; border:none;font-weight: 800; padding-left: -10px" name="indigencyid_type" id="indigencyid_type">
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
                                                <tr class="worked_days">
                                                    <td width="15%">Worked Days</th>
                                                    <td width="15%"><strong><?php echo $workingdays ?> days </strong></td>
                                                    <td>Department</td>
                                                    <td><strong><?php echo $data['department']; ?></strong></td>

                                                </tr>
                                                <tr class="worked_hours">
                                                    <td width="15%">Worked hours</th>
                                                    <td width="15%"><strong><?php echo $total_hours; ?> hrs </strong></td>
                                                    <td>Salary</td>
                                                    <td><strong>₱<?php echo $total_salary; ?></strong></td>

                                                </tr>
                                            </tbody>
                                        </table>
                                        <br>
                                        <br>
                                        <br>
                                        <table class="viewdetails" style="margin-left: 50px; margin-right: 50px">
                                            <thead>
                                                
                                                <tr>
                                                    <td width="15%">Facilitated by: </td>
                                                    <td width="15%" style="border-bottom: 1px solid black"><strong><?php echo $user; ?></strong></td>
                                                    <td width="15%">Date: </th>
                                                    <td width="15%"><input type="date" style="border: none;font-weight: 800; border-bottom: 1px solid;" readonly id="date_issued" name="date_issued"></td>

                                                </tr>
                                            </thead>
                                            
                                        </table>
                                        <br>
                                        <div style="display: flex; justify-content: center; align-items: center; margin-top: 50px;">
                                            <div style="margin-right: 100px;">
                                                <p style="border-top: 2px solid gray;">Accounting Dept. Signature</p>
                                            </div>
                                            <div>
                                                <p style="border-top: 2px solid gray;">Employee Signature</p>
                                            </div>
                                        </div>

                  
                                        <div class="instruc" id="instruc" style="margin-top: 30px; padding: 40px 40px; margin-left: 50px;">
                                        <hr style="height: 10px; margin-left: -110px; margin-bottom: 50px;">
                                                <h4>
                                                    Instruction: For Barangay Employees
                                                </h4>
                                                <ul>
                                                <li>
                                                    <p style="font-size: 14px;"> Please generate and authenticate QR Code. </p>
                                                </li>
                                                <li>
                                                    <p style="font-size: 14px;"> Kindly save or download QR Code. <em> This will serve as a proof of record in Barangay Commonwealth.</em> </p>
                                                </li>
                                            </ul>
                                            
                                        </div>

                                            <div class="generatebtn" style="margin-top: 50px; width: 90%;">
                                            <hr>
                                                <div style="display: flex; justify-content: center; align-items: center; text-align:center; margin-top: 5px; font-size: 14px;">
                                                    <button style=" cursor: pointer; width: 100%; font-size: 14px;" class="form-control generate viewbtn" onclick="window.print(); ">
                                                        <i class="bx bx-save saveicon"></i> Print
                                                    </button>
                                                </div>
                                                <br>
                                        </div>
                                        </form>


                                    <form method="POST" action="" class="body" enctype="multipart/form-data">
                                        <div class="main-content-email">
                                            <div  style="text-align: center; font-weight: 600">
                                                <label>Send Attachment (Gmail)</label>
                                            </div>

                                            <div class="information col">
                                                <p> Fullname: </p>
                                                <input class="form-control inputtext" id="fullname" name="fullname" type="text"  value="<?php echo $user; ?>" readonly>
                                            </div>

                                            <div class="information col">
                                                <p> To: </p>
                                                <input required class="form-control inputtext" id="email" name="email" type="text"  value="<?php echo $emailaddress ?>" >
                                            </div>

                                            <div class="information col">
                                                <p>Subject:  </p>
                                                <input required class="form-control inputtext" id="subject" name="subject" type="text" value="Photocopy of your Payroll Receipt" > 
                                            </div>
                                        

                                            <div class="information col">
                                                <p>Attachment: </p>
                                                <input required class="form-control inputtext" style="background: white; height: 50px;" id="fileattach" name="fileattach" type="file" value=""> 
                                            </div>

                                            <div class="information col">
                                                <p>Body: </p>
                                                <textarea name="message" id="message" class="form-control inputtext" rows="32">
												</textarea>
                                                <script type="text/javascript" src="../announcement_css/js/ckeditor/ckeditor.js"></script>
                                                <script type="text/javascript">                        
                                                    CKEDITOR.replace( 'message' );
                                                </script>
                                            </div>

                                            <div class="sendi">
                                                <button name="sendemail" class="form-control viewbtn" style="width: 100%; cursor: pointer;"><span class="glyphicon glyphicon-envelope"></span> Send <i class="bx bx-send"></i></button>
                                            </div>
                                        </div>
                                    </form>
									</section>
    </main>
    <br>
    <script>
        	document.querySelector("#date_issued").valueAsDate = new Date();
    </script>
</body>
</html>