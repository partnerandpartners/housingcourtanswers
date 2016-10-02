<?php
// The Template For the Front Page
?>
<?php get_header();?>

<?php
if( have_posts() ) {
	while( have_posts() ) {
		the_post();
	}
}


?>

<div class="front-page-section statement">
	<div class="container">
	    <div class="row">
		    <div class="col-sm-10 col-sm-offset-1">
		    <h3 class="statement text-center"><?php the_content(); ?></h3>
		    </div>
	    </div>
	</div>
</div>

<div class="front-page-section popular-search">
	<div class="container">
		<div class="row md-top sm-bottom">
		<div class="col-sm-12 text-center">
		<span class="medium-header">Who are you?</span>
		</div>
		</div>
		<div class="row lg-bottom">
			<div class="col-md-4 text-center">
			<?php 
		    $category_id = get_cat_ID( 'For Tenants' );
			$category_link = get_category_link( $category_id );
			?>
			<a href="<?php echo esc_url( $category_link ); ?>" class="btn btn-xl">I'm a Tenant</a>
			</div>
			<div class="col-md-4 text-center">
			<?php 
		    $category_id = get_cat_ID( 'For Landlords' );
			$category_link = get_category_link( $category_id );
			?>
			<a href="<?php echo esc_url( $category_link ); ?>" class="btn btn-xl">I'm a Landlord</a>
			</div>
			<div class="col-md-4 text-center">
			<?php 
		    $category_id = get_cat_ID( 'For Advocates' );
			$category_link = get_category_link( $category_id );
			?>
			<a href="<?php echo esc_url( $category_link ); ?>" class="btn btn-xl">I'm an Advocate</a>
			</div>
		</div>
	</div>	
</div>

<div class="front-page-section popular-search">
	<div class="container">
		<div class="row">
		    <div class="col-md-8 col-md-offset-2 highlight">
		    <div class="row xs-top"><div class="col-xs-6 xs-padding-bottom"><span class="medium-header">Helpful Topics</span></div><div class="col-xs-6 text-right xs-padding-bottom"><span class="medium-header">View All Topics &rarr;</span></div><hr\></div>
        <?php 

        $front_page_suggestions = housing_court_get_front_page_suggestions();

        if( array_key_exists('categories', $front_page_suggestions) && !empty( $front_page_suggestions['categories'] ) ) {
          foreach( $front_page_suggestions['categories'] as $category ) {
            $grandparent_category = $category['grandparent_category'];

            ?>

            <div class="row">
                <div class="col-xs-12 sm-bottom">
                <?php

                if( $grandparent_category !== false ) {
                  echo '<span class="no-link-small-header">'.$grandparent_category['name'].'</span>';
                }

                ?>
                <h5 class="sub-title"><a href="<?php echo $category['permalink']; ?>"><?php echo $category['name']; ?></a><span class="medium-tip-count"><?php echo $category['count']; ?> Tips</span></h5>
                </div>
             </div>

            <?php
          }
        }

        ?>
		    </div>
	    </div>
	</div>
</div>


<div class="front-page-section upcoming-events">
    <div class="container">
		<?php
			$events_query = hca_get_upcoming_events_home_query();
			if( $events_query->have_posts() ) {
		?>	
		<div class="row lg-top sm-bottom">
		<div class="col-sm-12 text-center">
		<span class="medium-header">Upcoming Events</span>
		</div>
		</div>
		<div class="row">
		<?php while( $events_query->have_posts() ){
					$events_query->the_post();
					get_template_part('templates/event');
				}
			}
	
		?>
		</div>
    </div>
</div>


<div class="front-page-section featured-event">
	<div class="container lg-top lg-bottom">
		<div class="row">
			<?php 
			$query = new WP_Query( array( 'category_name' => 'featured', 'posts_per_page' => 1 ) );
			?>
				<?php while($query->have_posts()): $query->the_post();?>
				<?php $postid = get_the_ID(); ?>
				 <div class="col-xs-12 col-sm-6">
			             <h3 class="section-title"><?php the_post_thumbnail( 'full' ); ?></h3>
				</div>
				 <div class="col-xs-12 col-sm-6">
			             <h3 class="section-title"><?php the_title(); ?></h3>
						 <div class="post-content"><?php the_content(); ?></div>
				</div>
			    <?php endwhile;?>
		   <?php wp_reset_query(); ?>
	    </div>
	</div>
</div>

<div class="front-page-section recent-news">
    <div class="container">
		<?php

			$news_query = hca_get_recent_news_query();
			if( $news_query->have_posts() ) { ?>
			
				<div class="row lg-top md-bottom">
					<div class="col-sm-12 text-center">
					<span class="medium-header">News & Campaigns</span>
				    </div>
				</div>
		
				<?php while( $news_query->have_posts() ){
					$news_query->the_post(); ?>
					
					
					<?php get_template_part('templates/news');
				}
			}
	
		?>
		</div>
    </div>
</div>

</section><!-- .site-content -->

<?php get_footer();?>