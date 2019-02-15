<?php $alignment = get_sub_field( 'alignment' ); ?>
<section class="section<?=$count;?> donate layout">
  <div class="donate__content section<?=$count;?>__content grid-x grid-margin-x">
    <?php if(get_sub_field("header") || get_sub_field("tagline") || get_sub_field("body")) : ?>
      <div class="donate__textContent section<?=$count;?>__textContent cell small-12 medium-6">
      <?php if(get_sub_field( "header" ) ): ?><h2 class="donate__heading section<?=$count;?>__heading heading"><?= get_sub_field( "header" ); ?></h2><?php endif; ?>
        <?php if(get_sub_field( "tagline" ) ): ?><h3 class="donate__subheading section<?=$count;?>__subheading subheading"><?= get_sub_field( "tagline" ); ?></h3><?php endif; ?>
        <?php if(get_sub_field( "body" ) ): ?><p class="donate__text section<?=$count;?>__text text"><?= get_sub_field( "body" ); ?></p><?php endif; ?>
      </div>
    <?php endif; ?>
    <div class="donate__formWrap section<?=$count;?>__formWrap --<?= $alignment; ?> cell small-12 medium-6">
      <form action="" class="donate__form">
        <fieldset>
          <input type="radio" id="donate__once" name="donate" class="visuallyhidden" value="once">
          <input type="radio" id="donate__monthly" name="donate" class="visuallyhidden" value="monthly">
        </fieldset>
        <div class="donate__interval">
          <label for="donate__once" class="donate__onceLabel section<?=$count;?>__onceLabel donate__radioLabel section<?=$count;?>__radioLabel js--active js--amount" data-interval="once">GIVE ONCE</label>
          <label for="donate__monthly" class="donate__monthlyLabel section<?=$count;?>__monthlyLabel donate__radioLabel section<?=$count;?>__radioLabel js--amount" data-interval="monthly">MONTHLY</label>
        </div>

        <div class="donate__formContent">
          <?php if(get_sub_field('form_header')): ?>
            <h4 class="donate__formHeading"><?php the_sub_field( 'form_header' ); ?></h4>
          <?php endif; ?>
          <div class="donate__inputWrap">
            <div class="donate__currencySymbol">$</div>
              <input class="donate__input" value="<?= get_sub_field('value'); ?>" type="text">
            <div class="donate__currency">USD</div>
          </div>
          <div class="donate__buttonWrap section<?=$count;?>__buttonWrap grid-x align-center">
            <a href="<?= get_sub_field('donation_link'); ?>" class="donate__button section<?=$count;?>__button button js--button-donate cell small-12">Donate</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>
