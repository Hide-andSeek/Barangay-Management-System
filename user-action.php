

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
session_start();

if(isset($_POST["action"]))
{
    include('db/conn.php');

    if($_POST["action"] == 'fetch')
    {
        $output = '';
        $query = "SELECT * FROM usersdb ORDER BY user_id DESC;";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $output .= '
        <table class="content-table">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Username</th>
                    <th>Email</th>
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
            // if(isset($_POST['filterstat'])){
            //     $filter = $_POST["filterstat"];

            //     $filterqry = "SELECT * FROM usersdb WHERE status='$filter' ORDER BY user_id";
            // }else{
            //     $filterqry = "SELECT * FROM usersdb WHERE status='active' ORDER BY user_id";
            // }
            // $result = $db->query($filterqry);

            // if($_POST['action' == 'active']){
            //     $query = "SELECT * FROM usersdb WHERE action='active'";
            // }
            // elseif($_POST['action'] == 'inactive') 

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
                <td>'.$data["user_id"].'</td>
                <td>'.$data["username"].'</td>
                <td>'.$data["emailadd"].'</td>
                <td>'.$data["birthday"].'</td>
                <td>'.$data["address"].'</td>
                <td>'.$data["contact"].'</td>
                <td>'.$data["user_type"].'</td>
                <td>'.$data["department"].'</td>
                <td>'.$data["added_on"].'</td>
                <td>'.$istatus.'</td>
                <td>
					<button type="button" name="action" class="btn btn-info btnwidth action"  data-user_id="'.$data["user_id"].'"" data-status="'.$data["status"].'""><i class="bx bx-edit"></i>Change Status</button>
                    
                    <a href="employeeeditacc.php?id=<?php echo $data["user_id"]; class="btn btn-primary btnwidth"?><i class="bx bx-edit"></i>Edit</a>
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
            UPDATE usersdb SET status = :status WHERE user_id = :user_id
        ';
        $stmt = $db->prepare($query);
        $stmt->execute(
            array(
                ':status'=>$istatus,
                ':user_id'=>$_POST['user_id']
            )
        );

        if(isset($stmt))
        {
            echo '<span class="alert alert-success">User Status has been set to <strong>'.$istatus.'</strong></span>';
        }
    }
}
?>

</body>
</html>