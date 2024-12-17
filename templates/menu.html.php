<?php 
include('./menu.php');
echo "<ul class='navbar-nav me-auto mb-2 mb-lg-0'>";
foreach($menu as $el){
    if(isset($el['action']) && is_array($el['action'])){?>
        <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="?page=<?php echo $element['page']; ?>" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <?php echo $el['name']; ?> </a>
                <ul class="dropdown-menu">
                    <?php
                    foreach($el['action'] as $action){?>
                    <li>
                        <a class="nav-link" href="index.php?page=<?php echo $el['page']; ?>&action=<?php echo $action['action']; ?>"><?php echo $action['title']; ?></a>
                    </li>
                
                 <?php 
                } ?> 
                </ul> 
        <?php
    }else{
        echo "<li class='nav-item'>
                <a class='nav-link' href='index.php?page=".$el['page']."'>".$el['name']."</a>
            </li>";
    }
}
echo "</ul>";