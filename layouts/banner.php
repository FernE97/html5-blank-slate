<header id="<?=$id;?>" class="<?= $id; ?> <?=$class;?> banner layout nonSplitLayout grid-x align-middle">
  <div class="<?= $id; ?>__content banner__content content layoutWrapper --<?= $alignment; ?>">
    <?php if($heading || $subheading || $text) : ?>
      <div class="<?= $id; ?>__textContent banner__textContent textContent">
        <?php if($heading): ?>
          <h1 class="<?= $id; ?>__heading banner__heading heading"><?= $heading; ?></h1>
        <?php endif; ?>
        <?php if($subheading): ?>
          <h2 class="<?= $id; ?>__subheading banner__subheading subheading"><?= $subheading; ?></h2>
        <?php endif; ?>
        <?php if($text): ?>
          <p class="<?= $id; ?>__text banner__text text "><?= $text; ?></p>
        <?php endif; ?>
      </div>
    <?php endif; ?>
    <?php if (have_rows("buttons")): $btn_count = 1; ?>
      <div class="<?= $id; ?>__buttons banner__buttons buttons grid-x grid-margin-x align-<?= $alignment; ?>">
        <?php while (have_rows("buttons")) : the_row(); ?>
          <a href="<?= get_sub_field("link"); ?>" class="<?= $id; ?>__button <?= $id; ?>__button<?=$btn_count;?> banner__button button large cell small-10 smallish-6 medium-4 large-3"><?= get_sub_field("text"); ?></a>
        <?php $btn_count++; endwhile; ?>
      </div>
      <?php endif; ?>
  </div>
</header>
