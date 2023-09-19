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
        <h4 class="art_section">ผลงานวิจัย
          <div class="box">
            <form name="search" method="GET" onsubmit="return validateSearchForm()">
              <input type="search" class="input" name="txt" id="searchInput" placeholder="ค้นหา..." value="<?php echo isset($_GET['txt']) ? $_GET['txt'] : ''; ?>">
              <button type="submit" class="button1"><i class="bx bxs-chevrons-right right-arrow toggle2"></i></button>
              <a href="N-from-Research.php" class="button2">เพิ่มข้อมูล</a>
            </form>
          </div>
        </h4>
        <table class="art_table">
          <thead class="art_thead">
            <tr class="a-t-h">
              <th>ชื่อผลงานวิจัย</th>
              <th>ปีที่ตีพิมพ์</th>
              <th>ไฟล์ผลงานวิจัย(PDF)</th>
              <th>ชื่อวารสารที่ตีพิมพ์(ถ้ามี)</th>
              <th>รูปหรือแผนภาพ(ถ้ามี)</th>
              <th>เอกสารทุน(ถ้ามี)</th>
              <th>รายละเอียดของงาน</th>
              <th class="conbut2">แก้ไข</th>
            </tr>
          </thead >
          <tbody class="art_tbody">
            <?php
            if (isset($_SESSION['Id'])) {
              $Id = $_SESSION['Id'];
              $sql = "SELECT * FROM research WHERE Id_identity = '$Id'";
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
                $sql .= " WHERE nameresearch LIKE '%$search_text%'";
              }
              
              while ($row = mysqli_fetch_array($result)) {
                if (isset($_GET['txt']) && $_GET['txt'] != '' && stripos($row['nameresearch'], $search_text) === false) {
                  continue; 
                }
                ?>
                <tr>
                  <td><?php echo $row['nameresearch']; ?></td>
                  <td><?php echo $row['day']; ?></td>
                  <td>
                    <a href="FilePDF/Research/researchfile/<?php echo $row['researchfile']; ?>" target="_blank"><?php echo $row['researchfile']; ?></a>
                  </td>
                  <td><?php echo $row['Journalname']; ?></td>
                  <td>
                    <a href="FilePDF/Research/picturediagram/<?php echo $row['picturediagram']; ?>" target="_blank"><?php echo $row['picturediagram']; ?></a>
                  </td>
                  <td>
                    <a href="FilePDF/Research/capitaldocuments/<?php echo $row['capitaldocuments']; ?>" target="_blank"><?php echo $row['capitaldocuments']; ?></a>
                  </td>
                  <td><?php echo $row['description']; ?></td>
                  <td class="conbut2">
                    <a href="N-from-Research-edit.php?id=<?php echo  $row['id']; ?>" class="button3">แก้ไข</a>
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
    
    <script src="Home.js"></script>
    

  </body>
</html>