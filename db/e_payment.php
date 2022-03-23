<?php
DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');
error_reporting(~E_NOTICE);
/* 
----------------------------------------------------------------
			TABLE OF CONTENTS: PREPARED STATEMENT
----------------------------------------------------------------
Insertion of Data with Image and Files
1.0 Paymaya Barangay ID
2.0 Business Permit
3.0 Barangay Indigency
4.0 Barangay Clearance
5.0 File Blottering
6.0 Admin Blotter

----------------------------------------------------------------
*/

// 1.0 Paymaya Barangay ID
if($_SERVER['REQUEST_METHOD']=='POST')
{
if(isset($_POST['brgyidpaymentbtn'])){
	
    $document_id = $_POST['document_id'];
	$fullname = $_POST['fullname'];
    $contact_no = $_POST['contact_no'];
	$reference_no = $_POST['reference_no'];
    $document_type = $_POST['document_type'];
	$payment_status = $_POST['payment_status'];
    $payment_method = $_POST['payment_method'];
    $amount = $_POST['amount'];
    // $time_added =date("Y-m-d H:i:s",strtotime("now"));
	// $date_added =date("Y-m-d", strtotime("now"));

	$sql_create_acc = "SELECT COUNT(document_id) AS num FROM payments WHERE document_id = :document_id";
	$stmt = $db->prepare($sql_create_acc);
	$stmt->bindValue(':document_id', $document_id);
	$stmt->execute();
	
	$count_row = $stmt->fetch(PDO::FETCH_ASSOC);
	
	if($count_row['num']>0){
        $_SESSION['status'] ="Session Expired!";
        $_SESSION['status_code'] ="warning";
    
	
	}else{
		
		$stmt = $db->prepare("INSERT INTO payments (document_id,fullname, contact_no, reference_no, document_type, payment_status, payment_method, amount) VALUES (:document_id, :fullname, :contact_no, :reference_no, :document_type, :payment_status, :payment_method, :amount)");

        $stmt->bindParam(':document_id', $document_id);
		$stmt->bindParam(':fullname', $fullname);
        $stmt->bindParam(':contact_no', $contact_no);
		$stmt->bindParam(':reference_no', $reference_no);
        $stmt->bindParam(':document_type', $document_type);
		$stmt->bindParam(':payment_status', $payment_status);
		$stmt->bindParam(':payment_method', $payment_method);
        $stmt->bindParam(':amount', $amount);
        // $stmt->bindParam(':time_added', $time_added);
        // $stmt->bindParam(':date_added', $date_added);

	if($stmt->execute()){
		$_SESSION['status'] ="Submitted Successfully";
        $_SESSION['status_code'] ="success";
        
	}else{
        $_SESSION['status'] ="Error";
        $_SESSION['status_code'] ="error";
		}	
	}
}
}
  if(isset($_GET['id'])){
                    $ID = $_GET['id'];
                }else{
                    $ID = "";
                }
                
                // create array variable to store data from database
                $data = array();
                
                // get all data from menu table and category table
                $sql_query = "SELECT app_brgyid, fname, mname, lname, address, birthday, placeofbirth, precintno,contact_no, emailadd, guardianname, emrgncycontact, reladdress, dateissue, id_image, brgyidfilechoice,status FROM approved_brgyids WHERE status = 'Approved' AND app_brgyid = ?";
                
                
                $stmt = $connect->stmt_init();
                if($stmt->prepare($sql_query)) {	
                    // Bind your variables to replace the ?s
                    $stmt->bind_param('s', $ID);
                    // Execute query
                    $stmt->execute();
                    // store result 
                    $stmt->store_result();
                    $stmt->bind_result($data['app_brgyid'], 
                            $data['fname'],
                            $data['mname'],
                            $data['lname'],
                            $data['address'],
                            $data['birthday'],
                            $data['placeofbirth'],
                            $data['precintno'],
                            $data['contact_no'],
                            $data['emailadd'],
                            $data['guardianname'],
                            $data['emrgncycontact'],
                            $data['reladdress'],
                            $data['dateissue'],
                            $data['id_image'],
                            $data['brgyidfilechoice'],
                            $data['status']
                            );
                    $stmt->fetch();
                    $stmt->close();
                }  

// 1.1 GCash Barangay ID Payment
if(isset($_POST['paymentbtn'])){
	
    $document_id = $_POST['document_id'];
	$fullname = $_POST['fullname'];
    $contact_no = $_POST['contact_no'];
	$reference_no = $_POST['reference_no'];
    $document_type = $_POST['document_type'];
	$payment_status = $_POST['payment_status'];
    $payment_method = $_POST['payment_method'];
    $amount = $_POST['amount'];

	$sql_create_acc = "SELECT COUNT(document_id) AS num FROM payments WHERE document_id = :document_id";
	$stmt = $db->prepare($sql_create_acc);
	$stmt->bindValue(':document_id', $document_id);
	$stmt->execute();
	
	$count_row = $stmt->fetch(PDO::FETCH_ASSOC);
	
	if($count_row['num']>0){
        $_SESSION['status'] ="Session Expired!";
        $_SESSION['status_code'] ="warning";
    
	
	}else{
		
		$stmt = $db->prepare("INSERT INTO payments (document_id,fullname, contact_no, reference_no, document_type, payment_status, payment_method, amount) VALUES (:document_id, :fullname, :contact_no, :reference_no, :document_type, :payment_status, :payment_method, :amount)");

        $stmt->bindParam(':document_id', $document_id);
		$stmt->bindParam(':fullname', $fullname);
        $stmt->bindParam(':contact_no', $contact_no);
		$stmt->bindParam(':reference_no', $reference_no);
        $stmt->bindParam(':document_type', $document_type);
		$stmt->bindParam(':payment_status', $payment_status);
		$stmt->bindParam(':payment_method', $payment_method);
        $stmt->bindParam(':amount', $amount);

	if($stmt->execute()){
		$_SESSION['status'] ="Submitted Successfully";
        $_SESSION['status_code'] ="success";
        
	}else{
        $_SESSION['status'] ="Error";
        $_SESSION['status_code'] ="error";
		}	
	}
}



// 1.2 GCash Barangay ID Payment
if(isset($_POST['clearancepaymentbtn'])){
	
    $document_id = $_POST['document_id'];
	$fullname = $_POST['fullname'];
    $contact_no = $_POST['contact_no'];
	$reference_no = $_POST['reference_no'];
    $document_type = $_POST['document_type'];
	$payment_status = $_POST['payment_status'];
    $payment_method = $_POST['payment_method'];
    $amount = $_POST['amount'];

	$sql_create_acc = "SELECT COUNT(document_id) AS num FROM payments WHERE document_id = :document_id";
	$stmt = $db->prepare($sql_create_acc);
	$stmt->bindValue(':document_id', $document_id);
	$stmt->execute();
	
	$count_row = $stmt->fetch(PDO::FETCH_ASSOC);
	
	if($count_row['num']>0){
        $_SESSION['status'] ="Session Expired!";
        $_SESSION['status_code'] ="warning";
    
	
	}else{
		
		$stmt = $db->prepare("INSERT INTO payments (document_id,fullname, contact_no, reference_no, document_type, payment_status, payment_method, amount) VALUES (:document_id, :fullname, :contact_no, :reference_no, :document_type, :payment_status, :payment_method, :amount)");

        $stmt->bindParam(':document_id', $document_id);
		$stmt->bindParam(':fullname', $fullname);
        $stmt->bindParam(':contact_no', $contact_no);
		$stmt->bindParam(':reference_no', $reference_no);
        $stmt->bindParam(':document_type', $document_type);
		$stmt->bindParam(':payment_status', $payment_status);
		$stmt->bindParam(':payment_method', $payment_method);
        $stmt->bindParam(':amount', $amount);

	if($stmt->execute()){
		$_SESSION['status'] ="Submitted Successfully";
        $_SESSION['status_code'] ="success";
        
	}else{
        $_SESSION['status'] ="Error";
        $_SESSION['status_code'] ="error";
		}	
	}
}

if(isset($_GET['id'])){
    $ID = $_GET['id'];
    }else{
    $ID = "";
}
                 
// create array variable to store data from database
$data = array();
                 
 // get all data from menu table and category table
$sql_query = "SELECT app_brgyid, fname, mname, lname, address, birthday, placeofbirth, precintno,contact_no, emailadd, guardianname, emrgncycontact, reladdress, dateissue, id_image, brgyidfilechoice,status FROM approved_brgyids WHERE status = 'Approved' AND app_brgyid = ?";
                 
$stmt = $connect->stmt_init();
if($stmt->prepare($sql_query)) {	
    // Bind your variables to replace the ?s
    $stmt->bind_param('s', $ID);
     // Execute query
    $stmt->execute();
    // store result 
    $stmt->store_result();
    $stmt->bind_result($data['app_brgyid'], 
        $data['fname'],
        $data['mname'],
        $data['lname'],
        $data['address'],
        $data['birthday'],
        $data['placeofbirth'],
        $data['precintno'],
        $data['contact_no'],
        $data['emailadd'],
        $data['guardianname'],
        $data['emrgncycontact'],
        $data['reladdress'],
        $data['dateissue'],
        $data['status'],
        $data['brgyidfilechoice'],
        $data['id_image']
        );
    $stmt->fetch();
    $stmt->close();
}
                 
// 1.2 Paymaya Clearance Payment
if(isset($_POST['clearancepaymayabtn'])){
	
    $document_id = $_POST['document_id'];
	$fullname = $_POST['fullname'];
    $contact_no = $_POST['contact_no'];
	$reference_no = $_POST['reference_no'];
    $document_type = $_POST['document_type'];
	$payment_status = $_POST['payment_status'];
    $payment_method = $_POST['payment_method'];
    $amount = $_POST['amount'];

	$sql_create_acc = "SELECT COUNT(document_id) AS num FROM payments WHERE document_id = :document_id";
	$stmt = $db->prepare($sql_create_acc);
	$stmt->bindValue(':document_id', $document_id);
	$stmt->execute();
	
	$count_row = $stmt->fetch(PDO::FETCH_ASSOC);
	
	if($count_row['num']>0){
        $_SESSION['status'] ="Session Expired!";
        $_SESSION['status_code'] ="warning";
	
	}else{
		
		$stmt = $db->prepare("INSERT INTO payments (document_id,fullname, contact_no, reference_no, document_type, payment_status, payment_method, amount) VALUES (:document_id, :fullname, :contact_no, :reference_no, :document_type, :payment_status, :payment_method, :amount)");

        $stmt->bindParam(':document_id', $document_id);
		$stmt->bindParam(':fullname', $fullname);
        $stmt->bindParam(':contact_no', $contact_no);
		$stmt->bindParam(':reference_no', $reference_no);
        $stmt->bindParam(':document_type', $document_type);
		$stmt->bindParam(':payment_status', $payment_status);
		$stmt->bindParam(':payment_method', $payment_method);
        $stmt->bindParam(':amount', $amount);
        
	if($stmt->execute()){
		$_SESSION['status'] ="Submitted Successfully";
        $_SESSION['status_code'] ="success";
        
	}else{
        $_SESSION['status'] ="Error";
        $_SESSION['status_code'] ="error";
		}	
	}
}


if(isset($_POST['indigencypayment'])){
	
    $document_id = $_POST['document_id'];
	$fullname = $_POST['fullname'];
    $contact_no = $_POST['contact_no'];
	$reference_no = $_POST['reference_no'];
    $document_type = $_POST['document_type'];
	$payment_status = $_POST['payment_status'];
    $payment_method = $_POST['payment_method'];
    $amount = $_POST['amount'];

	$sql_create_acc = "SELECT COUNT(document_id) AS num FROM payments WHERE document_id = :document_id";
	$stmt = $db->prepare($sql_create_acc);
	$stmt->bindValue(':document_id', $document_id);
	$stmt->execute();
	
	$count_row = $stmt->fetch(PDO::FETCH_ASSOC);
	
	if($count_row['num']>0){
        $_SESSION['status'] ="Session Expired!";
        $_SESSION['status_code'] ="warning";
    
	
	}else{
		
		$stmt = $db->prepare("INSERT INTO payments (document_id,fullname, contact_no, reference_no, document_type, payment_status, payment_method, amount) VALUES (:document_id, :fullname, :contact_no, :reference_no, :document_type, :payment_status, :payment_method, :amount)");

        $stmt->bindParam(':document_id', $document_id);
		$stmt->bindParam(':fullname', $fullname);
        $stmt->bindParam(':contact_no', $contact_no);
		$stmt->bindParam(':reference_no', $reference_no);
        $stmt->bindParam(':document_type', $document_type);
		$stmt->bindParam(':payment_status', $payment_status);
		$stmt->bindParam(':payment_method', $payment_method);
        $stmt->bindParam(':amount', $amount);

	if($stmt->execute()){
		$_SESSION['status'] ="Submitted Successfully";
        $_SESSION['status_code'] ="success";
        
	}else{
        $_SESSION['status'] ="Error";
        $_SESSION['status_code'] ="error";
		}	
	}
}



if(isset($_POST['payamayaindigency'])){
	
    $document_id = $_POST['document_id'];
	$fullname = $_POST['fullname'];
    $contact_no = $_POST['contact_no'];
	$reference_no = $_POST['reference_no'];
    $document_type = $_POST['document_type'];
	$payment_status = $_POST['payment_status'];
    $payment_method = $_POST['payment_method'];
    $amount = $_POST['amount'];

	$sql_create_acc = "SELECT COUNT(document_id) AS num FROM payments WHERE document_id = :document_id";
	$stmt = $db->prepare($sql_create_acc);
	$stmt->bindValue(':document_id', $document_id);
	$stmt->execute();
	
	$count_row = $stmt->fetch(PDO::FETCH_ASSOC);
	
	if($count_row['num']>0){
        $_SESSION['status'] ="Session Expired!";
        $_SESSION['status_code'] ="warning";
    
	
	}else{
		
		$stmt = $db->prepare("INSERT INTO payments (document_id,fullname, contact_no, reference_no, document_type, payment_status, payment_method, amount) VALUES (:document_id, :fullname, :contact_no, :reference_no, :document_type, :payment_status, :payment_method, :amount)");

        $stmt->bindParam(':document_id', $document_id);
		$stmt->bindParam(':fullname', $fullname);
        $stmt->bindParam(':contact_no', $contact_no);
		$stmt->bindParam(':reference_no', $reference_no);
        $stmt->bindParam(':document_type', $document_type);
		$stmt->bindParam(':payment_status', $payment_status);
		$stmt->bindParam(':payment_method', $payment_method);
        $stmt->bindParam(':amount', $amount);

	if($stmt->execute()){
		$_SESSION['status'] ="Submitted Successfully";
        $_SESSION['status_code'] ="success";
        
	}else{
        $_SESSION['status'] ="Error";
        $_SESSION['status_code'] ="error";
		}	
	}
}

if(isset($_POST['gcashbpermitbtn'])){
	
    $document_id = $_POST['document_id'];
	$fullname = $_POST['fullname'];
    $contact_no = $_POST['contact_no'];
	$reference_no = $_POST['reference_no'];
    $document_type = $_POST['document_type'];
	$payment_status = $_POST['payment_status'];
    $payment_method = $_POST['payment_method'];
    $amount = $_POST['amount'];

	$sql_create_acc = "SELECT COUNT(document_id) AS num FROM payments WHERE document_id = :document_id";
	$stmt = $db->prepare($sql_create_acc);
	$stmt->bindValue(':document_id', $document_id);
	$stmt->execute();
	
	$count_row = $stmt->fetch(PDO::FETCH_ASSOC);
	
	if($count_row['num']>0){
        $_SESSION['status'] ="Session Expired!";
        $_SESSION['status_code'] ="warning";
    
	
	}else{
		
		$stmt = $db->prepare("INSERT INTO payments (document_id,fullname, contact_no, reference_no, document_type, payment_status, payment_method, amount) VALUES (:document_id, :fullname, :contact_no, :reference_no, :document_type, :payment_status, :payment_method, :amount)");

        $stmt->bindParam(':document_id', $document_id);
		$stmt->bindParam(':fullname', $fullname);
        $stmt->bindParam(':contact_no', $contact_no);
		$stmt->bindParam(':reference_no', $reference_no);
        $stmt->bindParam(':document_type', $document_type);
		$stmt->bindParam(':payment_status', $payment_status);
		$stmt->bindParam(':payment_method', $payment_method);
        $stmt->bindParam(':amount', $amount);

	if($stmt->execute()){
		$_SESSION['status'] ="Submitted Successfully";
        $_SESSION['status_code'] ="success";
        
	}else{
        $_SESSION['status'] ="Error";
        $_SESSION['status_code'] ="error";
		}	
	}
}

if(isset($_POST['payamayabpermitbtn'])){
	
    $document_id = $_POST['document_id'];
	$fullname = $_POST['fullname'];
    $contact_no = $_POST['contact_no'];
	$reference_no = $_POST['reference_no'];
    $document_type = $_POST['document_type'];
	$payment_status = $_POST['payment_status'];
    $payment_method = $_POST['payment_method'];
    $amount = $_POST['amount'];

	$sql_create_acc = "SELECT COUNT(document_id) AS num FROM payments WHERE document_id = :document_id";
	$stmt = $db->prepare($sql_create_acc);
	$stmt->bindValue(':document_id', $document_id);
	$stmt->execute();
	
	$count_row = $stmt->fetch(PDO::FETCH_ASSOC);
	
	if($count_row['num']>0){
        $_SESSION['status'] ="Session Expired!";
        $_SESSION['status_code'] ="warning";
    
	
	}else{
		
		$stmt = $db->prepare("INSERT INTO payments (document_id,fullname, contact_no, reference_no, document_type, payment_status, payment_method, amount) VALUES (:document_id, :fullname, :contact_no, :reference_no, :document_type, :payment_status, :payment_method, :amount)");

        $stmt->bindParam(':document_id', $document_id);
		$stmt->bindParam(':fullname', $fullname);
        $stmt->bindParam(':contact_no', $contact_no);
		$stmt->bindParam(':reference_no', $reference_no);
        $stmt->bindParam(':document_type', $document_type);
		$stmt->bindParam(':payment_status', $payment_status);
		$stmt->bindParam(':payment_method', $payment_method);
        $stmt->bindParam(':amount', $amount);

	if($stmt->execute()){
		$_SESSION['status'] ="Submitted Successfully";
        $_SESSION['status_code'] ="success";
        
	}else{
        $_SESSION['status'] ="Error";
        $_SESSION['status_code'] ="error";
		}	
	}
}

if(isset($_POST['btnverify'])){

    $payment_status	= $_POST['payment_status'];
    $document_id = $_POST['document_id'];

    $sql = "UPDATE payments SET payment_status = 'Paid' WHERE document_id = $document_id";

    if (mysqli_query($connect, $sql)) {
        $_SESSION['status'] ="Verified Successfully";
        $_SESSION['status_code'] ="success";
    } else {
        $_SESSION['status'] ="Oh there's an Error";
        $_SESSION['status_code'] ="errpr";
    }
}


if(isset($_POST['btnEdit'])){
	
	$reference_no = $_POST['reference_no'];
    $document_id = $_POST['document_id'];
    
	$sql_create_acc = "SELECT COUNT(reference_no) AS num FROM payments WHERE reference_no = :reference_no";
	$stmt = $db->prepare($sql_create_acc);
	$stmt->bindValue(':reference_no', $reference_no);
	$stmt->execute();
	
	$count_row = $stmt->fetch(PDO::FETCH_ASSOC);
	
	if($count_row['num']>0){
        $_SESSION['status'] ="Session Expired!";
        $_SESSION['status_code'] ="warning";

	}else{
		
		$stmt = $db->prepare("UPDATE payments SET reference_no = :reference_no
        WHERE document_id = :document_id");

		$stmt->bindParam(':reference_no', $reference_no);
        $stmt->bindParam(':document_id', $document_id);

	if($stmt->execute()){
		$_SESSION['status'] ="Updated Successfully";
        $_SESSION['status_code'] ="success";
        
	}else{
        $_SESSION['status'] ="Error";
        $_SESSION['status_code'] ="error";
		}	
	}
}

