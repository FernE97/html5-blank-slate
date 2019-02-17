<div class="postGrid__item section<?=$count;?>__item item<?= $query_count; ?> cell item" <?php if(get_the_post_thumbnail_url($nested_post->ID)): ?> style="background-image: url('<?= get_the_post_thumbnail_url($nested_post->ID); ?>');"<?php endif; ?>>
  <h4 class="postGrid__itemHeading section<?=$count;?>__itemHeading itemHeading"><?= esc_html(get_the_title($nested_post->ID));?></h4>
</div>
