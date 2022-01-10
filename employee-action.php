<?php
session_start();

if(isset($_POST["action"]))
{
    include('db/conn.php');

    if($_POST["action"] == 'fetch')
    {
        $output = '';
        $query = "SELECT * FROM employeedb WHERE user_type = 'Employee' ORDER BY employee_uname ASC;";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $output .= '
        <table class="content-table">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Birthday</th>
                    <th>Address</th>
                    <th>Contact No.</th>   
                    <th>User Type</th>  
                    <th>Department</th>
                    <th>Added On</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>                       
            </thead>
        ';
        
        foreach($result as $data)
        {
            $istatus = '';
            if($data["status"] == 'active')
            {
                $istatus = '<span class="label label-success">Active</span>';
            }else{
                $istatus  = '<span class="label label-danger">Inactive</span>';
            }
            $output .= 
            '
            <tr>
                <td>'.$data["employee_uname"].'</td>
                <td>'.$data["birthday"].'</td>
                <td>'.$data["address"].'</td>
                <td>'.$data["contact"].'</td>
                <td>'.$data["user_type"].'</td>
                <td>'.$data["department"].'</td>
                <td>'.$data["added_on"].'</td>
                <td>'.$istatus.'</td>
                <td>
                
					<button type="button" name="action" class="btn btn-info btn-xs action"  data-employee_id="'.$data["employee_id"].'"" data-status="'.$data["status"].'""><i class="bx bx-trash"></i>Action</button>
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
            UPDATE employeedb SET status = :status WHERE employee_id = :employee_id
        ';
        $stmt = $db->prepare($query);
        $stmt->execute(
            array(
                ':status'=>$istatus,
                ':employee_id'=>$_POST['employee_id']
            )
        );

        if(isset($stmt))
        {
            echo '<span class="alert alert-success">User Status has been set to <strong>'.$istatus.'</strong></span>';
        }
    }
}
?>
