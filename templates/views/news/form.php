<?php
    $formAction = 'index.php?page=' . $_GET['page'] . '&action='.$_GET['action'];
    $page = $_GET['page'];
    $f = "index.php?page=index&action=save";
    $style = isset($form['active']) ? 'block' : 'none';
?>
<?php if($isError): displayErrors(); endif; ?>
<form class="row g-2" action="<?php echo $formAction; ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php if(isset($form['id'])): echo $form['id']; endif; ?>" />
    <legend class="text-center"><h1 class="align-center">Formularz <?php echo isset($form['id'])?'edytowania':'dodawania'; ?> aktualności</h1></legend>
    <div class="col-md-12">
        <input class="form-control" type="file" name="image" placeholder="Obrazek" value="<?php if(isset($form['image'])): echo $form['image']; endif;?>" require>
    </div>
    <div class="col-md-12">
        <input class="form-control" type="text" name="title" placeholder="Tytuł" value="<?php if(isset($form['title'])): echo $form['title']; endif;?>" require>
    </div>
    <div class="col-md-12">
        <input class="form-control" type="text" name="author" placeholder="Autor" value="<?php if(isset($form['author'])): echo $form['author']; endif;?>" require>
    </div>
    <div class="col-md-12">
        <input class="form-control" type="textarea" name="text" placeholder="Treść" value="<?php if(isset($form['text'])): echo $form['text']; endif;?>" require>
    </div>
    <div class="col-md-12">
        <input id="checkActive" class="form-check-input" type="checkbox" name='active' <?php if(isset($form['active']) && $form['active'] == 1): echo 'checked'; endif; ?> />
        <label for="active">Active</label>
    </div>
    <dvi class="buttons">
        <a class="btn btn-warning" href="<?php echo "index.php?page=".$page; ?>">Powrót</a>
        <button class="btn btn-primary" type="submit" name="submit">Wyślij</button>
    </div>
</form>