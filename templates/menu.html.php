<?php 
include('./menu.php');
echo "<ul class='navbar-nav me-auto mb-2 mb-lg-0'>";
foreach($menu as $el){
    echo "<li class='nav-item'><a class='nav-link' href='index.php?page=".$el['page']."'>".$el['name']."</a></li>";
}
echo "</ul>";