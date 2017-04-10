<?php get_header(); ?>

<div class="container full">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<article <?php post_class( 'xs-m-t-2' ); ?>>
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h2 class="article-title"><?php the_title(); ?></h2>
				<h4 class="section-description"><?php the_field("subtitle"); ?></h4>
				<div class="entry-content xs-m-t-1"><?php the_content(); ?></div>

				<div class="xs-m-t-3"><?php the_tags( '<span class="small-header">Terms in Article</span><br/>', ' ', '' ); ?></div>
				<div class="xs-m-t-6 text-center"><a class="btn btn-default" href="<?php echo home_url(); ?>/news">Back to All News</a></div>
			</div>
		</div>
	</article>
</div>

<?php endwhile; ?>
<?php endif; ?>



<?php get_footer();?>
