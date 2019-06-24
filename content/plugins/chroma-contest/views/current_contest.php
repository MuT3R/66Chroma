<h2 class="contest-subtitle">Concour actuel</h2>

    <?php
    foreach($curentContests as $curentContest): 
    ?>
    <div class="current-contest">
      <p> Le concour du moment a pour theme : <?=  $curentContest->contest_name ?> </p>
      <p>Le concour du moment se termineras le : <?=  $curentContest->contest_date ?> </p>
      <p>Sa description : <?=  $curentContest->contest_description ?> </p>
      <p> DUMP: <?=  $curentContest->id ?></p>
      <form action="" method="POST" class="delete_form">
        <input type="submit" name="delete_form_submit" value="Supprimer le concours">
        <input type="hidden" name="delete_id" value="<?= $curentContest->id ?>" id="delete_form">
      </form>
    </div>
    <?php endforeach; ?>