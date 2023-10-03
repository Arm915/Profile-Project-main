<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="N-Home-ALL-H&N.css" />
  <link rel="stylesheet" href="styles.css">
  <script defer src="script.js"></script>
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
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
      </thead>
      <tbody class="art_tbody">
        <?php
        if (isset($_SESSION['Id'])) {
          $Id = $_SESSION['Id'];
          $sql = "SELECT * FROM research WHERE Id_identity = '$Id'";
          $result = mysqli_query($conn, $sql);

          // จำนวนรายการต่อหน้า
          $recordsPerPage = 10;

          // หน้าปัจจุบันที่ต้องการแสดงผล
          $page = isset($_GET['page']) ? intval($_GET['page']) : 1;

          // คำนวณตำแหน่งเริ่มต้นในการดึงข้อมูล
          $offset = ($page - 1) * $recordsPerPage;

          // เพิ่มเงื่อนไขค้นหาถ้ามีการส่งคำค้นหามา
          if (isset($_GET['txt']) && $_GET['txt'] != '') {
            $search_text = $_GET['txt'];
            $sql .= " AND nameresearch LIKE '%$search_text%'";
          }

          $totalItems = mysqli_num_rows($result);
          $totalPages = ceil($totalItems / $recordsPerPage);

          // คำนวณแถวเริ่มต้นและแถวสุดท้ายสำหรับหน้าปัจจุบัน
          $start_row = ($page - 1) * $recordsPerPage;
          $end_row = $start_row + $recordsPerPage;

          // ดึงข้อมูลจากฐานข้อมูลสำหรับหน้าปัจจุบัน
          $sql .= " LIMIT $start_row, $recordsPerPage";
          $result = mysqli_query($conn, $sql);

          echo '<table>';
          while ($row = mysqli_fetch_array($result)) {
            // แสดงข้อมูลในตาราง
            echo '<tr>';
            echo '<td>' . $row['nameresearch'] . '</td>';
            echo '<td>' . $row['day'] . '</td>';
            echo '<td><a href="FilePDF/Research/researchfile/' . $row['researchfile'] . '" target="_blank">' . $row['researchfile'] . '</a></td>';
            echo '<td>' . $row['Journalname'] . '</td>';
            echo '<td><a href="FilePDF/Research/picturediagram/' . $row['picturediagram'] . '" target="_blank">' . $row['picturediagram'] . '</a></td>';
            echo '<td><a href="FilePDF/Research/capitaldocuments/' . $row['capitaldocuments'] . '" target="_blank">' . $row['capitaldocuments'] . '</a></td>';
            echo '<td>' . $row['description'] . '</td>';
            echo '<td class="conbut2"><a href="N-from-Research-edit.php?id=' . $row['id'] . '" class="button3">แก้ไข</a></td>';
            echo '</tr>';
          }
          echo '</table>';

          // แสดงลิงก์สำหรับเปลี่ยนหน้า
          echo '<div class="pagination">';
          echo '<a href="?page=1">&laquo; First</a>';
          echo '<a href="?page=' . ($page - 1) . '">&lt; Prev</a>';
          for ($i = max(1, $page - 5); $i <= min($page + 5, $totalPages); $i++) {
            echo '<a href="?page=' . $i . '">' . $i . '</a>';
          }
          echo '<a href="?page=' . ($page + 1) . '">Next &gt;</a>';
          echo '<a href="?page=' . $totalPages . '">Last &raquo;</a>';
          echo '</div>';
        }
        ?>

  </div>

  <script src="Home.js"></script>


</body>

</html>