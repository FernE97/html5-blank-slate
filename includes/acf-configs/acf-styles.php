<?php
/**
 * Styles that rely on values from ACF are generated here
 * Non-ACF styling is contained within /src/scss/layouts/
 *
 *
 * Each time submitted $_POST data is saved,
 * such as pressing "Update" on the WP Admin page/post editor pages,
 * the "generate_acf_css" function within functions.php
 * will use this file to create/update the acf-styles.css file and enqueue it
 * https://www.advancedcustomfields.com/resources/acf-save_post/
 */
 ?>

<?php foreach (get_pages() as $key => $data): ?>
  <?php if ( have_rows( 'flex', $data->ID ) ): $count = 1; // Each page containing the flex field ?>
    <?php while ( have_rows( 'flex', $data->ID ) ): the_row(); ?>

      <?php
        // If there is an ID value provided,
        // use it for the BEM naming and ACF styles.
        // Otherwise, use a generic section# class name.
        $id = get_sub_field("section_id") ?: "section{$count}";
      ?>

      <?php //***** Non-split layouts ?>
      <?php if (get_row_layout() != 'split_section'): ?>
        <?php if (get_sub_field( 'bg_image' )): // Section background image ?>
          .page<?= $data->ID; ?> .<?= $id; ?>:before {
            background-image: url('<?= get_sub_field('bg_image')['url']; ?>');
          }
        <?php endif; ?>

        <?php if(get_sub_field( 'bg_color' )): // Section background color ?>
          .page<?= $data->ID; ?> .<?= $id; ?>:after {

            background-color: <?= get_sub_field( 'bg_color' ); ?>;
            <?php // If there is a background image, use background color as an overlay ?>
            <?php if (get_sub_field( 'bg_image' )): ?>
              opacity: <?= get_sub_field( 'bg_opacity' )/100; ?>;
            <?php endif; // Otherwise leave it as solid background color ?>
          }
        <?php endif; ?>

        <?php if (get_sub_field( 'text_bg_color' )): // Content background overlay ?>
          .page<?= $data->ID; ?> .<?= $id; ?>__content:before {
            background-color: <?= get_sub_field( 'text_bg_color' ); ?>;
            <?php if (get_sub_field( 'text_bg_opacity' )): ?>
              opacity: <?= get_sub_field( 'text_bg_opacity' )/100; ?>;
              <?php else: ?>
                  opacity: 0;
            <?php endif; ?>
          }
        <?php endif; ?>

        <?php if (get_sub_field('post_bg_color')): // Post grid item ?>
          .page<?= $data->ID; ?> .<?= $id; ?>__item {
            background-color: <?= get_sub_field('post_bg_color'); ?>
          }
        <?php endif; ?>

        <?php if (get_sub_field('post_hover_bg_color') || get_sub_field('post_hover_text_color')): // Post grid item on hover ?>
          .page<?= $data->ID; ?> .<?= $id; ?>__item:hover {
            <?php if(get_sub_field( 'post_hover_bg_color' )): ?>
              background-color: <?= get_sub_field( 'post_hover_bg_color' ); ?>;
            <?php endif; ?>
            <?php if(get_sub_field( 'post_hover_text_color' )): ?>
              color: <?= get_sub_field( 'post_hover_text_color' ); ?>;
            <?php endif; ?>
          }
        <?php endif; ?>

        <?php if ( have_rows( 'slide' ) ) : $slide_count = 1; // Slider slides ?>
          <?php while ( have_rows( 'slide' ) ) : the_row(); ?>
            .page<?= $data->ID; ?> .<?= $id; ?> .glide__slide<?=$slide_count;?> {
              background-image: url('<?= get_sub_field('image')['url']; ?>');
            }
          <?php $slide_count++; endwhile;?>
        <?php endif; ?>
      <?php endif; // End of non-split layouts ?>

      <?php if (get_row_layout() == 'split_section'): //***** Split layout ?>
        <?php $splitImage = get_sub_field( 'split_bg_image' ) || false; // Full background image overrides left/right images ?>
        <?php if ($splitImage): // Add full background image ?>
          .page<?= $data->ID; ?> .<?= $id; ?>:before {
            background-image: url('<?= get_sub_field('split_bg_image')['url']; ?>');
          }
        <?php endif; ?>

        <?php if ( have_rows( 'left' ) ): // Left half ?>
          <?php while ( have_rows( 'left' ) ): the_row(); ?>
            <?php // If there isn't a full background image, but the left side has one
            if(!$splitImage && get_sub_field('bg_image')) : ?>
              .page<?= $data->ID; ?> .<?= $id; ?>__left:before {
                background-image: url('<?= get_sub_field('bg_image')['url']; ?>');
              }
            <?php endif; ?>

            <?php if(get_sub_field('bg_color')): ?>
              .page<?= $data->ID; ?> .<?= $id; ?>__left:after {
                background-color: <?= get_sub_field( 'bg_color' ); ?>;
                <?php // If there is a full or left-side background image, use the background color as an overlay
                if ( get_sub_field( 'bg_image' ) || $splitImage ): ?>
                  opacity: <?= get_sub_field( 'bg_opacity' )/100; ?>;
                <?php endif; // Otherwise set a solid background color for the left side ?>
              }
            <?php endif; ?>

            <?php if (get_sub_field( 'text_bg_color' )): // Content background overlay ?>
              .page<?= $data->ID; ?> .<?= $id; ?>__leftContent:before {
                background-color: <?= get_sub_field( 'text_bg_color' ); ?>;
                <?php if(get_sub_field( 'text_bg_opacity' )): ?>
                  opacity: <?= get_sub_field( 'text_bg_opacity' )/100; ?>;
                <?php else: ?>
                  opacity: 0;
                <?php endif; ?>
              }
            <?php endif; ?>
          <?php endwhile; ?>
        <?php endif; // End of left side ?>

        <?php if ( have_rows( 'right' ) ): // Right half ?>
          <?php while ( have_rows( 'right' ) ): the_row(); ?>
            <?php // If there isn't a full background image, but the right side has one ?>
            <?php if(!$splitImage && get_sub_field('bg_image')) : ?>
              .page<?= $data->ID; ?> .<?= $id; ?>__right:before {
                background-image: url('<?= get_sub_field('bg_image')['url']; ?>');
              }
            <?php endif; ?>

            <?php if(get_sub_field('bg_color')): ?>
              .page<?= $data->ID; ?> .<?= $id; ?>__right:after {
                background-color: <?= get_sub_field( 'bg_color' ); ?>;
                <?php // If there is a full or right-side background image, use the background color as an overlay
                if ( get_sub_field( 'bg_image' ) || $splitImage ): ?>
                  opacity: <?= get_sub_field( 'bg_opacity' )/100; ?>;
                <?php endif; // Otherwise set a solid background color for the right side ?>
              }
            <?php endif; ?>

            <?php if (get_sub_field( 'text_bg_color' )): // Content background overlay ?>
              .page<?= $data->ID; ?> .<?= $id; ?>__rightContent:before {
                background-color: <?= get_sub_field( 'text_bg_color' ); ?>;
                <?php if(get_sub_field( 'text_bg_opacity' )): ?>
                  opacity: <?= get_sub_field( 'text_bg_opacity' )/100; ?>;
                  <?php else: ?>
                  opacity: 0;
                <?php endif; ?>
              }
            <?php endif; ?>
          <?php endwhile; ?>
        <?php endif; // End of right side ?>
      <?php endif; //End of split section layout ?>
    <?php $count++; endwhile; // End of while flex rows ?>
  <?php endif; // End of if flex rows ?>
<?php endforeach; // End of each page ?>
