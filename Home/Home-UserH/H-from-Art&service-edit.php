<?php 

include('DataRegister.php'); 

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
        <header>The Watcher : เรื่องศิลปะวัฒนธรรมและบริการวิชาการ</header>
    <form action="DataRegister.php" method="POST">
        <div class="form first">
            <div class="details personal">
                <span class="title">รายละเอียดงาน</span>
                    <div class="fields">
                        <div class="input-field">
                            <label>ชื่องาน</label>
                            <input type="text" placeholder="ชื่องาน" id="name1" name="name1" required>
                        </div>
                        <form action="DataRegister.php" method="POST" enctype="multipart/form-data">
                            <div class="input-field">
                            <label>ไฟล์PDF</label>
                            <input type="file" placeholder="ไฟล์PDF" class="custom-file-input" id="file1" name="file1" required>
                        </div>
                        </form>
                        <div class="input-field">
                            <label>วันที่เริ่ม</label>
                            <input type="date" placeholder="วันที่" id="day1" name="day1" required>
                        </div>
                        <div class="input-field">
                            <label>วันที่จบ</label>
                            <input type="date" placeholder="วันที่" id="day1" name="day1" required>
                        </div>
                        <div class="input-field">
                            <label>จำนวนชั่วโมง</label>
                            <input type="number" placeholder="ชั่วโมง" id="score1" name="score1" required>
                        </div>
                        <div class="input-field">
                            <label>คะแนนที่ได้รับ</label>
                            <input type="number" placeholder="คะแนน" id="score1" name="score1" required>
                        </div>
                        <div class="input-field1">
                            <label>รายละเอียดของงาน</label>
                            <input type="text" placeholder="รายละเอียด" id="score1" name="score1" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
</html>
