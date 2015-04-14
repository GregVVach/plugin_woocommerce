<?php
/**
 * Plugin Name: PayU Payment Gateway
 * Plugin URI: https://github.com/PayU/plugin_woocommerce
 * Description: PayU payment gateway for WooCommerce
 * Version: 1.0.0
 * Author: PayU SA
 * Copyright (c) 2015 PayU
 * License: LGPL 3.0
 */

add_action('plugins_loaded', 'woocommerce_payu_init', 0);

function woocommerce_payu_init()
{
    if (!class_exists('WC_Payment_Gateway')) return;

    include_once('includes/class-woocommerce-payu.php');

    add_filter('woocommerce_payment_gateways', 'woocommerce_payu_add_gateway');
}

function woocommerce_payu_add_gateway($methods) {
    $methods[] = 'WC_Gateway_PayU';

    return $methods;
}