<?php
    $formAction = 'index.php?page=' . $_GET['page'] . '&action='.$_GET['action'];
    $f = "index.php?page=index&action=save";
    $style = isset($form['active']) ? 'block' : 'none';
?>
<?php if($isError): displayErrors(); endif; ?>
<form class="row g-2" action="<?php echo $formAction; ?>" method="post">
    <input type="hidden" name="id" value="<?php if(isset($form['id'])): echo $form['id']; endif; ?>" />
    <legend class="text-center"><h1 class="align-center">Formularz rejestracji użytkownika</h1></legend>
    <div class="col-md-6">
        <input class="form-control" type="text" name="name" placeholder="Imię" value="<?php if(isset($form['name'])): echo $form['name']; endif;?>" require>
    </div>
    <div class="col-md-6">
        <input class="form-control" type="text" name="surname" placeholder="Nazwisko" value="<?php if(isset($form['surname'])): echo $form['surname']; endif;?>" require/>
    </div>
    <div class="col-md-12">
        <input class="form-control" type="text" name="email" placeholder="Adres E-mail" value="<?php if(isset($form['email'])): echo $form['email']; endif;?>">
    </div>
    <?php 
    if(isset($form['id'])){
    ?>
    <div class="col-md-12">
        <input type="checkbox" id="checkpass" class="form-check-input" name="reset" <?php if (isset($form['reset']) && $form['reset'] == 1) : echo 'checked'; endif; ?> />
        <label for="checkpass">Czy chcesz edytowac haslo</label>
    </div>
    <div class="col-md-6">
        <input class="form-control" style="display: <?php echo $style; ?>;" type="password" id="pass1" name="password" placeholder="Hasło"  value="<?php if(isset($form['password'])): echo $form['password']; endif;?>"require />
    </div>                        
    <div class="col-md-6">
        <input class="form-control" style="display: <?php echo $style; ?>;" type="password" id="pass2" name="password2" placeholder="Powtórz hasło"  value="<?php if(isset($form['password2'])): echo $form['password2']; endif;?>"require />
    </div>
    <?php
    }else{
    ?>
     <div class="col-md-6">
        <input class="form-control" type="password" name="password" placeholder="Hasło"  value="<?php if(isset($form['password'])): echo $form['password']; endif;?>"require />
    </div>                        
    <div class="col-md-6">
        <input class="form-control" type="password" name="password2" placeholder="Powtórz hasło"  value="<?php if(isset($form['password2'])): echo $form['password2']; endif;?>"require />
    </div>
    <?php
    }
    ?>
    <div class="col-md-12">
        <input id="checkActive" class="form-check-input" type="checkbox" name='active' <?php if(isset($form['active']) && $form['active'] == 1): echo 'checked'; endif; ?> />
        <label for="active">Active</label>
    </div>
    <dvi class="buttons">
        <a class="btn btn-warning" href="<?php echo BASE_URL; ?>">Powrót</a>
        <button class="btn btn-primary" type="submit" name="submit">Wyślij</button>
    </div>
</form>