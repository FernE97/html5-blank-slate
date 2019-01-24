<?php $alignment = get_sub_field( 'alignment' ); ?>
<section class="donate donate<?=$count;?>">
  <div class="donate__content grid-x grid-margin-x">
    <?php if(get_sub_field("header") || get_sub_field("tagline") || get_sub_field("body")) : ?>
      <div class="donate__text cell small-12 medium-6">
        <?php if(get_sub_field( "header" ) ): ?><h2><?= get_sub_field( "header" ); ?></h2><?php endif; ?>
        <?php if(get_sub_field( "tagline" ) ): ?><h3><?= get_sub_field( "tagline" ); ?></h3><?php endif; ?>
        <?php if(get_sub_field( "body" ) ): ?><p><?= get_sub_field( "body" ); ?></p><?php endif; ?>
      </div>
    <?php endif; ?>
    <div class="donate__formWrap donate__formWrap--<?= $alignment; ?> cell small-12 medium-6">
      <form action="" class="donateForm donateForm<?=$count;?>">
        <fieldset>
          <input type="radio" id="donateForm__once" name="donate" class="visuallyhidden" value="donateForm__once">
          <input type="radio" id="donateForm__monthly" name="donate" class="visuallyhidden" value="donateForm__monthly">
        </fieldset>
        <div class="donateForm__selectInterval">
          <label for="donateForm__once" class="donateForm__onceLabel donateForm__radioLabel donateForm__radioLabel--active js--amount" data-interval="once">GIVE ONCE</label>
          <label for="donateForm__monthly" class="donateForm__monthlyLabel donateForm__radioLabel js--amount" data-interval="monthly">MONTHLY</label>
        </div>

        <div class="donateForm__content">
        <?php if(get_sub_field('form_header')): ?><h4 class="donateForm__heading"><?php the_sub_field( 'form_header' ); ?></h4><?php endif; ?>
          <div class="donateForm__inputWrap">
            <div class="donateForm__currencySymbol">$</div>
              <input class="donateForm__input" value="<?= get_sub_field('value'); ?>" type="text">
            <div class="donateForm__currency">USD</div>
          </div>
          <div class="grid-x align-center">
            <a href="<?= get_sub_field('donation_link'); ?>" class="button donateForm__button donateForm<?= $count; ?>__button js--button-donate cell small-12">Donate</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>
