<section class="section<?=$count;?> split<?=$count;?> split grid-x">
  <?php if (have_rows("left")): $alignment = get_sub_field( "alignment" ); ?>
  <div class="section<?=$count;?>__left splitLeft splitLeft<?=$count;?> cell small-6">
    <?php while (have_rows("left")): the_row();?>
	    <div class="section<?=$count;?>__leftContent splitLeft__content section<?=$count;?>__leftContent--<?=$alignment;?> splitLeft__content--<?=$alignment;?> grid-y grid-margin-y">
	    <?php if (get_sub_field("header") || get_sub_field("tagline") || get_sub_field("body")): ?>
	      <div class="section<?=$count;?>__leftText splitLeft__text cell">
        <?php if(get_sub_field( "header" ) ): ?><h2 class="section<?=$count;?>__heading heading"><?= get_sub_field( "header" ); ?></h2><?php endif; ?>
        <?php if(get_sub_field( "tagline" ) ): ?><h3 class="section<?=$count;?>__subheading subheading"><?= get_sub_field( "tagline" ); ?></h3><?php endif; ?>
        <?php if(get_sub_field( "body" ) ): ?><p class="section<?=$count;?>__bodyText bodyText"><?= get_sub_field( "body" ); ?></p><?php endif; ?>
      </div>
    <?php endif;?>
    <?php if (get_sub_field("fg_image")): ?><img class="section<?=$count;?>__leftImage splitLeft__image" src="<?=get_sub_field("fg_image")["url"];?>"><?php endif;?>
    <?php if (have_rows("left_buttons")): $btn_count = 1;?>
	    <div class="section<?=$count;?>__leftButtons splitLeft__buttons splitLeft__buttons--<?=$alignment;?> cell">
	    <?php while (have_rows("left_buttons")): the_row();?>
		      <a href="<?php the_sub_field("link");?>" class="section<?=$count;?>__leftButton section<?=$count;?>__leftButton<?=$btn_count;?> button splitLeft__button splitLeft<?=$count;?>__button<?=$btn_count;?>"><?php the_sub_field("text");?></a>
		    <?php $btn_count++;endwhile;?>
	    </div>
	    <?php else: ?>
      <?php // no buttons found ?>
    <?php endif;?>
    </div>
    <?php endwhile;?>
  </div>
  <?php endif; // End of left content ?>
  <?php if (have_rows("right")): $alignment = get_sub_field( "alignment" ); ?>
  <div class="section<?=$count;?>__right splitRight splitRight<?=$count;?> cell small-6">
    <?php while (have_rows("right")): the_row();?>
	    <div class="section<?=$count;?>__rightContent section<?=$count;?>__rightContent--<?=$alignment;?> splitRight__content splitRight__content--<?=$alignment;?> grid-y grid-margin-y">
	    <?php if (get_sub_field("header") || get_sub_field("tagline") || get_sub_field("body")): ?>
	      <div class="section<?=$count;?>__rightText splitRight__text cell">
        <?php if(get_sub_field( "header" ) ): ?><h2 class="section<?=$count;?>__heading heading"><?= get_sub_field( "header" ); ?></h2><?php endif; ?>
        <?php if(get_sub_field( "tagline" ) ): ?><h3 class="section<?=$count;?>__subheading subheading"><?= get_sub_field( "tagline" ); ?></h3><?php endif; ?>
        <?php if(get_sub_field( "body" ) ): ?><p class="section<?=$count;?>__bodyText bodyText"><?= get_sub_field( "body" ); ?></p><?php endif; ?>
      </div>
    <?php endif;?>
  <?php if (get_sub_field("fg_image")): ?><img class="section<?=$count;?>__rightImage splitRight__image" src="<?=get_sub_field("fg_image")["url"];?>"><?php endif;?>
  <?php if (have_rows("right_buttons")): $btn_count = 1;?>
	  <div class="section<?=$count;?>__rightButtons splitRight__buttons splitRight__buttons--<?=$alignment;?> cell">
	  <?php while (have_rows("right_buttons")): the_row();?>
		    <a href="<?php the_sub_field("link");?>" class="section<?=$count;?>__rightButton section<?=$count;?>__rightButton<?=$btn_count;?> button splitRight__button splitRight<?=$count;?>__button<?=$btn_count;?>"><?php the_sub_field("text");?></a>
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
