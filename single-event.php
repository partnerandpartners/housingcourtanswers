<?php get_header(); ?>



<div class="container full">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<article <?php post_class( 'xs-m-t-2' ); ?>>
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
			<div class="xs-m-b-1"><span class="borough-badge"><?php the_category( '&#58; ' ); ?></span></div>
			<h2 class="article-title"><?php the_title(); ?></h2>
			<?php if( get_field('subtitle') ) { ?>
		    <h5 class="xs-p-b-2"><?php the_field('subtitle'); ?></h5>
		  <?php } else { ?>
		  <?php } ?>
			<div class="news-event-meta">
				<span class="small-header">When</span>
				<div class="detail-event-data xs-m-b-2">
					<?php the_field( 'exact_date'); ?>
				</div>
				<span class="small-header">Where</span>
				<div class="detail-event-data xs-m-b-2">
					<?php the_field( 'address'); ?>
				</div>
			</div>
			<div class="entry-content"><?php the_content(); ?></div>
			<div class="xs-m-t-3"><?php the_tags( '<span class="small-header">Event Terms</span><br/>', ' ', '' ); ?></div>
			<div class="xs-m-t-6 text-center"><a class="btn btn-default" href="<?php echo home_url(); ?>/events">Back to All Events</a></div>
		</div>
		</div>
	</article>

</div>

<?php endwhile; ?>

<?php endif; ?>



<?php get_footer();?>
