<?php
if (isset($_SESSION['message']['info']))
{
echo '<div class="alert alert-info" role="alert">' . $_SESSION['message']['info'] . '</div>';
}
if (isset($_SESSION['message']['warning']))
{
echo "<div class='alert alert-warning' role='alert'>" . $_SESSION['message']['warning'] . "</div>";
}
