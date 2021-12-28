<?php
    if(isset($_POST['deletebtn']))
    {
        $brgycaptain_id = $_POST["brgycaptain_id"];

        $delquery = "DELETE FROM brgy_captain WHERE brgycaptain_id=?";
        
    }

?>