<?php 

include('DataRegister.php'); 
include('DataLoRe.php');

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
    <link rel="stylesheet" href="H-from-ALL.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>
<body>
    <div class="container">
        <header>The Watcher : ผลงานวิจัย</header>
        <a href="H-Home-Research-N.php" class="backBtn">ย้อนกลับ</a>
    <form action="DataRegister.php" method="POST">
        <div class="form first">
            <div class="details personal">
                <span class="title">รายละเอียดงาน</span>
                    <div class="fields">
                        <div class="input-field">
                            <label>ชื่อผลงานวิจัย</label>
                            <input type="text" placeholder="ชื่องาน" id="name1" name="name1" value="<?php echo $nameresearch; ?>"required>
                        </div>
                        <div class="input-field">
                            <label>ปีที่ตีพิมพ์</label>
                            <input type="date" id="day1" name="day1" value="<?php echo $day; ?>"required>
                        </div>
                        <div class="input-field">
                            <label>ไฟล์ผลงานวิจัย(.PDF)</label>
                            <input type="file" placeholder="ไฟล์PDF" class="custom-file-input" id="file1" name="file1" required>
                        </div>

                        <div class="input-field">
                            <label>ชื่อวารสารที่ตีพิมพ์(ถ้ามี)</label>
                            <input type="text" placeholder="ชื่อวารสาร" id="day1" name="day1" value="<?php echo $Journalname; ?>"required>
                        </div>
                        <div class="input-field">
                            <label>รูปหรือแผนภาพ.PDF(ถ้ามี)</label>
                            <input type="file" placeholder="ไฟล์PDF" class="custom-file-input" id="file1" name="file1" required>
                        </div>
                        <div class="input-field">
                            <label>เอกสารทุน.PDF(ถ้ามี)</label>
                            <input type="file" placeholder="ไฟล์PDF" class="custom-file-input" id="file1" name="file1" required>
                        </div>
                        <div class="input-field1">
                            <label>รายละเอียดของงาน</label>
                            <input type="text" placeholder="รายละเอียด" id="score1" name="score1" value="<?php echo $description; ?>"required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
</html>
