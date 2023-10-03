<?php 

include('DataRegister.php'); 

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

    // ส่งคำสั่ง SQL ให้ดึงข้อมูลแถวที่ต้องการแก้ไข
    $query = "SELECT * FROM research WHERE id = $id";
    $result = mysqli_query($conn, $query);

    // ตรวจสอบว่าพบข้อมูลหรือไม่
    if (mysqli_num_rows($result) === 1) {
        // ดึงข้อมูลจากฐานข้อมูล
        $row = mysqli_fetch_assoc($result);

        // สร้างเงื่อนไขในการอัปเดตเพียงฟิลด์ที่มีค่า
        if (!empty($_FILES['researchfile1']['name'])) {
            $targetdir_performance1 = "C:/xampp/htdocs/Profile-Project-main/Home/Home-UserN/FilePDF/Research/researchfile/";
            $randomNumber1 = rand(1, 100);
            $performance_newname1 = $randomNumber1 . "_" . $_FILES['researchfile1']['name'];
            $target_researchfile1 = $targetdir_performance1 . basename($performance_newname1);
            $uploadOk1 = 1;
            $researchfile_ext1 = strtolower(pathinfo($target_researchfile1, PATHINFO_EXTENSION));
            
            if ($researchfile_ext1 != "pdf") {
                $uploadOk1 = 0;
            }
            
            if ($_FILES['researchfile1']['size'] > 500000) {
                $uploadOk1 = 0;
            }

            // ตรวจสอบว่าอัปโหลดไฟล์สำเร็จ
            if ($uploadOk1 === 1 && move_uploaded_file($_FILES['researchfile1']['tmp_name'], $target_researchfile1)) {
                // ลบไฟล์ PDF เก่า (หากมี)
                $old_performance_art1 = $row['researchfile'];
                if (!empty($old_performance_art1)) {
                    $old_performance_art_path1 = $targetdir_performance1 . $old_performance_art1;
                    if (file_exists($old_performance_art_path1)) {
                        unlink($old_performance_art_path1);
                    }
                }

                // สร้างเงื่อนไขในการอัปเดตเพียงฟิลด์ที่มีค่า
                $updateFields[] = "researchfile = '$performance_newname1'";
            }
        }

        if (!empty($_FILES['picturediagram1']['name'])) {
            $targetdir_performance2 = "C:/xampp/htdocs/Profile-Project-main/Home/Home-UserN/FilePDF/Research/picturediagram/";
            $randomNumber2 = rand(101, 200);
            $performance_newname2 = $randomNumber2 . "_" . $_FILES['picturediagram1']['name'];
            $target_researchfile2 = $targetdir_performance2 . basename($performance_newname2);
            $uploadOk2 = 1;
            $researchfile_ext2 = strtolower(pathinfo($target_researchfile2, PATHINFO_EXTENSION));
            
            if ($researchfile_ext2 != "pdf") {
                $uploadOk2 = 0;
            }
            
            if ($_FILES['picturediagram1']['size'] > 500000) {
                $uploadOk2 = 0;
            }

            // ตรวจสอบว่าอัปโหลดไฟล์สำเร็จ
            if ($uploadOk2 === 1 && move_uploaded_file($_FILES['picturediagram1']['tmp_name'], $target_researchfile2)) {
                // ลบไฟล์ PDF เก่า (หากมี)
                $old_performance_art2 = $row['picturediagram'];
                if (!empty($old_performance_art2)) {
                    $old_performance_art_path2 = $targetdir_performance2 . $old_performance_art2;
                    if (file_exists($old_performance_art_path2)) {
                        unlink($old_performance_art_path2);
                    }
                }

                // สร้างเงื่อนไขในการอัปเดตเพียงฟิลด์ที่มีค่า
                $updateFields[] = "picturediagram = '$performance_newname2'";
            }
        }

        if (!empty($_FILES['capitaldocuments1']['name'])) {
            $targetdir_performance3 = "C:/xampp/htdocs/Profile-Project-main/Home/Home-UserN/FilePDF/Research/capitaldocuments/";
            $randomNumber3 = rand(201, 300);
            $performance_newname3 = $randomNumber3 . "_" . $_FILES['capitaldocuments1']['name'];
            $target_researchfile3 = $targetdir_performance3 . basename($performance_newname3);
            $uploadOk3 = 1;
            $researchfile_ext3 = strtolower(pathinfo($target_researchfile3, PATHINFO_EXTENSION));
            
            if ($researchfile_ext3 != "pdf") {
                $uploadOk3 = 0;
            }
            
            if ($_FILES['capitaldocuments1']['size'] > 500000) {
                $uploadOk3 = 0;
            }

            // ตรวจสอบว่าอัปโหลดไฟล์สำเร็จ
            if ($uploadOk3 === 1 && move_uploaded_file($_FILES['capitaldocuments1']['tmp_name'], $target_researchfile3)) {
                // ลบไฟล์ PDF เก่า (หากมี)
                $old_performance_art3 = $row['capitaldocuments'];
                if (!empty($old_performance_art3)) {
                    $old_performance_art_path3 = $targetdir_performance3 . $old_performance_art3;
                    if (file_exists($old_performance_art_path3)) {
                        unlink($old_performance_art_path3);
                    }
                }

                // สร้างเงื่อนไขในการอัปเดตเพียงฟิลด์ที่มีค่า
                $updateFields[] = "capitaldocuments = '$performance_newname3'";
            }
        }
        if (!empty($nameresearch1)) {
            $updateFields[] = "nameresearch = '$nameresearch1'";
        }
        if (!empty($day1)) {
            $currentDate = date('Y-m-d'); 
            if ($day1 > $currentDate) {
            } else {
                $updateFields[] = "day = '$day1'";
            }
        }
        if (!empty($journalname1)) {
            $updateFields[] = "journalname = '$journalname1'";
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
                header("Location: N-Home-Research-N.php");
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
    $sql = "SELECT * FROM research WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        // นำข้อมูลจากฐานข้อมูลมาใส่ในตัวแปร
        $nameresearch = $row['nameresearch'];
        $day = $row['day'];
        $Journalname = $row['Journalname'];
        $description = $row['description'];
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
        <header>ผลงานวิจัย</header>
        <a href="N-Home-Research-N.php" class="backBtn">ย้อนกลับ</a>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form first">
            <div class="details personal">
                <span class="title">แก้ไขรายละเอียดงาน</span>
                    <div class="fields">
                        <div class="input-field">
                            <label>ชื่อผลงานวิจัย</label>
                            <input type="text" placeholder="ชื่องาน" id="nameresearch1" name="nameresearch1" value="<?php echo $nameresearch; ?>">
                        </div>
                        <div class="input-field">
                            <label>ปีที่ตีพิมพ์</label>
                            <input type="date" id="day1" name="day1" value="<?php echo $day; ?>">
                        </div>
                        <div class="input-field">
                            <label>ไฟล์ผลงานวิจัย(.PDF)</label>
                            <input type="file" placeholder="ไฟล์PDF" class="custom-file-input" id="researchfile1" name="researchfile1" value="">
                        </div>
                        <div class="input-field">
                            <label>ชื่อวารสารที่ตีพิมพ์(ถ้ามี)</label>
                            <input type="text" placeholder="ชื่อวารสาร" id="journalname1" name="journalname1" value="<?php echo $Journalname; ?>">
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
                            <input type="text" placeholder="รายละเอียด" id="description1" name="description1" value="<?php echo $description; ?>">
                        </div>
                        <div class="sumbit1" >
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
                echo '<script>window.location.href = "N-Home-Research-N.php";</script>';
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