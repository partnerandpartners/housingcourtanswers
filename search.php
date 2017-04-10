<?php


get_header();

$search_query = get_search_query();

// if( empty( $search_query ) ) {
//   echo 'EMPTTY';
// }


$num_matching_posts = 0;
$num_matching_categories = 0;
$num_matching_tags = 0;


function housing_court_get_search_posts( $search_query, $template, $post_type, $num_to_display, $category_id = false ) {

  $query_args = array(
    'posts_per_page' => $num_to_display,
    's' => $search_query,
    'post_type' => $post_type
  );

  if( $category_id ) {
    $query_args['cat'] = $category_id;
  }

  $query = new WP_Query( $query_args );

  $num_matching_posts = 0;
  $output = '';

  if( $query->have_posts() ) {

    ob_start();


    $num_matching_posts = $query->found_posts;

    while( $query->have_posts() ) {
      $query->the_post();

      get_template_part( $template );
    }

    $output = ob_get_clean();
  }
  wp_reset_postdata();

  return array(
    'output' => $output,
    'num_matching_posts' => $num_matching_posts
  );
}


function housing_court_print_results_string( $num_results, $no_results, $one_result, $many_results ) {
  if( $num_results == 0 ) {
    echo $no_results;
  } else if( $num_results == 1 ) {
    echo $one_result;
  } else {
    echo sprintf( $many_results, $num_results );
  }
}

$categories_output = '';
$tags_ouput = '';

if( !empty($search_query) ) {

  $num_matching_categories = 0;
  $num_matching_tags = 0;

  // CATEGORIES
  $categories = get_terms(array(
    'search' => $search_query,
    'taxonomy' => 'category'
  ));



  if( $categories ) {

    ob_start();
    foreach( $categories as $category ) {
      $num_matching_categories++;

      $count = ' <span class="badge">' . $category->count . ' Tips</span>';
      if( $category->count === 1 ) {
        $count = ' <span class="badge">'.$category->count.' Tip</span>';
      }

      echo '<article><div class="cat-result"><span class="topic-link"><a href="'.get_term_link($category->term_id, 'category').'">' . $category->name . '</a>' . $count . '</span></div></article>';
    }
    $categories_output = ob_get_clean();

  }




  // TAGS
  $tags = get_terms(array(
    'search' => $search_query,
    'taxonomy' => 'post_tag'
  ));



  if( $tags ) {
    ob_start();
    foreach( $tags as $tag ) {
      $num_matching_tags++;
      echo '<a class="btn btn-default" rel="tag" href="'.get_term_link($tag->term_id, 'post_tag').'">' . $tag->name . '</a>';
    }
    $tags_ouput = ob_get_clean();
  }
}


if ( !empty($search_query) ):

  ?>

  <div class="full container">


    <div class="row xs-m-b-3">

      <div class="col-xs-12 col-md-6">
        <h3>Topics</h3>
        <div class="small-header"><?php housing_court_print_results_string( $num_matching_categories, 'No Matches Found', '1 Match Found', '%s Matches Found' ); ?></div>
        <?php echo $categories_output; ?>
      </div>

      <div class="col-xs-12 col-md-6">
      	<div class="row">
      		<div class="col-xs-12">
	        <h3>Glossary</h3>
      		</div>
      		<div class="col-xs-6">
	        	<div class="small-header"><?php housing_court_print_results_string( $num_matching_tags, 'No Matches Found', '1 Match Found', '%s Matches Found' ); ?></div>
      		</div>
      		<div class="col-xs-6 text-right">
	        <a href="<?php echo get_page_link( get_page_by_title('Glossary') ); ?>">View All Terms &rarr;</a>
      		</div>
        </div>

        <div class="row">
        	<div class="col-xs-12">
        	<?php echo $tags_ouput; ?>
        	</div>
        </div>
      </div>

    </div>


    <div class="row xs-m-b-3">
      <div class="col-xs-12">
        <h3>For Tenants</h3>

        <?php

        $for_tenants_results = housing_court_get_search_posts( $search_query, 'templates/search-result', 'post', -1, get_cat_id('For Tenants') );

        ?>
        <div class="small-header"><?php housing_court_print_results_string( $for_tenants_results['num_matching_posts'], 'No Matches Found', '1 Match Found', '%s Matches Found' ); ?></div>
        <a href="<?php echo get_category_link( get_cat_id('For Tenants') ); ?>">View All For Tenants &rarr;</a>
        <?php echo $for_tenants_results['output']; ?>
      </div>
    </div>


    <div class="row xs-m-b-3">
      <div class="col-xs-12">
        <h3>For Landlords</h3>
        <?php

        $for_landlords_results = housing_court_get_search_posts( $search_query, 'templates/search-result', 'post', -1, get_cat_id('For Landlords') );

        ?>
        <div class="small-header"><?php housing_court_print_results_string( $for_landlords_results['num_matching_posts'], 'No Matches Found', '1 Match Found', '%s Matches Found' ); ?></div>
        <a href="<?php echo get_category_link( get_cat_id('For Landlords') ); ?>">View All For Landlords &rarr;</a>
        <?php echo $for_landlords_results['output']; ?>
      </div>
    </div>

    <div class="row xs-m-b-3">
      <div class="col-xs-12">
        <h3>Events</h3>
        <?php

        $events_results = housing_court_get_search_posts( $search_query, 'templates/search-result', 'event', -1 );

        ?>
        <div class="small-header"><?php housing_court_print_results_string( $events_results['num_matching_posts'], 'No Matches Found', '1 Match Found', '%s Matches Found' ); ?></div>
        <?php echo $events_results['output']; ?>
      </div>
    </div>

    <div class="row xs-m-b-3">
      <div class="col-xs-12">
        <h3>News & Campaigns</h3>
        <?php

        $news_results = housing_court_get_search_posts( $search_query, 'templates/search-result', 'news', -1 );

        ?>
        <div class="small-header"><?php housing_court_print_results_string( $news_results['num_matching_posts'], 'No Matches Found', '1 Match Found', '%s Matches Found' ); ?></div>
        <?php echo $news_results['output']; ?>
      </div>
    </div>

  </div>

  <?php

endif; ?>

<div class="front-page-section popular-search">
	<div class="container xs-m-b-3">
			<div class="row xs-m-b-2">
					<div class="col-xs-6">
						<h6 class="text-uppercase">Popular Topics</span>
					</div>
					<div class="col-xs-6 text-right">
						<span class="text-uppercase">ALL</span>
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
				<div class="row xs-m-b-2">
						<div class="col-xs-6">
							<h6 class="text-uppercase">From the Glossary</span>
						</div>
						<div class="col-xs-6 text-right">
							<span class="text-uppercase">ALL</span>
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

<?php get_footer();
