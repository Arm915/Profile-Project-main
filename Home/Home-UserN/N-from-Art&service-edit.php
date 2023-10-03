<?php 

include('DataRegister.php'); 

?>


<?php

include('DataLoRe.php');
$conn = mysqli_connect('localhost', 'root', '', 'profile');

// ตรวจสอบว่ามีการส่งคำขอแก้ไขข้อมูลผ่านฟอร์มหรือไม่
if (isset($_POST['edita'])) {
    $id = $_POST['id']; 
    $id = isset($_GET['id']) ? intval($_GET['id']) : 0;

    // ตรวจสอบว่ามีค่าในฟิลด์และไม่เป็นค่าว่าง
    $nameart_service1 = !empty($_POST['nameart_service1']) ? mysqli_real_escape_string($conn, $_POST['nameart_service1']) : null;
    $daystart_art_service1 = !empty($_POST['daystart_art_service1']) ? $_POST['daystart_art_service1'] : null;
    $dayend_art_service1 = !empty($_POST['dayend_art_service1']) ? $_POST['dayend_art_service1'] : null;
    $hour_art_service1 = !empty($_POST['hour_art_service1']) ? mysqli_real_escape_string($conn, $_POST['hour_art_service1']) : null;
    $score_art_service1 = !empty($_POST['score_art_service1']) ? mysqli_real_escape_string($conn, $_POST['score_art_service1']) : null;
    $description_art_service1 = !empty($_POST['description_art_service1']) ? mysqli_real_escape_string($conn, $_POST['description_art_service1']) : null;

    // ส่งคำสั่ง SQL ให้ดึงข้อมูลแถวที่ต้องการแก้ไข
    $query = "SELECT * FROM art_service WHERE id = $id";
    $result = mysqli_query($conn, $query);


    // ตรวจสอบว่าพบข้อมูลหรือไม่
    if (mysqli_num_rows($result) === 1) {
        // ดึงข้อมูลจากฐานข้อมูล
        $row = mysqli_fetch_assoc($result);

        if (!empty($_FILES['performance_art_service1']['name'])) {
            $targetdir_performance = "C:/xampp/htdocs/Profile-Project-main/Home/Home-UserN/FilePDF/art_service/performance_art_service/";
            $randomNumber = rand(1, 100);
            $performance_newname = $randomNumber . "_" . $_FILES['performance_art_service1']['name'];
            $target_researchfile = $targetdir_performance . basename($performance_newname);
            $uploadOk = 1;
            $researchfile_ext = strtolower(pathinfo($target_researchfile, PATHINFO_EXTENSION));
            
            if ($researchfile_ext != "pdf") {
                $uploadOk = 0;
            }
            
            if ($_FILES['performance_art_service1']['size'] > 500000) {
                $uploadOk = 0;
            }

            // ตรวจสอบว่าอัปโหลดไฟล์สำเร็จ
            if ($uploadOk === 1 && move_uploaded_file($_FILES['performance_art_service1']['tmp_name'], $target_researchfile)) {
                // ลบไฟล์ PDF เก่า (หากมี)
                $old_performance_art = $row['performance_art'];
                if (!empty($old_performance_art)) {
                    $old_performance_art_path = $targetdir_performance . $old_performance_art;
                    if (file_exists($old_performance_art_path)) {
                        unlink($old_performance_art_path);
                    }
                }

                // สร้างเงื่อนไขในการอัปเดตเพียงฟิลด์ที่มีค่า
                $updateFields = [];
                $updateFields[] = "performance_art = '$performance_newname'";
            }
        }
        if (!empty($daystart_art_service1)) {
            $currentDate = date('Y-m-d'); 
            if ($daystart_art_service1 > $currentDate) {
            } else {
                $updateFields[] = "daystart = '$daystart_art_service1'";
            }
        }
        if (!empty($dayend_art_service1)) {
            $currentDate = date('Y-m-d'); 
            if ($dayend_art_service1 > $currentDate) {
            } else {
                $updateFields[] = "dayend = '$dayend_art_service1'";
            }
        }
        if (!empty($hour_art_service1) && $hour_art_service1 >= 0) {
            $updateFields[] = "hour = '$hour_art_service1'";
        } else {
        }
        if (!empty($score_art_service1) && $score_art_service1 >= 0) {
            $updateFields[] = "score = '$score_art_service1'";
        } else {
        }
        if (!empty($description_art_service1)) {
            $updateFields[] = "description = '$description_art_service1'";
        }
        if (!empty($nameart_service1)) {
            $updateFields[] = "name_art = '$nameart_service1'";
        }

        // ตรวจสอบว่ามีฟิลด์ที่ต้องการอัปเดตหรือไม่
        if (!empty($updateFields)) {
            // สร้างคำสั่ง SQL ให้ปรับปรุงข้อมูลในแถวที่ต้องการแก้ไข
            $updateQuery = "UPDATE art_service SET " . implode(", ", $updateFields) . " WHERE id = $id";

            // ตรวจสอบว่าปรับปรุงข้อมูลสำเร็จหรือไม่
            if (mysqli_query($conn, $updateQuery)) {
                header("Location: N-Home-Art&service-N.php");
                exit();
            }
        } 
    }
}
?>

<?php
// ตรวจสอบว่ามีค่า id ถูกส่งมาหรือไม่
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // ดึงข้อมูลของแถวที่ต้องการจากฐานข้อมูล
    $sql = "SELECT * FROM art_service WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        
        // นำข้อมูลจากฐานข้อมูลมาใส่ในตัวแปร
        $performance_art = $row['performance_art'];
        $daystart = $row['daystart'];
        $dayend = $row['dayend'];
        $hour = $row['hour'];
        $score = $row['score'];
        $description = $row['description'];
        $name_art = $row['name_art'];
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
    <link rel="stylesheet" href="N-Home-ALL-H&N.css" />
    <link rel="stylesheet" href="N-from-ALL.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"rel="stylesheet"/>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>
<body>
    <div class="container">
        <header>เรื่องศิลปะวัฒนธรรมและบริการวิชาการ</header>
        <a href="N-Home-Art&service-N.php" class="backBtn">ย้อนกลับ</a>
    <form action="" method="POST" enctype="multipart/form-data" value="">
        <div class="form first">
            <div class="details personal">
                <span class="title">แก้ไขรายละเอียดงาน</span>
                    <div class="fields">
                        <div class="input-field">
                            <label>ชื่องาน</label>
                            <input type="text" placeholder="ชื่องาน" id="nameart_service1" name="nameart_service1" value="<?php echo $name_art; ?>">
                        </div>
                        <div class="input-field">
                            <label>ไฟล์PDF</label>
                            <input type="file" placeholder="ไฟล์PDF" class="custom-file-input" id="performance_art_service1" name="performance_art_service1" value="">
                        </div>
                        <div class="input-field">
                            <label>วันที่เริ่ม</label>
                            <input type="date" placeholder="วันที่" id="daystart_art_service1" name="daystart_art_service1" value="<?php echo $daystart; ?>">
                        </div>
                        <div class="input-field">
                            <label>วันที่จบ</label>
                            <input type="date" placeholder="วันที่" id="dayend_art_service1" name="dayend_art_service1" value="<?php echo $dayend; ?>">
                        </div>
                        <div class="input-field">
                            <label>จำนวนชั่วโมง</label>
                            <input type="number" placeholder="ชั่วโมง" id="hour_art_service1" name="hour_art_service1" value="<?php echo $hour; ?>">
                        </div>
                        <div class="input-field">
                            <label>คะแนนที่ได้รับ</label>
                            <input type="number" placeholder="คะแนน" id="score_art_service1" name="score_art_service1" value="<?php echo $score; ?>">
                        </div>
                        <div class="input-field1">
                            <label>รายละเอียดของงาน</label>
                            <input type="text" placeholder="รายละเอียด" id="description_art_service1" name="description_art_service1" value="<?php echo $description; ?>">
                        </div>
                        <div class="sumbit1" >
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <input class="backBtn1" type="submit" name="edita" value="บันทึกการแก้ไข">
                            <input class="backBtn2" type="submit" name="deleatart" value="ลบผลงาน">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script src="Admin-Home.js"></script>

</body>

</html>

<?php

if (isset($_POST['deleatart'])) {
    function deleteRowa($id) {
        // เชื่อมต่อฐานข้อมูล
        include('DataLoRe.php');  
        // ตรวจสอบค่า ID ที่รับเข้าฟังก์ชัน
        if (!empty($id)) {
            $id = intval($id);
            $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
            
            // สร้างคำสั่ง SQL สำหรับลบข้อมูล
            $sql = "DELETE FROM art_service WHERE id = $id";
            // ทำการลบข้อมูล
            if ($conn->query($sql) === TRUE) {
                echo '<script>window.location.href = "N-Home-Art&service-N.php";</script>';
            } 
        }
    }
    // ตรวจสอบว่ามีการส่งค่า ID มาทางแอ็กชัน GET
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        deleteRowa($id);
    } else {
        echo "ไม่ได้รับค่า ID ที่ต้องการลบ";
    }
}
?>
