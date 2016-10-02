<article <?php post_class( 'col-md-4' ); ?>>
    <span class="news-event-date"><?php the_date(); ?><span>
	<header>
		<h6 class="news-event-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
		<h6 class="news-event-subtitle"><?php the_field('subtitle'); ?></h6>
	</header>
	<div class="news-event-excerpt">
		<?php the_excerpt(); ?>
	</div>
</article>