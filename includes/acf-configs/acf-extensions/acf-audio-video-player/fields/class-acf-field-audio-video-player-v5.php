<?php

// exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit;


// check if class already exists
if( !class_exists('acf_field_audio_video_player') ) :


class acf_field_audio_video_player extends acf_field {
	
	
	public $text_domain = 'acf-audio-video-player';
	
	
	/*
	*  __construct
	*
	*  This function will setup the field type data
	*
	*  @type	function
	*  @date	5/03/2014
	*  @since	5.0.0
	*
	*  @param	n/a
	*  @return	n/a
	*/
	
	function __construct( $settings ) {
		
		/*
		*  name (string) Single word, no spaces. Underscores allowed
		*/
		$this->name = 'audio_video_player';
		
		
		/*
		*  label (string) Multiple words, can include spaces, visible when selecting a field type
		*/
		$this->label = __('Audio/Video Player', $this->text_domain);
		
		
		/*
		*  category (string) basic | content | choice | relational | jquery | layout | CUSTOM GROUP NAME
		*/
		$this->category = 'content';
		
		
		/*
		*  defaults (array) Array of default settings which are merged into the field object. These are used later in settings
		*/
		$this->defaults = array(
			'return_format'	=> 'array',
			'library' 		=> 'all',
			'min_size'		=> 0,
			'max_size'		=> 0,
			'mime_types'	=> '',
			'general_type'	=> 'both'
		);
		
		
		// filters
		add_filter('get_media_item_args', array($this, 'get_media_item_args'));
		
		
		
		/*
		*  l10n (array) Array of strings that are used in JavaScript. This allows JS strings to be translated in PHP and loaded via:
		*  var message = acf._e('FIELD_NAME', 'error');
		*/
		
		$this->l10n = array(
			'error'	=> __('Error! Please select a valid media file', $this->text_domain),
			'error_format' => __('File format not supported.', $this->text_domain),
		);
		
		
		$this->l10n_audio = array(
			'all'		=> __('All audios',   $this->text_domain),
			'edit'		=> __('Edit Audio',   $this->text_domain),
			'select'	=> __('Select Audio', $this->text_domain),
			'update'	=> __('Update Audio', $this->text_domain)
		);
		
		$this->l10n_video = array(
			'all'		=> __('All videos',   $this->text_domain),
			'edit'		=> __('Edit Video',   $this->text_domain),
			'select'	=> __('Select Video', $this->text_domain),
			'update'	=> __('Update Video', $this->text_domain)
		);
		
		$this->l10n_both = array(
			'all'		=> __('All media',   $this->text_domain),
			'edit'		=> __('Edit Media',   $this->text_domain),
			'select'	=> __('Select Media', $this->text_domain),
			'update'	=> __('Update Media', $this->text_domain)
		);
		
		
		/*
		*  settings (array) Store plugin settings (url, path, version) as a reference for later use with assets
		*/
		
		$this->settings = $settings;
		
		
		// do not delete!
    	parent::__construct();
    	
	}
	
	
	
	
	/*
	*  get_media_item_args
	*
	*  description
	*
	*  @type	function
	*  @date	27/01/13
	*  @since	3.6.0
	*
	*  @param	$vars (array)
	*  @return	$vars
	*/
	
	function get_media_item_args( $vars ) {
	
	    $vars['send'] = true;
	    return($vars);
	    
	}
	
	
	
	
	/*
	*  render_field_settings()
	*
	*  Create extra settings for your field. These are visible when editing a field
	*
	*  @type	action
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$field (array) the $field being edited
	*  @return	n/a
	*/
	
	function render_field_settings( $field ) {
		
		/*
		*  acf_render_field_setting
		*
		*  This function will create a setting for your field. Simply pass the $field parameter and an array of field settings.
		*  The array of settings does not require a `value` or `prefix`; These settings are found from the $field array.
		*
		*  More than one setting can be added by copy/paste the above code.
		*  Please note that you must also have a matching $defaults value for the field name (font_size)
		*/
		
		// clear numeric settings
		$clear = array(
			'min_size',
			'max_size'
		);
		
		foreach( $clear as $k ) {
			if( empty($field[$k]) ) {
				$field[$k] = '';
			}
		}
		
		
		/* media type */
		acf_render_field_setting($field, array(
			'type' 			=> 'radio',
			'name' 			=> 'general_type',
			'layout' 		=> 'horizontal',
			'label' 		=> __('Type', $this->text_domain),
			'instructions'	=> __('Restrict the media type selection','acf'),
			'choices' 	=> array(
				'both' 	=> __('Both',  $this->text_domain),
				'audio' => __('Audio', $this->text_domain),
				'video' => __('Video', $this->text_domain)
			)
		));
		
		// allowed type
		acf_render_field_setting( $field, array(
			'label'			=> __('Allowed file types','acf'),
			'instructions'	=> __('Comma separated list. Leave blank for all types','acf'),
			'type'			=> 'text',
			'name'			=> 'mime_types',
		));
		
		
		// return_format
		acf_render_field_setting( $field, array(
			'label'			=> __('Return Value','acf'),
			'instructions'	=> __('Specify the returned value on front end','acf'),
			'type'			=> 'radio',
			'name'			=> 'return_format',
			'layout'		=> 'horizontal',
			'choices'		=> array(
				'html' 		=> __('Player HTML', $this->text_domain),
				'shortcode' => __('Shortcode', $this->text_domain),
				'array'		=> __("Detailed Array",$this->text_domain),
				'url'		=> __("File URL",'acf'),
				'id'		=> __("File ID",'acf')
			)
		));
		
		
		// library
		acf_render_field_setting( $field, array(
			'label'			=> __('Library','acf'),
			'instructions'	=> __('Limit the media library choice','acf'),
			'type'			=> 'radio',
			'name'			=> 'library',
			'layout'		=> 'horizontal',
			'choices' 		=> array(
				'all'			=> __('All', 'acf'),
				'uploadedTo'	=> __('Uploaded to post', 'acf')
			)
		));
		
		
		// min
		acf_render_field_setting( $field, array(
			'label'			=> __('Minimum','acf'),
			'instructions'	=> __('Restrict which files can be uploaded','acf'),
			'type'			=> 'text',
			'name'			=> 'min_size',
			'prepend'		=> __('File size', 'acf'),
			'append'		=> 'MB',
		));
		
		
		// max
		acf_render_field_setting( $field, array(
			'label'			=> __('Maximum','acf'),
			'instructions'	=> __('Restrict which files can be uploaded','acf'),
			'type'			=> 'text',
			'name'			=> 'max_size',
			'prepend'		=> __('File size', 'acf'),
			'append'		=> 'MB',
		));

	}
	
	
	
	/*
	*  render_field()
	*
	*  Create the HTML interface for your field
	*
	*  @param	$field (array) the $field being rendered
	*
	*  @type	action
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$field (array) the $field being edited
	*  @return	n/a
	*/
	
	function render_field( $field ) {
		
		// vars
		$uploader = acf_get_setting('uploader');
		
		
		// allow custom uploader
		$uploader = acf_maybe_get($field, 'uploader', $uploader);
		
		
		// enqueue
		if( $uploader == 'wp' ) {
			acf_enqueue_uploader();
		}
		
		
		//restrict media type
		$general_type = !empty($field['general_type']) ? $field['general_type'] : $this->defaults['general_type'];
		
		
		//player type (raw html | media-elements)
		$player_type = ( $field['return_format'] == 'shortcode' )  ? 'mediaelements' : 'html';
		
		
		//l10n
		$this->l10n = array_merge( $this->l10n, $this->{"l10n_$general_type"} );
		
		
		//attrs
		$div = array(
			'class'				=> 'acf-file-uploader',
			'data-library' 		=> $field['library'],
			'data-mime_types'	=> $field['mime_types'],
			'data-uploader'		=> $uploader,
			'data-general_type' => $general_type,
			'data-player_type'  => $player_type
		);
		
		
		$tag = '';
		$player = '';
		
		
		//has value?
		if( $field['value'] ) {
				
			$div['class'] .= ' has-value';
				
			$file_id   = $field['value'];
			$file_url  = wp_get_attachment_url( $file_id );
			$file_data = wp_get_attachment_metadata( $file_id );
			//error_log( print_r($file_data,true) );
			
			$tag = $this->get_file_type( $file_id );
			$preload = ($tag == 'video') ? 'metadata' : 'none';
			
			if( $tag ) 
				$player = '<'.$tag.' preload="'.$preload.'" controls><source src="'.$file_url.'" type="'.$file_data['mime_type'].'"></source></'.$tag.'>';
		
		}
				
?>
<div <?php acf_esc_attr_e( $div ); ?>>
	<?php acf_hidden_input(array( 'name' => $field['name'], 'value' => $field['value'], 'data-name' => 'id' )); ?>
	
    <div class="show-if-value">
		
        <div class="player-container <?php echo $tag; ?>">
        	<?php echo $player; ?>
        </div>
        
		<div class="acf-actions -hover">
			<?php 
			if( $uploader != 'basic' ): 
			?><a class="acf-icon -pencil dark" data-name="edit" href="#" title="<?php _e('Edit', 'acf'); ?>"></a><?php 
			endif;
			?><a class="acf-icon -cancel dark" data-name="remove" href="#" title="<?php _e('Remove', 'acf'); ?>"></a>
		</div>
        
	</div>
    
	<div class="hide-if-value">
		<?php if( $uploader == 'basic' ): ?>
			
			<?php if( $field['value'] && !is_numeric($field['value']) ): ?>
				<div class="acf-error-message"><p><?php echo acf_esc_html($field['value']); ?></p></div>
			<?php endif; ?>
			
			<label class="acf-basic-uploader">
				<?php acf_file_input(array( 'name' => $field['name'], 'id' => $field['id'] )); ?>
			</label>
			
		<?php else: ?>
			
			<p><?php _e('No file selected','acf'); ?> <a data-name="add" class="acf-button button" href="#"><?php _e('Add File','acf'); ?></a></p>
			
		<?php endif; ?>
		
	</div>
    
</div>
<?php
	
	}
	
	
	
	
	
	
	function get_file_type( $file_id ) {
		
		$mime_type = get_post_mime_type($file_id);
		return acf_maybe_get(explode('/', $mime_type), 0, '');
		
	}
	
	
		
	
	/* 
	 * @source philipnewcomer.net/2012/11/get-the-attachment-id-from-an-image-url-in-wordpress/ 
	 */
	public function _get_attachment_id_from_url($attachment_url = '') {
	
		global $wpdb;
		
		if (empty($attachment_url))
			return;
		
		$wp_upload_dir = wp_upload_dir();
		
		/* Make sure the upload path base directory
		* exists in the attachment URL, to verify
		* that we're working with a media library image
		*/
		if (false === strpos($attachment_url, $wp_upload_dir['baseurl']))
			return;
		
		/* If this is the URL of an auto-generated thumbnail, get the URL of the original image */
		$attachment_url = preg_replace('/-\d+x\d+(?=\.(jpg|jpeg|png|gif)$)/i', '', $attachment_url);
		
		/* Remove the upload path base directory from the attachment URL */
		$attachment_url = str_replace($wp_upload_dir['baseurl'].'/', '', $attachment_url);
		
		return $wpdb->get_var(
			$wpdb->prepare(
				"SELECT wposts.ID FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta WHERE wposts.ID = wpostmeta.post_id AND wpostmeta.meta_key = '_wp_attached_file' AND wpostmeta.meta_value = '%s' AND wposts.post_type = 'attachment'",
				$attachment_url
			)
		);
	
	}
	
	
	
		
	


	/*
	*  load_value()
	*
	*  This filter is applied to the $value after it is loaded from the db
	*
	*  @type	filter
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$value (mixed) the value found in the database
	*  @param	$post_id (mixed) the $post_id from which the value was loaded
	*  @param	$field (array) the field array holding all the field options
	*  @return	$value
	*/
	
	
	
	function load_value( $value, $post_id, $field ) {
		
		//debug
		//error_log('load_value ' . $value);
		//$value should be something like: {"mp4":"video.mp4","poster":"poster.jpg"}
		//
		//try to convert the old acf-audioVideo-field value into an ID
		//
		if( is_string($value) ) {
			
			$value = json_decode($value,true);
			
			if( is_array($value) && !empty($value) ) {
				$keys = array_keys($value);
				$url = $value[ $keys[0] ];
				$value = $this->_get_attachment_id_from_url( $url );
			}
			
		}
		
		return $value;
		
	}
	
	
	
	
	/*
	*  update_value()
	*
	*  This filter is applied to the $value before it is saved in the db
	*
	*  @type	filter
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$value (mixed) the value found in the database
	*  @param	$post_id (mixed) the $post_id from which the value was loaded
	*  @param	$field (array) the field array holding all the field options
	*  @return	$value
	*/
	
	
	
	function update_value( $value, $post_id, $field ) {
		
		// bail early if is empty
		if( empty($value) ) return false;
		
		
		// validate
		if( is_array($value) && isset($value['ID']) ) { 
			
			$value = $value['ID'];
			
		} elseif( is_object($value) && isset($value->ID) ) { 
			
			$value = $value->ID;
			
		}
		
		
		// bail early if not attachment ID
		if( !$value || !is_numeric($value) ) return false;
		
		
		// confirm type
		$value = (int) $value;
		
		
		// maybe connect attacment to post 
		acf_connect_attachment_to_post( $value, $post_id );
		
		
		// return
		return $value;
		
	}
	
	
	
	
	/*
	*  format_value()
	*
	*  This filter is appied to the $value after it is loaded from the db and before it is returned to the template
	*
	*  @type	filter
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$value (mixed) the value which was loaded from the database
	*  @param	$post_id (mixed) the $post_id from which the value was loaded
	*  @param	$field (array) the field array holding all the field options
	*
	*  @return	$value (mixed) the modified value
	*/
		
	
	
	function format_value( $value, $post_id, $field ) {
		
		// bail early if no value
		if( empty($value) ) return false;
		
		
		// bail early if not numeric (error message)
		if( !is_numeric($value) ) return false;
		
		
		// convert to int
		$value = intval($value);
		
		// format
		if( $field['return_format'] == 'html' ) {
			
			$file_id = $value;
			$file_url = wp_get_attachment_url( $file_id );
			$file_data = wp_get_attachment_metadata( $file_id );
			
			$tag = $this->get_file_type( $file_id );
			$preload = ($tag == 'video') ? 'metadata' : 'none';
			
			if($tag)
				return '<'.$tag.' preload="'.$preload.'" controls><source src="'.$file_url.'" type="'.$file_data['mime_type'].'"></source></'.$tag.'>';
			else
				return $this->l10n['error_format'];	

		}
		
		elseif( $field['return_format'] == 'array' ) {
			
			return acf_get_attachment( $value );
		
		} 
		
		elseif( $field['return_format'] == 'shortcode' ) {
			
			$file_id   = $value;
			$file_url  = wp_get_attachment_url( $file_id );
			$file_data = wp_get_attachment_metadata( $file_id );
			$tag = $this->get_file_type( $file_id );
			
			//error_log( print_r($file_data,true) );
			
			$params   = array();
			$params[] = 'src="'.$file_url.'"';
			
			if( $tag == 'video' ) {
				$params[] = 'width="'.$file_data['width'].'"';
				$params[] = 'height="'.$file_data['height'].'"';
				$params[] = 'preload="metadata"';
			}
			
			$params   = implode(' ', $params);
			
			if($tag)
				return '['.$tag.' '.$params.']';
			else
				return $this->l10n['error_format'];	
			
		}
		
		elseif( $field['return_format'] == 'url' ) {
		
			return wp_get_attachment_url($value);
			
		} 
		
		// return ID
		return $value;
		
	}
	
	
	
	
	/*
	*  validate_value()
	*
	*  This filter is used to perform validation on the value prior to saving.
	*  All values are validated regardless of the field's required setting. This allows you to validate and return
	*  messages to the user if the value is not correct
	*
	*  @type	filter
	*  @date	11/02/2014
	*  @since	5.0.0
	*
	*  @param	$valid (boolean) validation status based on the value and the field's required setting
	*  @param	$value (mixed) the $_POST value
	*  @param	$field (array) the field array holding all the field options
	*  @param	$input (string) the corresponding input name for $_POST value
	*  @return	$valid
	*/
	
	
	
	function validate_value( $valid, $value, $field, $input ){
		
		/*
		// Basic usage
		if( $value < $field['custom_minimum_setting'] )
		{
			$valid = false;
		}
		
		
		// Advanced usage
		if( $value < $field['custom_minimum_setting'] )
		{
			$valid = __('The value is too little!',$this->text_domain),
		}
		
		
		// return
		return $valid;
		*/
		
		// bail early if empty		
		if( empty($value) ) return $valid;
		
		
		// bail ealry if is numeric
		if( is_numeric($value) ) return $valid;
		
		
		// bail ealry if not basic string
		if( !is_string($value) ) return $valid;
		
		
		// decode value
		$file = null;
		parse_str($value, $file);
		
		
		// bail early if no attachment
		if( empty($file) ) return $valid;
		
		
		// get errors
		$errors = acf_validate_attachment( $file, $field, 'basic_upload' );
		
		
		// append error
		if( !empty($errors) ) {
			
			$valid = implode("\n", $errors);
			
		}
		
		
		// return		
		return $valid;
		
	}
	
	
	
	
	/*
	*  delete_value()
	*
	*  This action is fired after a value has been deleted from the db.
	*  Please note that saving a blank value is treated as an update, not a delete
	*
	*  @type	action
	*  @date	6/03/2014
	*  @since	5.0.0
	*
	*  @param	$post_id (mixed) the $post_id from which the value was deleted
	*  @param	$key (string) the $meta_key which the value was deleted
	*  @return	n/a
	*/
	
	/*
	function delete_value( $post_id, $key ) {}
	*/
	
	
	
	
	/*
	*  input_admin_enqueue_scripts()
	*
	*  This action is called in the admin_enqueue_scripts action on the edit screen where your field is created.
	*  Use this action to add CSS + JavaScript to assist your render_field() action.
	*
	*  @type	action (admin_enqueue_scripts)
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	n/a
	*  @return	n/a
	*/

	
	
	function input_admin_enqueue_scripts() {
		
		// localize
		acf_localize_text(array(
		   	'Select File'	=> __('Select File', 'acf'),
			'Edit File'		=> __('Edit File', 'acf'),
			'Update File'	=> __('Update File', 'acf'),
			'Select Media'  => __('Select Media', $this->text_domain),
			'Select Audio'  => __('Select Audio', $this->text_domain),
			'Select Video'  => __('Select Video', $this->text_domain),
	   	));
		
		// vars
		$url = $this->settings['url'];
		$version = $this->settings['version'];
		
		//media elements
		wp_enqueue_script('wp-mediaelement');
		
		
		// register & include JS
		wp_register_script($this->text_domain, "{$url}assets/js/input.js", array('acf-input', 'wp-mediaelement'), $version);
		wp_enqueue_script($this->text_domain);
		
		
		// register & include CSS
		wp_register_style($this->text_domain, "{$url}assets/css/input.css", array('acf-input'), $version);
		wp_enqueue_style($this->text_domain);
		
	}
	
	
	
	
	/*
	*  input_admin_head()
	*
	*  This action is called in the admin_head action on the edit screen where your field is created.
	*  Use this action to add CSS and JavaScript to assist your render_field() action.
	*
	*  @type	action (admin_head)
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	n/a
	*  @return	n/a
	*/

	/*	
	function input_admin_head() {}
	*/
	
	
	/*
   	*  input_form_data()
   	*
   	*  This function is called once on the 'input' page between the head and footer
   	*  There are 2 situations where ACF did not load during the 'acf/input_admin_enqueue_scripts' and 
   	*  'acf/input_admin_head' actions because ACF did not know it was going to be used. These situations are
   	*  seen on comments / user edit forms on the front end. This function will always be called, and includes
   	*  $args that related to the current screen such as $args['post_id']
   	*
   	*  @type	function
   	*  @date	6/03/2014
   	*  @since	5.0.0
   	*
   	*  @param	$args (array)
   	*  @return	n/a
   	*/
   	
   	/*
   	function input_form_data( $args ) {}
   	*/
	
	
	/*
	*  input_admin_footer()
	*
	*  This action is called in the admin_footer action on the edit screen where your field is created.
	*  Use this action to add CSS and JavaScript to assist your render_field() action.
	*
	*  @type	action (admin_footer)
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	n/a
	*  @return	n/a
	*/

	/*
	function input_admin_footer() {}
	*/
	
	
	/*
	*  field_group_admin_enqueue_scripts()
	*
	*  This action is called in the admin_enqueue_scripts action on the edit screen where your field is edited.
	*  Use this action to add CSS + JavaScript to assist your render_field_options() action.
	*
	*  @type	action (admin_enqueue_scripts)
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	n/a
	*  @return	n/a
	*/

	/*
	function field_group_admin_enqueue_scripts() {}
	*/

	
	/*
	*  field_group_admin_head()
	*
	*  This action is called in the admin_head action on the edit screen where your field is edited.
	*  Use this action to add CSS and JavaScript to assist your render_field_options() action.
	*
	*  @type	action (admin_head)
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	n/a
	*  @return	n/a
	*/

	/*
	function field_group_admin_head() {}
	*/
	
	
	
	
	
	/*
	*  load_field()
	*
	*  This filter is applied to the $field after it is loaded from the database
	*
	*  @type	filter
	*  @date	23/01/2013
	*  @since	3.6.0	
	*
	*  @param	$field (array) the field array holding all the field options
	*  @return	$field
	*/
	
	/*
	
	function load_field( $field ) {
		
		return $field;
		
	}	
	
	*/
	
	
	/*
	*  update_field()
	*
	*  This filter is applied to the $field before it is saved to the database
	*
	*  @type	filter
	*  @date	23/01/2013
	*  @since	3.6.0
	*
	*  @param	$field (array) the field array holding all the field options
	*  @return	$field
	*/
	
	/*
	
	function update_field( $field ) {
		
		return $field;
		
	}	
	
	*/
	
	
	/*
	*  delete_field()
	*
	*  This action is fired after a field is deleted from the database
	*
	*  @type	action
	*  @date	11/02/2014
	*  @since	5.0.0
	*
	*  @param	$field (array) the field array holding all the field options
	*  @return	n/a
	*/
	
	/*
	function delete_field( $field ) {}	
	*/
	
	
}


// initialize
new acf_field_audio_video_player( $this->settings );


// class_exists check
endif;

?>
