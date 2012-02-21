<?php

// Custom Menus
add_action( 'init', 'register_my_menus' );

function register_my_menus() {
	register_nav_menus(
		array(
			'primary'   => __('Primary Navigation'),
			'secondary' => __('Secondary Navigation'),
			'tertiary'  => __('Tertiary Navigation')
		)
	);
}


// Image Thumbnails
add_theme_support( 'post-thumbnails' );


// Enqueue Global Scripts
function enqueue_global_scripts() {
	wp_deregister_script( 'jquery' ); // Load Jquery from Google CDN instead
	wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js', array(), '1.7.1', true );
	wp_register_script( 'modernizr', get_template_directory_uri() . '/lib/js/modernizr.js', array(), '2.5.3', false );
	wp_register_script( 'custom-script', get_template_directory_uri() . '/lib/js/custom-script.js', array( 'jquery' ), '1.0', true );

	wp_enqueue_script( 'modernizr' );
	wp_enqueue_script( 'custom-script' );
}

add_action( 'wp_enqueue_scripts', 'enqueue_global_scripts' );


// dynamic classes and body IDs
function dynamic_class() {

	global $post;
	$page_slug = $post->post_name;
	
	if ( ! empty( $post->post_parent ) ) {
		$parent = get_post($post->post_parent);
		$parent_slug = $parent->post_name;
		$class = "$parent_slug $page_slug";
	} else {
		$class = "$page_slug";
	}
	
	return $class;
}

function dynamic_body() {

	$dynamic_class = dynamic_class();
 
	if ( is_front_page() ) {
		echo 'id="home"';
	
	} elseif ( is_home() ) {
		echo 'id="blog"';
		
	} elseif ( is_single() ) {
		echo 'id="blog" class="single ' . $dynamic_class . '"';

	} elseif ( is_archive() ) {
		echo 'id="blog" class="archive"';
		
	} elseif ( is_search() ) {
		echo 'id="search"';
		
	} else {
		echo 'id="interior" class="' . $dynamic_class . '"';
	}
}


// Client Options Page
add_action( 'admin_menu', 'client_options_page' );

function client_options_page() {

	if ( count($_POST) > 0 && isset($_POST['client_settings']) ) {
		$options = array ( 'logo_url', 'logo_alt_text', 'google_analytics', 'facebook_url', 'twitter_username', 'linkedin_url', 'youtube_username', 'email', 'phone', 'phone_2', 'fax', 'address', 'address_2', 'city', 'state', 'zip_code' );
		
		foreach ( $options as $opt ) {
			delete_option ( 'client_'.$opt, $_POST[$opt] );
			add_option ( 'client_'.$opt, $_POST[$opt] );
		}
	}
	add_menu_page( 'Client Settings', 'Client Options', 'manage_options', 'client_settings', 'client_settings' );
}

function client_settings() { ?>
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
				<input type="hidden" name="client_settings" value="save" style="display:none;" />
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
				<input type="hidden" name="client_settings" value="save" style="display:none;" />
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
				<input type="hidden" name="client_settings" value="save" style="display:none;" />
			</p>
		</form>
	</div><!-- end wrap -->
	<?php
}