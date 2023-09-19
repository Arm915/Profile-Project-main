<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="H-Home-ALL-H&N.css" />
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
    <?php include('H-topbar.php'); ?>
    <?php include('H-sidebar.php'); ?>
      <div class="art">
      <h4 class="art_section">The Watcher : ตารางสอน</h4>
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
                    <?php
                    if (isset($_SESSION['Id'])) {
                        $Id = $_SESSION['Id'];
                        $sql = "SELECT * FROM teach WHERE Id_identity = '$Id' ORDER BY day";
                        $result = mysqli_query($conn, $sql);
                        $days = array('mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sun');
                        $data_by_day = array();
                        while ($row = mysqli_fetch_array($result)) {
                            $data_by_day[$row['day']][] = $row;
                        }
                        $maxRows = 0;
                        foreach ($days as $day) {
                            if (isset($data_by_day[$day])) {
                                $numRows = count($data_by_day[$day]);
                                if ($numRows > $maxRows) {
                                    $maxRows = $numRows;
                                }
                            }
                        }
                        // สร้างแถวและแสดงข้อมูล
                        for ($i = 0; $i < $maxRows; $i++) {
                            echo '<tr>';
                            foreach ($days as $day) {
                                if (isset($data_by_day[$day][$i])) {
                                    $data = $data_by_day[$day][$i];
                                    echo '<td><a href="H-from-Teach.php' . $day . '&id=' . $data['id'] . '" class="buttonT"><span>' . $data['subject_name'] . '</span></a></td>';
                                } else {
                                    echo '<td></td>';
                                }
                            }
                            echo '</tr>';
                        }
                    }
                    ?>
                    </tr>
                  </tbody>
                </table>
            </div>
          </div>
        </body>
      </div>
          </tbody>
        </table>
      </div>
    </nav>
    
    <script src="Admin-Home.js"></script>

  </body>
</html>
