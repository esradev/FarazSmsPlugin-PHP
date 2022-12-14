<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://farazsms.com/
 * @since      1.0.0
 *
 * @package    Farazsms
 * @subpackage Farazsms/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Farazsms
 * @subpackage Farazsms/admin
 * @author     FarazSMS <info@farazsms.com>
 */
class Farazsms_Admin extends class_farazsms_base
{

	/**
	 * The ID of this plugin.
	 *
	 * @var      string $plugin_name The ID of this plugin.
	 * @since    1.0.0
	 * @access   private
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @var      string $version The current version of this plugin.
	 * @since    1.0.0
	 * @access   private
	 */
	private $version;


	/**
	 * Initialize the class and set its properties.
	 *
	 * @param string $plugin_name The name of this plugin.
	 * @param string $version The version of this plugin.
	 *
	 * @since    1.0.0
	 */
	public function __construct($plugin_name, $version)
	{

		$this->plugin_name = $plugin_name;
		$this->version     = $version;
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles($page)
	{

		if ($page !== 'toplevel_page_farazsms') {
			return;
		}
		wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/farazsms-admin.css', [], $this->version, 'all');
		wp_register_style('select2css', '//cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css', false, '1.0', 'all');
		wp_enqueue_style('select2css');
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts($hook)
	{
		global $post;

		wp_enqueue_script('jquery-validate', plugin_dir_url(__FILE__) . 'js/jquery.validate.min.js', ['jquery'], $this->version, TRUE);
		wp_enqueue_script('select2', '//cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js', array('jquery-validate'), '1.0', true);
		wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/farazsms-admin.js', ['select2'], $this->version, TRUE);
		//wp_enqueue_script( 'select2' );

		if ($hook == 'post-new.php' || $hook == 'post.php') {
			if ('shop_order' === $post->post_type) {
				wp_enqueue_style('farazsms-tracking-code', plugin_dir_url(__FILE__) . 'css/farazsms-tracking-code.css', [], $this->version, 'all');
				wp_enqueue_script('jquery-validate', plugin_dir_url(__FILE__) . 'js/jquery.validate.min.js', ['jquery'], $this->version, TRUE);
				wp_enqueue_script('farazsms-tracking-code', plugin_dir_url(__FILE__) . 'js/farazsms-tracking-code.js', ['jquery-validate'], $this->version, TRUE);
			}
		}
	}

	/**
	 * Show the leatst posts from https://farazsms.com/ on dashboard widget
	 *
	 * @since    1.0.0
	 */

	public function rss_meta_box()
	{

		if (get_option('fsms_rss_meta_box', '1') == '1') {
			add_meta_box(
				'FarazSMS_RSS',
				__('FarazSMS latest news', 'farazsms'),
				[$this, 'rss_postbox_container'],
				'dashboard',
				'side',
				'low'
			);
		}
	}

	public function rss_postbox_container()
	{
?>
		<div class="fsms-rss-widget">
			<?php wp_widget_rss_output(
				'https://farazsms.com/feed/',
				[
					'items'        => 3,
					'show_summary' => 1,
					'show_author'  => 1,
					'show_date'    => 1,
				]
			); ?>
		</div>
<?php
	}

	/**
	 * Add menu and submenu pages for the plugin settings on the side bar.
	 *
	 * @since    1.0.0
	 */

	public function admin_add_menu_page()
	{
		add_menu_page(__('FarazSMS', 'farazsms'), __('FarazSMS', 'farazsms'), 'manage_options', 'farazsms', [$this, 'admin_settings_page'],	plugin_dir_url(__FILE__) . 'img/logo.png');
		add_submenu_page('farazsms', __('FarazSMS', 'farazsms'), __('Settings', 'farazsms'), 'manage_options', 'farazsms', [$this, 'admin_settings_page']);
		add_submenu_page('farazsms', __('FarazSMS', 'farazsms'), __('Phone Book', 'farazsms'), 'manage_options', 'farazsms&tab=tab-2', [$this, 'admin_settings_page']);
		add_submenu_page('farazsms', __('FarazSMS', 'farazsms'), __('Synchronization', 'farazsms'), 'manage_options', 'farazsms&tab=tab-3', [$this, 'admin_settings_page']);
		add_submenu_page('farazsms', __('FarazSMS', 'farazsms'), __('Comment Settings', 'farazsms'), 'manage_options', 'farazsms&tab=tab-4', [$this, 'admin_settings_page']);
		add_submenu_page('farazsms', __('FarazSMS', 'farazsms'), __('Woocommerce Settings', 'farazsms'), 'manage_options', 'farazsms&tab=tab-5', [$this, 'admin_settings_page']);
		add_submenu_page('farazsms', __('FarazSMS', 'farazsms'), __('Edd Settings', 'farazsms'), 'manage_options', 'farazsms&tab=tab-6', [$this, 'admin_settings_page']);
		add_submenu_page('farazsms', __('FarazSMS', 'farazsms'), __('Newslatter Settings', 'farazsms'), 'manage_options', 'farazsms&tab=tab-7', [$this, 'admin_settings_page']);
		add_submenu_page('farazsms', __('FarazSMS', 'farazsms'), __('Other Plugins', 'farazsms'), 'manage_options', 'farazsms&tab=tab-8', [$this, 'admin_settings_page']);
		add_submenu_page('farazsms', __('FarazSMS', 'farazsms'), __('Send SMS', 'farazsms'), 'manage_options', 'farazsms&tab=tab-9', [$this, 'admin_settings_page']);
	}

	/**
	 * Inclode admin settings
	 *
	 * @since    1.0.0
	 */

	public function admin_settings_page()
	{
		include plugin_dir_path(__FILE__) . '/partials/farazsms-admin-settings.php';
	}

	/**
	 * Add bar menu. show some links for farazsms plugin on the admin bar.
	 *
	 * @since    1.0.0
	 */

	public function fsms_admin_add_bar_menu()
	{
		$fsms_base = class_farazsms_base::getInstance();
		global $wp_admin_bar;
		if (!is_super_admin() || !is_admin_bar_showing()) {
			return;
		}
		$wp_admin_bar->add_menu(array(
			'id' => 'farazsms', 'parent' => null, 'group' => null, 'title' => __('FarazSms ', 'farazsms') . '<img style="padding-top: 10px" src="' . plugin_dir_url(__FILE__) . '/img/logo.png"/>', 'href' => get_bloginfo('url') . '/wp-admin/admin.php?farazsms', 'meta' => [
				'title' => __('FarazSms', 'textdomain'), //This title will show on hover
			]
		));
		$credit = $fsms_base::get_credit();
		if ($credit) {
			$wp_admin_bar->add_menu(array('parent' => 'farazsms', 'id'     => 'farazsms-admin-bar-credit', 'title' => __('Account credit: ', 'farazsms') . number_format($credit) . __(' $IR_T', 'farazsms'), 'href' => get_bloginfo('url') . '/wp-admin/admin.php?farazsms'));
		}
		$wp_admin_bar->add_menu(array('parent' => 'farazsms', 'title' => __('Send Sms', 'farazsms'), 'id' => 'farazsms-admin-bar-send-sms', 'href' => get_bloginfo('url') . '/wp-admin/admin.php?page=farazsms&tab=tab-5'));
		$wp_admin_bar->add_menu(array('parent' => 'farazsms', 'title' => __('FarazSms', 'farazsms'), 'id' => 'farazsms-admin-bar-go-to-site', 'href' => 'https://farazsms.com/'));
	}

	/**
	 * Ajax save settings.
	 *
	 * @since    1.0.0
	 */

	public function ajax_save_settings()
	{
		$has_error = '';
		$fsms_base = class_farazsms_base::getInstance();
		$fsms_uname = $_POST['username'] ?? '';
		$fsms_password = $_POST['password'] ?? '';
		$admin_notify_number = $_POST['admin_notify_number'] ?? '';
		$fsms_fromnum = $_POST['fromnum'] ?? '';
		$fsms_fromnum_adver = $_POST['fromnum_adver'] ?? '';
		$fsms_apikey = trim($_POST['apikey']) ?? '';
		$fsms_sendwm = $_POST['sendwm'] ?? '';
		$sendwm_with_pattern = $_POST['sendwm_with_pattern'] ?? '';
		$welcome_message = $_POST['welcome_message'] ?? '';
		$fsms_welcomep = $_POST['welcomep'] ?? '';
		$admin_login_noti = $_POST['admin_login_noti'] ?? '';
		$admin_login_noti_roles = $_POST['admin_login_noti_roles'] ?? '';
		$admin_login_noti_p = $_POST['admin_login_noti_p'] ?? '';

		/**
		 * Validation of API key
		 *
		 * @since    1.0.0
		 */

		if (!empty($fsms_apikey)) {
			$apikey_is_valid = $fsms_base::check_if_apikey_is_valid($fsms_apikey);
			if (!$apikey_is_valid) {
				$has_error = __('Invalid API key', 'farazsms');
			} else {
				update_option('fsms_panel_expire_date', $apikey_is_valid->expire);
			}
		} else {
			delete_option('fsms_panel_expire_date');
		}

		/**
		 * Update option of credentials, if credentials is valid.
		 *
		 * @since    1.0.0
		 */

		$credentials_is_valid = $fsms_base::check_if_credentials_is_valid($fsms_uname, $fsms_password);
		if ($credentials_is_valid) {
			$options = [
				'fsms_uname' =>  $fsms_uname,
				'fsms_password' =>  $fsms_password,
				'fsms_admin_notify_number' =>  $admin_notify_number,
				'fsms_fromnum' =>  $fsms_fromnum,
				'fsms_fromnum_adver' =>  $fsms_fromnum_adver,
				'fsms_api_key' =>  $fsms_apikey,
				'fsms_sendwm' => $fsms_sendwm,
				'fsms_welcomep' => $fsms_welcomep,
				'fsms_sendwm_with_pattern' => $sendwm_with_pattern,
				'fsms_welcome_message' => $welcome_message,
				'fsms_admin_login_noti' => $admin_login_noti,
				'fsms_admin_login_noti_roles' => $admin_login_noti_roles,
				'fsms_admin_login_noti_p' => $admin_login_noti_p,
			];
			update_option('fsms_credentials', $options);
		} else {
			$has_error = __('Unfortunately, you do not have a user account in Faraz SMS company. To use this plugin, you must purchase the SMS system from farazsms.com. You can use the discount code "farazsmsclub" to buy the SMS panel.', 'farazsms');
		}
		if (!empty($has_error)) {
			wp_send_json_error($has_error);
		} else {
			wp_send_json_success();
		}
	}

	/**
	 * Save phone book settings.
	 *
	 * @since    1.0.0
	 */

	public function ajax_save_phone_book_settings()
	{
		$custom_phone_book = $_POST['custom_phone_book'] ?? [];
		$custom_phone_meta_keys = $_POST['custom_phone_meta_keys'] ?? [];
		$digits_phone_book = $_POST['digits_phone_book'] ?? [];
		$woo_phone_book = $_POST['woo_phone_book'] ?? [];
		$bookly_phone_book = $_POST['bookly_phone_book'] ?? [];
		$gf_phone_book = $_POST['gf_phone_book'] ?? [];
		$GF_selected_field = $_POST['GF_selected_field'] ?? [];
		update_option('fsms_custom_phone_books', $custom_phone_book);
		update_option('fsms_custom_phone_meta_keys', $custom_phone_meta_keys);
		update_option('fsms_digits_phone_books', $digits_phone_book);
		update_option('fsms_woo_phone_books', $woo_phone_book);
		update_option('fsms_bookly_phone_books', $bookly_phone_book);
		update_option('fsms_gf_phone_books', $gf_phone_book);
		update_option('fsms_gf_selected_field', $GF_selected_field);
		wp_send_json_success();
	}

	/**
	 * Synchronization Operator whit a phone book.
	 *
	 * @since    1.0.0
	 */

	public function ajax_sync_operate()
	{
		$sync_operation = $_POST['sync_operation'] ?? '';
		if ($sync_operation === 'fsms_digits-sync') {
			$result = $this->sync_digits();
		} elseif ($sync_operation === 'fsms_woo-sync') {
			$result = $this->sync_woo();
		} elseif ($sync_operation === 'fsms_bookly-sync') {
			$result = $this->sync_bookly();
		}
		if ($result === 'empty_phonebook') {
			wp_send_json_error(__('Please select a phonebook first.', 'farazsms'));
		}
		if ($result === 'error_happened') {
			wp_send_json_error(__('An error occurred. Please try again later.', 'farazsms'));
		}
		if ($result) {
			wp_send_json_success();
		} else {
			wp_send_json_error();
		}
	}

	/**
	 * Digits Synchronization whit a phone book.
	 *
	 * @since    1.0.0
	 */

	private function sync_digits()
	{
		$fsms_base = class_farazsms_base::getInstance();
		$users = get_users(array('fields' =>  'ID'));
		$digits_phone_books = get_option('fsms_digits_phone_books', []);
		if (empty($digits_phone_books)) {
			return "empty_phonebook";
		}
		foreach ($digits_phone_books as $phone_bookId) {
			$data = [];
			foreach ($users as $userid) {
				$number_info = [];
				$user_digits_phone = get_user_meta($userid, 'digits_phone', true);
				if (empty($user_digits_phone)) {
					continue;
				}
				$user_info = get_userdata($userid);
				$number_info["number"] = $user_digits_phone;
				$number_info["name"] = $user_info->display_name ?? $user_info->first_name .  " " . $user_info->last_name;
				$number_info["phonebook_id"] = (int) $phone_bookId;
				array_push($data, $number_info);
			}
			$result = $fsms_base::save_to_phonebookv3($data);
		}
		if (!$result) {
			return "error_happened";
		}
		return true;
	}

	/**
	 * Woocommerce Synchronization whit a phone book.
	 *
	 * @since    1.0.0
	 */

	private function sync_woo()
	{
		$fsms_base = class_farazsms_base::getInstance();
		$query = new WC_Order_Query(array('limit' => 9999, 'type' => 'shop_order', 'return' => 'ids'));
		$order_ids = $query->get_orders();
		$woo_phone_books = get_option('fsms_woo_phone_books', []);
		if (empty($woo_phone_books)) {
			return "empty_phonebook";
		}
		foreach ($woo_phone_books as $phone_bookId) {
			$data = [];
			foreach ($order_ids as $order_id) {
				$number_info = [];
				$order = wc_get_order($order_id);
				$number = $order->get_billing_phone();
				$name = $order->get_formatted_billing_full_name();
				$number_info["number"] = $number;
				$number_info["name"] = $name;
				$number_info["phonebook_id"] = (int)$phone_bookId;
				array_push($data, $number_info);
			}
			$result = $fsms_base::save_to_phonebookv3($data);
		}
		if (!$result) {
			return "error_happened";
		}
		return TRUE;
	}

	/**
	 * Bookly Synchronization whit a phone book.
	 *
	 * @since    1.0.0
	 */

	private function sync_bookly()
	{
		$fsms_base = class_farazsms_base::getInstance();
		global $wpdb;
		$bookly_customers = $wpdb->get_results("SELECT phone,full_name FROM " . $wpdb->prefix . "bookly_customers");
		$bookly_phone_books     = get_option('fsms_bookly_phone_books', []);
		if (empty($bookly_phone_books)) {
			return "empty_phonebook";
		}
		foreach ($bookly_phone_books as $phone_bookId) {
			$data = [];
			foreach ($bookly_customers as $customer) {
				$number_info = [];
				$number_info["number"] = substr($customer->phone, -10);
				$number_info["name"] = $customer->full_name;
				$number_info["phonebook_id"] = (int)$phone_bookId;
				array_push($data, $number_info);
			}
			$result = $fsms_base::save_to_phonebookv3($data);
		}
		if (!$result) {
			return "error_happened";
		}
		return true;
	}

	/**
	 * Save Cemment settings.
	 *
	 * @since    1.0.0
	 */

	public function ajax_save_comment_settings()
	{
		$add_mobile_field = $_POST['add_mobile_field'] ?? '';
		$required_mobile_field = $_POST['required_mobile_field'] ?? '';
		$approved_comment_pattern = $_POST['approved_comment_pattern'] ?? '';
		$comment_pattern = $_POST['comment_pattern'] ?? '';
		$comment_phone_book = $_POST['comment_phone_book'] ?? [];
		$notify_admin = $_POST['notify_admin'] ?? '';
		$fsms_admin_notify_pcode = $_POST['fsms_admin_notify_pcode'] ?? '';
		update_option('fsms_add_mobile_field', $add_mobile_field);
		update_option('fsms_required_mobile_field', $required_mobile_field);
		update_option('fsms_notify_admin', $notify_admin);
		update_option('fsms_admin_notify_pcode', $fsms_admin_notify_pcode);
		update_option('fsms_approved_comment_pattern', $approved_comment_pattern);
		update_option('fsms_comment_pattern', $comment_pattern);
		update_option('fsms_comment_phone_book', $comment_phone_book);
		wp_send_json_success();
	}

	/**
	 * Save EDD settings.
	 *
	 * @since    1.0.0
	 */

	public function ajax_save_edd_settings()
	{
		$edd_phonebooks_choice = $_POST['edd_phonebooks_choice'] ?? [];
		$edd_send_to_user = $_POST['edd_send_to_user'] ?? '';
		$edd_user_pcode = $_POST['edd_user_pcode'] ?? '';
		$edd_send_to_admin = $_POST['edd_send_to_admin'] ?? '';
		$edd_admin_pcode = $_POST['edd_admin_pcode'] ?? '';
		if ($edd_send_to_user == 'true' && empty($edd_user_pcode)) {
			wp_send_json_error(__('Please enter User pattern code', 'farazsms'));
			wp_die();
		}
		if ($edd_send_to_admin == 'true' && empty($edd_admin_pcode)) {
			wp_send_json_error(__('Please enter Admin pattern code', 'farazsms'));
			wp_die();
		}
		update_option('edd_phonebooks_choice', $edd_phonebooks_choice);
		update_option('edd_send_to_user', $edd_send_to_user);
		update_option('edd_user_pcode', $edd_user_pcode);
		update_option('edd_send_to_admin', $edd_send_to_admin);
		update_option('edd_admin_pcode', $edd_admin_pcode);
		wp_send_json_success();
	}

	/**
	 * Save Woocommerce settings.
	 *
	 * @since    1.0.0
	 */

	public function ajax_save_woo_settings()
	{
		$woo_checkout_otp = $_POST['woo_checkout_otp'] ?? 'false';
		$woo_checkout_otp_pattern = $_POST['woo_checkout_otp_pattern'] ?? '';
		$woo_poll = $_POST['woo_poll'] ?? 'false';
		$woo_poll_time = $_POST['woo_poll_time'] ?? '';
		$woo_poll_message = $_POST['woo_poll_message'] ?? '';
		$woo_tracking_code_pattern = $_POST['woo_tracking_code_pattern'] ?? '';
		$woo_retention_order_no = $_POST['woo_retention_order_no'] ?? '';
		$woo_retention_order_month = $_POST['woo_retention_order_month'] ?? '';
		$woo_retention_message = $_POST['woo_retention_message'] ?? '';
		update_option('fsms_woo_checkout_otp', $woo_checkout_otp);
		update_option('fsms_woo_checkout_otp_pattern', $woo_checkout_otp_pattern);
		update_option('fsms_woo_poll', $woo_poll);
		update_option('fsms_woo_poll_time', $woo_poll_time);
		update_option('fsms_woo_poll_message', $woo_poll_message);
		update_option('fsms_woo_tracking_code_pattern', $woo_tracking_code_pattern);
		update_option('fsms_woo_retention_order_no', $woo_retention_order_no);
		update_option('fsms_woo_retention_order_month', $woo_retention_order_month);
		update_option('fsms_woo_retention_message', $woo_retention_message);
		wp_send_json_success();
	}

	/**
	 * Comments table coulums.
	 *
	 * @since    1.0.0
	 */

	public function comments_fsms_table_columns($my_cols)
	{
		$temp_columns = array(
			'mobile' => __('Phone number', 'farazsms')
		);
		$my_cols = array_slice($my_cols, 0, 3, true) + $temp_columns + array_slice($my_cols, 3, NULL, true);
		return $my_cols;
	}

	public function comments_fsms_table_columns_content($column, $comment_ID)
	{
		global $comment;
		switch ($column):
			case 'mobile': {
					echo get_comment_meta($comment_ID, 'mobile', true);
					break;
				}
		endswitch;
	}

	/**
	 * Send SMS to phonebooks.
	 *
	 * @since    1.0.0
	 */

	public function ajax_send_message_to_phonebooks()
	{
		$fsms_base = class_farazsms_base::getInstance();
		$message = $_POST['message'] ?? '';
		$phonebooks = $_POST['phonebooks'] ?? [];
		$send_to_subscribers = $_POST['send_to_subscribers'] ?? '';
		$send_formnum_choice = $_POST['send_formnum_choice'] ?? '';
		if ($send_formnum_choice == '2' && !strpos($_POST['phones'], ',')) {
			wp_send_json_error(__('Please enter manual numbers in the correct format', 'farazsms'));
		}
		if ($send_formnum_choice == '1') {
			$send_formnum_choice = $fsms_base::get_service_sender_number();
		} else {
			$send_formnum_choice = $fsms_base::get_adver_sender_number();
		}
		$phones = explode(',', $_POST['phones'] ?? '');
		foreach ($phones as $phone) {
			if ($fsms_base::validate_mobile_number($phone)) {
				$fixed_phones[] = $fsms_base::validate_mobile_number($phone);
			}
		}
		if (empty($phonebooks) && empty($fixed_phones) && $send_to_subscribers == "false") {
			wp_send_json_error(__('Please select at least one phonebook or manual number or newsletter members', 'farazsms'));
			wp_die();
		}
		if (!empty($fixed_phones)) {
			$fsms_base::send_message($fixed_phones, $message, $send_formnum_choice);
		}
		foreach ($phonebooks as $phonebook) {
			$phonebook_numbers = $fsms_base::get_phonebook_numbers($phonebook);
			$fsms_base::send_message($phonebook_numbers, $message, $send_formnum_choice);
		}
		wp_send_json_success();
	}

	/**
	 * Save Newsletter settings.
	 *
	 * @since    1.0.0
	 */

	public function fsms_save_newsletter_settings()
	{
		$newsletter_phonebooks = $_POST['newsletter_phonebooks'] ?? [];
		$newsletter_send_ver_code = $_POST['newsletter_send_ver_code'] ?? '';
		$newsletter_pcode = $_POST['newsletter_pcode'] ?? '';
		$newsletter_welcome = $_POST['newsletter_welcome'] ?? '';
		$newsletter_welcomep = $_POST['newsletter_welcomep'] ?? '';
		$newsletter_new_post_notification = $_POST['newsletter_new_post_notification'] ?? '';
		$newsletter_post_notification_message = $_POST['newsletter_post_notification_message'] ?? '';
		$newsletter_new_product_notification = $_POST['newsletter_new_product_notification'] ?? '';
		$newsletter_product_notification_message = $_POST['newsletter_product_notification_message'] ?? '';
		if ($newsletter_send_ver_code == 'true' && empty($newsletter_pcode)) {
			wp_send_json_error(__('Please enter the pattern code', 'farazsms'));
			wp_die();
		}
		if ($newsletter_welcome == 'true' && empty($newsletter_welcomep)) {
			wp_send_json_error(__('Please enter the pattern code of the welcome SMS', 'farazsms'));
			wp_die();
		}
		update_option('fsms_newsletter_phonebooks', $newsletter_phonebooks);
		update_option('fsms_newsletter_send_ver_code', $newsletter_send_ver_code);
		update_option('fsms_newsletter_newsletter_pcode', $newsletter_pcode);
		update_option('fsms_newsletter_welcome', $newsletter_welcome);
		update_option('fsms_newsletter_welcomep', $newsletter_welcomep);
		update_option('fsms_newsletter_new_post_notification', $newsletter_new_post_notification);
		update_option('fsms_newsletter_post_notification_message', $newsletter_post_notification_message);
		update_option('fsms_newsletter_new_product_notification', $newsletter_new_product_notification);
		update_option('fsms_newsletter_product_notification_message', $newsletter_product_notification_message);
		wp_send_json_success();
	}

	/**
	 * Delete user from subscribers.
	 *
	 * @since    1.0.0
	 */

	public function fsms_delete_user_from_subscribers()
	{
		$fsms_base = class_farazsms_base::getInstance();
		$subscriber_id = $_POST['subscriber_id'] ?? '';
		$fsms_base::delete_subscriber($subscriber_id);
		wp_send_json_success();
	}

	/**
	 * Send message to subscribers of newsletter.
	 *
	 * @since    1.0.0
	 */

	public function send_message_to_subscribers()
	{
		$fsms_base = class_farazsms_base::getInstance();
		$message = $_POST['message'] ?? '';
		$subscribers = $fsms_base::get_subscribers();
		if (!$fsms_base::isAPIKeyEntered()) {
			wp_send_json_error(__('Please enter the api key first in the Settings tab.', 'farazsms'));
		}
		if (empty($subscribers)) {
			wp_send_json_error(__('No one is a subscriber of the newsletter yet', 'farazsms'));
		}
		if (strpos($message, '%name%') !== false) {
			foreach ($subscribers as $subscriber) {
				$message_fixed = str_replace('%name%', $subscriber->name, $message);
				$fsms_base::send_message([$subscriber->phone], $message_fixed, "+98club");
			}
		} else {
			$phones = [];
			foreach ($subscribers as $subscriber) {
				$phones[] = $subscriber->phone;
			}
			$fsms_base::send_message($phones, $message, "+98club");
		}
		wp_send_json_success();
	}

	/**
	 * Send Tracking code for orders.
	 *
	 * @since    1.0.0
	 */

	public function fsms_tracking_code_order_postbox()
	{
		add_meta_box(
			'fsms-tracking_send_sms',
			__('Send tracking code.', 'farazsms'),
			[$this, 'add_order_tracking_box'],
			'shop_order',
			'side',
			'core'
		);
	}

	public function add_order_tracking_box($post)
	{
		echo '<div id="fsms-tracking-code-input"><input type="text" name="tracking_code" id="fsms_racking_code" /></div>';
		echo '<div id="fsms-tracking-code-button"><div class="fsms_button" id="send_tracking_code_button"><span class="button__text">?????????? ??????????</span></div></div>';
		echo ' <input type="hidden" id="fsms-tracking-code-order_id" value="' . $post->ID . '">';
		echo '<div id="send_tracking_code_response" style="display: none;"></div>';
	}

	public function fsms_send_tracking_code_sms()
	{
		$fsms_base = class_farazsms_base::getInstance();
		$tacking_code = $_POST['tacking_code'] ?? '';
		$order_id = $_POST['order_id'] ?? '';
		try {
			if (empty($tacking_code) || strlen($tacking_code) < 20) {
				throw new Exception(__('Please enter the tracking code correctly.', 'farazsms'));
			}
			$order = wc_get_order($order_id);
			$phone = $order->get_billing_phone();
			if (empty($phone)) {
				throw new Exception(__('Customer phone number not entered.', 'farazsms'));
			}
			$order_date['order_id'] = $order->get_id();
			$order_date['order_status'] = wc_get_order_status_name($order->get_status());
			$order_date['billing_full_name'] = $order->get_formatted_billing_full_name();
			$order_date['shipping_full_name'] = $order->get_formatted_shipping_full_name();
			$fsms_base::send_tracking_code($phone, $tacking_code, $order_date);
			wp_send_json_success();
		} catch (Exception $e) {
			wp_send_json_error($e->getMessage());
		}
	}

	/**
	 * Save other settings.
	 *
	 * @since    1.0.0
	 */

	public function fsms_save_other_settings()
	{
		update_option('fsms_ihc_send_first_noti_sms', $_POST['ihc_send_first_noti_sms'] ?? '');
		update_option('fsms_ihc_send_second_noti_sms', $_POST['ihc_send_second_noti_sms'] ?? '');
		update_option('fsms_ihc_send_third_noti_sms', $_POST['ihc_send_third_noti_sms'] ?? '');
		update_option('fsms_first_noti_sms_message', $_POST['ihc_first_noti_sms_message'] ?? '');

		update_option('fsms_pmp_send_expire_noti_sms', $_POST['pmp_send_expire_noti_sms'] ?? '');
		update_option('fsms_pmp_expire_noti_sms_message', $_POST['pmp_expire_noti_sms_message'] ?? '');

		update_option('fsms_aff_user_mobile_field', $_POST['aff_user_mobile_field'] ?? '');
		update_option('fsms_aff_user_register', $_POST['aff_user_register'] ?? '');
		update_option('fsms_aff_user_register_message', $_POST['aff_user_register_message'] ?? '');
		update_option('fsms_aff_user_new_ref', $_POST['aff_user_new_ref'] ?? '');
		update_option('fsms_aff_user_new_ref_message', $_POST['aff_user_new_ref_message'] ?? '');
		update_option('fsms_aff_user_on_approval', $_POST['aff_user_on_approval'] ?? '');
		update_option('fsms_aff_user_on_approval_message', $_POST['aff_user_on_approval_message'] ?? '');
		update_option('fsms_aff_admin_user_register', $_POST['aff_admin_user_register'] ?? '');
		update_option('fsms_aff_admin_user_register_message', $_POST['aff_admin_user_register_message'] ?? '');
		update_option('fsms_aff_admin_user_new_ref', $_POST['aff_admin_user_new_ref'] ?? '');
		update_option('fsms_aff_admin_user_new_ref_message', $_POST['aff_admin_user_new_ref_message'] ?? '');
		update_option('fsms_aff_admin_user_on_approval', $_POST['aff_admin_user_on_approval'] ?? '');
		update_option('fsms_aff_admin_user_on_approval_message', $_POST['aff_admin_user_on_approval_message'] ?? '');
		wp_send_json_success();
	}

	/**
	 * Send feedback.
	 *
	 * @since    1.0.0
	 */

	public function fsms_send_feedback()
	{
		$fsms_base = class_farazsms_base::getInstance();
		$feedback_message = $_POST['feedback_message'];
		if (empty($feedback_message)) {
			wp_send_json_error(__('Message text must not be empty', 'farazsms'));
		}
		$result = $fsms_base::send_feedback_message_to_server($feedback_message);
		if ($result) {
			wp_send_json_success();
		} else {
			wp_send_json_error(__('An error occurred, try again later.', 'farazsms'));
		}
	}
}
