<article <?php post_class(); ?>>
	<span class="anchor" id="<?php echo( basename(get_permalink()) ); ?>"></span>
	<hr/>
	<h3 class="section-title"><?php the_title(); ?></h3>
	<div class="news-event-excerpt"><?php the_content(); ?></div>
</article>