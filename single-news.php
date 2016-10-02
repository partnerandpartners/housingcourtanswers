<?php get_header(); ?>

<div class="container sm-top">

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		
	<article <?php post_class(); ?>>
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
			<span class="small-header">
			<?php

			$taxonomy = 'category';

			// get the term IDs assigned to post.
			$post_terms = wp_get_object_terms( $post->ID, $taxonomy, array( 'fields' => 'ids' ) );
			// separator between links
			$separator = '&nbsp;&nbsp;|&nbsp;&nbsp;';

			if ( !empty( $post_terms ) && !is_wp_error( $post_terms ) ) {

				$term_ids = implode( ',' , $post_terms );
				$terms = wp_list_categories( 'title_li=&style=none&echo=0&taxonomy=' . $taxonomy . '&include=' . $term_ids );
				$terms = rtrim( trim( str_replace( '<br />',  $separator, $terms ) ), $separator );

				// display post categories
				echo  $terms;
			}

			?>
			</span>
			<h2 class="article-title"><?php the_title(); ?></h2>
			<h4 class="section-description"><?php the_field("subtitle"); ?></h4>
			<div class="entry-content"><?php the_content(); ?></div>
		</div>
		</div>
		<div class="row">
			<div class="col-md-12" role="main">
				<?php the_tags( '<span class="small-header">Glossary Terms</span><br/>', ' ', '' ); ?>
			</div>
		</div>
	</article>	
</div>

<div class="container md-top">
	<div class="row">
		<div class="col-sm-12">
			<?php comments_template(); ?>
		</div>
	</div>
</div>

<?php endwhile; ?>

<?php endif; ?>



<?php get_footer();?>