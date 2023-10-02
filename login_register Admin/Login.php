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
                <header class="h-txt">สมัคสมาชิค</header>
                <form action="#" method="POST">
                <div class="error"> <?php echo $error; ?></div>
                    <div class="inputcombo">
                        <select id="cars1" name="rank">
                            <option value="volvo" selected>ตำแหน่ง</option>
                            <option value="saab">Saab</option>
                            <option value="vw">VW</option>
                            <option value="audi" >ตำแหน่ง</option>
                        </select>
                        <select id="cars2" name="branch">
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
                    <div class="field input-field">
                        <input type="username" placeholder="ชื่อจริง" class="input" name="name" required>
                    </div>
                    <div class="field input-field">
                        <input type="surname" placeholder="นามสกุล" class="input" name="surname" required>
                    </div>
                    <div class="field input-field">
                        <input type="email" placeholder="Email" class="input" name="email" required>
                    </div>

                    <div class="field input-field">
                        <input type="password" placeholder="Create password" class="password" name="password" required>
                    </div>

                    <div class="field input-field">
                        <input type="password" placeholder="Confirm password" class="password" name="Cpassword" required>
                        <i class='bx bx-hide eye-icon'></i>
                    </div>

                    <div class="field">
                        <input class="button-field" type="submit" name="Register" value="ลงชื่อ">
                    </div>
                </form>

                <div class="form-link">
                    <span>เข้าสู่ระบบ<a href="#" class="link login-link">คลิก</a></span>
                </div>
            </div>
        </div>
    </section>

    <script src="lo_re.js"></script>

</body>
</html>

