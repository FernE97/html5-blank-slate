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
  <section class="section<?=$count;?> postGrid layout grid-x align-middle">
  <div class="section<?=$count;?>__content postGrid__content content grid-container fluid small-gutterY">
  <?php if($heading || $subheading || $text) : ?>
      <div class="postGrid__textContent section<?=$count;?>__textContent textContent grid-x grid-padding-x">
        <?php if($heading): ?>
          <h2 class="postGrid__heading section<?=$count;?>__heading heading cell --center"><?= $heading; ?></h2>
        <?php endif; ?>
        <?php if($subheading): ?>
          <h3 class="postGrid__subheading section<?=$count;?>__subheading subheading cell --center"><?= $subheading; ?></h3>
        <?php endif; ?>
        <?php if($text): ?>
          <p class="postGrid__text section<?=$count;?>__text text cell --center small-11 medium-8 xlarge-6"><?= $text; ?></p>
        <?php endif; ?>
      </div>
    <?php endif; ?>

  <div class="postGrid__wrapper section<?=$count;?>__postGridWrapper postGridWrapper grid-x grid-margin-x">
    <?php
      // Uses `foreach` loop instead of `while have_posts` because multiple nested queries
      // won't loop over posts correctly using standard WP loop
      // https://support.advancedcustomfields.com/forums/topic/content-after-custom-loop-inside-flexible-content/#post-61513
      foreach ($query->posts as $nested_post):
        if($query_count <= $max || $max == "0"):
          include( locate_template('/layouts/posts/default.php') );
          // if( get_post_type($nested_post->ID) == 'post_type_one' ):
            // include( locate_template('/layouts/posts/one.php') );
          // elseif( get_post_type($nested_post->ID) == 'post_type_two' ):
              // include( locate_template('/layouts/posts/two.php') );
          // else:
            // include( locate_template('layouts/posts/default.php') );
          // endif;
        endif;
        $query_count++;
      endforeach;
    ?>
  </div>
    </div>
  </section>
<?php endif; ?>

<?php /*
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
*/ ?>


