<?php
$user_name = $_SESSION['name'];
$id_pokoj = $_SESSION['id_pokoj'];

$sql = "SELECT * FROM pokoje WHERE id = $id_pokoj";
$result = $db->query($sql);

if ($result) {
    $room_name = $result->fetch_assoc();
} else {
    echo "Błąd zapytania: " . $db->error;
}

$messages = [];
$sql = "SELECT user, message FROM messages WHERE id_pokoj = $id_pokoj";
$result = $db->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $messages[] = $row;
    }
}

$users = [];
$sql = "SELECT name FROM users WHERE id_pokoj = $id_pokoj";
$result = $db->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $users[] = $row['name'];
    }
}
