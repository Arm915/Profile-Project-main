<nav class="content">
    <div class="top_bar">
            <div>
                <?php 
                if (isset($_SESSION['Id'])) {
                    $Id = $_SESSION['Id'];
                    $sql = "SELECT * FROM watcher_user WHERE Id = '$Id'";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_array($result)){
                ?>
                    <h1 class="Name">ชื่อ <?php echo $row['username']; ?> นามสกุล <?php echo $row['surname']; ?></h1>
                    <h1 class="Branch">ตำแหน่ง <?php echo $row['rank']; ?> สาขา <?php echo $row['branch']; ?></h1>
                <?php 
                    }
                }
                ?>
        </div>
    </div>
</nav>