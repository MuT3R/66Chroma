

<?php // Do not delete these lines

	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
	if (!empty($post->post_password)) { // if there's a password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
			?>

			<p class="nocomments">Ce message est protégé. Entrez le mot de passe pour afficher les commentaires.</p>

			<?php
			return;
		}
	}
	/* This variable is for alternating comment background */
	$oddcomment = 'class="comments-alt" ';
?>








<!-- You can start editing here. -->


	<?php if ($comments) : ?>
	<div class="comments-responses">
		<h2 id="comments"><?php comments_number('Pas de commentaire', 'Commentaires', 'Commentaires' );?></h2>
		
		<ol class="commentlist">
		<?php foreach ($comments as $comment) : ?>
			<li style="border-top: 2px solid grey;" <?php echo $oddcomment; ?>id="comment-<?php comment_ID() ?>">
				<cite style=" font-weight:900;"><?php comment_author_link() ?></cite> dit:
				<?php if ($comment->comment_approved == '0') : ?>
				<p>Votre commentaire est en attente d'être modéré.</p>
				<?php endif; ?>
				<br />
				<p class="small"><?php comment_date('F jS, Y') ?> at <?php comment_time() ?> (<a href="#comment-<?php comment_ID() ?>" title="">#</a>) <?php edit_comment_link('edit','&nbsp;&nbsp;',''); ?></p>
				<?php comment_text() ?>
			</li>
		<?php
			/* Changes every other comment to a different class */
			$oddcomment = ( empty( $oddcomment ) ) ? 'class="comments-alt" ' : '';
		?>
		<?php endforeach; /* end for each comment */ ?>
		</ol>


	<?php else : // this is displayed if there are no comments so far ?>
		<?php if ('open' == $post->comment_status) : ?>
			<!-- If comments are open, but there are no comments. -->
		<?php else : // comments are closed ?>
			<!-- If comments are closed. -->
			<p class="nocomments">Les commentaires ne sont pas ouvert.</p>
		<?php endif; ?>
	<?php endif; ?>
	<?php if ('open' == $post->comment_status) : ?>

		<h2 id="respond">Un commentaire ?</h2>

		<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
		<p>Vous devez être<a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">connecté</a> pour commenter.</p>
		<?php else : ?>

		<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

		<?php if ( $user_ID ) : ?>
			
		<p>Connecté avec <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>.</p>



		<p><textarea placeholder="Lachez vous" name="comment" id="comment" cols="30" rows="15" tabindex="4"></textarea></p>

		<p><input class="btn-primary" name="submit" type="submit" id="submit" tabindex="5" value="Valider" />
		<input  type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
		</p>
		<?php do_action('comment_form', $post->ID); ?>

		</form>


		<?php else : ?>

		<p>Vous devez être connecté</p>

		

		<?php endif; ?>

		<!--<p><small><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></small></p>-->



	
	</div>

<?php endif; // If registration required and not logged in ?>

<?php endif; // if you delete this the sky will fall on your head ?>