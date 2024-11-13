<?php
function displayTable($result) {

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row["id"] . "'>" . $row["pokoj"] . "</option>";
        }
    } else {
        echo "<option>No results found</option>";
    }
}
?>