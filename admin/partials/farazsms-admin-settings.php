<?php

/**
 * @link       https://farazsms.com/
 * @since      1.0.7
 *
 * @package    Farazsms
 * @subpackage Farazsms/admin/partials
 * 
 * @since      1.0.8 isset(); added for Check if option is set any thing to avoid warnings.
 */
$fsms_base = class_farazsms_base::getInstance();
$credentials_option = add_option('fsms_credentials');
$fsms_uname = isset($credentials_option['fsms_uname']);
$fsms_password = isset($credentials_option['fsms_password']);
$fsms_admin_notify_number = isset($credentials_option['fsms_admin_notify_number']);
$fsms_fromnum = ($credentials_option['fsms_fromnum']) ?? '3000505';
$fsms_fromnum_adver = $credentials_option['fsms_fromnum_adver'] ?? '+98club';
$fsms_apikey = isset($credentials_option['fsms_api_key']);
$fsms_sendwm = isset($credentials_option['fsms_sendwm']);
$fsms_sendwm_with_pattern = isset($credentials_option['fsms_sendwm_with_pattern']);
$fsms_welcomep = isset($credentials_option['fsms_welcomep']);
$fsms_admin_login_noti = isset($credentials_option['fsms_admin_login_noti']);
$fsms_admin_login_noti_p = isset($credentials_option['fsms_admin_login_noti_p']);
if (isset($credentials_option['fsms_welcome_message'])) {
    $fsms_welcome_message = ($credentials_option['fsms_fromnum']);
} else {
    $fsms_welcome_message = '';
};
if (isset($credentials_option['fsms_admin_login_noti_roles'])) {
    $fsms_admin_login_noti_roles = ($credentials_option['fsms_fromnum']);
} else {
    $fsms_admin_login_noti_roles = [];
};
$fsms_addmf = get_option('fsms_add_mobile_field', 'false');
$fsms_requiredmf = get_option('fsms_required_mobile_field', 'false');
$fsms_notify_admin = get_option('fsms_notify_admin', 'false');
$fsms_admin_notify_pcode = get_option('fsms_admin_notify_pcode', '');
$fsms_approved_commentp = get_option('fsms_approved_comment_pattern', '');
$fsms_commentp = get_option('fsms_comment_pattern', '');

$fsms_woo_checkout_otp = get_option('fsms_woo_checkout_otp', 'false');
$fsms_woo_checkout_otp_pattern = get_option('fsms_woo_checkout_otp_pattern', '');
$fsms_woo_poll = get_option('fsms_woo_poll', 'false');
$fsms_woo_poll_time = get_option('fsms_woo_poll_time', '4');
$fsms_woo_poll_message = get_option('fsms_woo_poll_message', 'شما %time% روز پیش %item% را از سایت %sitename% خریداری کرده اید. از خریدتان ممنونیم.
 لطفا تجربه استفاده و خریدتان را با کلیک روی لینک زیر از بخش نظرات با ما و کاربران ما به اشتراک بگذارید
%item_link%');
$fsms_woo_tracking_code_pattern = get_option('fsms_woo_tracking_code_pattern', '');
$fsms_woo_retention_order_no = get_option('fsms_woo_retention_order_no', '');
$fsms_woo_retention_order_month = get_option('fsms_woo_retention_order_month', '');
$fsms_woo_retention_message = get_option('fsms_woo_retention_message', '');

$phonebooks = $fsms_base::get_phonebooks();

$panel_expire_date = get_option('fsms_panel_expire_date', '');
$future = strtotime($panel_expire_date);
$timefromdb = time();
$timeleft = $future - $timefromdb;
$daysleft = round((($timeleft / 24) / 60) / 60);

$fsms_edd_send_to_user = get_option('edd_send_to_user', 'false');
$fsms_edd_user_pcode = get_option('edd_user_pcode', '');
$fsms_edd_send_to_admin = get_option('edd_send_to_admin', 'false');
$fsms_edd_admin_pcode = get_option('edd_admin_pcode', '');

$newsletter_send_ver_code = get_option('fsms_newsletter_send_ver_code', 'false');
$newsletter_pcode = get_option('fsms_newsletter_newsletter_pcode', '');
$fsms_newsletter_welcome = get_option('fsms_newsletter_welcome', 'false');
$fsms_newsletter_welcomep = get_option('fsms_newsletter_welcomep', '');

$fsms_newsletter_new_post_notification = get_option('fsms_newsletter_new_post_notification', 'false');
$fsms_newsletter_post_notification_message = get_option('fsms_newsletter_post_notification_message', 'مقاله جدید %title% منتشر شد.
آدرس مقاله: %url%');
$fsms_newsletter_new_product_notification = get_option('fsms_newsletter_new_product_notification', 'false');
$fsms_newsletter_product_notification_message = get_option('fsms_newsletter_product_notification_message', 'محصول %product_name% با قیمت %price% در فروشگاه %site_title% موجود شد.
لینک محصول: %url%');


if ($fsms_base::isIHCInstalled()) {
    $fsms_ihc_send_first_noti_sms    = get_option('fsms_ihc_send_first_noti_sms', 'false');
    $fsms_ihc_send_second_noti_sms    = get_option('fsms_ihc_send_second_noti_sms', 'false');
    $fsms_ihc_send_third_noti_sms    = get_option('fsms_ihc_send_third_noti_sms', 'false');
    $fsms_ihc_first_noti_sms_message = get_option('fsms_first_noti_sms_message', '%name% عزیز تنها %time% روز دیگر تا پایان اشتراک شما باقیمانده');
}

if ($fsms_base::isPMPInstalled()) {
    $fsms_pmp_send_expire_noti_sms = get_option('fsms_pmp_send_expire_noti_sms', 'false');
    $fsms_pmp_expire_noti_sms_message = get_option('fsms_pmp_expire_noti_sms_message', '%display_name% عزیز اشتراک شما تمام شده لطفا برای تمدید اقدام کنید');
}

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

?>
<div class="wrapper">
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
                    <div class="fsms_credit_amount"><span>میزان اعتبار: </span><?php echo number_format($credit); ?><span> تومان</span></div>
                    <?php if (!empty($panel_expire_date)) { ?>
                        <div class="fsms_panel_remaining"><span>مدت زمان باقیمانده: </span><?php echo $daysleft; ?><span> روز</span></div>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    </div>
    <div class="tabs">
        <div class="tab">
            <input type="radio" name="css-tabs" id="tab-1" checked class="tab-switch">
            <label for="tab-1" class="tab-label"><?php _e('settings', 'farazsms') ?></label>
            <div class="tab-content">
                <form id="fsms_credentials" class="fsms_form form-style-2">
                    <label for="fsms_apikey">
                        <span class="label">کلید api <span class="required">*</span>
                            <div class="icon icon__src" style="
    position: absolute;
    left: 7px;
    top: 9px;
">
                                <div class="tooltip tooltip__src">
                                    برای دریافت کلید دسترسی در پنل خود در فراز اس ام اس به منوی خدمات وبسرویس قسمت کلیدهای دسترسی مراجعه کنید
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
                        <span class="label"><?php _e('Username', 'farazsms') ?><span class="required">*</span></span>
                        <input type="text" class="input-field" id="fsms_uname" name="fsms_uname" value="<?php echo $fsms_uname; ?>">
                    </label>
                    <br><br>
                    <label for="fsms_password">
                        <span class="label"><?php _e('Password', 'farazsms') ?><span class="required">*</span></span>
                        <input type="text" class="input-field" id="fsms_password" name="fsms_password" value="<?php echo $fsms_password; ?>">
                    </label>
                    <br><br>
                    <label for="fsms_admin_notify_number">
                        <span class="label">شماره موبایل مدیر<span class="required">*</span></span>
                        <input type="text" class="input-field" id="fsms_admin_notify_number" name="fsms_admin_notify_number" value="<?php if ($fsms_admin_notify_number) echo $fsms_admin_notify_number; ?>">
                    </label>
                    <br><br>
                    <label for="fsms_fromnum">
                        <span class="label">شماره ارسال کننده خط خدماتی<span class="required">*</span></span>
                        <input type="text" class="input-field" id="fsms_fromnum" name="fsms_fromnum" value="<?php echo $fsms_fromnum; ?>">
                    </label>
                    <br><br>
                    <label for="fsms_fromnum_adver">
                        <span class="label">شماره ارسال کننده خط تبلیغاتی<span class="required">*</span>
                            <div class="icon icon__src" style="
    position: absolute;
    left: 7px;
    top: 9px;
">
                                <div class="tooltip tooltip__src">
                                    در صورتی که اینماد دارید پیشنهاد می شود که خط 9000 اختصاصی برای ارسال پیامک وب سرویس و ارسال پیامک به مشتریان خریداری کنید برای این مورد تیکت پشتیبانی ارسال کنید.
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
                        <span class="label" style="padding-top: 0;">ارسال پیامک خوشامدگویی به کاربر؟ </span>
                        <input type="checkbox" id="fsms_sendwm" name="fsms_sendwm" <?php echo ($fsms_sendwm === 'true' ? 'checked' : '') ?>>
                        <span class="control"></span>
                    </label>
                    <br><br>
                    <label for="fsms_sendwm_with_pattern" class="toggle-control">
                        <span class="label" style="padding-top: 0;">ارسال از طریق پترن؟</span>
                        <input type="checkbox" id="fsms_sendwm_with_pattern" name="fsms_sendwm_with_pattern" <?php echo ($fsms_sendwm_with_pattern === 'true' ? 'checked' : '') ?>>
                        <span class="control"></span>
                    </label>
                    <br><br>
                    <label for="fsms_welcome_message">
                        <span class="label" style="display: flex;justify-content: space-between;">متن پیامک خوشامدگویی</span>
                        <textarea rows="7" cols="30" id="fsms_welcome_message" name="fsms_welcome_message"><?php echo $fsms_welcome_message; ?></textarea>
                    </label>
                    <label for="fsms_welcomep" style="display: none !important;">
                        <span class="label" style="display: flex;justify-content: space-between;">کد پترن پیامک خوش آمدگویی</span>
                        <input type="text" class="input-field" id="fsms_welcomep" name="fsms_welcomep" value="<?php echo $fsms_welcomep; ?>">
                    </label>
                    <div class="fsms-info-message comment_pattern_info">متغیرهای قابل استفاده %display_name% و %username% می باشد</div>
                    <br><br>
                    <label for="fsms_admin_login_noti" class="toggle-control">
                        <span class="label" style="padding-top: 0;">ارسال پیامک اطلاعیه ورود مدیران؟</span>
                        <input type="checkbox" id="fsms_admin_login_noti" name="fsms_admin_login_noti" <?php echo ($fsms_admin_login_noti === 'true' ? 'checked' : '') ?>>
                        <span class="control"></span>
                    </label>
                    <br><br>
                    <div class="fsms_form_element">
                        <label for="fsms_admin_login_noti_roles">انتخاب نقش های کاربری</label>
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
                        <span class="label" style="display: flex;justify-content: space-between;">کد پترن اطلاعیه ورود</span>
                        <input type="text" class="input-field" id="fsms_admin_login_noti_p" name="fsms_admin_login_noti_p" value="<?php echo $fsms_admin_login_noti_p; ?>">
                    </label>
                    <br><br>
                    <div class="fsms-info-message comment_pattern_info">متغیرهای قابل استفاده نام کاربری %user_login% و نام کاربر %display_name% و تاریخ ورود %date% می باشد</div>
                    <br><br>
                    <div class="fsms_save_button_container">
                        <button type="submit" class="fsms_button" id="fsms_save_button"><span class="button__text">ذخیره</span></button>
                        <div id="fsms-response-message" style="display: none;"></div>
                    </div>
                </form>
                <p id="farazsms_copyright">تمامی حقوق مادی و معنوی این افزونه متعلق به فراز اس‌‌ام‌‌اس(شرکت زرین ارتباطات آسیا) می باشد.</p>
            </div>
        </div>
        <div class="tab">
            <input type="radio" name="css-tabs" id="tab-2" class="tab-switch">
            <label for="tab-2" class="tab-label">دفترچه تلفن</label>
            <div class="tab-content">
                <div id="phonebooks_section">
                    <div class="fsms-info-message comment_pattern_info"><strong>پیشنهاد ویژه</strong>: در صورتی که فروشگاه فیزیکی دارید برای جمع آوری شماره موبایل مشتریانتان از دستگاه ذخیره شماره موبایل استفاده نمایید. برای مشاهده جزئیات بر روی لینک زیر کلیک کنید
                        <div id="fsms_pos_link"><a class="fsms_button" href="https://farazsms.com/pos/" target="_blank">خرید دستگاه ذخیره شماره موبایل</a></div>
                    </div>
                    <?php if ($credentials_option == null) { ?>
                        <div class="fsms-warning-message enter-credentials">برای مشاهده تنطیمات دفترچه تلفن ابتدا اطلاعات خود را در تنظیمات وارد کنید</div>
                        <?php } else {
                        if (empty($phonebooks)) { ?>
                            <div class="fsms-warning-message enter-credentials">شما هنوز دفترچه تلفنی ثبت نکردید.لطفا ابتدا در سامانه فراز اس‌‌ام‌‌اس دفترچه تلفن های خود را ایجاد کنید</div>
                        <?php
                        } else { ?>
                            <div class="fsms_form_element">
                                <label for="custom_phone_book">انتخاب دفتر تلفن فیلد کاستوم</label>
                                <select multiple name="custom_phone_book[]" id="custom_phone_book">
                                    <?php
                                    $fsms_custom_phone_books = get_option('fsms_custom_phone_books', []);
                                    foreach ($phonebooks as $phonebook) { ?>
                                        <option value="<?php echo $phonebook->id; ?>" <?php echo (in_array($phonebook->id, $fsms_custom_phone_books)) ? 'selected' : ''; ?>><?php echo $phonebook->title; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="fsms_form_element">
                                <label for="custom_phone_meta_keys">انتخاب فیلد کاستوم شماره موبایل</label>
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
                                    <label for="digits_phone_book">انتخاب دفتر تلفن برای دیجیتس</label>
                                    <select multiple name="digits_phone_book[]" id="digits_phone_book">
                                        <?php
                                        $fsms_digits_phone_books = get_option('fsms_digits_phone_books', []);
                                        foreach ($phonebooks as $phonebook) { ?>
                                            <option value="<?php echo $phonebook->id; ?>" <?php echo (in_array($phonebook->id, $fsms_digits_phone_books)) ? 'selected' : ''; ?>><?php echo $phonebook->title; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            <?php } else { ?>
                                <div class="fsms-warning-message enter-credentials warning_phonebook">افزونه دیجیتس نصب نیست</div>
                            <?php } ?>
                            <?php if ($fsms_base::isWooInstalled()) { ?>
                                <div class="fsms_form_element">
                                    <label for="woo_phone_book">انتخاب دفتر تلفن برای ووکامرس</label>
                                    <select multiple name="woo_phone_book[]" id="woo_phone_book">
                                        <?php
                                        $fsms_woo_phone_books = get_option('fsms_woo_phone_books', []);
                                        foreach ($phonebooks as $phonebook) { ?>
                                            <option value="<?php echo $phonebook->id; ?>" <?php echo (in_array($phonebook->id, $fsms_woo_phone_books)) ? 'selected' : ''; ?>><?php echo $phonebook->title; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            <?php } else { ?>
                                <div class="fsms-warning-message enter-credentials warning_phonebook">افزونه ووکامرس نصب نیست</div>
                            <?php } ?>
                            <?php if ($fsms_base::isBooklyInstalled()) { ?>
                                <div class="fsms_form_element">
                                    <label for="bookly_phone_book">انتخاب دفتر تلفن برای بوکلی</label>
                                    <select multiple name="bookly_phone_book[]" id="bookly_phone_book">
                                        <?php
                                        $fsms_bookly_phone_books = get_option('fsms_bookly_phone_books', []);
                                        foreach ($phonebooks as $phonebook) { ?>
                                            <option value="<?php echo $phonebook->id; ?>" <?php echo (in_array($phonebook->id, $fsms_bookly_phone_books)) ? 'selected' : ''; ?>><?php echo $phonebook->title; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            <?php } else { ?>
                                <div class="fsms-warning-message enter-credentials warning_phonebook">افزونه بوکلی نصب نیست</div>
                            <?php } ?>
                            <?php if ($fsms_base::isGFInstalled()) { ?>
                                <div class="fsms_form_element">
                                    <label for="gf_phone_book">انتخاب دفتر تلفن برای Gravity Form</label>
                                    <select multiple name="gf_phone_book[]" id="gf_phone_book">
                                        <?php
                                        $fsms_gf_phone_books = get_option('fsms_gf_phone_books', []);
                                        foreach ($phonebooks as $phonebook) { ?>
                                            <option value="<?php echo $phonebook->id; ?>" <?php echo (in_array($phonebook->id, $fsms_gf_phone_books)) ? 'selected' : ''; ?>><?php echo $phonebook->title; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="fsms_form_element_gf">
                                    <label for="fsc-gravity-forms">تنظیمات Gravity Forms <div class="icon icon__src" style="
    position: absolute;
    left: 7px;
    top: -4px;
">
                                            <div class="tooltip tooltip__src">
                                                در این قسمت می توانید فیلدهای موردنظر خود را برای ثبت در دفترچه تلفن Gravity Form مشخص کنید
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
                                <div class="fsms-warning-message enter-credentials warning_phonebook">افزونه Gravity Form نصب نیست</div>
                            <?php } ?>
                            <div class="fsms_save_button_container">
                                <button class="fsms_button" id="fsms_phone_book_save_button"><span class="button__text">ذخیره</span></button>
                                <div id="fsms-phone-book-response-message" style="display: none;"></div>
                            </div>
                    <?php }
                    } ?>
                </div>
                <p id="farazsms_copyright">تمامی حقوق مادی و معنوی این افزونه متعلق به فراز اس‌‌ام‌‌اس(شرکت زرین ارتباطات آسیا) می باشد.</p>
            </div>
        </div>
        <div class="tab">
            <input type="radio" name="css-tabs" id="tab-3" class="tab-switch">
            <label for="tab-3" class="tab-label">هماهنگ سازی</label>
            <div class="tab-content">
                <div id="syn-sction">
                    <?php if ($credentials_option == null) { ?>
                        <div class="fsms-warning-message enter-credentials">برای مشاهده تنطیمات هماهنگ سازی ابتدا اطلاعات خود را در تنظیمات وارد کنید</div>
                    <?php } else {  ?>
                        <div class="fsms-info-message enter-credentials">شما می توانید از طریق دکمه های زیر کاربران قدیمی را در دفترچه تلفن ثبت کنید</div>
                        <div class="fsms-sync-buttons">
                            <?php if ($fsms_base::isDigitsInstalled()) { ?>
                                <div>
                                    <button class="fsms_button" id="fsms_digits-sync"><span class="button__text">هماهنگ سازی دیجیتس</span></button>
                                </div>
                            <?php } else { ?>
                                <div class="fsms-warning-message enter-credentials warning_phonebook">افزونه دیجیتس نصب نیست</div>
                            <?php } ?>
                            <?php if ($fsms_base::isWooInstalled()) { ?>
                                <div>
                                    <button class="fsms_button" id="fsms_woo-sync"><span class="button__text">هماهنگ سازی ووکامرس</span></button>
                                </div>
                            <?php } else { ?>
                                <div class="fsms-warning-message enter-credentials warning_phonebook">افزونه ووکامرس نصب نیست</div>
                            <?php } ?>
                            <?php if ($fsms_base::isBooklyInstalled()) { ?>
                                <div>
                                    <button class="fsms_button" id="fsms_bookly-sync"><span class="button__text">هماهنگ سازی بوکلی</span></button>
                                </div>
                            <?php } else { ?>
                                <div class="fsms-warning-message enter-credentials warning_phonebook">افزونه بوکلی نصب نیست</div>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
                <div class="fsms_save_button_container">
                    <div id="fsms-sync-response" style="display: none;"></div>
                </div>
                <p id="farazsms_copyright">تمامی حقوق مادی و معنوی این افزونه متعلق به فراز اس‌‌ام‌‌اس(شرکت زرین ارتباطات آسیا) می باشد.</p>
            </div>
        </div>
        <div class="tab">
            <input type="radio" name="css-tabs" id="tab-4" class="tab-switch">
            <label for="tab-4" class="tab-label">تنظیمات دیدگاه</label>
            <div class="tab-content">
                <div class="form-style-2">
                    <label for="fsms_add_mobile_field" class="toggle-control">
                        <span class="label" style="padding-top: 0;">اضافه کردن فیلد موبایل به فرم ثبت دیدگاه؟</span>
                        <input type="checkbox" id="fsms_add_mobile_field" name="fsms_add_mobile_field" <?php echo ($fsms_addmf === 'true' ? 'checked' : '') ?>>
                        <span class="control"></span>
                    </label>
                    <br><br>
                    <label for="fsms_required_mobile_field" class="toggle-control">
                        <span class="label" style="padding-top: 0;">فیلد شماره موبایل اجباری باشد؟</span>
                        <input type="checkbox" id="fsms_required_mobile_field" name="fsms_required_mobile_field" <?php echo ($fsms_requiredmf === 'true' ? 'checked' : '') ?>>
                        <span class="control"></span>
                    </label>
                    <br><br>
                    <label for="comment_phone_book">
                        <span class="label">ذخیره شماره تلفن در دفترچه تلفن؟</span>
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
                        <span class="label" style="display: flex;justify-content: space-between;">کد پترن ثبت دیدگاه</span>
                        <input type="text" class="input-field" id="fsms_approved_commentp" name="fsms_approved_commentp" value="<?php echo $fsms_approved_commentp; ?>">
                    </label>
                    <br><br>
                    <label for="fsms_commentp">
                        <span class="label" style="display: flex;justify-content: space-between;">کد پترن پاسخ دیدگاه</span>
                        <input type="text" class="input-field" id="fsms_commentp" name="fsms_commentp" value="<?php echo $fsms_commentp; ?>">
                    </label>
                    <br><br>
                    <label for="fsms_notify_admin" class="toggle-control">
                        <span class="label" style="padding-top: 0;">ارسال پیامک اطلاع رسانی به مدیر؟</span>
                        <input type="checkbox" id="fsms_notify_admin" name="fsms_notify_admin" <?php echo ($fsms_notify_admin === 'true' ? 'checked' : '') ?>>
                        <span class="control"></span>
                    </label>
                    <br><br>
                    <label for="fsms_admin_notify_pcode">
                        <span class="label" style="display: flex;justify-content: space-between;">کد پترن اطلاع رسانی مدیر</span>
                        <input type="text" class="input-field" id="fsms_admin_notify_pcode" name="fsms_admin_notify_pcode" value="<?php echo $fsms_admin_notify_pcode; ?>">
                    </label>
                    <br><br>
                    <div class="fsms-info-message comment_pattern_info"><strong>متغیرهای قابل استفاده:</strong> عنوان نوشته : %title% نام نویسنده دیدگاه : %name% ایمیل نویسنده دیدگاه : %email% لینک دیدگاه : %link% متن دیدگاه : %content% می باشد</div>
                    <div class="fsms_save_button_container">
                        <button type="submit" class="fsms_button" id="fsms_comment_settings_save_button"><span class="button__text">ذخیره</span></button>
                        <div id="fsms-comment-settings-response-message" style="display: none;"></div>
                    </div>
                </div>
                <p id="farazsms_copyright">تمامی حقوق مادی و معنوی این افزونه متعلق به فراز اس‌‌ام‌‌اس(شرکت زرین ارتباطات آسیا) می باشد.</p>
            </div>
        </div>
        <div class="tab">
            <input type="radio" name="css-tabs" id="tab-5" class="tab-switch">
            <label for="tab-5" class="tab-label">تنظیمات ووکامرس</label>
            <div class="tab-content">
                <div class="form-style-2">
                    <?php if ($fsms_base::isWooInstalled()) { ?>
                        <form id="woo_setting_form" class="fsms_form form-style-2">
                            <label for="fsms_woo_checkout_otp" class="toggle-control">
                                <span class="label" style="padding-top: 0;">تایید شماره موبایل در صفحه تسویه حساب؟</span>
                                <input type="checkbox" id="fsms_woo_checkout_otp" name="fsms_woo_checkout_otp" <?php echo ($fsms_woo_checkout_otp === 'true' ? 'checked' : '') ?>>
                                <span class="control"></span>
                            </label>
                            <br><br>
                            <label for="fsms_woo_checkout_otp_pattern">
                                <span class="label" style="display: flex;justify-content: space-between;">کد پترن تایید شماره موبایل</span>
                                <input type="text" class="input-field" id="fsms_woo_checkout_otp_pattern" name="fsms_woo_checkout_otp_pattern" value="<?php echo $fsms_woo_checkout_otp_pattern; ?>">
                            </label>
                            <br>
                            <div class="fsms-info-message comment_pattern_info">متغیر کد تایید %code% می باشد</div>
                            <br><br>
                            <label for="fsms_woo_poll" class="toggle-control">
                                <span class="label" style="padding-top: 0;">ارسال پیامک نظرسنجی زماندار برای ووکامرس؟</span>
                                <input type="checkbox" id="fsms_woo_poll" name="fsms_woo_poll" <?php echo ($fsms_woo_poll === 'true' ? 'checked' : '') ?>>
                                <span class="control"></span>
                            </label>
                            <br><br>
                            <label for="fsms_woo_poll_time">
                                <span class="label" style="display: flex;justify-content: space-between;">زمان ارسال پیامک بعد از ثبت سفارش به روز</span>
                                <input type="text" class="input-field" id="fsms_woo_poll_time" name="fsms_woo_poll_time" value="<?php echo $fsms_woo_poll_time; ?>">
                            </label>
                            <br><br>
                            <label for="fsms_woo_poll_message">
                                <span class="label" style="display: flex;justify-content: space-between;">متن پیامک</span>
                                <textarea rows="7" cols="30" id="fsms_woo_poll_message" name="fsms_woo_poll_message"><?php echo $fsms_woo_poll_message; ?></textarea>
                            </label>
                            <br><br>
                            <div class="fsms-info-message comment_pattern_info">متغیرهای قابل استفاده زمان %time% نام فروشگاه %sitename% نام محصول %item% لینک محصول %item_link% می باشد</div>
                            <br><br>
                            <label for="fsms_woo_tracking_code_pattern">
                                <span class="label" style="display: flex;justify-content: space-between;">کد پترن ارسال کد رهگیری</span>
                                <input type="text" class="input-field" id="fsms_woo_tracking_code_pattern" name="fsms_woo_tracking_code_pattern" value="<?php echo $fsms_woo_tracking_code_pattern; ?>">
                            </label>
                            <br>
                            <div class="fsms-info-message comment_pattern_info">متغیرهای قابل استفاده کد رهگیری <span style="color: red;">%tracking_code% (اجباری)</span> شماره سفارش %order_id% وضعیت سفارش %order_status% نام کامل آدرس صورت حساب %billing_full_name% نام کامل آدرس ارسال %shipping_full_name% می باشد</div>
                            <br><br>
                            <div class="fsms_save_button_container">
                                <button type="submit" class="fsms_button" id="fsms_woo_settings_save_button"><span class="button__text">ذخیره</span></button>
                                <div id="fsms-woo-settings-response-message" style="display: none;"></div>
                            </div>
                        </form>
                    <?php } else { ?>
                        <div class="fsms-warning-message enter-credentials">افزونه ووکارس نصب نیست. برای مشاهده تنظیمات مربوط به این افزونه ابتدا ووکامرس را نصب و فعال کنید.</div>
                    <?php } ?>
                </div>
                <p id="farazsms_copyright">تمامی حقوق مادی و معنوی این افزونه متعلق به فراز اس‌‌ام‌‌اس(شرکت زرین ارتباطات آسیا) می باشد.</p>
            </div>
        </div>
        <div class="tab">
            <input type="radio" name="css-tabs" id="tab-6" class="tab-switch">
            <label for="tab-6" class="tab-label">تنظیمات EDD</label>
            <div class="tab-content">
                <div class="form-style-2">
                    <?php if ($fsms_base::isEddInstalled()) { ?>
                        <label for="fsms_edd_phonebooks_choice">
                            <span class="label">ذخیره شماره تلفن در دفترچه تلفن؟</span>
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
                            <span class="label" style="padding-top: 0;">ارسال پیامک به کاربر؟</span>
                            <input type="checkbox" id="fsms_edd_send_to_user" name="fsms_edd_send_to_user" <?php echo ($fsms_edd_send_to_user === 'true' ? 'checked' : '') ?>>
                            <span class="control"></span>
                        </label>
                        <br><br>
                        <label for="fsms_edd_user_pcode">
                            <span class="label" style="display: flex;justify-content: space-between;">کد پترن پیامک کاربر</span>
                            <input type="text" class="input-field" id="fsms_edd_user_pcode" name="fsms_edd_user_pcode" value="<?php echo $fsms_edd_user_pcode; ?>">
                        </label>
                        <br><br>
                        <label for="fsms_edd_send_to_admin" class="toggle-control">
                            <span class="label" style="padding-top: 0;">ارسال پیامک به مدیر؟</span>
                            <input type="checkbox" id="fsms_edd_send_to_admin" name="fsms_edd_send_to_admin" <?php echo ($fsms_edd_send_to_admin === 'true' ? 'checked' : '') ?>>
                            <span class="control"></span>
                        </label>
                        <br><br>
                        <label for="fsms_edd_admin_pcode">
                            <span class="label" style="display: flex;justify-content: space-between;">کد پترن پیامک مدیر</span>
                            <input type="text" class="input-field" id="fsms_edd_admin_pcode" name="fsms_edd_admin_pcode" value="<?php echo $fsms_edd_admin_pcode; ?>">
                        </label>
                        <br><br>
                        <div class="fsms-info-message comment_pattern_info">متغیرهای قابل استفاده: شماره موبایل: %phone% | ایمیل: %email% | نام: %first_name% | نام خانوادگی: %last_name% | محصولات خریداری شده: %product% | مبلغ کل (بدون احتساب تخفیف): %price% | مبلغ کل تخفیف: %discount% | مبلغ پرداختی (با احتساب تخفیف): %total_price% | لینک مستقیم دانلود (رمزنگاری نشده): %link% | شماره سفارش: %payment_id%</div>
                        <br>
                        <div class="fsms_save_button_container">
                            <button class="fsms_button" id="fsms_edd_settings_save_button"><span class="button__text">ذخیره</span></button>
                            <div id="fsms-edd-settings-response-message" style="display: none;"></div>
                        </div>
                    <?php } else { ?>
                        <div class="fsms-warning-message enter-credentials">افزونه EDD نصب نیست. برای مشاهده تنظیمات مربوط به این افزونه ابتدا EDD را نصب و فعال کنید.</div>
                    <?php } ?>
                </div>
                <p id="farazsms_copyright">تمامی حقوق مادی و معنوی این افزونه متعلق به فراز اس‌‌ام‌‌اس(شرکت زرین ارتباطات آسیا) می باشد.</p>
            </div>
        </div>
        <div class="tab">
            <input type="radio" name="css-tabs" id="tab-7" class="tab-switch">
            <label for="tab-7" class="tab-label">تنظیمات خبرنامه</label>
            <div class="tab-content">
                <div class="form-style-2">
                    <div id="send_message_to_phonebooks" class="fsms_form form-style-2">
                        <h3>ارسال پیامک به اعضای خبرنامه</h3>
                        <form id="send_message_to_subscribers">
                            <label for="fsms_to_subscribers_message">
                                <span class="label">متن پیام<span class="required">*</span></span>
                                <textarea rows="5" name="fsms_to_subscribers_message" id="fsms_to_subscribers_message"></textarea>
                                <div class="fsms-info-message comment_pattern_info" style="text-align: center;width: 47%;margin:  auto;">می توانید از متغیر %name% در متن پیامک استفاده کنید</div>
                            </label>
                            <br>
                            <br>
                            <button class="fsms_button" id="send_message_to_subscribers_button"><span class="button__text">ارسال پیامک</span></button>
                            <div id="send_message_to_subscribers_response" style="margin-top: 10px;display: none;"></div>
                        </form>
                    </div>
                    <div id="newsletter_containerrr">
                        <div class="fsms-info-message comment_pattern_info" style="text-align: center;">شرت کد فرم عضویت خبرنامه: [farazsms] می باشد.</div>
                        <label for="fsms_newsletter_phonebooks">
                            <span class="label">انتخاب دفتر تلفن برای خبرنامه</span>
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
                            <span class="label" style="padding-top: 0;">تایید اشتراک با ارسال کد تایید؟</span>
                            <input type="checkbox" id="fsms_newsletter_send_ver_code" name="fsms_edd_send_to_user" <?php echo ($newsletter_send_ver_code === 'true' ? 'checked' : '') ?>>
                            <span class="control"></span>
                        </label>
                        <br>
                        <br>
                        <label for="fsms_newsletter_pcode">
                            <span class="label" style="display: flex;justify-content: space-between;">پترن کد تایید عضویت خبرنامه</span>
                            <input type="text" class="input-field" id="fsms_newsletter_pcode" name="fsms_newsletter_pcode" value="<?php echo $newsletter_pcode; ?>">
                        </label>
                        <br>
                        <div class="fsms-info-message comment_pattern_info">متغیرهای قابل استفاده %name% و کد تایید: %code% می باشد</div>
                        <br>
                        <br>
                        <label for="fsms_newsletter_welcome" class="toggle-control">
                            <span class="label" style="padding-top: 0;">پیامک خوشامدگویی عضویت خبرنامه؟</span>
                            <input type="checkbox" id="fsms_newsletter_welcome" name="fsms_newsletter_welcome" <?php echo ($fsms_newsletter_welcome === 'true' ? 'checked' : '') ?>>
                            <span class="control"></span>
                        </label>
                        <br>
                        <br>
                        <label for="fsms_newsletter_welcomep">
                            <span class="label" style="display: flex;justify-content: space-between;">پترن پیامک خوشامدگویی</span>
                            <input type="text" class="input-field" id="fsms_newsletter_welcomep" name="fsms_newsletter_welcomep" value="<?php echo $fsms_newsletter_welcomep; ?>">
                        </label>
                        <br>
                        <div class="fsms-info-message comment_pattern_info">متغیر قابل استفاده %name% می باشد</div>
                        <br>
                        <br>
                        <label for="fsms_newsletter_new_post_notification" class="toggle-control">
                            <span class="label" style="padding-top: 0;">ارسال پست جدید به اعضای خبرنامه؟</span>
                            <input type="checkbox" id="fsms_newsletter_new_post_notification" name="fsms_newsletter_new_post_notification" <?php echo ($fsms_newsletter_new_post_notification === 'true' ? 'checked' : '') ?>>
                            <span class="control"></span>
                        </label>
                        <br>
                        <br>
                        <label for="fsms_newsletter_post_notification_message">
                            <span class="label" style="display: flex;justify-content: space-between;">متن پیامک</span>
                            <textarea rows="7" cols="30" class="input-field" id="fsms_newsletter_post_notification_message" name="fsms_newsletter_post_notification_message"><?php echo $fsms_newsletter_post_notification_message; ?></textarea>
                        </label>
                        <br>
                        <div class="fsms-info-message comment_pattern_info">متغیرهای قابل استفاده عنوان نوشته %title% و آدرس نوشته %url% می باشد</div>
                        <br>
                        <br>
                        <?php if ($fsms_base::isWooInstalled()) { ?>
                            <label for="fsms_newsletter_new_product_notification" class="toggle-control">
                                <span class="label" style="padding-top: 0;">ارسال محصول جدید به اعضای خبرنامه؟</span>
                                <input type="checkbox" id="fsms_newsletter_new_product_notification" name="fsms_newsletter_new_product_notification" <?php echo ($fsms_newsletter_new_product_notification === 'true' ? 'checked' : '') ?>>
                                <span class="control"></span>
                            </label>
                            <br>
                            <br>
                            <label for="fsms_newsletter_product_notification_message">
                                <span class="label" style="display: flex;justify-content: space-between;">متن پیامک</span>
                                <textarea rows="7" cols="30" class="input-field" id="fsms_newsletter_product_notification_message" name="fsms_newsletter_product_notification_message"><?php echo $fsms_newsletter_product_notification_message; ?></textarea>
                            </label>
                            <br>
                            <div class="fsms-info-message comment_pattern_info">متغیرهای قابل استفاده عنوان سایت %site_title% نام محصول %product_name% قیمت %price% و لینک محصول %url% می باشد</div>
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
                                                        <th class="column1">نام و نام خانوادگی</th>
                                                        <th class="column3">شماره موبایل</th>
                                                        <th class="column4">حذف از خبرنامه</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($subscribers as $subscriber) { ?>
                                                        <tr>
                                                            <td class="column1"><?php echo $subscriber->name; ?></td>
                                                            <td class="column3"><?php echo $subscriber->phone; ?></td>
                                                            <td class="column4"><button value="<?php echo $subscriber->id; ?>" class="fsms_button delete_subscriber"><span class="button__text">حذف</span></button></td>
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
                            <button class="fsms_button" id="fsms_newsletter_settings_save_button"><span class="button__text">ذخیره</span></button>
                            <div id="fsms-newsletter-settings-response-message" style="display: none;"></div>
                        </div>
                    </div>
                </div>
                <p id="farazsms_copyright">تمامی حقوق مادی و معنوی این افزونه متعلق به فراز اس‌‌ام‌‌اس(شرکت زرین ارتباطات آسیا) می باشد.</p>
            </div>
        </div>
        <div class="tab">
            <input type="radio" name="css-tabs" id="tab-8" class="tab-switch">
            <label for="tab-8" class="tab-label">سایر افزونه ها</label>
            <div class="tab-content">
                <div class="form-style-2 fsms_form">
                    <form id="fsms_others_settings_save_form">
                        <?php if ($fsms_base::isIHCInstalled()) { ?>
                            <h3>افزونه Ultimate Membership PRO</h3>
                            <br>
                            <label for="fsms_ihc_send_first_noti_sms" class="toggle-control">
                                <span class="label" style="padding-top: 0;">ارسال پیامک اول هشدار انقضای عضویت؟</span>
                                <input type="checkbox" id="fsms_ihc_send_first_noti_sms" name="fsms_ihc_send_first_noti_sms" <?php echo ($fsms_ihc_send_first_noti_sms === 'true' ? 'checked' : '') ?>>
                                <span class="control"></span>
                            </label>
                            <br>
                            <br>
                            <label for="fsms_ihc_send_second_noti_sms" class="toggle-control">
                                <span class="label" style="padding-top: 0;">ارسال پیامک دوم هشدار انقضای عضویت؟</span>
                                <input type="checkbox" id="fsms_ihc_send_second_noti_sms" name="fsms_ihc_send_second_noti_sms" <?php echo ($fsms_ihc_send_second_noti_sms === 'true' ? 'checked' : '') ?>>
                                <span class="control"></span>
                            </label>
                            <br>
                            <br>
                            <label for="fsms_ihc_send_third_noti_sms" class="toggle-control">
                                <span class="label" style="padding-top: 0;">ارسال پیامک سوم هشدار انقضای عضویت؟</span>
                                <input type="checkbox" id="fsms_ihc_send_third_noti_sms" name="fsms_ihc_send_third_noti_sms" <?php echo ($fsms_ihc_send_third_noti_sms === 'true' ? 'checked' : '') ?>>
                                <span class="control"></span>
                            </label>
                            <br>
                            <br>
                            <label for="fsms_ihc_first_noti_sms_message">
                                <span class="label" style="display: flex;justify-content: space-between;">متن پیامک هشدار انقضای عضویت</span>
                                <textarea rows="7" cols="30" id="fsms_ihc_first_noti_sms_message" name="fsms_ihc_first_noti_sms_message"><?php echo trim($fsms_ihc_first_noti_sms_message); ?></textarea>
                            </label>
                            <br>
                            <div class="fsms-info-message comment_pattern_info">متغیرهای قابل استفاده نام کاربر %name% مدت زمان باقیمانده به روز %time% می باشد</div>
                            <br>
                            <br>
                        <?php } else { ?>
                            <div class="fsms-warning-message enter-credentials">افزونه Ultimate Membership PRO نصب نیست. برای مشاهده تنظیمات مربوط به این افزونه ابتدا آن را نصب و فعال کنید.</div>
                            <br>
                            <br>
                        <?php } ?>
                        <?php if ($fsms_base::isPMPInstalled()) { ?>
                            <h3>Paid Membership PRO</h3>
                            <br>
                            <label for="fsms_pmp_send_expire_noti_sms" class="toggle-control">
                                <span class="label" style="padding-top: 0;">ارسال پیامک انقضای عضویت؟</span>
                                <input type="checkbox" id="fsms_pmp_send_expire_noti_sms" name="fsms_pmp_send_expire_noti_sms" <?php echo ($fsms_pmp_send_expire_noti_sms === 'true' ? 'checked' : '') ?>>
                                <span class="control"></span>
                            </label>
                            <br>
                            <br>
                            <label for="fsms_pmp_expire_noti_sms_message">
                                <span class="label" style="display: flex;justify-content: space-between;">متن پیامک انقضای عضویت</span>
                                <textarea rows="7" cols="30" id="fsms_pmp_expire_noti_sms_message" name="fsms_pmp_expire_noti_sms_message"><?php echo trim($fsms_pmp_expire_noti_sms_message); ?></textarea>
                            </label>
                            <br>
                            <div class="fsms-info-message comment_pattern_info">متغیر قابل استفاده نام کاربر %display_name% می باشد</div>
                            <br>
                            <br>
                        <?php } else { ?>
                            <div class="fsms-warning-message enter-credentials">افزونه Paid Membership PRO نصب نیست. برای مشاهده تنظیمات مربوط به این افزونه ابتدا آن را نصب و فعال کنید.</div>
                            <br>
                            <br>
                        <?php } ?>
                        <?php if ($fsms_base::isAFFInstalled() || $fsms_base::isWCAFInstalled() || $fsms_base::isUAPInstalled()) { ?>
                            <h3>افزونه Affiliate wp یا Ultimate Affiliate Pro یا Yith woocommerce Affiliate</h3>
                            <br>
                            <h3>ارسال پیامک کاربر</h3>
                            <br>
                            <div class="fsms_form_element">
                                <label for="fsms_aff_user_mobile_field">انتخاب فیلد کاستوم شماره موبایل</label>
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
                                <span class="label" style="padding-top: 0;">ثبت نام کاربر</span>
                                <input type="checkbox" id="fsms_aff_user_register" name="fsms_aff_user_register" <?php echo ($fsms_aff_user_register === 'true' ? 'checked' : '') ?>>
                                <span class="control"></span>
                            </label>
                            <br>
                            <br>
                            <label for="fsms_aff_user_register_message">
                                <span class="label" style="display: flex;justify-content: space-between;">کد پترن پیامک ثبت نام کاربر</span>
                                <input type="text" class="input-field" id="fsms_aff_user_register_message" name="fsms_aff_user_register_message" value="<?php echo $fsms_aff_user_register_message; ?>">
                            </label>
                            <br>
                            <br>
                            <?php if ($fsms_base::isAFFInstalled()) { ?>
                                <label for="fsms_aff_user_new_ref" class="toggle-control">
                                    <span class="label" style="padding-top: 0;">ارجاع جدید</span>
                                    <input type="checkbox" id="fsms_aff_user_new_ref" name="fsms_aff_user_new_ref" <?php echo ($fsms_aff_user_new_ref === 'true' ? 'checked' : '') ?>>
                                    <span class="control"></span>
                                </label>
                                <br>
                                <br>
                                <label for="fsms_aff_user_new_ref_message">
                                    <span class="label" style="display: flex;justify-content: space-between;">کد پترن پیامک ارجاع جدید</span>
                                    <input type="text" class="input-field" id="fsms_aff_user_new_ref_message" name="fsms_aff_user_new_ref_message" value="<?php echo $fsms_aff_user_new_ref_message; ?>">
                                </label>
                                <br>
                                <br>
                            <?php } ?>
                            <?php if ($fsms_base::isAFFInstalled() || $fsms_base::isWCAFInstalled()) { ?>
                                <label for="fsms_aff_user_on_approval" class="toggle-control">
                                    <span class="label" style="padding-top: 0;">تایید حساب همکاری در فروش</span>
                                    <input type="checkbox" id="fsms_aff_user_on_approval" name="fsms_aff_user_on_approval" <?php echo ($fsms_aff_user_on_approval === 'true' ? 'checked' : '') ?>>
                                    <span class="control"></span>
                                </label>
                                <br>
                                <br>
                                <label for="fsms_aff_user_on_approval_message">
                                    <span class="label" style="display: flex;justify-content: space-between;">کد پترن تایید حساب همکاری در فروش</span>
                                    <input type="text" class="input-field" id="fsms_aff_user_on_approval_message" name="fsms_aff_user_on_approval_message" value="<?php echo $fsms_aff_user_on_approval_message; ?>">
                                </label>
                                <br>
                                <br>
                            <?php } ?>
                            <h3>ارسال پیامک مدیر</h3>
                            <br>
                            <label for="fsms_aff_admin_user_register" class="toggle-control">
                                <span class="label" style="padding-top: 0;">ثبت نام کاربر</span>
                                <input type="checkbox" id="fsms_aff_admin_user_register" name="fsms_aff_admin_user_register" <?php echo ($fsms_aff_admin_user_register === 'true' ? 'checked' : '') ?>>
                                <span class="control"></span>
                            </label>
                            <br>
                            <br>
                            <label for="fsms_aff_admin_user_register_message">
                                <span class="label" style="display: flex;justify-content: space-between;">کد پترن پیامک ثبت نام کاربر</span>
                                <input type="text" class="input-field" id="fsms_aff_admin_user_register_message" name="fsms_aff_admin_user_register_message" value="<?php echo $fsms_aff_admin_user_register_message; ?>">
                            </label>
                            <br>
                            <br>
                            <?php if ($fsms_base::isAFFInstalled()) { ?>
                                <label for="fsms_aff_admin_user_new_ref" class="toggle-control">
                                    <span class="label" style="padding-top: 0;">ارجاع جدید</span>
                                    <input type="checkbox" id="fsms_aff_admin_user_new_ref" name="fsms_aff_admin_user_new_ref" <?php echo ($fsms_aff_admin_user_new_ref === 'true' ? 'checked' : '') ?>>
                                    <span class="control"></span>
                                </label>
                                <br>
                                <br>
                                <label for="fsms_aff_admin_user_new_ref_message">
                                    <span class="label" style="display: flex;justify-content: space-between;">کد پترن پیامک ارجاع جدید</span>
                                    <input type="text" class="input-field" id="fsms_aff_admin_user_new_ref_message" name="fsms_aff_admin_user_new_ref_message" value="<?php echo $fsms_aff_admin_user_new_ref_message; ?>">
                                </label>
                                <br>
                                <br>
                            <?php } ?>
                            <?php if ($fsms_base::isAFFInstalled() || $fsms_base::isWCAFInstalled()) { ?>
                                <label for="fsms_aff_admin_user_on_approval" class="toggle-control">
                                    <span class="label" style="padding-top: 0;">تایید حساب همکاری در فروش</span>
                                    <input type="checkbox" id="fsms_aff_admin_user_on_approval" name="fsms_aff_admin_user_on_approval" <?php echo ($fsms_aff_admin_user_on_approval === 'true' ? 'checked' : '') ?>>
                                    <span class="control"></span>
                                </label>
                                <br>
                                <br>
                                <label for="fsms_aff_admin_user_on_approval_message">
                                    <span class="label" style="display: flex;justify-content: space-between;">کد پترن تایید حساب همکاری در فروش</span>
                                    <input type="text" class="input-field" id="fsms_aff_admin_user_on_approval_message" name="fsms_aff_admin_user_on_approval_message" value="<?php echo $fsms_aff_admin_user_on_approval_message; ?>">
                                </label>
                                <br>
                                <br>
                            <?php } ?>
                            <div class="fsms-info-message comment_pattern_info">متغیرهای قابل استفاده نام کاربری %user_login% لقب %user_nicename% ایمیل %user_email% نام نمایشی %display_name% شماره موبایل %user_mobile% میزان ارجاع %amount% می باشد</div>
                        <?php } else { ?>
                            <div class="fsms-warning-message enter-credentials">افزونه Affiliate wp یا Ultimate Affiliate Pro یا Yith woocommerce Affiliate نصب نیست. برای مشاهده تنظیمات مربوط به این افزونه ابتدا آن را نصب و فعال کنید.</div>
                            <br>
                            <br>
                        <?php } ?>
                        <div class="fsms_save_button_container">
                            <button type="submit" class="fsms_button" id="fsms_others_settings_save_button"><span class="button__text">ذخیره</span></button>
                            <div id="fsms-others-settings-response-message" style="display: none;"></div>
                        </div>
                    </form>
                </div>
                <p id="farazsms_copyright">تمامی حقوق مادی و معنوی این افزونه متعلق به فراز اس‌‌ام‌‌اس(شرکت زرین ارتباطات آسیا) می باشد.</p>
            </div>
        </div>
        <div class="tab">
            <input type="radio" name="css-tabs" id="tab-9" class="tab-switch">
            <label for="tab-9" class="tab-label">ارسال پیامک</label>
            <div class="tab-content">
                <div id="send_message_to_phonebooks" class="fsms_form form-style-2">
                    <?php if ($credentials_option == null) { ?>
                        <div class="fsms-warning-message enter-credentials">برای مشاهده ارسال پیامک ابتدا اطلاعات خود را در تنظیمات وارد کنید</div>
                    <?php } else {  ?>
                        <h3>ارسال پیامک به مخاطبین دفترچه تلفن یا شماره های دستی</h3>
                        <form id="send_message_to_phonebooks_form">
                            <label for="fsms_to_phonebooks_message">
                                <span class="label">متن پیام<span class="required">*</span></span>
                                <textarea rows="5" name="fsms_to_phonebooks_message" id="fsms_to_phonebooks_message"></textarea>
                            </label>
                            <br><br>
                            <label for="fsms_phonebooks_choice">
                                <span class="label">انتخاب دفترچه تلفن<span class="required">*</span></span>
                                <select multiple name="fsms_phonebooks_choice[]" id="fsms_phonebooks_choice" style="min-width: 60%;">
                                    <?php foreach ($phonebooks as $phonebook) { ?>
                                        <option value="<?php echo $phonebook->id; ?>"><?php echo $phonebook->title; ?></option>
                                    <?php } ?>
                                </select>
                            </label>
                            <br><br>
                            <label for="fsms_subscribers" class="toggle-control">
                                <span class="label" style="padding-top: 0;">ارسال به اعضای خبرنامه؟</span>
                                <input type="checkbox" id="fsms_subscribers" name="fsms_subscribers">
                                <span class="control"></span>
                            </label>
                            <br><br>
                            <label for="fsms_phones_choice">
                                <span class="label" style="display: flex;justify-content: space-between;">وارد کردن شماره های دستی<div class="icon icon__src">
                                        <div class="tooltip tooltip__src">
                                            شماره ها را با کاما( , ) از هم جدا کنید
                                        </div>
                                        <svg viewBox="0 0 24 24">
                                            <path d="M23,12L20.56,9.22L20.9,5.54L17.29,4.72L15.4,1.54L12,3L8.6,1.54L6.71,4.72L3.1,5.53L3.44,9.21L1,12L3.44,14.78L3.1,18.47L6.71,19.29L8.6,22.47L12,21L15.4,22.46L17.29,19.28L20.9,18.46L20.56,14.78L23,12M13,17H11V15H13V17M13,13H11V7H13V13Z"></path>
                                        </svg>
                                    </div></span>
                                <textarea class="input-field" name="fsms_phones_choice" id="fsms_phones_choice"></textarea>
                            </label>
                            <br><br>
                            <label for="fsms_send_formnum_choice">
                                <span class="label" style="padding-top: 5px;">انتخاب شماره ارسال کننده<span class="required">*</span></span>
                                <select name="fsms_send_formnum_choice" id="fsms_send_formnum_choice">
                                    <option value="1">خط خدماتی</option>
                                    <option value="2">خط تبلیغاتی</option>
                                </select>
                            </label>
                            <br><br>
                            <button class="fsms_button" id="send_message_to_phonebooks_button"><span class="button__text">ارسال پیامک</span></button>
                            <div id="fsms-send-message-response-message" style="display: none;"></div>
                        </form>
                    <?php } ?>
                </div>
                <p id="farazsms_copyright">تمامی حقوق مادی و معنوی این افزونه متعلق به فراز اس‌‌ام‌‌اس (شرکت زرین ارتباطات آسیا) می باشد.</p>
            </div>
        </div>
        <div class="tab">
            <input type="radio" name="css-tabs" id="tab-10" class="tab-switch">
            <label for="tab-10" class="tab-label">ارسال بازخورد</label>
            <div class="tab-content">
                <div class="form-style-2 fsms_form">
                    <div class="fsms-info-message comment_pattern_info">شما می توانید از طریق فرم زیر مشکلات را به ما گزارش کنید</div>
                    <form id="fsms_send_feedback_form">
                        <label for="fsms_feedback_message">
                            <span class="label" style="display: flex;justify-content: space-between;">متن پیام</span>
                            <textarea rows="10" cols="80" id="fsms_feedback_message" name="fsms_feedback_message"></textarea>
                        </label>
                        <div class="fsms_save_button_container">
                            <button type="submit" class="fsms_button" id="fsms_send_feedback"><span class="button__text">ارسال</span></button>
                            <div id="fsms-feedback-response-message" style="display: none;"></div>
                        </div>
                    </form>
                </div>
                <p id="farazsms_copyright">تمامی حقوق مادی و معنوی این افزونه متعلق به فراز اس‌‌ام‌‌اس (شرکت زرین ارتباطات آسیا) می باشد.</p>
            </div>
        </div>
    </div>
    <div id="overlay">
        <div class="cv-spinner">
            <span class="spinner"></span>
        </div>
    </div>
</div>