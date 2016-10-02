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
		   <div class="col-md-8 col-md-offset-2 text-center">
				<h1 class="category-title"><?php the_title(); ?></h1>
				<h5 class="category-description"><?php the_content(); ?></h5>
		   </div>
	    </div>
	  </div>
	</div>
<?php endwhile; ?>
<?php endif; ?>
	
<div class="container">
	<div class="row md-bottom">
		<div class="col-md-12">
		<hr/>
		</div>
		<div class="col-md-6">
			<div class="category-page-section highlight">
			<h5 class="sub-title">Housing Court Answers Hotline</h5>
			<?php the_field('hotline'); ?>
			</div>
		</div>
		<div class="col-md-6">
			<div class="category-page-section highlight">
			<h5 class="sub-title">Need help with back rent?</h5>
			<?php the_field('back_rent'); ?>
			</div>
		</div>
	</div>
	
	<div class="row md-bottom">
		<div class="col-md-10 col-md-offset-1">
			<div class="category-page-section highlight">
			<h5 class="sub-title">Visit Our Information Tables</h5>
			<?php the_field('information_tables'); ?>
			
			<?php if( have_rows('locations') ): 
						    $rowCounter = 0;
			?>
			<div class="row sm-bottom">
				
				<div class="col-sm-12 sm-top xs-bottom"><span class="section-header">Table Locations</span></div>
				
				<?php while( have_rows('locations') ): the_row(); 
			
					// vars
					$borough = get_sub_field('borough');
					$address = get_sub_field('address');
					$schedule = get_sub_field('schedule');
					
					?>
					
					<div class="col-sm-4">
						
						<span class="small-header"><?php echo $borough; ?></span>
						<?php echo $address; ?>
						<?php echo $schedule; ?>
			
					</div>
					
					<?php 
					$rowCounter++;
					if($rowCounter==3){
						echo('</div><div class="row sm-bottom">');//new row at 3rd post.
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