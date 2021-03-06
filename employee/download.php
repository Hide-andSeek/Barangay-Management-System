<?php
if(!empty($_GET['file'])){
    $fileName = basename($_GET['file']);
    $filePath = '../img/qrcode_clearance'.$fileName;
    if(!empty($fileName) && file_exists($filePath)){
        // Define headers
        header('Content-Length: ' . filesize($filePath));  
        header('Content-Encoding: none');
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$fileName");
        header("Content-Type: application/zip");
        header("Content-Transfer-Encoding: binary");
        
        // Read the file
        readfile($filePath);
        exit;
    }else{
        echo 'The File '.$fileName.' does not exist.';
    }
}

if(!empty($_GET['indigencyfile'])){
    $fileName = basename($_GET['indigencyfile']);
    $filePath = '../img/qrcode_indigency'.$fileName;
    if(!empty($fileName) && file_exists($filePath)){
        // Define headers
        header('Content-Length: ' . filesize($filePath));  
        header('Content-Encoding: none');
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$fileName");
        header("Content-Type: application/zip");
        header("Content-Transfer-Encoding: binary");
        
        // Read the file
        readfile($filePath);
        exit;
    }else{
        echo 'The File '.$fileName.' does not exist.';
    }
}


if(!empty($_GET['bpermitfile'])){
    $fileName = basename($_GET['bpermitfile']);
    $filePath = '../img/qrcode_bpermit'.$fileName;
    if(!empty($fileName) && file_exists($filePath)){
        // Define headers
        header('Content-Length: ' . filesize($filePath));  
        header('Content-Encoding: none');
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$fileName");
        header("Content-Type: application/zip");
        header("Content-Transfer-Encoding: binary");
        
        // Read the file
        readfile($filePath);
        exit;
    }else{
        echo 'The File '.$fileName.' does not exist.';
    }
}

if(!empty($_GET['barangayidfile'])){
    $fileName = basename($_GET['barangayidfile']);
    $filePath = '../img/qrcode_barangayid'.$fileName;
    if(!empty($fileName) && file_exists($filePath)){
        // Define headers
        header('Content-Length: ' . filesize($filePath));  
        header('Content-Encoding: none');
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$fileName");
        header("Content-Type: application/zip");
        header("Content-Transfer-Encoding: binary");
        
        // Read the file
        readfile($filePath);
        exit;
    }else{
        echo 'The File '.$fileName.' does not exist.';
    }
}

