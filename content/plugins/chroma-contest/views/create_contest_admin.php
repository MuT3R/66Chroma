
  <div class="form-wrapper">

    <h1 class="contest-title">Page concours - Administrateur</h1>
  <?php
  if(count($keys) < 5) { 
  ?>


     <form class="contest-form" action="" method="POST"> 
        <?php if(isset($errorMessage)): ?>
        <div class="error-mssg" role="alert"><?= $errorMessage ?></div>
        <?php endif ?>
        <label class="contest-form_name" for="name">Thème</label>
          <input id="contest_name" value="<?= $contest->get_contest_name() ?>" placeholder="Thème du concours" class="contest-form_nameInput" type="text" name="contest_name">
          <label class="contest-form_date" for="date">La date de la fin du concours.</label>
            <input id="contest_date" value="<?= $contest->get_contest_date() ?>" type="date" name="contest_date">
        <label class="form-second__label" for="description">La description de votre oeuvre</label>
        <textarea id="contest_description" value="<?= $contest->get_contest_description() ?>" placeholder="Description" class="contest-form_description" name="contest_description" cols="30" rows="10"></textarea>



          <select class="custom-select" id="artwork_name" name="artwork_name">
              <option>Selectionner une oeuvre.</option>
              <?php 
              
              // Je boucle sur mon tableau de titre d'oeuvre, sur chaque index.
              foreach($postTitleList as $key => $currentPostTitle) :
                // Puis pour chaque index, je récupére le titre d'une oeuvre, et je la passe dans une variable plus explicite.
                $postTitle = $currentPostTitle->post_title;
                // Pour chaque tour de boucle j'affiche par la suite le nom de l'oeuvre.
                // Je la place aussi dans la value.
              ?> 
              <option value="<?= $postTitle ?>"><?= $postTitle ?></option>
              
              
              <?php endforeach ?>

          </select>


          <div class="contest-button">
            <!-- Grâce a la fonction get_artwork_name, je passe la valeur récupuréré par name = "artwork_name" en $_POST-->
            <input class="hidden" type="submit" value="<?= $contest->get_artwork_name(); ?>" name = "artwork_name">
            <input class="contest-button__validation" type="submit" value="Ajouter un concours">
        </div>
     </form>
  </div>
  <?php } else { ?>
  <h2>Vous avez atteinds la limite maximum des concours</h2>
  <?php } ?>
  <hr>
