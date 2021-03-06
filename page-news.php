<?php
/**
 * Template Name: News & Campaigns
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php get_header();?>

<?php if ( have_posts() ): ?>

<?php while ( have_posts() ) : the_post(); ?>

    <div class="container full">
		<div class="row md-m-b-2">
		   <div class="col-md-8 col-md-offset-2 text-center">
		      <h1 class="category-title"><?php the_title(); ?></h1>
		      <h5 class="category-description"><?php the_content(); ?></h5>
		   </div>
		</div>
	</div>

<?php endwhile; ?>

<?php endif; ?>

	<div class="container">
		<div class="row">
		<?php
			$rowCounter = 0;
			$news_query = hca_get_news_query();
			if( $news_query->have_posts() ) {
				while( $news_query->have_posts() ){
					$news_query->the_post();
					get_template_part('templates/news');
					$rowCounter++;
					if($rowCounter==3) {
						echo '</div><div class="row">';
            $rowCounter = 0;
					}
				}
			}

		?>
		</div>
	</div>

<?php get_footer();?>
