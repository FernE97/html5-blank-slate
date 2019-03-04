<section id="<?=$id;?>" class="<?=$id;?> <?=$class;?> standard layout grid-x align-middle">
    <div class="<?=$id;?>__content standard__content content layoutWrapper --<?= $alignment; ?>">
      <?php if($heading || $subheading || $text) : ?>
      <div class="<?=$id;?>__textContent standard__textContent textContent">
        <?php if($heading): ?>
        <h2 class="<?=$id;?>__heading standard__heading heading">
          <?= $heading; ?>
        </h2>
        <?php endif; ?>
        <?php if($subheading): ?>
        <h3 class="standard__subheading <?=$id;?>__subheading subheading ">
          <?= $subheading; ?>
        </h3>
        <?php endif; ?>
        <?php if(get_sub_field( "body" ) ): ?>
        <p class="standard__text <?=$id;?>__text text cell small-11 medium-8 xlarge-6 ">
          <?= get_sub_field( "body" ); ?>
        </p>
        <?php endif; ?>
      </div>
      <?php endif; ?>
      <?php if ( have_rows( 'buttons' ) ): $btn_count = 1; ?>
      <div class="standard__buttons <?=$id;?>__buttons buttons grid-x grid-margin-x align-<?= $alignment; ?>">
        <?php while ( have_rows( 'buttons' ) ): the_row(); ?>
        <a href="<?php the_sub_field( 'link' ); ?>" class="standard__button <?=$id;?>__button <?=$id;?>__button<?=$btn_count;?> button large  cell small-10 smallish-6 medium-4 large-3">
          <?php the_sub_field( 'text' ); ?></a>
        <?php $btn_count++; endwhile; ?>
      </div>
      <?php else: ?>
      <?php // no buttons found ?>
      <?php endif; ?>
    </div>
</section>
