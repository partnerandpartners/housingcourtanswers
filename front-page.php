<?php
// The Template For the Front Page
get_header();
?>

<?php
// Printing out the homepage statement
if( have_posts() ) {
	while( have_posts() ) {
		the_post();
	}
}
?>
<div class="full">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h2 class="statement"><?php the_content(); ?></h2>
			</div>
		</div>
	</div>
</div>

<div class="front-page-section popular-search">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h6 class="text-uppercase">Who are you?</h6>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 text-center">
				<?php
			    $category_id = get_cat_ID( 'For Tenants' );
					$category_link = get_category_link( $category_id );
				?>
				<a href="<?php echo esc_url( $category_link ); ?>" class="btn btn-lg">I'm a Tenant</a>
			</div>
			<div class="col-md-4">
				<?php
			    $category_id = get_cat_ID( 'For Landlords' );
					$category_link = get_category_link( $category_id );
				?>
				<a href="<?php echo esc_url( $category_link ); ?>" class="btn btn-lg">
					<div class="home-btn-wrapper">
						<div class="row row-eq-height">
							<div class="col-xs-6">
								<img class="home-btn" src="<?php echo get_template_directory_uri(); ?>/img/hca-home-btn_0001_landlord.png" style="" />
							</div>
							<div class="col-xs-6">
								<div class="home-btn-txt text-uppercase">
									<h4>I'm a Landlord</h4>
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>
			<div class="col-md-4 text-center">
				<?php
			    $category_id = get_cat_ID( 'For Advocates' );
					$category_link = get_category_link( $category_id );
				?>
				<a href="<?php echo esc_url( $category_link ); ?>" class="btn btn-lg">I'm an Advocate</a>
			</div>
		</div>
	</div>
</div>

<div class="front-page-section popular-search">
	<div class="container">
		<div class="row">
		    <div class="col-md-12">
		    <div class="row">
					<div class="col-xs-6">
						<h6 class="text-uppercase">Helpful Topics</span>
					</div>
					<div class="col-xs-6 text-right">
						<span class="text-uppercase">View All Topics &rarr;</span>
					</div>
					<hr\>
				</div>
        <?php

        $front_page_suggestions = housing_court_get_front_page_suggestions();

        if( array_key_exists('categories', $front_page_suggestions) && !empty( $front_page_suggestions['categories'] ) ) {
          foreach( $front_page_suggestions['categories'] as $category ) {
            $grandparent_category = $category['grandparent_category'];

            ?>

            <div class="row">
                <div class="col-xs-12">
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
			<div class="row">
				<div class="col-sm-12 text-center">
					<h6 class="text-uppercase">Upcoming Events</h6>
				</div>
			</div>
			<div class="row">
				<?php while( $events_query->have_posts() ){
							$events_query->the_post();
							get_template_part('templates/event');
						} ?>
			</div>
			<?php	}	?>
	</div>
</div>

<div class="front-page-section featured-event">
	<div class="container">
		<div class="row">
			<?php $query = new WP_Query( array( 'category_name' => 'featured', 'posts_per_page' => 1 ) ); ?>
				<?php while($query->have_posts()): $query->the_post();?>
				<?php $postid = get_the_ID(); ?>
					<div class="col-xs-12 col-sm-6">
						<h3 class=""><?php the_post_thumbnail( 'full' ); ?></h3>
					</div>
					<div class="col-xs-12 col-sm-6">
						<h3 class=""><?php the_title(); ?></h3>
						<div class="post-content"><?php the_content(); ?></div>
					</div>
			  <?php endwhile;?>
		   <?php wp_reset_query(); ?>
		 </div>
	</div>
</div>

<div class="front-page-section recent-news md-m-y-3 xs-m-y-2">
	<div class="container">
		<?php	$news_query = hca_get_recent_news_query();
			if( $news_query->have_posts() ) { ?>
			<div class="row md-m-b-2 xs-m-b-2">
				<div class="col-sm-12">
					<h6 class="text-uppercase">News &amp; Campaigns</h6>
				</div>
			</div>
			<div class="row">
				<?php while( $news_query->have_posts() ) {
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
