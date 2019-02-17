<?php $shape = get_sub_field("shape"); ?>
<section class="section<?=$count;?> sliderLayout layout grid-y align-middle">
  <div class="sliderLayout__content section<?=$count;?>__content content grid-container">
  <?php if($heading || $tagline || $body) : ?>
      <div class="sliderLayout__textContent section<?=$count;?>__textContent textContent  grid-x grid-padding-x">
      <?php if($heading): ?><h2 class="sliderLayout__heading section<?=$count;?>__heading heading cell"><?= $heading; ?></h2><?php endif; ?>
        <?php if($subheading): ?><h3 class="sliderLayout__subheading section<?=$count;?>__subheading subheading cell"><?= $subheading; ?></h3><?php endif; ?>
        <?php if($text): ?><p class="sliderLayout__text section<?=$count;?>__text text cell"><?= $text; ?></p><?php endif; ?>
      </div>
    <?php endif; ?>
  </div>
  <?php if ( have_rows( "slide" ) ) : $slide_count = 1;
    if($shape == "circle"):       $shape = "glide__slide--circle ";
    elseif($shape == "square"):   $shape = "glide__slide--square ";
    else:                         $shape = "glide__slide--default ";
    endif;
  ?>
  <div class="section<?=$count;?>__glideWrapper glideWrapper sliderLayout__glideWrapper">
    <div class="glide">
      <div class="glide__track" data-glide-el="track">
        <div class="glide__slides">
            <?php while ( have_rows( "slide" ) ) : the_row(); ?>
              <div class="glide__slide section<?=$count;?>__slide <?= $shape; ?>glide__slide<?=$slide_count;?>">
                <a href="<?= get_sub_field("link"); ?>"></a>
              </div>
            <?php $slide_count++; endwhile; ?>
        </div>
      </div>
      <div class="glide__controls" data-glide-el="controls">
        <button data-glide-dir="<" role="button" aria-label="Previous" class="glide__arrow section<?=$count;?>__arrow glide__prev section<?=$count;?>__prev glide__arrow--left"><span class="fas fa-less-than"></span></button>
        <button data-glide-dir=">" role="button" aria-label="Next" class="glide__arrow section<?=$count;?>__arrow glide__next section<?=$count;?>__next glide__arrow--right"><span class="fas fa-greater-than"></span></button>
      </div>
    </div>
  </div>


  <?php endif; ?>
</section>
