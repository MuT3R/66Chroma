<?php get_header(); ?>
<main class="main">
  <section class="posts-legale">
    
    <?php  require __DIR__.'/../../plugins/chroma-contest/classes/Contestdb.php'; 
    $contest = new Contestdb;
    $currentContests = $contest->get_all_contest();
    // var_dump($currentContests);
    foreach($currentContests as $key => $oneCurrentContest):


    endforeach;
    ?>




  </section>
<?php get_footer(); ?>
