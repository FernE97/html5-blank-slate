<?php

function h5bs_client_options() {

    if ( count($_POST) > 0 && isset($_POST['h5bs_client_settings']) ) {
        $options = array ( 'logo_url', 'logo_alt_text', 'google_analytics', 'twitter_url', 'facebook_url', 'google_url', 'instagram_url', 'pinterest_url', 'linkedin_url', 'youtube_url', 'email', 'phone', 'phone_2', 'fax', 'address', 'address_2', 'city', 'state', 'zip_code' );

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
                    <th><label for="twitter_url">Twitter URL</label></th>
                    <td><input type="text" name="twitter_url" id="twitter_url" value="<?php echo get_option( 'client_twitter_url' ); ?>" class="regular-text" /></td>
                </tr>
                <tr>
                    <th><label for="facebook_url">Facebook URL</label></th>
                    <td><input type="text" name="facebook_url" id="facebook_url" value="<?php echo get_option( 'client_facebook_url' ); ?>" class="regular-text" /></td>
                </tr>
                <tr>
                    <th><label for="google_url">Google+ URL</label></th>
                    <td><input type="text" name="google_url" id="google_url" value="<?php echo get_option( 'client_google_url' ); ?>" class="regular-text" /></td>
                </tr>
                <tr>
                    <th><label for="linkedin_url">LinkedIn URL</label></th>
                    <td><input type="text" name="linkedin_url" id="linkedin_url" value="<?php echo get_option( 'client_linkedin_url' ); ?>" class="regular-text" /></td>
                </tr>
                <tr>
                    <th><label for="instagram_url">Instagram URL</label></th>
                    <td><input type="text" name="instagram_url" id="instagram_url" value="<?php echo get_option( 'client_instagram_url' ); ?>" class="regular-text" /></td>
                </tr>
                <tr>
                    <th><label for="pinterest_url">Pinterest URL</label></th>
                    <td><input type="text" name="pinterest_url" id="pinterest_url" value="<?php echo get_option( 'client_pinterest_url' ); ?>" class="regular-text" /></td>
                </tr>
                <tr>
                    <th><label for="youtube_url">YouTube URL</label></th>
                    <td><input type="text" name="youtube_url" id="youtube_url" value="<?php echo get_option( 'client_youtube_url' ); ?>" class="regular-text" /></td>
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
