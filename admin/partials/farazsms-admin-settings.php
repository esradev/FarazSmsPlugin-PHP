<?php

/**
 * @link       https://farazsms.com/
 * @since      1.0.7
 *
 * @package    Farazsms
 * @subpackage Farazsms/admin/partials
 * 
 * Get credential options.
 * 
 * @since      1.0.8 isset(); added (?? '') for avoid (trying to access array offset on value of type bool)
 */
$fsms_base = class_farazsms_base::getInstance();
$credentials_option = get_option('fsms_credentials');
$fsms_uname = $credentials_option['fsms_uname'] ?? '';
$fsms_password = $credentials_option['fsms_password'] ?? '';
$fsms_admin_notify_number = $credentials_option['fsms_admin_notify_number'] ?? '';
$fsms_fromnum = $credentials_option['fsms_fromnum'] ?? '3000505';
$fsms_fromnum_adver = $credentials_option['fsms_fromnum_adver'] ?? '+98club';
$fsms_apikey = $credentials_option['fsms_api_key'] ?? '';
$fsms_sendwm = $credentials_option['fsms_sendwm'] ?? '';
$fsms_sendwm_with_pattern = $credentials_option['fsms_sendwm_with_pattern'] ?? '';
$fsms_welcomep = $credentials_option['fsms_welcomep'] ?? '';
$fsms_admin_login_noti = $credentials_option['fsms_admin_login_noti'] ?? '';
$fsms_admin_login_noti_p = $credentials_option['fsms_admin_login_noti_p'] ?? '';
$fsms_welcome_message = $credentials_option['fsms_welcome_message'] ?? '';
$fsms_admin_login_noti_roles = $credentials_option['fsms_admin_login_noti_roles'] ?? '';
$fsms_addmf = get_option('fsms_add_mobile_field', 'false');
$fsms_requiredmf = get_option('fsms_required_mobile_field', 'false');
$fsms_notify_admin = get_option('fsms_notify_admin', 'false');
$fsms_admin_notify_pcode = get_option('fsms_admin_notify_pcode', '');
$fsms_approved_commentp = get_option('fsms_approved_comment_pattern', '');
$fsms_commentp = get_option('fsms_comment_pattern', '');

/**
 * 
 * Get Woocommerce options.
 * 
 */

$fsms_woo_checkout_otp = get_option('fsms_woo_checkout_otp', 'false');
$fsms_woo_checkout_otp_pattern = get_option('fsms_woo_checkout_otp_pattern', '');
$fsms_woo_poll = get_option('fsms_woo_poll', 'false');
$fsms_woo_poll_time = get_option('fsms_woo_poll_time', '4');
$fsms_woo_poll_message = get_option('fsms_woo_poll_message', __('You purchased %item% from %sitename% %time% ago. Thank you for your purchase. Please share your experience of using and buying with us and our users by clicking on the link below from the comments section: %item_link%', 'farazsms'));
$fsms_woo_tracking_code_pattern = get_option('fsms_woo_tracking_code_pattern', '');
$fsms_woo_retention_order_no = get_option('fsms_woo_retention_order_no', '');
$fsms_woo_retention_order_month = get_option('fsms_woo_retention_order_month', '');
$fsms_woo_retention_message = get_option('fsms_woo_retention_message', '');

/**
 * 
 * Get Farazsms options.
 * 
 */

$phonebooks = $fsms_base::get_phonebooks();

$panel_expire_date = get_option('fsms_panel_expire_date', '');
$future = strtotime($panel_expire_date);
$timefromdb = time();
$timeleft = $future - $timefromdb;
$daysleft = round((($timeleft / 24) / 60) / 60);

/**
 * 
 * Get EDD options.
 * 
 */

$fsms_edd_send_to_user = get_option('edd_send_to_user', 'false');
$fsms_edd_user_pcode = get_option('edd_user_pcode', '');
$fsms_edd_send_to_admin = get_option('edd_send_to_admin', 'false');
$fsms_edd_admin_pcode = get_option('edd_admin_pcode', '');

/**
 * 
 * Get Newsletter options.
 * 
 */

$newsletter_send_ver_code = get_option('fsms_newsletter_send_ver_code', 'false');
$newsletter_pcode = get_option('fsms_newsletter_newsletter_pcode', '');
$fsms_newsletter_welcome = get_option('fsms_newsletter_welcome', 'false');
$fsms_newsletter_welcomep = get_option('fsms_newsletter_welcomep', '');

$fsms_newsletter_new_post_notification = get_option('fsms_newsletter_new_post_notification', 'false');
$fsms_newsletter_post_notification_message = get_option('fsms_newsletter_post_notification_message', __('New article %title% has been published.
Article address: %url%', 'farazsms'));
$fsms_newsletter_new_product_notification = get_option('fsms_newsletter_new_product_notification', 'false');
$fsms_newsletter_product_notification_message = get_option('fsms_newsletter_product_notification_message', __('The product %product_name% at the price %price% is available in the store %site_title%.
Product link: %url%', 'farazsms'));

/**
 * 
 * Get options if IHC is installed.
 * 
 */


if ($fsms_base::isIHCInstalled()) {
    $fsms_ihc_send_first_noti_sms    = get_option('fsms_ihc_send_first_noti_sms', 'false');
    $fsms_ihc_send_second_noti_sms    = get_option('fsms_ihc_send_second_noti_sms', 'false');
    $fsms_ihc_send_third_noti_sms    = get_option('fsms_ihc_send_third_noti_sms', 'false');
    $fsms_ihc_first_noti_sms_message = get_option('fsms_first_noti_sms_message', __('Dear %name% only %time% days left until your subscription expires', 'farazsms'));
}

/**
 * 
 * Get options if PMP is installed.
 * 
 */


if ($fsms_base::isPMPInstalled()) {
    $fsms_pmp_send_expire_noti_sms = get_option('fsms_pmp_send_expire_noti_sms', 'false');
    $fsms_pmp_expire_noti_sms_message = get_option('fsms_pmp_expire_noti_sms_message', __('Dear %display_name%, your subscription has expired, please renew', 'farazsms'));
}

/**
 * 
 * Get options if AFF is installed.
 * 
 */

if ($fsms_base::isAFFInstalled() || $fsms_base::isWCAFInstalled() || $fsms_base::isUAPInstalled()) {
    $fsms_aff_user_register                  = get_option('fsms_aff_user_register', 'false');
    $fsms_aff_user_register_message          = get_option('fsms_aff_user_register_message', '');
    $fsms_aff_user_new_ref                   = get_option('fsms_aff_user_new_ref', 'false');
    $fsms_aff_user_new_ref_message           = get_option('fsms_aff_user_new_ref_message', '');
    $fsms_aff_user_on_approval               = get_option('fsms_aff_user_on_approval', 'false');
    $fsms_aff_user_on_approval_message       = get_option('fsms_aff_user_on_approval_message', '');
    $fsms_aff_admin_user_register            = get_option('fsms_aff_admin_user_register', 'false');
    $fsms_aff_admin_user_register_message    = get_option('fsms_aff_admin_user_register_message', '');
    $fsms_aff_admin_user_new_ref             = get_option('fsms_aff_admin_user_new_ref', 'false');
    $fsms_aff_admin_user_new_ref_message     = get_option('fsms_aff_admin_user_new_ref_message', '');
    $fsms_aff_admin_user_on_approval         = get_option('fsms_aff_admin_user_on_approval', 'false');
    $fsms_aff_admin_user_on_approval_message = get_option('fsms_aff_admin_user_on_approval_message', '');
}

/**
 * 
 * General structure of the plugin settings page.
 * 
 */

?>
<div class="wrapper">

    <!-- FSMS Header -->
    <div class="fsms_header">
        <div>
            <a href="https://farazsms.com" target="_blank">
                <img src="<?php echo plugin_dir_url(__FILE__) . '/logo-1.png'; ?>" alt="پنل ارسال اس ام اس – سامانه پیام کوتاه – سامانه ارسال پیامک">
            </a>
        </div>
        <?php if ($credentials_option) {
            $credit = $this->get_credit();
        ?>
            <div id="fsms_account_info">
                <div class="fsms_credits">
                    <div class="fsms_credit_amount"><span><?php esc_attr_e('Credit amount: ', 'farazsms') ?></span><?php echo number_format($credit); ?><span><?php esc_attr_e(' Toman', 'farazsms') ?></span></div>
                    <?php if (!empty($panel_expire_date)) { ?>
                        <div class="fsms_panel_remaining"><span><?php esc_attr_e('Remaining time: ', 'farazsms') ?></span><?php echo $daysleft; ?><span><?php esc_attr_e(' day(s)', 'farazsms') ?></span></div>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    </div>

    <!-- FSMS TABS -->

    <div class="tabs">


        <!-- FSMS TAB-1 Settings -->
        <div class="tab">
            <input type="radio" name="css-tabs" id="tab-1" checked class="tab-switch">
            <label for="tab-1" class="tab-label"><?php _e('settings', 'farazsms') ?></label>
            <div class="tab-content">
                <form id="fsms_credentials" class="fsms_form form-style-2">
                    <label for="fsms_apikey">
                        <span class="label"><?php esc_attr_e('API key', 'farazsms') ?><span class="required">*</span>
                            <div class="icon icon__src" style="
    position: absolute;
    left: 7px;
    top: 9px;
">
                                <div class="tooltip tooltip__src">
                                    <?php esc_attr_e('To get the access key in your panel Faraz SMS, refer to the web service menu in the access keys section.', 'farazsms') ?>
                                </div>
                                <svg viewBox="0 0 24 24">
                                    <path d="M23,12L20.56,9.22L20.9,5.54L17.29,4.72L15.4,1.54L12,3L8.6,1.54L6.71,4.72L3.1,5.53L3.44,9.21L1,12L3.44,14.78L3.1,18.47L6.71,19.29L8.6,22.47L12,21L15.4,22.46L17.29,19.28L20.9,18.46L20.56,14.78L23,12M13,17H11V15H13V17M13,13H11V7H13V13Z"></path>
                                </svg>
                            </div>
                        </span>
                        <input type="text" class="input-field" id="fsms_apikey" name="fsms_apikey" value="<?php echo $fsms_apikey; ?>">
                    </label>
                    <br><br>
                    <label for="fsms_uname">
                        <span class="label"><?php esc_attr_e('API key', 'farazsms') ?><span class="required">*</span></span>
                        <input type="text" class="input-field" id="fsms_uname" name="fsms_uname" value="<?php echo $fsms_uname; ?>">
                    </label>
                    <br><br>
                    <label for="fsms_password">
                        <span class="label"><?php esc_attr_e('Password', 'farazsms') ?><span class="required">*</span></span>
                        <input type="text" class="input-field" id="fsms_password" name="fsms_password" value="<?php echo $fsms_password; ?>">
                    </label>
                    <br><br>
                    <label for="fsms_admin_notify_number">
                        <span class="label"><?php esc_attr_e('Admin phone number', 'farazsms') ?><span class="required">*</span></span>
                        <input type="text" class="input-field" id="fsms_admin_notify_number" name="fsms_admin_notify_number" value="<?php if ($fsms_admin_notify_number) echo $fsms_admin_notify_number; ?>">
                    </label>
                    <br><br>
                    <label for="fsms_fromnum">
                        <span class="label"><?php esc_attr_e('Service sender number', 'farazsms') ?><span class="required">*</span></span>
                        <input type="text" class="input-field" id="fsms_fromnum" name="fsms_fromnum" value="<?php echo $fsms_fromnum; ?>">
                    </label>
                    <br><br>
                    <label for="fsms_fromnum_adver">
                        <span class="label"><?php esc_attr_e('Advertising sender numberRemaining time', 'farazsms') ?><span class="required">*</span>
                            <div class="icon icon__src" style="
    position: absolute;
    left: 7px;
    top: 9px;
">
                                <div class="tooltip tooltip__src">
                                    <?php esc_attr_e('If you have Enamad, it is suggested that you purchase a dedicated 9000 line for sending web service SMS and sending SMS to customers. Send a support ticket for this.', 'farazsms') ?>
                                </div>
                                <svg viewBox="0 0 24 24">
                                    <path d="M23,12L20.56,9.22L20.9,5.54L17.29,4.72L15.4,1.54L12,3L8.6,1.54L6.71,4.72L3.1,5.53L3.44,9.21L1,12L3.44,14.78L3.1,18.47L6.71,19.29L8.6,22.47L12,21L15.4,22.46L17.29,19.28L20.9,18.46L20.56,14.78L23,12M13,17H11V15H13V17M13,13H11V7H13V13Z"></path>
                                </svg>
                            </div>
                        </span>
                        <input type="text" class="input-field" id="fsms_fromnum_adver" name="fsms_fromnum_adver" value="<?php echo $fsms_fromnum_adver; ?>">
                    </label>
                    <br><br>
                    <label for="fsms_sendwm" class="toggle-control">
                        <span class="label" style="padding-top: 0;"><?php esc_attr_e('Send a welcome SMS to the user? ', 'farazsms') ?></span>
                        <input type="checkbox" id="fsms_sendwm" name="fsms_sendwm" <?php echo ($fsms_sendwm === 'true' ? 'checked' : '') ?>>
                        <span class="control"></span>
                    </label>
                    <br><br>
                    <label for="fsms_sendwm_with_pattern" class="toggle-control">
                        <span class="label" style="padding-top: 0;"><?php esc_attr_e('Send via Pattern? ', 'farazsms') ?></span>
                        <input type="checkbox" id="fsms_sendwm_with_pattern" name="fsms_sendwm_with_pattern" <?php echo ($fsms_sendwm_with_pattern === 'true' ? 'checked' : '') ?>>
                        <span class="control"></span>
                    </label>
                    <br><br>
                    <label for="fsms_welcome_message">
                        <span class="label" style="display: flex;justify-content: space-between;"><?php esc_attr_e('Welcome message content', 'farazsms') ?></span>
                        <textarea rows="7" cols="30" id="fsms_welcome_message" name="fsms_welcome_message"><?php echo $fsms_welcome_message; ?></textarea>
                    </label>
                    <label for="fsms_welcomep" style="display: none !important;">
                        <span class="label" style="display: flex;justify-content: space-between;"><?php esc_attr_e('Pattern code for welcome massege', 'farazsms') ?></span>
                        <input type="text" class="input-field" id="fsms_welcomep" name="fsms_welcomep" value="<?php echo $fsms_welcomep; ?>">
                    </label>
                    <div class="fsms-info-message comment_pattern_info"><?php esc_attr_e('Usable variables are %display_name% and %username%', 'farazsms') ?></div>
                    <br><br>
                    <label for="fsms_admin_login_noti" class="toggle-control">
                        <span class="label" style="padding-top: 0;"><?php esc_attr_e('Send SMS when user(s) login to the admin? ', 'farazsms') ?></span>
                        <input type="checkbox" id="fsms_admin_login_noti" name="fsms_admin_login_noti" <?php echo ($fsms_admin_login_noti === 'true' ? 'checked' : '') ?>>
                        <span class="control"></span>
                    </label>
                    <br><br>
                    <div class="fsms_form_element">
                        <label for="fsms_admin_login_noti_roles"><?php esc_attr_e('Select user role(s)', 'farazsms') ?></label>
                        <select multiple name="fsms_admin_login_noti_roles[]" id="fsms_admin_login_noti_roles">
                            <?php
                            global $wp_roles;
                            foreach ($wp_roles->get_names() as $key => $role) {
                                $name = translate_user_role($role)
                            ?>
                                <option value="<?php echo $key; ?>" <?php echo (in_array($key, $fsms_admin_login_noti_roles)) ? 'selected' : ''; ?>><?php echo $name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <label for="fsms_admin_login_noti_p">
                        <span class="label" style="display: flex;justify-content: space-between;"><?php esc_attr_e('Login Pattern code', 'farazsms') ?></span>
                        <input type="text" class="input-field" id="fsms_admin_login_noti_p" name="fsms_admin_login_noti_p" value="<?php echo $fsms_admin_login_noti_p; ?>">
                    </label>
                    <br><br>
                    <div class="fsms-info-message comment_pattern_info"><?php esc_attr_e('Usable variables are username %user_login% and user name %display_name% and login date %date%', 'farazsms') ?></div>
                    <br><br>
                    <div class="fsms_save_button_container">
                        <button type="submit" class="fsms_button" id="fsms_save_button"><span class="button__text"><?php esc_attr_e('Save Settings', 'farazsms') ?></span></button>
                        <div id="fsms-response-message" style="display: none;"></div>
                    </div>
                </form>
                <p id="farazsms_copyright"><?php esc_attr_e('All material and intellectual rights of this plugin belong to Faraz SMS (Zarin Communications Asia Company).', 'farazsms') ?></p>
            </div>
        </div>

        <!-- FSMS TAB-2 Phonebooks_section -->
        <div class="tab">
            <input type="radio" name="css-tabs" id="tab-2" class="tab-switch">
            <label for="tab-2" class="tab-label"><?php esc_attr_e('Phonebook', 'farazsms') ?></label>
            <div class="tab-content">
                <div id="phonebooks_section">
                    <div class="fsms-info-message comment_pattern_info"><?php esc_attr_e('Special offer: If you have a physical store, use the mobile number storage device to collect your customers mobile numbers. Click on the link below to see the details', 'farazsms') ?>
                        <div id="fsms_pos_link"><a class="fsms_button" href="https://farazsms.com/pos/" target="_blank"><?php esc_attr_e('Buying a mobile number storage device', 'farazsms') ?></a></div>
                    </div>
                    <?php if ($credentials_option == null) { ?>
                        <div class="fsms-warning-message enter-credentials"><?php esc_attr_e('To view the phonebook settings, first enter your information in the settings', 'farazsms') ?></div>
                        <?php } else {
                        if (empty($phonebooks)) { ?>
                            <div class="fsms-warning-message enter-credentials"><?php esc_attr_e('You have not registered a phone book yet. Please create your phone book in the Faraz SMS system first.', 'farazsms') ?></div>
                        <?php
                        } else { ?>
                            <div class="fsms_form_element">
                                <label for="custom_phone_book"><?php esc_attr_e('Select the custom field phone book', 'farazsms') ?></label>
                                <select multiple name="custom_phone_book[]" id="custom_phone_book">
                                    <?php
                                    $fsms_custom_phone_books = get_option('fsms_custom_phone_books', []);
                                    foreach ($phonebooks as $phonebook) { ?>
                                        <option value="<?php echo $phonebook->id; ?>" <?php echo (in_array($phonebook->id, $fsms_custom_phone_books)) ? 'selected' : ''; ?>><?php echo $phonebook->title; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="fsms_form_element">
                                <label for="custom_phone_meta_keys"><?php esc_attr_e('Select the mobile number custom field', 'farazsms') ?></label>
                                <select multiple="multiple" name="custom_phone_meta_keys[]" id="custom_phone_meta_keys">
                                    <?php
                                    global $wpdb;
                                    $user_meta_keys = $wpdb->get_results("SELECT DISTINCT meta_key FROM `" . $wpdb->prefix . "usermeta`");
                                    $fsms_custom_phone_meta_keys = get_option('fsms_custom_phone_meta_keys', []);
                                    foreach ($user_meta_keys as $user_meta_key) { ?>
                                        <option value="<?php echo $user_meta_key->meta_key; ?>" <?php echo (in_array($user_meta_key->meta_key, $fsms_custom_phone_meta_keys)) ? 'selected' : ''; ?>><?php echo $user_meta_key->meta_key; ?></option>
                                        <?php }
                                    foreach ($user_meta_keys as $user_meta_key) {
                                        $meta_helper[] = $user_meta_key->meta_key;
                                    }
                                    foreach ($fsms_custom_phone_meta_keys as $selected) {
                                        if (!in_array($selected, $meta_helper)) {
                                        ?>
                                            <option value="<?php echo $selected; ?>" selected><?php echo $selected; ?></option>
                                    <?php }
                                    }
                                    ?>
                                </select>
                            </div>
                            <?php if ($fsms_base::isDigitsInstalled()) { ?>
                                <div class="fsms_form_element">
                                    <label for="digits_phone_book"><?php esc_attr_e('Choosing a phone book for Digits', 'farazsms') ?></label>
                                    <select multiple name="digits_phone_book[]" id="digits_phone_book">
                                        <?php
                                        $fsms_digits_phone_books = get_option('fsms_digits_phone_books', []);
                                        foreach ($phonebooks as $phonebook) { ?>
                                            <option value="<?php echo $phonebook->id; ?>" <?php echo (in_array($phonebook->id, $fsms_digits_phone_books)) ? 'selected' : ''; ?>><?php echo $phonebook->title; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            <?php } else { ?>
                                <div class="fsms-warning-message enter-credentials warning_phonebook"><?php esc_attr_e('SDigits plugin is not installed', 'farazsms') ?></div>
                            <?php } ?>
                            <?php if ($fsms_base::isWooInstalled()) { ?>
                                <div class="fsms_form_element">
                                    <label for="woo_phone_book"><?php esc_attr_e('Choosing a phone book for WooCommerce', 'farazsms') ?></label>
                                    <select multiple name="woo_phone_book[]" id="woo_phone_book">
                                        <?php
                                        $fsms_woo_phone_books = get_option('fsms_woo_phone_books', []);
                                        foreach ($phonebooks as $phonebook) { ?>
                                            <option value="<?php echo $phonebook->id; ?>" <?php echo (in_array($phonebook->id, $fsms_woo_phone_books)) ? 'selected' : ''; ?>><?php echo $phonebook->title; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            <?php } else { ?>
                                <div class="fsms-warning-message enter-credentials warning_phonebook"><?php esc_attr_e('WooCommerce plugin is not installed', 'farazsms') ?></div>
                            <?php } ?>
                            <?php if ($fsms_base::isBooklyInstalled()) { ?>
                                <div class="fsms_form_element">
                                    <label for="bookly_phone_book"><?php esc_attr_e('Choosing a phone book for Bookley', 'farazsms') ?></label>
                                    <select multiple name="bookly_phone_book[]" id="bookly_phone_book">
                                        <?php
                                        $fsms_bookly_phone_books = get_option('fsms_bookly_phone_books', []);
                                        foreach ($phonebooks as $phonebook) { ?>
                                            <option value="<?php echo $phonebook->id; ?>" <?php echo (in_array($phonebook->id, $fsms_bookly_phone_books)) ? 'selected' : ''; ?>><?php echo $phonebook->title; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            <?php } else { ?>
                                <div class="fsms-warning-message enter-credentials warning_phonebook"><?php esc_attr_e('Bookley plugin is not installed', 'farazsms') ?></div>
                            <?php } ?>
                            <?php if ($fsms_base::isGFInstalled()) { ?>
                                <div class="fsms_form_element">
                                    <label for="gf_phone_book"><?php esc_attr_e('Select phone book for Gravity Form', 'farazsms') ?></label>
                                    <select multiple name="gf_phone_book[]" id="gf_phone_book">
                                        <?php
                                        $fsms_gf_phone_books = get_option('fsms_gf_phone_books', []);
                                        foreach ($phonebooks as $phonebook) { ?>
                                            <option value="<?php echo $phonebook->id; ?>" <?php echo (in_array($phonebook->id, $fsms_gf_phone_books)) ? 'selected' : ''; ?>><?php echo $phonebook->title; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="fsms_form_element_gf">
                                    <label for="fsc-gravity-forms"><?php esc_attr_e('Gravity Form Settings', 'farazsms') ?><div class="icon icon__src" style="
    position: absolute;
    left: 7px;
    top: -4px;
">
                                            <div class="tooltip tooltip__src">
                                                <?php esc_attr_e('In this section, you can specify the fields you want to register in the Gravity Form phone book', 'farazsms') ?>
                                            </div>
                                            <svg viewBox="0 0 24 24">
                                                <path d="M23,12L20.56,9.22L20.9,5.54L17.29,4.72L15.4,1.54L12,3L8.6,1.54L6.71,4.72L3.1,5.53L3.44,9.21L1,12L3.44,14.78L3.1,18.47L6.71,19.29L8.6,22.47L12,21L15.4,22.46L17.29,19.28L20.9,18.46L20.56,14.78L23,12M13,17H11V15H13V17M13,13H11V7H13V13Z"></path>
                                            </svg>
                                        </div></label>
                                    <select name="fsc-gravity-forms" id="fsc-gravity-forms" size="4">
                                        <?php
                                        $forms = GFAPI::get_forms();
                                        $forms_array = array();
                                        foreach ($forms as $form) {
                                            echo "<option value='" . $form['id'] . "'>" . $form['title'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                    <select name="fsc-gravity-forms-fields[]" multiple id="fsc-gravity-forms-fields" size="4">
                                        <?php
                                        $forms = GFAPI::get_forms();
                                        foreach ($forms as $form) {
                                            $form = GFAPI::get_form($form['id']);
                                            if (gettype($form) == "array") {
                                                foreach ($form['fields'] as $field) {
                                                    $selected = '';
                                                    if (in_array($form['id'] . '-' . $field['id'], get_option('fsms_gf_selected_field', []))) {
                                                        $selected = 'selected';
                                                    }
                                                    echo "<option style='display: none;' value='" . $form['id'] . '-' . $field['id'] . "' " . $selected . ">" . $field['label'] . "</option>";
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            <?php } else { ?>
                                <div class="fsms-warning-message enter-credentials warning_phonebook"><?php esc_attr_e('Gravity Form plugin is not installed', 'farazsms') ?></div>
                            <?php } ?>
                            <div class="fsms_save_button_container">
                                <button class="fsms_button" id="fsms_phone_book_save_button"><span class="button__text"><?php esc_attr_e('Save settings', 'farazsms') ?></span></button>
                                <div id="fsms-phone-book-response-message" style="display: none;"></div>
                            </div>
                    <?php }
                    } ?>
                </div>
                <p id="farazsms_copyright"><?php esc_attr_e('All material and intellectual rights of this plugin belong to Faraz SMS (Zarin Communications Asia Company).', 'farazsms') ?></p>
            </div>
        </div>

        <!-- FSMS TAB-3 Synchronization -->
        <div class="tab">
            <input type="radio" name="css-tabs" id="tab-3" class="tab-switch">
            <label for="tab-3" class="tab-label"><?php esc_attr_e('Synchronization', 'farazsms') ?></label>
            <div class="tab-content">
                <div id="syn-sction">
                    <?php if ($credentials_option == null) { ?>
                        <div class="fsms-warning-message enter-credentials"><?php esc_attr_e('To view the synchronization settings, first enter your information in the settings', 'farazsms') ?></div>
                    <?php } else {  ?>
                        <div class="fsms-info-message enter-credentials"><?php esc_attr_e('You can register old users in the phone book through the buttons below', 'farazsms') ?></div>
                        <div class="fsms-sync-buttons">
                            <?php if ($fsms_base::isDigitsInstalled()) { ?>
                                <div>
                                    <button class="fsms_button" id="fsms_digits-sync"><span class="button__text"><?php esc_attr_e('Synchronization of Digits', 'farazsms') ?></span></button>
                                </div>
                            <?php } else { ?>
                                <div class="fsms-warning-message enter-credentials warning_phonebook"><?php esc_attr_e('Digits plugin is not installed', 'farazsms') ?></div>
                            <?php } ?>
                            <?php if ($fsms_base::isWooInstalled()) { ?>
                                <div>
                                    <button class="fsms_button" id="fsms_woo-sync"><span class="button__text"><?php esc_attr_e('Synchronization of WooCommerce', 'farazsms') ?></span></button>
                                </div>
                            <?php } else { ?>
                                <div class="fsms-warning-message enter-credentials warning_phonebook"><?php esc_attr_e('WooCommerce plugin is not installed', 'farazsms') ?></div>
                            <?php } ?>
                            <?php if ($fsms_base::isBooklyInstalled()) { ?>
                                <div>
                                    <button class="fsms_button" id="fsms_bookly-sync"><span class="button__text"><?php esc_attr_e('Bookley synchronization', 'farazsms') ?></span></button>
                                </div>
                            <?php } else { ?>
                                <div class="fsms-warning-message enter-credentials warning_phonebook"><?php esc_attr_e('Bookley plugin is not installed', 'farazsms') ?></div>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
                <div class="fsms_save_button_container">
                    <div id="fsms-sync-response" style="display: none;"></div>
                </div>
                <p id="farazsms_copyright"><?php esc_attr_e('All material and intellectual rights of this plugin belong to Faraz SMS (Zarin Communications Asia Company).', 'farazsms') ?></p>
            </div>
        </div>

        <!-- FSMS TAB-4 Comment-Settings -->

        <div class="tab">
            <input type="radio" name="css-tabs" id="tab-4" class="tab-switch">
            <label for="tab-4" class="tab-label"><?php esc_attr_e('Comment settings', 'farazsms') ?></label>
            <div class="tab-content">
                <div class="form-style-2">
                    <label for="fsms_add_mobile_field" class="toggle-control">
                        <span class="label" style="padding-top: 0;"><?php esc_attr_e('Add the mobile field to the comment registration form?', 'farazsms') ?></span>
                        <input type="checkbox" id="fsms_add_mobile_field" name="fsms_add_mobile_field" <?php echo ($fsms_addmf === 'true' ? 'checked' : '') ?>>
                        <span class="control"></span>
                    </label>
                    <br><br>
                    <label for="fsms_required_mobile_field" class="toggle-control">
                        <span class="label" style="padding-top: 0;"><?php esc_attr_e('Is the mobile number field mandatory?', 'farazsms') ?></span>
                        <input type="checkbox" id="fsms_required_mobile_field" name="fsms_required_mobile_field" <?php echo ($fsms_requiredmf === 'true' ? 'checked' : '') ?>>
                        <span class="control"></span>
                    </label>
                    <br><br>
                    <label for="comment_phone_book">
                        <span class="label"><?php esc_attr_e('Save the phone number in the phone book?', 'farazsms') ?></span>
                        <select multiple name="comment_phone_book[]" id="comment_phone_book" style="min-width: 60%;">
                            <?php
                            $comment_phone_book = get_option('fsms_comment_phone_book', []);
                            foreach ($phonebooks as $phonebook) { ?>
                                <option value="<?php echo $phonebook->id; ?>" <?php echo (in_array($phonebook->id, $comment_phone_book)) ? 'selected' : ''; ?>><?php echo $phonebook->title; ?></option>
                            <?php } ?>
                        </select>
                    </label>
                    <br><br>
                    <label for="fsms_approved_commentp">
                        <span class="label" style="display: flex;justify-content: space-between;"><?php esc_attr_e('Comment submit pattern code', 'farazsms') ?></span>
                        <input type="text" class="input-field" id="fsms_approved_commentp" name="fsms_approved_commentp" value="<?php echo $fsms_approved_commentp; ?>">
                    </label>
                    <br><br>
                    <label for="fsms_commentp">
                        <span class="label" style="display: flex;justify-content: space-between;"><?php esc_attr_e('Comment response pattern code', 'farazsms') ?></span>
                        <input type="text" class="input-field" id="fsms_commentp" name="fsms_commentp" value="<?php echo $fsms_commentp; ?>">
                    </label>
                    <br><br>
                    <label for="fsms_notify_admin" class="toggle-control">
                        <span class="label" style="padding-top: 0;"><?php esc_attr_e('Send notification SMS to the manager?', 'farazsms') ?></span>
                        <input type="checkbox" id="fsms_notify_admin" name="fsms_notify_admin" <?php echo ($fsms_notify_admin === 'true' ? 'checked' : '') ?>>
                        <span class="control"></span>
                    </label>
                    <br><br>
                    <label for="fsms_admin_notify_pcode">
                        <span class="label" style="display: flex;justify-content: space-between;"><?php esc_attr_e('Administrator notification pattern code', 'farazsms') ?></span>
                        <input type="text" class="input-field" id="fsms_admin_notify_pcode" name="fsms_admin_notify_pcode" value="<?php echo $fsms_admin_notify_pcode; ?>">
                    </label>
                    <br><br>
                    <div class="fsms-info-message comment_pattern_info"><?php esc_attr_e('Usable variables: Post title: %title% Comment authors name: %name% Comment authors email: %email% Comment link: %link% Comment text: %content%', 'farazsms') ?></div>
                    <div class="fsms_save_button_container">
                        <button type="submit" class="fsms_button" id="fsms_comment_settings_save_button"><span class="button__text">ذخیره</span></button>
                        <div id="fsms-comment-settings-response-message" style="display: none;"></div>
                    </div>
                </div>
                <p id="farazsms_copyright"><?php esc_attr_e('All material and intellectual rights of this plugin belong to Faraz SMS (Zarin Communications Asia Company).', 'farazsms') ?></p>
            </div>

            <!-- FSMS TAB-5 Woocommerce-Settings -->

        </div>
        <div class="tab">
            <input type="radio" name="css-tabs" id="tab-5" class="tab-switch">
            <label for="tab-5" class="tab-label"><?php esc_attr_e('WooCommerce settings', 'farazsms') ?></label>
            <div class="tab-content">
                <div class="form-style-2">
                    <?php if ($fsms_base::isWooInstalled()) { ?>
                        <form id="woo_setting_form" class="fsms_form form-style-2">
                            <label for="fsms_woo_checkout_otp" class="toggle-control">
                                <span class="label" style="padding-top: 0;"><?php esc_attr_e('Mobile number confirmation on the account settlement page?', 'farazsms') ?></span>
                                <input type="checkbox" id="fsms_woo_checkout_otp" name="fsms_woo_checkout_otp" <?php echo ($fsms_woo_checkout_otp === 'true' ? 'checked' : '') ?>>
                                <span class="control"></span>
                            </label>
                            <br><br>
                            <label for="fsms_woo_checkout_otp_pattern">
                                <span class="label" style="display: flex;justify-content: space-between;"><?php esc_attr_e('Mobile number verification pattern code', 'farazsms') ?></span>
                                <input type="text" class="input-field" id="fsms_woo_checkout_otp_pattern" name="fsms_woo_checkout_otp_pattern" value="<?php echo $fsms_woo_checkout_otp_pattern; ?>">
                            </label>
                            <br>
                            <div class="fsms-info-message comment_pattern_info"><?php esc_attr_e('The verification code variable is %code%', 'farazsms') ?></div>
                            <br><br>
                            <label for="fsms_woo_poll" class="toggle-control">
                                <span class="label" style="padding-top: 0;"><?php esc_attr_e('Sending a timed survey SMS for WooCommerce?', 'farazsms') ?></span>
                                <input type="checkbox" id="fsms_woo_poll" name="fsms_woo_poll" <?php echo ($fsms_woo_poll === 'true' ? 'checked' : '') ?>>
                                <span class="control"></span>
                            </label>
                            <br><br>
                            <label for="fsms_woo_poll_time">
                                <span class="label" style="display: flex;justify-content: space-between;"><?php esc_attr_e('The time of sending SMS after placing the order is up to date', 'farazsms') ?></span>
                                <input type="text" class="input-field" id="fsms_woo_poll_time" name="fsms_woo_poll_time" value="<?php echo $fsms_woo_poll_time; ?>">
                            </label>
                            <br><br>
                            <label for="fsms_woo_poll_message">
                                <span class="label" style="display: flex;justify-content: space-between;"><?php esc_attr_e('message content', 'farazsms') ?></span>
                                <textarea rows="7" cols="30" id="fsms_woo_poll_message" name="fsms_woo_poll_message"><?php echo $fsms_woo_poll_message; ?></textarea>
                            </label>
                            <br><br>
                            <div class="fsms-info-message comment_pattern_info"><?php esc_attr_e('Usable time variables are %time% store name %sitename% product name %item% product link %item_link%', 'farazsms') ?></div>
                            <br><br>
                            <label for="fsms_woo_tracking_code_pattern">
                                <span class="label" style="display: flex;justify-content: space-between;"><?php esc_attr_e('Pattern code to send tracking code', 'farazsms') ?></span>
                                <input type="text" class="input-field" id="fsms_woo_tracking_code_pattern" name="fsms_woo_tracking_code_pattern" value="<?php echo $fsms_woo_tracking_code_pattern; ?>">
                            </label>
                            <br>
                            <div class="fsms-info-message comment_pattern_info"><?php esc_attr_e('Usable variables tracking code %tracking_code% (required) order number %order_id% order status %order_status% full name billing address %billing_full_name% full name shipping address %shipping_full_name % is', 'farazsms') ?></div>
                            <br><br>
                            <div class="fsms_save_button_container">
                                <button type="submit" class="fsms_button" id="fsms_woo_settings_save_button"><span class="button__text">ذخیره</span></button>
                                <div id="fsms-woo-settings-response-message" style="display: none;"></div>
                            </div>
                        </form>
                    <?php } else { ?>
                        <div class="fsms-warning-message enter-credentials"><?php esc_attr_e('Woocommerce plugin is not installed. To see the settings related to this plugin, first install and activate WooCommerce.', 'farazsms') ?></div>
                    <?php } ?>
                </div>
                <p id="farazsms_copyright"><?php esc_attr_e('All material and intellectual rights of this plugin belong to Faraz SMS (Zarin Communications Asia Company).', 'farazsms') ?></p>
            </div>

            <!-- FSMS TAB-6 EDD-Settings -->

        </div>
        <div class="tab">
            <input type="radio" name="css-tabs" id="tab-6" class="tab-switch">
            <label for="tab-6" class="tab-label"><?php esc_attr_e('EDD settings', 'farazsms') ?></label>
            <div class="tab-content">
                <div class="form-style-2">
                    <?php if ($fsms_base::isEddInstalled()) { ?>
                        <label for="fsms_edd_phonebooks_choice">
                            <span class="label"><?php esc_attr_e('Save the phone number in the phonebook?', 'farazsms') ?></span>
                            <select multiple name="fsms_edd_phonebooks_choice[]" id="fsms_edd_phonebooks_choice" style="min-width: 60%;">
                                <?php
                                $eddphone_book = get_option('edd_phonebooks_choice', []);
                                foreach ($phonebooks as $phonebook) { ?>
                                    <option value="<?php echo $phonebook->id; ?>" <?php echo (in_array($phonebook->id, $eddphone_book)) ? 'selected' : ''; ?>><?php echo $phonebook->title; ?></option>
                                <?php } ?>
                            </select>
                        </label>
                        <br><br>
                        <label for="fsms_edd_send_to_user" class="toggle-control">
                            <span class="label" style="padding-top: 0;"><?php esc_attr_e('Send SMS to the user?', 'farazsms') ?></span>
                            <input type="checkbox" id="fsms_edd_send_to_user" name="fsms_edd_send_to_user" <?php echo ($fsms_edd_send_to_user === 'true' ? 'checked' : '') ?>>
                            <span class="control"></span>
                        </label>
                        <br><br>
                        <label for="fsms_edd_user_pcode">
                            <span class="label" style="display: flex;justify-content: space-between;"><?php esc_attr_e('SMS pattern code of the user', 'farazsms') ?></span>
                            <input type="text" class="input-field" id="fsms_edd_user_pcode" name="fsms_edd_user_pcode" value="<?php echo $fsms_edd_user_pcode; ?>">
                        </label>
                        <br><br>
                        <label for="fsms_edd_send_to_admin" class="toggle-control">
                            <span class="label" style="padding-top: 0;"><?php esc_attr_e('Send an SMS to the admin?', 'farazsms') ?></span>
                            <input type="checkbox" id="fsms_edd_send_to_admin" name="fsms_edd_send_to_admin" <?php echo ($fsms_edd_send_to_admin === 'true' ? 'checked' : '') ?>>
                            <span class="control"></span>
                        </label>
                        <br><br>
                        <label for="fsms_edd_admin_pcode">
                            <span class="label" style="display: flex;justify-content: space-between;"><?php esc_attr_e('Admin SMS pattern code', 'farazsms') ?></span>
                            <input type="text" class="input-field" id="fsms_edd_admin_pcode" name="fsms_edd_admin_pcode" value="<?php echo $fsms_edd_admin_pcode; ?>">
                        </label>
                        <br><br>
                        <div class="fsms-info-message comment_pattern_info"><?php esc_attr_e('Usable variables: mobile number: %phone% | Email: %email% | Name: %first_name% | Last name: %last_name% | Purchased products: %product% | Total amount (not including discount): %price% | Total discount amount: %discount% | Paid amount (including discount): %total_price% | Direct download link (not encrypted): %link% | Order number: %payment_id%', 'farazsms') ?></div>
                        <br>
                        <div class="fsms_save_button_container">
                            <button class="fsms_button" id="fsms_edd_settings_save_button"><span class="button__text">ذخیره</span></button>
                            <div id="fsms-edd-settings-response-message" style="display: none;"></div>
                        </div>
                    <?php } else { ?>
                        <div class="fsms-warning-message enter-credentials"><?php esc_attr_e('EDD plugin is not installed. To see the settings related to this plugin, first install and activate EDD.', 'farazsms') ?></div>
                    <?php } ?>
                </div>
                <p id="farazsms_copyright"><?php esc_attr_e('All material and intellectual rights of this plugin belong to Faraz SMS (Zarin Communications Asia Company).', 'farazsms') ?></p>
            </div>
        </div>

        <!-- FSMS TAB-7 Newsletter-Settings -->

        <div class="tab">
            <input type="radio" name="css-tabs" id="tab-7" class="tab-switch">
            <label for="tab-7" class="tab-label"><?php esc_attr_e('Newsletter settings', 'farazsms') ?></label>
            <div class="tab-content">
                <div class="form-style-2">
                    <div id="send_message_to_phonebooks" class="fsms_form form-style-2">
                        <h3><?php esc_attr_e('Send SMS to members of the newsletter', 'farazsms') ?></h3>
                        <form id="send_message_to_subscribers">
                            <label for="fsms_to_subscribers_message">
                                <span class="label"><?php esc_attr_e('Message content', 'farazsms') ?><span class="required">*</span></span>
                                <textarea rows="5" name="fsms_to_subscribers_message" id="fsms_to_subscribers_message"></textarea>
                                <div class="fsms-info-message comment_pattern_info" style="text-align: center;width: 47%;margin:  auto;"><?php esc_attr_e('You can use %name% variable in SMS text', 'farazsms') ?></div>
                            </label>
                            <br>
                            <br>
                            <button class="fsms_button" id="send_message_to_subscribers_button"><span class="button__text"><?php esc_attr_e('Send message', 'farazsms') ?></span></button>
                            <div id="send_message_to_subscribers_response" style="margin-top: 10px;display: none;"></div>
                        </form>
                    </div>
                    <div id="newsletter_containerrr">
                        <div class="fsms-info-message comment_pattern_info" style="text-align: center;"><?php esc_attr_e('The code of the newsletter membership form is: [farazsms].', 'farazsms') ?></div>
                        <label for="fsms_newsletter_phonebooks">
                            <span class="label"><?php esc_attr_e('Select phone book for newsletter', 'farazsms') ?></span>
                            <select multiple name="fsms_newsletter_phonebooks[]" id="fsms_newsletter_phonebooks" style="min-width: 60%;">
                                <?php
                                $fsms_newsletter_phonebooks = get_option('fsms_newsletter_phonebooks', []);
                                foreach ($phonebooks as $phonebook) { ?>
                                    <option value="<?php echo $phonebook->id; ?>" <?php echo (in_array($phonebook->id, $fsms_newsletter_phonebooks)) ? 'selected' : ''; ?>><?php echo $phonebook->title; ?></option>
                                <?php } ?>
                            </select>
                        </label>
                        <br>
                        <br>
                        <label for="fsms_newsletter_send_ver_code" class="toggle-control">
                            <span class="label" style="padding-top: 0;"><?php esc_attr_e('Confirm subscription by sending confirmation code?', 'farazsms') ?></span>
                            <input type="checkbox" id="fsms_newsletter_send_ver_code" name="fsms_edd_send_to_user" <?php echo ($newsletter_send_ver_code === 'true' ? 'checked' : '') ?>>
                            <span class="control"></span>
                        </label>
                        <br>
                        <br>
                        <label for="fsms_newsletter_pcode">
                            <span class="label" style="display: flex;justify-content: space-between;"><?php esc_attr_e('Newsletter membership confirmation code pattern', 'farazsms') ?></span>
                            <input type="text" class="input-field" id="fsms_newsletter_pcode" name="fsms_newsletter_pcode" value="<?php echo $newsletter_pcode; ?>">
                        </label>
                        <br>
                        <div class="fsms-info-message comment_pattern_info"><?php esc_attr_e('Usable variables are %name% and confirmation code: %code%', 'farazsms') ?></div>
                        <br>
                        <br>
                        <label for="fsms_newsletter_welcome" class="toggle-control">
                            <span class="label" style="padding-top: 0;"><?php esc_attr_e('Welcome SMS to subscriber of the newsletter?', 'farazsms') ?></span>
                            <input type="checkbox" id="fsms_newsletter_welcome" name="fsms_newsletter_welcome" <?php echo ($fsms_newsletter_welcome === 'true' ? 'checked' : '') ?>>
                            <span class="control"></span>
                        </label>
                        <br>
                        <br>
                        <label for="fsms_newsletter_welcomep">
                            <span class="label" style="display: flex;justify-content: space-between;"><?php esc_attr_e('Welcome SMS pattern code', 'farazsms') ?></span>
                            <input type="text" class="input-field" id="fsms_newsletter_welcomep" name="fsms_newsletter_welcomep" value="<?php echo $fsms_newsletter_welcomep; ?>">
                        </label>
                        <br>
                        <div class="fsms-info-message comment_pattern_info"><?php esc_attr_e('The usable variable is %name%', 'farazsms') ?></div>
                        <br>
                        <br>
                        <label for="fsms_newsletter_new_post_notification" class="toggle-control">
                            <span class="label" style="padding-top: 0;"><?php esc_attr_e('Send new posts to newsletter members?', 'farazsms') ?></span>
                            <input type="checkbox" id="fsms_newsletter_new_post_notification" name="fsms_newsletter_new_post_notification" <?php echo ($fsms_newsletter_new_post_notification === 'true' ? 'checked' : '') ?>>
                            <span class="control"></span>
                        </label>
                        <br>
                        <br>
                        <label for="fsms_newsletter_post_notification_message">
                            <span class="label" style="display: flex;justify-content: space-between;"><?php esc_attr_e('Message content', 'farazsms') ?></span>
                            <textarea rows="7" cols="30" class="input-field" id="fsms_newsletter_post_notification_message" name="fsms_newsletter_post_notification_message"><?php echo $fsms_newsletter_post_notification_message; ?></textarea>
                        </label>
                        <br>
                        <div class="fsms-info-message comment_pattern_info"><?php esc_attr_e('Usable variables are the title of the article %title% and the address of the article %url%', 'farazsms') ?></div>
                        <br>
                        <br>
                        <?php if ($fsms_base::isWooInstalled()) { ?>
                            <label for="fsms_newsletter_new_product_notification" class="toggle-control">
                                <span class="label" style="padding-top: 0;"><?php esc_attr_e('Sending new products to newsletter members?', 'farazsms') ?></span>
                                <input type="checkbox" id="fsms_newsletter_new_product_notification" name="fsms_newsletter_new_product_notification" <?php echo ($fsms_newsletter_new_product_notification === 'true' ? 'checked' : '') ?>>
                                <span class="control"></span>
                            </label>
                            <br>
                            <br>
                            <label for="fsms_newsletter_product_notification_message">
                                <span class="label" style="display: flex;justify-content: space-between;"><?php esc_attr_e('Message content', 'farazsms') ?></span>
                                <textarea rows="7" cols="30" class="input-field" id="fsms_newsletter_product_notification_message" name="fsms_newsletter_product_notification_message"><?php echo $fsms_newsletter_product_notification_message; ?></textarea>
                            </label>
                            <br>
                            <div class="fsms-info-message comment_pattern_info"><?php esc_attr_e('Usable variables are site title %site_title% product name %product_name% price %price% and product link %url%', 'farazsms') ?></div>
                        <?php } ?>
                        <div id="newsletter_subscibers">
                            <?php $subscribers = $fsms_base::get_subscribers();
                            if (!empty($subscribers)) {
                            ?>
                                <div class="container-table100">
                                    <div class="wrap-table100">
                                        <div class="table100">
                                            <table>
                                                <thead>
                                                    <tr class="table100-head">
                                                        <th class="column1"><?php esc_attr_e('First name and last name', 'farazsms') ?></th>
                                                        <th class="column3"><?php esc_attr_e('Phone number', 'farazsms') ?></th>
                                                        <th class="column4"><?php esc_attr_e('Delete from newsletter', 'farazsms') ?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($subscribers as $subscriber) { ?>
                                                        <tr>
                                                            <td class="column1"><?php echo $subscriber->name; ?></td>
                                                            <td class="column3"><?php echo $subscriber->phone; ?></td>
                                                            <td class="column4"><button value="<?php echo $subscriber->id; ?>" class="fsms_button delete_subscriber"><span class="button__text"><?php esc_attr_e('Delete', 'farazsms') ?></span></button></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="fsms_save_button_container">
                            <button class="fsms_button" id="fsms_newsletter_settings_save_button"><span class="button__text"><?php esc_attr_e('Save settings', 'farazsms') ?></span></button>
                            <div id="fsms-newsletter-settings-response-message" style="display: none;"></div>
                        </div>
                    </div>
                </div>
                <p id="farazsms_copyright"><?php esc_attr_e('All material and intellectual rights of this plugin belong to Faraz SMS (Zarin Communications Asia Company).', 'farazsms') ?></p>
            </div>
        </div>

        <!-- FSMS TAB-8 Other-Plugins -->

        <div class="tab">
            <input type="radio" name="css-tabs" id="tab-8" class="tab-switch">
            <label for="tab-8" class="tab-label"><?php esc_attr_e('Other plugins', 'farazsms') ?></label>
            <div class="tab-content">
                <div class="form-style-2 fsms_form">
                    <form id="fsms_others_settings_save_form">
                        <?php if ($fsms_base::isIHCInstalled()) { ?>
                            <h3><?php esc_attr_e('Ultimate Membership PRO plugin', 'farazsms') ?></h3>
                            <br>
                            <label for="fsms_ihc_send_first_noti_sms" class="toggle-control">
                                <span class="label" style="padding-top: 0;"><?php esc_attr_e('Send the first SMS warning of membership expiration?', 'farazsms') ?></span>
                                <input type="checkbox" id="fsms_ihc_send_first_noti_sms" name="fsms_ihc_send_first_noti_sms" <?php echo ($fsms_ihc_send_first_noti_sms === 'true' ? 'checked' : '') ?>>
                                <span class="control"></span>
                            </label>
                            <br>
                            <br>
                            <label for="fsms_ihc_send_second_noti_sms" class="toggle-control">
                                <span class="label" style="padding-top: 0;"><?php esc_attr_e('Sending a second SMS warning of membership expiration?', 'farazsms') ?></span>
                                <input type="checkbox" id="fsms_ihc_send_second_noti_sms" name="fsms_ihc_send_second_noti_sms" <?php echo ($fsms_ihc_send_second_noti_sms === 'true' ? 'checked' : '') ?>>
                                <span class="control"></span>
                            </label>
                            <br>
                            <br>
                            <label for="fsms_ihc_send_third_noti_sms" class="toggle-control">
                                <span class="label" style="padding-top: 0;"><?php esc_attr_e('Send the third SMS warning of membership expiration?', 'farazsms') ?></span>
                                <input type="checkbox" id="fsms_ihc_send_third_noti_sms" name="fsms_ihc_send_third_noti_sms" <?php echo ($fsms_ihc_send_third_noti_sms === 'true' ? 'checked' : '') ?>>
                                <span class="control"></span>
                            </label>
                            <br>
                            <br>
                            <label for="fsms_ihc_first_noti_sms_message">
                                <span class="label" style="display: flex;justify-content: space-between;"><?php esc_attr_e('Membership expiration warning SMS text', 'farazsms') ?></span>
                                <textarea rows="7" cols="30" id="fsms_ihc_first_noti_sms_message" name="fsms_ihc_first_noti_sms_message"><?php echo trim($fsms_ihc_first_noti_sms_message); ?></textarea>
                            </label>
                            <br>
                            <div class="fsms-info-message comment_pattern_info"><?php esc_attr_e('Usable variables are username %name% time remaining to day %time%', 'farazsms') ?></div>
                            <br>
                            <br>
                        <?php } else { ?>
                            <div class="fsms-warning-message enter-credentials"><?php esc_attr_e('The Ultimate Membership PRO plugin is not installed. To see the settings related to this plugin, first install and activate it.', 'farazsms') ?></div>
                            <br>
                            <br>
                        <?php } ?>
                        <?php if ($fsms_base::isPMPInstalled()) { ?>
                            <h3><?php esc_attr_e('Paid Membership PRO', 'farazsms') ?></h3>
                            <br>
                            <label for="fsms_pmp_send_expire_noti_sms" class="toggle-control">
                                <span class="label" style="padding-top: 0;"><?php esc_attr_e('Send SMS membership expiration?', 'farazsms') ?></span>
                                <input type="checkbox" id="fsms_pmp_send_expire_noti_sms" name="fsms_pmp_send_expire_noti_sms" <?php echo ($fsms_pmp_send_expire_noti_sms === 'true' ? 'checked' : '') ?>>
                                <span class="control"></span>
                            </label>
                            <br>
                            <br>
                            <label for="fsms_pmp_expire_noti_sms_message">
                                <span class="label" style="display: flex;justify-content: space-between;"><?php esc_attr_e('The text of the membership expiration SMS', 'farazsms') ?></span>
                                <textarea rows="7" cols="30" id="fsms_pmp_expire_noti_sms_message" name="fsms_pmp_expire_noti_sms_message"><?php echo trim($fsms_pmp_expire_noti_sms_message); ?></textarea>
                            </label>
                            <br>
                            <div class="fsms-info-message comment_pattern_info"><?php esc_attr_e('Usable variable is user name %display_name%', 'farazsms') ?></div>
                            <br>
                            <br>
                        <?php } else { ?>
                            <div class="fsms-warning-message enter-credentials"><?php esc_attr_e('Paid Membership PRO plugin is not installed. To see the settings related to this plugin, first install and activate it.', 'farazsms') ?></div>
                            <br>
                            <br>
                        <?php } ?>
                        <?php if ($fsms_base::isAFFInstalled() || $fsms_base::isWCAFInstalled() || $fsms_base::isUAPInstalled()) { ?>
                            <h3><?php esc_attr_e('Affiliate wp plugin or Ultimate Affiliate Pro or Yith woocommerce Affiliate', 'farazsms') ?></h3>
                            <br>
                            <h3><?php esc_attr_e('Send user SMS', 'farazsms') ?></h3>
                            <br>
                            <div class="fsms_form_element">
                                <label for="fsms_aff_user_mobile_field"><?php esc_attr_e('Select the mobile number custom field', 'farazsms') ?></label>
                                <select multiple="multiple" name="fsms_aff_user_mobile_field[]" id="fsms_aff_user_mobile_field">
                                    <?php
                                    global $wpdb;
                                    $user_meta_keys = $wpdb->get_results("SELECT DISTINCT meta_key FROM `" . $wpdb->prefix . "usermeta`");
                                    $fsms_aff_user_mobile_field = get_option('fsms_aff_user_mobile_field', []);
                                    foreach ($user_meta_keys as $user_meta_key) { ?>
                                        <option value="<?php echo $user_meta_key->meta_key; ?>" <?php echo (in_array($user_meta_key->meta_key, $fsms_aff_user_mobile_field)) ? 'selected' : ''; ?>><?php echo $user_meta_key->meta_key; ?></option>
                                        <?php }
                                    foreach ($user_meta_keys as $user_meta_key) {
                                        $meta_helper[] = $user_meta_key->meta_key;
                                    }
                                    foreach ($fsms_aff_user_mobile_field as $selected) {
                                        if (!in_array($selected, $meta_helper)) {
                                        ?>
                                            <option value="<?php echo $selected; ?>" selected><?php echo $selected; ?></option>
                                    <?php }
                                    }
                                    ?>
                                </select>
                            </div>
                            <br>
                            <label for="fsms_aff_user_register" class="toggle-control">
                                <span class="label" style="padding-top: 0;"><?php esc_attr_e('User registration', 'farazsms') ?></span>
                                <input type="checkbox" id="fsms_aff_user_register" name="fsms_aff_user_register" <?php echo ($fsms_aff_user_register === 'true' ? 'checked' : '') ?>>
                                <span class="control"></span>
                            </label>
                            <br>
                            <br>
                            <label for="fsms_aff_user_register_message">
                                <span class="label" style="display: flex;justify-content: space-between;"><?php esc_attr_e('User registration SMS pattern code', 'farazsms') ?></span>
                                <input type="text" class="input-field" id="fsms_aff_user_register_message" name="fsms_aff_user_register_message" value="<?php echo $fsms_aff_user_register_message; ?>">
                            </label>
                            <br>
                            <br>
                            <?php if ($fsms_base::isAFFInstalled()) { ?>
                                <label for="fsms_aff_user_new_ref" class="toggle-control">
                                    <span class="label" style="padding-top: 0;"><?php esc_attr_e('New referral', 'farazsms') ?></span>
                                    <input type="checkbox" id="fsms_aff_user_new_ref" name="fsms_aff_user_new_ref" <?php echo ($fsms_aff_user_new_ref === 'true' ? 'checked' : '') ?>>
                                    <span class="control"></span>
                                </label>
                                <br>
                                <br>
                                <label for="fsms_aff_user_new_ref_message">
                                    <span class="label" style="display: flex;justify-content: space-between;"><?php esc_attr_e('New referral SMS pattern code', 'farazsms') ?></span>
                                    <input type="text" class="input-field" id="fsms_aff_user_new_ref_message" name="fsms_aff_user_new_ref_message" value="<?php echo $fsms_aff_user_new_ref_message; ?>">
                                </label>
                                <br>
                                <br>
                            <?php } ?>
                            <?php if ($fsms_base::isAFFInstalled() || $fsms_base::isWCAFInstalled()) { ?>
                                <label for="fsms_aff_user_on_approval" class="toggle-control">
                                    <span class="label" style="padding-top: 0;"><?php esc_attr_e('Confirmation of the cooperation account in sales', 'farazsms') ?></span>
                                    <input type="checkbox" id="fsms_aff_user_on_approval" name="fsms_aff_user_on_approval" <?php echo ($fsms_aff_user_on_approval === 'true' ? 'checked' : '') ?>>
                                    <span class="control"></span>
                                </label>
                                <br>
                                <br>
                                <label for="fsms_aff_user_on_approval_message">
                                    <span class="label" style="display: flex;justify-content: space-between;"><?php esc_attr_e('Account confirmation pattern code for cooperation in sales', 'farazsms') ?></span>
                                    <input type="text" class="input-field" id="fsms_aff_user_on_approval_message" name="fsms_aff_user_on_approval_message" value="<?php echo $fsms_aff_user_on_approval_message; ?>">
                                </label>
                                <br>
                                <br>
                            <?php } ?>
                            <h3>ارسال پیامک مدیر</h3>
                            <br>
                            <label for="fsms_aff_admin_user_register" class="toggle-control">
                                <span class="label" style="padding-top: 0;"><?php esc_attr_e('User registration', 'farazsms') ?></span>
                                <input type="checkbox" id="fsms_aff_admin_user_register" name="fsms_aff_admin_user_register" <?php echo ($fsms_aff_admin_user_register === 'true' ? 'checked' : '') ?>>
                                <span class="control"></span>
                            </label>
                            <br>
                            <br>
                            <label for="fsms_aff_admin_user_register_message">
                                <span class="label" style="display: flex;justify-content: space-between;"><?php esc_attr_e('User registration SMS pattern code', 'farazsms') ?></span>
                                <input type="text" class="input-field" id="fsms_aff_admin_user_register_message" name="fsms_aff_admin_user_register_message" value="<?php echo $fsms_aff_admin_user_register_message; ?>">
                            </label>
                            <br>
                            <br>
                            <?php if ($fsms_base::isAFFInstalled()) { ?>
                                <label for="fsms_aff_admin_user_new_ref" class="toggle-control">
                                    <span class="label" style="padding-top: 0;"><?php esc_attr_e('New referral', 'farazsms') ?></span>
                                    <input type="checkbox" id="fsms_aff_admin_user_new_ref" name="fsms_aff_admin_user_new_ref" <?php echo ($fsms_aff_admin_user_new_ref === 'true' ? 'checked' : '') ?>>
                                    <span class="control"></span>
                                </label>
                                <br>
                                <br>
                                <label for="fsms_aff_admin_user_new_ref_message">
                                    <span class="label" style="display: flex;justify-content: space-between;"><?php esc_attr_e('New referral SMS pattern code', 'farazsms') ?></span>
                                    <input type="text" class="input-field" id="fsms_aff_admin_user_new_ref_message" name="fsms_aff_admin_user_new_ref_message" value="<?php echo $fsms_aff_admin_user_new_ref_message; ?>">
                                </label>
                                <br>
                                <br>
                            <?php } ?>
                            <?php if ($fsms_base::isAFFInstalled() || $fsms_base::isWCAFInstalled()) { ?>
                                <label for="fsms_aff_admin_user_on_approval" class="toggle-control">
                                    <span class="label" style="padding-top: 0;"><?php esc_attr_e('Confirmation of the cooperation account in sales', 'farazsms') ?></span>
                                    <input type="checkbox" id="fsms_aff_admin_user_on_approval" name="fsms_aff_admin_user_on_approval" <?php echo ($fsms_aff_admin_user_on_approval === 'true' ? 'checked' : '') ?>>
                                    <span class="control"></span>
                                </label>
                                <br>
                                <br>
                                <label for="fsms_aff_admin_user_on_approval_message">
                                    <span class="label" style="display: flex;justify-content: space-between;"><?php esc_attr_e('Account confirmation pattern code for cooperation in sales', 'farazsms') ?></span>
                                    <input type="text" class="input-field" id="fsms_aff_admin_user_on_approval_message" name="fsms_aff_admin_user_on_approval_message" value="<?php echo $fsms_aff_admin_user_on_approval_message; ?>">
                                </label>
                                <br>
                                <br>
                            <?php } ?>
                            <div class="fsms-info-message comment_pattern_info"><?php esc_attr_e('Usable variables are username %user_login% nickname %user_nicename% email %user_email% display name %display_name% mobile number %user_mobile% referral amount %amount%', 'farazsms') ?></div>
                        <?php } else { ?>
                            <div class="fsms-warning-message enter-credentials"><?php esc_attr_e('Affiliate wp or Ultimate Affiliate Pro or Yith woocommerce Affiliate plugin is not installed. To see the settings related to this plugin, first install and activate it.', 'farazsms') ?></div>
                            <br>
                            <br>
                        <?php } ?>
                        <div class="fsms_save_button_container">
                            <button type="submit" class="fsms_button" id="fsms_others_settings_save_button"><span class="button__text"><?php esc_attr_e('Save sttings', 'farazsms') ?></span></button>
                            <div id="fsms-others-settings-response-message" style="display: none;"></div>
                        </div>
                    </form>
                </div>
                <p id="farazsms_copyright"><?php esc_attr_e('All material and intellectual rights of this plugin belong to Faraz SMS (Zarin Communications Asia Company).', 'farazsms') ?></p>
            </div>
        </div>

        <!-- FSMS TAB-9 Send_Sms -->

        <div class="tab">
            <input type="radio" name="css-tabs" id="tab-9" class="tab-switch">
            <label for="tab-9" class="tab-label"><?php esc_attr_e('Send sms', 'farazsms') ?></label>
            <div class="tab-content">
                <div id="send_message_to_phonebooks" class="fsms_form form-style-2">
                    <?php if ($credentials_option == null) { ?>
                        <div class="fsms-warning-message enter-credentials"><?php esc_attr_e('To see the sending SMS Section, first enter your information in the settings', 'farazsms') ?></div>
                    <?php } else {  ?>
                        <h3><?php esc_attr_e('Send SMS to phonebook contacts or manual numbers', 'farazsms') ?></h3>
                        <form id="send_message_to_phonebooks_form">
                            <label for="fsms_to_phonebooks_message">
                                <span class="label"><?php esc_attr_e('Content message', 'farazsms') ?><span class="required">*</span></span>
                                <textarea rows="5" name="fsms_to_phonebooks_message" id="fsms_to_phonebooks_message"></textarea>
                            </label>
                            <br><br>
                            <label for="fsms_phonebooks_choice">
                                <span class="label"><?php esc_attr_e('Select phonebook', 'farazsms') ?><span class="required">*</span></span>
                                <select multiple name="fsms_phonebooks_choice[]" id="fsms_phonebooks_choice" style="min-width: 60%;">
                                    <?php foreach ($phonebooks as $phonebook) { ?>
                                        <option value="<?php echo $phonebook->id; ?>"><?php echo $phonebook->title; ?></option>
                                    <?php } ?>
                                </select>
                            </label>
                            <br><br>
                            <label for="fsms_subscribers" class="toggle-control">
                                <span class="label" style="padding-top: 0;"><?php esc_attr_e('ُSend to newsletter subscribers', 'farazsms') ?></span>
                                <input type="checkbox" id="fsms_subscribers" name="fsms_subscribers">
                                <span class="control"></span>
                            </label>
                            <br><br>
                            <label for="fsms_phones_choice">
                                <span class="label" style="display: flex;justify-content: space-between;"><?php esc_attr_e('Enter numbers manually', 'farazsms') ?><div class="icon icon__src">
                                        <div class="tooltip tooltip__src">
                                            <?php esc_attr_e('Separate numbers with English commas', 'farazsms') ?>
                                        </div>
                                        <svg viewBox="0 0 24 24">
                                            <path d="M23,12L20.56,9.22L20.9,5.54L17.29,4.72L15.4,1.54L12,3L8.6,1.54L6.71,4.72L3.1,5.53L3.44,9.21L1,12L3.44,14.78L3.1,18.47L6.71,19.29L8.6,22.47L12,21L15.4,22.46L17.29,19.28L20.9,18.46L20.56,14.78L23,12M13,17H11V15H13V17M13,13H11V7H13V13Z"></path>
                                        </svg>
                                    </div></span>
                                <textarea class="input-field" name="fsms_phones_choice" id="fsms_phones_choice"></textarea>
                            </label>
                            <br><br>
                            <label for="fsms_send_formnum_choice">
                                <span class="label" style="padding-top: 5px;"><?php esc_attr_e('Select the sender number', 'farazsms') ?><span class="required">*</span></span>
                                <select name="fsms_send_formnum_choice" id="fsms_send_formnum_choice">
                                    <option value="1"><?php esc_attr_e('Servicng number', 'farazsms') ?></option>
                                    <option value="2"><?php esc_attr_e('Advertising number', 'farazsms') ?></option>
                                </select>
                            </label>
                            <br><br>
                            <button class="fsms_button" id="send_message_to_phonebooks_button"><span class="button__text"><?php esc_attr_e('Send Sms', 'farazsms') ?></span></button>
                            <div id="fsms-send-message-response-message" style="display: none;"></div>
                        </form>
                    <?php } ?>
                </div>
                <p id="farazsms_copyright"><?php esc_attr_e('All material and intellectual rights of this plugin belong to Faraz SMS (Zarin Communications Asia Company).', 'farazsms') ?></p>
            </div>
        </div>

        <!-- FSMS TAB-10 Send-Feedback -->

        <div class="tab">
            <input type="radio" name="css-tabs" id="tab-10" class="tab-switch">
            <label for="tab-10" class="tab-label"><?php esc_attr_e('Send Feedback', 'farazsms') ?></label>
            <div class="tab-content">
                <div class="form-style-2 fsms_form">
                    <div class="fsms-info-message comment_pattern_info"><?php esc_attr_e('You can report problems to us through the form below', 'farazsms') ?></div>
                    <form id="fsms_send_feedback_form">
                        <label for="fsms_feedback_message">
                            <span class="label" style="display: flex;justify-content: space-between;"><?php esc_attr_e('Content message', 'farazsms') ?></span>
                            <textarea rows="10" cols="80" id="fsms_feedback_message" name="fsms_feedback_message"></textarea>
                        </label>
                        <div class="fsms_save_button_container">
                            <button type="submit" class="fsms_button" id="fsms_send_feedback"><span class="button__text"><?php esc_attr_e('Send Feedback', 'farazsms') ?></span></button>
                            <div id="fsms-feedback-response-message" style="display: none;"></div>
                        </div>
                    </form>
                </div>

                <!-- FSMS copyright on Footer -->

                <p id="farazsms_copyright"><?php esc_attr_e('All material and intellectual rights of this plugin belong to Faraz SMS (Zarin Communications Asia Company).', 'farazsms') ?></p>
            </div>
        </div>
    </div>
    <div id="overlay">
        <div class="cv-spinner">
            <span class="spinner"></span>
        </div>
    </div>
</div>