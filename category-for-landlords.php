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

<div class="container">
	<div class="row lg-bottom sm-top">
		<div class="col-md-7">
		<?php if ( have_posts() ): ?>
			<h1 class="category-title"><?php echo single_cat_title( '', false ); ?></h1>
			<h5 class="category-description"><?php echo category_description(); ?></h5>
		<?php endif; ?>
		</div>
		<div class="col-md-4 col-md-offset-1">
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
	   <div class="col-md-9" role="main">
	      <span class="anchor" id="court"></span>		
	      <div class="category-page-section highlight">
		    <?php 
			$args = array('cat'=>'14','-3', 'posts_per_page'=>3, 'order'=>'DESC');
			$query = new WP_Query($args);
			?>
			<h3 class="section-title"><?php echo get_cat_name(14);?></h3>
			<h6 class="section-description"><?php echo category_description(14); ?></h6>
			<hr/>
				<?php while($query->have_posts()): $query->the_post();?>
				<?php $postid = get_the_ID(); ?>
				         <article class="post-category-section">
							<h5 class="small-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
							<?php the_excerpt(); ?>	
			             </article>
			    <?php endwhile;?>
				<?php 
			    $category_id = get_cat_ID( 'What will happen in court if I go to court without a lawyer?' );
				$category_link = get_category_link( $category_id );
				?>
			   <a href="<?php echo esc_url( $category_link ); ?>" class="btn btn-lg" role="button">More On Court Process</a>
		   </div>
		   
		   <span class="anchor" id="eviction"></span>
		   <div class="category-page-section highlight">
		    <?php 
			$args = array('cat'=>'15','-3', 'posts_per_page'=>3, 'order'=>'DESC');
			$query = new WP_Query($args);
			?>
			<h3 class="section-title"><?php echo get_cat_name(15);?></h3>
			<h6 class="section-description"><?php echo category_description(15); ?></h6>
			<hr/>
				<?php while($query->have_posts()): $query->the_post();?>
				<?php $postid = get_the_ID(); ?>
				         <article class="post-category-section">
							<h5 class="small-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
							<?php the_excerpt(); ?>	
			             </article>
			    <?php endwhile;?>
				<?php 
			    $category_id = get_cat_ID( 'I want to evict my tenant' );
				$category_link = get_category_link( $category_id );
				?>
			   <a href="<?php echo esc_url( $category_link ); ?>" class="btn btn-lg" role="button">More On Evictions</a>
		   </div>
		   
		   <span class="anchor" id="hp-actions"></span>
		   <div class="category-page-section highlight">
		    <?php 
			$args = array('cat'=>'165','-3', 'posts_per_page'=>3, 'order'=>'DESC');
			$query = new WP_Query($args);
			?>
			<h3 class="section-title"><?php echo get_cat_name(165);?></h3>
			<h6 class="section-description"><?php echo category_description(165); ?></h6>
			<hr/>
				<?php while($query->have_posts()): $query->the_post();?>
				<?php $postid = get_the_ID(); ?>
				         <article class="post-category-section">
							<h5 class="small-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
							<?php the_excerpt(); ?>	
			             </article>
			    <?php endwhile;?>
				<?php 
			    $category_id = get_cat_ID( 'What happens if my tenant brings me to court with an HP Action?' );
				$category_link = get_category_link( $category_id );
				?>
			   <a href="<?php echo esc_url( $category_link ); ?>" class="btn btn-lg" role="button">More On HP Actions</a>
		   </div>
		   
		   <span class="anchor" id="collecting-rent"></span>
		   <div class="category-page-section highlight">
		    <?php 
			$args = array('cat'=>'166','-3', 'posts_per_page'=>3, 'order'=>'DESC');
			$query = new WP_Query($args);
			?>
			<h3 class="section-title"><?php echo get_cat_name(166);?></h3>
			<h6 class="section-description"><?php echo category_description(166); ?></h6>
			<hr/>
				<?php while($query->have_posts()): $query->the_post();?>
				<?php $postid = get_the_ID(); ?>
				         <article class="post-category-section">
							<h5 class="small-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
							<?php the_excerpt(); ?>	
			             </article>
			    <?php endwhile;?>
				<?php 
			    $category_id = get_cat_ID( 'How should I collect rent?' );
				$category_link = get_category_link( $category_id );
				?>
			   <a href="<?php echo esc_url( $category_link ); ?>" class="btn btn-lg" role="button">More On Collecting Rent</a>
		   </div>
		   
		 </div>
		
		<div id="scroll-spy" class="col-md-3" role="complementary">
			  <div id="nav">
				  <ul id="nav" class="sub-nav nav hidden-xs hidden-sm" data-spy="affix" data-offset-top="402" data-offset-bottom="906">              
						<span class="small-header">Landlord Topics</span>
						<li>
						  <a href="#court"><?php echo get_cat_name(14);?></a>
						</li>
						<li>
						  <a href="#eviction"><?php echo get_cat_name(15);?></a>
						</li>
						<li>
						  <a href="#hp-actions"><?php echo get_cat_name(165);?></a>
						</li>
						<li>
						  <a href="#collecting-rent"><?php echo get_cat_name(166);?></a>
						</li>
				  </ul>
			  </div>
        </div>
	</div>
</div>

<?php get_footer();?>