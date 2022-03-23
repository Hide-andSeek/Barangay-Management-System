<?php


$sangunian = '';
$seminars = '';
$announcement = '';
$program = ''; 
$health_related = '';
$academic_related = '';

$stmt = $db->prepare('SELECT * from announcement_category WHERE cid = "27"');
$stmt->execute();
$imagelist = $stmt->fetchAll();
if (count($imagelist) > 0) {
    foreach ($imagelist as $announcement) {

    }
} else {
    $sangunian = "<div class='errormessage'>
                    <i class='bx bx-error'></i>
                    No announcement yet!
                </div>";
}

$stmt = $db->prepare('SELECT * from announcement_category WHERE cid = "26"');
$stmt->execute();
$imagelist = $stmt->fetchAll();
if (count($imagelist) > 0) {
    foreach ($imagelist as $announcement1) {

    }
} else {
    $seminars = "<div class='errormessage'>
                    <i class='bx bx-error'></i>
                    No announcement yet!
                </div>";
}


$stmt = $db->prepare('SELECT * from announcement_category WHERE cid = "25"');
$stmt->execute();
$imagelist = $stmt->fetchAll();
if (count($imagelist) > 0) {
    foreach ($imagelist as $announcement2) {

    }
} else {
    $announcement = "<div class='errormessage'>
                    <i class='bx bx-error'></i>
                    No announcement yet!
                </div>";
}


$stmt = $db->prepare('SELECT * from announcement_category WHERE cid = "24"');
$stmt->execute();
$imagelist = $stmt->fetchAll();
if (count($imagelist) > 0) {
    foreach ($imagelist as $announcement3) {

    }
} else {
    $program = "<div class='errormessage'>
                    <i class='bx bx-error'></i>
                    No announcement yet!
                </div>";
}


$stmt = $db->prepare('SELECT * from announcement_category WHERE cid = "20"');
$stmt->execute();
$imagelist = $stmt->fetchAll();
if (count($imagelist) > 0) {
    foreach ($imagelist as $announcement4) {

    }
} else {
    $health_related = "<div class='errormessage'>
                    <i class='bx bx-error'></i>
                    No announcement yet!
                </div>";
}


$stmt = $db->prepare('SELECT * from announcement_category WHERE cid = "21"');
$stmt->execute();
$imagelist = $stmt->fetchAll();
if (count($imagelist) > 0) {
    foreach ($imagelist as $announcement5) {

    }
} else {
    $academic_related = "<div class='errormessage'>
                    <i class='bx bx-error'></i>
                    No announcement yet!
                </div>";
}
