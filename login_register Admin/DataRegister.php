<?php 
session_start();

$error = "";
if (array_key_exists("Register", $_POST)) {

include('DataLoRe.php');  

$name = mysqli_real_escape_string($conn, $_POST['name']);
$surname = mysqli_real_escape_string($conn, $_POST['surname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$rank = mysqli_real_escape_string($conn, $_POST['rank']);
$branch = mysqli_real_escape_string($conn, $_POST['branch']);
$password = mysqli_real_escape_string($conn,  $_POST['password']); 
$Cpassword = mysqli_real_escape_string($conn, $_POST['Cpassword']); 


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
    } elseif (strlen($password) < 8) {
    $error .= "รหัสผ่านต้องมีอย่างน้อย 8 เลข <br>";
    }
    if ($error) {
    $error = "<br> ไม่สามารถสมัคได้เนื่องจาก <br>".$error;
    }  else {
    
        $query = "SELECT id FROM logadmin WHERE email = '$email'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            $error .="<p>มีอีเมลนี้ในระบบแล้ว</p>";
        } else {
            $query = "INSERT INTO logadmin (username, surname, email, rank, branch, Pass) VALUES ('$name', '$surname', '$email', '$rank', '$branch', '$password')";
            if (!mysqli_query($conn, $query)){
                $error ="<p>ไม่สามารถลงทะเบียนได้โปรดลองอีกครั้ง</p>";
                } else {
                $_SESSION['Id'] = mysqli_insert_id($conn);  
                $_SESSION['name'] = $name;
                if ($_POST['stayLoggedIn'] == '1') {
                setcookie('Id', mysqli_insert_id($conn), time() + 60*60*365);
                }
                header("Location: http://localhost/Profile-Project-main/Home/Home-Admin/Admin-Home-Teach-N.php");  
                }
            }
        }  
    }


$error2 = "";
if (array_key_exists("login", $_POST)) {

    include('DataLoRe.php');  
    
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn,  $_POST['password']); 
        
        if (!$email) {
            $error2 .= "ต้องใส่อีเมล <br>";
        }
        if (!$password) {
            $error2 .= "ต้องใส่พาสเวิส <br>";
        } 
        if ($error2) {
            $error2 = "<b>ไม่สามารถเข้าได้เนื้องจาก<br>".$error2;
        }
        
        else {        
            
            $query = "SELECT * FROM logadmin WHERE email='$email'";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_array($result);
            
            if (isset($row)) {
                    
                if ($password == $row['Pass']) {
    
                    $_SESSION['Id'] = $row['Id'];  
    
                    if ($_POST['stayLoggedIn'] == '1') {
                    setcookie('Id', $row['Id'], time() + 60*60*24);
                    }
    
                    header("Location: http://localhost/Profile-Project-main/Home/Home-Admin/Admin-Home-Teach-N.php");
    
                } else {
                    $error2 = "อีเมลหรือรหัสผ่านไม่ถูกต้อง";
                        }
    
            }  else {
                $error2 = "อีเมลหรือรหัสผ่านไม่ถูกต้อง";
                    }
        }
}
?>
