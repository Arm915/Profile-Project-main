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
        <header>The Watcher : ตารางสอน</header>
    <form action="DataRegister.php" method="POST">
        <div class="form first">
            <div class="details personal">
            <span class="title">วิชาที่สอน</span>
                    <div class="fields">

                        <div class="input-field">
                            <label>ชื่อวิชา</label>
                            <input type="text" placeholder="ระบบฐานข้อมูล,สถิติสำหรับคอมพิวเตอร์...." id="name1" name="name1" required>
                        </div>
                        <form action="DataRegister.php" method="POST" enctype="multipart/form-data">
                            <div class="input-field">
                            <label>รหัสวิชา</label>
                            <input type="text" placeholder="ITEC3501,COMP2205...." class="custom-file-input" id="file1" name="file1" required>
                        </div>
                        </form>
                        <div class="input-field">
                            <label>กลุ่มเรียน</label>
                            <input type="text" placeholder="101,102...." id="day1" name="day1" required>
                        </div>
                        <div class="input-field">
                            <label>คณะ</label>
                            <input type="text" placeholder="วิทยาศาสตร์,หมวดวิชาศึกษาทั่วไป...." id="day1" name="day1" required>
                        </div>
                        <div class="input-field">
                            <label>ห้อง</label>
                            <input type="text" placeholder="15-1103,บรรยาย1...." id="day1" name="day1" required>
                        </div>
                        <div class="input-field">
                            <label>หน่วยกิต</label>
                            <input type="text" placeholder="3(2-2-5),3 (2-2-5)...." id="day1" name="day1" required>
                        </div>
                        <div class="input-field">
                            <label>เวลาเริ่ม</label>
                            <input type="time" id="day1" name="day1" required>
                        </div>
                        <div class="input-field">
                            <label>เวลาจบ</label>
                            <input type="time" id="day1" name="day1" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
</html>
