<?php 

include('DataRegister.php'); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="N-from-ALL.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>
<body>
    <div class="container">
        <header>ID : </header>
    <form action="DataRegister.php" method="POST">
        <div class="form first">
            <div class="details personal">
            <span class="title">แก้ไขรายละเอียดไอดี</span>
                    <div class="fields">
                        <div class="input-field">
                            <label>ตำแหน่ง</label>
                            <select id="cars1" name="rank">
                                <option value="volvo" selected>ตำแหน่ง</option>
                                <option value="saab">Saab</option>
                                <option value="vw">VW</option>
                                <option value="audi" >ตำแหน่ง</option>
                            </select>
                        </div>
                        <div class="input-field">
                            <label>คณะ</label>
                            <select id="cars2" name="branch">
                                <option value="volvo" selected>สาขา</option>
                                <option value="saab">Saab</option>
                                <option value="vw">VW</option>
                                <option value="audi" >คณะ</option>
                            </select>
                        </div>
                        <div class="input-field">
                            <label>ชื่อ</label>
                            <input type="text" placeholder="ชื่อ" id="name1" name="name1" required>
                        </div>
                        <form action="DataRegister.php" method="POST" enctype="multipart/form-data">
                            <div class="input-field">
                            <label>นามสกุล</label>
                            <input type="text" placeholder="นามสกุล" class="custom-file-input" id="file1" name="file1" required>
                        </div>
                        </form>
                        <div class="input-field">
                            <label>Email</label>
                            <input type="text" placeholder="Email" id="day1" name="day1" required>
                        </div>
                        <div class="input-field">
                            <label>เบอร์ติดต่อ</label>
                            <input type="text" placeholder="เบอร์ติดต่อ" id="day1" name="day1" required>
                        </div>
                        <div class="input-field1">
                            <label>รหัสผ่าน</label>
                            <input type="text" placeholder="รหัสผ่าน" id="score1" name="score1" required>
                        </div>
                        <div class="sumbit1">
                            <input class="backBtn1" type="submit" name="submit1" value="บันทึกการแก้ไข">
                            <input class="backBtn2" type="submit" name="submit2" value="ลบบัญชีและผลงานทั้งหมด">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
</html>
