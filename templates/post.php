<article <?php post_class('col-md-8'); ?>>
	<h5 class="small-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h5>
	<div class="post-content">
	    <p><?php the_excerpt(); ?></p>
	</div>
</article>