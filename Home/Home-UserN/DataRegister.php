<?php
session_start();

// ตรวจสอบว่าผู้ใช้ล็อคอินเข้าสู่ระบบแล้วหรือไม่
if (!isset($_SESSION['Id'])) {
    header("Location: http://localhost/Profile-Project-main/login_register/Login.php");
    exit();
}

$Id_identity = $_SESSION['Id'];

if (array_key_exists("submitresearch", $_POST)) {

    include('DataLoRe.php');  

    //ตัวแปร
    $nameresearch = $_POST['nameresearch'];
    $day = $_POST['day'];
    $researchfile = $_FILES['researchfile']['name'];
    $journalname = $_POST['journalname'];
    $picturediagram = $_FILES['picturediagram']['name'];
    $capitaldocuments = $_FILES['capitaldocuments']['name'];
    $description = $_POST['description'];
    $Id_identity = $_SESSION['Id'];

    // ที่เก็บไฟล์ PDF
    $targetdir_researchfile = "C:/xampp/htdocs/Profile-Project-main/Home/Home-UserN/FilePDF/Research/researchfile/";
    $targetdir_picturediagram = "C:/xampp/htdocs/Profile-Project-main/Home/Home-UserN/FilePDF/Research/picturediagram/";
    $targetdir_capitaldocuments = "C:/xampp/htdocs/Profile-Project-main/Home/Home-UserN/FilePDF/Research/capitaldocuments/";

    // ตั้งตัวแปรสุ่มตัวเลขหลังชื่อไฟล์
    $randomNumber = mt_rand(1, 100);

    // กำหนดชื่อไฟล์ใหม่โดยรวมกับตัวเลขสุ่ม
    $researchfile_newname = $randomNumber . "_" . $_FILES['researchfile']['name'];
    $picturediagram_newname = $randomNumber . "_" . $_FILES['picturediagram']['name'];
    $capitaldocuments_newname = $randomNumber . "_" . $_FILES['capitaldocuments']['name'];

    // ตั้งตำแหน่งที่จะบันทึกไฟล์ใหม่
    $target_researchfile = $targetdir_researchfile . basename($researchfile_newname);
    $target_picturediagram = $targetdir_picturediagram . basename($picturediagram_newname);
    $target_capitaldocuments = $targetdir_capitaldocuments . basename($capitaldocuments_newname);

    // ตั้งตัวแปรเท่ากับ 1
    $uploadOk = 1;

    // แยกจำแนกประเภทไฟล์และทำให้เป็นพิมพ์เล็ก
    $researchfile_ext = strtolower(pathinfo($target_researchfile, PATHINFO_EXTENSION));
    $picturediagram_ext = strtolower(pathinfo($target_picturediagram, PATHINFO_EXTENSION));
    $capitaldocuments_ext = strtolower(pathinfo($target_capitaldocuments, PATHINFO_EXTENSION));

    // ให้เป็นไฟล์ PDF เท่านั้น
    if ($researchfile_ext != "pdf") {
        $uploadOk = 0;
    }
    if ($picturediagram_ext != "pdf" && $_FILES['picturediagram']['name'] != '') {
        $uploadOk = 0;
    }
    if ($capitaldocuments_ext != "pdf" && $_FILES['capitaldocuments']['name'] != '') {
        $uploadOk = 0;
    }

    // กำหนดขนาดไฟล์ที่จะอัปโหลด (500,000 bytes = 500 KB)
    if ($_FILES['researchfile']['size'] > 500000) {
        $uploadOk = 0;
    }
    if ($_FILES['picturediagram']['size'] > 500000 && $_FILES['picturediagram']['name'] != '') {
        $uploadOk = 0;
    }
    if ($_FILES['capitaldocuments']['size'] > 500000 && $_FILES['capitaldocuments']['name'] != '') {
        $uploadOk = 0;
    }
    else{
        echo "ไฟล์ขนาดใหญ่เกิน";
    }

    // เซฟข้อมูลลงฐานข้อมูล
    if ($uploadOk == 0) {
        echo "อัปโหลดไฟล์ไม่สำเร็จ";
    } else {
        if (move_uploaded_file($_FILES["researchfile"]["tmp_name"], $target_researchfile)) {
            if ($_FILES["researchfile"]["tmp_name"] && move_uploaded_file($_FILES["researchfile"]["tmp_name"], $target_researchfile)) {
                $researchfile_newname = $_FILES['researchfile']['name'];}

            if ($_FILES["picturediagram"]["tmp_name"]) {
                if (move_uploaded_file($_FILES["picturediagram"]["tmp_name"], $target_picturediagram)) {
                    $picturediagram_newname = $randomNumber . "_" . $_FILES['picturediagram']['name'];
                } else {
                    $picturediagram_newname = '';
                }
                } else {
                    $picturediagram_newname = '';
                }
                        
            if ($_FILES["capitaldocuments"]["tmp_name"]) {
                if (move_uploaded_file($_FILES["capitaldocuments"]["tmp_name"], $target_capitaldocuments)) {
                    $capitaldocuments_newname = $randomNumber . "_" . $_FILES['capitaldocuments']['name'];
                } else {
                    $capitaldocuments_newname = '';
                }
                } else {
                    $capitaldocuments_newname = '';
                }

            $sql = "INSERT INTO `research` (`nameresearch`, `day`, `researchfile`, `Journalname`, `picturediagram`, `capitaldocuments`, `description`, `Id_identity` )
                    VALUES ('$nameresearch', '$day', '$researchfile_newname', '$journalname', '$picturediagram_newname', '$capitaldocuments_newname', '$description', '$Id_identity')";

            if (mysqli_query($conn, $sql)) {
                header("Location: N-Home-Research-N.php");
                exit;
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "อัปโหลดไฟล์ไม่สำเร็จ";
        }
    }
}

//หน้าศิลปะวัฒนะธรรม&บริการวิชาการ
if (array_key_exists("submit2", $_POST)) {

    include('DataLoRe.php');  

    //ตัวแปร
    $nameart_service = $_POST['nameart_service'];
    $performance_art_service = $_FILES['performance_art_service']['name'];
    $daystart_art_service = $_POST['daystart_art_service'];
    $dayend_art_service = $_POST['dayend_art_service'];
    $hour_art_service = $_POST['hour_art_service'];
    $score_art_service = $_POST['score_art_service'];
    $description_art_service = $_POST['description_art_service'];

    // ที่เก็บไฟล์ PDF
    $targetdir_performance = "C:/xampp/htdocs/Profile-Project-main/Home/Home-UserN/FilePDF/art_service/performance_art_service/";

    // ตั้งตัวแปรสุ่มตัวเลขหลังชื่อไฟล์
    $randomNumber = rand(1, 100);

    // กำหนดชื่อไฟล์ใหม่โดยรวมกับตัวเลขสุ่ม
    $performance_newname = $randomNumber . "_" . $_FILES['performance_art_service']['name'];

    // ตั้งตำแหน่งที่จะบันทึกไฟล์ใหม่
    $target_researchfile = $targetdir_performance . basename($performance_newname);

    // ตั้งตัวแปรเท่ากับ 1
    $uploadOk = 1;

    // แยกจำแนกประเภทไฟล์และทำให้เป็นพิมพ์เล็ก
    $researchfile_ext = strtolower(pathinfo($target_researchfile, PATHINFO_EXTENSION));

    // ให้เป็นไฟล์ PDF เท่านั้น
    if ($researchfile_ext != "pdf") {
        $uploadOk = 0;
    }

    // กำหนดขนาดไฟล์ที่จะอัปโหลด (500,000 bytes = 500 KB)
    if ($_FILES['performance_art_service']['size'] > 500000) {
        $uploadOk = 0;
    }

    // เซฟข้อมูลลงฐานข้อมูล
    if ($uploadOk == 0) {
        echo "อัปโหลดไฟล์ไม่สำเร็จ";
    } else {
        if (move_uploaded_file($_FILES["performance_art_service"]["tmp_name"], $target_researchfile)) {

            $sql = "INSERT INTO `art_service` (`name_art`, `performance_art`, `daystart`, `dayend`, `hour`, `score`, `description`, `Id_identity` )
                    VALUES ('$nameart_service', '$performance_newname', '$daystart_art_service', '$dayend_art_service'
                    , '$hour_art_service', '$score_art_service', '$description_art_service', '$Id_identity')";

            if (mysqli_query($conn, $sql)) {
                header("Location: N-Home-Art&service-N.php");
                exit;
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "อัปโหลดไฟล์ไม่สำเร็จ";
        }
    }
}
?>