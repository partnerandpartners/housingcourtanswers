<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 */
?>
<?php get_header();?>

<div class="container full">
		<div class="row md-m-b-2">
		   <div class="col-md-8 col-md-offset-2 text-center">
		     <h1 class="category-title">Error: 404</h1>
		     <h5 class="category-description">Sorry, we couldn't find the page you are looking for. You can try a search above or select a helpful topic below</h5>
		</div>
	</div>
</div>

	<div class="container">
		<div class="row">
		    <div class="col-md-12">
		    <div class="row xs-m-b-1">
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
                  //echo '<span class="no-link-small-header">'.$grandparent_category['name'].'</span>';
                }

                ?>
                <h5 class="sub-title"><a href="<?php echo $category['permalink']; ?>"><?php echo $category['name']; ?></a><span class="badge"><?php echo $category['count']; ?> Tips</span></h5>
                </div>
             </div>

            <?php
          }
        }

        ?>
		    </div>
	    </div>
	</div>

<?php get_footer();?>