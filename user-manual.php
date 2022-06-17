<!-- <?php
        $myButtonText = "Disabled";
        ?> -->
<?php session_start();
include "db/conn.php";

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/AdminLTE.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" type="image/png" href="./resident-img/Brgy-Commonwealth.png">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <title>Employee Time Log: Barangay Commonwealth</title>
    <style>
        #message {
            display: none;

            color: #000;
            position: relative;
        }

        #message p {
            padding: 15px 45px;
            font-size: 13px;
        }

        /* Add a green text color and a checkmark when the requirements are right */
        .valid {
            color: green;
        }

        .valid:before {
            position: relative;
            left: -35px;
            content: "✔";
        }

        /* Add a red text color and an "x" when the requirements are wrong */
        .invalid {
            color: red;
        }

        .invalid:before {
            position: relative;
            left: -35px;
            content: "✖";
        }
    </style>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- <div class="login-logo">
            <p id="date"></p>
            <p id="time" class="bold"></p>
        </div> -->

        <div class="login-box-body">
            <h4 class="login-box-msg">Time In & Out</h4>

            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div style="display: flex; justify-content: center; align-items: center;">
                    <img src="resident-img/Brgy-Commonwealth_1.png" style="width: 122px; height: 120px" alt="">
                </div>
                <br>
                <br>
                <div class="form-group has-feedback">
                    <input class=" form-control input-lg" id="username" name="username" type="text" placeholder="Fullname" style="font-size: 14px;" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);">
                    <span class="form-control-feedback"> <i class="bx bx-user-circle" style="font-size: 18px; padding-top: 9px;"></i></span>
                    <br>
                    <input class="form-control input-lg" style="font-size: 14px;" id="employeeid" name="user_no" type="password" placeholder="Password" pattern="(?=.*\d)(?=.*)(?=.*).{8,}" title="Must contain at least 8 or more characters">
                    <div style="float:right; margin-top: -35px; margin-right: 10px;">
                        <i class="bx bx-show showpass ipass" id="employeetogglePassword" style="font-size: 18px; margin-left:-20px; cursor: pointer;"></i>
                    </div>
                    <div id="message">
                        <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-4">
                        <button type="submit" id="btn-submit" class="btn btn-primary btn-block btn-flat " name="regularemployee"><i class="fa fa-sign-in"></i> Sign In</button>
                    </div>
                </div>
                <iframe type="file" style="width:100%; height: 500px;" src="../img/fileupload_blotter/<?php echo $data['blotterid_image']; ?>">Here's the Document</iframe>
                <br>
            </form>
            <div style="float: right;">
                <a href="employee-login.php"> Go to Department <i class="bx bx-skip-next"></i></a>
            </div>
        </div>

    </div>


    <!-- jQuery 3 -->
    <script src="js/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Moment JS -->
    <script src="js/moment.js"></script>
</body>

</html>