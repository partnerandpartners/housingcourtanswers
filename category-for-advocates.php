<?php
/**
 * The template for displaying Category Archive pages
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


<div class="container">
	<div class="row lg-bottom sm-top">
		<div class="col-md-7">
			<h1 class="category-title"><?php echo single_cat_title( '', false ); ?></h1>
			<h5 class="category-description"><?php echo category_description(); ?></h5>
		</div>
		<div class="col-md-4 col-md-offset-1 sm-top">
			<!-- <div class="hotline-callout"> -->
				<span class="hotline-small-title">Housing Court Answers Hotline</span>
				</br>9 am to 5 pm
				</br>Tuesday — Thursday
				</br><a class="btn btn-default hotline-btn" role="button" href="">Call (212) 962-4795</a>
			<!-- </div> -->
		</div>
	</div>
</div>


<div class="container">
   <div class="row">
      <div class="col-sm-9" role="main">
      			<span class="anchor" id="events-for-advocates"></span>
			   <div class="category-page-section highlight">
			    <?php 
				$args = array('cat'=>'4', 'posts_per_page'=>3, 'post_type'=>'event', 'order'=>'DESC');
				$query = new WP_Query($args);
				?>
				<h3 class="section-title">Events for Advocates</h3>
				<h6 class="section-description">Lorem Ipsum</h6>
				<hr/>
					<?php while($query->have_posts()): $query->the_post();?>
					<?php $postid = get_the_ID(); ?>
					         <header>
								<h5 class="small-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
								<div class="news-event-meta">
									<span class="small-header">When</span>
									<div class="event-data">
										<?php the_field( 'exact_date'); ?>
									</div>
									<span class="small-header">Where</span>
									<div class="event-data">
										<?php the_field( 'address'); ?>
									</div>
								</div>
							</header>
							<div class="xs-top">
								<?php the_excerpt(); ?>
							</div>
				    <?php endwhile;?>
				   <a href="" class="btn btn-lg" role="button">More Housing Court Events</a>
			    </div>
		<?php while ( have_posts() ) : the_post(); ?>
				<span class="anchor" id="<?php echo( basename(get_permalink()) ); ?>"></span>
				<div class="category-page-section highlight">
				<article>
					<h3 class="section-title"><?php the_title(); ?></h3>
					<div class="post-content"><?php the_content(); ?></div>
				</article>
				</div>
		<?php endwhile; ?>
	   </div>
	   <div id="scroll-spy" class="col-md-3" role="complementary">
		   <nav class="bs-docs-sidebar hidden-print hidden-xs hidden-sm affix" data-spy="affix" data-offset-top="432" data-offset-bottom="906">
		   <div id="nav">
			   <ul class="sub-nav nav hidden-xs hidden-sm">
			   	<span class="small-header">Advocate Topics</span>
			   		<li>
					  <a href="#events-for-advocates">Events for Advocates</a>
					</li>
		   		<?php while ( have_posts() ) : the_post(); ?>
					<li>
					  <a href="#<?php echo( basename(get_permalink()) ); ?>"><?php the_title(); ?></a>
					</li>
		   		<?php endwhile; ?>
		       </ul>
		   </div>
   </nav>
</div>
   </div>
</div>
		<?php else: ?>
<div class="top-section">
  <div class="container">
   <div class="row">
	   <div class="col-md-7">
			<h1 class="category-title"><?php echo single_cat_title( '', false ); ?></h1>
			<h5 class="category-description"><?php echo category_description(); ?></h5>
		</div>
		<div class="col-md-4 col-md-offset-1 sm-top">
			<!-- <div class="hotline-callout"> -->
				<span class="hotline-small-title">Housing Court Answers Hotline</span>
				</br>9 am to 5 pm
				</br>Tuesday — Thursday
				</br><a class="btn btn-default hotline-btn" role="button" href="">Call (212) 962-4795</a>
			<!-- </div> -->
		</div>
    </div>
  </div>
</div>
		<?php endif; ?>

<?php get_footer();?>