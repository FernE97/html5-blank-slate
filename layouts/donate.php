<?php $alignment = get_sub_field( 'alignment' ); ?>
<section class="section<?=$count;?> donate layout">
  <div class="donate__content section<?=$count;?>__content grid-x grid-margin-x">
    <?php if(get_sub_field("header") || get_sub_field("tagline") || get_sub_field("body")) : ?>
      <div class="donate__textContent section<?=$count;?>__textContent cell small-12 large-6">
      <?php if(get_sub_field( "header" ) ): ?><h2 class="donate__heading section<?=$count;?>__heading heading"><?= get_sub_field( "header" ); ?></h2><?php endif; ?>
        <?php if(get_sub_field( "tagline" ) ): ?><h3 class="donate__subheading section<?=$count;?>__subheading subheading"><?= get_sub_field( "tagline" ); ?></h3><?php endif; ?>
        <?php if(get_sub_field( "body" ) ): ?><p class="donate__text section<?=$count;?>__text text"><?= get_sub_field( "body" ); ?></p><?php endif; ?>
      </div>
    <?php endif; ?>
    <div class="donate__formWrap section<?=$count;?>__formWrap --<?= $alignment; ?> cell small-12 large-6 grid-x grid-margin-x align-middle">
      <?php include( locate_template('/parts/donate_form.php') ); ?>
    </div>
  </div>
</section>
