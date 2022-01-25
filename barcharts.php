<?php 
    if($_POST["action"] == 'fetch')
    {
	$query = "SELECT admin_fullname, COUNT(admin_id) AS Total FROM admin_tbl GROUP BY admin_fullname";
	$query_run = $db->query($query);
	$data = array();

	foreach($data as $row)
		{
		    $data[] = array(
			    'admin_fullname' => $row["admin_fullname"],
				'total' 		 => $row["Total"],
				'color'			 => '#' . rand(100000, 999999) . ''
				);
		}
	    echo json_encode($data);
    }
?>	