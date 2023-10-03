<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="N-Home-ALL-H&N.css">
  <link rel="stylesheet" href="styles.css">
  <script defer src="script.js"></script>
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
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
        <form name="search" method="GET">
          <input type="search" class="input" name="txt" placeholder="ค้นหา...">
          <button type="submit" class="button1"><i class="bx bxs-chevrons-right right-arrow toggle2"></i></button>
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
      </thead>
      <tbody class="art_tbody">
        <?php
        // จำนวนรายการต่อหน้า
        $recordsPerPage = 10;

        // หน้าปัจจุบันที่ต้องการแสดงผล
        $page = isset($_GET['page']) ? intval($_GET['page']) : 1;

        // ตำแหน่งเริ่มต้นในการดึงข้อมูล
        $offset = ($page - 1) * $recordsPerPage;

        $sql = "SELECT * FROM art_service";
        $result = mysqli_query($conn, $sql);

        if (isset($_GET['txt']) && $_GET['txt'] != '') {
          $search_text = $_GET['txt'];
          $sql .= " WHERE name_art LIKE '%$search_text%'";
        }

        $totalRecords = mysqli_num_rows($result);
        $totalPages = ceil($totalRecords / $recordsPerPage);

        $prevPage = $page - 1;
        $nextPage = $page + 1;
        $prevPage = ($prevPage < 1) ? 1 : $prevPage;
        $nextPage = ($nextPage > $totalPages) ? $totalPages : $nextPage;

        $sql .= " LIMIT $offset, $recordsPerPage";
        $result = mysqli_query($conn, $sql);

        echo '<table>';
        while ($row = mysqli_fetch_assoc($result)) {
          // แสดงข้อมูลในตาราง
          echo '<tr>';
          echo '<td>' . $row['name_art'] . '</td>';
          echo '<td><a href="FilePDF/art_service/performance_art_service/' . $row['performance_art'] . '" target="_blank">' . $row['performance_art'] . '</a></td>';
          echo '<td>' . $row['daystart'] . '</td>';
          echo '<td>' . $row['dayend'] . '</td>';
          echo '<td>' . $row['hour'] . '</td>';
          echo '<td>' . $row['score'] . '</td>';
          echo '<td>' . $row['description'] . '</td>';
          echo '<td class="conbut2"><a href="N-from-Art&service-edit.php?id=' . $row['id'] . '" class="button3">แก้ไข</a></td>';
          echo '</tr>';
        }
        echo '</table>';

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
  </div>
</body>

</html>