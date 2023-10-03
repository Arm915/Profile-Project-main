<?php 

include('DataRegister.php'); 

?>

<?php 

$error = "";
if (array_key_exists("RegisterN", $_POST)) {

include('DataLoRe.php');  

$name = mysqli_real_escape_string($conn, $_POST['nameN']);
$surname = mysqli_real_escape_string($conn, $_POST['surnameN']);
$email = mysqli_real_escape_string($conn, $_POST['emailN']);
$rank = mysqli_real_escape_string($conn, $_POST['rankN']);
$branch = mysqli_real_escape_string($conn, $_POST['branchN']);
$password = mysqli_real_escape_string($conn,  $_POST['passwordN']); 


    if (!$name) {
    $error .= "ไม่ได้ใส่ยูสเซอ <br>";
    }
    if (!$email) {
    $error .= "ไม่ได้ใส่อีเมล <br>";
    }
    if (!$rank) {
    $error .= "ไม่ได้ใส่ตำแหน่ง <br>";
    }
    if (!$branch) {
    $error .= "ไม่ได้ใส่สาขา <br>";
    }
    if (!$password) {
    $error .= "ไม่ใส่รหัสผ่าน <br>";
    }
    else {
    
        $query = "SELECT id FROM watcher_user WHERE email = '$email'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            $error .="<p>มีอีเมลนี้ในระบบแล้ว</p>";
        } else {
            $query = "INSERT INTO watcher_user (username, surname, email, rank, branch, Pass) VALUES ('$name', '$surname', '$email', '$rank', '$branch', '$password')";
            if (!mysqli_query($conn, $query)){
                $error ="<p>ไม่สามารถลงทะเบียนได้โปรดลองอีกครั้ง</p>";
                }
                header("Location: Admin-Home-ID-H.php");  
                }
            }
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
        <header>ID : </header>
        <a href="Admin-Home-ID-H.php" class="backBtn">ย้อนกลับ</a>
        <div class="error" > <?php echo $error; ?></div>
    <form action="" method="POST">
        <div class="form first">
            <div class="details personal">
                <span class="title">เพิ่มบัญชีเยี่ยมชม</span>
                    <div class="fields">
                        <div class="input-field">
                            <label>ตำแหน่ง</label>
                            <select id="cars1" name="rankN" value="" required>
                            <option value="" selected>ตำแหน่ง</option>
                                <option value="อธิการบดี" >อธิการบดี</option>
                                <option value="รองอธิการบดี">รองอธิการบดี</option>
                                <option value="คณบดี">คณบดี</option>
                                <option value="ผู้ช่วยอธิการบดี" >ผู้ช่วยอธิการบดี</option>
                                <option value="รองคณบดี" >รองคณบดี</option>
                                <option value="ผู้อำนวยการสำนักงานอธิการบดี">ผู้อำนวยการสำนักงานอธิการบดี</option>
                                <option value="ศาสตราจารย์">ศาสตราจารย์</option>
                                <option value="รองศาสตราจารย์" >รองศาสตราจารย์</option>
                                <option value="ผู้ช่วยศาสตราจารย์" >ผู้ช่วยศาสตราจารย์</option>
                                <option value="อาจารย์">อาจารย์</option>
                            </select>
                        </div>
                        <div class="input-field">
                            <label>คณะ</label>
                            <select id="cars2" name="branchN" value="" required>
                            <option value="" selected>สาขา</option>
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
                            <input type="text" placeholder="ชื่อ" id="nameN" name="nameN" value="" required>
                        </div>
                        <div class="input-field">
                            <label>นามสกุล</label>
                            <input type="text" placeholder="นามสกุล" class="custom-file-input" id="surnameN" name="surnameN" value="" required>
                        </div>
                        <div class="input-field">
                            <label>Email</label>
                            <input type="email" placeholder="Email" id="emailN" name="emailN" value="" required>
                        </div>
                        <div class="input-field1">
                            <label>รหัสผ่าน(รหัสประจำตัว)</label>
                            <input type="text" placeholder="รหัสผ่าน" id="passwordN" name="passwordN" minlength="8" value="" required>
                        </div>
                        <div class="sumbit1">
                            <input class="backBtn3" type="submit" name="RegisterN" value="บันทึก">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
</html>