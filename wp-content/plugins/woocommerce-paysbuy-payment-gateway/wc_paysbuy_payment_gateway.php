<?php
/*
Plugin Name: WooCommerce PaysBuy Gateway
Plugin URI: http://www.paysbuy.com/
Description: Extends WooCommerce with a PaysBuy gateway.
Version: 1.0
Author: PaysBuy
Author URI: http://www.paysbuy.com/

	Copyright: © 2009-2011 WooThemes.
	License: GNU General Public License v3.0
	License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	
	add_action('plugins_loaded', 'woocommerce_paysbuy_init', 0);
	add_filter('woocommerce_payment_gateways', 'woocommerce_add_paysbuy_gateway' );
	load_plugin_textdomain('wc-paysbuy', false, dirname( plugin_basename( __FILE__ ) ) . '/languages');
}

function woocommerce_paysbuy_init() {
	
	if ( !class_exists( 'WC_Payment_Gateway' ) ) return;
	
	class WC_Gateway_Paysbuy extends WC_Payment_Gateway {
		
		var $notify_url;
		
		public function __construct() {
			global $woocommerce;
		
        $this->id			= 'paysbuy';
		$this->icon 		= '';//WP_PLUGIN_URL . "/" . plugin_basename( dirname(__FILE__)) . '/image/krungsri.gif';
        $this->has_fields 	= false;
		$this->liveurl 		= 'https://www.paysbuy.com/paynow.aspx';
        $this->method_title = __( 'PaysBuy', 'woocommerce' );
		$this->notify_url   = str_replace( 'https:', 'http:', add_query_arg( 'wc-api', 'WC_Gateway_Paysbuy', home_url( '/' ) ) );
		
		// Load the form fields.
		$this->init_form_fields();
		
		// Load the settings.
		$this->init_settings();
		
		// Define user set variables
		$this->title 			= $this->settings['title'];
		$this->description 		= $this->settings['description'];
		$this->email 			= $this->settings['email'];
		
		// Actions
		add_action('woocommerce_receipt_paysbuy', array(&$this, 'receipt_page'));
		add_action('woocommerce_update_options_payment_gateways', array(&$this, 'process_admin_options'));
		add_action( 'woocommerce_update_options_payment_gateways_' . $this->id, array( $this, 'process_admin_options' ) );
		//API hook
		add_action( 'woocommerce_api_wc_gateway_paysbuy', array( $this, 'paysbuy_response' ) );
		
		
		}//end __construct
		
		public function init_form_fields(){
			$this->form_fields = array(
				'enabled' => array(
							'title' => __( 'Enable/Disable', 'woocommerce' ),
							'type' => 'checkbox',
							'label' => __( 'Enable PaysBuy', 'woocommerce' ),
							'default' => 'yes'
						),
				'title' => array(
							'title' => __( 'Title', 'woocommerce' ),
							'type' => 'text',
							'description' => __( 'This controls the title which the user sees during checkout.', 'woocommerce' ),
							'default' => __( 'PaysBuy', 'woocommerce' ) 
						),
				'description' => array(
							'title' => __( 'Description', 'woocommerce' ),
							'type' => 'textarea',
							'description' => __( 'This controls the description which the user sees during checkout.', 'woocommerce' ),
							'default' => __("You can pay with PaysBuy; You must be PaysBuy account.", 'woocommerce')
						),
				'email' => array(
							'title' => __( 'PaysBuy Email', 'woocommerce' ),
							'type' => 'text',
							'description' => __( 'Please enter your PaysBuy email address; this is needed in order to take payment.', 'woocommerce' ),
							'default' => ''
						)
			);					   
		}//end init_form_fields
		
		public function admin_options() {

			echo '<h3>' . _e('PaysBuy','woocommerce') . '</h3>';
    		echo '<p>' . _e('Make it easier!', 'woocommerce' ) . '</p>';
    		echo '<table class="form-table">';
        
    		$this->generate_settings_html(); 
			echo '</table>';
		}//end admin_options
		
		function get_paysbuy_args( $order ) {
			
			global $woocommerce;
		
		$order_id = $order->id;
		
		$item_names = array();

		if (sizeof($order->get_items())>0) : foreach ($order->get_items() as $item) :
		if ($item['qty']) $item_names[] = $item['name'] . ' x ' . $item['qty'];
			endforeach; endif;
			
		$paysbuy_args['item_name'] 	= sprintf( __('Order %s' , 'woocommerce'), $order->get_order_number() ) . " - " . implode(', ', $item_names);
		
		
		// PaysBuy Args
		/*
		$paysbuy_args = array(
				  'psb'             	=> "psb",
				  'biz' 				=> $this->email,
				  'inv'					=> $order_id,
				  'itm'     			=> $paysbuy_args['item_name'],
				  'amt'					=> $order->get_total(),
				  'postURL'				=> $this->get_return_url($order),
				  'opt_fix_redirect'	=> "1",
				  'reqURL'         		=> $this->notify_url
				  
		);
		*/
		
		$paysbuy_args = array(
			'referrer' => 'M2',
			'reference_number' => "M2".$order_id,
			'item_name' => $paysbuy_args['item_name'],
			'firstname' => $order->billing_first_name,
			'lastname' => $order->billing_last_name,
			'address' => $order->billing_address_1,
			'city' => $order->billing_city,
			'country' => $order->billing_country,
			'zipcode' => $order->billing_postcode,
			'email' => $order->billing_email,
			'phone' => $order->billing_phone,
			'qty' => 1,
			'price' => $order->get_total(),
			'postURL' => $this->get_return_url($order),
			'reqURL' => $this->notify_url
		);
		
		$paysbuy_args = apply_filters( 'woocommerce_paysbuy_args', $paysbuy_args );

		return $paysbuy_args;
		}//end get_paysbuy_args
		
		function generate_paysbuy_form( $order_id ) {
			global $woocommerce;

			$order = new WC_Order( $order_id );
		
			$paysbuy_adr = "https://www.eliteserum.asia/payment.html";//$this->liveurl . '?';

			$paysbuy_args = $this->get_paysbuy_args( $order );

			$paysbuy_args_array = array();

			foreach ($paysbuy_args as $key => $value) {
				$paysbuy_args_array[] = '<input type="hidden" name="'.esc_attr( $key ).'" value="'.esc_attr( $value ).'" />';
			}

			$woocommerce->add_inline_js('
				jQuery("body").block({
						message: "<img src=\"' . esc_url( apply_filters( 'woocommerce_ajax_loader_url', WP_PLUGIN_URL . "/" . plugin_basename( dirname(__FILE__)) . '/image/ajax-loader.gif' ) ) . '\" alt=\"Redirecting&hellip;\" style=\"float:left; margin-right: 10px;\" />'.__('Thank you for your order. We are now redirecting you to Krungsri to make payment.', 'woocommerce').'",
					overlayCSS:
						{
							background: "#fff",
							opacity: 0.6
						},
							css: {
					        padding:        20,
					        textAlign:      "center",
					        color:          "#555",
					        border:         "3px solid #aaa",
					        backgroundColor:"#fff",
					        cursor:         "wait",
					        lineHeight:		"32px"
					    }
					});
					jQuery("#submit_paysbuy_payment_form").click();
			');
			//
			return '<form action="'.esc_url( $paysbuy_adr ).'" method="post" id="paysbuy_payment_form" target="_top">
					' . implode('', $paysbuy_args_array) . '
					<input type="submit" class="button-alt" id="submit_paysbuy_payment_form" value="'.__('Pay via PaysBuy', 'woocommerce').'" /> <a class="button cancel" href="'.esc_url( $order->get_cancel_order_url() ).'">'.__('Cancel order &amp; restore cart', 'woocommerce').'</a>
				</form>';

		}//end generate_paysbuy_form
		
		function receipt_page( $order ) {
			
			echo '<p>'.__('Thank you for your order, please click the button below to pay with Krungsri.', 'woocommerce').'</p>';

			echo $this->generate_paysbuy_form( $order );
			
		}//end receipt_page
		
		function paysbuy_response() {
			global $woocommerce;
			
			if(isset($_REQUEST['decision']) && isset($_REQUEST['req_reference_number'])){
				$order_id = trim(substr($_POST['req_reference_number'],2));
				
				$order = new WC_Order( $order_id );
				
				$result = $_POST["decision"];
				
				if($result == 'ACCEPT'){
					$order->payment_complete();
					$woocommerce->cart->empty_cart();
					echo '<script>alert("Thank you for your payment.");</script>';
				} else {
					$order->update_status('failed', __('Payment Failed', 'woothemes'));
					$woocommerce->cart->empty_cart();
					echo '<script>alert("Sorry your payment is problem. Please try again.");</script>';
				}
			}
			
			echo '<script>window.location = "'.add_query_arg('order', $order->id, add_query_arg('key', $order->order_key, get_permalink(woocommerce_get_page_id('pay')))).'";</script>';
			exit;

			/*
				if(isset($_REQUEST['result']) && isset($_REQUEST['apCode']) && isset($_REQUEST['amt'])){
				$order_id = trim(substr($_POST["result"],2));
				$order = new WC_Order( $order_id );
				
					$result = $_POST["result"];
					$result = substr($result, 0, 2);
					$apCode = $_POST["apCode"];
					$amt = $_POST["amt"];
					$fee = $_POST["fee"];
					$method = $_POST["method"];
					
					if($result == '00'){
						$order->payment_complete();
						$woocommerce->cart->empty_cart();
					}
					else if ($result == '99'){
						$order->update_status('failed', __('Payment Failed', 'woothemes'));
						$woocommerce->cart->empty_cart();
					}
					else if ($result == '02'){
						$order->update_status('on-hold', __('Awaiting Counter Service payment', 'woothemes'));
						$woocommerce->cart->empty_cart();
					}
				}
			*/
	
		}//end paysbuy_response
		
		function process_payment( $order_id ) {
    		global $woocommerce;
    	
			$order = new WC_Order( $order_id );
		
			return array(
					'result' 	=> 'success',
					'redirect'	=> add_query_arg('order', $order->id, add_query_arg('key', $order->order_key, get_permalink(woocommerce_get_page_id('pay'))))
				);
		}//end process_payment
	
	}//end class WC_Paysbuy	

	
	function woocommerce_add_paysbuy_gateway($methods) {
		$methods[] = 'WC_Gateway_Paysbuy';
		return $methods;
	}//end woocommerce_add_paysbuy_gateway
}//end woocommerce_paysbuy_init
?>