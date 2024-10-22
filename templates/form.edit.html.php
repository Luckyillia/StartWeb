<?php if($isError): displayErrors(); endif; ?>
<form class="row g-2" method="post">
    <legend class="text-center"><h1 class="align-center">Formularz rejestracji użytkownika</h1></legend>
    <div class="col-md-6">
        <input class="form-control" type="text" name="name" placeholder="Imię" value="<?php echo isset($_POST['name']) && $isError ? $_POST['name'] : $row['user_name']; ?>" required>
    </div>
    <div class="col-md-6">
        <input class="form-control" type="text" name="surname" placeholder="Nazwisko" value="<?php echo isset($_POST['surname']) && $isError ? $_POST['surname'] : $row['user_surname']; ?>" required>
    </div>
    <div class="col-md-12">
        <input class="form-control" type="text" name="email" placeholder="Adres E-mail" value="<?php echo isset($_POST['email']) && $isError ? $_POST['email'] : $row['user_email']; ?>" required>
    </div>
    <div class="col-md-6">
        <input class="form-control" type="password" name="password" placeholder="Hasło" required>
    </div>                        
    <div class="col-md-6">
        <input class="form-control" type="password" name="password2" placeholder="Powtórz hasło" required>
    </div>
    <div class="buttons">
        <a class="btn btn-warning" href="<?php echo BASE_URL; ?>">Powrót</a>
        <button class="btn btn-primary" type="submit" name="submit">Wyślij</button>
    </div>
</form>
