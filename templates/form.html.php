<form class="row g-2" action="" method="post">
    <div class="col-md-12">
        <select class="form-control" name="room_id" required>
            <option value="">--- Wybierz Pokoj ---</option>
            <?php
            $sql = "SELECT * FROM pokoje ORDER BY id ASC";
            $result = $db->query($sql);
            displayTable($result);
            ?>
        </select>
    </div>
    <div class="col-md-8">
        <input class="form-control" type="text" name="name" placeholder="Wprowadź swoje imię" required />
    </div>
    <div class="buttons col-md-4">
        <button class="btn btn-primary w-100" type="submit" name="submit">Wyślij</button>
    </div>
</form>
