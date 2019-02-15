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
<section class="section<?=$count;?> postGrid layout grid-container full">
<?php if(get_sub_field("header") || get_sub_field("tagline") || get_sub_field("body")) : ?>
      <div class="postGrid__textContent section<?=$count;?>__textContent textContent --<?= get_sub_field('text_alignment'); ?>">
        <?php if(get_sub_field( "header" ) ): ?><h2 class="postGrid__heading section<?=$count;?>__heading heading"><?= get_sub_field( "header" ); ?></h2><?php endif; ?>
        <?php if(get_sub_field( "tagline" ) ): ?><h3 class="postGrid__subheading section<?=$count;?>__subheading subheading"><?= get_sub_field( "tagline" ); ?></h3><?php endif; ?>
        <?php if(get_sub_field( "body" ) ): ?><p class="postGrid__text section<?=$count;?>__text text"><?= get_sub_field( "body" ); ?></p><?php endif; ?>
      </div>
    <?php endif; ?>

  <div class="postGrid__wrapper section<?=$count;?>__postGridWrapper postGridWrapper grid-x">

    <?php
      // Uses `foreach` loop instead of `while have_posts` because multiple nested queries
      // won't loop over posts correctly using standard WP loop
      // https://support.advancedcustomfields.com/forums/topic/content-after-custom-loop-inside-flexible-content/#post-61513
      foreach ($query->posts as $nested_post):
        if($query_count <= $max || $max == "0"): ?>
          <div class="postGrid__item section<?=$count;?>__item item<?= $query_count; ?> item cell small-12 medium-6 large-4 xxlarge-3"
            <?php if(get_the_post_thumbnail_url($nested_post->ID)): ?>
              style="background-image: url('<?= get_the_post_thumbnail_url($nested_post->ID); ?>');"
            <?php endif; ?>>

            <?php if( get_post_type($nested_post->ID) == 'resources' ):
                include( locate_template('posts/resources.php') );
              else: ?>
                <h4 class="postGrid__itemHeading section<?=$count;?>__itemHeading itemHeading">
                  <?= get_the_title($nested_post->ID);?>
                </h4>
            <?php endif; ?>



            <?php
            /*

              If you need to display custom fields instead of values from the default editor,
              you can pass "$nested_post->ID" as the $post_id parameter in ACF functions like 'have_rows()' and 'get_field()'


              If you have multiple post types each with their own custom fields,
              it may be easier/manageable to check the post type then include its template if needed:


              <?php
                if( get_post_type($nested_post->ID) == 'resources' ):
                  include( locate_template('posts/resources.php') );

                elseif (get_post_type ($nested_post->ID) == 'projects'):
                  include( locate_template('posts/projects.php') );

                else:
                  include( locate_template('posts/default.php') );
                endif;
              ?>

            */
            ?>

          </div>
        <?php endif; $query_count++; ?>
      <?php endforeach; ?>
  </div>
</section>
<?php endif; ?>
