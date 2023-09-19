<?php 
session_start();

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
            
            $query = "SELECT * FROM watcher_user WHERE email='$email'";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_array($result);
            
            if (isset($row)) {
                    
                if (($password == $row['Pass'])) {
    
                    $_SESSION['Id'] = $row['Id'];  
    
                    if ($_POST['stayLoggedIn'] == '1') {
                    setcookie('Id', $row['Id'], time() + 60*60*24);
                    }
    
                    header("Location: http://localhost/Profile-Project-main/Home/Home-UserH/H-Home-Teach-N.php");
    
                } else {
                    $error2 = "อีเมลหรือรหัสผ่านไม่ถูกต้อง";
                        }
    
            }  else {
                $error2 = "อีเมลหรือรหัสผ่านไม่ถูกต้อง";
                    }
        }
}
?>
