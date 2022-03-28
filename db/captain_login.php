<?php

//1.3 Official Login Prepared Statement
if (isset($_SESSION['user']) != "") {
	header("Location:officials.php");
}
if (isset($_POST['officiallog'])) {
	if (empty($_POST["username"]) || empty($_POST["user_no"])) {
		echo "<script>
				alert('Both Fields are required!');
				window.location.href='officials.php';
			</script>";
	} else {
		$officialquery = "SELECT * FROM usersdb WHERE username = :username";
		$stmt = $db->prepare($officialquery);
		$stmt->execute(array('username' => $_POST["username"]));
		$count = $stmt->rowCount();
		if ($count > 0) {
			$result = $stmt->fetchAll();
			foreach ($result as $row) {
				if ($row["status"] == 'active') {
					if (password_verify($_POST["user_no"], $row["user_no"])) {
						if ($row["department"] == 'BRGYOFFICIAL') {
							$_SESSION["type"] = $row["user_type"];
							$_SESSION["user"] = $row["username"];
							header("location: captaindashboard.php");
						} else {
							echo "<script>
										alert('Access Denied, You dont have a permission to access this department!')
										window.location.href='officials.php';
									</script>";
						}
					} else {
						echo "<script>
					   			alert('Wrong Password!')
								window.location.href='officials.php';
							</script>";
					}
				} else {
					echo "<script>
							alert('Your account has been disabled!')
							window.location.href='officials.php';
						</script>";
				}
			}
		} else {
			echo "<script>
					alert('Wrong Username. Please try again!!') 
					window.location.href='officials.php';
				</script>";
		}
	}
}
?>