<section class="section<?=$count;?> split layout grid-x">
  <?php if (have_rows("left")): ?>
  <div class="splitLeft section<?=$count;?>__left cell small-12 large-6 grid-x">
    <?php while (have_rows("left")): the_row(); $alignment = get_sub_field( "alignment" ); ?>
	    <div class="splitLeft__content section<?=$count;?>__leftContent leftContent content --<?= $alignment; ?> grid-x">
	    <?php if (get_sub_field("header") || get_sub_field("tagline") || get_sub_field("body")): ?>
	      <div class="splitLeft__textContent section<?=$count;?>__leftTextContent leftTextContent textContent cell">
        <?php if(get_sub_field( "header" ) ): ?><h2 class="splitLeft__heading section<?=$count;?>__leftHeading leftHeading heading"><?= get_sub_field( "header" ); ?></h2><?php endif; ?>
        <?php if(get_sub_field( "tagline" ) ): ?><h3 class="splitLeft__subheading section<?=$count;?>__leftSubheading leftSubheading subheading"><?= get_sub_field( "tagline" ); ?></h3><?php endif; ?>
        <?php if(get_sub_field( "body" ) ): ?><p class="splitLeft__text section<?=$count;?>__leftText lefttext text"><?= get_sub_field( "body" ); ?></p><?php endif; ?>
      </div>
    <?php endif;?>
    <?php if (get_sub_field("fg_image")): ?><img class="splitLeft__image section<?=$count;?>__leftImage leftImage split__image" src="<?= get_sub_field("fg_image")["url"]; ?>"><?php endif;?>
    <?php if (have_rows("left_buttons")): $btn_count = 1; ?>
	    <div class="splitLeft__buttons section<?=$count;?>__leftButtons align-<?= $alignment; ?> leftButtons buttons cell">
	    <?php while (have_rows("left_buttons")): the_row();?>
		      <a href="<?php the_sub_field("link");?>" class="splitLeft__button section<?=$count;?>__leftButton leftButton button<?=$btn_count;?> button"><?php the_sub_field("text");?></a>
		    <?php $btn_count++;endwhile;?>
	    </div>
	    <?php else: ?>
      <?php // no buttons found ?>
    <?php endif;?>
    </div>
    <?php endwhile;?>
  </div>
  <?php endif; // End of left content ?>
  <?php if (have_rows("right")): ?>
  <div class="splitRight section<?=$count;?>__right cell small-12 large-6 grid-x">
    <?php while (have_rows("right")): the_row(); $alignment = get_sub_field( "alignment" ); ?>
	    <div class="splitRight__content section<?=$count;?>__rightContent rightContent content --<?= $alignment; ?> grid-x">
	    <?php if (get_sub_field("header") || get_sub_field("tagline") || get_sub_field("body")): ?>
	      <div class="splitRight__textContent section<?=$count;?>__rightTextContent rightTextContent textContent cell">
        <?php if(get_sub_field( "header" ) ): ?><h2 class="splitRight__heading section<?=$count;?>__rightHeading rightHeading heading"><?= get_sub_field( "header" ); ?></h2><?php endif; ?>
        <?php if(get_sub_field( "tagline" ) ): ?><h3 class="splitRight__subheading section<?=$count;?>__rightSubheading rightSubheading subheading"><?= get_sub_field( "tagline" ); ?></h3><?php endif; ?>
        <?php if(get_sub_field( "body" ) ): ?><p class="splitRight__text section<?=$count;?>__rightText righttext text"><?= get_sub_field( "body" ); ?></p><?php endif; ?>
      </div>
    <?php endif;?>
  <?php if (get_sub_field("fg_image")): ?><img class="splitRight__image section<?=$count;?>__rightImage rightImage split__image" src="<?=get_sub_field("fg_image")["url"];?>"><?php endif;?>
  <?php if (have_rows("right_buttons")): $btn_count = 1; ?>
	  <div class="splitRight__buttons section<?=$count;?>__rightButtons align-<?= $alignment; ?> rightButtons buttons cell">
	  <?php while (have_rows("right_buttons")): the_row();?>
		    <a href="<?php the_sub_field("link");?>" class="splitRight__button section<?=$count;?>__rightButton button<?=$btn_count;?> rightButton button"><?php the_sub_field("text");?></a>
		  <?php $btn_count++;endwhile;?>
	  </div>
	  <?php else: ?>
    <?php // no buttons found ?>
  <?php endif;?>
  </div>
    <?php endwhile;?>
      </div>
  <?php endif; // End of right content ?>
</section>
