<?php
session_start();

// ตรวจสอบว่าผู้ใช้ล็อคอินเข้าสู่ระบบแล้วหรือไม่
if (!isset($_SESSION['Id'])) {
    header("Location: http://localhost/Profile-Project-main/login_register/Login.php");
    exit();
}

$Id_identity = $_SESSION['Id'];

?>

<?php 

if (array_key_exists("submit1", $_POST)) {

    include('DataLoRe.php');  

    $name = $_POST['name1'];
    $file = $_POST['file1'];
    $timestart = date("H:i", strtotime($_POST['timestart1']));
    $timeend = date("H:i", strtotime($_POST['timeend1']));
    $input_time1 = $_POST['timestart1'];
    $input_time2 = $_POST['timeend1'];
    $timestamp1 = strtotime($input_time1);
    $timestamp2 = strtotime($input_time2);
    $picture = $_POST['picture1'];
    $day = $_POST['day1']; 
    $score = $_POST['score1'];
    $time_diff = $timestamp2 - $timestamp1;
    $hour_diff = floor($time_diff / 3600);
    $minute_diff = floor(($time_diff % 3600) / 60);
    $Id_identity = $_SESSION['Id']; 

    $sql = "INSERT INTO `art` (`name`, `file`, `picture`, `timestart`, `day`, `collect_alltime`, `score`, `timeend`, `Id_identity` ) 
            VALUES ('$name', '$file', '$picture', '$timestart', '$day', '$hour_diff:$minute_diff:00', '$score', '$timeend', '$Id_identity')";

    if (mysqli_query($conn, $sql)) {
        header("Location: HomeArt.php");  
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

?>

