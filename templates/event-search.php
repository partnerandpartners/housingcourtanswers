<article <?php post_class( 'col-md-4' ); ?>>
	<header>
		<h6 class="news-event-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
		<div class="news-event-meta">
			<div class="event-date">
				<?php the_field( 'exact_date'); ?>
			</div>
			<div class="event-venue">
				<?php the_field( 'address'); ?>
			</div>
		</div>
	</header>
	<div class="news-event-excerpt">
		<?php the_excerpt(); ?>
	</div>
</article>