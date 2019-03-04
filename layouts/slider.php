<?php $shape = get_sub_field("shape"); ?>
<section id="<?= $id; ?>" class="<?= $id; ?> sliderLayout layout grid-y ">
  <div id="<?= $id; ?>-slider" class="sliderLayout__content <?= $id; ?>__content content layoutWrapper section<?= $count; ?>__layoutWrapper">
    <?php if($heading || $tagline || $body) : ?>
    <div class="sliderLayout__textContent <?= $id; ?>__textContent textContent  grid-x grid-padding-x">
      <?php if($heading): ?>
        <h2 class="sliderLayout__heading <?= $id; ?>__heading heading cell"><?= $heading; ?></h2>
      <?php endif; ?>
      <?php if($subheading): ?>
        <h3 class="sliderLayout__subheading <?= $id; ?>__subheading subheading cell"><?= $subheading; ?></h3>
      <?php endif; ?>
      <?php if($text): ?>
        <p class="sliderLayout__text <?= $id; ?>__text text cell"><?= $text; ?></p>
      <?php endif; ?>
    </div>
    <?php endif; ?>
  </div>
  <?php if ( have_rows( "slide" ) ) :
    $slide_count = 1;

    if($shape == "circle"):       $shape = "glide__slide--circle ";
    elseif($shape == "square"):   $shape = "glide__slide--square ";
    else:                         $shape = "glide__slide--default ";
    endif;
  ?>
  <div class="<?= $id; ?>__glideWrapper glideWrapper sliderLayout__glideWrapper layoutWrapper">
    <div class="glide slide">
      <div class="glide__track slide__track" data-glide-el="track">
        <div class="glide__slides slide__slides">
          <?php while ( have_rows( "slide" ) ) : the_row(); ?>
          <div class="glide__slide <?= $id; ?>__slide <?= $shape; ?>glide__slide<?=$slide_count;?>">
            <?php if(get_sub_field( 'link' )): ?>
              <a class="glide__link slide__link <?= $id; ?>__slideLink glide__outerSlideLink" href="<?= get_sub_field( 'link' ); ?>"></a>
            <?php endif; ?>

            <?php if( get_sub_field( 'heading' ) || get_sub_field( 'subheading' ) || get_sub_field( 'text' ) || get_sub_field( 'date' ) || get_sub_field('time') || get_sub_field( 'link' )) : ?>
              <div class="glide__textContent">
                <?php if(get_sub_field( 'heading' )): ?>
                  <h4 class="glide__heading slide__heading <?= $id; ?>__slideHeading"><?= get_sub_field( 'heading' ); ?></h4>
                <?php endif; ?>
                <?php if(get_sub_field( 'subheading' )): ?>
                  <h5 class="glide__subheading slide__subheading <?= $id; ?>__slideSubheading"><?= get_sub_field( 'subheading' ); ?></h5>
                <?php endif; ?>
                <?php if(get_sub_field( 'date' )): ?>
                  <p class="glide__date slide__date <?= $id; ?>__slideDate"><?= get_sub_field( 'date' ); ?></p>
                <?php endif; ?>
                <?php if(get_sub_field( 'time' )): ?>
                  <p class="glide__time slide__time <?= $id; ?>__slideTime"><?= get_sub_field( 'time' ); ?></p>
                <?php endif; ?>
                <?php if(get_sub_field( 'text' )): ?>
                  <p class="glide__text slide__text <?= $id; ?>__slideText"><?= get_sub_field( 'text' ); ?></p>
                <?php endif; ?>
                <?php if(get_sub_field( 'link' )): ?>
                  <a class="glide__link slide__link <?= $id; ?>__slideLink" href="<?= get_sub_field( 'link' ); ?>"><?= get_sub_field( 'link_text' ); ?></a><?php endif; ?>
              </div>
            <?php endif; ?>
          </div>
          <?php $slide_count++; endwhile; ?>
        </div>
      </div>
      <?php if ( $slide_count > 3 ) : ?>
        <div class="glide__controls" data-glide-el="controls">
          <button data-glide-dir="<" role="button" aria-label="Previous" class="glide__arrow <?= $id; ?>__arrow glide__prev <?= $id; ?>__prev glide__arrow--left">
            <?php include( get_template_directory() . '/parts/svg/arrow-left.php'); ?></button>
          <button data-glide-dir=">" role="button" aria-label="Next" class="glide__arrow <?= $id; ?>__arrow glide__next <?= $id; ?>__next glide__arrow--right">
            <?php include( get_template_directory() . '/parts/svg/arrow-right.php'); ?></button>
        </div>
      <?php endif; ?>
    </div>
  </div>
  <?php endif; ?>
</section>
