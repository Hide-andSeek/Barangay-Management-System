<?php 

require_once "conn.php";

if(isset($_POST["approveCase"])){
    try {
        $complaintID = $_POST["complaintID"];

        $sql = "INSERT INTO bpsoCases (admincomp_id) VALUE (?);";
        $stmt = $db->prepare($sql);
        $stmt->execute([$complaintID]);

        header("Location: ../bpso_newCases.php");
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

if(isset($_POST["denyCase"])){
    try {
        $complaintID = $_POST["complaintID"];

        // Insert record into bpsoCases
        $sql = "INSERT INTO bpsoCases (admincomp_id) VALUE (?);";
        $stmt = $db->prepare($sql);
        $stmt->execute([$complaintID]);
        $stmt = null;

        // Update status in bpsoCases to 1 = denied
        $sql = "UPDATE bpsoCases SET isDenied = ? WHERE admincomp_id = ?";;
        $stmt = $db->prepare($sql);
        $stmt->execute([1, $complaintID]);
        $stmt = null;

        // Update status in admin_complaints to 'Closed'
        $sql = "UPDATE admin_complaints SET status = 'Closed' WHERE admincomp_id = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$complaintID]);

        header("Location: ../bpso_newCases.php");
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}
