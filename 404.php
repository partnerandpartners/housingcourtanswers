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
		     <h5 class="category-description">Sorry, we couldn't find the page you are looking for. You can try a search above or select a topic or term below</h5>
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
				<div class="row xs-m-b-2">
						<div class="col-xs-6">
							<h6 class="text-uppercase">Popular Glossary Terms</h6>
						</div>
						<div class="col-xs-6 text-right">
							<a href="<?php echo home_url(); ?>/glossary" class="all-button"> VIEW ALL</a>
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


<?php get_footer();?>
