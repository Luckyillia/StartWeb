<div class="container">
	<?php
        $sql = "SELECT * FROM news ORDER BY id ASC";
        $result = $db->query($sql);
        if ($result->num_rows > 0) {
             while ($row = $result->fetch_assoc()) {
                $filePath = UPLOAD_PATH . DIRECTORY_SEPARATOR . $row['news_filename'];
                $imagePath = file_exists($filePath) ? $row['news_filename'] : 'default_img.png';
                ?>
                <div class="border border-primary bg-primary bg-opacity-10 border-3 rounded mx-auto p-2 m-3">
                    <div class="text-center">
                        <img src="<?php echo BASE_URL . 'upload/' . $imagePath; ?>" alt="News Image" class="d-block mx-lg-auto img-fluid rounded" width="700" height="500">
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
                    <div class="">
                        <a class='btn btn-primary' href='<?php echo BASE_URL; ?>?page=news&action=edit&id=<?php echo $row['id']; ?>'>Edytuj</a>
                        <a class='btn btn-danger' onclick='return confirm("Jestes pewny")' href='<?php echo BASE_URL; ?>?page=news&action=drop&id=<?php echo $row['id']; ?>'>Usun</a>
                    </div> 
                </div>
                <?php
            }
        } else {
            echo "<div class='border border-info bg-info bg-opacity-10 text-center rounded'>Nie ma nic</div>";
        }
        ?>
</div>
