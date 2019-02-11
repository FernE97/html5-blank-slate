<section class="section<?=$count;?> split<?=$count;?> split grid-x">
  <?php if ( have_rows( "left" ) ): ?>
  <div class="splitLeft splitLeft<?=$count;?> cell small-6">
    <?php while ( have_rows( "left" ) ): the_row(); ?>
    <div class="splitLeft__content splitLeft__content--<?= $alignment; ?> grid-y grid-margin-y">
    <?php if(get_sub_field("header") || get_sub_field("tagline") || get_sub_field("body")) : ?>
      <div class="splitLeft__text cell">
        <?php if(get_sub_field( "header" ) ): ?><h1><?= get_sub_field( "header" ); ?></h1><?php endif; ?>
        <?php if(get_sub_field( "tagline" ) ): ?><h2><?= get_sub_field( "tagline" ); ?></h2><?php endif; ?>
        <?php if(get_sub_field( "body" ) ): ?><p><?= get_sub_field( "body" ); ?></p><?php endif; ?>
      </div>
    <?php endif; ?>
    <?php if ( get_sub_field("image")):?><img class="splitLeft__image" src="<?= get_sub_field("image")["url"]; ?>"><?php endif;?>
    <?php if ( have_rows( "left_buttons" ) ): ?>
    <div class="splitLeft__buttons splitLeft__buttons--<?= $alignment; ?> cell">
    <?php while ( have_rows( "left_buttons" ) ): the_row(); ?>
      <a href="<?php the_sub_field( "link" ); ?>" class="button splitLeft__button splitLeft<?=$count;?>__button<?=$btn_count;?>"><?php the_sub_field( "text" ); ?></a>
    <?php endwhile; ?>
    </div>
    <?php else: ?>
      <?php // no buttons found ?>
    <?php endif; ?>
    </div>
    <?php endwhile; ?>
  </div>
  <?php endif; // End of left content ?>
  <?php if ( have_rows( "right" ) ): ?>
  <div class="splitRight splitRight<?=$count;?> cell small-6">
    <?php while ( have_rows( "right" ) ): the_row(); ?>
    <div class="splitRight__content splitRight__content--<?= $alignment; ?> grid-y grid-margin-y">
    <?php if(get_sub_field("header") || get_sub_field("tagline") || get_sub_field("body")) : ?>
      <div class="splitRight__text cell">
        <?php if(get_sub_field( "header" ) ): ?><h1><?= get_sub_field( "header" ); ?></h1><?php endif; ?>
        <?php if(get_sub_field( "tagline" ) ): ?><h2><?= get_sub_field( "tagline" ); ?></h2><?php endif; ?>
        <?php if(get_sub_field( "body" ) ): ?><p><?= get_sub_field( "body" ); ?></p><?php endif; ?>
      </div>
    <?php endif; ?>
  <?php if ( get_sub_field("image")):?><img class="splitRight__image" src="<?= get_sub_field("image")["url"]; ?>"><?php endif;?>
  <?php if ( have_rows( "right_buttons" ) ): ?>
  <div class="splitRight__buttons splitRight__buttons--<?= $alignment; ?> cell">
  <?php while ( have_rows( "right_buttons" ) ): the_row(); ?>
    <a href="<?php the_sub_field( "link" ); ?>" class="button splitRight__button splitRight<?=$count;?>__button<?=$btn_count;?>"><?php the_sub_field( "text" ); ?></a>
  <?php endwhile; ?>
  </div>
  <?php else: ?>
    <?php // no buttons found ?>
  <?php endif; ?>
  </div>
    <?php endwhile; ?>
      </div>
  <?php endif; // End of right content ?>
  </section>
