<?php
function displayTable($result) {

if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['user_name'] . "</td>";
                    echo "<td>" . $row['user_surname'] . "</td>";
                    echo "<td>" . $row['user_email'] . "</td>";
                    echo "<td>" . ($row['active'] ? '<i class="bi bi-check" style="font-size:20px;color:green;"></i>' : '<i class="bi bi-dash" style="color:red;"></i>') . "</td>";
                    echo "<td class=''><a class='btn btn-info' href='index.php?action=edit&id=".$row['id']."'>Edytuj</a></td>";
                    echo "<td class=''><a class='btn btn-danger' onclick='return confirm(\"Jestes pewny?\")' href='index.php?action=drop&id=".$row['id']. "'>Usun</a></td>";
                    echo "</tr>";
            }
            ?>
        </tbody>
    </table>

<?php
} else {
    echo "<div class='border border-info bg-info bg-opacity-10 text-center rounded'>Nie ma nic</div>";
}

}
?>