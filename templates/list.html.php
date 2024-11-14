<div class="container border border-info bg-info bg-opacity-10 border-3 p-2 rounded">
    <h1 style='text-align:center;'>Lista Uzytkownikow</h1>
    <table class="table border-info">
        <thead>
            <tr>
                <th>ID</th>
                <th>Imie</th>
                <th>Nazwisko</th>
                <th>Email</th>
                <th>User_active</th>
                <th>Edytowac</th>
                <th>Usun</th>
            </tr>
        </thead>
    <tbody>
    <?php 
    $sql = "SELECT * FROM users ORDER BY id ASC";
    $result = $db->query($sql);
    displayTable($result); 
    ?>
    <a class="btn btn-warning" href="<?php echo BASE_URL; ?>">Powrót</a>
</div>