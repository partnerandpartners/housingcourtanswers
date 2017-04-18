<article <?php post_class( 'col-md-4 xs-m-b-3 md-m-b-3 xs-m-t-3 md-m-t-3' ); ?>>
		<span class="borough-badge"><?php the_category( '&#58; ' ); ?></span>
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
