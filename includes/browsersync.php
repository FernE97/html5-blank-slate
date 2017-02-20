<?php
// BrowserSync script
function browser_sync() {
    $whitelist = array(
        '127.0.0.1',
        '::1'
    );
    // only inject if localhost
if(in_array($_SERVER['REMOTE_ADDR'], $whitelist)){
    echo "
    <!-- BrowserSync -->
    <script id=\"__bs_script__\">//<![CDATA[
        document.write(\"<script async src='http://HOST:3000/browser-sync/browser-sync-client.js?v=2.18.2'><\/script>\".replace(\"HOST\", location.hostname));
        //]]></script>
        ";
    }
}
add_action( 'wp_footer', 'browser_sync' );
