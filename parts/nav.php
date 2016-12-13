<div class="top-bar">
  <div class="top-bar-left">
    <ul class="dropdown menu" data-dropdown-menu>
      <li class="menu-text"><a href="<?php echo home_url( '/' ); ?>"><?php bloginfo( 'name' ); ?></a></li>
      <li>
        <a href="#">One</a>
        <ul class="menu vertical">
          <li><a href="#">One</a></li>
          <li><a href="#">Two</a></li>
          <li><a href="#">Three</a></li>
        </ul>
      </li>
      <li><a href="#">Two</a></li>
      <li><a href="#">Three</a></li>
    </ul>
  </div>
  <div class="top-bar-right">
    <ul class="menu">
      <li><input type="search" placeholder="Search"></li>
      <li><button type="button" class="button">Search</button></li>
    </ul>
  </div>
</div>

<?php $nav = wp_get_nav_menu_items( 'primary-menu' ); ?>


<?php if ( $nav ): ?>
    <ul class="menu">
        <?php foreach ( $nav as $nav_item ): ?>
        <li>
            <a href="#">
                <?php echo $nav_item->title; ?>
                <?php if( $nav_item->menu_item_parent > 0 ): ?>

                <?php endif; ?>
            </a>
        </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
