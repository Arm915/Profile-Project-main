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
        <header>The Watcher : ผลงานวิจัย</header>
    <form action="DataRegister.php" method="POST">
        <div class="form first">
            <div class="details personal">
                <span class="title">รายละเอียดงาน</span>
                    <div class="fields">
                        <div class="input-field">
                            <label>ชื่อผลงานวิจัย</label>
                            <input type="text" placeholder="ชื่องาน" id="name1" name="name1" required>
                        </div>
                        <div class="input-field">
                            <label>ปีที่ตีพิมพ์</label>
                            <input type="date" id="day1" name="day1" required>
                        </div>
                        <div class="input-field">
                            <label>ไฟล์ผลงานวิจัย(.PDF)</label>
                            <input type="file" placeholder="ไฟล์PDF" class="custom-file-input" id="file1" name="file1" required>
                        </div>

                        <div class="input-field">
                            <label>ชื่อวารสารที่ตีพิมพ์(ถ้ามี)</label>
                            <input type="text" placeholder="ชื่อวารสาร" id="day1" name="day1" required>
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
                            <input type="text" placeholder="รายละเอียด" id="score1" name="score1" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
</html>
