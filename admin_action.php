<?php
if(isset($_POST["action"]))
{
    include('db/conn.php');
    if($_POST["action"] == 'fetch')
    {
        $output = '';
        $query = "SELECT * FROM admintbl WHERE user_type = 'administrator' ORDER BY admin_fullname ASC;";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $output .= '
        <table class="content-table">
            <thead>
                <tr>
                    <th>Admin ID</th>
                    <th>Admin Fullname</th>
                    <th>Lastname</th>
                    <th>Middlename</th>
                    <th>Firstname</th>
                    <th>User Type</th>   
                    <th>Email</th>  
                    <th>Birthday</th>
                    <th>Address</th>
                    <th>Contact No.</th>
                    <th>Added on</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>                       
            </thead>
        ';
            // if(isset($_POST['filterstat'])){
            //     $filter = $_POST["filterstat"];

            //     $filterqry = "SELECT * FROM employeedb WHERE status='$filter' ORDER BY 	employee_id";
            // }else{
            //     $filterqry = "SELECT * FROM employeedb WHERE status='active' ORDER BY employee_id";
            // }
            // $result = $db->query($filterqry);

        foreach($result as $row)
        {
            $istatus = '';
            if($row["status"] == 'active')
            {
                $istatus = '<span class="label label-success">Active</span>';
            }else{
                $istatus  = '<span class="label label-danger">Inactive</span>';
            }
            $output .= 
            '
            <tr>
                <td>'.$row["admin_id"].'</td>
                <td>'.$row["admin_fullname"].'</td>
                <td>'.$row["lastname"].'</td>
                <td>'.$row["middlename"].'</td>
                <td>'.$row["firstname"].'</td>
                <td>'.$row["user_type"].'</td>
                <td>'.$row["email"].'</td>
                <td>'.$row["birthday"].'</td>
                <td>'.$row["address"].'</td>
                <td>'.$row["contactno"].'</td>
                <td>'.$row["added_on"].'</td>
                <td>'.$istatus.'</td>
                <td>
					<button type="button" name="action" class="btn btn-info action"  data-admin_id="'.$row["admin_id"].'"" data-status="'.$row["status"].'""><i class="bx bx-edit"></i>Change Status</button>
				</td>
            </tr>
            ';
        }
        $output .= '</table>';
        echo $output;
    }
    if($_POST["action"] == 'change_status')
    {
        $istatus = ''; 

        if($_POST['status'] == 'active')
        {
            $istatus = 'inactive';
        }else{
            $istatus = 'active';
        }
        $query = '
            UPDATE admintbl SET status = :status WHERE admin_id = :admin_id
        ';
        $stmt = $db->prepare($query);
        $stmt->execute(
            array(
                ':status'=>$istatus,
                ':admin_id'=>$_POST['admin_id']
            )
        );

        if(isset($stmt))
        {
            echo '<span class="alert alert-success">User Status has been set to <strong>'.$istatus.'</strong></span>';
        }
    }
}
?>
