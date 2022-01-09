<?php
session_start();

include('db/conn.php');

if(!isset($_SESSION["type"]))
{
    header("location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <title>Testing</title>
</head>
<body>
        <br>
        <div class="container">
             <?php $_SESSION["type"] == "user"?>
            <h2 style="text-align: center;">Enabling Employee's/Admin Account in PHP</h2>
            <br>
            <div style="text-align: right">
                <a href="logout.php">Logout</a>
            </div>
            <br>
            <?php
				if($_SESSION['type'] == 'user')
				{
					echo '<div style="text-align: center">
                            <h2>Welcome User!</h2>
                        </div>';
				}
                else
                {
			?>
            <div class="panel panel-default">
					<div class="panel-heading"> User Status </div>
					<div class="panel-body">
                        <span id="message"></span>
						<div class="table-responsive" id="user_data">

						</div>
					</div>
			</div>

            <script>
				$(document).ready(function(){
					
					load_user_data();

					function load_user_data()
					{

						var action = 'fetch';
						$.ajax({
							url:"action.php",
							method: "POST",
							data:{action:action},
							success:function(data)
							{
								$('#user_data').html(data);
							}
						})
					}
					$(document).on('click', '.action', function(){
						var user_id = $(this).data('user_id');
						var user_status = $(this).data('user_status');
						var action = 'change_status';
						$('#message').html('');
						if(confirm("Change status?"))
						{
							$.ajax({
								url:"action.php",
								method:"POST",
								data: {user_id:user_id, user_status:user_status, action:action},
								success:function(data)
								{
									if(data != '')
									{
										load_user_data();
										$('#message').html(data);
									}
								}
							})
						}else{
							return false;
						}
					});
				});
			</script>
			<?php
			}
			?>
        </div>
</body>
</html>