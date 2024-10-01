<div class="container border border-primary bg-primary bg-opacity-10 border-3 rounded mx-auto p-2">
    <?php if($isError): displayErrors(); endif; ?>
    <form class="row g-2" method="post">
        <legend class="text-center"><h1 class="align-center">Formularz rejestracji użytkownika</h1></legend>
        <div class="col-md-6">
            <input class="form-control" type="text" name="name" placeholder="Imię" value="<?php if(isset($_POST['name']) && $isError): echo $_POST['name']; endif; ?>" require>
        </div>
        <div class="col-md-6">
            <input class="form-control" type="text" name="surname" placeholder="Nazwisko" value="<?php if(isset($_POST['surname']) && $isError): echo $_POST['surname']; endif; ?>" require/>
        </div>
        <div class="col-md-12">
            <input class="form-control" type="text" name="email" placeholder="Adres E-mail" value="<?php if(isset($_POST['email']) && $isError): echo $_POST['email']; endif; ?>">
        </div>
        <div class="col-md-6">
            <input class="form-control" type="password" name="password" placeholder="Hasło" require />
        </div>                        
        <div class="col-md-6">
            <input class="form-control" type="password" name="password2" placeholder="Powtórz hasło" require />
        </div>
        <dvi class="buttons">
            <button class="btn btn-primary" type="submit" name="submit">Wyślij</button>
        </div>
    </form>
</div>