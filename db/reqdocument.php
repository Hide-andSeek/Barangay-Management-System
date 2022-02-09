<?php
include('announcement_includes/functions.php');

if(isset($_POST['brgyidbtn'])){
	
	$fname = $_POST['fname'];
	$mname = $_POST['mname'];
	$lname	= $_POST['lname'];
	$address = $_POST['address'];
	$birthday = $_POST['birthday'];
	$placeofbirth = $_POST['placeofbirth'];
	$contact_no = $_POST['contact_no'];
	$emailadd = $_POST['emailadd'];
	$guardianname = $_POST['guardianname'];
	$emrgncycontact = $_POST['emrgncycontact'];
	$reladdress = $_POST['reladdress'];
	$dateissue = $_POST['dateissue'];
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
	$sql_query = "INSERT INTO barangayid (fname, mname, lname, address, birthday,placeofbirth, contact_no, emailadd,guardianname, emrgncycontact, reladdress, dateissue, status, id_image)
	VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
														
	$upload_image = $barangayid_image;
	$stmt = $connect->stmt_init();
	if($stmt->prepare($sql_query)) {	
	// Bind your variables to replace the ?s
	$stmt->bind_param('ssssssssssssss', 
	$fname,
	$mname,
	$lname,
	$address,
	$birthday,
	$placeofbirth,
	$contact_no,
	$emailadd,
	$guardianname,
	$emrgncycontact,
	$reladdress,
	$dateissue,
	$status,
	$upload_image
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
	$sql_query = "INSERT INTO businesspermit (dateissued, firstname, middlename, lastname, contactno, businessname, businessaddress, plateno, email_add, status, businessid_image)
	VALUES(?,?,?,?,?,?,?,?,?,?,?)";
														
	$upload_image = $permit_image;
	$stmt = $connect->stmt_init();
	if($stmt->prepare($sql_query)) {	
	// Bind your variables to replace the ?s
	$stmt->bind_param('sssssssssss', 
	$dateissued,
	$firstname,
    $middlename,
    $lastname,
    $contactno,
	$businessname,
	$businessaddress,
	$plateno,
	$email_add,
    $status,
	$upload_image
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

    if(isset($_POST['indigencybtn'])){
	
        $fullname = $_POST['fullname'];
        $address = $_POST['address'];
        $purpose = $_POST['purpose'];
        $contactnum = $_POST['contactnum'];
        $emailaddress = $_POST['emailaddress'];
        $id_type = $_POST['id_type'];
        $date_issue = $_POST['date_issue'];
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
        $sql_query = "INSERT INTO certificateindigency (fullname, address, purpose, contactnum, emailaddress, id_type, date_issue,indigencyid_image, status)
        VALUES(?,?,?,?,?,?,?,?,?)";
                                                            
        $upload_image = $indigency_image;
        $stmt = $connect->stmt_init();
        if($stmt->prepare($sql_query)) {	
        // Bind your variables to replace the ?s
        $stmt->bind_param('sssssssss', 
        $fullname,
        $address,
        $purpose,
        $contactnum,
        $emailaddress,
        $id_type,
        $date_issue,
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
            $clearance_status = $_POST['clearance_status'];                                      
            // get image info
            $clearance_image = $_FILES['clearanceid_image']['name'];
            $image_error = $_FILES['clearanceid_image']['error'];
            $image_type = $_FILES['clearanceid_image']['type'];
                                                            
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
            if(empty($ctc_no)){
            $error['ctc_no'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
            }
            if(empty($issued_at)){
            $error['issued_at'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
            }
            if(empty($precint_no)){
            $error['precint_no'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
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
                !empty($ctc_no) && 
                !empty($issued_at) && 
                !empty($precint_no) && 
                empty($error['clearanceid_image'])){
                                                                
            // create random image file name
            $string = '0123456789';
            $file = preg_replace("/\s+/", "_", $_FILES['clearanceid_image']['name']);
            $function = new functions;
            $clearance_image = $function->get_random_string($string, 4)."-".date("Y-m-d").".".$extension;
                                                                    
            // upload new image
            $upload = move_uploaded_file($_FILES['clearanceid_image']['tmp_name'], 'img/fileupload_clearance/'.$clearance_image);
                                                        
            // insert new data to menu table
            $sql_query = "INSERT INTO barangayclearance (full_name, age, status, nationality, address,contactno, emailadd, purpose, date_issued, ctc_no, issued_at, precint_no, clearanceid_image, clearance_status)
            VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                                                                
            $upload_image = $clearance_image;
            $stmt = $connect->stmt_init();
            if($stmt->prepare($sql_query)) {	
            // Bind your variables to replace the ?s
            $stmt->bind_param('ssssssssssssss', 
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
            $clearance_status,
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

            if(isset($_POST['blotterbtn'])){
	
                $n_complainant = $_POST['n_complainant'];
                $comp_age = $_POST['comp_age'];
                $comp_gender = $_POST['comp_gender'];
                $comp_address = $_POST['comp_address'];
                $inci_address = $_POST['inci_address'];
                $contactno = $_POST['contactno'];
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
                $error['blotterid_image'] = " <span class='label label-danger cattxtbox errormsg'> You must insert an image! </span>";
                }else if(!(($image_type == "docx") || 
                ($image_type == "pdf")) &&
                !(in_array($extension, $allowedExts))){
                                                                
                $error['blotterid_image'] = " <span class='label label-danger errormsg'>Image type must jpg, jpeg, or png!</span>";
                }
                                                                
                if( !empty($n_complainant) &&  
                    !empty($comp_age) && 
                    !empty($comp_gender) && 
                    !empty($comp_address) && 
                    !empty($inci_address) && 
                    !empty($contactno) && 
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
                $sql_query = "INSERT INTO blotterdb (n_complainant, comp_age, comp_gender, comp_address, inci_address,contactno, n_violator, violator_age, violator_gender, relationship, violator_address, witnesses, complaints, id_type, blotterid_image, status)
                VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                                                                    
                $upload_image = $blotter_image;
                $stmt = $connect->stmt_init();
                if($stmt->prepare($sql_query)) {	
                // Bind your variables to replace the ?s
                $stmt->bind_param('ssssssssssssssss', 
                $n_complainant,
                $comp_age,
                $comp_gender,
                $comp_address,
                $inci_address,
                $contactno,
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
