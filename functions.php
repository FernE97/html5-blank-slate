<?php

// Custom Menus
function h5bs_register_menus() {
	register_nav_menus(array(
		'primary'   => __('Primary Navigation'),
		'secondary' => __('Secondary Navigation'),
		'tertiary'  => __('Tertiary Navigation')
	));
}

add_action( 'init', 'h5bs_register_menus' );


function h5bs_primary_nav() {
	wp_nav_menu(array( 
		'container'       => false,                        // remove nav container
		'menu'            => 'Main Menu',                  // nav name
		'menu_id'         => 'nav-main',                   // custom id
		'menu_class'      => 'nav group',                  // custom class
		'theme_location'  => 'primary',                    // where it's located in the theme
		'before'          => '',                           // before the menu
		'after'           => '',                           // after the menu
		'link_before'     => '',                           // before each link
		'link_after'      => '',                           // after each link
		'depth'           => 0,                            // set to 1 to disable dropdowns
		'fallback_cb'     => 'h5bs_primary_nav_fallback'   // fallback function
	));
}

function h5bs_secondary_nav() {
	wp_nav_menu(array( 
		'container'       => false,                        // remove nav container
		'menu'            => 'Sub Menu',                   // nav name
		'menu_id'         => 'nav-sub',                    // custom id
		'menu_class'      => 'nav group',                  // custom class
		'theme_location'  => 'secondary',                  // where it's located in the theme
		'before'          => '',                           // before the menu
		'after'           => '',                           // after the menu
		'link_before'     => '',                           // before each link
		'link_after'      => '',                           // after each link
		'depth'           => 0,                            // set to 1 to disable dropdowns
		'fallback_cb'     => 'h5bs_secondary_nav_fallback' // fallback function
	));
}

function h5bs_primary_nav_fallback() {
	wp_page_menu(array(
		'menu_class'  => 'nav group',
		'include'     => '',
		'exclude'     => '',
		'link_before' => '',
		'link_after'  => '',
		'show_home'   => true
	));
}

function h5bs_secondary_nav_fallback() {
	wp_page_menu(array(
		'menu_class'  => 'nav group',
		'include'     => '',
		'exclude'     => '',
		'link_before' => '',
		'link_after'  => '',
		'show_home'   => true
	));
}


// Image Thumbnails
add_theme_support( 'post-thumbnails' );


// Enqueue Global Scripts
function h5bs_enqueue_scripts() {
	wp_deregister_script( 'jquery' ); // Load Jquery from Google CDN instead
	wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js', array(), '1.8.0', true );
	wp_register_script( 'modernizr', get_template_directory_uri() . '/lib/js/modernizr.js', array(), '2.6.1', false );
	// wp_register_script( 'plugins', get_template_directory_uri() . '/lib/js/plugins.js', array( 'jquery' ), '1.0', true );
	wp_register_script( 'main-js', get_template_directory_uri() . '/lib/js/main.js', array( 'jquery' ), '1.0', true );

	wp_enqueue_script( 'modernizr' );
	// wp_enqueue_script( 'plugins' );
	wp_enqueue_script( 'main-js' );
}

add_action( 'wp_enqueue_scripts', 'h5bs_enqueue_scripts' );


// Sidebars & Widgetizes Areas
function h5bs_register_sidebars() {
	register_sidebar(array(
		'id'            => 'sidebar1',
		'name'          => 'Sidebar 1',
		'description'   => 'The first (primary) sidebar.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widgettitle">',
		'after_title'   => '</h4>',
	));

	/* 
	uncomment to add additional sidebar

	register_sidebar(array(
		'id'            => 'sidebar2',
		'name'          => 'Sidebar 2',
		'description'   => 'The second (secondary) sidebar.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widgettitle">',
		'after_title'   => '</h4>',
	));
	*/
}

add_action( 'widgets_init', 'h5bs_register_sidebars' );


// Client Options Page
function h5bs_client_options() {

	if ( count($_POST) > 0 && isset($_POST['h5bs_client_settings']) ) {
		$options = array ( 'logo_url', 'logo_alt_text', 'google_analytics', 'facebook_url', 'twitter_username', 'linkedin_url', 'youtube_username', 'email', 'phone', 'phone_2', 'fax', 'address', 'address_2', 'city', 'state', 'zip_code' );
		
		foreach ( $options as $opt ) {
			delete_option ( 'client_'.$opt, $_POST[$opt] );
			add_option ( 'client_'.$opt, $_POST[$opt] );
		}
	}
	add_menu_page( 'Client Settings', 'Client Options', 'manage_options', 'h5bs_client_settings', 'h5bs_client_settings' );
}

add_action( 'admin_menu', 'h5bs_client_options' );


function h5bs_client_settings() { ?>
	<div class="wrap">  
		<?php screen_icon('themes'); ?> <h2>Client Options</h2>

		<form method="post" action="">
			<h3>General Settings</h3>
			<table class="form-table">
				<tr>
					<th><label for="logo_url">Logo URL</label></th>
					<td><input type="text" name="logo_url" id="logo_url" value="<?php echo get_option( 'client_logo_url' ); ?>" class="regular-text" /> <span class="description">( ex. /wp-content/uploads/logo.png )</span></td>
				</tr>
				<tr>
					<th><label for="logo_alt_text">Logo Alt Text</label></th> 
					<td><input type="text" name="logo_alt_text" id="logo_alt_text" value="<?php echo get_option( 'client_logo_alt_text' ); ?>" class="regular-text" /></td>
				</tr>
				<tr>
					<th><label for="google_analytics">Google Analytics Tracking #</label></th> 
					<td><input type="text" name="google_analytics" id="google_analytics" value="<?php echo get_option( 'client_google_analytics' ); ?>" class="regular-text" /> <span class="description">( ex. UA-XXXXX-X )</span></td>
				</tr>
			</table>
			<p class="submit">
				<input type="submit" name="submit" id="submit" class="button-primary" value="Save Changes" />
				<input type="hidden" name="h5bs_client_settings" value="save" style="display:none;" />
			</p>
			
			<h3>Social Links</h3>
			<table class="form-table">
				<tr>
					<th><label for="facebook_url">Facebook URL</label></th>
					<td><input type="text" name="facebook_url" id="facebook_url" value="<?php echo get_option( 'client_facebook_url' ); ?>" class="regular-text" /></td>
				</tr>
				<tr>
					<th><label for="twitter_username">Twitter Username</label></th> 
					<td><input type="text" name="twitter_username" id="twitter_username" value="<?php echo get_option( 'client_twitter_username' ); ?>" class="regular-text" /></td>
				</tr>
				<tr>
					<th><label for="linkedin_url">LinkedIn URL</label></th> 
					<td><input type="text" name="linkedin_url" id="linkedin_url" value="<?php echo get_option( 'client_linkedin_url' ); ?>" class="regular-text" /></td>
				</tr>
				<tr>
					<th><label for="youtube_username">YouTube Username</label></th> 
					<td><input type="text" name="youtube_username" id="youtube_username" value="<?php echo get_option( 'client_youtube_username' ); ?>" class="regular-text" /></td>
				</tr>
			</table>
			<p class="submit">
				<input type="submit" name="submit" id="submit" class="button-primary" value="Save Changes" />
				<input type="hidden" name="h5bs_client_settings" value="save" style="display:none;" />
			</p>
			
			<h3>Contact Information</h3>
			<table class="form-table">
				<tr>
					<th><label for="email">Email</label></th>
					<td><input type="text" name="email" id="email" value="<?php echo get_option( 'client_email' ); ?>" class="regular-text" /></td>
				</tr>
				<tr>
					<th><label for="phone">Phone</label></th> 
					<td><input type="text" name="phone" id="phone" value="<?php echo get_option( 'client_phone' ); ?>" class="regular-text" /> <span class="description">Primary phone number</span></td>
				</tr>
				<tr>
					<th><label for="phone_2">Phone 2</label></th> 
					<td><input type="text" name="phone_2" id="phone_2" value="<?php echo get_option( 'client_phone_2' ); ?>" class="regular-text" /> <span class="description">Additional phone number ( ex. 1-800 )</span></td>
				</tr>
				<tr>
					<th><label for="fax">Fax</label></th> 
					<td><input type="text" name="fax" id="fax" value="<?php echo get_option( 'client_fax' ); ?>" class="regular-text" /></td>
				</tr>
				<tr>
					<th><label for="address">Address</label></th> 
					<td><input type="text" name="address" id="address" value="<?php echo get_option( 'client_address' ); ?>" class="regular-text" /></td>
				</tr>
				<tr>
					<th><label for="address_2">Address 2</label></th> 
					<td><input type="text" name="address_2" id="address_2" value="<?php echo get_option( 'client_address_2' ); ?>" class="regular-text" /></td>
				</tr>
				<tr>
					<th><label for="city">City</label></th> 
					<td><input type="text" name="city" id="city" value="<?php echo get_option( 'client_city' ); ?>" class="regular-text" /></td>
				</tr>
				<tr>
					<th><label for="state">State</label></th> 
					<td><input type="text" name="state" id="state" value="<?php echo get_option( 'client_state' ); ?>" class="regular-text" /></td>
				</tr>
				<tr>
					<th><label for="zip_code">Zip Code</label></th> 
					<td><input type="text" name="zip_code" id="zip_code" value="<?php echo get_option( 'client_zip_code' ); ?>" class="regular-text" /></td>
				</tr>
			</table>
			<p class="submit">
				<input type="submit" name="submit" id="submit" class="button-primary" value="Save Changes" />
				<input type="hidden" name="h5bs_client_settings" value="save" style="display:none;" />
			</p>
		</form>
	</div><!-- end wrap -->
	<?php
}