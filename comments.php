<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to starkers_comment() which is
 * located in the functions.php file.
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<div id="comments">
	<?php if ( post_password_required() ) : ?>
	<p>This post is password protected. Enter the password to view any comments</p>
</div>

	<?php
			/* Stop the rest of comments.php from being processed,
			 * but don't kill the script entirely -- we still have
			 * to fully load the template.
			 */
			return;
		endif;
	?>

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>

	<ol>
		<?php //wp_list_comments( array( 'callback' => 'starkers_comment' ) ); ?>
	</ol>

	<?php
		/* If there are no comments and comments are closed, let's leave a little note, shall we?
		 * But we don't want the note on pages or post types that do not support comments.
		 */
		elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>

	<!-- <p>Comments are closed</p> -->

	<?php endif; ?>

We need your email address to get back in touch, we won't publish your email address.

	<?php comment_form(array(
		'comment_notes_before' => '<p>Test</p>',
		'fields' =>  array(
			'comment_notes_before' => '<p>Test</p>',
		  'author' =>
		    '<div class="row"><div class="col-sm-6"><div class="form-group"><span class="small-header">Name</span><input placeholder="Name" id="author" class="form-control" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .'" /></div></div></div>',
		  'email' =>
		    '<div class="row"><div class="col-sm-6"><div class="form-group"><span class="small-header">Email</span><input placeholder="Email Address" class="form-control" id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .'"/></div></div></div>',
		),
		'comment_field' => '<div class="row"><div class="col-xs-12"><div class="form-group"><span class="small-header">Question</span><textarea class="form-control" id="comment" name="comment" cols="45" rows="8" aria-required="true" placeholder="Write your question here..."></textarea></div></div></div>'
	));

	?>

</div><!-- #comments -->
