<?php if( have_rows( 'social_media', 'option' ) ) : ?>
    <ul class="social-icons">
        <li>Social Media</li>
        <?php while( have_rows( 'social_media', 'option' ) ) : the_row(); ?>
            <?php
            $title             = get_sub_field( 'title', 'option' );
            $font_awesome_icon = get_sub_field( 'font_awesome_icon', 'option' );
            $url               = get_sub_field( 'url', 'option' );
            ?>
            <a href="<?php echo $url; ?>">
                <i class="fa <?php echo $font_awesome_icon; ?>" aria-hidden="true" title="<?php echo $title; ?>"></i>
            </a>
        <?php endwhile; ?>
    </ul>
<?php endif; ?>
