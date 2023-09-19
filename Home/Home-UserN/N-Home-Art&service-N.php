<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="N-Home-ALL-H&N.css" />
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
    <?php include('N-topbar.php'); ?>
    <?php include('N-sidebar.php'); ?>
      <div class="art">
        <h4 class="art_section">ศิลปะวัฒนะธรรม&บริการวิชาการ
        <div class="box">
            <form name="search">
              <input type="search" class="input" name="txt" placeholder="ค้นหา..." onmouseout="this.value = ''; this.blur();">
              <a href="from.php" class="button1"><i class="bx bxs-chevrons-right right-arrow toggle2"></i></a>
              <a href="N-from-Art&service.php" class="button2">เพิ่มข้อมูล</a>
            </form>
          </div>
        </h4>
        <table class="art_table">
          <thead class="art_thead">
            <tr class="a-t-h">
              <th>ชื่องาน</th>
              <th>ไฟล์PDF</th>
              <th>วันที่เริ่ม</th>
              <th>วันที่จบ</th>
              <th>จำนวนชั่วโมง</th>
              <th>คะแนนที่ได้รับ</th>
              <th>รายละเอียดของงาน</th>
              <th class="conbut2">แก้ไข</th>
            </tr>
          </thead >
          <tbody class="art_tbody">
          <?php 
            if (isset($_SESSION['Id'])) {
              $Id = $_SESSION['Id'];
              $sql = "SELECT * FROM art_service WHERE Id_identity = '$Id'";
              $result = mysqli_query($conn, $sql);
              //ตรวจสอบหน้าปัจจุบันที่กำหนด
              $page = isset($_GET['page']) ? $_GET['page'] : 1;
              $items_per_page = 10;
              $total_items = mysqli_num_rows($result);
              $total_pages = ceil($total_items / $items_per_page);

              //คำนวณแถวเริ่มต้นและแถวสุดท้ายสำหรับหน้าปัจจุบัน
              $start_row = ($page - 1) * $items_per_page;
              $end_row = $start_row + $items_per_page;

              //ดึงข้อมูลจากฐานข้อมูลสำหรับหน้าปัจจุบัน
              $sql .= " LIMIT $start_row, $items_per_page";
              $result = mysqli_query($conn, $sql);

              //ข้อมูลที่นำมาแสดง
              if (isset($_GET['txt']) && $_GET['txt'] != '') {
                $search_text = $_GET['txt'];
              
                // ค้นหาข้อมูลที่ตรงกับคำค้นหา
                $sql .= " WHERE name_art LIKE '%$search_text%'";
              }
              
              while ($row = mysqli_fetch_array($result)) {
                if (isset($_GET['txt']) && $_GET['txt'] != '' && stripos($row['name_art'], $search_text) === false) {
                  continue; 
                }
                ?>
                <tr>
                  <td><?php echo $row['name_art']; ?></td>
                  <td>
                    <a href="FilePDF/art_service/performance_art_service/<?php echo $row['performance_art']; ?>" target="_blank"><?php echo $row['performance_art']; ?></a>
                  </td>
                  <td><?php echo $row['daystart']; ?></td>
                  <td><?php echo $row['dayend']; ?></td>
                  <td><?php echo $row['hour']; ?></td>
                  <td><?php echo $row['score']; ?></td>
                  <td><?php echo $row['description']; ?></td>
                  <td class="conbut2">
                    <a href="N-from-Art&service-edit.php?id=<?php echo  $row['id']; ?>" class="button3">แก้ไข</a>
                  </td>
                </tr>
              <?php 
              }
            }
            ?>
          </tbody>
        </table>
        <?php
        //กำหนดไปหน้าต่างๆ
        $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
        $itemsPerPage = 10; 
        if (isset($_SESSION['Id'])) {
          $Id = $_SESSION['Id'];
          $sql = "SELECT COUNT(*) AS total FROM research WHERE Id_identity = '$Id'";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          $totalItems = $row['total'];}
          $totalPages = ceil($totalItems / $itemsPerPage); 
          $currentPage = max(1, min($currentPage, $totalPages));
          $startPage = max(1, $currentPage - 5); 
          $endPage = min($startPage + 9, $totalPages); 

        echo '<div class="pagination-container">';
        echo '<div class="pagination">';
        if ($startPage > 1) {
          echo '<a href="?page=1">1</a> '; 
          echo '<span >...</span> '; 
        }
        for ($i = $startPage; $i <= $endPage; $i++) {
          echo '<li' . ($i == $currentPage ? ' class="active"' : '') . '><a href="?page=' . $i . '"><span class="pagination-number">' . $i . '</span></a></li>';
        }
        if ($endPage < $totalPages) {
          echo '<span>...</span> '; 
          echo '<a href="?page=' . $totalPages . '">' . $totalPages . '</a> ';
        }
        echo '</div>';
        echo '<a class="pagination bottom-link" href="?page=1">กลับไปหน้าแรก</a>';
        echo '</div>';
        ?>
      </div>
    </nav>
    
    <script src="Home.js"></script>

  </body>
</html>