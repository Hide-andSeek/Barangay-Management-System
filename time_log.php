<?php
session_start();

include "db/conn.php";


if (!isset($_SESSION["type"])) {
  header("location: reg_employee_log.php");
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
<?php
$uid = '';

if (isset($_SESSION['uid'])) {
  $uid = $_SESSION['uid'];
}
?>

<?php
// function start_session()
// {
// 	$_SESSION['username']='';
// 	session_start();
// if(empty($_SESSION['username']))
// {
// 	header("Location:reg_employee_log.php");
// 	exit();
// 	}
// }
// echo start_session();
// function db_query()
// {
// global $db;
// $stmt=$db->prepare( "SELECT * FROM usersdb where user_id=:uid") ;
// if($stmt->execute(['uid'=>$_SESSION['email']]))
// {
// 	$row=$stmt->fetch(PDO::FETCH_ASSOC);
// 	$count=$stmt->rowcount();
// 	       }
// 	}
// 	echo db_query();
?>

<?php
$myButtonText = "Disabled";
?>

<?php
$user_name = '';
$query = $db->query("SELECT * FROM usersdb where user_id='$uid'");
while ($roww = $query->fetch()) {
  $user_name = $roww['username'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="css/AdminLTE.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/font-awesome.css">

  <script src="resident-js/sweetalert.min.js"></script>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>


  <title>Document</title>
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
  <div class="login-box">
    <div class="login-logo">
      <p id="date"></p>
      <p id="time" class="bold"></p>
    </div>

    <div>
      <div class="login-box-body">
        <h4 class="login-box-msg">Enter Employee ID</h4>

        <form method="post" action="">
          <div style="display: flex; justify-content: center; align-items: center;">
            <img src="resident-img/Brgy-Commonwealth_1.png" style="width: 122px; height: 120px" alt="">
          </div>
          <br>
          <br>

          <div class="form-group has-feedback">
            <input class="form-control" name="username" type="text" value="<?php echo $user_name; ?>" readonly>
            <br>
            <input class="form-control" name="user_id" type="number" value="<?php echo $uid; ?>" readonly>

            <div style="float:right; margin-top: -25px; margin-right: 10px;">
              <i class="bx bxs-key showpass ipass" id="employeetogglePassword" style="font-size: 18px; margin-left:-20px; cursor: pointer;"></i>
            </div>
            <!-- <a href="contractual_logout.php">Logout</a> -->
          </div>

          <div class="row">
            <div class="col-xs-4">
              <button onclick="changeText(this); get_accept('<?php echo $myButtonText; ?>'); this.disabled='disabled';" type="submit" id="btn-submit" class="btn btn-primary btn-block btn-flat" name="timeinbtn"><i class="bx bx-log-in"></i> In</button>
            </div>
           
            <div class="col-xs-4" >
              <button onclick="changeText(this); get_accept('<?php echo $myButtonText; ?>'); this.disabled='disabled';" type="submit" id="btn-submit" class="btn btn-primary btn-block btn-flat" name="timeoutbtn"><i class="bx bx-log-out"></i> Out</button>
            </div>

            <div class="col-xs-4">
              <a href="contractual_logout.php" class="btn btn-primary btn-block btn-flat">Logout</a>
            </div>
          </div>
        </form>
      </div>
      <br>
      <div class="login-box-body">
        <h4 class="login-box-msg">Recent Activity</h4>
        <?php
        $stmt = $db->prepare("SELECT * FROM users_activity where user_id='$uid' AND date_logged AND timelog_status='Pending'");
        $stmt->execute();
        $imagelist = $stmt->fetchAll();
        if (count($imagelist) > 0) {
          foreach ($imagelist as $image) {
        ?>
            <table id="viewdetails" style="margin-bottom: 30px; margin-top: 30px; text-align: center;">
              <thead>
                <tr class="t_head">
                  <th width="5%" style="text-align: center; margin: 20px;">Activity ID</th>
                  <th width="5%" style="text-align: center; margin: 20px;">Time Logged</th>
                  <th width="5%" style="text-align: center; margin: 20px;">Date Logged</th>
                </tr>
              </thead>

              <tbody>
                <tr class="table-row">
                  <td><?php echo $image['activity_id']; ?></td>
                  <td><?php echo $image['time_loged']; ?> </td>
                  <td><?php echo $image['date_logged']; ?></td>
                </tr>
              </tbody>

            </table>
        <?php
          }
        } else {
          echo "<div class='errormessage' style='text-align: center;'>
                        <i class='bx bx-error'></i>
                       No Time In Activity Yet!
              </div>";
        }
        ?>

        <?php
        $stmt = $db->prepare("SELECT * FROM user_activityout where user_id='$uid' AND date_logged_off  AND timeout_status='Pending'");
        $stmt->execute();
        $imagelist = $stmt->fetchAll();
        if (count($imagelist) > 0) {
          foreach ($imagelist as $image) {
        ?>
            <table id="viewdetails" style="margin-bottom: 30px; margin-top: 30px; text-align: center;">
              <thead>
                <tr class="t_head">
                  <th width="5%" style="text-align: center; margin: 20px;">Activity ID</th>
                  <th width="5%" style="text-align: center; margin: 20px;">Time Out</th>
                  <th width="5%" style="text-align: center; margin: 20px;">Date Out</th>
                </tr>
              </thead>

              <tbody>
                <tr class="table-row">
                  <td><?php echo $image['outactivity_id']; ?></td>
                  <td><?php echo $image['time_out']; ?> </td>
                  <td><?php echo $image['date_logged_off']; ?></td>
                </tr>
              </tbody>

            </table>
        <?php
          }
        } else {
          echo "<div class='errormessage' style='text-align: center;'>
                        <i class='bx bx-error'></i>
                       No Time Out Activity Yet!
              </div>";
        }
        ?>
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

  
    <script type="text/javascript">
      $(function() {
        var interval = setInterval(function() {
          var momentNow = moment();
          $('#date').html(momentNow.format('dddd').substring(0, 3).toUpperCase() + ' - ' + momentNow.format('MMMM DD, YYYY'));
          $('#time').html(momentNow.format('hh:mm:ss A'));
        }, 100);

        $('#attendance').submit(function(e) {
          e.preventDefault();
          var attendance = $(this).serialize();
          $.ajax({
            type: 'POST',
            url: 'attendance.php',
            data: attendance,
            dataType: 'json',
            success: function(response) {
              if (response.error) {
                $('.alert').hide();
                $('.alert-danger').show();
                $('.message').html(response.message);
              } else {
                $('.alert').hide();
                $('.alert-success').show();
                $('.message').html(response.message);
                $('#employee').val('');
              }
            }
          });
        });

      });
    </script>
    <script>
      function changeText(el) {
        el.innerHTML = '<?php echo $myButtonText; ?>';
      }
    </script>

    <script>
      $(document).ready(function() {



        $("#my-form").submit(function(e) {



          $("#btn-submit").attr("disabled", true);



          return true;



        });

      });
    </script>


</body>

</html>