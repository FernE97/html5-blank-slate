<?php $alignment = get_sub_field( 'alignment' ); ?>
<section class="section<?=$count;?> standard layout grid-x">
  <div class="standard__content section<?=$count;?>__content content --<?= $alignment; ?> small-12 xlarge-6">
  <?php if(get_sub_field("header") || get_sub_field("tagline") || get_sub_field("body")) : ?>
      <div class="standard__textContent section<?=$count;?>__textContent textContent">
      <?php if(get_sub_field( "header" ) ): ?><h2 class="standard__heading section<?=$count;?>__heading heading"><?= get_sub_field( "header" ); ?></h2><?php endif; ?>
        <?php if(get_sub_field( "tagline" ) ): ?><h3 class="standard__subheading section<?=$count;?>__subheading subheading"><?= get_sub_field( "tagline" ); ?></h3><?php endif; ?>
        <?php if(get_sub_field( "body" ) ): ?><p class="standard__text section<?=$count;?>__text text"><?= get_sub_field( "body" ); ?></p><?php endif; ?>
      </div>
    <?php endif; ?>

  <?php if ( have_rows( 'buttons' ) ): $btn_count = 1; ?>
<div class="standard__buttons section<?=$count;?>__buttons align-<?= $alignment; ?> buttons grid-x grid-margin-x">
    <?php while ( have_rows( 'buttons' ) ): the_row(); ?>
      <a href="<?php the_sub_field( 'link' ); ?>" class="standard__button section<?=$count;?>__button button<?=$btn_count;?> button large"><?php the_sub_field( 'text' ); ?></a>
    <?php $btn_count++; endwhile; ?>
    </div>
    <?php else: ?>
      <?php // no buttons found ?>
    <?php endif; ?>
  </div>
</section>
