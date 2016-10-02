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
	<div class="row sm-top lg-bottom">
		<div class="col-md-7">
				<?php if ( have_posts() ): ?>
				<h1 class="category-title"><?php echo single_cat_title( '', false ); ?></h1>
				<h5 class="category-description"><?php echo category_description(); ?></h5>
				<?php endif; ?>
		</div>
		<div class="col-md-4 col-md-offset-1">
				<span class="hotline-small-title">Housing Court Answers Hotline</span>
				</br>9 am to 5 pm
				</br>Tuesday — Thursday
				</br><a class="btn btn-default hotline-btn" role="button" href="">Call (212) 962-4795</a>
		</div>
	</div>
</div>

<div class="container">
   <div class="row">
	   <div class="col-md-9" role="main">
	      <!--
<div class="category-page-section">
	        <?php 
			$query = new WP_Query( array( 'name' => 'introduction-for-tenants' ) );
			?>
			<span class="anchor" id="introduction"></span>
			<hr/>
			<?php while($query->have_posts()): $query->the_post();?>
				<?php $postid = get_the_ID(); ?>
			<h3 class="section-title"><?php the_title(); ?></h3>
			<?php the_content(); ?>
		  </div>
		  <?php endwhile;?>
		  <?php wp_reset_postdata(); ?>
-->
		  <span class="anchor" id="court"></span>
		  <div class="first category-page-section highlight">
		  	<div class="row">
		    <div class="col-md-12">
		    <h3 class="section-title"><?php echo get_cat_name(6);?></h3>
		    <h6 class="section-description"><?php echo category_description(6); ?></h6>
		    <hr/>
		    </div>
		    <?php 
		    $category_id = get_cat_ID( 'Nonpayment Cases' );
			$category_link = get_category_link( $category_id );
			?>
			<div class="col-md-6 post-category-section">
			<h5 class="sub-title"><a href="<?php echo esc_url( $category_link ); ?>"><?php echo get_cat_name(7);?></a></h5>
			<?php echo category_description(7); ?>
			<!-- <a class="btn btn-lg" role="button" href="<?php echo esc_url( $category_link ); ?>">View Nonpayment Case Tips</a> -->
			</div>
			
			<?php 
		    $category_id = get_cat_ID( 'How can I get help to pay my back rent?' );
			$category_link = get_category_link( $category_id );
			?>
			<div class="col-md-6 post-category-section">
			<h5 class="sub-title"><a href="<?php echo esc_url( $category_link ); ?>"><?php echo get_cat_name(8);?></a></h5>
			<?php echo category_description(8); ?>
			<!-- <a class="btn btn-lg" role="button" href="<?php echo esc_url( $category_link ); ?>">View Rent Arrear Tips</a> -->
			</div>
			
			<?php 
		    $category_id = get_cat_ID( 'Holdover Cases' );
			$category_link = get_category_link( $category_id );
			?>
			<div class="col-md-6 post-category-section">
			<h5 class="sub-title"><a href="<?php echo esc_url( $category_link ); ?>"><?php echo get_cat_name(9);?></a></h5>
			<?php echo category_description(9); ?>
			<!-- <a class="btn btn-lg" role="button" href="<?php echo esc_url( $category_link ); ?>">View Holdover Case Tips</a> -->
			</div>
			
			<?php 
		    $category_id = get_cat_ID( 'What happens in court?' );
			$category_link = get_category_link( $category_id );
			?>
			<div class="col-md-6 post-category-section">
			<h5 class="sub-title"><a href="<?php echo esc_url( $category_link ); ?>"><?php echo get_cat_name(12);?></a></h5>
			<?php echo category_description(12); ?>
			<!-- <a class="btn btn-lg" role="button" href="<?php echo esc_url( $category_link ); ?>">View Court Process Tips</a> -->
			</div>
			</div>
		  </div>
		  
		  <span class="anchor" id="repairs"></span>
		  <div class="category-page-section highlight">
		    <?php 
			$args = array('cat'=>'5','-2', 'posts_per_page'=>3, 'order'=>'DESC');
			$query = new WP_Query($args);
			?>
			<h3 class="section-title"><?php echo get_cat_name(5);?></h3>
			<h6 class="section-description"><?php echo category_description(5); ?></h6>
			<hr/>
				<?php while($query->have_posts()): $query->the_post();?>
				<?php $postid = get_the_ID(); ?>
				         <article class="post-category-section">
							<h5 class="small-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
							<?php the_excerpt(); ?>
			             </article>
			    <?php endwhile;?>
				<?php 
			    $category_id = get_cat_ID( 'I need repairs in my apartment' );
				$category_link = get_category_link( $category_id );
				?>
			   <a href="<?php echo esc_url( $category_link ); ?>" class="btn btn-lg" role="button">More HP Actions Tips</a>
		   </div>
		   
		   <span class="anchor" id="stipulations"></span>
		   <div class="category-page-section highlight">
		    <?php 
			$args = array('cat'=>'148','-2', 'posts_per_page'=>2, 'order'=>'ASC');
			$query = new WP_Query($args);
			?>
			<h3 class="section-title"><?php echo get_cat_name(148);?></h3>
			<h6 class="section-description"><?php echo category_description(148); ?></h6>
			<hr/>
				<?php while($query->have_posts()): $query->the_post();?>
				<?php $postid = get_the_ID(); ?>
				         <article class="post-category-section">
							<h5 class="small-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
							<?php the_excerpt(); ?>
			             </article>
			    <?php endwhile;?>
				<?php 
			    $category_id = get_cat_ID( 'Stipulations' );
				$category_link = get_category_link( $category_id );
				?>
			   <a href="<?php echo esc_url( $category_link ); ?>" class="btn btn-lg" role="button">More Stipulation Tips</a>
		   </div>
		   
		   <span class="anchor" id="evictions"></span>
		   <div class="category-page-section highlight">
		    <?php 
			$args = array('cat'=>'149','-2', 'posts_per_page'=>2, 'order'=>'DESC');
			$query = new WP_Query($args);
			?>
			<h3 class="section-title"><?php echo get_cat_name(149);?></h3>
			<h6 class="section-description"><?php echo category_description(149); ?></h6>
			<hr/>
				<?php while($query->have_posts()): $query->the_post();?>
				<?php $postid = get_the_ID(); ?>
				         <article class="post-category-section">
							<h5 class="small-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
							<?php the_excerpt(); ?>
			             </article>
			    <?php endwhile;?>
				<?php 
			    $category_id = get_cat_ID( 'What will happen during an eviction?' );
				$category_link = get_category_link( $category_id );
				?>
			   <a href="<?php echo esc_url( $category_link ); ?>" class="btn btn-lg" role="button">More Eviction Tips</a>
		   </div>
		   
		   <span class="anchor" id="order-to-show-cause"></span>
		   <div class="category-page-section highlight">
		    <?php 
			$args = array('cat'=>'150','-2', 'posts_per_page'=>2, 'order'=>'DESC');
			$query = new WP_Query($args);
			?>
			<h3 class="section-title"><?php echo get_cat_name(150);?></h3>
			<h6 class="section-description"><?php echo category_description(150); ?></h6>
			<hr/>
				<?php while($query->have_posts()): $query->the_post();?>
				<?php $postid = get_the_ID(); ?>
				         <article class="post-category-section">
							<h5 class="small-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
							<?php the_excerpt(); ?>	
			             </article>
			    <?php endwhile;?>
				<?php 
			    $category_id = get_cat_ID( 'How can I stop an eviction?' );
				$category_link = get_category_link( $category_id );
				?>
			   <a href="<?php echo esc_url( $category_link ); ?>" class="btn btn-lg" role="button">More Stop Eviction Tips</a>
		   </div>
		   
		   <span class="anchor" id="judgements-tenant-screening-and-credit-reports"></span>
		   <div class="category-page-section highlight">
		    <?php 
			$args = array('cat'=>'151','-2', 'posts_per_page'=>3, 'order'=>'DESC');
			$query = new WP_Query($args);
			?>
			<h3 class="section-title"><?php echo get_cat_name(151);?></h3>
			<h6 class="section-description"><?php echo category_description(151); ?></h6>
			<hr/>
				<?php while($query->have_posts()): $query->the_post();?>
				<?php $postid = get_the_ID(); ?>
				         <article class="post-category-section">
							<h5 class="small-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
							<?php the_excerpt(); ?>	
			             </article>
			    <?php endwhile;?>
				<?php 
			    $category_id = get_cat_ID( 'Judgements, Credit and Tenant Screening Reports' );
				$category_link = get_category_link( $category_id );
				?>
			   <a href="<?php echo esc_url( $category_link ); ?>" class="btn btn-lg" role="button">More Judgement Tips</a>
		    </div>
		    
		    
		    <?php 
			$query = new WP_Query( array( 'post__in' => array( 383 ) ) );
			?>
				<?php while($query->have_posts()): $query->the_post();?>
				<?php $postid = get_the_ID(); ?>
		    <span class="anchor" id="<?php echo( basename(get_permalink()) ); ?>"></span>
		    <div class="category-page-section highlight">
			             <h3 class="section-title"><?php the_title(); ?></h3>
						 <div class="post-content"><?php the_content(); ?></div>
			    <?php endwhile;?>
		   <?php wp_reset_query(); ?>
		   </div>
		   
		   
		   <?php 
			$query = new WP_Query( array( 'post__in' => array( 390 ) ) );
			?>
				<?php while($query->have_posts()): $query->the_post();?>
				<?php $postid = get_the_ID(); ?>
		   <span class="anchor" id="<?php echo( basename(get_permalink()) ); ?>"></span>
		    <div class="category-page-section highlight">
			             <h3 class="section-title"><?php the_title(); ?></h3>
						 <div class="post-content"><?php the_content(); ?></div>
			    <?php endwhile;?>
		   <?php wp_reset_query(); ?>
		   </div>
		   
		   
		   <span class="anchor" id="roommate-issues"></span>
		   <div class="category-page-section highlight">
		    <?php 
			$args = array('cat'=>'155','-2', 'posts_per_page'=>2, 'order'=>'DESC');
			$query = new WP_Query($args);
			?>
			<h3 class="section-title"><?php echo get_cat_name(155);?></h3>
			<h6 class="section-description"><?php echo category_description(155); ?></h6>
			<hr/>
				<?php while($query->have_posts()): $query->the_post();?>
				<?php $postid = get_the_ID(); ?>
				         <article class="post-category-section">
							<h5 class="small-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
							<?php the_content(); ?>	
			             </article>
			    <?php endwhile;?>
		    </div>
		    
		   <span class="anchor" id="events-for-tenants"></span>
		   <div class="category-page-section highlight">
		    <?php 
			$args = array('cat'=>'2', 'posts_per_page'=>3, 'post_type'=>'event', 'order'=>'DESC');
			$query = new WP_Query($args);
			?>
			<h3 class="section-title">Events for Tenants</h3>
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
		  
		</div>
		
		
		<div id="scroll-spy" class="col-md-3" role="complementary">
			  <div id="nav">
			  <ul class="sub-nav nav hidden-xs hidden-sm" data-spy="affix" data-offset-top="432" data-offset-bottom="906">
			  		<span class="small-header">Tenant Topics</span>
					<li>
					  <a href="#court"><?php echo get_cat_name(6);?></a>
					</li>
					<li>
					  <a href="#repairs"><?php echo get_cat_name(5);?></a>
					</li>
					<li>
					  <a href="#stipulations"><?php echo get_cat_name(148);?></a>
					</li>
					<li>
					  <a href="#evictions"><?php echo get_cat_name(149);?></a>
					</li>
					<li>
					  <a href="#order-to-show-cause"><?php echo get_cat_name(150);?></a>
					</li>
					<li>
					  <a href="#judgements-tenant-screening-and-credit-reports"><?php echo get_cat_name(151);?></a>
					</li>
					<li>
					  <a href="#basic-rights-to-know"><?php echo get_the_title('383'); ?></a>
					</li>
					<li>
					  <a href="#apartment-type"><?php echo get_the_title('390'); ?></a>
					</li>
					<li>
					  <a href="#roommate-issues"><?php echo get_cat_name(155);?></a>
					</li>
					<li>
					  <a href="#events-for-tenants">Events for Tenants</a>
					</li>
			  </ul>
			</div>
		</div>
	</div>
</div>

<?php get_footer();?>