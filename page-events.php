<?php
/**
 * Template Name: Events
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
		<div class="row md-bottom">
		   <div class="col-md-8 col-md-offset-2 text-center">
		      <h1 class="category-title"><?php the_title(); ?></h1>
		      <h5 class="category-description"><?php the_content(); ?></h5>
		   </div>
		</div>
	</div>
<?php endwhile; ?>

<?php endif; ?>

    <div class="container">
       <div class="row md-bottom">
	      <div class="col-sm-12">
	         <hr/>
	         <h3 class="section-title">Upcoming</h3>
	      </div>
       </div>
    </div>

	<div class="container">
		<div class="row md-bottom">
		<?php
			$columns_printed = 0;
			$num_posts_printed = 0;
			$events_query = hca_get_upcoming_events_query();
			if( $events_query->have_posts() ) {
				while( $events_query->have_posts() ){
					$events_query->the_post();
					get_template_part('templates/event');
					$columns_printed++;
					$num_posts_printed++;
					if( $columns_printed == 3 && $num_posts_printed != $events_query->found_posts ) {
						echo '</div><div class="row md-bottom">';
            $columns_printed = 0;
					}
				}
			}

		?>
		</div>
	</div>

	<div class="container xs-m-t-6">
       <div class="row md-bottom">
	      <div class="col-sm-12">
	         <hr/>
	         <h3 class="section-title">Past</h3>
	      </div>
       </div>
    </div>

	<div class="container">
		<div class="row md-bottom">
		<?php
			$columns_printed = 0;
			$num_posts_printed = 0;
			$events_query = hca_get_past_events_query();
			if( $events_query->have_posts() ) {
				while( $events_query->have_posts() ){
					$events_query->the_post();
					get_template_part('templates/event');
					$columns_printed++;
					$num_posts_printed++;
					if( $columns_printed === 3 && $num_posts_printed != $events_query->found_posts ) {
						echo '</div><div class="row md-bottom">';
            $columns_printed = 0;
					}
				}
			}

		?>
		</div>
	</div>

<?php get_footer();?>
