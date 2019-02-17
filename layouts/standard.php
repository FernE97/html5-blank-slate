<section class="section<?=$count;?> standard layout grid-x align-middle">
    <div class="standard__content section<?=$count;?>__content content grid-container">
      <?php if($heading || $subheading || $text) : ?>
      <div class="standard__textContent section<?=$count;?>__textContent textContent grid-x grid-padding-x">
        <?php if($heading): ?>
        <h2 class="standard__heading section<?=$count;?>__heading heading cell --<?= $alignment; ?>">
          <?= $heading; ?>
        </h2>
        <?php endif; ?>
        <?php if($subheading): ?>
        <h3 class="standard__subheading section<?=$count;?>__subheading subheading cell --<?= $alignment; ?>">
          <?= $subheading; ?>
        </h3>
        <?php endif; ?>
        <?php if(get_sub_field( "body" ) ): ?>
        <p class="standard__text section<?=$count;?>__text text cell small-11 medium-8 xlarge-6 --<?= $alignment; ?>">
          <?= get_sub_field( "body" ); ?>
        </p>
        <?php endif; ?>
      </div>
      <?php endif; ?>
      <?php if ( have_rows( 'buttons' ) ): $btn_count = 1; ?>
      <div class="standard__buttons section<?=$count;?>__buttons buttons grid-x grid-padding-x align-<?= $alignment; ?>">
        <?php while ( have_rows( 'buttons' ) ): the_row(); ?>
        <a href="<?php the_sub_field( 'link' ); ?>" class="standard__button section<?=$count;?>__button section<?=$count;?>__button<?=$btn_count;?> button large  cell small-6 medium-4 large-3">
          <?php the_sub_field( 'text' ); ?></a>
        <?php $btn_count++; endwhile; ?>
      </div>
      <?php else: ?>
      <?php // no buttons found ?>
      <?php endif; ?>
    </div>
</section>
