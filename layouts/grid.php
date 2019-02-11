<?php
$max = get_sub_field("number_of_posts");
$args = [
  "post_type" => get_sub_field( "post_type" ),
  "orderby" => "post_date",
  "order" => "ASC"
];
$query  = new WP_Query($args);
?>
<?php if (count($query->posts)): $query_count = 1; ?>
<section class="section<?=$count;?> postGrid<?=$count;?> postGrid grid-container fluid">
<?php if(get_sub_field("header") || get_sub_field("tagline") || get_sub_field("body")) : ?>
      <div class="postGrid__text postGrid__text--<?= get_sub_field('text_alignment'); ?>">
        <?php if(get_sub_field( "header" ) ): ?><h1><?= get_sub_field( "header" ); ?></h1><?php endif; ?>
        <?php if(get_sub_field( "tagline" ) ): ?><h2><?= get_sub_field( "tagline" ); ?></h2><?php endif; ?>
        <?php if(get_sub_field( "body" ) ): ?><p><?= get_sub_field( "body" ); ?></p><?php endif; ?>
      </div>
    <?php endif; ?>
  <div class="postGrid__wrapper grid-x grid-margin-x">
    <?php
      // Uses `foreach` loop instead of `while have_posts` because multiple nested queries
      // won't loop over posts correctly using standard WP loop
      // https://support.advancedcustomfields.com/forums/topic/content-after-custom-loop-inside-flexible-content/#post-61513
      foreach ($query->posts as $nested_post):
        if($query_count <= $max || $max == "0"): ?>
          <div class="postGrid__item postGrid__item<?= $query_count; ?> cell small-12 medium-6 large-4 xxlarge-3"
            <?php if(get_the_post_thumbnail_url($nested_post->ID)): ?>
              style="background-image: url('<?= get_the_post_thumbnail_url($nested_post->ID); ?>');"
            <?php endif; ?>>
            <h2><?php echo get_the_title($nested_post->ID);?></h2>
          </div>
        <?php endif; $query_count++; ?>
      <?php endforeach; ?>
  </div>
</section>
<?php endif; ?>
