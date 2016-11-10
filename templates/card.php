<a href="<?php echo $sub_link ?>">
  <div class="card-wrapper">
    <div class="<?php echo $card_class ?>">
      <?php if ($card_class == 'card') { ?>
        <h5><?php echo $sub_title ?></h5>
        <p>
          <?php echo $sub_description ?>
          <a class="more-link text-uppercase" href="<?php echo $sub_link ?>">Read Answer</a>
        </p>
      <?php } else { ?>
        <h4><?php echo $sub_title ?> <span class="badge"><?php echo $sub_tip_num ?> Tips</span></h4>
        <p>
          <?php echo $sub_description ?>
          <a class="more-link text-uppercase" href="<?php echo $sub_link ?>">More Answers</a>
        </p>
      <?php } ?>
    </div>
  </div>
</a>
