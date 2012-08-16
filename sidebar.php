<?php
/*
	=================================================
	HTML5 Blank Slate - Default Sidebar Template
	Author: Eric Fernandez - www.efdezigns.com
	=================================================
*/ 
?>

<aside role="complementary">

	<?php
	if ( is_active_sidebar( 'sidebar1' ) ) :
		dynamic_sidebar( 'sidebar1' );
	endif;
	?>
	
</aside>