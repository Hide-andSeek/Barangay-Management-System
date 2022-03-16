<?php
	$project_total_amount = '';
    $equip_total_amount = '';
    $payment_amount = '';
    $total_amount = '';
    $payroll_total_amount = '';
   
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