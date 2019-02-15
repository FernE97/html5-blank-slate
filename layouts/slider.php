<?php $shape = get_sub_field("shape"); ?>
<section class="section<?=$count;?> slider sliderLayout layout">
  <div class="slider__content section<?=$count;?>__content content --center">
  <?php if(get_sub_field("header") || get_sub_field("tagline") || get_sub_field("body")) : ?>
      <div class="slider__textContent section<?=$count;?>__textContent textContent">
      <?php if(get_sub_field( "header" ) ): ?><h2 class="slider__heading section<?=$count;?>__heading heading"><?= get_sub_field( "header" ); ?></h2><?php endif; ?>
        <?php if(get_sub_field( "tagline" ) ): ?><h3 class="slider__subheading section<?=$count;?>__subheading subheading"><?= get_sub_field( "tagline" ); ?></h3><?php endif; ?>
        <?php if(get_sub_field( "body" ) ): ?><p class="slider__text section<?=$count;?>__text text"><?= get_sub_field( "body" ); ?></p><?php endif; ?>
      </div>
    <?php endif; ?>
  </div>
  <?php if ( have_rows( "slide" ) ) : $slide_count = 1;
    if($shape == "circle"):       $shape = "glide__slide--circle ";
    elseif($shape == "square"):   $shape = "glide__slide--square ";
    else:                         $shape = "";
    endif;
  ?>
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
        <button data-glide-dir="<" role="button" aria-label="Previous" class="glide__arrow section<?=$count;?>__arrow glide__prev section<?=$count;?>__prev glide__arrow--left">&#8678;</button>
        <button data-glide-dir=">" role="button" aria-label="Next" class="glide__arrow section<?=$count;?>__arrow glide__next section<?=$count;?>__next glide__arrow--right">&#8680;</button>
      </div>
    </div>

  <?php endif; ?>
</section>
