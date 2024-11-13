<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = trim($_POST['name']);
    $room_id = $_POST['room_id'];

    $sql = "SELECT * FROM users WHERE name = '$name' AND id_pokoj = $room_id";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        $error = "Użytkownik o imieniu $name jest już zalogowany w tym pokoju.";
    } else {
        $sql = "INSERT INTO users (name, id_pokoj) VALUES ('$name', $room_id)";
        $_SESSION['name'] = $name;
        $_SESSION['id_pokoj'] = $room_id;
        if ($db->query($sql) === TRUE) {
            header("Location: ?page=index&action=chat");
            exit;
        } else {
            $error = "Wystąpił błąd podczas logowania. Spróbuj ponownie.";
        }
    }
}
?>