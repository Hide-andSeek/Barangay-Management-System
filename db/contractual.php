<?php
DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');
error_reporting(~E_NOTICE);

// 1.1 GCash Barangay ID Payment

if($_SERVER['REQUEST_METHOD']=='POST')
  {
if(isset($_POST['timeinbtn'])){
	
    $id = $_POST['user_id'];;

    $username = $_POST['username'];
	$user_id = $_POST['user_id'];
	$time_loged = date("Y-m-d H:i:s",strtotime("now"));
	$date_logged = date("Y-m-d", strtotime("now"));

	$sql_create_acc = "SELECT COUNT(date_logged) AS num FROM users_activity WHERE date_logged = :date_logged AND user_id = $id";
	$stmt = $db->prepare($sql_create_acc);
	$stmt->bindValue(':date_logged', $date_logged);
	$stmt->execute();
	
	$count_row = $stmt->fetch(PDO::FETCH_ASSOC);
	
	if($count_row['num']>0){
        $_SESSION['status'] ="Time is already set! Come Back Tommorrow";
        $_SESSION['status_code'] ="warning";
    
	
	}else{
		
		$stmt = $db->prepare("INSERT INTO users_activity (username, user_id, time_loged, date_logged) VALUES (:username, :user_id, :time_loged, :date_logged)");

        $stmt->bindParam(':username', $username);
		$stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':time_loged', $time_loged);
		$stmt->bindParam(':date_logged', $date_logged);

	if($stmt->execute()){
		$_SESSION['status'] ="Time In Recorded";
        $_SESSION['status_code'] ="success";
        
	}else{
        $_SESSION['status'] ="Error";
        $_SESSION['status_code'] ="error";
		}	
	}
}
  }
?>


<?php
if($_SERVER['REQUEST_METHOD']=='POST')
{
if(isset($_POST['timeoutbtn'])){
  
  $id = $_POST['user_id'];;

  $username = $_POST['username'];
  $user_id = $_POST['user_id'];
  $time_out = date("Y-m-d H:i:s",strtotime("now"));
  $date_logged_off = date("Y-m-d", strtotime("now"));

  $sql_create_acc = "SELECT COUNT(date_logged_off) AS num FROM user_activityout WHERE date_logged_off = :date_logged_off AND user_id = $id";
  $stmt = $db->prepare($sql_create_acc);
  $stmt->bindValue(':date_logged_off', $date_logged_off);
  $stmt->execute();
  
  $count_row = $stmt->fetch(PDO::FETCH_ASSOC);
  
  if($count_row['num']>0){
      $_SESSION['status'] ="Time is already set! Come Back Tommorrow";
      $_SESSION['status_code'] ="warning";
  
  
  }else{
      
      $stmt = $db->prepare("INSERT INTO user_activityout (username, user_id, time_out, date_logged_off) VALUES (:username, :user_id, :time_out, :date_logged_off)");

      $stmt->bindParam(':username', $username);
      $stmt->bindParam(':user_id', $user_id);
      $stmt->bindParam(':time_out', $time_out);
      $stmt->bindParam(':date_logged_off', $date_logged_off);

  if($stmt->execute()){
      $_SESSION['status'] ="Time In Recorded";
      $_SESSION['status_code'] ="success";
      
  }else{
      $_SESSION['status'] ="Error";
      $_SESSION['status_code'] ="error";
      }	
  }
}
}
?>