<?php $alignment = get_sub_field( "alignment" ); ?>
<header class="banner banner<?=$count;?> grid-x">
  <div class="banner__content banner__content--<?= $alignment; ?> cell small-12 large-6">
  <?php if(get_sub_field("header") || get_sub_field("tagline") || get_sub_field("body")) : ?>
      <div class="banner__text">
        <?php if(get_sub_field( "header" ) ): ?><h1><?= get_sub_field( "header" ); ?></h1><?php endif; ?>
        <?php if(get_sub_field( "tagline" ) ): ?><h2><?= get_sub_field( "tagline" ); ?></h2><?php endif; ?>
        <?php if(get_sub_field( "body" ) ): ?><p><?= get_sub_field( "body" ); ?></p><?php endif; ?>
      </div>
    <?php endif; ?>
    <?php if ( have_rows( "buttons" ) ) : $btn_count = 1; ?>
      <div class="banner__buttons banner__buttons--<?= $alignment; ?> grid-x grid-margin-x align-center">
      <?php while ( have_rows( "buttons" ) ) : the_row(); ?>
        <a href="<?= get_sub_field( "link" ); ?>" class="button banner__button banner<?=$count;?>__button<?=$btn_count;?> cell small-8 medium-3"><?= get_sub_field( "text" ); ?></a>
      <?php $btn_count++; endwhile; ?>
      </div>
    <?php else : ?>
      <?php // no buttons found ?>
    <?php endif; ?>
  </div>
</header>
