<?php
session_start();
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
  <link rel="icon" type="image/png" href="./resident-img/Brgy-Commonwealth.png">
  <script src="resident-js/sweetalert.min.js"></script>
  <link rel="stylesheet" href="css/preloader.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>


  <title>Reset Password: Barangay Commonwealth QC.</title>
  <style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }

    #viewdetails {
      border-collapse: collapse;
      width: 100%;

    }

    #viewdetails td,
    #viewdetails th {
      border: 1px solid #ddd;
      padding: 8px;
    }

    #viewdetails tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    #viewdetails tr:hover {
      background-color: #ddd;
    }

    #viewdetails th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #D9DDDC;
      color: black;
    }

    .btnmargin {
      margin-bottom: 5px;
    }
  </style>
</head>

<body class="hold-transition login-page">
    <div id="loader-wrapper">
        <div id="loader"></div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>

  <div class="login-box">
    <div>
      <div class="login-box-body">
        <h4 class="login-box-msg">Reset Password</h4>
    
        <?php
        if(isset($_SESSION['status']))
        {
          ?>
          <div>
              <h5><?= $_SESSION['status']; ?></h5>
          </div>
          <?php
          unset($_SESSION['status']);
        }
        ?>
        <form method="post" action="password_reset_code.php">
          <div style="display: flex; justify-content: center; align-items: center;">
            <img src="resident-img/Brgy-Commonwealth_1.png" style="width: 122px; height: 120px" alt="">
          </div>
          <br>
          <br>

          <div class="form-group has-feedback">
            <label>Email Address</label>
            <input class="form-control" name="email" type="email" placeholder="Place your email address"  pattern="^.*@gmail\.com$" title="This should be @gmail.com" required>

            <div style="float:right; margin-top: -25px; margin-right: 10px;">
              <i class="bx bx-message-alt showpass ipass" id="employeetogglePassword" style="font-size: 18px; margin-left:-20px; cursor: pointer;"></i>
            </div>
            <!-- <a href="contractual_logout.php">Logout</a> -->
          </div>

          <div class="row">
            <div class="col-xs-4">
              <button onclick="changeText(this); get_accept('<?php echo $myButtonText; ?>'); this.disabled='disabled';" type="submit" id="btn-submit" class="btn btn-primary btn-block btn-flat" name="password_reset_link"> Send a link</button>
            </div>
          </div>
        </form>
        <div style="float: right;">
            Back to <a href="index.php"> Home Page</a>
        </div>
        <br>
      </div>
      <br>
      <br>
    </div>


    <!-- jQuery 3 -->
    <script src="js/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Moment JS -->
    <script src="js/moment.js"></script>

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

    <script src="js/jquery.min.js"></script>
    <script src="js/preloader.js"></script>
</body>
</html>