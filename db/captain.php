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



?>