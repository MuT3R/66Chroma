<?php

 echo "En construction";

 ?>

 <h1 class="contest-title">Lancer un concours</h1>
 <div class="contest-wrapper">

   <form class="contest-form" action="GET">
      <label class="contest-form_name" for="name">Themes</label>
      <input placeholder="Théme du concours" class="contest-form_nameInput" type="text" name="name">
      <label class="form-second__label" for="description">Message</label>
      <textarea  placeholder="Description" class="contest-form_description" name="description" cols="30" rows="10"></textarea>
      <div class="contest-button">
        <button class="contest-button__validation" type="submit">Valider</button>
      </div>
   </form>
   <hr>

   <h2 class="contest-subtitle">Concours actuels</h2>
   <div class="current-contest">
     <p>Vous n'avez pas de concours (en dur)</p>
   </div>

 </div>