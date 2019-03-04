<section id="<?=$id;?>" class="<?= $id; ?> <?=$class;?> split layout grid-x">
  <?php if (have_rows("left")): ?>
  <div class="splitLeft <?= $id; ?>__left cell small-12 large-6">
    <?php while (have_rows("left")): the_row(); ?>
    <div class="splitLeft__content <?= $id; ?>__leftContent leftContent content">
      <?php if (get_sub_field("header") || get_sub_field("tagline") || get_sub_field("body")): ?>
      <div class="splitLeft__textContent <?= $id; ?>__leftTextContent leftTextContent textContent">
          <?php if(get_sub_field( "header" ) ): ?>
          <h2 class="splitLeft__heading <?= $id; ?>__leftHeading leftHeading heading"><?= get_sub_field( "header" ); ?></h2>
          <?php endif; ?>
          <?php if(get_sub_field( "tagline" ) ): ?>
          <h3 class="splitLeft__subheading <?= $id; ?>__leftSubheading leftSubheading subheading"><?= get_sub_field( "tagline" ); ?></h3>
          <?php endif; ?>
          <?php if(get_sub_field( "body" ) ): ?>
          <p class="splitLeft__text <?= $id; ?>__leftText lefttext text"><?= get_sub_field( "body" ); ?></p>
          <?php endif; ?>
      </div>
      <?php endif; ?>
      <?php if (get_sub_field("fg_image")): ?>
      <div class="splitLeft__imageWrap <?= $id; ?>__leftImageWrap leftImageWrap split__imageWrap">
        <img class="splitLeft__image <?= $id; ?>__leftImage leftImage split__image " src="<?= get_sub_field("fg_image")["url"]; ?>"> </div>
      <?php endif; ?>
      <?php if (have_rows("left_buttons")): $btn_count = 1; ?>
      <div class="splitLeft__buttons <?= $id; ?>__leftButtons leftButtons buttons grid-x grid-margin-x align-<?= $alignment; ?>">
        <?php while (have_rows("left_buttons")): the_row();?>
          <a href="<?php the_sub_field("link");?>" class="splitLeft__button <?= $id; ?>__leftButton leftButton button<?=$btn_count;?> button  cell small-10 smallish-8 medium-6 mediumish-5 large-7 xlarge-5">
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
  <div class="splitRight <?= $id; ?>__right cell small-12 large-6">
    <?php while (have_rows("right")): the_row(); ?>
    <div class="splitRight__content <?= $id; ?>__rightContent rightContent content">
      <?php if (get_sub_field("header") || get_sub_field("tagline") || get_sub_field("body")): ?>
      <div class="splitRight__textContent <?= $id; ?>__rightTextContent rightTextContent textContent">
          <?php if(get_sub_field( "header" ) ): ?>
          <h2 class="splitRight__heading <?= $id; ?>__rightHeading rightHeading heading "><?= get_sub_field( "header" ); ?></h2>
          <?php endif; ?>
          <?php if(get_sub_field( "tagline" ) ): ?>
          <h3 class="splitRight__subheading <?= $id; ?>__rightSubheading rightSubheading subheading "><?= get_sub_field( "tagline" ); ?></h3>
          <?php endif; ?>
          <?php if(get_sub_field( "body" ) ): ?>
          <p class="splitRight__text <?= $id; ?>__rightText righttext text  "><?= get_sub_field( "body" ); ?></p>
          <?php endif; ?>
      </div>
      <?php endif; ?>
      <?php if (get_sub_field("fg_image")): ?>
      <div class="splitRight__imageWrap <?= $id; ?>__rightImageWrap rightImageWrap split__imageWrap">
        <img class="splitRight__image <?= $id; ?>__rightImage rightImage split__image" src="<?= get_sub_field("fg_image")["url"]; ?>"> </div>
      <?php endif; ?>
      <?php if (have_rows("right_buttons")): $btn_count = 1; ?>
      <div class="splitRight__buttons <?= $id; ?>__rightButtons rightButtons buttons grid-x grid-margin-x align-<?= $alignment; ?>">
        <?php while (have_rows("right_buttons")): the_row();?>
        <a href="<?php the_sub_field("link");?>" class="splitRight__button <?= $id; ?>__rightButton rightButton button<?=$btn_count;?> button  cell small-10 smallish-8 medium-6 mediumish-5 large-7 xlarge-5">
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
