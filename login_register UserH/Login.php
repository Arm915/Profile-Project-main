<?php 

include('DataRegister.php'); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Logina.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
                    
</head>
<body>
    <section class="container forms">
        <div class="form login">
            <div class="form-content">
                <div class="logo">
                    <img src="a/logo.png" alt="">
                </div>
                <header class="h-txt">ลงชื่อเข้าใช้</header>
                <form action="#" method="POST">
                <div class="error"> <?php echo $error2; ?></div>
                    <div class="field input-field">
                        <input type="email" placeholder="Email" class="input" name="email" required>
                    </div>
                    <div class="field input-field">
                        <input type="password" placeholder="Password" class="password" name="password" required>
                        <i class='bx bx-hide eye-icon'></i>
                    </div>
                    
                    <div class="field">
                    <input class="button-field" type="submit" value="เข้าสู่ระบบ" name="login">
                    </div>
                    
                </form>
                <div class="form-link">
                    <span>ไม่มีรหัสผ่าน <a href="#" class="link signup-link">คลิก</a></span>
                </div>
            </div>
        </div>
        
        <div class="form signup">
            <div class="form-content">
                <div class="logo">
                    <img src="a/logo.png" alt="">
                </div>
                <header class="h-txt">ติดต่อ</header>
                <h4 class="h-txt">เบอร์ : 0925039981</h4>
                <h4 class="h-txt">Email : arm_915hotmail.co.th</h4>
                <div class="form-link">
                    <span>เข้าสู่ระบบ <a href="#" class="link login-link">คลิก</a></span>
                </div>
            </div>
        </div>
    </section>

    <script src="lo_re.js"></script>

</body>
</html>

