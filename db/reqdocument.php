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
	
    $resident_id = $_POST['resident_id'];
	$fname = $_POST['fname'];
	$mname = $_POST['mname'];
	$lname	= $_POST['lname'];
	$address = $_POST['address'];
	$birthday = $_POST['birthday'];
	$placeofbirth = $_POST['placeofbirth'];
    $precintno = $_POST['precintno'];
	$contact_no = $_POST['contact_no'];
	$emailadd = $_POST['emailadd'];
    $barangayid_type = $_POST['barangayid_type'];

    $barangayid_image = $_FILES['id_image']['name'];
	$image_error = $_FILES['id_image']['error'];
	$image_type = $_FILES['id_image']['type'];

    $dateissue = $_POST['dateissue'];
    $brgyidfilechoice = $_POST['brgyidfilechoice'];
	$guardianname = $_POST['guardianname'];
	$emrgncycontact = $_POST['emrgncycontact'];
	$reladdress = $_POST['reladdress'];
										
													
	// create array variable to handle error
	$error = array();
													
	if(empty($fname)){
	$error['fname'] = "<span class='label label-danger cattxtbox errormsg'>First name is required field!</span>";
	}
	if(empty($lname)){
		$error['lname'] = "<span class='label label-danger cattxtbox errormsg'>Last name is required field!</span>";
	}
	if(empty($address)){
	$error['address'] = "<span class='label label-danger cattxtbox errormsg'>Address is required field!</span>";
	}
	if(empty($birthday)){
		$error['birthday'] = "<span class='label label-danger cattxtbox errormsg'>Birthday is required field!</span>";
	}
	if(empty($placeofbirth)){
		$error['placeofbirth'] = "<span class='label label-danger cattxtbox errormsg'>Place of Birth is required field!</span>";
	}
	if(empty($contact_no)){
		$error['contact_no'] = "<span class='label label-danger cattxtbox errormsg'>Contact no is required field!</span>";
	}
	if(empty($emailadd)){
		$error['emailadd'] = "<span class='label label-danger cattxtbox errormsg'>Email address is required field!</span>";
	}
	if(empty($guardianname)){
		$error['guardianname'] = "<span class='label label-danger cattxtbox errormsg'>Guardian name is required field!</span>";
	}
	if(empty($emrgncycontact)){
		$error['emrgncycontact'] = "<span class='label label-danger cattxtbox errormsg'>Emergency Contact no. is required field!</span>";
	}
	if(empty($reladdress)){
		$error['reladdress'] = "<span class='label label-danger cattxtbox errormsg'>Relative Address is required field!</span>";
	}

	// common image file extensions
	$allowedExts = array("docx");
													
	// get image file extension
	error_reporting(E_ERROR | E_PARSE);
	$extension = end(explode(".", $_FILES["id_image"]["name"]));
															
	if($image_error > 0){
	$error['id_image'] = " <span class='label label-danger cattxtbox errormsg'> You must insert file! </span>";
	}else if(!(($image_type == "docx")) &&
	!(in_array($extension, $allowedExts))){
													
	$error['id_image'] = " <span class='label label-danger errormsg'>File type must be docx!</span>";
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
		empty($error['id_image'])){
														
	// create random image file name
	$string = '0123456789';
	$file = preg_replace("/\s+/", "_", $_FILES['id_image']['name']);
	$function = new functions;
	$barangayid_image = $function->get_random_string($string, 4)."-".date("Y-m-d").".".$extension;
															
	// upload new image
	$upload = move_uploaded_file($_FILES['id_image']['tmp_name'], 'img/fileupload_barangayid/'.$barangayid_image);
												
	// insert new data to menu table
	$sql_query = "INSERT INTO barangayid (resident_id, fname, mname, lname, address, birthday,placeofbirth, precintno, contact_no, emailadd, barangayid_type, id_image, dateissue, brgyidfilechoice, guardianname, emrgncycontact, reladdress) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
														
	$upload_image = $barangayid_image;
	$stmt = $connect->stmt_init();
	if($stmt->prepare($sql_query)) {	
	// Bind your variables to replace the ?s
	$stmt->bind_param('sssssssssssssssss', 
    $resident_id,
	$fname,
	$mname,
	$lname,
	$address,
	$birthday,
	$placeofbirth,
    $precintno,
	$contact_no,
	$emailadd,
    $barangayid_type,
    $upload_image,
    $dateissue,
    $brgyidfilechoice,
	$guardianname,
	$emrgncycontact,
	$reladdress
	);
	// Execute query
	$stmt->execute();
	// store result 
	$result = $stmt->store_result();
	$stmt->close();
	}
														
	if($result){
	$error['add_barangayid'] = " 
		<div class='alert alert-success cattxtbox' style='font-size: 18px; text-align: center; margin-top: 5px;'>
			<label> * Your request was submitted successfully. Please wait for the confirmation of Barangay <a href='reqdoc_barangayid.php'>
            <i style='18px;' class='bx bx-smile fa-lg'></i>
            </a></label>
		</div>";
	}else{
		$error['add_barangayid'] = " 
            <div class='alert alert-warning cattxtbox' style='font-size: 18px; text-align: center; margin-top: 5px;'>
                <label> * Failed Submission! <a href='reqdoc_blotter.php'>
                <i style='18px;' class='bx bx-sad fa-lg'></i>
                </a></label>
            </div>";
                }
            }
        }


    
// 2.0 Prepared Statement for Business Permit: Req Documents
if(isset($_POST['permitBtn'])){
    $resident_id = $_POST['resident_id'];
	$dateissued = $_POST['dateissued'];
    $selection = $_POST['selection'];
	$fullname	= $_POST['fullname'];
    $contactno = $_POST['contactno'];
	$businessname = $_POST['businessname'];
	$businessaddress = $_POST['businessaddress'];
	$plateno = $_POST['plateno'];
	$email_add = $_POST['email_add'];
    $permitfilechoice = $_POST['permitfilechoice'];
													
	// get image info
	$permit_image = $_FILES['businessid_image']['name'];
	$image_error = $_FILES['businessid_image']['error'];
	$image_type = $_FILES['businessid_image']['type'];

    $bpermitid_type = $_POST['bpermitid_type'];
													
	// create array variable to handle error
	$error = array();
													
	if(empty($dateissued)){
	$error['dateissued'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
	}
    if(empty($selection)){
        $error['selection'] = "<span class='label label-danger cattxtbox errormsg'>Selection is required field!</span>";
        }
	if(empty($fullname)){
	$error['fullname'] = "<span class='label label-danger cattxtbox errormsg'>Fullname is required field!</span>";
	}
    if(empty($contactno)){
	$error['contactno'] = "<span class='label label-danger cattxtbox errormsg'>Contact no. is required field!</span>";
	}
	if(empty($businessname)){
	$error['businessname'] = "<span class='label label-danger cattxtbox errormsg'>Business name is required field!</span>";
	}
    if(empty($businessaddress)){
	$error['businessaddress'] = "<span class='label label-danger cattxtbox errormsg'>Business address is required field!</span>";
	}
	if(empty($plateno)){
	$error['plateno'] = "<span class='label label-danger cattxtbox errormsg'>Plate no is required field!</span>";
	}
	if(empty($email_add)){
	$error['email_add'] = "<span class='label label-danger cattxtbox errormsg'>Email address is required field! </span>";
	}

	// common image file extensions
	$allowedExts = array("docx");
													
	// get image file extension
	error_reporting(E_ERROR | E_PARSE);
	$extension = end(explode(".", $_FILES["businessid_image"]["name"]));
															
	if($image_error > 0){
	$error['businessid_image'] = " <span class='label label-danger cattxtbox errormsg'> You must insert file! </span>";
	}else if(!(($image_type == "docx")) &&
	!(in_array($extension, $allowedExts))){
													
	$error['businessid_image'] = " <span class='label label-danger errormsg'>File type must docx!</span>";
	}
													
	if( !empty($dateissued) && 
        !empty($selection) && 
		!empty($fullname) && 
        !empty($contactno) && 
		!empty($businessname) && 
		!empty($businessaddress) && 
		!empty($plateno) && 
		!empty($email_add) && 
		empty($error['businessid_image'])){
														
	// create random image file name
	$string = '0123456789';
	$file = preg_replace("/\s+/", "_", $_FILES['businessid_image']['name']);
	$function = new functions;
	$permit_image = $function->get_random_string($string, 4)."-".date("Y-m-d").".".$extension;
															
	// upload new image
	$upload = move_uploaded_file($_FILES['businessid_image']['tmp_name'], 'img/fileupload_bpermit/'.$permit_image);
												
	// insert new data to menu table
	$sql_query = "INSERT INTO businesspermit (resident_id,dateissued, selection, fullname, contactno, businessname, businessaddress, plateno, email_add, businessid_image, bpermitid_type, permitfilechoice)
	VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
														
	$upload_image = $permit_image;
	$stmt = $connect->stmt_init();
	if($stmt->prepare($sql_query)) {	
	// Bind your variables to replace the ?s
	$stmt->bind_param('ssssssssssss', 
    $resident_id,
	$dateissued,
    $selection,
	$fullname,
    $contactno,
	$businessname,
	$businessaddress,
	$plateno,
	$email_add,
	$upload_image,
    $bpermitid_type,
    $permitfilechoice
	);
	// Execute query
	$stmt->execute();
	// store result 
	$result = $stmt->store_result();
	$stmt->close();
	}
														
	if($result){
	$error['add_brgypermit'] = " 
            <div class='alert alert-success cattxtbox' style='font-size: 18px; text-align: center; margin-top: 5px;'>
            <label> * Your request was submitted successfully. Please wait for the confirmation of Barangay <a href='reqdoc_barangayid.php'>
            <i style='18px;' class='bx bx-smile fa-lg'></i>
            </a></label>
        </div>";
	}else{
		$error['add_brgypermit'] = " 
            <div class='alert alert-warning cattxtbox' style='font-size: 18px; text-align: center; margin-top: 5px;'>
                <label> * Failed Submission! <a href='reqdoc_blotter.php'>
                <i style='18px;' class='bx bx-sad fa-lg'></i>
                </a></label>
            </div>";
                }
            }
        }

        if(isset($_POST['permitBtnnew'])){
            $resident_id = $_POST['resident_id'];
            $dateissued = $_POST['dateissued'];
            $selection = $_POST['selection'];
            $fullname	= $_POST['fullname'];
            $contactno = $_POST['contactno'];
            $businessname = $_POST['businessname'];
            $businessaddress = $_POST['businessaddress'];
            $email_add = $_POST['email_add'];
            $permitfilechoice = $_POST['permitfilechoice'];
                                                            
            // get image info
            $permit_image = $_FILES['businessid_image']['name'];
            $image_error = $_FILES['businessid_image']['error'];
            $image_type = $_FILES['businessid_image']['type'];
        
            $bpermitid_type = $_POST['bpermitid_type'];
                                                            
            // create array variable to handle error
            $error = array();
                                                            
            if(empty($dateissued)){
            $error['dateissued'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
            }
            if(empty($selection)){
                $error['selection'] = "<span class='label label-danger cattxtbox errormsg'>Selection is required field!</span>";
                }
            if(empty($fullname)){
            $error['fullname'] = "<span class='label label-danger cattxtbox errormsg'>Fullname is required field!</span>";
            }
            if(empty($contactno)){
            $error['contactno'] = "<span class='label label-danger cattxtbox errormsg'>Contact no. is required field!</span>";
            }
            if(empty($businessname)){
            $error['businessname'] = "<span class='label label-danger cattxtbox errormsg'>Business name is required field!</span>";
            }
            if(empty($businessaddress)){
            $error['businessaddress'] = "<span class='label label-danger cattxtbox errormsg'>Business address is required field!</span>";
            }
            if(empty($email_add)){
            $error['email_add'] = "<span class='label label-danger cattxtbox errormsg'>Email address is required field! </span>";
            }
        
            // common image file extensions
            $allowedExts = array("docx");
                                                            
            // get image file extension
            error_reporting(E_ERROR | E_PARSE);
            $extension = end(explode(".", $_FILES["businessid_image"]["name"]));
                                                                    
            if($image_error > 0){
            $error['businessid_image'] = " <span class='label label-danger cattxtbox errormsg'> You must insert file! </span>";
            }else if(!(($image_type == "docx")) &&
            !(in_array($extension, $allowedExts))){
                                                            
            $error['businessid_image'] = " <span class='label label-danger errormsg'>File type must docx!</span>";
            }
                                                            
            if( !empty($dateissued) && 
                !empty($selection) && 
                !empty($fullname) && 
                !empty($contactno) && 
                !empty($businessname) && 
                !empty($businessaddress) && 
                !empty($email_add) && 
                empty($error['businessid_image'])){
                                                                
            // create random image file name
            $string = '0123456789';
            $file = preg_replace("/\s+/", "_", $_FILES['businessid_image']['name']);
            $function = new functions;
            $permit_image = $function->get_random_string($string, 4)."-".date("Y-m-d").".".$extension;
                                                                    
            // upload new image
            $upload = move_uploaded_file($_FILES['businessid_image']['tmp_name'], 'img/fileupload_bpermit/'.$permit_image);
                                                        
            // insert new data to menu table
            $sql_query = "INSERT INTO businesspermit (resident_id, dateissued, selection, fullname, contactno, businessname, businessaddress, email_add, businessid_image, bpermitid_type, permitfilechoice)
            VALUES(?,?,?,?,?,?,?,?,?,?,?)";
                                                                
            $upload_image = $permit_image;
            $stmt = $connect->stmt_init();
            if($stmt->prepare($sql_query)) {	
            // Bind your variables to replace the ?s
            $stmt->bind_param('sssssssssss', 
            $resident_id,
            $dateissued,
            $selection,
            $fullname,
            $contactno,
            $businessname,
            $businessaddress,
            $email_add,
            $upload_image,
            $bpermitid_type,
            $permitfilechoice
            );
            // Execute query
            $stmt->execute();
            // store result 
            $result = $stmt->store_result();
            $stmt->close();
            }
                                                                
            if($result){
            $error['add_brgypermit'] = " 
                    <div class='alert alert-success cattxtbox'font-size: 18px; style='font-size: 18px; text-align: center; margin-top: 5px;'>
                    <label> * Your request was submitted successfully. Please wait for the confirmation of Barangay <a href='reqdoc_barangayid.php'>
                    <i style='18px;' class='bx bx-smile fa-lg'></i>
                    </a></label>
                </div>";
            }else{
                $error['add_brgypermit'] = " 
                    <div class='alert alert-warning cattxtbox' style='font-size: 18px; text-align: center; margin-top: 5px;'>
                        <label> * Failed Submission! <a href='reqdoc_blotter.php'>
                        <i style='18px;' class='bx bx-sad fa-lg'></i>
                        </a></label>
                    </div>";
                        }
                    }
                }
// 3.0 Prepared Statement for Barangay Indigency: Req Documents
    if(isset($_POST['indigencybtn'])){
	
        $resident_id = $_POST['resident_id'];
        $fullname = $_POST['fullname'];
        $address = $_POST['address'];
        $purpose = $_POST['purpose'];
        $contactnum = $_POST['contactnum'];
        $emailaddress = $_POST['emailaddress'];
        $date_issue = $_POST['date_issue'];
        $indigencyfilechoice = $_POST['indigencyfilechoice'];
                                                        
        // get image info
        $indigency_image = $_FILES['indigencyid_image']['name'];
        $image_error = $_FILES['indigencyid_image']['error'];
        $image_type = $_FILES['indigencyid_image']['type'];

        $indigencyid_type = $_POST['indigencyid_type'];
                                                        
        // create array variable to handle error
        $error = array();
                                                        
        if(empty($fullname)){
        $error['fullname'] = "<span class='label label-danger cattxtbox errormsg'>Full name is required field!</span>";
        }
        if(empty($address)){
        $error['address'] = "<span class='label label-danger cattxtbox errormsg'>Address is required field!</span>";
        }
        if(empty($purpose)){
        $error['purpose'] = "<span class='label label-danger cattxtbox errormsg'>Purpose is required field!</span>";
        }
        if(empty($date_issue)){
        $error['date_issue'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
        }
        if(empty($contactnum)){
        $error['contactnum'] = "<span class='label label-danger cattxtbox errormsg'>Contact no. is required field!</span>";
        }
        if(empty($emailaddress)){
        $error['emailaddress'] = "<span class='label label-danger cattxtbox errormsg'>Email address is required field!</span>";
        }
    
        // common image file extensions
        $allowedExts = array("pdf");
                                                        
        // get image file extension
        error_reporting(E_ERROR | E_PARSE);
        $extension = end(explode(".", $_FILES["indigencyid_image"]["name"]));
                                                                
        if($image_error > 0){
        $error['indigencyid_image'] = " <span class='label label-danger cattxtbox errormsg'>You must insert file! </span>";
        }else if(!(($image_type == "pdf")) &&
        !(in_array($extension, $allowedExts))){
                                                        
        $error['indigencyid_image'] = " <span class='label label-danger errormsg'>File type must docx!</span>";
        }
                                                        
        if( !empty($fullname) &&  
            !empty($address) && 
            !empty($purpose) && 
            !empty($date_issue) && 
            !empty($contactnum) && 
            !empty($emailaddress) && 
            !empty($date_issue) && 
            empty($error['indigencyid_image'])){
                                                            
        // create random image file name
        $string = '0123456789';
        $file = preg_replace("/\s+/", "_", $_FILES['indigencyid_image']['name']);
        $function = new functions;
        $indigency_image = $function->get_random_string($string, 4)."-".date("Y-m-d").".".$extension;
                                                                
        // upload new image
        $upload = move_uploaded_file($_FILES['indigencyid_image']['tmp_name'], 'img/fileupload_indigency/'.$indigency_image);
                                                    
        // insert new data to menu table
        $sql_query = "INSERT INTO certificateindigency (resident_id,fullname, address, purpose, contactnum, emailaddress, date_issue,indigencyid_image, indigencyid_type, indigencyfilechoice)
        VALUES(?,?,?,?,?,?,?,?,?,?)";
                                                            
        $upload_image = $indigency_image;
        $stmt = $connect->stmt_init();
        if($stmt->prepare($sql_query)) {	
        // Bind your variables to replace the ?s
        $stmt->bind_param('ssssssssss', 
        $resident_id,
        $fullname,
        $address,
        $purpose,
        $contactnum,
        $emailaddress,
        $date_issue,
        $upload_image,
        $indigencyid_type,
        $indigencyfilechoice
        );
        // Execute query
        $stmt->execute();
        // store result 
        $result = $stmt->store_result();
        $stmt->close();
        }
                                                            
        if($result){
        $error['add_brgyindigency'] = " 
            <div class='alert alert-success cattxtbox' style='font-size: 18px; text-align: center; margin-top: 5px;'>
                <label> * Your request was submitted successfully. Please wait for the confirmation of Barangay <a href='reqdoc_barangayid.php'>
                <i style='18px;' class='bx bx-smile fa-lg'></i>
                </a></label>
            </div>";
        }else{
            $error['add_brgyindigency'] = " 
            <div class='alert alert-warning cattxtbox' style='font-size: 18px; text-align: center; margin-top: 5px;'>
                <label> * Failed Submission! <a href='reqdoc_blotter.php'>
                <i style='18px;' class='bx bx-sad fa-lg'></i>
                </a></label>
            </div>";
                }
            }
        }

  // 4.0 Prepared Statement for Barangay Clearance: Req Documents      
        if(isset($_POST['clearancebtn'])){

            $resident_id = $_POST['resident_id'];
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
            $clearanceid_type = $_POST['clearanceid_type'];

            $filechoice = $_POST['filechoice'];                                
                                                            
            // create array variable to handle error
            $error = array();
                                                            
            if(empty($full_name)){
            $error['full_name'] = "<span class='label label-danger cattxtbox errormsg'>Full name is required field!</span>";
            }
            if(empty($age)){
            $error['age'] = "<span class='label label-danger cattxtbox errormsg'>Age is required field!</span>";
            }
            if(empty($status)){
            $error['status'] = "<span class='label label-danger cattxtbox errormsg'>Status is required field!</span>";
            }
            if(empty($nationality)){
            $error['nationality'] = "<span class='label label-danger cattxtbox errormsg'>Nationality is required field!</span>";
            }
            if(empty($address)){
            $error['address'] = "<span class='label label-danger cattxtbox errormsg'>Address is required field!</span>";
            }
            if(empty($contactno)){
            $error['contactno'] = "<span class='label label-danger cattxtbox errormsg'>Contact no. is required field!</span>";
            }
            if(empty($emailadd)){
            $error['emailadd'] = "<span class='label label-danger cattxtbox errormsg'>Email address is required field!</span>";
            }
            if(empty($purpose)){
            $error['purpose'] = "<span class='label label-danger cattxtbox errormsg'>Purpose is required field!</span>";
            }
            if(empty($date_issued)){
            $error['date_issued'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
            }
            // if(empty($ctc_no)){
            // $error['ctc_no'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
            // }
          
            // if(empty($precint_no)){
            // $error['precint_no'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
            // }
            if(empty($filechoice)){
                $error['filechoice'] = "<span class='label label-danger cattxtbox errormsg'>File choice is required field!</span>";
                }
        
            // common image file extensions
            $allowedExts = array("docx");
                                                            
            // get image file extension
            error_reporting(E_ERROR | E_PARSE);
            $extension = end(explode(".", $_FILES["clearanceid_image"]["name"]));
                                                                    
            if($image_error > 0){
            $error['clearanceid_image'] = " <span class='label label-danger cattxtbox errormsg'> You must insert file! </span>";
            }else if(!(($image_type == "docx")) &&
            !(in_array($extension, $allowedExts))){
                                                            
            $error['clearanceid_image'] = " <span class='label label-danger errormsg'>File type must docx!</span>";
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
          
                // !empty($precint_no) &&
                empty($error['clearanceid_image']) && 
                !empty($filechoice)){
                                                                
            // create random image file name
            $string = '0123456789';
            $file = preg_replace("/\s+/", "_", $_FILES['clearanceid_image']['name']);
            $function = new functions;
            $clearance_image = $function->get_random_string($string, 4)."-".date("Y-m-d").".".$extension;
                                                                    
            // upload new image
            $upload = move_uploaded_file($_FILES['clearanceid_image']['tmp_name'], 'img/fileupload_clearance/'.$clearance_image);
                                                        
            // insert new data to menu table
            $sql_query = "INSERT INTO barangayclearance (resident_id,full_name, age, status, nationality, address,contactno, emailadd, purpose, date_issued, ctc_no, issued_at, precint_no, clearanceid_image, clearanceid_type, filechoice)
            VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                                                                
            $upload_image = $clearance_image;
            $stmt = $connect->stmt_init();
            if($stmt->prepare($sql_query)) {	
            // Bind your variables to replace the ?s
            $stmt->bind_param('ssssssssssssssss', 
            $resident_id,
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
            $clearanceid_type,
            $filechoice
            );
            // Execute query
            $stmt->execute();
            // store result 
            $result = $stmt->store_result();
            $stmt->close();
            }
                                                                
            if($result){
            $error['add_brgyclearance'] = " 
                <div class='alert alert-success cattxtbox' style='font-size: 18px; text-align: center; margin-top: 5px;'>
                    <label> * Your request was submitted successfully. Please wait for the confirmation of Barangay <a href='resident-defaultpage.php'>
                    <i style='18px;' class='bx bx-smile fa-lg'></i>
                    </a></label>
                </div>";
            }else{
                $error['add_brgyclearance'] = " 
                    <div class='alert alert-warning cattxtbox' style='font-size: 18px; text-align: center; margin-top: 5px;'>
                        <label> * Failed Submission! <a href='resident-defaultpage.php'>
                        <i style='18px;' class='bx bx-sad fa-lg'></i>
                        </a></label>
                    </div>";
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

                // get image info
                $blotter_image = $_FILES['blotterid_image']['name'];
                $image_error = $_FILES['blotterid_image']['error'];
                $image_type = $_FILES['blotterid_image']['type'];
                                                                
                // create array variable to handle error
                $error = array();
                                                                
                if(empty($n_complainant)){
                $error['n_complainant'] = "<span class='label label-danger cattxtbox errormsg'>Name of complainant is required field!</span>";
                }
                if(empty($comp_age)){
                $error['comp_age'] = "<span class='label label-danger cattxtbox errormsg'>Complainants age is required field!</span>";
                }
                if(empty($comp_gender)){
                $error['comp_gender'] = "<span class='label label-danger cattxtbox errormsg'>Complainants gender is required field!</span>";
                }
                if(empty($comp_address)){
                $error['comp_address'] = "<span class='label label-danger cattxtbox errormsg'>Complainants address is required field!</span>";
                }
                if(empty($inci_address)){
                $error['inci_address'] = "<span class='label label-danger cattxtbox errormsg'>Incident address is required field!</span>";
                }
                if(empty($contactno)){
                $error['contactno'] = "<span class='label label-danger cattxtbox errormsg'>Contact no. is required field!</span>";
                }
                if(empty($bemailadd)){
                    $error['bemailadd'] = "<span class='label label-danger cattxtbox errormsg'>Email address is required field!</span>";
                    }
                if(empty($n_violator)){
                $error['n_violator'] = "<span class='label label-danger cattxtbox errormsg'>Name of violator is required field!</span>";
                }
                if(empty($violator_age)){
                $error['violator_age'] = "<span class='label label-danger cattxtbox errormsg'>Violator's age is required field!</span>";
                }
                if(empty($violator_gender)){
                $error['violator_gender'] = "<span class='label label-danger cattxtbox errormsg'>Violator's gender is required field!</span>";
                }
                if(empty($relationship)){
                $error['relationship'] = "<span class='label label-danger cattxtbox errormsg'>Relationship is required field!</span>";
                }
                if(empty($violator_address)){
                $error['violator_address'] = "<span class='label label-danger cattxtbox errormsg'>Violator's address is required field!</span>";
                }
                if(empty($witnesses)){
                $error['witnesses'] = "<span class='label label-danger cattxtbox errormsg'>Witnesses is required field!</span>";
                }
                if(empty($complaints)){
                $error['complaints'] = "<span class='label label-danger cattxtbox errormsg'>Complaints is required field!</span>";
                }
            
                // common image file extensions
                $allowedExts = array("pdf");
                                                                
                // get image file extension
                error_reporting(E_ERROR | E_PARSE);
                $extension = end(explode(".", $_FILES["blotterid_image"]["name"]));
                                                                        
                if($image_error > 0){
                $error['blotterid_image'] = "<span class='label label-danger cattxtbox errormsg'> You must insert file! </span>";
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
                $upload = move_uploaded_file($_FILES['blotterid_image']['tmp_name'], 'img/fileupload_blotter/'.$blotter_image);
                                                            
                // insert new data to menu table
                $sql_query = "INSERT INTO blotterdb (n_complainant, comp_age, comp_gender, comp_address, inci_address,contactno, bemailadd, n_violator, violator_age, violator_gender, relationship, violator_address, witnesses, complaints, blotterid_image)
                VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                                                                    
                $upload_image = $blotter_image;
                $stmt = $connect->stmt_init();
                if($stmt->prepare($sql_query)) {	
                // Bind your variables to replace the ?s
                $stmt->bind_param('sssssssssssssss', 
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
                $upload_image
                );
                // Execute query
                $stmt->execute();
                // store result 
                $result = $stmt->store_result();
                $stmt->close();
                }
                                                                    
                if($result){
                $error['add_blotter'] = " 
                    <div class='alert alert-success cattxtbox' style='font-size: 18px; text-align: center; margin-top: 5px;'>
                        <label> * Your request was submitted successfully. Please wait for the confirmation of Barangay <a href='reqdoc_blotter.php'>
                        <i style='18px;' class='bx bx-smile fa-lg'></i>
                        </a></label>
                    </div>";
                }else{
                    $error['add_blotter'] = " 
                    <div class='alert alert-warning cattxtbox' style='font-size: 18px; text-align: center; margin-top: 5px;'>
                        <label> * Failed Submission! <a href='reqdoc_blotter.php'>
                        <i style='18px;' class='bx bx-sad fa-lg'></i>
                        </a></label>
                    </div>";
                        }
                    }
                }


// 6.0 Prepared Statement for Admin Complaints: Req Documents<span class='label label-danger'>Failed Submission! </span>
      
