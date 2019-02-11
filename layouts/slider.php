<?php $shape = get_sub_field("shape"); ?>
<section class="section<?=$count;?> slider<?=$count;?> slider">
  <div class="section<?=$count;?>__content section<?=$count;?>__content--center slider__content slider__content--center">
  <?php if(get_sub_field("header") || get_sub_field("tagline") || get_sub_field("body")) : ?>
      <div class="section<?=$count;?>__text slider__text slider__text">
        <?php if(get_sub_field( "header" ) ): ?><h1><?= get_sub_field( "header" ); ?></h1><?php endif; ?>
        <?php if(get_sub_field( "tagline" ) ): ?><h2><?= get_sub_field( "tagline" ); ?></h2><?php endif; ?>
        <?php if(get_sub_field( "body" ) ): ?><p><?= get_sub_field( "body" ); ?></p><?php endif; ?>
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
              <div class="glide__slide <?= $shape; ?>glide__slide<?=$slide_count;?>">
                <a href="<?= get_sub_field("link"); ?>"></a>
              </div>
            <?php $slide_count++; endwhile; ?>
        </div>
      </div>
      <div class="glide__controls" data-glide-el="controls">
        <button data-glide-dir="<" role="button" aria-label="Previous" class="glide__arrow glide__prev glide__arrow--left">&#8678;</button>
        <button data-glide-dir=">" role="button" aria-label="Next" class="glide__arrow glide__next glide__arrow--right">&#8680;</button>
      </div>
    </div>

  <?php endif; ?>
</section>
