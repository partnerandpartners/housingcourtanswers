<?php get_header(); ?>

<div class="container top-section">

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<article <?php post_class("solid md-p-y-3 xs-p-a-1"); ?>>

		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h1 class="article-title"><?php the_title(); ?></h1>
				<div class="md-m-t-2">
					<div class="entry-content"><?php the_content(); ?></div>
				</div>
				<div class="post-breadcrumb xs-m-t-2">
				<span class="small-header">Topics</span><br/>
					<?php		$taxonomy = 'category';

					// get the term IDs assigned to post.
					$post_terms = wp_get_object_terms( $post->ID, $taxonomy, array( 'fields' => 'ids' ) );
					// separator between links
					$separator = '<br/>';

					if ( !empty( $post_terms ) && !is_wp_error( $post_terms ) ) {

						$term_ids = implode( ',' , $post_terms );
						$terms = wp_list_categories( 'style=none&show_count=TRUE&echo=0&taxonomy=' . $taxonomy . '&include=' . $term_ids . '&separator=' . $separator );
						$terms = rtrim( trim( str_replace( '<br/>',  $separator, $terms ) ), $separator );

						// display post categories
						echo  $terms;
					} ?>
					</div>
					<div class="xs-m-t-2 xs-m-b-2" role="main">
						<?php the_tags( '<span class="small-header">Related Glossary Terms</span><br/>', ' ', '' ); ?>
					</div>
		</div>
	</div>
	</article>
</div>

<div class="next-prev-container md-top">
	<div class="container">
		<div class="row md-m-b-6">
			<div class="col-sm-6 col-md-4">


				<!-- <div class="text-left md-m-b-1"><span class="link-small-header">
				<?php
				$previous_post = get_previous_post();
				if( $previous_post ) {
				echo housing_court_get_deepest_category_link( $previous_post->ID, 'Previous in | ' );
				}
				?>
				</span>
				</div> -->

				<?php next_post_link('%link', '<div class="solid text-left xs-m-b-3" style="padding:15px;"><span class="next-previous-header">Previous Tip</span><br/><span class="next-previous">%title</span></div>', TRUE, ''); ?>
			</div>

			<div class="col-sm-6 col-md-4 col-md-offset-4">


				<!-- <div class="text-right md-m-b-1">
				<span class="link-small-header">
				<?php
				$next_post = get_next_post();
				if( $next_post ) {
				echo housing_court_get_deepest_category_link( $next_post->ID, 'Next in | ' );
				}
				?>
				</span>
				</div> -->


				<?php previous_post_link('%link', '<div class="solid text-left xs-m-b-3" style="padding:15px;"><span class="next-previous-header">Next Tip</span><br/><span class="next-previous">%title</span></div>', TRUE, ''); ?>
			</div>
		</div>
	</div>
</div>

<div class="container xs-m-t-3 xs-m-b-6">
	<div class="row">
		<div class="col-sm-8 col-md-offset-2">
			<?php
			$fields =  array(

  'author' =>
    '<p class="comment-form-author md-m-t-2"><label for="author">' . __( 'Name', 'domainreference' ) . '<span class="required">*</span></label> ' .'<input id="author" name="author" type="text" value="' . '" size="30"' . ' /></p>',

  'email' =>
    '<p class="comment-form-email md-m-t-2"><label for="email">' . __( 'Email', 'domainreference' ) . '<span class="required">*</span></label> ' . '<input id="email" name="email" type="text" value="'  . '" size="30"' . ' /></p>',

  'url' =>  '',
);
			$comments_args = array(
        // change the title of send button
        'label_submit'=>'Send Question',
        // change the title of the reply section
        'title_reply'=>'Do you have a question about this answer?',
        // remove "Text or HTML to be displayed after the set of comment fields"
        'comment_notes_after' => '',
        // redefine your own textarea (the comment body)
        'comment_field' => '<p class="comment-form-comment md-m-t-2"><label for="comment">' . _x( 'Question', 'noun' ) . '</label><textarea id="comment" name="comment" aria-required="true"></textarea></p>',
				'fields' => $fields
				);

			comment_form($comments_args); ?>
		</div>
	</div>
</div>

<?php endwhile; ?>

<?php endif; ?>



<?php get_footer();?>
