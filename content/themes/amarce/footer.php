

</main>
  
  <footer class="footer">
    
    <?php 
      $display_footer_contact = true;
      if (get_theme_mod('chroma_footer_active') == 'disabled') {
        $display_footer_contact = false;
        
      }
      if ($display_footer_contact) :
        
        ?>
    <h2>Nous contacter</h2>

    <div class="footer__contact">
      <form class="form" action="">
        <div class="form-first">
          <div class="form-first-name">
            <label class="form-first-name__label" for="name">Prénom</label>
            <input placeholder="Votre prénom" class="form-first-name__input" type="text" name="name">
          </div>
          <div class="form-first-mail">
            <label class="form-first-mail__label" for="mail">Email</label>
            <input placeholder="Votre email" class="form-first-mail__input" type="email" name="mail">
          </div>     
        </div>
        <div class="form-second">
          <label class="form-second__label" for="contact">Message</label>
          <textarea  placeholder="Votre message" class="form-second__textarea" name="contact" id="contact" cols="30" rows="10"></textarea>
        </div>

        <div class="content-button">
          <button class="form-button" type="submit">Envoyer</button>
        </div>

      </form> 
     
    </div>
    <?php endif; ?>


    <div class="mentions_legales">
      <p>Le site de 66Chroma création <i class="fa fa-copyright" aria-hidden="true"></i><a href="<?= get_permalink(156) ?>"> Les mentions légales </a></p>
    </div>
  </footer>
</div>

</div> 
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/parallax.js/1.4.2/parallax.min.js"></script>
  <?php wp_footer(); ?>
</body>
</html>
