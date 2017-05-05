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

<div class="container-fluid full bg blue">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
					<div class="homepage-clouds hidden-xs" style="">
						<img class="clouds" id="home-cloud-left" style="" src="<?php echo get_template_directory_uri(); ?>/img/clouds/hca-bg-cloud-left.png" />
						<img class="clouds" id="home-cloud-left-center" style="" src="<?php echo get_template_directory_uri(); ?>/img/clouds/hca-bg-cloud-center.png" />
						<img class="clouds" id="home-cloud-center" style="" src="<?php echo get_template_directory_uri(); ?>/img/clouds/hca-bg-cloud-center.png" />
						<img class="clouds" id="home-cloud-right" style="" src="<?php echo get_template_directory_uri(); ?>/img/clouds/hca-bg-cloud-right.png" />
						<img class="clouds" id="home-cloud-right-center" style="" src="<?php echo get_template_directory_uri(); ?>/img/clouds/hca-bg-cloud-right.png" />
					</div>
			</div>
				<?php
					$category_id = get_cat_ID( 'For Tenants' );
					$category_link = get_category_link( $category_id );
				?>
				<a href="<?php echo esc_url( $category_link ); ?>">
					<div class="col-sm-4 text-center xs-m-b-3 md-m-b-0">
						<h4 class="text-uppercase">I'm a Tenant</h4>
						<a href="<?php echo esc_url( $category_link ); ?>" class="more-link text-uppercase">FIND ANSWERS</a>
						<img class="img-responsive tenant-main-image hidden-xs" style="" src="<?php echo get_template_directory_uri(); ?>/img/tenants/hca-tenants-bg-bldg-home-desktop.png" />
					</div>
				</a>
				<?php
			    $category_id = get_cat_ID( 'For Landlords' );
					$category_link = get_category_link( $category_id );
				?>
				<a href="<?php echo esc_url( $category_link ); ?>">
					<div class="col-sm-4 text-center xs-m-b-3 md-m-b-0">
						<h4 class="text-uppercase">I'm a Landlord</h4>
						<a href="<?php echo esc_url( $category_link ); ?>" class="more-link text-uppercase">FIND ANSWERS</a>
						<img class="img-responsive landlord-main-image hidden-xs" style="" src="<?php echo get_template_directory_uri(); ?>/img/landlords/hca-landlords-bg-bldg-home-desktop.png" />
					</div>
				</a>
				<?php
			    $category_id = get_cat_ID( 'For Advocates' );
					$category_link = get_category_link( $category_id );
				?>
				<a href="<?php echo esc_url( $category_link ); ?>">
					<div class="col-sm-3 col-sm-offset-1 text-center xs-m-b-3 md-m-b-0">
						<h4 class="text-uppercase">I'm an Advocate</h4>
						<a href="<?php echo esc_url( $category_link ); ?>" class="more-link text-uppercase">FIND ANSWERS</a>
						<img class="img-responsive advocates-main-image hidden-xs" style="" src="<?php echo get_template_directory_uri(); ?>/img/advocates/hca-home-image.png" />
					</div>
				</a>
	</div>
	</div>
</div>

<div class="front-page-section popular-search">
	<div class="container xs-m-b-3">
			<div class="row xs-m-b-2">
					<div class="col-xs-12">
						<h6 class="text-uppercase">Popular Topics</h6>
					</div>
					<div class="col-xs-12">
						<hr/>
					</div>
			</div>
			<div class="row">
			<?php
			$rowCounter = 0;
			$front_page_suggestions = housing_court_get_front_page_suggestions();
			if( array_key_exists('categories', $front_page_suggestions) && !empty( $front_page_suggestions['categories'] ) ) {
			foreach( $front_page_suggestions['categories'] as $category ) {
			$grandparent_category = $category['grandparent_category'];
			?>
				<a href="<?php echo $category['permalink']; ?>">
		    <div class="card-wrapper col-md-4">
						<div class="card-stack xs-m-b-3">
		            <h4 class="sub-title"><?php echo $category['name']; ?></h4>
		            <p><?php echo $category['description']; ?></p>
		            <a class="more-link text-uppercase" href="<?php echo $category['permalink']; ?>">Learn More</a>
		        </div>
		    </div>
				</a>
            <?php
           $rowCounter++;
					 if($rowCounter==3){
 					echo('</div><div class="row">');//new row at 3rd post.
 					$rowCounter = 0;
				    }
					}
				}
				?>
				</div>
			</div>
	</div>

	<div class="front-page-section popular-search">
		<div class="container">
				<div class="row">
						<div class="col-xs-7">
							<h6 class="text-uppercase">Popular Terms</span>
						</div>
						<div class="col-xs-5 text-right">
							<a href="<?php echo home_url(); ?>/glossary" class="all-button">VIEW ALL</a>
						</div>
						<div class="col-xs-12">
							<hr/>
						</div>
				</div>
					<div class="row">
								<div class="col-xs-12">
								<?php
								$front_page_suggestions = housing_court_get_front_page_suggestions();
								if( array_key_exists('tags', $front_page_suggestions) && !empty( $front_page_suggestions['tags'] ) ) {
								foreach( $front_page_suggestions['tags'] as $tag ) {
								?>
								    	<a rel="tag" href="<?php echo $tag['permalink']; ?>"><?php echo $tag['name']; ?></a>
						            <?php
						          }
						        } ?>
								</div>
						</div>
				</div>
		</div>

	<div class="container-fluid section-full bg yellow xs-m-y-6">
		<div class="container">
			<div class="row">
				<div class="col-sm-8">
					<?php the_content(); ?>
				</div>
				<div class="col-sm-4">
					<img class="img-responsive main-image" style="" src="<?php echo get_template_directory_uri(); ?>/img/hcalogo-main.png" />
				</div>
			</div>
		</div>
	</div>


<div class="container xs-m-t-6">
	<div class="row">
			<div class="col-xs-8">
				<h6 class="text-uppercase">Upcoming Events</span>
			</div>
			<div class="col-xs-4 text-right">
				<a href="<?php echo home_url(); ?>/events" class="all-button">VIEW ALL</a>
			</div>
			<div class="col-xs-12">
				<hr/>
			</div>
	</div>
</div>


<div class="container">
  <div class="row">
    <?php
    $current_timestamp = current_time('timestamp');
    $args = array(
      'post_type' => array('event'),
      'posts_per_page' => 3,
      'order' => 'DESC'
    );

    $upcoming_events_query = new WP_Query( $args );
    $rowCounter = 0;
    if( $upcoming_events_query->have_posts() ) {
      while( $upcoming_events_query->have_posts() ){
        $upcoming_events_query->the_post();
        $end_date_field = get_field('end_date');
        if ($end_date_field >= $current_timestamp) {

        ?>

          <article <?php post_class( 'col-md-4 xs-m-b-3 md-m-b-3 xs-m-t-3 md-m-t-3' ); ?>>
          		<span class="borough-badge"><?php $categories = get_the_category();
          		if ( ! empty( $categories ) ) {
          		    echo $categories[0]->name;
          		}
          		?></span>
          		<h6 class="event-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
          		<div class="secondary-type xs-m-b-1"><?php the_field( 'subtitle'); ?></div>
          		<div class="news-event-meta">
          			<span class="small-header">When</span>
          			<div class="event-data xs-m-b-1">
          				<?php the_field( 'exact_date'); ?>
          			</div>
          			<span class="small-header">Where</span>
          			<div class="event-data">
          				<?php the_field( 'address'); ?>
          			</div>
          		</div>
          </article>

        <?php
        $rowCounter++;
        if($rowCounter==3){
          echo('</div><div class="row">');//new row at 3rd post.
          $rowCounter = 0;
          }
        }
      }
    }
    wp_reset_query();
    ?>
  </div>
</div>


<div class="front-page-section featured-event md-m-y-3 xs-m-y-2">
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
			<div class="row">
					<div class="col-xs-8">
						<h6 class="text-uppercase">News & Campaigns</span>
					</div>
					<div class="col-xs-4 text-right">
						<a href="<?php echo home_url(); ?>/news" class="all-button">VIEW ALL</a>
					</div>
					<div class="col-xs-12">
						<hr/>
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
