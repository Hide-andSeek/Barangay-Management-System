<?php
session_start();

require_once 'db/conn.php';
require_once 'send_email.php';

if (!isset($_SESSION["type"])) {
    header("location: 0index.php");
}

$user = '';
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
}

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
    <link rel="stylesheet" href="css/styles.css">

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--Font Styles-->
    <link rel="icon" type="image/png" href="img/Brgy-Commonwealth.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&display=swap" rel="stylesheet">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!--<title> Responsive Sidebar Menu  | CodingLab </title>-->
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/captain.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> Blotter Case - BPSO Department </title>

    <style>
        * {
            font-size: 13px;
        }

        .complaint {
            padding: 20px;
            background: #D6EACA;
            border: 1px solid #DDDDDD;
            border-radius: 3px;
            min-height: 100px;
            margin-bottom: 20px;
        }

        .table-complaint {
            width: 100%;
            height: 100%;
            border-collapse: collapse;
        }

        .table-complaint,
        .table-complaint tr,
        .table-complaint tr th,
        .table-complaint tr td {
            border: 1px solid #ddd;
        }

        .table-complaint tr th,
        .table-complaint tr td {
            padding: 10px;
        }

        .table-complaint tr th {
            background: #D6EACA;
            width: 200px;
        }

        .btnmargin {
            margin-bottom: 5px;
        }

        /* The Modal (background) */
        .modal {
            display: none;
            position: absolute;
            z-index: 9999;
            padding-top: 50px;
            /* Location of the box */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 115%;
            /* Full height */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.6);
            /* Black w/ opacity */
        }

        /* Modal Content (image) */
        .modal-content {
            display: absolute;
            margin: auto;
            max-width: 700px;
            width: 60%;
        }

        /* Add Animation */
        .modal-content,
        #caption {
            -webkit-animation-name: zoom;
            -webkit-animation-duration: 0.6s;
            animation-name: zoom;
            animation-duration: 0.6s;
        }

        @-webkit-keyframes zoom {
            from {
                -webkit-transform: scale(0)
            }

            to {
                -webkit-transform: scale(1)
            }
        }

        @keyframes zoom {
            from {
                transform: scale(0)
            }

            to {
                transform: scale(1)
            }
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

        .emailwidth {
            width: 95%;
        }

        .main-content {
            display: flex;
        }

        .main-content-email {
            padding: 20px;
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
    </style>
</head>

<body>
    <!-- Side Navigation Bar-->
    <div class="sidebar">
        <div class="logo-details">
            <img class="brgy_icon" src="img/Brgy-Commonwealth.png" alt="" />
            <div class="logo_name">BPSO Department</div>
            <i class='bx bx-menu menu' id="btn"></i>
        </div>
        <ul class="nav-list">
            <li>
                <a class="side_bar" href="bpso.php">
                    <i class='bx bx-grid-alt dash'></i>
                    <span class="links_name">Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
            </li>
            <li>
                <a class="side_bar" href="bpso_newCases.php">
                    <i class='fas fa-briefcase'></i>
                    <span class="links_name">New Cases</span>
                </a>
                <span class="tooltip">New Cases</span>
            </li>
            <li class="active">
                <a class="side_bar" href="bpso_blotterCases.php">
                    <i class='fas fa-user-check'></i>
                    <span class="links_name">Blotter Cases</span>
                </a>
                <span class="tooltip">Blotter Cases</span>
            </li>
            <li>
                <a class="side_bar" href="bpso_deniedCases.php">
                    <i class='fas fa-user-minus'></i>
                    <span class="links_name">Denied Cases</span>
                </a>
                <span class="tooltip">Denied Cases</span>
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
                    <h5>BARANGAY PUBLIC SAFETY OFFICER (BPSO) > View Details
                        <a href="#" class="circle"><img src="img/dt.png"></a>
                    </h5>
                </div>
            </div>
        </section>
        <br><br>

        <div style="float: right; margin-right: 50px;">
            <button style="background: none; padding: 0;" onclick="document.getElementById('eemail').style.display='block'">
                <img src="img/gmail.png" title="Send a message" class="hoverback" style="margin-left: 10px; width: 40px; height: 40px; cursor: pointer;" alt="Gmail">
            </button>
            <button style="background: none; padding: 0;" onclick="document.getElementById('ssms').style.display='block'">
                <img src="img/sms.png" title="Send a message" class="hoverback" style="margin-left: 10px; width: 40px; height: 40px; cursor: pointer;" alt="Gmail">
            </button>
            <a onclick="javascript:history.go(-1);">
                <img src="img/back.png" title="Back?" class="hoverback" style="margin-right: 20px; width: 50px; height: 50; cursor: pointer;" alt="Back?">
            </a>
        </div>

        <?php
        if (isset($_GET["id"]) && !empty($_GET["id"])) {
            $complaintID = $_GET["id"];
        } else {
            echo "<script>history.go(-1);</script>";
        }

        $sql = "
					SELECT
						ac.`admincomp_id`,
						ac.`complaints`,
						ac.`n_complainant`,
						ac.`comp_age`,
						ac.`comp_gender`,
						ac.`comp_address`,
						ac.`inci_address`,
						ac.`contactno`,
						ac.`bemailadd`,
						ac.`n_violator`,
						ac.`violator_age`,
						ac.`violator_gender`,
						ac.`relationship`,
						ac.`violator_address`,
						ac.`witnesses`,
						ac.`dept`,
						ac.`app_date`,
						ac.`app_by`
					FROM admin_complaints ac
					WHERE admincomp_id = ?;
				";
        $stmt = $db->prepare($sql);
        $stmt->execute([$complaintID]);
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch()) {
        ?>
              

                <?php
                if (isset($_SESSION['statusadmincomp'])) {
                    if ($_SESSION['statusadmincomp'] == "ok") {
                ?>
                        <div style="text-align: center;" class="alert alert-info messcompose"><?php echo $_SESSION['resultadmincomp'] ?> <i style="font-size:20px;" class="bx bx-checkbox-checked"></i> <?php echo $row['bemailadd']; ?></div>
                    <?php } else { ?>
                        <div class="alert alert-danger messcompose"><?php echo $_SESSION['resultadmincomp'] ?></div>
                <?php
                    }
                    unset($_SESSION['resultadmincomp']);
                    unset($_SESSION['statusadmincomp']);
                }
                ?>
                <div class="container my-5">
                    <div style="margin-left: 60px; margin-right: 60px;">
                        <label><strong>Complaint: </strong></label>
                        <div class="complaint"><?php echo $row['complaints']; ?></div>
                    </div>
                    <div class="row mb-3" style="margin-left: 50px; margin-right: 50px;">
                        <div class="col-lg-6 mb-3">
                            <table class="table-complaint">
                                <tr>
                                    <th>ID No.</th>
                                    <td><strong><?php echo $row['admincomp_id']; ?></strong></td>
                                </tr>
                                <tr>
                                    <th>Complainant's Name</th>
                                    <td><strong><?php echo ucwords($row['n_complainant']); ?></strong></td>
                                </tr>
                                <tr>
                                    <th>Complainant's Age</th>
                                    <td><?php echo $row['comp_age']; ?></td>
                                </tr>
                                <tr>
                                    <th>Complainant's Gender</th>
                                    <td><?php echo ucwords($row['comp_gender']); ?></td>
                                </tr>
                                <tr>
                                    <th>Complainant's Address</th>
                                    <td><?php echo ucwords($row['comp_address']); ?></td>
                                </tr>
                                <tr>
                                    <th>Incident Address</th>
                                    <td><?php echo ucwords($row['inci_address']); ?></td>
                                </tr>
                                <tr>
                                    <th>Contact No.</th>
                                    <td><?php echo $row['contactno']; ?></td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td><?php echo $row['bemailadd']; ?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <table class="table-complaint">
                                <tr>
                                    <th>Name of Accused</th>
                                    <td><strong><?php echo ucwords($row['n_violator']); ?></strong></td>
                                </tr>
                                <tr>
                                    <th>Accused Age</th>
                                    <td><?php echo $row['violator_age']; ?></td>
                                </tr>
                                <tr>
                                    <th>Accused Gender</th>
                                    <td><?php echo ucwords($row['violator_gender']); ?></td>
                                </tr>
                                <tr>
                                    <th>Relationship</th>
                                    <td><?php echo $row['relationship']; ?></td>
                                </tr>
                                <tr>
                                    <th>Accused Address</th>
                                    <td><?php echo ucwords($row['violator_address']); ?></td>
                                </tr>
                                <tr>
                                    <th>Witnesses</th>
                                    <td><?php echo $row['witnesses']; ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="row" style="margin-left: 40px; margin-right: 50px;">
                        <div class="col-lg-12">
                            <div class="form-group mb-3" style="width: 100%; height: auto;">
                                <label for="dept">Department:</label>
                                <input type="text" class="form-control" name="dept" id="dept" value="<?php echo $row['dept']; ?>" disabled>
                            </div>
                            <div class="form-group mb-3" style="width: 100%; height: auto;">
                                <label for="app_date">Approval Date:</label>
                                <input type="text" class="form-control" name="app_date" id="app_date" value="<?php echo $row['app_date']; ?>" disabled>
                            </div>
                            <div class="form-group mb-3" style="width: 100%; height: auto;">
                                <label for="app_by">Facilated By:</label>
                                <input type="text" class="form-control" name="app_by" id="app_by" value="<?php echo strtoupper($row['app_by']); ?>" disabled>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Modal form for Login-->
                <div id="formatValidatorName">
                    <div id="eemail" class="modal">
                        <div class="modal-content animate">
                            <span onclick="document.getElementById('eemail').style.display='none'" class="topright">&times;</span>
                            <form method="POST" action="" class="body" enctype="multipart/form-data">
                                <div class="main-content-email">
                                    <div class="main-content main-content1 mb-3">
                                        <div class="information col">
                                            <label for="fullname"> Fullname: </label>
                                            <input class="form-control emailwidth" style="font-size:13px" id="fullname" name="fullname" value="<?php echo $row['n_complainant']; ?> " type="text" placeholder="Enter Fullname" required>
                                        </div>
                                        <div class="information col">
                                            <label for="email"> To: </label>
                                            <input required class="form-control emailwidth" id="email" name="email" style="width:100%; font-size:13px" value="<?php echo $row['bemailadd']; ?>" type="email" placeholder="Enter Email Address">
                                        </div>
                                    </div>
                                    <div class="main-content mb-3">
                                        <div class="information col">
                                            <label for="subject">Subject:</label>
                                            <input required class="form-control" style="width: 100%; font-size:13px" id="subject" name="subject" type="text" placeholder="Subject">
                                        </div>
                                    </div>
                                    <div class="information col mb-3">
                                        <label for="message">Body: </label>
                                        <textarea name="message" id="message" class="form-control inputtext" rows="32" placeholder="Your message"></textarea>
                                        <script type="text/javascript" src="announcement_css/js/ckeditor/ckeditor.js"></script>
                                        <script type="text/javascript">
                                            CKEDITOR.replace('message');
                                        </script>
                                    </div>
                                    <div class="sendi">
                                        <button name="admincompsendemail" class="form-control viewbtn" style="margin-top: 10px; width: 100%; cursor: pointer;font-size:13px"><span class="glyphicon glyphicon-envelope"></span> Send <i class="bx bx-send"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        <?php }
        } ?>


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
                                    <input type="text" class="form-control emailwidth" id="fullname" name="fullname" value="" placeholder="Enter Fullname" required>
                                </div>
                                <div class="information col">
                                    <p> Contact Number: </p>
                                    <input type="text" class="form-control emailwidth" id="number" name="number" value="" placeholder="Enter Contact No" required>
                                </div>
                            </div>
                            <div class="information col">
                                <p>Body: </p>
                                <textarea name="msg" id="msg" class="form-control inputtext" rows="16" placeholder="Your message" required></textarea>
                            </div>
                            <div class="sendi">
                                <button name="sendSms" class="form-control viewbtn" style="margin-top: 10px; width: 100%; cursor: pointer;"><span class="glyphicon glyphicon-envelope"></span> Send <i class="bx bx-send"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>