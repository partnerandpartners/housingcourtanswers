<?php
/**
 * The template for displaying Holdover Cases for Tenants Category
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
			$args = array('category__in' => 152, 'posts_per_page'=>-1, 'orderby'=>'ASC');
			$query = new WP_Query($args);
			?>
		    <span class="anchor" id="judgements"></span>
		    <hr/>
		    <h3 class="section-title"><?php echo get_cat_name(152);?></h3>
		    <h6 class="section-description"><?php echo category_description(152); ?></h6>
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
			$args = array('category__in' => 153, 'posts_per_page'=>-1, 'orderby'=>'ASC');
			$query = new WP_Query($args);
			?>
		    <span class="anchor" id="credit-reports"></span>
		    <hr/>
		    <h3 class="section-title"><?php echo get_cat_name(153);?></h3>
		    <h6 class="section-description"><?php echo category_description(153); ?></h6>
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
			$args = array('category__in' => 154, 'posts_per_page'=>-1, 'orderby'=>'ASC');
			$query = new WP_Query($args);
			?>
		    <span class="anchor" id="tenant-screening-reports"></span>
		    <hr/>
		    <h3 class="section-title"><?php echo get_cat_name(154);?></h3>
		    <h6 class="section-description"><?php echo category_description(154); ?></h6>
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
		   <nav class="bs-docs-sidebar hidden-print hidden-xs hidden-sm affix" data-spy="affix" data-offset-top="227" data-offset-bottom="748">
			  <ul id="nav" class="sub-nav nav hidden-xs hidden-sm">              
					<li>
					  <a href="#judgements"><?php echo get_cat_name(152);?></a>
					</li>
					<li>
					  <a href="#credit-reports"><?php echo get_cat_name(153);?></a>
					</li>
					<li>
					  <a href="#tenant-screening-reports"><?php echo get_cat_name(154);?></a>
					</li>
			  </ul>
		   </nav>
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