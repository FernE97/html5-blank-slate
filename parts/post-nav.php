<?php
$prev_link = get_previous_posts_link( __( 'Newer Entries &raquo;', 'h5bs' ) );
$next_link = get_next_posts_link( __( '&laquo; Older Entries', 'h5bs' ) );

if ( $prev_link || $next_link ) { ?>
  <div class="page-nav">
    <?php if ( $next_link ) echo '<div class="alignleft">' . $next_link . '</div>'; ?>
    <?php if ( $prev_link ) echo '<div class="alignright">' . $prev_link . '</div>'; ?>
  </div>
<?php } ?>
