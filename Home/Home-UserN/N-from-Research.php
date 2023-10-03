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
        <header>ผลงานวิจัย</header>
        <a href="N-Home-Research-N.php" class="backBtn">ย้อนกลับ</a>
    <form action="DataRegister.php" method="POST" enctype="multipart/form-data">
        <div class="form first">
            <div class="details personal">
                <span class="title">เพิ่มงาน</span>
                    <div class="fields">
                        <div class="input-field">
                            <label>ชื่อผลงานวิจัย</label>
                            <input type="text" placeholder="ชื่องาน" id="nameresearch" name="nameresearch" required>
                        </div>
                        <div class="input-field">
                            <label>ปีที่ตีพิมพ์</label>
                            <input type="date" id="day" name="day" >
                        </div>
                        <div class="input-field">
                            <label>ไฟล์ผลงานวิจัย(.PDF)</label>
                            <input type="file" placeholder="ไฟล์PDF" class="custom-file-input" id="researchfile" name="researchfile" required>
                        </div>
                        <div class="input-field">
                            <label>ชื่อวารสารที่ตีพิมพ์(ถ้ามี)</label>
                            <input type="text" placeholder="ชื่อวารสาร" id="journalname" name="journalname" >
                        </div>
                        <div class="input-field">
                            <label>รูปหรือแผนภาพ.PDF(ถ้ามี)</label>
                            <input type="file" placeholder="ไฟล์PDF" class="custom-file-input" id="picturediagram" name="picturediagram" >
                        </div>
                        <div class="input-field">
                            <label>เอกสารทุน.PDF(ถ้ามี)</label>
                            <input type="file" placeholder="ไฟล์PDF" class="custom-file-input" id="capitaldocuments" name="capitaldocuments" >
                        </div>
                        <div class="input-field1">
                            <label>รายละเอียดของงาน</label>
                            <input type="text" placeholder="รายละเอียด" id="description" name="description" >
                        </div>
                        <div class="sumbit1">
                            <input class="backBtn3" type="submit" name="submitresearch" value="บันทึก">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
</html>
