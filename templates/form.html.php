<?php
    $formAction = 'index.php?page=' . $_GET['page'] . '&action=';
    if (isset($_GET['id']))
    {
        $formAction .= 'edit';
    }
    else
    {
        $formAction .= 'add';
    }
?>
<?php if($isError): displayErrors(); endif; ?>
<form class="row g-2" action="<?php echo $formAction; ?>" method="post">
    <input type="hidden" name="id" value="<?php if(isset($form['id'])): echo $form['id']; endif; ?>" />
    <legend class="text-center"><h1 class="align-center">Formularz rejestracji użytkownika</h1></legend>
    <div class="col-md-6">
        <input class="form-control" type="text" name="name" placeholder="Imię" value="<?php if(isset($form['surname'])): echo $form['name']; endif;?>" require>
    </div>
    <div class="col-md-6">
        <input class="form-control" type="text" name="surname" placeholder="Nazwisko" value="<?php if(isset($form['surname'])): echo $form['surname']; endif;?>" require/>
    </div>
    <div class="col-md-12">
        <input class="form-control" type="text" name="email" placeholder="Adres E-mail" value="<?php if(isset($form['surname'])): echo $form['email']; endif;?>">
    </div>
    <div class="col-md-6">
        <input class="form-control" type="password" name="password" placeholder="Hasło" require />
    </div>                        
    <div class="col-md-6">
        <input class="form-control" type="password" name="password2" placeholder="Powtórz hasło" require />
    </div>
    <dvi class="buttons">
        <a class="btn btn-warning" href="<?php echo BASE_URL; ?>">Powrót</a>
        <button class="btn btn-primary" type="submit" name="submit">Wyślij</button>
    </div>
</form>