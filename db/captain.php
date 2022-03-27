<?php
if (isset($_POST['deletebtn'])) {
	$brgycaptain_id = $_POST["brgycaptain_id"];

	$delquery = "DELETE FROM brgy_captain WHERE brgycaptain_id=?";
}

?>
<?php
//Announcement
if (isset($_POST['announcebtn'])) {

	$description = $_POST['description'];
	$countfiles = count($_FILES['files']['name']);

	$query = "INSERT INTO announcement (description, announcement_imgname, announcement_image) VALUES(?,?,?)";

	$stmt = $db->prepare($query);

	for ($i = 0; $i < $countfiles; $i++) {

		// File name
		$filename = $_FILES['files']['name'][$i];
		// Location
		$target_file = 'img/fileupload_announcement/' . $filename;
		// File Path
		$file_extension = pathinfo(
			$target_file,
			PATHINFO_EXTENSION
		);

		$file_extension = strtolower($file_extension);

		//Image extension
		$valid_extension = array("png", "jpeg", "jpg", "pdf");

		if (in_array($file_extension, $valid_extension)) {

			// Upload file
			if (move_uploaded_file(
				$_FILES['files']['tmp_name'][$i],
				$target_file
			)) {
				// Execute query
				$stmt->execute(
					array($description, $filename, $target_file)
				);
			}
		}
	}
	echo "<script>
				alert('Submitted Successfully!');
				window.location.href='postannouncement.php';
			</script>";
}



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