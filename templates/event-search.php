<article <?php post_class( 'col-md-4 xs-m-b-3 md-m-b-3' ); ?>>
		<?php the_category( '&#58; ' ); ?>
		<h6 class="news-event-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
		<div class="news-event-meta">
			<div class="event-date">
				<?php the_field( 'exact_date'); ?>
			</div>
			<div class="event-venue">
				<?php the_field( 'address'); ?>
			</div>
		</div>
	<div class="news-event-excerpt">
		<?php the_excerpt(); ?>
	</div>
</article>
