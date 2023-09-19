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
        <h4 class="art_section">Administration : ผลงานวิจัย
        <div class="box1">
            <form name="search" method="GET" onsubmit="return validateSearchForm()">
              <input type="search" class="input" name="txt" id="searchInput" placeholder="ค้นหา..." value="<?php echo isset($_GET['txt']) ? $_GET['txt'] : ''; ?>">
              <button type="submit" class="button1"><i class="bx bxs-chevrons-right right-arrow toggle2"></i></button>
            </form>
          </div>
        </h4>
        <table class="art_table">
          <thead class="art_thead">
            <tr class="a-t-h">
              <th>ชื่อผู้ใช้</th>
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
          $Id - isset($_SESSION['id']) ;

          // จำนวนรายการต่อหน้า
          $recordsPerPage = 10; 

          // หน้าปัจจุบันที่ต้องการแสดงผล
          $page = isset($_GET['page']) ? intval($_GET['page']) : 1; 

          // ตำแหน่งเริ่มต้นในการดึงข้อมูล
          $offset = ($page - 1) * $recordsPerPage; 
          
          $sql1 = "SELECT * FROM research";
          $result1 = mysqli_query($conn, $sql1);

          $sql2 = "SELECT * FROM regis";
          $result2 = mysqli_query($conn, $sql2);
          if (isset($_GET['txt']) && $_GET['txt'] != '') {
              $search_text = $_GET['txt'];
              $sql2 .= " WHERE username LIKE '%$search_text%'";
              $result2 = mysqli_query($conn, $sql2);
          }
          if (mysqli_num_rows($result1) > 0 && mysqli_num_rows($result2) > 0) {
              // จำนวนรายการทั้งหมด
              $totalRecords = mysqli_num_rows($result1); 
              // จำนวนหน้าทั้งหมด
              $totalPages = ceil($totalRecords / $recordsPerPage); 

              // กำหนดตัวแปร GET 'page' สำหรับตัวคลิกไปยังหน้าต่างๆ
              $prevPage = $page - 1;
              $nextPage = $page + 1;
              $prevPage = ($prevPage < 1) ? 1 : $prevPage;
              $nextPage = ($nextPage > $totalPages) ? $totalPages : $nextPage;

              $sql1 .= " LIMIT $offset, $recordsPerPage";
              $result1 = mysqli_query($conn, $sql1);

              while ($row1 = mysqli_fetch_assoc($result1)) {
                  $id_identity = $row1['Id_identity'];
                  $found = false;
                  while ($row2 = mysqli_fetch_assoc($result2)) {
                      $id = $row2['Id'];
                      if ($id_identity == $id) {
                          $found = true;
                          if (isset($_GET['txt']) && $_GET['txt'] != '' && stripos($row2['username'], $search_text) === false) {
                              continue;
                          }
                          ?>
                          <tr>
                              <td><?php echo $row2['username']; ?></td>
                              <td><?php echo $row1['nameresearch']; ?></td>
                              <td><?php echo $row1['day']; ?></td>
                              <td>
                                <a href="..\Home-UserN\FilePDF\Research\researchfile/<?php echo $row1['researchfile']; ?>" target="_blank"><?php echo $row1['researchfile']; ?></a>
                              </td>
                              <td><?php echo $row1['Journalname']; ?></td>
                              <td>
                                <a href="..\Home-UserN\FilePDF\Research\picturediagram/<?php echo $row1['picturediagram']; ?>" target="_blank"><?php echo $row1['picturediagram']; ?></a>
                              </td>
                              <td>
                                <a href="..\Home-UserN\FilePDF\Research\capitaldocuments/<?php echo $row1['capitaldocuments']; ?>" target="_blank"><?php echo $row1['capitaldocuments']; ?></a>
                              </td>
                              <td><?php echo $row1['description']; ?></td>
                              <th class="conbut2"><a href="Admin-from-Research-edit.php?id=<?php echo $row1['id']; ?>" class="button3">ดู</a></th>
                          </tr>
                          <?php
                          break;
                      }
                  }
                  mysqli_data_seek($result2, 0);
                  if (!$found) {
                  }
              }
              // แสดงลิงก์สำหรับเปลี่ยนหน้า
              echo '<div class="pagination">';
              echo '<a href="?page=1">&laquo; First</a>';
              echo '<a href="?page=' . $prevPage . '">&lt; Prev</a>';
              for ($i = max(1, $page - 5); $i <= min($page + 5, $totalPages); $i++) {
                  echo '<a href="?page=' . $i . '">' . $i . '</a>';
              }
              echo '<a href="?page=' . $nextPage . '">Next &gt;</a>';
              echo '<a href="?page=' . $totalPages . '">Last &raquo;</a>';
              echo '</div>';
          }
          ?>
          </tbody>
        </table>
      </div>
    </nav>
    
    <script src="Home.js"></script>

  </body>
</html>
