<article <?php post_class( 'col-md-4' ); ?>>
	<header>
		<h5 class="news-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
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
</article>
