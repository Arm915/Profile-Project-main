<?php 

include('DataRegister.php'); 

?>

<?php

$error1 = "";
$error2 = "";
include('DataLoRe.php');
$conn = mysqli_connect('localhost', 'root', '', 'profile');

// ตรวจสอบว่ามีการส่งคำขอแก้ไขข้อมูลผ่านฟอร์มหรือไม่
if (isset($_POST['editrUN'])) {
    $id = isset($_GET['id']) ? intval($_GET['id']) : 0;

    // ตรวจสอบว่ามีค่าในฟิลด์และไม่เป็นค่าว่าง
    $nameN = !empty($_POST['nameN']) ? mysqli_real_escape_string($conn, $_POST['nameN']) : null;
    $surnameN = !empty($_POST['surnameN']) ? mysqli_real_escape_string($conn, $_POST['surnameN']) : null;
    $emailN = !empty($_POST['emailN']) ? mysqli_real_escape_string($conn, $_POST['emailN']) : null;
    $rankN = !empty($_POST['rankN']) ? mysqli_real_escape_string($conn, $_POST['rankN']) : null;
    $branchN = !empty($_POST['branchN']) ? mysqli_real_escape_string($conn, $_POST['branchN']) : null;
    $passwordN = !empty($_POST['passwordN']) ? mysqli_real_escape_string($conn, $_POST['passwordN']) : null;

    if (!empty($passwordN) && strlen($passwordN) < 8) {
        // รหัสผ่านต้องมีความยาวอย่างน้อย 8 ตัว
        $error1 = "รหัสผ่านต้องมีอย่างน้อย 8 ตัว";
    } 
    if (!empty($emailN)) {
        // ตรวจสอบว่าอีเมลซ้ำกับข้อมูลอื่นในฐานข้อมูลหรือไม่
        $checkEmailQuery = "SELECT * FROM regis WHERE email = '$emailN' AND id != $id";
        $result = mysqli_query($conn, $checkEmailQuery);
    
        if (mysqli_num_rows($result) > 0) {
            // ถ้ามีอีเมลที่ซ้ำกันในฐานข้อมูลให้ใช้ค่าเดิม
            $error2 = "อีเมลนี้มีอยู่ในระบบแล้ว";
        }
        else {
            // ส่งคำสั่ง SQL ให้ดึงข้อมูลแถวที่ต้องการแก้ไข
            $query = "SELECT * FROM regis WHERE id = $id";
            $result = mysqli_query($conn, $query);
    
            // ตรวจสอบว่าพบข้อมูลหรือไม่
            if (mysqli_num_rows($result) === 1) {
                // ดึงข้อมูลจากฐานข้อมูล
                $row = mysqli_fetch_assoc($result);
    
                // สร้างเงื่อนไขในการอัปเดตเพียงฟิลด์ที่มีค่า
                $updateFields = [];
                if (!empty($nameN)) {
                    $updateFields[] = "username = '$nameN'";
                }
                if (!empty($surnameN)) {
                    $updateFields[] = "surname = '$surnameN'";
                }
                if (!empty($emailN)) {
                    $updateFields[] = "email = '$emailN'";
                }
                if (!empty($rankN)) {
                    $updateFields[] = "rank = '$rankN'";
                }
                if (!empty($branchN)) {
                    $updateFields[] = "branch = '$branchN'";
                }
                if (!empty($passwordN)) {
                    $updateFields[] = "Pass = '$passwordN'";
                }
    
                // ตรวจสอบว่ามีฟิลด์ที่ต้องการอัปเดตหรือไม่
                if (!empty($updateFields)) {
                    // สร้างคำสั่ง SQL ให้ปรับปรุงข้อมูลในแถวที่ต้องการแก้ไข
                    $updateQuery = "UPDATE regis SET " . implode(", ", $updateFields) . " WHERE id = $id";
    
                    // ตรวจสอบว่าปรับปรุงข้อมูลสำเร็จหรือไม่
                    if (mysqli_query($conn, $updateQuery)) {
                        header("Location: Admin-Home-ID-N.php");
                        exit();
                    }
                } 
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
    $sql = "SELECT * FROM regis WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        
        // นำข้อมูลจากฐานข้อมูลมาใส่ในตัวแปร
        $username = $row['username'];
        $surname = $row['surname'];
        $email = $row['email'];
        $rank = $row['rank'];
        $branch = $row['branch'];
        $password = $row['Pass'];
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
    <link rel="stylesheet" href="Admin-from-ALL.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>
<body>
    <div class="container">
    <div class="error" > <?php echo $error1; ?></div>
    <div class="error" > <?php echo $error2; ?></div>
        <header>ID : </header>
        <a href="Admin-Home-ID-N.php" class="backBtn">ย้อนกลับ</a>
    <form action="" method="POST">
        <div class="form first">
            <div class="details personal">
            <span class="title">แก้ไขบัญชีทั่วไป</span>
                    <div class="fields">
                        <div class="input-field">
                            <label>ตำแหน่ง</label>
                            <select id="cars1" name="rankN" value="">
                                <option value="" selected><?php echo $rank; ?></option>
                                <option value="saab">Saab</option>
                                <option value="vw">VW</option>
                                <option value="audi" >ตำแหน่ง</option>
                            </select>
                        </div>
                        <div class="input-field">
                            <label>คณะ</label>
                            <select id="cars2" name="branchN" value="">
                            <option value="" selected><?php echo $branch; ?></option>
                                <option value="สาขาวิชาคอมพิวเตอร์(ค.บ.)">สาขาวิชาคอมพิวเตอร์(ค.บ.)</option>
                                <option value="สาขาวิชาฟิสิกส์(ค.บ.)">สาขาวิชาฟิสิกส์(ค.บ.)</option>
                                <option value="สาขาวิชาคณิตศาสตร์(ค.บ)" >สาขาวิชาคณิตศาสตร์ (ค.บ)</option>
                                <option value="สาขาวิชาวิทยาศาสตร์ทั่วไป(ค.บ.)">สาขาวิชาวิทยาศาสตร์ทั่วไป(ค.บ.)</option>
                                <option value="สาขาวิชาเคมี(ค.บ.)">สาขาวิชาเคมี(ค.บ.)</option>
                                <option value="สาขาวิชาชีววิทยา(ค.บ.)" >สาขาวิชาชีววิทยา(ค.บ.)</option>
                                <option value="สาขาวิชาการประกอบอาหารและการจัดการงานครัว">สาขาวิชาการประกอบอาหารและการจัดการงานครัว</option>
                                <option value="สาขาวิชาการประกันภัยและบริหารความเสี่ยง">สาขาวิชาการประกันภัยและบริหารความเสี่ยง</option>
                                <option value="สาขาวิชามัลติมีเดียและอีสปอร์ต" >สาขาวิชามัลติมีเดียและอีสปอร์ต</option>
                                <option value="สาขาวิชาเทคโนโลยีสารสนเทศและนวัตกรรมดิจิทัล">สาขาวิชาเทคโนโลยีสารสนเทศและนวัตกรรมดิจิทัล</option>
                                <option value="สาขาวิชาวิศวกรรมโยธาและบริหารงานก่อสร้าง">สาขาวิชาวิศวกรรมโยธาและบริหารงานก่อสร้าง</option>
                                <option value="สาขาวิชาวิทยาศาสตร์การกีฬาและการออกกำลังกาย" >สาขาวิชาวิทยาศาสตร์การกีฬาและการออกกำลังกาย</option>
                                <option value="สาขาวิชาการจัดการสิ่งแวดล้อมและความปลอดภัย">สาขาวิชาการจัดการสิ่งแวดล้อมและความปลอดภัย</option>
                                <option value="สาขาวิชาวิทยาการคอมพิวเตอร์และปัญญาประดิษฐ์">สาขาวิชาวิทยาการคอมพิวเตอร์และปัญญาประดิษฐ์</option>
                                <option value="สาขาวิชาวิศวกรรมการผลิตและการจัดการพลังงาน" >สาขาวิชาวิศวกรรมการผลิตและการจัดการพลังงาน</option>
                                <option value="สาขาวิชาออกแบบผลิตภัณฑ์อุตสาหกรรม">สาขาวิชาออกแบบผลิตภัณฑ์อุตสาหกรรม</option>
                                <option value="สาขาวิชาอิเล็กทรอนิกส์อัจฉริยะและหุ่นยนต์">สาขาวิชาอิเล็กทรอนิกส์อัจฉริยะและหุ่นยนต์</option>
                                <option value="หลักสูตรการแพทย์จีนบัณฑิต(พจ.บ)" >หลักสูตรการแพทย์จีนบัณฑิต(พจ.บ)</option>
                                <option value="วิทยาศาสตร์มหาบัณฑิตหลักสูตรวิทยาศาสตร์ศึกษา(วท.ม)">วิทยาศาสตร์มหาบัณฑิตหลักสูตรวิทยาศาสตร์ศึกษา(วท.ม)</option>
                            </select>
                        </div>
                        <div class="input-field">
                            <label>ชื่อ</label>
                            <input type="text" placeholder="ชื่อ" id="nameN" name="nameN" value="<?php echo $username; ?>">
                        </div>
                            <div class="input-field">
                            <label>นามสกุล</label>
                            <input type="text" placeholder="นามสกุล" class="custom-file-input" id="surnameN" name="surnameN" value="<?php echo $surname; ?>">
                        </div>
                        <div class="input-field">
                            <label>Email</label>
                            <input type="email" placeholder="Email" id="emailN" name="emailN" value="<?php echo $email; ?>">
                        </div>
                        <div class="input-field1">
                            <label>รหัสผ่าน(รหัสประจำตัว)</label>
                            <input type="text" placeholder="รหัสผ่าน" id="passwordN" name="passwordN" minlength="8" value="<?php echo $password; ?>">
                        </div>
                        <div class="sumbit1">
                            <input class="backBtn1" type="submit" name="editrUN" value="บันทึกการแก้ไข">
                            <input class="backBtn2" type="submit" name="deleterUN" value="ลบบัญชีและผลงานทั้งหมด">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
</html>

<?php

if (isset($_POST['deleterUN'])) {
    function deleteRow($id) {
        // เชื่อมต่อฐานข้อมูล
        include('DataLoRe.php');  
        // ตรวจสอบค่า ID ที่รับเข้าฟังก์ชัน
        if (!empty($id)) {
            $id = intval($id);
            $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
            
            // สร้างคำสั่ง SQL สำหรับลบข้อมูล
            $sql = "DELETE FROM regis WHERE id = $id";
            // ทำการลบข้อมูล
            if ($conn->query($sql) === TRUE) {
                echo '<script>window.location.href = "Admin-Home-ID-N.php";</script>';
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