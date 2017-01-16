<?php
/**
 * Search Template Part
 *
 */
?>
<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <ul class="menu">
    	<li><input type="search" class="field" name="s" id="s" placeholder="Search" /></li>
    	<li><button type="button" class="button" name="submit" id="searchsubmit" value="Search" />Search</li>
    </ul>
</form>
