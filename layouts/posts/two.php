<div class="postGrid__item section<?=$count;?>__item item<?= $query_count; ?> cell item" <?php if(get_the_post_thumbnail_url($nested_post->ID)): ?> style="background-image: url('<?= get_the_post_thumbnail_url($nested_post->ID); ?>');"<?php endif; ?>>
  <?php // Just an example post item grid template
  if ( have_rows( 'resources', $nested_post->ID ) ) : ?>
    <?php while ( have_rows( 'resources', $nested_post->ID ) ) : the_row(); ?>
      <h4 class="postGrid__itemHeading section<?=$count;?>__itemHeading itemHeading">
          <?php the_sub_field( 'name' ); ?>
        </h4>
        <p class="postGrid__itemText section<?=$count;?>__itemText itemText">
          <?php the_sub_field( 'information' ); ?>
        </p>
        <a href="<?php the_sub_field( 'website' ); ?>" class="postGrid__itemButton section<?=$count;?>__itemButton itemButton button clear">VISIT SITE</a>
    <?php endwhile; ?>
  <?php endif; ?>
</div>
