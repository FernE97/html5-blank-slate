<?php $alignment = get_sub_field( "alignment" ); ?>
<header class="section<?=$count;?> banner layout grid-x">
  <div class="banner__content section<?=$count;?>__content content --<?= $alignment; ?> cell small-12 xlarge-6">
  <?php if(get_sub_field("header") || get_sub_field("tagline") || get_sub_field("body")) : ?>
      <div class="banner__textContent section<?=$count;?>__textContent textContent">
      <?php if(get_sub_field( "header" ) ): ?><h1 class="banner__heading section<?=$count;?>__heading heading"><?= get_sub_field( "header" ); ?></h1><?php endif; ?>
        <?php if(get_sub_field( "tagline" ) ): ?><h2 class="banner__subheading section<?=$count;?>__subheading subheading"><?= get_sub_field( "tagline" ); ?></h2><?php endif; ?>
        <?php if(get_sub_field( "body" ) ): ?><p class="banner__text section<?=$count;?>__text text"><?= get_sub_field( "body" ); ?></p><?php endif; ?>
      </div>
    <?php endif; ?>
    <?php if ( have_rows( "buttons" ) ) : $btn_count = 1; ?>
      <div class="banner__buttons section<?=$count;?>__buttons align-<?= $alignment; ?> buttons grid-x grid-margin-x">
      <?php while ( have_rows( "buttons" ) ) : the_row(); ?>
        <a href="<?= get_sub_field( "link" ); ?>" class="banner__button section<?=$count;?>__button button<?=$btn_count;?> button large cell small-8 medium-4"><?= get_sub_field( "text" ); ?></a>
      <?php $btn_count++; endwhile; ?>
      </div>
    <?php else : ?>
      <?php // no buttons found ?>
    <?php endif; ?>
  </div>
</header>
