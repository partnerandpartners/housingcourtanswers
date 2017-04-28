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
   <div class="top-section">
	  <div class="container">
	   <div class="row">
		   <div class="col-md-7">
				<h1 class="category-title"><?php the_title(); ?></h1>
				<div class="main-lead"><?php the_content(); ?></div>
		   </div>
       <div class="col-sm-4 xs-m-t-3 col-sm-offset-1">
         <div class="xs-m-b-3">
         <h5 class="section-title xs-m-b-1">Housing Court Hotline</h5>
         <?php the_field('hotline'); ?>
         </div>
       </div>
	    </div>
	  </div>
	</div>
<?php endwhile; ?>
<?php endif; ?>

<div class="container">
  <div class="row xs-m-b-3">
	<div class="col-md-12">
      <hr/>
      <div class="category-page-section highlight">
      <h3 class="section-title">Hotline Assistance</h3>
      <div class="lead links-post-content xs-m-b-2"><?php the_field('hotline_assistance'); ?></div>
			</div>
	</div>
  </div>

	<div class="row md-bottom">
		<div class="col-md-12">
      <hr/>
			<div class="category-page-section highlight">
			<h3 class="section-title">Visit Our Information Tables</h3>
			<div class="lead links-post-content xs-m-b-2"><?php the_field('information_tables'); ?></div>

			<?php if( have_rows('locations') ):
						    $rowCounter = 0;
			?>
			<div class="row xs-m-b-3">

				<div class="col-sm-12 xs-m-b-2">
          <h6 class="text-uppercase">Table Locations</h6>
          <hr/>
        </div>

				<?php while( have_rows('locations') ): the_row();
					// vars
					$borough = get_sub_field('borough');
					$address = get_sub_field('address');
          $addresslink = get_sub_field('address_link');
          $locationinbuilding = get_sub_field('location_in_building');
					$schedule = get_sub_field('schedule');
					$schedulenotes = get_sub_field('schedule_notes');
					?>

					<div class="col-sm-4">

						<h5 class="table-borough"><?php echo $borough; ?></h5>
						<div class="address">
              <a href="<?php echo $addresslink; ?>" class="address-link"><?php echo $address; ?></a>
              <?php echo $locationinbuilding; ?>
            </div>
						<div class="table-schedule"><?php echo $schedule; ?></div>
            <div class="table-schedule-notes"><?php echo $schedulenotes; ?></div>

					</div>

					<?php
					$rowCounter++;
					if($rowCounter==3){
						echo('</div><div class="row xs-m-b-2">');//new row at 3rd post.
						$rowCounter = 0;
					}
					?>

				<?php endwhile; ?>

				</div>
			<?php endif; ?>
			</div>
		</div>
	</div>
</div>

<?php get_footer();?>
