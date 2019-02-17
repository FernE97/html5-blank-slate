<section class="section<?=$count;?> split layout grid-x align-middle small-gridY large-gridX">
  <?php if (have_rows("left")): ?>
  <div class="splitLeft section<?=$count;?>__left cell small-12 large-6 small-gutterY">
    <?php while (have_rows("left")): the_row(); $alignment = get_sub_field( "alignment" ); ?>
    <div class="splitLeft__content section<?=$count;?>__leftContent leftContent content grid-container small-gutterY xlarge-gutterXY">
      <?php if (get_sub_field("header") || get_sub_field("tagline") || get_sub_field("body")): ?>
      <div class="splitLeft__textContent section<?=$count;?>__leftTextContent leftTextContent textContent grid-x grid-padding-x small-gutterXY">
          <?php if(get_sub_field( "header" ) ): ?>
          <h2 class="splitLeft__heading section<?=$count;?>__leftHeading leftHeading heading cell --<?= $alignment; ?>">
            <?= get_sub_field( "header" ); ?>
          </h2>
          <?php endif; ?>
          <?php if(get_sub_field( "tagline" ) ): ?>
          <h3 class="splitLeft__subheading section<?=$count;?>__leftSubheading leftSubheading subheading cell --<?= $alignment; ?>">
            <?= get_sub_field( "tagline" ); ?>
          </h3>
          <?php endif; ?>
          <?php if(get_sub_field( "body" ) ): ?>
          <p class="splitLeft__text section<?=$count;?>__leftText lefttext text cell --<?= $alignment; ?>">
            <?= get_sub_field( "body" ); ?>
          </p>
          <?php endif; ?>
      </div>
      <?php endif; ?>
      <?php if (get_sub_field("fg_image")): ?>
      <div class="splitLeft__imageWrap section<?=$count;?>__leftImageWrap leftImageWrap split__imageWrap grid-x grid-margin-x small-gutterY large-gutterX">
        <img class="splitLeft__image section<?=$count;?>__leftImage leftImage split__image cell small-12 smallish-10 mediumish-9 large-11 xlarge-10 xxlarge-9" src="<?= get_sub_field("fg_image")["url"]; ?>"> </div>
      <?php endif; ?>
      <?php if (have_rows("left_buttons")): $btn_count = 1; ?>
      <div class="splitLeft__buttons section<?=$count;?>__leftButtons align-<?= $alignment; ?> leftButtons buttons grid-x grid-margin-x align-<?= $alignment; ?>">
        <?php while (have_rows("left_buttons")): the_row();?>
        <a href="<?php the_sub_field(" link");?>" class="splitLeft__button section<?=$count;?>__leftButton leftButton button<?=$btn_count;?> button  cell small-12 smallish-8 medium-6 mediumish-5 large-7 xlarge-5">
          <?php the_sub_field("text");?>
        </a>
        <?php $btn_count++;endwhile;?>
      </div>
      <?php endif; ?>
    </div>
    <?php endwhile; ?>
  </div>
  <?php endif; // End of left content ?>
  <?php if (have_rows("right")): ?>
  <div class="splitRight section<?=$count;?>__right cell small-12 large-6 small-gutterY">
    <?php while (have_rows("right")): the_row(); $alignment = get_sub_field( "alignment" ); ?>
    <div class="splitRight__content section<?=$count;?>__rightContent rightContent content grid-container small-gutterY xlarge-gutterXY">
      <?php if (get_sub_field("header") || get_sub_field("tagline") || get_sub_field("body")): ?>
      <div class="splitRight__textContent section<?=$count;?>__rightTextContent rightTextContent textContent grid-x grid-padding-x">
          <?php if(get_sub_field( "header" ) ): ?>
          <h2 class="splitRight__heading section<?=$count;?>__rightHeading rightHeading heading cell --<?= $alignment; ?>">
            <?= get_sub_field( "header" ); ?>
          </h2>
          <?php endif; ?>
          <?php if(get_sub_field( "tagline" ) ): ?>
          <h3 class="splitRight__subheading section<?=$count;?>__rightSubheading rightSubheading subheading cell --<?= $alignment; ?>">
            <?= get_sub_field( "tagline" ); ?>
          </h3>
          <?php endif; ?>
          <?php if(get_sub_field( "body" ) ): ?>
          <p class="splitRight__text section<?=$count;?>__rightText righttext text cell --<?= $alignment; ?>">
            <?= get_sub_field( "body" ); ?>
          </p>
          <?php endif; ?>
      </div>
      <?php endif; ?>
      <?php if (get_sub_field("fg_image")): ?>
      <div class="splitRight__imageWrap section<?=$count;?>__rightImageWrap rightImageWrap split__imageWrap grid-x grid-margin-x small-gutterY large-gutterX">
        <img class="splitRight__image section<?=$count;?>__rightImage rightImage split__image cell small-12 smallish-10 mediumish-9 large-11 xlarge-10 xxlarge-9" src="<?= get_sub_field("fg_image")["url"]; ?>"> </div>
      <?php endif; ?>
      <?php if (have_rows("right_buttons")): $btn_count = 1; ?>
      <div class="splitRight__buttons section<?=$count;?>__rightButtons align-<?= $alignment; ?> rightButtons buttons grid-x grid-margin-x align-<?= $alignment; ?>">
        <?php while (have_rows("right_buttons")): the_row();?>
        <a href="<?php the_sub_field(" link");?>" class="splitRight__button section<?=$count;?>__rightButton rightButton button<?=$btn_count;?> button  cell small-12 smallish-8 medium-6 mediumish-5 large-7 xlarge-5">
          <?php the_sub_field("text");?>
        </a>
        <?php $btn_count++;endwhile;?>
      </div>
      <?php endif; ?>
    </div>
    <?php endwhile; ?>
  </div>
  <?php endif; // End of right content ?>
</section>
