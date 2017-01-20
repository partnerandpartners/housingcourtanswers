<a href="<?php echo $sub_link ?>">
  <div class="card-wrapper">
    <div class="<?php echo $card_class ?>">
      <?php if ($card_class == 'card') { ?>
        <h5 class="card-title"><?php echo $sub_title ?></h5>
        <p><?php echo $sub_description ?></p>
          <a class="more-link text-uppercase" href="<?php echo $sub_link ?>">Read Answer</a>

      <?php } else { ?>
        <h4 class="card-title"><?php echo $sub_title ?></h4>
        <?php echo $sub_description ?>
        <a class="more-link text-uppercase" href="<?php echo $sub_link ?>">Learn More</a>
      <?php } ?>
    </div>
  </div>
</a>
