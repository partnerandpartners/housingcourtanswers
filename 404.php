<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 */
?>
<?php get_header();?>


<div class="front-page-section statement">
	<div class="container md-bottom">
	    <div class="row">
		    <div class="col-sm-10 col-sm-offset-1">
		    <h1 class="category-title text-center">404: Page Not Found</h1>
		    <h5 class="category-description text-center">Whoops! Try a search above or select a helpful topic below</h5>
		    </div>
	    </div>
	</div>
</div>

<div class="front-page-section popular-search">
	<div class="container">
		<div class="row">
		    <div class="col-md-8 col-md-offset-2 highlight">
		    <div class="row xs-top"><div class="col-xs-6 xs-padding-bottom"><span class="medium-header">Helpful Topics</span></div><div class="col-xs-6 text-right xs-padding-bottom"><span class="medium-header">View All Topics &rarr;</span></div><hr\></div>
		    <?php while( has_sub_field('helpful_topics') ): ?>
		    <div class="row">
			    <div class="col-xs-6">
			    <h5 class="small-title"><a href="<?php the_sub_field('link'); ?>"><?php the_sub_field('topic_name'); ?></a></h5>
			    </div>
			    <div class="col-xs-6 text-right">
			    <h5 class="small-title"></h5>
			    </div>
			</div>
			<?php endwhile; ?>
		    </div>
	    </div>
	</div>
</div>

<?php get_footer();?>