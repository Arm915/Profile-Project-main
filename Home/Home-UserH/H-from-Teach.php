<?php 

include('DataRegister.php'); 
include('DataLoRe.php');

?>

<?php
// ตรวจสอบว่ามีค่า id ถูกส่งมาหรือไม่
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // ดึงข้อมูลของแถวที่ต้องการจากฐานข้อมูล
    $sql = "SELECT * FROM teach WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        
        // นำข้อมูลจากฐานข้อมูลมาใส่ในตัวแปร
        $subject_name = $row['subject_name'];
        $course_code = $row['course_code'];
        $study_group = $row['study_group'];
        $faculty = $row['faculty'];
        $room = $row['room'];
        $credit = $row['credit'];
        $start_time = $row['start_time'];
        $end_time = $row['end_time'];
    } else {
        // ไม่พบข้อมูลที่ต้องการ
        echo "ไม่พบข้อมูล";
    }
} else {
    // ถ้าไม่มี id ถูกส่งมา
    echo "ไม่มีข้อมูลที่ต้องการแสดง";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="H-from-ALL.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>
<body>
    <div class="container">
        <header>The Watcher : ตารางสอน</header>
        <a href="H-Home-Teach-N-edit.php" class="backBtn">ย้อนกลับ</a>
    <form action="DataRegister.php" method="POST">
        <div class="form first">
            <div class="details personal">
            <span class="title">วิชาที่สอน</span>
                    <div class="fields">
                    <div class="input-field">
                            <label>ชื่อวิชา</label>
                            <input type="text" id="Subjectname1" name="Subjectname1" value="<?php echo $subject_name; ?>">
                        </div>
                        <div class="input-field">
                            <label>รหัสวิชา</label>
                            <input type="text" id="coursecode1" name="coursecode1" value="<?php echo $course_code; ?>">
                        </div>
                        <div class="input-field">
                            <label>กลุ่มเรียน</label>
                            <input type="text" id="studygroup1" name="studygroup1" value="<?php echo $study_group; ?>">
                        </div>
                        <div class="input-field">
                            <label>คณะ</label>
                            <input type="text" id="group1" name="group1" value="<?php echo $faculty; ?>">
                        </div>
                        <div class="input-field">
                            <label>ห้อง</label>
                            <input type="text" id="room1" name="room1" value="<?php echo $room; ?>">
                        </div>
                        <div class="input-field">
                            <label>หน่วยกิต</label>
                            <input type="text" id="credit1" name="credit1" value="<?php echo $credit; ?>">
                        </div>
                        <div class="input-field">
                            <label>เวลาเริ่ม</label>
                            <input type="time" id="start_time1" name="start_time1" value="<?php echo $start_time; ?>">
                        </div>
                        <div class="input-field">
                            <label>เวลาจบ</label>
                            <input type="time" id="end_time1" name="end_time1" value="<?php echo $end_time; ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
</html>
