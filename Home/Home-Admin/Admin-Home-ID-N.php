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
        <h4 class="art_section">Administration : บัญชีทั่วไป
          <div class="box">
            <form name="search">
              <form name="search" method="GET" onsubmit="return validateSearchForm()">
              <input type="search" class="input" name="txt" id="searchInput" placeholder="ค้นหา..." value="<?php echo isset($_GET['txt']) ? $_GET['txt'] : ''; ?>">
              <button type="submit" class="button1"><i class="bx bxs-chevrons-right right-arrow toggle2"></i></button>
              <a href="Admin-from-Login-N.php" class="button2">เพิ่มข้อมูล</a>
            </form>
          </div>
        </h4>
        <table class="art_table">
          <thead class="art_thead">
            <tr class="a-t-h">
              <th>ชื่อเจ้าของรหัส</th>
              <th>นามสกุล</th>
              <th>อีเมล</th>
              <th>ตำแหน่ง</th>
              <th>สาขา</th>
              <th>รหัสผ่าน</th>
              <th class="conbut1">แก้ไข</th>
            </tr>
          </thead >
          <tbody class="art_tbody">
          <?php
          // จำนวนรายการต่อหน้า
          $recordsPerPage = 10; 

          // หน้าปัจจุบันที่ต้องการแสดงผล
          $page = isset($_GET['page']) ? intval($_GET['page']) : 1; 

          // ตำแหน่งเริ่มต้นในการดึงข้อมูล
          $offset = ($page - 1) * $recordsPerPage; 

          $sql2 = "SELECT * FROM regis";
          $result2 = mysqli_query($conn, $sql2);
          if (isset($_GET['txt']) && $_GET['txt'] != '') {
              $search_text = $_GET['txt'];
              $sql2 .= " WHERE username LIKE '%$search_text%'";
              $result2 = mysqli_query($conn, $sql2);
          }
              // จำนวนรายการทั้งหมด
            $totalRecords = mysqli_num_rows($result2); 
              // จำนวนหน้าทั้งหมด
            $totalPages = ceil($totalRecords / $recordsPerPage); 

              // กำหนดตัวแปร GET 'page' สำหรับตัวคลิกไปยังหน้าต่างๆ
              $prevPage = $page - 1;
              $nextPage = $page + 1;
              $prevPage = ($prevPage < 1) ? 1 : $prevPage;
              $nextPage = ($nextPage > $totalPages) ? $totalPages : $nextPage;

              $sql2 .= " LIMIT $offset, $recordsPerPage";
              $result2 = mysqli_query($conn, $sql2);

                  while ($row2 = mysqli_fetch_assoc($result2)) {
                          if (isset($_GET['txt']) && $_GET['txt'] != '' && stripos($row2['username'], $search_text) === false) {
                              continue;
                          }
                          ?>
                          <tr>
                              <td><?php echo $row2['username']; ?></td>
                              <td><?php echo $row2['surname']; ?></td>
                              <td><?php echo $row2['email']; ?></td>
                              <td><?php echo $row2['rank']; ?></td>
                              <td><?php echo $row2['branch']; ?></td>
                              <td><?php echo $row2['Pass']; ?></td>
                              <td class="conbut2"><a href="Admin-from-Login-edit-N.php?id=<?php echo $row2['Id']; ?>" class="button3">แก้ไข</a></td>
                          </tr>
                          <?php
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
          
          ?>
          </tbody>
        </table>
      </div>
    </nav>
    <script src="Admin-Home.js"></script>
  </body>
</html>
