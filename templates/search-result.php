<a href="<?php the_permalink(); ?>">
  <div class="card-wrapper col-md-4 xs-m-b-3">
    <div class="card">
        <article <?php post_class(); ?>>
          <h5 class="card-title"><?php the_title(); ?></h5>
          <p><?php the_excerpt(); ?></p>
          <a class="more-link text-uppercase" href="<?php the_permalink(); ?>">Read More</a>
        </article>
    </div>
  </div>
</a>
