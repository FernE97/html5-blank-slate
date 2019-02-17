<header class="section<?=$count;?> banner layout grid-x align-middle">
  <div class="banner__content section<?=$count;?>__content content grid-container">
    <?php if($heading || $subheading || $text) : ?>
      <div class="banner__textContent section<?=$count;?>__textContent textContent grid-x grid-padding-x">
        <?php if($heading): ?>
          <h1 class="banner__heading section<?=$count;?>__heading heading cell --<?= $alignment; ?>"><?= $heading; ?></h1>
        <?php endif; ?>
        <?php if($subheading): ?>
          <h2 class="banner__subheading section<?=$count;?>__subheading subheading cell --<?= $alignment; ?>"><?= $subheading; ?></h2>
        <?php endif; ?>
        <?php if($text): ?>
          <p class="banner__text section<?=$count;?>__text text cell --<?= $alignment; ?> small-11 medium-8 xlarge-6"><?= $text; ?></p>
        <?php endif; ?>
      </div>
    <?php endif; ?>
    <?php if (have_rows("buttons")): $btn_count = 1; ?>
    <div class="banner__buttons section<?=$count;?>__buttons buttons grid-x grid-margin-x align-<?= $alignment; ?>">
      <?php while (have_rows("buttons")) : the_row(); ?>
        <a href="<?= get_sub_field( " link" ); ?>" class="banner__button section<?=$count;?>__button section<?=$count;?>__button<?=$btn_count;?> button large cell small-6 medium-4 large-3"><?= get_sub_field( "text" ); ?></a>
      <?php $btn_count++; endwhile; ?>
    </div>
  </div>
  <?php endif; ?>
  </div>
</header>
