<?php 

include('DataRegister.php'); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="N-Home-ALL-H&N.css" />
    <link rel="stylesheet" href="N-from-ALL.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"rel="stylesheet"/>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>
<body>
    <div class="container">
        <header>ตารางสอน</header>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form first">
            <div class="details personal">
            <span class="title">วิชาที่สอน</span>
                    <div class="fields">
                        <div class="input-field">
                            <label>ชื่อวิชา</label>
                            <input type="text" placeholder="ระบบฐานข้อมูล,สถิติสำหรับคอมพิวเตอร์...." id="Subjectname" name="Subjectname" required>
                        </div>
                        <div class="input-field">
                            <label>รหัสวิชา</label>
                            <input type="text" placeholder="ITEC3501,COMP2205...." class="custom-file-input" id="coursecode" name="coursecode" required>
                        </div>
                        <div class="input-field">
                            <label>กลุ่มเรียน</label>
                            <input type="text" placeholder="101,102...." id="studygroup" name="studygroup" required>
                        </div>
                        <div class="input-field">
                            <label>คณะ</label>
                            <input type="text" placeholder="วิทยาศาสตร์,หมวดวิชาศึกษาทั่วไป...." id="group" name="group" required>
                        </div>
                        <div class="input-field">
                            <label>ห้อง</label>
                            <input type="text" placeholder="15-1103,บรรยาย1...." id="room" name="room" required>
                        </div>
                        <div class="input-field">
                            <label>หน่วยกิต</label>
                            <input type="text" placeholder="3(2-2-5),3 (2-2-5)...." id="credit" name="credit" required>
                        </div>
                        <div class="input-field">
                            <label>เวลาเริ่ม</label>
                            <input type="time" id="start_time" name="start_time" required>
                        </div>
                        <div class="input-field">
                            <label>เวลาจบ</label>
                            <input type="time" id="end_time" name="end_time" required>
                        </div>
                        <div class="sumbit1">
                            <input class="backBtn3" type="submit" name="submitteach" value="บันทึกการแก้ไข">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
</html>

<?php

if (!isset($_SESSION['Id'])) {
    header("Location: http://localhost/Profile-Project-main/login_register/Login.php");
    exit();
}

$Id_identity = $_SESSION['Id'];

if (array_key_exists("submitteach", $_POST)) {

    include('DataLoRe.php');  

    $Subjectname = $_POST['Subjectname'];
    $coursecode = $_POST['coursecode'];
    $studygroup = $_POST['studygroup'];
    $group = $_POST['group'];
    $room = $_POST['room'];
    $credit = $_POST['credit'];
    $start_time = date("H:i", strtotime($_POST['start_time']));
    $end_time = date("H:i", strtotime($_POST['end_time']));
    $day = $_GET['day']; 

    $sql = "INSERT INTO `teach` (`subject_name`, `course_code`, `study_group`, `faculty`, `room`, `credit`, `start_time`, `end_time`, `Id_identity`, `day`)
                    VALUES ('$Subjectname', '$coursecode', '$studygroup', '$group'
                    , '$room', '$credit', '$start_time', '$end_time', '$Id_identity', '$day')";

    if (mysqli_query($conn, $sql)) {
        header("Location: N-Home-Teach-N.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>