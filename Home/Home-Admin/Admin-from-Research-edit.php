<?php 

include('DataRegister.php'); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Admin-from-ALL.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>
<body>
    <div class="container">
        <header>ผลงานวิจัย</header>
    <form action="" method="POST">
        <div class="form first">
            <div class="details personal">
                <span class="title">แก้ไขรายละเอียดงาน</span>
                    <div class="fields">
                        <div class="input-field">
                            <label>ชื่อผลงานวิจัย</label>
                            <input type="text" placeholder="ชื่องาน" id="nameresearch1" name="nameresearch1" value="">
                        </div>
                        <div class="input-field">
                            <label>ปีที่ตีพิมพ์</label>
                            <input type="date" id="day1" name="day1" value="">
                        </div>
                        <div class="input-field">
                            <label>ไฟล์ผลงานวิจัย(.PDF)</label>
                            <input type="file" placeholder="ไฟล์PDF" class="custom-file-input" id="researchfile1" name="researchfile1" value="">
                        </div>
                        <div class="input-field">
                            <label>ชื่อวารสารที่ตีพิมพ์(ถ้ามี)</label>
                            <input type="text" placeholder="ชื่อวารสาร" id="journalname1" name="journalname1" value="">
                        </div>
                        <div class="input-field">
                            <label>รูปหรือแผนภาพ.PDF(ถ้ามี)</label>
                            <input type="file" placeholder="ไฟล์PDF" class="custom-file-input" id="picturediagram1" name="picturediagram1" value="">
                        </div>
                        <div class="input-field">
                            <label>เอกสารทุน.PDF(ถ้ามี)</label>
                            <input type="file" placeholder="ไฟล์PDF" class="custom-file-input" id="capitaldocuments1" name="capitaldocuments1" value="">
                        </div>
                        <div class="input-field1">
                            <label>รายละเอียดของงาน</label>
                            <input type="text" placeholder="รายละเอียด" id="description1" name="description1" value="">
                        </div>
                        <div class="sumbit1" action="N-from-Teach.php">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <input class="backBtn1" type="submit" name="editr" value="บันทึกการแก้ไข">
                            <input class="backBtn2" type="submit" name="deleter" value="ลบผลงาน">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
</html>

<?php

if (isset($_POST['deleter'])) {
    function deleteRow($id) {
        // เชื่อมต่อฐานข้อมูล
        include('DataLoRe.php');  
        // ตรวจสอบค่า ID ที่รับเข้าฟังก์ชัน
        if (!empty($id)) {
            $id = intval($id);
            $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
            
            // สร้างคำสั่ง SQL สำหรับลบข้อมูล
            $sql = "DELETE FROM research WHERE id = $id";
            // ทำการลบข้อมูล
            if ($conn->query($sql) === TRUE) {
                echo '<script>window.location.href = "Admin-Home-Research-N.php";</script>';
            } 
        }
    }
    // ตรวจสอบว่ามีการส่งค่า ID มาทางแอ็กชัน GET
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        deleteRow($id);
    } else {
        echo "ไม่ได้รับค่า ID ที่ต้องการลบ";
    }
}
?>

<?php

include('DataLoRe.php');
$conn = mysqli_connect('localhost', 'root', '', 'profile');

// ตรวจสอบว่ามีการส่งคำขอแก้ไขข้อมูลผ่านฟอร์มหรือไม่
if (isset($_POST['editr'])) {
    $id = $_POST['id']; 
    $id = isset($_GET['id']) ? intval($_GET['id']) : 0;

    // ตรวจสอบว่ามีค่าในฟิลด์และไม่เป็นค่าว่าง
    $nameresearch1 = !empty($_POST['nameresearch1']) ? mysqli_real_escape_string($conn, $_POST['nameresearch1']) : null;
    $day1 = !empty($_POST['day1']) ? $_POST['day1'] : null;
    $journalname1 = !empty($_POST['journalname1']) ? mysqli_real_escape_string($conn, $_POST['journalname1']) : null;
    $description1 = !empty($_POST['description1']) ? mysqli_real_escape_string($conn, $_POST['description1']) : null;

    // ตรวจสอบว่ามีการอัปโหลดไฟล์ researchfile1
    if (isset($_FILES['researchfile1']) && $_FILES['researchfile1']['error'] === UPLOAD_ERR_OK) {
        $researchfile1 = $_FILES['researchfile1']['name'];
        $temp_name = $_FILES['researchfile1']['tmp_name'];
        move_uploaded_file($temp_name, "C:/xampp/htdocs/Profile-Project-main/Home/Home-UserN/FilePDF/Research/researchfile/" . $researchfile1);
    } else {
        $researchfile1 = ''; 
    }

    // ตรวจสอบว่ามีการอัปโหลดไฟล์ picturediagram1
    if (isset($_FILES['picturediagram1']) && $_FILES['picturediagram1']['error'] === UPLOAD_ERR_OK) {
        $picturediagram1 = $_FILES['picturediagram1']['name'];
        $temp_name = $_FILES['picturediagram1']['tmp_name'];
        move_uploaded_file($temp_name, "C:/xampp/htdocs/Profile-Project-main/Home/Home-UserN/FilePDF/Research/picturediagram/" . $picturediagram1);
    } else {
        $picturediagram1 = ''; // ไม่มีการอัปโหลดไฟล์
    }

    // ส่งคำสั่ง SQL ให้ดึงข้อมูลแถวที่ต้องการแก้ไข
    $query = "SELECT * FROM research WHERE id = $id";
    $result = mysqli_query($conn, $query);

    // ตรวจสอบว่าพบข้อมูลหรือไม่
    if (mysqli_num_rows($result) === 1) {
        // ดึงข้อมูลจากฐานข้อมูล
        $row = mysqli_fetch_assoc($result);

        // สร้างเงื่อนไขในการอัปเดตเพียงฟิลด์ที่มีค่า
        $updateFields = [];
        if (!empty($nameresearch1)) {
            $updateFields[] = "nameresearch = '$nameresearch1'";
        }
        if (!empty($day1)) {
            $updateFields[] = "day = '$day1'";
        }
        if (!empty($researchfile1)) {
            $updateFields[] = "researchfile = '$researchfile1'";
        }
        if (!empty($journalname1)) {
            $updateFields[] = "journalname = '$journalname1'";
        }
        if (!empty($picturediagram1)) {
            $updateFields[] = "picturediagram = '$picturediagram1'";
        }
        if (!empty($description1)) {
            $updateFields[] = "description = '$description1'";
        }

        // ตรวจสอบว่ามีฟิลด์ที่ต้องการอัปเดตหรือไม่
        if (!empty($updateFields)) {
            // สร้างคำสั่ง SQL ให้ปรับปรุงข้อมูลในแถวที่ต้องการแก้ไข
            $updateQuery = "UPDATE research SET " . implode(", ", $updateFields) . " WHERE id = $id";

            // ตรวจสอบว่าปรับปรุงข้อมูลสำเร็จหรือไม่
            if (mysqli_query($conn, $updateQuery)) {
                header("Location: Admin-Home-Research-N.php");
                exit();
            }
        } 
    }
}