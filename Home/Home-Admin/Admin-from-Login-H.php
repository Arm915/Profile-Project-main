<?php 

include('DataRegister.php'); 

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
    <form action="" method="POST">
        <div class="form first">
            <div class="details personal">
                <span class="title">เพิ่มบัญชีเยี่ยมชม</span>
                <div class="fields">
                        <div class="input-field">
                            <label>ตำแหน่ง</label>
                            <select id="cars1" name="rankN" value="" required>
                                <option value="volvo" selected>ตำแหน่ง</option>
                                <option value="saab">Saab</option>
                                <option value="vw">VW</option>
                                <option value="audi" >ตำแหน่ง</option>
                            </select>
                        </div>
                        <div class="input-field">
                            <label>คณะ</label>
                            <select id="cars2" name="branchN" value="" required>
                                <option value="volvo" selected>สาขา</option>
                                <option value="saab">Saab</option>
                                <option value="vw">VW</option>
                                <option value="audi" >คณะ</option>
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
                            <input type="text" placeholder="Email" id="emailN" name="emailN" value="" required>
                        </div>
                        <div class="input-field1">
                            <label>รหัสผ่าน</label>
                            <input type="text" placeholder="รหัสผ่าน" id="passwordN" name="passwordN" value="" required>
                        </div>
                        <div class="sumbit1">
                            <input class="backBtn3" type="submit" name="RegisterN" value="บันทึกการแก้ไข">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
</html>


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
    if ($error) {
    $error = "<br> ไม่สามารถสมัคได้เนื่องจาก <br>".$error;
    }  else {
    
        $query = "SELECT id FROM watcher_user WHERE email = '$email'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            $error .="<p>มีอีเมลนี้ในระบบแล้ว</p>";
        } else {
            $query = "INSERT INTO watcher_user (username, surname, email, rank, branch, Pass) VALUES ('$name', '$surname', '$email', '$rank', '$branch', '$password')";
            if (!mysqli_query($conn, $query)){
                $error ="<p>ไม่สามารถลงทะเบียนได้โปรดลองอีกครั้ง</p>";
                } else {
                $_SESSION['Id'] = mysqli_insert_id($conn);  
                $_SESSION['name'] = $name;
                }
                header("Location: Admin-Home-ID-H.php");  
                }
            }
        }  
    
?>