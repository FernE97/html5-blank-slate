<?php $alignment = get_sub_field( 'alignment' ); ?>
<section class="section<?=$count;?> standard<?=$count;?> standard">
  <div class="section<?=$count;?>__content section<?=$count;?>__content--<?= $alignment; ?> standard__content standard__content--<?= $alignment; ?>">
  <?php if(get_sub_field("header") || get_sub_field("tagline") || get_sub_field("body")) : ?>
      <div class="section<?=$count;?>__text standard__text">
        <?php if(get_sub_field( "header" ) ): ?><h1><?= get_sub_field( "header" ); ?></h1><?php endif; ?>
        <?php if(get_sub_field( "tagline" ) ): ?><h2><?= get_sub_field( "tagline" ); ?></h2><?php endif; ?>
        <?php if(get_sub_field( "body" ) ): ?><p><?= get_sub_field( "body" ); ?></p><?php endif; ?>
      </div>
    <?php endif; ?>

  <?php if ( have_rows( 'buttons' ) ): $btn_count = 1; ?>
<div class="section<?=$count;?>__buttons section<?=$count;?>__buttons--<?= $alignment; ?> standard__buttons standard__buttons--<?= $alignment; ?> grid-x grid-margin-x <?= $alignment == 'center' ? 'align-center' : ''; ?>">
    <?php while ( have_rows( 'buttons' ) ): the_row(); ?>
      <a href="<?php the_sub_field( 'link' ); ?>" class="section<?=$count;?>__button section<?=$count;?>__button<?=$btn_count;?> button standard__button standard<?=$count;?>__button standard<?=$count;?>__button<?=$btn_count;?>"><?php the_sub_field( 'text' ); ?></a>
    <?php $btn_count++; endwhile; ?>
    </div>
    <?php else: ?>
      <?php // no buttons found ?>
    <?php endif; ?>
  </div>
</section>
