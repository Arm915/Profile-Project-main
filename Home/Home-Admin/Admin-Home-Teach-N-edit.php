<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="Admin-Home-ALL-H&N.css" />
    <link rel="stylesheet" href="styles.css" >
    <script defer src="script.js"></script>
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <title>Document</title>
  </head>
  <body>
  <?php 
    include('DataRegister.php'); 
    include('DataLoRe.php'); 
  ?>
    <?php include('Admin-topbar.php'); ?>
    <?php include('Admin-sidebar.php'); ?>
      <div class="art">
      <h4 class="art_section">Administration : ตารางสอน</h4>
      <div class="timetable">
        <body>
          <div class="container">
            <div class="table-container">
                <table>
                  <thead>
                    <tr>
                      <th class="large1">จันทร์</th>
                      <th class="large1">อังคาร</th>
                      <th class="large1">พุธ</th>
                      <th class="large1">พฤหัสบดี</th>
                      <th class="large1">ศุกร์</th>
                      <th class="large1">เสาร์</th>
                      <th class="large1">อาทิตย์</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><a href="Admin-from-Teach.php" class="buttonT"></a></td>
                      <td><a href="Admin-from-Teach.php" class="buttonT"></a></td>
                      <td><a href="Admin-from-Teach.php" class="buttonT"></a></td>
                      <td><a href="Admin-from-Teach.php" class="buttonT"></a></td>
                      <td><a href="Admin-from-Teach.php" class="buttonT"></a></td>
                      <td><a href="Admin-from-Teach.php" class="buttonT"></a></td>
                      <td><a href="Admin-from-Teach.php" class="buttonT"></a></td>
                      <td class="large2">จำนวนชั่วโมงที่สอน :</td>
                      <td class="large2"></td>
                    </tr>
                    <tr>
                      <td><a href="Admin-from-Teach.php" class="buttonT"></a></td>
                      <td><a href="Admin-from-Teach.php" class="buttonT"></a></td>
                      <td><a href="Admin-from-Teach.php" class="buttonT"></a></td>
                      <td><a href="Admin-from-Teach.php" class="buttonT"></a></td>
                      <td><a href="Admin-from-Teach.php" class="buttonT"></a></td>
                      <td><a href="Admin-from-Teach.php" class="buttonT"></a></td>
                      <td><a href="Admin-from-Teach.php" class="buttonT"></a></td>
                      <td class="large2">:</td>
                      <td class="large2"></td>
                    </tr>
                    <tr>
                      <td><a href="Admin-from-Teach.php" class="buttonT"></a></td>
                      <td><a href="Admin-from-Teach.php" class="buttonT"></a></td>
                      <td><a href="Admin-from-Teach.php" class="buttonT"></a></td>
                      <td><a href="Admin-from-Teach.php" class="buttonT"></a></td>
                      <td><a href="Admin-from-Teach.php" class="buttonT"></a></td>
                      <td><a href="Admin-from-Teach.php" class="buttonT"></a></td>
                      <td><a href="Admin-from-Teach.php" class="buttonT"></a></td>
                      <td class="large2">จำนวนวิชาที่สอน :</td>
                      <td class="large2"></td>
                    </tr>
                    <tr>
                      <td><a href="Admin-from-Teach.php" class="buttonT"></a></td>
                      <td><a href="Admin-from-Teach.php" class="buttonT"></a></td>
                      <td><a href="Admin-from-Teach.php" class="buttonT"></a></td>
                      <td><a href="Admin-from-Teach.php" class="buttonT"></a></td>
                      <td><a href="Admin-from-Teach.php" class="buttonT"></a></td>
                      <td><a href="Admin-from-Teach.php" class="buttonT"></a></td>
                      <td><a href="Admin-from-Teach.php" class="buttonT"></a></td>
                      <td class="large2">:</td>
                      <td class="large2"></td>
                    </tr>
                  </tbody>
                </table>
            </div>
          </div>
        </body>
      </div>
        <h4 class="art_section">Administration : ผลงานทั้งหมด
        <div class="box1">
            <form name="search">
              <input type="search" class="input" name="txt" placeholder="ค้นหา..." onmouseout="this.value = ''; this.blur();">
              <a href="from.php" class="button1"><i class="bx bxs-chevrons-right right-arrow toggle2"></i></a>
            </form>
          </div>
        </h4>
        <table class="art_table">
          <thead class="art_thead">
            <tr class="a-t-h">
              <th>ชื่องาน</th>
              <th>รายละเอียด</th>
              <th>แก้ไข</th>
            </tr>
          </thead >
          <tbody class="art_tbody">
          <?php 
            if (isset($_SESSION['Id'])) {
              $Id = $_SESSION['Id'];
              $sql = "SELECT * FROM art WHERE Id_identity = '$Id'";
              $result = mysqli_query($conn, $sql);
              while($row = mysqli_fetch_array($result)){
          ?>
                <tr>
                  <td><?php echo $row['name']; ?></td>
                  <td><?php echo $row['file']; ?></td>
                  <td><?php echo $row['picture']; ?></td>
                  <td><?php echo $row['timestart']; ?></td>
                  <td><?php echo $row['timeend']; ?></td>
                  <td><?php echo $row['collect_alltime']; ?></td>
                  <td><?php echo $row['day']; ?></td>
                  <td><?php echo $row['score']; ?></td>
                  <td class="conbut2"><a href="from.php" class="button3">แก้ไข</a></td>
                </tr>
          <?php 
              }
            }
          ?>
          </tbody>
        </table>
      </div>
    </nav>
    
    <script src="Admin-Home.js"></script>

  </body>
</html>
