<?php
session_start();

if(isset($_POST["action"]))
{
    include('db/conn.php');

    if($_POST["action"] == 'fetch')
    {
        $output = '';
        $query = " ORDER BY user_naSELECT * FROM user_details WHERE user_type = 'user'me ASC;";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $output .= '
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>                       
            </thead>
        ';
        foreach($result as $data)
        {
            $status = '';
            if($data["user_status"] == 'active')
            {
                $status = '<span class="label label-success">Active</span>';
            }else{
                $status = '<span class="label label-danger">Inactive</span>';
            }
            $output .= '
            <tr>
                <td>'.$data["user_name"].'</td>
                <td>'.$data["user_email"].'</td>
                <td>'.$status.'</td>
                <td>
					<button type="button" name="action" class="btn btn-info btn-xs action"  data-user_id="'.$data["user_id"].'"" data-user_status="'.$data["user_status"].'""><i class="bx bx-trash"></i>Action</button>
				</td>
            </tr>
            ';
        }
        $output .= '</table>';
        echo $output;
    }
    if($_POST["action"] == 'change_status')
    {
        $status = ''; 

        if($_POST['user_status'] == 'active')
        {
            $status = 'inactive';
        }else{
            $status = 'active';
        }
        $query = '
            UPDATE user_details SET user_status = :user_status WHERE user_id = :user_id
        ';
        $stmt = $db->prepare($query);
        $stmt->execute(
            array(
                ':user_status'=>$status,
                ':user_id'=>$_POST['user_id']
            )
        );

        if(isset($stmt))
        {
            echo '<div class="alert alert-success">User Status has been set to <strong>'.$status.'</strong></div>';
        }
    }
}
?>
