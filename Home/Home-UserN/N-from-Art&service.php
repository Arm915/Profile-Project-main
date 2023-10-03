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
        <header>เรื่องศิลปะวัฒนธรรมและบริการวิชาการ</header>
        <a href="N-Home-Art&service-N.php" class="backBtn">ย้อนกลับ</a>
    <form action="DataRegister.php" method="POST" enctype="multipart/form-data">
        <div class="form first">
            <div class="details personal">
                <span class="title">เพิ่มงาน</span>
                    <div class="fields">
                        <div class="input-field">
                            <label>ชื่องาน</label>
                            <input type="text" placeholder="ชื่องาน" id="nameart_service" name="nameart_service" required>
                        </div>
                        <div class="input-field">
                            <label>ไฟล์PDF</label>
                            <input type="file" placeholder="ไฟล์PDF" class="custom-file-input" id="performance_art_service" name="performance_art_service" required>
                        </div>
                        <div class="input-field">
                            <label>วันที่เริ่ม</label>
                            <input type="date" placeholder="วันที่" id="daystart_art_service" name="daystart_art_service" required>
                        </div>
                        <div class="input-field">
                            <label>วันที่จบ</label>
                            <input type="date" placeholder="วันที่" id="dayend_art_service" name="dayend_art_service" required>
                        </div>
                        <div class="input-field">
                            <label>จำนวนชั่วโมง</label>
                            <input type="number" placeholder="ชั่วโมง" id="hour_art_service" name="hour_art_service" required>
                        </div>
                        <div class="input-field">
                            <label>คะแนนที่ได้รับ</label>
                            <input type="number" placeholder="คะแนน" id="score_art_service" name="score_art_service" required>
                        </div>
                        <div class="input-field1">
                            <label>รายละเอียดของงาน</label>
                            <input type="text" placeholder="รายละเอียด" id="description_art_service" name="description_art_service" required>
                        </div>
                        <div class="sumbit1">
                            <input class="backBtn3" type="submit" name="submit2" value="บันทึกการแก้ไข">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
</html>

