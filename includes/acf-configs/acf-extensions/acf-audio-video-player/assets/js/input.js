(function($){
	
	
	var audioVideoPlayer = acf.models.ImageField.extend({
		
		type: 'audio_video_player',
		
		$control: function(){
			return this.$('.acf-file-uploader');
		},
		
		$player: function(){
			return this.$control().find('.player-container');
		},
		
		$input: function(){
			return this.$('input[type="hidden"]');
		},
		
		validateAttachment: function( attachment ) {
			
			// defaults
			attachment = attachment || {};
			
			// WP attachment
			if( attachment.id !== undefined ) {
				attachment = attachment.attributes;
			}
			
			// args
			attachment = acf.parseArgs(attachment, {
				url: '',
				alt: '',
				title: '',
				filename: '',
				filesizeHumanReadable: '',
				icon: '/wp-includes/images/media/default.png'
			});
						
			// return
			return attachment;
		},
		
		initialize: function() {
			
			//if(this.get('player_type') == 'mediaelements')
				//this.$player().mediaelementplayer();
			
			//this.render( this.val() );
			
		},
		
		render: function( attachment ){
			
			// vars
			attachment = this.validateAttachment( attachment );
			
			//console.log(attachment);
			
			var tag  = attachment.type;
			var src  = attachment.url;
			var mime = attachment.mime;
			//var poster = (attachment.image && tag == 'video') ? 'poster="'+attachment.image.src+'"' : '';
			
			
			var player = '<'+tag+' controls><source src="'+src+'" type="'+mime+'"></source></'+tag+'>';
			this.$player().html( player );
			
			//if(this.get('player_type') == 'mediaelements')
				//this.$player().mediaelementplayer();
			
			
			// vars
			var val = attachment.id || '';
						
			// update val
		 	acf.val( this.$input(), val );
		 	
		 	// update class
		 	if( val ) {
			 	this.$control().addClass('has-value');
		 	} else {
			 	this.$control().removeClass('has-value');
		 	}
			
		},
		
		selectAttachment: function(){
			
			// vars
			var parent = this.parent();
			var multiple = (parent && parent.get('type') === 'repeater');
			
			var media_type = this.get('general_type');
			var frame_type = !media_type || media_type == 'both' ? ['audio', 'video'] : media_type;
			
			
			// new frame
			var frame = acf.newMediaPopup({
				mode:			'select',
				type:			frame_type,
				multiple:		multiple,
				title:			acf.__('Select File'),
				field:			this.get('key'),
				library:		this.get('library'),
				mime_types:		this.get('mime_types'),
				select:			$.proxy(function( attachment, i ) {
					if( i > 0 ) {
						this.append( attachment, parent );
					} else {
						this.render( attachment );
					}
				}, this)
			});
		},
		
		editAttachment: function(){
			
			// vars
			var val = this.val();
			
			// bail early if no val
			if( !val ) {
				return false;
			}
			
			// popup
			var frame = acf.newMediaPopup({
				mode:		'edit',
				title:		acf.__('Edit File'),
				button:		acf.__('Update File'),
				attachment:	val,
				field:		this.get('key'),
				select:		$.proxy(function( attachment, i ) {
					this.render( attachment );
				}, this)
			});
		}
	});
	
	acf.registerFieldType( audioVideoPlayer );
	
	/**
	*  initialize_field
	*
	*  This function will initialize the $field.
	*
	*  @date	30/11/17
	*  @since	5.6.5
	*
	*  @param	n/a
	*  @return	n/a
	*/
	
	function initialize_field( $field ) {
		
		//console.log('audio_video_player initialized', $field.find('input').val() );
		//$field.render();
		
	}
	
	
	if( typeof acf.add_action !== 'undefined' ) {
	
		/*
		*  ready & append (ACF5)
		*
		*  These two events are called when a field element is ready for initizliation.
		*  - ready: on page load similar to $(document).ready()
		*  - append: on new DOM elements appended via repeater field or other AJAX calls
		*
		*  @param	n/a
		*  @return	n/a
		*/
		
		acf.add_action('ready_field/type=audio_video_player', initialize_field);
		acf.add_action('append_field/type=audio_video_player', initialize_field);
		
		
	} else {
		
		/*
		*  acf/setup_fields (ACF4)
		*
		*  These single event is called when a field element is ready for initizliation.
		*
		*  @param	event		an event object. This can be ignored
		*  @param	element		An element which contains the new HTML
		*  @return	n/a
		*/
		
		$(document).on('acf/setup_fields', function(e, postbox){
			
			// find all relevant fields
			$(postbox).find('.field[data-field_type="audio_video_player"]').each(function(){
				
				// initialize
				initialize_field( $(this) );
				
			});
		
		});
	
	}

})(jQuery);
