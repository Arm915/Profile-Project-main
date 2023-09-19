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
    <form action="" method="POST">
        <div class="form first">
            <div class="details personal">
            <span class="title">วิชาที่สอน</span>
                    <div class="fields">
                        <div class="input-field">
                            <label>ชื่อวิชา</label>
                            <input type="text" placeholder="ระบบฐานข้อมูล,สถิติสำหรับคอมพิวเตอร์...." id="Subjectname1" name="Subjectname1" value="">
                        </div>
                        <div class="input-field">
                            <label>รหัสวิชา</label>
                            <input type="text" placeholder="ITEC3501,COMP2205...." class="custom-file-input" id="coursecode1" name="coursecode1" value="">
                        </div>
                        <div class="input-field">
                            <label>กลุ่มเรียน</label>
                            <input type="text" placeholder="101,102...." id="studygroup1" name="studygroup1" value="">
                        </div>
                        <div class="input-field">
                            <label>คณะ</label>
                            <input type="text" placeholder="วิทยาศาสตร์,หมวดวิชาศึกษาทั่วไป...." id="group1" name="group1" value="">
                        </div>
                        <div class="input-field">
                            <label>ห้อง</label>
                            <input type="text" placeholder="15-1103,บรรยาย1...." id="room1" name="room1" value="">
                        </div>
                        <div class="input-field">
                            <label>หน่วยกิต</label>
                            <input type="text" placeholder="3(2-2-5),3 (2-2-5)...." id="credit1" name="credit1" value="">
                        </div>
                        <div class="input-field">
                            <label>เวลาเริ่ม</label>
                            <input type="time" id="start_time1" name="start_time1" value="">
                        </div>
                        <div class="input-field">
                            <label>เวลาจบ</label>
                            <input type="time" id="end_time1" name="end_time1" value="">
                        </div>
                        <div class="sumbit1" action="N-from-Teach-edit.php">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <input class="backBtn1" type="submit" name="editT" value="บันทึกการแก้ไข">
                            <input class="backBtn2" type="submit" name="deleteT" value="ลบวิชา">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
</html>

<?php

if (isset($_POST['deleteT'])) {
    function deleteRowT($id) {
        // เชื่อมต่อฐานข้อมูล
        include('DataLoRe.php');  
        // ตรวจสอบค่า ID ที่รับเข้าฟังก์ชัน
        if (!empty($id)) {
            $id = intval($id);
            $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
            
            // สร้างคำสั่ง SQL สำหรับลบข้อมูล
            $sql = "DELETE FROM teach WHERE id = $id";
            // ทำการลบข้อมูล
            if ($conn->query($sql) === TRUE) {
                echo '<script>window.location.href = "N-Home-Teach-N.php";</script>';
            } 
        }
    }
    // ตรวจสอบว่ามีการส่งค่า ID มาทางแอ็กชัน GET
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        deleteRowT($id);
    } else {
        echo "ไม่ได้รับค่า ID ที่ต้องการลบ";
    }
}
?>

<?php

if (!isset($_SESSION['Id'])) {
    header("Location: http://localhost/Profile-Project-main/login_register/Login.php");
    exit();
}

include('DataLoRe.php');

// ตรวจสอบว่ามีการส่งคำขอแก้ไขข้อมูลผ่านฟอร์มหรือไม่
if (isset($_POST['editT'])) {
    $id = $_POST['id']; 
    $id = isset($_GET['id']) ? intval($_GET['id']) : 0;

    // ตรวจสอบว่ามีค่าในฟิลด์และไม่เป็นค่าว่าง
    $Subjectname1 = !empty($_POST['Subjectname1']) ? mysqli_real_escape_string($conn, $_POST['Subjectname1']) : null;
    $coursecode1 = !empty($_POST['coursecode1']) ? mysqli_real_escape_string($conn, $_POST['coursecode1']) : null;
    $studygroup1 = !empty($_POST['studygroup1']) ? mysqli_real_escape_string($conn, $_POST['studygroup1']) : null;
    $group1 = !empty($_POST['group1']) ? mysqli_real_escape_string($conn, $_POST['group1']) : null;
    $room1 = !empty($_POST['room1']) ? mysqli_real_escape_string($conn, $_POST['room1']) : null;
    $credit1 = !empty($_POST['credit1']) ? mysqli_real_escape_string($conn, $_POST['credit1']) : null;
    $start_time1 = !empty($_POST['start_time1']) ? date('H:i:s', strtotime($_POST['start_time1'])) : null;
    $end_time1 = !empty($_POST['end_time1']) ? date('H:i:s', strtotime($_POST['end_time1'])) : null;


    // ส่งคำสั่ง SQL ให้ดึงข้อมูลแถวที่ต้องการแก้ไข
    $query = "SELECT * FROM teach WHERE id = $id";
    $result = mysqli_query($conn, $query);

    // ตรวจสอบว่าพบข้อมูลหรือไม่
    if (mysqli_num_rows($result) === 1) {
        // ดึงข้อมูลจากฐานข้อมูล
        $row = mysqli_fetch_assoc($result);

        // สร้างเงื่อนไขในการอัปเดตเพียงฟิลด์ที่มีค่า
        $updateFields = [];
        if (!empty($Subjectname1)) {
            $updateFields[] = "subject_name = '$Subjectname1'";
        }
        if (!empty($coursecode1)) {
            $updateFields[] = "course_code = '$coursecode1'";
        }
        if (!empty($studygroup1)) {
            $updateFields[] = "study_group = '$studygroup1'";
        }
        if (!empty($group1)) {
            $updateFields[] = "faculty = '$group1'";
        }
        if (!empty($room1)) {
            $updateFields[] = "room = '$room1'";
        }
        if (!empty($credit1)) {
            $updateFields[] = "credit = '$credit1'";
        }
        if (!empty($start_time1)) {
            $updateFields[] = "start_time = '$start_time1'";
        }
        if (!empty($end_time1)) {
            $updateFields[] = "end_time = '$end_time1'";
        }

        // ตรวจสอบว่ามีฟิลด์ที่ต้องการอัปเดตหรือไม่
        if (!empty($updateFields)) {
            // สร้างคำสั่ง SQL ให้ปรับปรุงข้อมูลในแถวที่ต้องการแก้ไข
            $updateQuery = "UPDATE teach SET " . implode(", ", $updateFields) . " WHERE id = $id";

            // ตรวจสอบว่าปรับปรุงข้อมูลสำเร็จหรือไม่
            if (mysqli_query($conn, $updateQuery)) {
                header("Location: N-Home-Teach-N.php");
                exit();
            }
            else{
                echo "อัปโหลดไฟล์ไม่สำเร็จ";
            }
        } 
    }
}
?>