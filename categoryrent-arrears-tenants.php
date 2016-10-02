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


<div class="top-section">
  <div class="container">
   <div class="row">
	   <div class="col-md-8">
			<?php if ( have_posts() ): ?>
			<h1 class="category-title"><?php echo single_cat_title( '', false ); ?></h1>
			<h5 class="category-description"><?php echo category_description(); ?></h5>
			<?php endif; ?>
	   </div>
	   <div id="hotline-callout" class="col-md-4">
			<span class="hotline-small-title">Housing Court Answers Hotline</span>
			</br>9 am to 5 pm
            </br>Tuesday — Thursday
            </br><a class="btn btn-default hotline-btn" role="button" href="">Call (212) 962-4795</a>
	  </div>
    </div>
  </div>
</div>


<div class="container">
   <div class="row">
      <div class="col-md-9" role="main">
		  <div class="category-page-section">
		    <?php 
			$query = new WP_Query( array( 'post__in' => array( 160, 163 ) ) );
			?>
			<span class="anchor" id="common-questions"></span>
			<hr/>
			<h3 class="section-title">Common Questions</h3>
				<?php while($query->have_posts()): $query->the_post();?>
				<?php $postid = get_the_ID(); ?>
				         <article class="post-category-section">
							<h5 class="small-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
							<div class="post-content"><?php the_content(); ?></div>
			             </article>
			    <?php endwhile;?>
		   <?php wp_reset_query(); ?>
		   </div>
		
		   <div class="category-page-section">
		    <?php 
			$args = array('category__in' => 143, 'posts_per_page'=>-1, 'orderby'=>'ASC');
			$query = new WP_Query($args);
			?>
		    <span class="anchor" id="one-shot-deals"></span>
		    <hr/>
		    <h3 class="section-title"><?php echo get_cat_name(143);?></h3>
		    <h6 class="section-description"><?php echo category_description(143); ?></h6>
		    <?php while($query->have_posts()): $query->the_post();?>
				<?php $postid = get_the_ID(); ?>
		         <article class="post-category-section">
					<h5 class="small-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
					<div class="post-content"><?php the_content(); ?></div>
	             </article>
			<?php endwhile;?>
			<?php wp_reset_query(); ?>
			</div>
			
			<div class="category-page-section">
		    <?php 
			$args = array('category__in' => 144, 'posts_per_page'=>-1, 'orderby'=>'ASC');
			$query = new WP_Query($args);
			?>
		    <span class="anchor" id="charities"></span>
		    <hr/>
		    <h3 class="section-title"><?php echo get_cat_name(144);?></h3>
		    <h6 class="section-description"><?php echo category_description(144); ?></h6>
		    <?php while($query->have_posts()): $query->the_post();?>
				<?php $postid = get_the_ID(); ?>
		         <article class="post-category-section">
					<h5 class="small-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
					<div class="post-content"><?php the_content(); ?></div>
	             </article>
			<?php endwhile;?>
			<?php wp_reset_query(); ?>
			</div>
			
			<div class="category-page-section">
		    <?php 
			$args = array('category__in' => 145, 'posts_per_page'=>-1, 'orderby'=>'ASC');
			$query = new WP_Query($args);
			?>
		    <span class="anchor" id="feps"></span>
		    <hr/>
		    <h3 class="section-title"><?php echo get_cat_name(145);?></h3>
		    <h6 class="section-description"><?php echo category_description(145); ?></h6>
		    <?php while($query->have_posts()): $query->the_post();?>
				<?php $postid = get_the_ID(); ?>
		         <article class="post-category-section">
					<h5 class="small-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
					<div class="post-content"><?php the_content(); ?></div>
	             </article>
			<?php endwhile;?>
			<?php wp_reset_query(); ?>
			</div>
		</div>
		
		
		<div id="scroll-spy" class="col-md-3" role="complementary">
			  <ul id="nav" class="sub-nav nav hidden-xs hidden-sm" data-spy="affix" data-offset-top="227" data-offset-bottom="748">              
					<li>
					  <a href="#common-questions">Common Questions</a>
					</li>
					<li>
					  <a href="#one-shot-deals"><?php echo get_cat_name(143);?></a>
					</li>
					<li>
					  <a href="#charities"><?php echo get_cat_name(144);?></a>
					</li>
					<li>
					  <a href="#feps"><?php echo get_cat_name(145);?></a>
					</li>
			  </ul> 
        </div>
    </div>
</div>

	<?php else: ?>
	<div class="container">
	   <div class="row">
	      <div class="col-sm-10" role="main">
			<h1 class="category-title"><?php echo single_cat_title( '', false ); ?></h1>
			<h5 class="category-description"><?php echo category_description(); ?></h5>
		  </div>
	   </div>
	</div>
	<?php endif; ?>

<?php get_footer();?>