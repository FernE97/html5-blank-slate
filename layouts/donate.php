<?php $alignment = get_sub_field( 'alignment' ); ?>
<section class="section<?=$count;?> donate<?=$count;?> donate">
  <div class="section<?=$count;?>__content donate__content grid-x grid-margin-x">
    <?php if(get_sub_field("header") || get_sub_field("tagline") || get_sub_field("body")) : ?>
      <div class="donate__text cell small-12 medium-6">
        <?php if(get_sub_field( "header" ) ): ?><h2><?= get_sub_field( "header" ); ?></h2><?php endif; ?>
        <?php if(get_sub_field( "tagline" ) ): ?><h3><?= get_sub_field( "tagline" ); ?></h3><?php endif; ?>
        <?php if(get_sub_field( "body" ) ): ?><p><?= get_sub_field( "body" ); ?></p><?php endif; ?>
      </div>
    <?php endif; ?>
    <div class="section<?=$count;?>__donateFormWrap section<?=$count;?>__donateFormWrap--<?= $alignment; ?> donate__formWrap donate__formWrap--<?= $alignment; ?> cell small-12 medium-6">
      <form action="" class="section<?=$count;?>__donateForm donateForm donateForm<?=$count;?>">
        <fieldset>
          <input type="radio" id="section<?=$count;?>__donateOnce" name="donate" class="visuallyhidden" value="donateForm__once">
          <input type="radio" id="section<?=$count;?>__donateMonthly" name="donate" class="visuallyhidden" value="donateForm__monthly">
        </fieldset>
        <div class="section<?=$count;?>__selectInterval donateForm__selectInterval">
          <label for="section<?=$count;?>__donateOnce" class="section<?=$count;?>__onceLabel section<?=$count;?>__radioLabel donateForm__onceLabel donateForm__radioLabel donateForm__radioLabel--active js--amount" data-interval="once">GIVE ONCE</label>
          <label for="section<?=$count;?>__donateMonthly" class="section<?=$count;?>__monthlyLabel section<?=$count;?>__radioLabel donateForm__monthlyLabel donateForm__radioLabel js--amount" data-interval="monthly">MONTHLY</label>
        </div>

        <div class="section<?=$count;?>__donateFormContent donateForm__content">
        <?php if(get_sub_field('form_header')): ?><h4 class="section<?=$count;?>__donateFormHeading donateForm__heading"><?php the_sub_field( 'form_header' ); ?></h4><?php endif; ?>
          <div class="section<?=$count;?>__donateFormInputWrap donateForm__inputWrap">
            <div class="section<?=$count;?>__donateFormCurrencySymbol donateForm__currencySymbol">$</div>
              <input class="section<?=$count;?>__donateFormInput donateForm__input" value="<?= get_sub_field('value'); ?>" type="text">
            <div class="section<?=$count;?>__donateFormCurrency donateForm__currency">USD</div>
          </div>
          <div class="section<?=$count;?>__donateFormButtonWrap grid-x align-center">
            <a href="<?= get_sub_field('donation_link'); ?>" class="section<?=$count;?>__donateFormButton button donateForm__button donateForm<?= $count; ?>__button js--button-donate cell small-12">Donate</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>
