<?php $alignment = get_sub_field( 'alignment' ); ?>
<section id="<?=$id;?>" class="<?= $id; ?> <?=$class;?> donate layout">
  <div class="grid-container">
    <div class="donate__content <?= $id; ?>__content grid-x grid-margin-x">
      <?php if(get_sub_field("header") || get_sub_field("tagline") || get_sub_field("body")) : ?>
      <div class="donate__textContent <?= $id; ?>__textContent cell small-10 medium-8 large-6">
        <?php if(get_sub_field( "header" ) ): ?>
        <h2 class="donate__heading <?= $id; ?>__heading heading">
          <?= get_sub_field( "header" ); ?>
        </h2>
        <?php endif; ?>
        <?php if(get_sub_field( "tagline" ) ): ?>
        <h3 class="donate__subheading <?= $id; ?>__subheading subheading">
          <?= get_sub_field( "tagline" ); ?>
        </h3>
        <?php endif; ?>
        <?php if(get_sub_field( "body" ) ): ?>
        <p class="donate__text <?= $id; ?>__text text">
          <?= get_sub_field( "body" ); ?>
        </p>
        <?php endif; ?>
      </div>
      <?php endif; ?>
      <div class="donate__formWrap <?= $id; ?>__formWrap --<?= $alignment; ?> cell small-10 medium-8 large-6">
        <form action="" class="donate__form form">
          <fieldset>
            <input type="radio" id="donate__once" name="donate" class="visuallyhidden" value="once">
            <input type="radio" id="donate__monthly" name="donate" class="visuallyhidden" value="monthly">
          </fieldset>
          <div class="donate__interval ">
            <label for="donate__once" class="donate__onceLabel donate__radioLabel js--frequency" data-interval="once">GIVE ONCE</label>
            <label for="donate__monthly" class="donate__monthlyLabel donate__radioLabel" data-interval="monthly">MONTHLY</label>
          </div>
          <div class="donate__formContent ">
            <h4 class="donate__formHeading ">Enter an amount to give</h4>
            <div class="donate__inputWrap ">
              <div class="donate__currencySymbol ">$</div>
              <input class="donate__input js--amount" value="0" type="text">
              <div class="donate__currency">USD</div>
            </div>
            <div class="donate__buttonWrap buttonWrap grid-x align-center">
              <a href="/donate" class="donate__button button js--donateButton cell small-12">Donate</a>
            </div>
          </div>
        </form>

      </div>
    </div>
  </div>
</section>
