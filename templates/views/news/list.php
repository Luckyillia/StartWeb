<div class="container border border-primary bg-primary bg-opacity-10 border-3 rounded mx-auto p-2">
	<?php
        $sql = "SELECT * FROM news ORDER BY id ASC";
        $result = $db->query($sql);
        if ($result->num_rows > 0) {
             while ($row = $result->fetch_assoc()) {
                ?>
                <div>
                    <div>
                        <img src="<?php echo UPLOAD_PATH."\\".$row['news_filename']?>">
                    </div>
                    <div>
                        <h1><?php echo $row['news_title'] ?></h1>
                    </div>
                    <div>
                        <p><?php echo $row['news_content'] ?></p>
                    </div>
                    <div>
                        <p><?php echo $row['news_author'] ?></p>
                    </div> 
                </div>
                <?php
            }
        } else {
            echo "<div class='border border-info bg-info bg-opacity-10 text-center rounded'>Nie ma nic</div>";
        }
        ?>
</div>