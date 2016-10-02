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
	   <div class="row sm-bottom">
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
		<div class="col-md-9">
		<div class="row">
			<div class="col-sm-12">
				<span class="anchor" id="what-we-do"></span>
				<div class="category-page-section highlight">
				<h3 class="section-title">What We Do</h3>
				<?php the_field('what_we_do'); ?>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-12">
				<span class="anchor" id="history"></span>
				<div class="category-page-section highlight">
				<h3 class="section-title">History</h3>
				<?php the_field('history'); ?>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-12">
				<span class="anchor" id="fighting-for-justice"></span>
				<div class="category-page-section highlight">
				<h3 class="section-title">Fighting For Justice</h3>
				<?php the_field('fighting_for_justice'); ?>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-12">
				<span class="anchor" id="who-we-are"></span>
				<div class="category-page-section highlight">
					<h3 class="section-title">Who We Are</h3>
					<h6 class="section-description"><?php the_field('who_we_are'); ?></h6>
					<hr/>
				
						<?php if( have_rows('staff') ): 
						    $rowCounter = 0;
						?>
				    
						<div class="row sm-bottom">
							
							<div class="col-sm-12"><span class="section-header">Staff</span></div>
							
							<?php while( have_rows('staff') ): the_row(); 
						
								// vars
								$name = get_sub_field('name');
								$position = get_sub_field('position');
								
								?>
								
								<div class="col-sm-6">
						
									<h6 class="normal-weight"><?php echo $name; ?></h6>
								    <span class="small-header"><?php echo $position; ?></span>
						
								</div>
								
								<?php 
								$rowCounter++;
								if($rowCounter==2){
									echo('</div><div class="row sm-bottom">');//new row at 3rd post.
									$rowCounter = 0;
								}
								?>
						
							<?php endwhile; ?>
							
							</div>
							
						<?php endif; ?>
						
						<?php if( have_rows('borough_coordinators') ): 
						    $rowCounter = 0;
						?>
				    
						<div class="row sm-bottom">
							
							<div class="col-sm-12 md-top xs-bottom"><span class="section-header">Borough Coordinators</span></div>
							
							<?php while( have_rows('borough_coordinators') ): the_row(); 
						
								// vars
								$name = get_sub_field('name');
								$borough = get_sub_field('borough');
								
								?>
								
								<div class="col-sm-4">
									
									<h6 class="normal-weight"><?php echo $name; ?></h6>
									<span class="small-header"><?php echo $borough; ?></span>
						
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
						
						<?php if( have_rows('borough_assistants') ): 
						    $rowCounter = 0;
						?>
				    
						<div class="row sm-bottom">
							
							<div class="col-sm-12 md-top xs-bottom"><span class="section-header">Borough Assistants</span></div>
							
							<?php while( have_rows('borough_assistants') ): the_row(); 
						
								// vars
								$name = get_sub_field('name');
								$borough = get_sub_field('borough');
								
								?>
								
								<div class="col-sm-4">
									
									<h6 class="normal-weight"><?php echo $name; ?></h6>
									<span class="small-header"><?php echo $borough; ?></span>
						
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
				    
						<div class="row md-top sm-bottom">
							
							<div class="col-sm-12"><span class="section-header">Nycha Coordinator</span></div>
								
								<div class="col-sm-6">
									
									<h6 class="normal-weight"><?php the_field('nycha_coordinator'); ?></h6>
						
								</div>
								
						</div>
						
						<div class="row sm-bottom">
							
							<div class="col-sm-12"><span class="section-header">NYCHA / Bronx Assistant</span></div>
								
								<div class="col-sm-6">
									
									<h6 class="normal-weight"><?php the_field('nycha_bronx_assistant'); ?></h6>
						
								</div>
								
						</div>
						
						<div class="row sm-bottom">
							
							<div class="col-sm-12"><span class="section-header">Navigator Program Coordinator</span></div>
								
								<div class="col-sm-6">
									
									<h6 class="normal-weight"><?php the_field('navigator_program_coordinator'); ?></h6>
						
								</div>
								
						</div>
						
						<div class="row sm-bottom">
							
							<div class="col-sm-12"><span class="section-header">Hotline Coordinator</span></div>
								
								<div class="col-sm-6">
									
									<h6 class="normal-weight"><?php the_field('hotline_coordinator'); ?></h6>
						
								</div>
								
						</div>
						
						<?php if( have_rows('executive_committee') ): 
						    $rowCounter = 0;
						?>
				    
						<div class="row sm-bottom">
							
							<div class="col-sm-12 md-top xs-bottom"><span class="section-header">Board of Directors Executive Committee</span></div>
							
							<?php while( have_rows('executive_committee') ): the_row(); 
						
								// vars
								$name = get_sub_field('name');
								$memberposition = get_sub_field('position');
								$organization = get_sub_field('organization');
								
								?>
								
								<div class="col-md-6">
									
									<h6 class="normal-weight"><?php echo $name; ?></h6>
									<span class="small-header"><?php echo $memberposition; ?></span><br/>
									<?php echo $organization; ?>
						
								</div>
								
								<?php 
								$rowCounter++;
								if($rowCounter==2){
									echo('</div><div class="row sm-bottom">');//new row at 3rd post.
									$rowCounter = 0;
								}
								?>
						
							<?php endwhile; ?>
							
							</div>
							
						<?php endif; ?>
						
						<?php if( have_rows('general_members') ): 
						    $rowCounter = 0;
						?>
				    
						<div class="row sm-bottom">
							
							<div class="col-sm-12 md-top xs-bottom"><span class="section-header">Board of Directors General Members</span></div>
							
							<?php while( have_rows('general_members') ): the_row(); 
						
								// vars
								$name = get_sub_field('name');
								$organization = get_sub_field('organization');
								
								?>
								
								<div class="col-md-6">
									
									<h6 class="normal-weight"><?php echo $name; ?></h6>
									<?php echo $organization; ?>
						
								</div>
								
								<?php 
								$rowCounter++;
								if($rowCounter==2){
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
		
		<div id="scroll-spy" class="col-md-3" role="complementary">
			<div id="nav">
			  <ul class="sub-nav nav hidden-xs hidden-sm" data-spy="affix" data-offset-top="507" data-offset-bottom="906">
			  		<span class="small-header">Sections</span>             
					<li>
					  <a href="#what-we-do">What We Do</a>
					</li>
					<li>
					  <a href="#history">History</a>
					</li>
					<li>
					  <a href="#fighting-for-justice">Fighting For Justice</a>
					</li>
					<li>
					  <a href="#who-we-are">Who We Are</a>
					</li>
			  </ul>
			</div>
        </div>
	</div>
</div>

<?php get_footer();?>