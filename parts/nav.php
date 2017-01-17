<?php
/**
* Nav Template Part
*
*/
$nav = wp_get_nav_menu_items( 'primary' );
$top_level_pages = array();
$sub_level_pages = array();
$top_level_pages_with_children = array();

/* Collect links for top and sub level and store */
foreach( $nav as $link ) {
    if( $link->menu_item_parent == 0 ) {
        $top_level_pages[] = $link;
    } else {
        $sub_level_pages[] = $link;
        // store the ids that have child items
        $top_level_pages_with_children[] = $link->menu_item_parent;
    }
}

?>

<?php if ( $nav ): ?>
    <div class="top-bar">
        <div class="top-bar-left">
            <ul class="dropdown menu" data-dropdown-menu>
                <li class="menu-text">
                    <a href="<?php echo home_url( '/' ); ?>">
                        <?php bloginfo( 'name' ); ?>
                    </a>
                </li>
                <?php foreach( $top_level_pages as $link ): ?>
                    <?php $parent_id = $link->ID; ?>
                    <li>
                        <a href="<?php echo get_permalink( $link->object_id ); ?>">
                            <?php echo $link->title; ?>
                        </a>
                        <?php if(in_array($link->ID, $top_level_pages_with_children)): ?>
                            <ul class="menu vertical">
                                <?php foreach ( $sub_level_pages as $sub_link ): ?>
                                    <?php $sub_id = $sub_link->menu_item_parent; ?>
                                    <?php if( $parent_id == $sub_id ): ?>
                                        <li>
                                            <a href="<?php echo get_permalink( $sub_id ); ?>">
                                                <?php echo $sub_link->title; ?>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="top-bar-right">
            <?php get_template_part( 'parts/searchform' ); ?>
        </div>
    </div><!-- .top-bar -->
<?php endif; ?>
