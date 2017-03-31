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
	   <div class="row md-m-b-3">
		   <div class="col-xs-12">
				<h1 class="category-title"><?php the_title(); ?></h1>
				<div class="main-lead"><?php the_content(); ?></div>
		   </div>
	    </div>
	  </div>
	</div>
<?php endwhile; ?>
<?php endif; ?>

<div class="container">
	<div class="row md-m-b-3">
		<div class="col-md-8">
		<div class="row md-m-b-6">
			<div class="col-sm-12">
				<span class="anchor" id="what-we-do"></span>
        <hr/>
				<div class="category-page-section highlight">
				<h3 class="section-title">What We Do</h3>
				<div class="lead xs-m-b-2"><?php the_field('what_we_do'); ?></div>
				</div>
			</div>
		</div>

		<div class="row md-m-b-3">
			<div class="col-sm-12">
				<span class="anchor" id="history"></span>
        <hr/>
				<div class="category-page-section highlight">
				<h3 class="section-title">History</h3>
				<div class="lead xs-m-b-2"><?php the_field('history'); ?></div>
				</div>
			</div>
		</div>

		<div class="row md-m-b-3">
			<div class="col-sm-12">
				<span class="anchor" id="fighting-for-justice"></span>
        <hr/>
				<div class="category-page-section highlight">
				<h3 class="section-title">Fighting For Justice</h3>
				<div class="lead xs-m-b-2"><?php the_field('fighting_for_justice'); ?></div>
				</div>
			</div>
		</div>

		<div class="row md-m-b-6">
			<div class="col-sm-12">
				<span class="anchor" id="who-we-are"></span>
        <hr/>
				<div class="category-page-section highlight">
					<h3 class="section-title">Who We Are</h3>
					<div class="lead xs-m-b-2"><?php the_field('who_we_are'); ?></div>
						<?php if( have_rows('staff') ):
						    $rowCounter = 0;
						?>

						<div class="row xs-m-b-2">
							<div class="col-sm-12 xs-m-t-1 xs-m-b-2"><h5 class="section-header">Staff</h5></div>

							<?php while( have_rows('staff') ): the_row();

								// vars
								$name = get_sub_field('name');
								$position = get_sub_field('position');

								?>

								<div class="col-sm-6">

									<h6 class=""><?php echo $name; ?></h6>
								    <span class="position"><?php echo $position; ?></span>

								</div>

								<?php
								$rowCounter++;
								if($rowCounter==2){
									echo('</div><div class="row xs-m-t-3 xs-m-b-2">');//new row at 3rd post.
									$rowCounter = 0;
								}
								?>

							<?php endwhile; ?>

							</div>

							<?php endif; ?>




						<?php if( have_rows('borough_coordinators') ):
						    $rowCounter = 0;
						?>

						<div class="row xs-m-t-3 xs-m-b-2">

							<div class="col-sm-12 xs-m-b-2"><h5 class="section-header">Borough Coordinators</h5></div>

							<?php while( have_rows('borough_coordinators') ): the_row();

								// vars
								$name = get_sub_field('name');
								$borough = get_sub_field('borough');

								?>

								<div class="col-sm-4">

									<h6 class="normal-weight"><?php echo $name; ?></h6>
									<span class="position"><?php echo $borough; ?></span>

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

						<?php if( have_rows('borough_assistants') ):
						    $rowCounter = 0;
						?>

						<div class="row xs-m-t-6 xs-m-b-2">

							<div class="col-sm-12 xs-m-b-2"><h5 class="section-header">Borough Assistants</h5></div>

							<?php while( have_rows('borough_assistants') ): the_row();

								// vars
								$name = get_sub_field('name');
								$borough = get_sub_field('borough_name');

								?>

								<div class="col-sm-4">

									<h6 class="normal-weight"><?php echo $name; ?></h6>
									<span class="position"><?php echo $borough; ?></span>

								</div>

								<?php
								$rowCounter++;
								if($rowCounter==3){
									echo('</div><div class="row">');//new row at 3rd post.
									$rowCounter = 0;
								}
								?>

							<?php endwhile; ?>

							</div>

						<?php endif; ?>

						<div class="row xs-m-t-3 xs-m-b-3">

								<div class="col-sm-6">

									<h6 class="normal-weight"><?php the_field('nycha_coordinator'); ?></h6>
									<span class="position">NYCHA Coordinator</span>

								</div>

						</div>

						<div class="row xs-m-b-3">

								<div class="col-sm-6">

									<h6 class="normal-weight"><?php the_field('nycha_bronx_assistant'); ?></h6>
									<span class="position">NYCHA / Bronx Assistant</span>

								</div>

						</div>

						<div class="row xs-m-b-3">

								<div class="col-sm-6">

									<h6 class="normal-weight"><?php the_field('navigator_program_coordinator'); ?></h6>
									<span class="position">Navigator Program Coordinator</span>

								</div>

						</div>

						<div class="row xs-m-b-3">

								<div class="col-sm-6">

									<h6 class="normal-weight"><?php the_field('hotline_coordinator'); ?></h6>
									<span class="position">Hotline Coordinator</span>

								</div>

						</div>

						<?php if( have_rows('executive_committee') ):
						    $rowCounter = 0;
						?>

						<div class="row xs-m-b-3">

							<div class="col-sm-12 xs-m-t-3 xs-m-b-3"><h5 class="section-header">Board of Directors Executive Committee</h5></div>

							<?php while( have_rows('executive_committee') ): the_row();

								// vars
								$name = get_sub_field('name');
								$memberposition = get_sub_field('position');
								$organization = get_sub_field('organization');

								?>

								<div class="col-md-6">

									<h6 class="normal-weight"><?php echo $memberposition; ?>, <?php echo $name; ?></h6>
									<span class="position"><?php echo $organization; ?></span>

								</div>

								<?php
								$rowCounter++;
								if($rowCounter==2){
									echo('</div><div class="row xs-m-b-3">');//new row at 3rd post.
									$rowCounter = 0;
								}
								?>

							<?php endwhile; ?>

							</div>

						<?php endif; ?>

						<?php if( have_rows('general_members') ):
						    $rowCounter = 0;
						?>

						<div class="row xs-m-b-3">

							<div class="col-sm-12 xs-m-b-3"><h5 class="section-header">Board of Directors General Members</h5></div>

							<?php while( have_rows('general_members') ): the_row();

								// vars
								$name = get_sub_field('name');
								$organization = get_sub_field('organization');

								?>

								<div class="col-md-6">

									<h6 class="normal-weight"><?php echo $name; ?></h6>
									<span class="position"><?php echo $organization; ?></span>

								</div>

								<?php
								$rowCounter++;
								if($rowCounter==2){
									echo('</div><div class="row xs-m-b-3">');//new row at 3rd post.
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
    <div class="col-md-3 col-md-offset-1">
			<div id="scroll-nav" role="navigation">
				<ul class="sub-nav nav hidden-xs hidden-sm affix-top" data-spy="affix" data-offset-top="520" data-offset-bottom="650">
					<li class=""><a href="#what-we-do">What We Do</a></li>
          <li><a href="#history">History</a></li>
          <li><a href="#fighting-for-justice">Fighting for Justice</a></li>
          <li><a href="#who-we-are">Who We Are</a></li>
          <div class="back-to-topp"><a href="#"><br>Back to Top ⇧</a></div>
				</ul>
			</div>
		</div>
	</div>
</div>

<?php get_footer();?>
