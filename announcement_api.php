<?php

	DEFINE ('DB_USER', 'a7d59c_combrgy');	 
	DEFINE ('DB_PASSWORD', 'ecajucom143');
	DEFINE ('DB_HOST', 'mysql5046.site4now.net');
	DEFINE ('DB_NAME', 'db_a7d59c_combrgy');
	 
	$mysqli = @mysql_connect (DB_HOST, DB_USER, DB_PASSWORD) OR die ('Could not connect to MySQL');
	@mysql_select_db (DB_NAME) OR die ('Could not select the database');
 
 ?>
<?php
 
 	mysql_query("SET NAMES 'utf8'"); 
	//mysql_query('SET CHARACTER SET utf8');
	
	if(isset($_GET['cat_id']))
	{
			//$query="SELECT * FROM tbl_news_category WHERE cid='".$_GET['cat_id']."' ORDER BY tbl_news_category.cid DESC";		
			//$resouter = mysql_query($query);
			
			$query="SELECT * FROM announcement_category c,tbl_announcement n WHERE c.cid=n.cat_id and c.cid='".$_GET['cat_id']."' ORDER BY n.aid DESC";			
			$resouter = mysql_query($query);
			
	}
	else if(isset($_GET['latest_news']))
	{
			$limit=$_GET['latest_news'];	 	
			
			$query="SELECT * FROM announcement_category c,tbl_announcement n WHERE c.cid=n.cat_id ORDER BY n.aid DESC LIMIT $limit";			
			$resouter = mysql_query($query);
	}
	else if(isset($_GET['apps_details']))
	{ 
			$query="SELECT * FROM tbl_settings WHERE id='1'";		
			$resouter = mysql_query($query);
	}
	else
	{	
			$query="SELECT * FROM announcement_category ORDER BY cid DESC";			
			$resouter = mysql_query($query);
	}
     
    $set = array();
     
    $total_records = mysql_num_rows($resouter);
    if($total_records >= 1){
     
      while ($link = mysql_fetch_array($resouter, MYSQL_ASSOC)){
	   
        $set['NewsApp'][] = $link;
      }
    }
     
     echo $val= str_replace('\\/', '/', json_encode($set));
	 	 
	 
?>