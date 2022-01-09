<?php
    session_start();

    include('db/conn.php');

	$message = '';

	if(isset($_POST['logbtn']))
	{
		if(empty($_POST["user_email"]) || empty($_POST["user_password"]))
		{
			$message = "<div class='alert alert-danger'>Both Fields are required!</div>";
		}
		else
		{
			$userquery = "SELECT * FROM user_details WHERE user_email = :user_email";
			$stmt = $db->prepare($userquery);
			$stmt->execute(array('user_email' => $_POST["user_email"]));
			$count = $stmt->rowCount();
			if($count > 0)
			{
				$result = $stmt->fetchAll();
				foreach($result as $row)
				{
					if($row["user_status"] == 'active')
					{
						if(password_verify($_POST["user_password"], $row["user_password"]))
                        {
                            $_SESSION["type"] = $row["user_type"];
                            header("location: 1index.php");
                        }
                        else
                        {
                            $message = "<div class='alert alert-danger'>Wrong Password</div>";
                        }
					}
					else
					{
						$message = "<div class='alert alert-danger'>Your account has been disabled, please contact admin</div>";
					}
				}
			}
			else
			{
				$message = "<script>Wrong Email Address!! </script>";
			}
		}
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
    <div>
        <h2 style="text-align: center;">Disable/Enable Employee's Account</h2>
        <br>
        <div class="panel panel-default">
            <div class="panel-heading">Login</div>
            <div><?php echo $message; ?></div>
            <div class="panel-body">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <div class="form-group">
                        <label>User Email</label>
                        <input type="text" class="form-control" name="user_email" id="user_email">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="user_password" id="user_password">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="logbtn" id="logbtn" class="btn btn-info" value="Login">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>