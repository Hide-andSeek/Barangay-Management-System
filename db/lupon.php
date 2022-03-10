<?php 

require_once "conn.php";

if(isset($_POST["setSchedule"])){
    try {
        $complaintID = $_POST["complaintID"];
        $hearingDate = date("Y-m-d", strtotime($_POST["hearingDate"]));
        $hearingTime = date("H:i:s", strtotime($_POST["hearingTime"]));
        $personnel = $_POST["personnel"];
        $statusID = 1; //upcoming hearing

        $sql = "INSERT INTO luponCases (admincomp_id, statusID, hearingDate, hearingTime, personnelID) VALUES (?,?,?,?,?);";
        $stmt = $db->prepare($sql);
        $stmt->execute([$complaintID, $statusID, $hearingDate, $hearingTime, $personnel]);

        header("Location: ../lupon_awaiting_schedule.php");
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

if(isset($_POST["setAsActive"])){
    try {
        $complaintID = $_POST["complaintID"];
        $statusID = 2; // active

        $sql = "UPDATE luponCases SET statusID = ? WHERE admincomp_id = ?;";
        $stmt = $db->prepare($sql);
        $stmt->execute([$statusID, $complaintID]);

        header("Location: ../lupon_upcoming_hearings.php");
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

if(isset($_POST["setSettled"])){
    try {
        $complaintID = $_POST["complaintID"];
        $statusID = 4; // settled

        $filename = $_FILES['uploadFile']['name'];
        $file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        $valid_extension = array("pdf");
        $new_file_name = "CASE_".$complaintID."_".date("Y-m-d")."_".substr(md5(microtime()), 0, 5).".".$file_ext;
        $target_file = '../upload/lupon/'.$new_file_name;
        
        if(in_array($file_ext, $valid_extension)){
            // Upload File
            if(move_uploaded_file($_FILES['uploadFile']['tmp_name'], $target_file)){
                // Update case status to settled
                $sql = "UPDATE luponCases SET statusID = ?, sworn_statement = ? WHERE admincomp_id = ?;";
                $stmt = $db->prepare($sql);
                $stmt->execute([$statusID, $new_file_name, $complaintID]);
                $stmt = null;
                // Close the case complaint
                $sql = "UPDATE admin_complaints SET status = 'Closed' WHERE admincomp_id = ?;";
                $stmt = $db->prepare($sql);
                $stmt->execute([$complaintID]);
            }
        }

        header("Location: ../lupon_active_cases.php");
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

if(isset($_POST["setNotSettled"])){
    try {
        $complaintID = $_POST["complaintID"];
        $statusID = 3; // not settled

        $filename = $_FILES['uploadFile']['name'];
        $file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        $valid_extension = array("pdf");
        $new_file_name = "CASE_".$complaintID."_".date("Y-m-d")."_".substr(md5(microtime()), 0, 5).".".$file_ext;
        $target_file = '../upload/lupon/'.$new_file_name;
        
        if(in_array($file_ext, $valid_extension)){
            // Upload File
            if(move_uploaded_file($_FILES['uploadFile']['tmp_name'], $target_file)){
                // Update case status to settled
                $sql = "UPDATE luponCases SET statusID = ?, sworn_statement = ? WHERE admincomp_id = ?;";
                $stmt = $db->prepare($sql);
                $stmt->execute([$statusID, $new_file_name, $complaintID]);
            }
        }

        header("Location: ../lupon_active_cases.php");
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

if(isset($_POST["fetchAvailablePersonnel"])){
    try {
        $hearingDate = $_POST["hearingDate"];
        $weekDay =  date("w", strtotime($hearingDate));

        $sql = "SELECT personnelID, fullname FROM hearingPersonnels WHERE dayAvailable = ?;";
        $stmt = $db->prepare($sql);
        $stmt->execute([$weekDay]);

        if($stmt->rowCount() > 0){
            echo json_encode($stmt->fetchAll());
        }
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

if(isset($_POST["fetchPersonnels"])){
    try {
        $personnelID = $_POST["personnelID"];

        $sql = "SELECT * FROM hearingPersonnels WHERE personnelID = ?;";
        $stmt = $db->prepare($sql);
        $stmt->execute([$personnelID]);

        if($stmt->rowCount() > 0){
            $data = [];
            while($row = $stmt->fetch()){
                $data = [
                    'personnelID' => $row['personnelID'],
                    'fullname' => $row['fullname'],
                    'dayAvailable' => $row['dayAvailable']
                ];
            }
            echo json_encode($data);
        }
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

if(isset($_POST["savePersonnel"])){
    try {
        $personnelID = $_POST["personnelID"];
        $fullname = $_POST["fullname"];
        $dayAvailable = $_POST["dayAvailable"];

        if(empty($personnelID)){
            $sql = "INSERT INTO hearingPersonnels (fullname, dayAvailable) VALUES (?,?);";
            $stmt = $db->prepare($sql);
            $stmt->execute([$fullname, $dayAvailable]);
        }else{
            $sql = "UPDATE hearingPersonnels SET fullname = ?, dayAvailable = ? WHERE personnelID = ?;";
            $stmt = $db->prepare($sql);
            $stmt->execute([$fullname, $dayAvailable, $personnelID]);
        }

        header("Location: ../lupon_settings.php");
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}