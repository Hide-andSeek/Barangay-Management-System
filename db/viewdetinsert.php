<?php



        // 6.0 Prepared Statement for Admin Complaints: Req Documents
        if(isset($_POST['insertappbrgyid'])){
            
            $app_brgyid = $_POST['app_brgyid'];
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
            $approvedby = $_POST['approvedby'];
            $app_date = $_POST['app_date'];
            $status = $_POST['status'];

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
            if(empty($approvedby)){
                $error['approvedby'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
            }
            if(empty($approvedby)){
                $error['approvedby'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
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
                !empty($brgyidfilechoice) && 
                !empty($approvedby) && 
                empty($error['id_image'])){
                                                                
            // create random image file name
            $string = '0123456789';
            $file = preg_replace("/\s+/", "_", $_FILES['id_image']['name']);
            $function = new functions;
            $barangayid_image = $function->get_random_string($string, 4)."-".date("Y-m-d").".".$extension;
                                                                    
            // upload new image
            $upload = move_uploaded_file($_FILES['id_image']['tmp_name'], '../img/approved_barangayid/'.$barangayid_image);
                                                        
            // insert new data to menu table
            $sql_query = "INSERT INTO approved_brgyids (app_brgyid, fname, mname, lname, address, birthday,placeofbirth, precintno, contact_no, emailadd,guardianname, emrgncycontact, reladdress, dateissue, brgyidfilechoice, approvedby, app_date,status, id_image) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                                                                
            $upload_image = $barangayid_image;
            $stmt = $connect->stmt_init();
            if($stmt->prepare($sql_query)) {	
            // Bind your variables to replace the ?s
            $stmt->bind_param('sssssssssssssssssss',
            $app_brgyid, 
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
            $brgyidfilechoice,
            $approvedby,
            $app_date,
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
                $_SESSION['result'] = 'Approved Successfully! ';
                $_SESSION['status'] = 'ok';
            }else{
                $_SESSION['result'] = 'There is an Error: ';
                $_SESSION['status'] = 'error';
            }

        }
    }


    if(isset($_POST['insertclearance'])){

        $approved_clearanceids = $_POST['approved_clearanceids'];
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
        $filechoice = $_POST['filechoice'];   
        // get image info
        $clearance_image = $_FILES['clearanceid_image']['name'];
        $image_error = $_FILES['clearanceid_image']['error'];
        $image_type = $_FILES['clearanceid_image']['type'];

        $approvedby = $_POST['approvedby'];  
        $app_date = $_POST['app_date'];  
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
        $upload = move_uploaded_file($_FILES['clearanceid_image']['tmp_name'], '../img/approved_clearance/'.$clearance_image);
                                                    
        // insert new data to menu table
        $sql_query = "INSERT INTO approved_clearance (approved_clearanceids, full_name, age, status, nationality, address,contactno, emailadd, purpose, date_issued, ctc_no, issued_at, precint_no, filechoice, clearanceid_image, approvedby, app_date, clearance_status)
        VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                                                            
        $upload_image = $clearance_image;
        $stmt = $connect->stmt_init();
        if($stmt->prepare($sql_query)) {	
        // Bind your variables to replace the ?s
        $stmt->bind_param('ssssssssssssssssss', 
        $approved_clearanceids,
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
        $filechoice,
        $upload_image,
        $approvedby,
        $app_date,
        $clearance_status
        );
        // Execute query
        $stmt->execute();
        // store result 
        $result = $stmt->store_result();
        $stmt->close();
        }
                                                            
        if($result){
            $_SESSION['result'] = 'Approved Successfully! ';
            $_SESSION['status'] = 'ok';
        }else{
            $_SESSION['result'] = 'There is an Error: ';
            $_SESSION['status'] = 'error';
        }

    }
}


if(isset($_POST['insertindigency'])){
	$approvedindigency_id = $_POST['approvedindigency_id'];
    $fullname = $_POST['fullname'];
    $address = $_POST['address'];
    $purpose = $_POST['purpose'];
    $contactnum = $_POST['contactnum'];
    $emailaddress = $_POST['emailaddress'];
    $date_issue = $_POST['date_issue'];
    $indigencyfilechoice = $_POST['indigencyfilechoice'];
    $approvedby = $_POST['approvedby'];
    $app_date = $_POST['app_date'];
    // get image info
    $indigency_image = $_FILES['indigencyid_image']['name'];
    $image_error = $_FILES['indigencyid_image']['error'];
    $image_type = $_FILES['indigencyid_image']['type'];               
    $status = $_POST['status'];
                                                    
    
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
        !empty($date_issue) && 
        !empty($status) && 
        empty($error['indigencyid_image'])){
                                                        
    // create random image file name
    $string = '0123456789';
    $file = preg_replace("/\s+/", "_", $_FILES['indigencyid_image']['name']);
    $function = new functions;
    $indigency_image = $function->get_random_string($string, 4)."-".date("Y-m-d").".".$extension;
                                                            
    // upload new image
    $upload = move_uploaded_file($_FILES['indigencyid_image']['tmp_name'], '../img/approved_indigency/'.$indigency_image);
                                                
    // insert new data to menu table
    $sql_query = "INSERT INTO approved_indigency (approvedindigency_id, fullname, address, purpose, contactnum, emailaddress, date_issue, indigencyfilechoice, approvedby, app_date, indigencyid_image, status)
    VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
                                                        
    $upload_image = $indigency_image;
    $stmt = $connect->stmt_init();
    if($stmt->prepare($sql_query)) {	
    // Bind your variables to replace the ?s
    $stmt->bind_param('ssssssssssss', 
    $approvedindigency_id,
    $fullname,
    $address,
    $purpose,
    $contactnum,
    $emailaddress,
    $date_issue,
    $indigencyfilechoice,
    $approvedby,
    $app_date,
    $upload_image,
    $status
    );
    // Execute query
    $stmt->execute();
    // store result 
    $result = $stmt->store_result();
    $stmt->close();
    }
                                                        
    if($result){
        $_SESSION['result'] = 'Approved Successfully! ';
        $_SESSION['status'] = 'ok';
    }else{
        $_SESSION['result'] = 'There is an Error: ';
        $_SESSION['status'] = 'error';
    }

}
}


if(isset($_POST['insertpermit'])){
	
    $approved_bpermitid = $_POST['approved_bpermitid'];
	$dateissued = $_POST['dateissued'];
    $selection	= $_POST['selection'];
	$fullname	= $_POST['fullname'];
    $contactno = $_POST['contactno'];
	$businessname = $_POST['businessname'];
	$businessaddress = $_POST['businessaddress'];
	$plateno = $_POST['plateno'];
	$email_add = $_POST['email_add'];
    $permitfilechoice = $_POST['permitfilechoice'];
    $app_date = $_POST['app_date'];
    $approvedby = $_POST['approvedby'];

	// get image info
	$permit_image = $_FILES['businessid_image']['name'];
	$image_error = $_FILES['businessid_image']['error'];
	$image_type = $_FILES['businessid_image']['type'];

    $status = $_POST['status'];
													
	// create array variable to handle error
	$error = array();
													
	if(empty($dateissued)){
	$error['dateissued'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
	}
	if(empty($fullname)){
	$error['fullname'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
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
		!empty($fullname) && 
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
	$upload = move_uploaded_file($_FILES['businessid_image']['tmp_name'], '../img/approved_bpermit/'.$permit_image);
												
	// insert new data to menu table
	$sql_query = "INSERT INTO approved_bpermits (approved_bpermitid, dateissued, selection, fullname, contactno, businessname, businessaddress, plateno, email_add,permitfilechoice, app_date, approvedby, businessid_image, status)
	VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
														
	$upload_image = $permit_image;
	$stmt = $connect->stmt_init();
	if($stmt->prepare($sql_query)) {	
	// Bind your variables to replace the ?s
	$stmt->bind_param('ssssssssssssss', 
    $approved_bpermitid,
	$dateissued,
    $selection,
	$fullname,
    $contactno,
	$businessname,
	$businessaddress,
	$plateno,
	$email_add,
    $permitfilechoice,
    $app_date,
    $approvedby,
    $upload_image,
    $status
	);
	// Execute query
	$stmt->execute();
	// store result 
	$result = $stmt->store_result();
	$stmt->close();
	}
														
    if($result){
        $_SESSION['result'] = 'Approved Successfully! ';
        $_SESSION['status'] = 'ok';
    }else{
        $_SESSION['result'] = 'There is an Error: ';
        $_SESSION['status'] = 'error';
    }

}
}


if(isset($_POST['insertAdminComp'])){

    $admincomp_id = $_POST['admincomp_id'];
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
    $dept = $_POST['dept'];
    $app_date = $_POST['app_date'];
    $app_by = $_POST['app_by'];                        
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


    // common image file extensions
    $allowedExts = array("pdf");
                                                    
    // get image file extension
    error_reporting(E_ERROR | E_PARSE);
    $extension = end(explode(".", $_FILES["blotterid_image"]["name"]));
                                                            
    if($image_error > 0){
        $error['blotterid_image'] = " <span class='label label-danger cattxtbox errormsg'> You must insert an image! </span>";
        }else if(!(($image_type == "pdf")) &&
        !(in_array($extension, $allowedExts))){  
        
         
                                                    
    $error['blotterid_image'] = " <span class='label label-danger errormsg'>File type must pdf!</span>";
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
        empty($error['blotterid_image'])){
                                                        
    // create random image file name
    $string = '0123456789';
    $file = preg_replace("/\s+/", "_", $_FILES['blotterid_image']['name']);
    $function = new functions;
    $blotter_image = $function->get_random_string($string, 4)."-".date("Y-m-d").".".$extension;
                                                            
    // upload new image
    $upload = move_uploaded_file($_FILES['blotterid_image']['tmp_name'], '../img/fileupload_admin/'.$blotter_image);
                                                
    // insert new data to menu table
    $sql_query = "INSERT INTO admin_complaints (admincomp_id, n_complainant, comp_age, comp_gender, comp_address,inci_address, contactno, bemailadd, n_violator, violator_age, violator_gender, relationship, violator_address, witnesses, complaints, dept, app_date, app_by, blotterid_image) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                                                        
    $upload_image = $blotter_image;
    $stmt = $connect->stmt_init();
    if($stmt->prepare($sql_query)) {	
    // Bind your variables to replace the ?s
    $stmt->bind_param('sssssssssssssssssss', 
    $admincomp_id,
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
    $dept,
    $app_date,
    $app_by,
    $upload_image
    );
    // Execute query
    $stmt->execute();
    // store result 
    $result = $stmt->store_result();
    $stmt->close();
    }
                                                        
    if($result){
        $_SESSION['result'] = 'Approved Successfully! ';
        $_SESSION['status'] = 'ok';
    }else{
        $_SESSION['result'] = 'There is an Error: ';
        $_SESSION['status'] = 'error';
    }

}
}
