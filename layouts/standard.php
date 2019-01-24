<?php $alignment = get_sub_field( 'alignment' ); ?>
<section class="standard standard<?=$count;?>">
  <div class="standard__content standard__content--<?= $alignment; ?>">
  <?php if(get_sub_field("header") || get_sub_field("tagline") || get_sub_field("body")) : ?>
      <div class="standard__text">
        <?php if(get_sub_field( "header" ) ): ?><h1><?= get_sub_field( "header" ); ?></h1><?php endif; ?>
        <?php if(get_sub_field( "tagline" ) ): ?><h2><?= get_sub_field( "tagline" ); ?></h2><?php endif; ?>
        <?php if(get_sub_field( "body" ) ): ?><p><?= get_sub_field( "body" ); ?></p><?php endif; ?>
      </div>
    <?php endif; ?>

  <?php if ( have_rows( 'buttons' ) ): $btn_count = 0; ?>
<div class="standard__buttons standard__buttons--<?= $alignment; ?> grid-x grid-margin-x <?= $alignment == 'center' ? 'align-center' : ''; ?>">
    <?php while ( have_rows( 'buttons' ) ): the_row(); ?>
      <a href="<?php the_sub_field( 'link' ); ?>" class="button standard__button standard<?=$count;?>__button<?=$btn_count;?>"><?php the_sub_field( 'text' ); ?></a>
    <?php $btn_count++; endwhile; ?>
    </div>
    <?php else: ?>
      <?php // no buttons found ?>
    <?php endif; ?>
  </div>
</section>
