<?php
// Welcome to Request Document Query

/* 
----------------------------------------------------------------
			TABLE OF CONTENTS: PREPARED STATEMENT
----------------------------------------------------------------
Insertion of Data with Image and Files
1.0 Barangay ID
2.0 Business Permit
3.0 Barangay Indigency
4.0 Barangay Clearance
5.0 File Blottering
6.0 Admin Blotter

----------------------------------------------------------------
*/
?>

<?php
include('announcement_includes/functions.php');


// 1.0 Prepared Statement for Barangay ID: Req Documents
if(isset($_POST['brgyidbtn'])){
	
	$fname = $_POST['fname'];
	$mname = $_POST['mname'];
	$lname	= $_POST['lname'];
	$address = $_POST['address'];
	$birthday = $_POST['birthday'];
	$placeofbirth = $_POST['placeofbirth'];
    $precintno = $_POST['precintno'];
	$contact_no = $_POST['contact_no'];
	$emailadd = $_POST['emailadd'];
	$guardianname = $_POST['guardianname'];
	$emrgncycontact = $_POST['emrgncycontact'];
	$reladdress = $_POST['reladdress'];
	$dateissue = $_POST['dateissue'];
    $brgyidfilechoice = $_POST['brgyidfilechoice'];
	$status = $_POST['status'];
													
	// get image info
	$barangayid_image = $_FILES['id_image']['name'];
	$image_error = $_FILES['id_image']['error'];
	$image_type = $_FILES['id_image']['type'];
													
	// create array variable to handle error
	$error = array();
													
	if(empty($fname)){
	$error['fname'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
	}
	if(empty($lname)){
		$error['lname'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
	}
	if(empty($address)){
	$error['address'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
	}
	if(empty($birthday)){
		$error['birthday'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
	}
	if(empty($placeofbirth)){
		$error['placeofbirth'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
	}
	if(empty($contact_no)){
		$error['contact_no'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
	}
	if(empty($emailadd)){
		$error['emailadd'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
	}
	if(empty($guardianname)){
		$error['guardianname'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
	}
	if(empty($emrgncycontact)){
		$error['emrgncycontact'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
	}
	if(empty($reladdress)){
		$error['reladdress'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
	}
	if(empty($dateissue)){
		$error['dateissue'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
	}
	// common image file extensions
	$allowedExts = array("jpeg", "jpg", "png");
													
	// get image file extension
	error_reporting(E_ERROR | E_PARSE);
	$extension = end(explode(".", $_FILES["id_image"]["name"]));
															
	if($image_error > 0){
	$error['id_image'] = " <span class='label label-danger cattxtbox errormsg'> You must insert an image! </span>";
	}else if(!(($image_type == "image/jpeg") || 
	($image_type == "image/jpg") || 
	($image_type == "image/x-png") ||
	($image_type == "image/png") || 
	($image_type == "image/pjpeg")) &&
	!(in_array($extension, $allowedExts))){
													
	$error['id_image'] = " <span class='label label-danger errormsg'>Image type must jpg, jpeg, or png!</span>";
	}
													
	if( !empty($fname) &&  
		!empty($lname) && 
		!empty($address) && 
		!empty($birthday) && 
		!empty($placeofbirth) && 
		!empty($contact_no) && 
		!empty($emailadd) && 
		!empty($guardianname) && 
		!empty($emrgncycontact) && 
		!empty($reladdress) && 
		!empty($dateissue) && 
		empty($error['id_image'])){
														
	// create random image file name
	$string = '0123456789';
	$file = preg_replace("/\s+/", "_", $_FILES['id_image']['name']);
	$function = new functions;
	$barangayid_image = $function->get_random_string($string, 4)."-".date("Y-m-d").".".$extension;
															
	// upload new image
	$upload = move_uploaded_file($_FILES['id_image']['tmp_name'], 'img/fileupload_barangayid/'.$barangayid_image);
												
	// insert new data to menu table
	$sql_query = "INSERT INTO barangayid (fname, mname, lname, address, birthday,placeofbirth, precintno, contact_no, emailadd,guardianname, emrgncycontact, reladdress, dateissue, id_image, brgyidfilechoice, status) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
														
	$upload_image = $barangayid_image;
	$stmt = $connect->stmt_init();
	if($stmt->prepare($sql_query)) {	
	// Bind your variables to replace the ?s
	$stmt->bind_param('ssssssssssssssss', 
	$fname,
	$mname,
	$lname,
	$address,
	$birthday,
	$placeofbirth,
    $precintno,
	$contact_no,
	$emailadd,
	$guardianname,
	$emrgncycontact,
	$reladdress,
	$dateissue,
    $upload_image,
	$brgyidfilechoice,
    $status
	);
	// Execute query
	$stmt->execute();
	// store result 
	$result = $stmt->store_result();
	$stmt->close();
	}
														
	if($result){
	$error['add_barangayid'] = " 
		<div class='alert alert-success cattxtbox'>
			<h6> * Submitted Successfully. <a href='residentreqdocu.php'>
            <i class='fa fa-check fa-lg'></i>
            </a></h6>
		</div>";
	}else{
		$error['add_barangayid'] = " <span class='label label-danger'>Failed Submission! </span>";
			}
		}
	}


    
// 2.0 Prepared Statement for Business Permit: Req Documents
if(isset($_POST['permitBtn'])){
	
	$dateissued = $_POST['dateissued'];
	$firstname	= $_POST['firstname'];
    $middlename	= $_POST['middlename'];
    $lastname	= $_POST['lastname'];
    $contactno = $_POST['contactno'];
	$businessname = $_POST['businessname'];
	$businessaddress = $_POST['businessaddress'];
	$plateno = $_POST['plateno'];
	$email_add = $_POST['email_add'];
    $permitfilechoice = $_POST['permitfilechoice'];
    $status = $_POST['status'];
													
	// get image info
	$permit_image = $_FILES['businessid_image']['name'];
	$image_error = $_FILES['businessid_image']['error'];
	$image_type = $_FILES['businessid_image']['type'];
													
	// create array variable to handle error
	$error = array();
													
	if(empty($dateissued)){
	$error['dateissued'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
	}
	if(empty($firstname)){
	$error['firstname'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
	}
    if(empty($middlename)){
	$error['middlename'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
	}
    if(empty($lastname)){
	$error['lastname'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
	}
    if(empty($contactno)){
	$error['contactno'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
	}
	if(empty($businessname)){
	$error['businessname'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
	}
    if(empty($businessaddress)){
	$error['businessaddress'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
	}
	if(empty($plateno)){
	$error['plateno'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
	}
	if(empty($email_add)){
	$error['email_add'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
	}

	// common image file extensions
	$allowedExts = array("jpeg", "jpg", "png");
													
	// get image file extension
	error_reporting(E_ERROR | E_PARSE);
	$extension = end(explode(".", $_FILES["businessid_image"]["name"]));
															
	if($image_error > 0){
	$error['businessid_image'] = " <span class='label label-danger cattxtbox errormsg'> You must insert an image! </span>";
	}else if(!(($image_type == "image/jpeg") || 
	($image_type == "image/jpg") || 
	($image_type == "image/x-png") ||
	($image_type == "image/png") || 
	($image_type == "image/pjpeg")) &&
	!(in_array($extension, $allowedExts))){
													
	$error['businessid_image'] = " <span class='label label-danger errormsg'>Image type must jpg, jpeg, or png!</span>";
	}
													
	if( !empty($dateissued) &&  
		!empty($firstname) && 
        !empty($middlename) && 
        !empty($lastname) && 
        !empty($contactno) && 
		!empty($businessname) && 
		!empty($businessaddress) && 
		!empty($plateno) && 
		!empty($email_add) && 
        !empty($status) && 
		empty($error['businessid_image'])){
														
	// create random image file name
	$string = '0123456789';
	$file = preg_replace("/\s+/", "_", $_FILES['businessid_image']['name']);
	$function = new functions;
	$permit_image = $function->get_random_string($string, 4)."-".date("Y-m-d").".".$extension;
															
	// upload new image
	$upload = move_uploaded_file($_FILES['businessid_image']['tmp_name'], 'img/fileupload_bpermit/'.$permit_image);
												
	// insert new data to menu table
	$sql_query = "INSERT INTO businesspermit (dateissued, firstname, middlename, lastname, contactno, businessname, businessaddress, plateno, email_add, businessid_image, permitfilechoice, status)
	VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
														
	$upload_image = $permit_image;
	$stmt = $connect->stmt_init();
	if($stmt->prepare($sql_query)) {	
	// Bind your variables to replace the ?s
	$stmt->bind_param('ssssssssssss', 
	$dateissued,
	$firstname,
    $middlename,
    $lastname,
    $contactno,
	$businessname,
	$businessaddress,
	$plateno,
	$email_add,
	$upload_image,
    $permitfilechoice,
    $status
	);
	// Execute query
	$stmt->execute();
	// store result 
	$result = $stmt->store_result();
	$stmt->close();
	}
														
	if($result){
	$error['add_brgypermit'] = " 
		<div class='alert alert-success cattxtbox'>
			<h6> * Submitted Successfully. <a href='residentreqdocu.php'>
            <i class='fa fa-check fa-lg'></i>
            </a></h6>	
		</div>";
	}else{
		$error['add_brgypermit'] = " <span class='label label-danger'>Failed Submission! </span>";
			}
		}
	}

// 3.0 Prepared Statement for Barangay Indigency: Req Documents
    if(isset($_POST['indigencybtn'])){
	
        $fullname = $_POST['fullname'];
        $address = $_POST['address'];
        $purpose = $_POST['purpose'];
        $contactnum = $_POST['contactnum'];
        $emailaddress = $_POST['emailaddress'];
        $id_type = $_POST['id_type'];
        $date_issue = $_POST['date_issue'];
        $indigencyfilechoice = $_POST['indigencyfilechoice'];
        $status = $_POST['status'];
                                                        
        // get image info
        $indigency_image = $_FILES['indigencyid_image']['name'];
        $image_error = $_FILES['indigencyid_image']['error'];
        $image_type = $_FILES['indigencyid_image']['type'];
                                                        
        // create array variable to handle error
        $error = array();
                                                        
        if(empty($fullname)){
        $error['fullname'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
        }
        if(empty($address)){
        $error['address'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
        }
        if(empty($purpose)){
        $error['purpose'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
        }
        if(empty($date_issue)){
        $error['date_issue'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
        }
        if(empty($contactnum)){
        $error['contactnum'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
        }
        if(empty($emailaddress)){
        $error['emailaddress'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
        }
        if(empty($id_type)){
        $error['id_type'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
        }
    
        // common image file extensions
        $allowedExts = array("jpeg", "jpg", "png");
                                                        
        // get image file extension
        error_reporting(E_ERROR | E_PARSE);
        $extension = end(explode(".", $_FILES["indigencyid_image"]["name"]));
                                                                
        if($image_error > 0){
        $error['indigencyid_image'] = " <span class='label label-danger cattxtbox errormsg'> You must insert an image! </span>";
        }else if(!(($image_type == "image/jpeg") || 
        ($image_type == "image/jpg") || 
        ($image_type == "image/x-png") ||
        ($image_type == "image/png") || 
        ($image_type == "image/pjpeg")) &&
        !(in_array($extension, $allowedExts))){
                                                        
        $error['indigencyid_image'] = " <span class='label label-danger errormsg'>Image type must jpg, jpeg, or png!</span>";
        }
                                                        
        if( !empty($fullname) &&  
            !empty($address) && 
            !empty($purpose) && 
            !empty($date_issue) && 
            !empty($contactnum) && 
            !empty($emailaddress) && 
            !empty($id_type) && 
            !empty($date_issue) && 
            !empty($status) && 
            empty($error['indigencyid_image'])){
                                                            
        // create random image file name
        $string = '0123456789';
        $file = preg_replace("/\s+/", "_", $_FILES['indigencyid_image']['name']);
        $function = new functions;
        $indigency_image = $function->get_random_string($string, 4)."-".date("Y-m-d").".".$extension;
                                                                
        // upload new image
        $upload = move_uploaded_file($_FILES['indigencyid_image']['tmp_name'], 'img/fileupload_indigency/'.$indigency_image);
                                                    
        // insert new data to menu table
        $sql_query = "INSERT INTO certificateindigency (fullname, address, purpose, contactnum, emailaddress, id_type, date_issue,indigencyid_image, indigencyfilechoice, status)
        VALUES(?,?,?,?,?,?,?,?,?,?)";
                                                            
        $upload_image = $indigency_image;
        $stmt = $connect->stmt_init();
        if($stmt->prepare($sql_query)) {	
        // Bind your variables to replace the ?s
        $stmt->bind_param('ssssssssss', 
        $fullname,
        $address,
        $purpose,
        $contactnum,
        $emailaddress,
        $id_type,
        $date_issue,
        $upload_image,
        $indigencyfilechoice,
        $status
        );
        // Execute query
        $stmt->execute();
        // store result 
        $result = $stmt->store_result();
        $stmt->close();
        }
                                                            
        if($result){
        $error['add_brgyindigency'] = " 
            <div class='alert alert-success cattxtbox'>
                <h6> * Submitted Successfully. <a href='residentreqdocu.php'>
                <i class='fa fa-check fa-lg'></i>
                </a></h6>	
            </div>";
        }else{
            $error['add_brgyindigency'] = " <span class='label label-danger'>Failed Submission! </span>";
                }
            }
        }

  // 4.0 Prepared Statement for Barangay Clearance: Req Documents      
        if(isset($_POST['clearancebtn'])){
	
            $full_name = $_POST['full_name'];
            $age = $_POST['age'];
            $status = $_POST['status'];
            $nationality = $_POST['nationality'];
            $address = $_POST['address'];
            $contactno = $_POST['contactno'];
            $emailadd = $_POST['emailadd'];
            $purpose = $_POST['purpose'];
            $date_issued = $_POST['date_issued'];
            $ctc_no = $_POST['ctc_no'];
            $issued_at = $_POST['issued_at'];
            $precint_no = $_POST['precint_no'];
            // get image info
            $clearance_image = $_FILES['clearanceid_image']['name'];
            $image_error = $_FILES['clearanceid_image']['error'];
            $image_type = $_FILES['clearanceid_image']['type'];
 
            $filechoice = $_POST['filechoice'];    
            $clearance_status = $_POST['clearance_status'];                                 
                                                            
            // create array variable to handle error
            $error = array();
                                                            
            if(empty($full_name)){
            $error['full_name'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
            }
            if(empty($age)){
            $error['age'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
            }
            if(empty($status)){
            $error['status'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
            }
            if(empty($nationality)){
            $error['nationality'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
            }
            if(empty($address)){
            $error['address'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
            }
            if(empty($contactno)){
            $error['contactno'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
            }
            if(empty($emailadd)){
            $error['emailadd'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
            }
            if(empty($purpose)){
            $error['purpose'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
            }
            if(empty($date_issued)){
            $error['date_issued'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
            }
            // if(empty($ctc_no)){
            // $error['ctc_no'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
            // }
            if(empty($issued_at)){
            $error['issued_at'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
            }
            // if(empty($precint_no)){
            // $error['precint_no'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
            // }
            if(empty($filechoice)){
                $error['filechoice'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
                }
        
            // common image file extensions
            $allowedExts = array("jpeg", "jpg", "png");
                                                            
            // get image file extension
            error_reporting(E_ERROR | E_PARSE);
            $extension = end(explode(".", $_FILES["clearanceid_image"]["name"]));
                                                                    
            if($image_error > 0){
            $error['clearanceid_image'] = " <span class='label label-danger cattxtbox errormsg'> You must insert an image! </span>";
            }else if(!(($image_type == "image/jpeg") || 
            ($image_type == "image/jpg") || 
            ($image_type == "image/x-png") ||
            ($image_type == "image/png") || 
            ($image_type == "image/pjpeg")) &&
            !(in_array($extension, $allowedExts))){
                                                            
            $error['clearanceid_image'] = " <span class='label label-danger errormsg'>Image type must jpg, jpeg, or png!</span>";
            }
                                                            
            if( !empty($full_name) &&  
                !empty($age) && 
                !empty($status) && 
                !empty($nationality) && 
                !empty($address) && 
                !empty($contactno) && 
                !empty($emailadd) && 
                !empty($purpose) && 
                !empty($date_issued) && 
                // !empty($ctc_no) && 
                !empty($issued_at) && 
                // !empty($precint_no) &&
                empty($error['clearanceid_image']) && 
                !empty($filechoice) && 
                !empty($clearance_status)){
                                                                
            // create random image file name
            $string = '0123456789';
            $file = preg_replace("/\s+/", "_", $_FILES['clearanceid_image']['name']);
            $function = new functions;
            $clearance_image = $function->get_random_string($string, 4)."-".date("Y-m-d").".".$extension;
                                                                    
            // upload new image
            $upload = move_uploaded_file($_FILES['clearanceid_image']['tmp_name'], 'img/fileupload_clearance/'.$clearance_image);
                                                        
            // insert new data to menu table
            $sql_query = "INSERT INTO barangayclearance (full_name, age, status, nationality, address,contactno, emailadd, purpose, date_issued, ctc_no, issued_at, precint_no, clearanceid_image, filechoice, clearance_status)
            VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                                                                
            $upload_image = $clearance_image;
            $stmt = $connect->stmt_init();
            if($stmt->prepare($sql_query)) {	
            // Bind your variables to replace the ?s
            $stmt->bind_param('sssssssssssssss', 
            $full_name,
            $age,
            $status,
            $nationality,
            $address,
            $contactno,
            $emailadd,
            $purpose,
            $date_issued,
            $ctc_no,
            $issued_at,
            $precint_no,
            $upload_image,
            $filechoice,
            $clearance_status
            );
            // Execute query
            $stmt->execute();
            // store result 
            $result = $stmt->store_result();
            $stmt->close();
            }
                                                                
            if($result){
            $error['add_brgyclearance'] = " 
                <div class='alert alert-success cattxtbox'>
                    <h6> * Submitted Successfully. <a href='residentreqdocu.php'>
                    <i class='fa fa-check fa-lg'></i>
                    </a></h6>	
                </div>";
            }else{
                $error['add_brgyclearance'] = " <span class='label label-danger'>Failed Submission! </span>";
                    }
                }
            }

// 5.0 Prepared Statement for File Blottering: Req Documents
            if(isset($_POST['blotterbtn'])){
	
                $n_complainant = $_POST['n_complainant'];
                $comp_age = $_POST['comp_age'];
                $comp_gender = $_POST['comp_gender'];
                $comp_address = $_POST['comp_address'];
                $inci_address = $_POST['inci_address'];
                $contactno = $_POST['contactno'];
                $bemailadd = $_POST['bemailadd'];
                $n_violator = $_POST['n_violator'];
                $violator_age = $_POST['violator_age'];
                $violator_gender = $_POST['violator_gender'];
                $relationship = $_POST['relationship'];
                $violator_address = $_POST['violator_address'];
                $witnesses = $_POST['witnesses'];
                $complaints = $_POST['complaints'];
                $id_type = $_POST['id_type'];
                $status = $_POST['status'];                             
                // get image info
                $blotter_image = $_FILES['blotterid_image']['name'];
                $image_error = $_FILES['blotterid_image']['error'];
                $image_type = $_FILES['blotterid_image']['type'];
                                                                
                // create array variable to handle error
                $error = array();
                                                                
                if(empty($n_complainant)){
                $error['n_complainant'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
                }
                if(empty($comp_age)){
                $error['comp_age'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
                }
                if(empty($comp_gender)){
                $error['comp_gender'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
                }
                if(empty($comp_address)){
                $error['comp_address'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
                }
                if(empty($inci_address)){
                $error['inci_address'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
                }
                if(empty($contactno)){
                $error['contactno'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
                }
                if(empty($bemailadd)){
                    $error['bemailadd'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
                    }
                if(empty($n_violator)){
                $error['n_violator'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
                }
                if(empty($violator_age)){
                $error['violator_age'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
                }
                if(empty($violator_gender)){
                $error['violator_gender'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
                }
                if(empty($relationship)){
                $error['relationship'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
                }
                if(empty($violator_address)){
                $error['violator_address'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
                }
                if(empty($witnesses)){
                $error['witnesses'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
                }
                if(empty($complaints)){
                $error['complaints'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
                }
                if(empty($id_type)){
                $error['id_type'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
                }
            
                // common image file extensions
                $allowedExts = array("pdf", "docx");
                                                                
                // get image file extension
                error_reporting(E_ERROR | E_PARSE);
                $extension = end(explode(".", $_FILES["blotterid_image"]["name"]));
                                                                        
                if($image_error > 0){
                $error['blotterid_image'] = "<span class='label label-danger cattxtbox errormsg'> You must insert file here! </span>";
                }else if(!(($image_type == "pdf")) &&
                !(in_array($extension, $allowedExts))){
                                                                
                $error['blotterid_image'] = " <span class='label label-danger errormsg'>Image type must jpg, jpeg, or png!</span>";
                }
                                                                
                if( !empty($n_complainant) &&  
                    !empty($comp_age) && 
                    !empty($comp_gender) && 
                    !empty($comp_address) && 
                    !empty($inci_address) && 
                    !empty($contactno) && 
                    !empty($bemailadd) && 
                    !empty($n_violator) && 
                    !empty($violator_age) && 
                    !empty($violator_gender) && 
                    !empty($relationship) && 
                    !empty($violator_address) && 
                    !empty($witnesses) && 
                    !empty($complaints) && 
                    !empty($id_type) && 
                    empty($error['blotterid_image']) &&
                    !empty($status)){
                                                                    
                // create random image file name
                $string = '0123456789';
                $file = preg_replace("/\s+/", "_", $_FILES['blotterid_image']['name']);
                $function = new functions;
                $blotter_image = $function->get_random_string($string, 4)."-".date("Y-m-d").".".$extension;
                                                                        
                // upload new image
                $upload = move_uploaded_file($_FILES['blotterid_image']['tmp_name'], 'img/fileupload_blotter/'.$blotter_image);
                                                            
                // insert new data to menu table
                $sql_query = "INSERT INTO blotterdb (n_complainant, comp_age, comp_gender, comp_address, inci_address,contactno, bemailadd, n_violator, violator_age, violator_gender, relationship, violator_address, witnesses, complaints, id_type, blotterid_image, status)
                VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                                                                    
                $upload_image = $blotter_image;
                $stmt = $connect->stmt_init();
                if($stmt->prepare($sql_query)) {	
                // Bind your variables to replace the ?s
                $stmt->bind_param('sssssssssssssssss', 
                $n_complainant,
                $comp_age,
                $comp_gender,
                $comp_address,
                $inci_address,
                $contactno,
                $bemailadd,
                $n_violator,
                $violator_age,
                $violator_gender,
                $relationship,
                $violator_address,
                $witnesses,
                $complaints, 
                $id_type,
                $upload_image,
                $status,
                );
                // Execute query
                $stmt->execute();
                // store result 
                $result = $stmt->store_result();
                $stmt->close();
                }
                                                                    
                if($result){
                $error['add_blotter'] = " 
                    <div class='alert alert-success cattxtbox'>
                        <h6> * Submitted Successfully. <a href='residentreqdocu.php'>
                        <i class='fa fa-check fa-lg'></i>
                        </a></h6>	
                    </div>";
                }else{
                    $error['add_blotter'] = " <span class='label label-danger'>Failed Submission! </span>";
                        }
                    }
                }


// 6.0 Prepared Statement for Admin Complaints: Req Documents
                if(isset($_POST['submitbtn'])){
	
                    $blotterID = $_POST['blotterID'];
                    $complainant = $_POST['complainant'];
                    $c_age	= $_POST['c_age'];
                    $c_gender = $_POST['c_gender'];
                    $c_address = $_POST['c_address'];
                    $incident_add = $_POST['incident_add'];
                    $violators = $_POST['violators'];
                    $v_age = $_POST['v_age'];
                    $v_gender = $_POST['v_gender'];
                    $v_rel = $_POST['v_rel'];
                    $v_address = $_POST['v_address'];
                    $witness = $_POST['witness'];
                    $ex_complaints = $_POST['ex_complaints'];
                    $dept = $_POST['dept'];
                    $app_date = $_POST['app_date'];
                    $app_by = $_POST['app_by'];
                                                                    
                    // get image info
                    $docu = $_FILES['document']['name'];
                    $image_error = $_FILES['document']['error'];
                    $image_type = $_FILES['document']['type'];
                                                                    
                    // create array variable to handle error
                    $error = array();
                                                                    
                    if(empty($blotterID)){
                    $error['blotterID'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
                    }
                    if(empty($complainant)){
                        $error['complainant'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
                    }
                    if(empty($c_age)){
                    $error['c_age'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
                    }
                    if(empty($c_gender)){
                        $error['c_gender'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
                    }
                    if(empty($c_address)){
                        $error['c_address'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
                    }
                    if(empty($incident_add)){
                        $error['incident_add'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
                    }
                    if(empty($violators)){
                        $error['violators'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
                    }
                    if(empty($v_age)){
                        $error['v_age'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
                    }
                    if(empty($v_gender)){
                        $error['v_gender'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
                    }
                    if(empty($v_rel)){
                        $error['v_rel'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
                    }
                    if(empty($v_address)){
                        $error['v_address'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
                    }
                    if(empty($ex_complaints)){
                        $error['ex_complaints'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
                    }
                    if(empty($dept)){
                        $error['dept'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
                    }
                    if(empty($app_date)){
                        $error['app_date'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
                    }
                    if(empty($app_by)){
                        $error['app_by'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
                    }
                    if(empty($document)){
                        $error['document'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
                    }
                    // common image file extensions
                    $allowedExts = array("pdf");
                                                                    
                    // get image file extension
                    error_reporting(E_ERROR | E_PARSE);
                    $extension = end(explode(".", $_FILES["document"]["name"]));
                                                                            
                    if($image_error > 0){
                    $error['document'] = " <span class='label label-danger cattxtbox errormsg'> You must insert an image! </span>";
                    }else if(!(($image_type == "pdf") ||  
                    ($image_type == "pdf")) &&
                    !(in_array($extension, $allowedExts))){
                                                                    
                    $error['document'] = " <span class='label label-danger errormsg'>Image type must jpg, jpeg, or png!</span>";
                    }
                                                                    
                    if( !empty($blotterID) &&  
                        !empty($complainant) && 
                        !empty($c_age) && 
                        !empty($c_gender) && 
                        !empty($c_address) && 
                        !empty($incident_add) && 
                        !empty($violators) && 
                        !empty($v_age) && 
                        !empty($v_gender) && 
                        !empty($v_rel) && 
                        !empty($v_address) && 
                        !empty($ex_complaints) && 
                        !empty($dept) && 
                        !empty($app_date) && 
                        !empty($app_by) && 
                        empty($error['document'])){
                                                                        
                    // create random image file name
                    $string = '0123456789';
                    $file = preg_replace("/\s+/", "_", $_FILES['document']['name']);
                    $function = new functions;
                    $docu = $function->get_random_string($string, 4)."-".date("Y-m-d").".".$extension;
                                                                            
                    // upload new image
                    $upload = move_uploaded_file($_FILES['document']['tmp_name'], 'img/fileupload_admin/'.$docu);
                                                                
                    // insert new data to menu table
                    $sql_query = "INSERT INTO admin_complaints (blotterID, complainant, c_age, c_gender, c_address,incident_add, violators, v_age,v_gender, v_rel, v_address, witness, ex_complaints, dept, app_date, app_by, document )
                    VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                                                                        
                    $upload_image = $docu;
                    $stmt = $connect->stmt_init();
                    if($stmt->prepare($sql_query)) {	
                    // Bind your variables to replace the ?s
                    $stmt->bind_param('ssssssssssssss', 
                    $blotterID,
                    $complainant,
                    $c_age,
                    $c_gender,
                    $c_address,
                    $incident_add,
                    $violators,
                    $v_age,
                    $v_gender,
                    $v_rel,
                    $v_address,
                    $witness,
                    $ex_complaints,
                    $dept,
                    $app_date,
                    $app_by,
                    $document
                    );
                    // Execute query
                    $stmt->execute();
                    // store result 
                    $result = $stmt->store_result();
                    $stmt->close();
                    }
                                                                        
                    if($result){
                    $error['add_barangayid'] = " 
                        <div class='alert alert-success cattxtbox'>
                            <h6> * Submitted Successfully. <a href='ompAdmin_dashboard.php'>
                            <i class='fa fa-check fa-lg'></i>
                            </a></h6>
                        </div>";
                    }else{
                        $error['add_barangayid'] = " <span class='label label-danger'>Failed Submission! </span>";
                            }
                        }
                    }
                
