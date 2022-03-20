<?php
DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');
error_reporting(~E_NOTICE);

if($_SERVER['REQUEST_METHOD']=='POST')
{
if (isset($_POST['submitcensus'])) {
    $householdid = $_POST['householdid'];
    $no_of_people = $_POST['no_of_people'];
    $addpeople = $_POST['addpeople'];
    $house = $_POST['house'];
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $suffix = $_POST['suffix'];
    $gender = $_POST['gender'];
    $maritalstatus = $_POST['maritalstatus'];
    $dateofbirth = $_POST['dateofbirth'];
    $placeofbirth = $_POST['placeofbirth'];
    $houseno = $_POST['houseno'];
    $street = $_POST['street'];
    $barangay = $_POST['barangay'];
    $city = $_POST['city'];
    $contactnumber = $_POST['contactnumber'];
    $seniorcitizen = $_POST['seniorcitizen'];
    $employeed = $_POST['employeed'];
    $occupation = $_POST['occupation'];
    $voter = $_POST['voter'];
    $registered_year = $_POST['registered_year'];
    $date_added = date("Y-m-d", strtotime("now"));
    $time_added = date("Y-m-d H:i:s",strtotime("now"));


    $sql_create_acc = "SELECT COUNT(householdid) AS num FROM census WHERE householdid = :householdid";
	$stmt = $db->prepare($sql_create_acc);
	$stmt->bindValue(':householdid', $householdid);
	$stmt->execute();
	
	$count_row = $stmt->fetch(PDO::FETCH_ASSOC);
	
	if($count_row['num']>0){
        echo "<script>
                alert('Data is duplicated');
                window.location.href='residentcensus.php';
            </script>";
    
	
	}else{

    // create array variable to handle error
    $error = array();

    if (empty($no_of_people)) {
        $error['no_of_people'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
    }

    if (empty($addpeople)) {
        $error['addpeople'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
    }

    if (empty($house)) {
        $error['house'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
    }

    if (empty($lastname)) {
        $error['lastname'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
    }

    if (empty($firstname)) {
        $error['firstname'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
    }

    if (empty($gender)) {
        $error['gender'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
    }

    if (empty($maritalstatus)) {
        $error['maritalstatus'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
    }

    if (empty($dateofbirth)) {
        $error['gender'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
    }

    if (empty($placeofbirth)) {
        $error['placeofbirth'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
    }

    if (empty($houseno)) {
        $error['houseno'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
    }

    if (empty($street)) {
        $error['street'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
    }

    if (empty($barangay)) {
        $error['barangay'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
    }

    if (empty($city)) {
        $error['city'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
    }

    if (empty($contactnumber)) {
        $error['contactnumber'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
    }

    if (empty($seniorcitizen)) {
        $error['seniorcitizen'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
    }

    if (empty($employeed)) {
        $error['employeed'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
    }

    if (empty($voter)) {
        $error['voter'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
    }


    if (
        !empty($householdid) &&
        !empty($no_of_people) &&
        !empty($addpeople) &&
        !empty($house) &&
        !empty($lastname) &&
        !empty($firstname) &&
        !empty($gender) &&
        !empty($maritalstatus) &&
        !empty($dateofbirth) &&
        !empty($placeofbirth) &&
        !empty($houseno) &&
        !empty($street) &&
        !empty($barangay) &&
        !empty($city) &&
        !empty($contactnumber) &&
        !empty($seniorcitizen) &&
        !empty($employeed) &&
        !empty($voter)
    ) {


        // insert new data to menu table
        $sql_query = "INSERT INTO census (householdid,no_of_people, addpeople, house, lastname, firstname, middlename, suffix, gender, maritalstatus, dateofbirth, placeofbirth, houseno, street, barangay, city, contactnumber, seniorcitizen, employeed, occupation, voter, registered_year, date_added, time_added)
                VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

        $stmt = $connect->stmt_init();
        if ($stmt->prepare($sql_query)) {
            // Bind your variables to replace the ?s
            $stmt->bind_param(
                'ssssssssssssssssssssssss',
                $householdid,
                $no_of_people,
                $addpeople,
                $house,
                $lastname,
                $firstname,
                $middlename,
                $suffix,
                $gender,
                $maritalstatus,
                $dateofbirth,
                $placeofbirth,
                $houseno,
                $street,
                $barangay,
                $city,
                $contactnumber,
                $seniorcitizen,
                $employeed,
                $occupation,
                $voter,
                $registered_year,
                $date_added,
                $time_added
            );
            // Execute query
            $stmt->execute();
            // store result 
            $result = $stmt->store_result();
            $stmt->close();
        }

        if ($result) {
            echo "<script>
                    alert('Submitted Successfully');
                    window.location.href='residentcensus.php';
                </script>";
        }else{
            echo "<script>
                    alert('Faild Submission');
                    window.location.href='residentcensus.php';
                </script>";
                }
            }
        }
}}


if($_SERVER['REQUEST_METHOD']=='POST')
{
if (isset($_POST['submitcensus'])) {
    $householdid = $_POST['householdid'];
    $no_of_people = $_POST['no_of_people'];
    $addpeople = $_POST['addpeople'];
    $house = $_POST['house'];
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $suffix = $_POST['suffix'];
    $gender = $_POST['gender'];
    $maritalstatus = $_POST['maritalstatus'];
    $dateofbirth = $_POST['dateofbirth'];
    $placeofbirth = $_POST['placeofbirth'];
    $houseno = $_POST['houseno'];
    $street = $_POST['street'];
    $barangay = $_POST['barangay'];
    $city = $_POST['city'];
    $contactnumber = $_POST['contactnumber'];
    $seniorcitizen = $_POST['seniorcitizen'];
    $employeed = $_POST['employeed'];
    $occupation = $_POST['occupation'];
    $voter = $_POST['voter'];
    $registered_year = $_POST['registered_year'];
    $date_added = date("Y-m-d", strtotime("now"));
    $time_added = date("Y-m-d H:i:s",strtotime("now"));


    // create array variable to handle error
    $error = array();

    if (empty($no_of_people)) {
        $error['no_of_people'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
    }

    if (empty($addpeople)) {
        $error['addpeople'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
    }

    if (empty($house)) {
        $error['house'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
    }

    if (empty($lastname)) {
        $error['lastname'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
    }

    if (empty($firstname)) {
        $error['firstname'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
    }

    if (empty($gender)) {
        $error['gender'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
    }

    if (empty($maritalstatus)) {
        $error['maritalstatus'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
    }

    if (empty($dateofbirth)) {
        $error['gender'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
    }

    if (empty($placeofbirth)) {
        $error['placeofbirth'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
    }

    if (empty($houseno)) {
        $error['houseno'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
    }

    if (empty($street)) {
        $error['street'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
    }

    if (empty($barangay)) {
        $error['barangay'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
    }

    if (empty($city)) {
        $error['city'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
    }

    if (empty($contactnumber)) {
        $error['contactnumber'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
    }

    if (empty($seniorcitizen)) {
        $error['seniorcitizen'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
    }

    if (empty($employeed)) {
        $error['employeed'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
    }

    if (empty($voter)) {
        $error['voter'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
    }


    if (
        !empty($householdid) &&
        !empty($no_of_people) &&
        !empty($addpeople) &&
        !empty($house) &&
        !empty($lastname) &&
        !empty($firstname) &&
        !empty($gender) &&
        !empty($maritalstatus) &&
        !empty($dateofbirth) &&
        !empty($placeofbirth) &&
        !empty($houseno) &&
        !empty($street) &&
        !empty($barangay) &&
        !empty($city) &&
        !empty($contactnumber) &&
        !empty($seniorcitizen) &&
        !empty($employeed) &&
        !empty($voter)
    ) {


        // insert new data to menu table
        $sql_query = "INSERT INTO census_fam_members (householdid,no_of_people, addpeople, house, lastname, firstname, middlename, suffix, gender, maritalstatus, dateofbirth, placeofbirth, houseno, street, barangay, city, contactnumber, seniorcitizen, employeed, occupation, voter, registered_year, date_added, time_added)
                VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

        $stmt = $connect->stmt_init();
        if ($stmt->prepare($sql_query)) {
            // Bind your variables to replace the ?s
            $stmt->bind_param(
                'ssssssssssssssssssssssss',
                $householdid,
                $no_of_people,
                $addpeople,
                $house,
                $lastname,
                $firstname,
                $middlename,
                $suffix,
                $gender,
                $maritalstatus,
                $dateofbirth,
                $placeofbirth,
                $houseno,
                $street,
                $barangay,
                $city,
                $contactnumber,
                $seniorcitizen,
                $employeed,
                $occupation,
                $voter,
                $registered_year,
                $date_added,
                $time_added
            );
            // Execute query
            $stmt->execute();
            // store result 
            $result = $stmt->store_result();
            $stmt->close();
        }

        if ($result) {
            echo "<script>
                    alert('Submitted Successfully');
                </script>";
        }else{
            echo "<script>
                    alert('Failed Submission');
                </script>";
                }
            }
        }
}





if($_SERVER['REQUEST_METHOD']=='POST')
  {
  if(isset($_POST['addfammember'])){
	
    $householdid = $_POST['householdid'];
    $no_of_people = $_POST['no_of_people'];
    $addpeople = $_POST['addpeople'];
    $house = $_POST['house'];
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $suffix = $_POST['suffix'];
    $gender = $_POST['gender'];
    $maritalstatus = $_POST['maritalstatus'];
    $dateofbirth = $_POST['dateofbirth'];
    $placeofbirth = $_POST['placeofbirth'];
    $houseno = $_POST['houseno'];
    $street = $_POST['street'];
    $barangay = $_POST['barangay'];
    $city = $_POST['city'];
    $contactnumber = $_POST['contactnumber'];
    $seniorcitizen = $_POST['seniorcitizen'];
    $employeed = $_POST['employeed'];
    $occupation = $_POST['occupation'];
    $voter = $_POST['voter'];
    $registered_year = $_POST['registered_year'];
    $date_added = date("Y-m-d", strtotime("now"));
    $time_added = date("Y-m-d H:i:s",strtotime("now"));

    // create array variable to handle error
    $error = array();

    if (empty($no_of_people)) {
        $error['no_of_people'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
    }

    if (empty($addpeople)) {
        $error['addpeople'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
    }

    if (empty($house)) {
        $error['house'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
    }

    if (empty($lastname)) {
        $error['lastname'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
    }

    if (empty($firstname)) {
        $error['firstname'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
    }

    if (empty($gender)) {
        $error['gender'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
    }

    if (empty($maritalstatus)) {
        $error['maritalstatus'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
    }

    if (empty($dateofbirth)) {
        $error['gender'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
    }

    if (empty($placeofbirth)) {
        $error['placeofbirth'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
    }

    if (empty($houseno)) {
        $error['houseno'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
    }

    if (empty($street)) {
        $error['street'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
    }

    if (empty($barangay)) {
        $error['barangay'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
    }

    if (empty($city)) {
        $error['city'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
    }

    if (empty($contactnumber)) {
        $error['contactnumber'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
    }

    if (empty($seniorcitizen)) {
        $error['seniorcitizen'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
    }

    if (empty($employeed)) {
        $error['employeed'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
    }

    if (empty($voter)) {
        $error['voter'] = "<span class='label label-danger cattxtbox errormsg'>This is required field!</span>";
    }


    if (
        !empty($householdid) &&
        !empty($no_of_people) &&
        !empty($addpeople) &&
        !empty($house) &&
        !empty($lastname) &&
        !empty($firstname) &&
        !empty($gender) &&
        !empty($maritalstatus) &&
        !empty($dateofbirth) &&
        !empty($placeofbirth) &&
        !empty($houseno) &&
        !empty($street) &&
        !empty($barangay) &&
        !empty($city) &&
        !empty($contactnumber) &&
        !empty($seniorcitizen) &&
        !empty($employeed) &&
        !empty($voter)
    ) {

      $stmt = $db->prepare("INSERT INTO census_fam_members (householdid,no_of_people, addpeople, house, lastname, firstname, middlename, suffix, gender, maritalstatus, dateofbirth, placeofbirth, houseno, street, barangay, city, contactnumber, seniorcitizen, employeed, occupation, voter, registered_year, date_added, time_added) VALUES (:householdid, :no_of_people, :addpeople, :house, :lastname, :firstname, :middlename, :suffix, :gender, :maritalstatus, :dateofbirth, :placeofbirth, :houseno, :street, :barangay, :city, :contactnumber, :seniorcitizen, :employeed, :occupation, :voter, :registered_year, :date_added, :time_added)");
  
      $stmt->bindParam(':householdid', $householdid);
      $stmt->bindParam(':no_of_people', $no_of_people);
      $stmt->bindParam(':addpeople', $addpeople);
      $stmt->bindParam(':house', $house);
      $stmt->bindParam(':lastname', $lastname);
      $stmt->bindParam(':firstname', $firstname);
      $stmt->bindParam(':middlename', $middlename);
      $stmt->bindParam(':suffix', $suffix);
      $stmt->bindParam(':gender', $gender);
      $stmt->bindParam(':maritalstatus', $maritalstatus);
      $stmt->bindParam(':dateofbirth', $dateofbirth);
      $stmt->bindParam(':placeofbirth', $placeofbirth);
      $stmt->bindParam(':houseno', $houseno);
      $stmt->bindParam(':street', $street);
      $stmt->bindParam(':barangay', $barangay);
      $stmt->bindParam(':city', $city);
      $stmt->bindParam(':contactnumber', $contactnumber);
      $stmt->bindParam(':seniorcitizen', $seniorcitizen);
      $stmt->bindParam(':employeed', $employeed);
      $stmt->bindParam(':occupation', $occupation);
      $stmt->bindParam(':voter', $voter);
      $stmt->bindParam(':registered_year', $registered_year);
      $stmt->bindParam(':date_added', $date_added);
      $stmt->bindParam(':time_added', $time_added);

    if($stmt->execute()){
        $_SESSION['status'] = 'Approved Successfully! ';
        $_SESSION['status_code'] = 'ok';
    }else{
        $_SESSION['status'] = 'There is an Error: ';
        $_SESSION['status_code'] = 'error';
    }
  }
}
  }