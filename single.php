<?php get_header(); ?>

<div class="container sm-top">

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		
	<article <?php post_class(); ?>>

		<span class="link-small-header">
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
		<h1 class="article-title"><?php the_title(); ?></h1>
		<div class="row xs-top">
			<div class="col-sm-9">
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

<div class="next-prev-container md-top">
	<div class="container">
		<div class="row sm-bottom">
			<div class="col-sm-4 mobile-sm-bottom">
				<div class="text-left xs-bottom"><span class="link-small-header"><?php 
				
				$previous_post = get_previous_post();
				if( $previous_post ) {
				echo housing_court_get_deepest_category_link( $previous_post->ID, 'Previous In ' );
				}
				
				?></span></div>
				<div class="text-left"><span class="next-previous">&larr; <?php previous_post_link('%link', '%title', TRUE, ''); ?></span></div>
			</div>
			
			<div class="col-sm-4 col-sm-offset-4">
				<div class="text-right xs-bottom"><span class="link-small-header"><?php 
				
				$next_post = get_next_post();
				if( $next_post ) {
				echo housing_court_get_deepest_category_link( $next_post->ID, 'Next in ' );
				}
				
				?></span></div>
				<div class="text-right"><span class="next-previous"><?php next_post_link('%link', '%title', TRUE, ''); ?> &rarr;</span></div>
			</div>
		</div>
	</div>
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