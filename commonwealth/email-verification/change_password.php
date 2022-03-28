<?php session_start();
include "db/conn.php";
include "db/user.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Change Password - Barangay Commonwealth QC.</title>

    <!-- Bootstrap Core CSS -->

    <link href="resident-css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="resident-css/style.css">
    <link rel="stylesheet" href="resident-css/resident.css">

    <!-- Icon -->
    <link rel="icon" type="image/png" href="./resident-img/Brgy-Commonwealth.png">

    <!-- Custom Fonts -->

    <link href="resident-css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <!-- Custom Animations -->

    <link rel="stylesheet" href="resident-css/animate.css">

    <style>
        .body {
            background: #ebebeb;
        }

        .navnav {
            background: #35363A;
            opacity: 0.9;
        }

        .container {
            padding: 50px 50px 50px 50px;
        }

        .contact_block-text {
            width: 100%
        }

        .cntctbtn {
            margin-bottom: 15px;
        }

        .send-message {
            margin-top: 15px;
            margin-bottom: 20px;
            margin-bottom: 20px;
        }

        .btnmargin {
            margin-bottom: 5px;
        }

        .find-us {
            padding: 40px;
        }

        .table-heading {
            background: #ebebeb;
            text-align: center;
            padding: 10px;
        }

        .left_userpersonal_info1 {
            margin-bottom: 15px;
        }

        .reminder {
            background: #FCF8F2;
            padding: 20px 20px 20px 20px;
        }

        .reminder-heading {
            color: #EEA236
        }

        .blockqoute-color {
            border-left-color: #EEA236;
        }

        .linkpath:hover {
            color: orange;
        }

        .usersel {
            pointer-events: none;
            border: 1px solid orange
        }

        .left_userpersonal_info {
            display: flex;
        }

        .guidelines {
            font-size: 11px;
            display: inline-block
        }

        .popup_mess {
            width: 100%;
        }

        .passwordwidth {
            display: absolute;
            width: 88%;
        }

        .userpersonal {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-text {
            width: 100%;
            padding: 5px;
        }

        .selec {
            padding-bottom: 50px;
        }

    
        #message {
            display: none;
            color: #000;
            position: absolute;
        }

        #message p {
            font-size: 13px;
        }

        /* Add a green text color and a checkmark when the requirements are right */
        .valid {
            color: green;
        }

        .valid:before {
            position: absolute;
            left: -25px;
            content: "✔";
        }

        /* Add a red text color and an "x" when the requirements are wrong */
        .invalid {
            color: red;
        }

        .invalid:before {
            position: absolute;
            left: -25px;
            content: "✖";
        }

        .validatiion {
            padding-left: 35px;
        }

        .formborder {
            border-style: solid;
            border-color: #ebebeb;
            border-radius: 20px;
            padding: 50px;
        }

        .passwordvalid {
            font-size: 13px;
        }
        @media only screen and (max-width: 700px) {
			.left_userpersonal_info {
				display: block;
			}

			.form-group {
				margin-bottom: 35px;
				margin-left: 15px;
			}

			input {
				width: 100%;
				padding: 5px;
			}
		}

		.form-text {
			width: 100%;
			padding: 5px;
		}

		.selec {
			padding-bottom: 50px;
		}

		@media only screen and (max-width: 500px) {
			.left_userpersonal_info {
				display: block;
			}

			.form-group {
				margin-bottom: 35px;
				margin-left: 15px;
			}

			input {
				width: 100;
				padding: 5px;
			}
		}   
        @media screen and (max-width: 800px) {
        .logdropdown-content {position: relative;}
        }
        @media screen and (max-width: 600px) {
        .logdropdown-content {position: relative;}
        }
    </style>
</head>

<body onload=display_ct() class="body">


    <header id="header">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top navnav">
            <div class="container-fluid top-nav">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand logo-top page-scroll" href="index.php">
                        <img class="brgy-logo" src="resident-img/Brgy-Commonwealth.png" alt="logo">
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="hidden nav-buttons">
                            <a href="#page-top"></a>
                        </li>
                        <li>
                            <a class="page-scroll" href="index.php">Home</a>
                        </li>
                        <li class="logdropdown">
                            <a class="page-scroll logout" href="javascript:void(0)">Announcement</a>
                            <span class="logdropdown-content">
                                <a class="page-scroll" href="academic-related.php">Academic Related</a>
                                <a class="page-scroll" href="barangayfunds.php">Barangay Funds</a>
                                <a class="page-scroll" href="latestannouncement.php">Latest Announcement</a>
                                <a class="page-scroll" href="vaccine.php">Vaccine</a>
                                <a class="page-scroll" href="barangayprograms.php">Barangay Programs</a>
                            </span>
                        </li>
                        <li>
                            <a class="page-scroll" href="contact.php">Contact Us</a>
                        </li>
                        <li>
                            <a class="page-scroll b_login" onclick="document.getElementById('id01').style.display='block'" href="#login">Login</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>

    </header>

    <!--Modal form for Login-->
    <div id="formatValidatorName">
        <div id="id01" class="modal">
            <div class="modal-content animate ">
                <span class="imgcontainer">
                    <label>
                        <img src="resident-img/Brgy-Commonwealth_1.png" alt="">
                    </label>
                </span>


                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div id="Login" class="login_container form">
                        <div class="information">
                            <input required class="inputtext control-label" id="email" name="email" type="text" placeholder="Email">
                        </div>

                        <div class="information">
                            <input required class="inputpass c_password" type="password" id="password" placeholder="Password" name="password">
                        </div>

                        <div>
                            <a href="#" class="fp">Forgot password?</a>
                        </div>
                        <div class="information">
                            <button type="submit" id="logbtn" name="logbtn" value="signin" class="log_button sign_in">
                                Sign in
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<br>
<br>
<br>
<div class="reg_form">
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onSubmit="return checkPassword(this)">
        <hr>
        <h4 style="text-align: center;" id="barangayid">Change Password</h4>
        <hr>
        <fieldset>
            <div style="display: flex; justify-content: center; text-align: center;">
                <div class="form-group ">
                    <label for="fname">Email: <i class="red">*</i></label>
                    <input type="text" class="form-control form-text" name="fname" id="fname" placeholder="Your First name"  title="Only Alphabets" required onkeyup="textOnly();">
                    <?php echo isset($error['fname']) ? $error['fname'] : ''; ?>
                    <p id="text-Alert"></p>
                </div>
               
                <div class="form-group ">
                    <label for="mname">Password:</label>
                    <input type="text" class="form-control form-text" name="mname" placeholder="(Optional)">
                </div>
                
                <div class="form-group ">
                    <label for="lname">Confirm Password: <i class="red">*</i></label>
                    <input type="text" class="form-control form-text" name="lname" placeholder="Your Lastname">
                    <?php echo isset($error['lname']) ? $error['lname'] : ''; ?>
                </div>

              
                </div>
        </fieldset>

      
      
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <button type="submit" name="regbtn" class="log_button sign_in popup_mess">
            Get Started
        </button>
        <br>
        </div>

        </div>
    </form>
    </div>
    <!-- Footer -->
    <footer>
        <div class="container-fluid wrapper">
            <div class="col-lg-12 footer-info">
                <p class="footer_dt">
                    <span id="date-time"></span>
                </p>
                <p class="footer-text">
                    For any inquiries, please Email us and visit our Facebook Page
                </p>
                <p class="footer-text">
                    <a href="https://mail.google.com/mail/barangaycommonwealth01@gmail.com" target="_blank">barangaycommonwealth0@gmail.com</a>
                    <br>
                    <a href="https://facebook.com//barangay.commonwealth.3551" target="_blank"> <i style="font-size: 20px;" class="fa fa-facebook" title="https://facebook.com//barangay.commonwealth.3551"></i></a>
                </p>
                <div class="footer-text">
                    <a>Terms of Service</a> |
                    <a>Privacy and Policy</a>
                </div>
            </div>

            <div class="col-sm-12 col-md-12 col-lg-12 copyright-bottom">
                <span class="copyright">
                    Copyright &copy; Barangay Commonwealth - 2022 Created By
                    <a href="http://comm-bms.com/index.php" target="_blank">Beta Group</a>
                </span>
            </div>
        </div>
    </footer>

    <!-- Scroll-up -->
    <div class="scroll-up">
        <a href="#header" class="page-scroll"><i class="bx bx-arrow-to-top"></i></a>
    </div>

    <!-- jQuery -->
    <script src="resident-js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="resident-js/bootstrap.min.js"></script>
    <!-- Color Settings script -->
    <script src="resident-js/settings-script.js"></script>
    <!-- Plugin JavaScript -->
    <script src="resident-js/jquery.easing.min.js"></script>
    <!-- Contact Form JavaScript -->
    <script src="resident-js/jqBootstrapValidation.js"></script>
    <!-- SmoothScroll script -->
    <script src="resident-js/smoothscroll.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="resident-js/barangay.js"></script>
    <!-- Isotope -->
    <script src="resident-js/jquery.isotope.min.js"></script>

    <script src="https://use.fontawesome.com/f7721642f4.js"></script>

    <script src="resident-js/accordions.js"></script>
    <script>
        function openContact(contactName) {
            var i;
            var x = document.getElementsByClassName("contactlist");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            document.getElementById(contactName).style.display = "block";
        }
    </script>
    <script>
        function checkPasswordMatch() {
            var password = $("#txtNewPassword").val();
            var confirmPassword = $("#txtConfirmPassword").val();

            if (password != confirmPassword)
                $("#divCheckPasswordMatch").html(" <div style='color: red;margin-left: 5px;'  class='invalid passwordvalid'> <strong>Password</strong> do not match! </div>");
            else
                $("#divCheckPasswordMatch").html(" <div style='color: green; margin-left: 5px;' class='valid passwordvalid'> <strong>Password</strong> match. </div>");
        }

        $(document).ready(function() {
            $("#txtConfirmPassword").keyup(checkPasswordMatch);
        });

        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#txtNewPassword');

        togglePassword.addEventListener('click', function(e) {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // toggle the eye slash icon
            this.classList.toggle('fa-eye-slash');
        });
    </script>

    <script>
        var myInput = document.getElementById("txtNewPassword");
        var letter = document.getElementById("letter");
        var capital = document.getElementById("capital");
        var number = document.getElementById("number");
        var length = document.getElementById("length");

        // When the user clicks on the password field, show the message box
        myInput.onfocus = function() {
            document.getElementById("message").style.display = "block";
        }

        // When the user clicks outside of the password field, hide the message box
        // myInput.onblur = function() {
        //     document.getElementById("message").style.display = "none";
        // }

        // When the user starts to type something inside the password field
        myInput.onkeyup = function() {
            // Validate lowercase letters
            var lowerCaseLetters = /[a-z]/g;
            if (myInput.value.match(lowerCaseLetters)) {
                letter.classList.remove("invalid");
                letter.classList.add("valid");
            } else {
                letter.classList.remove("valid");
                letter.classList.add("invalid");
            }

            // Validate capital letters
            var upperCaseLetters = /[A-Z]/g;
            if (myInput.value.match(upperCaseLetters)) {
                capital.classList.remove("invalid");
                capital.classList.add("valid");
            } else {
                capital.classList.remove("valid");
                capital.classList.add("invalid");
            }

            // Validate numbers
            var numbers = /[0-9]/g;
            if (myInput.value.match(numbers)) {
                number.classList.remove("invalid");
                number.classList.add("valid");
            } else {
                number.classList.remove("valid");
                number.classList.add("invalid");
            }

            // Validate length
            if (myInput.value.length >= 8) {
                length.classList.remove("invalid");
                length.classList.add("valid");
            } else {
                length.classList.remove("valid");
                length.classList.add("invalid");
            }
        }
    </script>
    <script>
        function textOnly(){
            var str = document.getElementById("fname").value;
            var textAlert = document.getElementById("text-Alert").value;
            if(!((/^[a-zA-Z]+$/.test(str) )|| str.length==0)){
                textAlert.style.display="block";
                textAlert.innerHTML = "Only Alphabets!";
                textFlag = false;
            }
            else{
                textAlert.style.display = "none";
                textFlag = true;
            }
        }
    </script>
 
</body>

</html>