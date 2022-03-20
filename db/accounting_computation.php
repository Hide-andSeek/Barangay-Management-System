<?php
	$project_total_amount = '';
    $equip_total_amount = '';
    $payment_amount = '';
    $total_amount = '';
    $payroll_total_amount = '';
    $no_householdid = '';
    $fam_noid = '';
    $no_gender_male = '';
    $no_gender_female = '';   
    $total_resident = '';
    $total_employee = '';
    $total_brgyid_request = '';
    $total_no_clearance_request = '';
    $total_no_indigency_request = '';
    $total_voters = '';
    $total_voters_no = '';
    $no_employeed = '';
    $no_unemployeed = '';
    $owner_house = '';
    $tenant_house = '';


    //This is for Project Budget Total Sum
	$result = mysqli_query($connect, 'SELECT SUM(amount) AS amount FROM budget');
								
	while ($row = mysqli_fetch_array($result)) {
	$project_total_amount = $row['amount'];
    }

     //This is for Equipment Expenses Total Sum
	$result = mysqli_query($connect, 'SELECT SUM(amount) AS amount FROM equip_budget');

    while ($row = mysqli_fetch_array($result)) {
    $equip_total_amount = $row['amount'];
    }

    //This is for Document Request Total Sum
    $result = mysqli_query($connect, 'SELECT SUM(amount) AS amount FROM payments WHERE payment_status = "Paid"');

    while ($row = mysqli_fetch_array($result)) {
    $payment_amount = $row['amount'];
    }

    //This is for Total Funds: Total Summary
    $result=mysqli_query($connect,'SELECT SUM(amount) AS amount FROM total_funds');

    while($row=mysqli_fetch_array($result)){
    $total_amount = $row['amount'];
    }

    $project_budget = $total_amount - $project_total_amount;

    //This is for Payroll: Total Summary
    $result=mysqli_query($connect,'SELECT SUM(salary) AS salary FROM payroll');

    while($row=mysqli_fetch_array($result)){
    $payroll_total_amount = $row['salary'];
    }
  
    $project_budget = $total_amount - $project_total_amount;


    //This is for Family Member: Total Summary
    $result=mysqli_query($connect,'SELECT SUM(no_householdid) AS no_householdid FROM census_fam_members');

    while($row=mysqli_fetch_array($result)){
    $no_householdid = $row['no_householdid'];
    }

    //This is for Payroll: Total Summary
    $result=mysqli_query($connect,'SELECT SUM(fam_no) AS fam_no FROM census');

    while($row=mysqli_fetch_array($result)){
    $fam_noid = $row['fam_no'];
    }

    //This is for Payroll: Total Summary
    $result=mysqli_query($connect,'SELECT SUM(gender)  AS gender FROM census_fam_members WHERE gender = "Male"');

    while($row=mysqli_fetch_array($result)){
    $no_gender_male = $row['gender'];
    }

     //This is for Payroll: Total Summary
     $result=mysqli_query($connect,'SELECT SUM(gender)  AS gender FROM census_fam_members WHERE gender = "Female"');

     while($row=mysqli_fetch_array($result)){
     $no_gender_female = $row['gender'];
     }
     
     $result=mysqli_query($connect,'SELECT SUM(no_resident)  AS no_resident FROM accreg_resident');

     while($row=mysqli_fetch_array($result)){
     $total_resident = $row['no_resident'];
     }
 
     $result=mysqli_query($connect,'SELECT SUM(no_employee)  AS no_employee FROM  usersdb');

     while($row=mysqli_fetch_array($result)){
     $total_employee = $row['no_employee'];
     }

     $result=mysqli_query($connect,'SELECT SUM(no_brgyid)  AS no_brgyid  FROM  approved_brgyids WHERE payment_stat = "Paid"');

     while($row=mysqli_fetch_array($result)){
     $total_brgyid_request = $row['no_brgyid'];
     }

     $result=mysqli_query($connect,'SELECT SUM(no_bpermit)  AS no_bpermit  FROM  approved_bpermits WHERE payment_stat = "Paid"');

     while($row=mysqli_fetch_array($result)){
     $total_no_bpermit_request = $row['no_bpermit'];
     }

     $result=mysqli_query($connect,'SELECT SUM(no_clearance)  AS no_clearance  FROM  approved_clearance WHERE payment_stat = "Paid"');

     while($row=mysqli_fetch_array($result)){
     $total_no_clearance_request = $row['no_clearance'];
     }

     $result=mysqli_query($connect,'SELECT SUM(no_indigency)  AS no_indigency  FROM  approved_indigency WHERE payment_stat = "Paid"');

     while($row=mysqli_fetch_array($result)){
     $total_no_indigency_request = $row['no_indigency'];
     }

     $result=mysqli_query($connect,'SELECT SUM(no_householdid)  AS total_voters  FROM  census_fam_members WHERE voter = "Yes"');

     while($row=mysqli_fetch_array($result)){
     $total_voters = $row['total_voters'];
     }

     $result=mysqli_query($connect,'SELECT SUM(no_householdid)  AS total_voters_no  FROM  census_fam_members WHERE voter = "No"');

     while($row=mysqli_fetch_array($result)){
     $total_voters_no = $row['total_voters_no'];
     }

     $result=mysqli_query($connect,'SELECT SUM(no_householdid)  AS employeed  FROM  census_fam_members WHERE employeed = "Yes"');

     while($row=mysqli_fetch_array($result)){
     $no_employeed = $row['employeed'];
     }

     $result=mysqli_query($connect,'SELECT SUM(no_householdid)  AS employeed  FROM  census_fam_members WHERE employeed = "No"');

     while($row=mysqli_fetch_array($result)){
     $no_unemployeed = $row['employeed'];
     }

     $result=mysqli_query($connect,'SELECT SUM(no_householdid)  AS seniorcitizen  FROM  census_fam_members WHERE seniorcitizen = "Yes"');

     while($row=mysqli_fetch_array($result)){
     $yes_seniorcitizen = $row['seniorcitizen'];
     }
     
     $result=mysqli_query($connect,'SELECT SUM(no_householdid)  AS seniorcitizen  FROM  census_fam_members WHERE seniorcitizen = "No"');

     while($row=mysqli_fetch_array($result)){
     $no_seniorcitizen = $row['seniorcitizen'];
     }

     $result=mysqli_query($connect,'SELECT SUM(no_householdid)  AS house  FROM  census_fam_members WHERE house = "Owner"');

     while($row=mysqli_fetch_array($result)){
     $owner_house = $row['house'];
     }
     
     $result=mysqli_query($connect,'SELECT SUM(no_householdid)  AS house  FROM  census_fam_members WHERE house = "Tenant"');

     while($row=mysqli_fetch_array($result)){
     $tenant_house = $row['house'];
     }