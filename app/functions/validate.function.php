<?php


$isError = false;
$msg = [];

$arrErrors = [
    'required' => 'Pole %s% jest wymagane!',
	'email' => 'Adres E-mail w polu %s% jest niepoprawny!'
];

function fieldRequired($fieldName, $fieldVal)
{
    global $isError, $msg, $arrErrors;
    if (empty($fieldVal))
    {
        $isError = true;
        $msg[] = str_replace('%s%', $fieldName, $arrErrors['required']);
    }
}

function isEmail($fieldName, $fieldVal) {
    global $isError, $msg, $arrErrors;
    if (!filter_var($fieldVal, FILTER_VALIDATE_EMAIL)) {
        $isError = true;
        $msg[] = str_replace('%s%', $fieldName, $arrErrors['email']);
    }
}

function displayErrors()
{
    global $isError, $msg;
    if($isError)
    {
        $html = '<div class="border border-danger bg-danger bg-opacity-10 rounded"><ul class="text-color-danger">';
        foreach ($msg as $m)
        {
            $html .= '<li>' . $m . '</li>';
        }

        $html .= "</ul></div>";
        echo $html;
    }
    else
    {
        return null;
    }
}
function displayTable($result) {

    if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['user_name'] . "</td>";
                        echo "<td>" . $row['user_surname'] . "</td>";
                        echo "<td>" . $row['user_email'] . "</td>";
                        echo "<td>" . $row['active'] . "</td>";
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