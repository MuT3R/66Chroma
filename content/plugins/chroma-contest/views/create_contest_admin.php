
  <div class="form-wrapper">

    <h1 class="contest-title">Lancer un concours</h1>
  <?php 
  if(count($keys) < 5) { 
  ?>

    <?php if(isset($errorMessage)): ?>
    <div class="alert alert-danger" role="alert"><?= $errorMessage ?></div>
    <?php endif ?>


     <form class="contest-form" action="" method="POST"> 
        <label class="contest-form_name" for="name">Themes</label>
          <input id="contest_name" value="<?= $contest->get_contest_name() ?>" placeholder="Théme du concours" class="contest-form_nameInput" type="text" name="contest_name">
          <label class="contest-form_date" for="date">La date de la fin du concours.</label>
            <input id="contest_date" value="<?= $contest->get_contest_date() ?>" type="date" name="contest_date">
        <label class="form-second__label" for="description">La description de votre concours</label>
          <textarea id="contest_description" value="<?= $contest->get_contest_description() ?>" placeholder="Description" class="contest-form_description" name="contest_description" cols="30" rows="10"></textarea>
        <div class="contest-button">
          <input class="contest-button__validation" type="submit" value="Ajouter un concours">
        </div>
     </form>
  </div>
  <?php } else { ?>
  <h2>Vous avez atteind la limite maximum de concours</h2>
  <?php } ?>
  <hr>
