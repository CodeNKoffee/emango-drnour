<?php
/**
 * Plugin Name: Nour Musharbash — Order Form Handler
 * Description: Handles the Ramadan Plan order form via AJAX. Drop into wp-content/mu-plugins/.
 * Author: Nour Musharbash
 * Version: 1.0
 */

if (!defined('ABSPATH'))
    exit;

/* ── AJAX Handlers (logged-in + guest) ──────────────────── */
add_action('wp_ajax_nopriv_nm_order', 'nm_handle_order');
add_action('wp_ajax_nm_order', 'nm_handle_order');

function nm_handle_order()
{
    // Verify nonce (Disabled for static HTML usage)
    // check_ajax_referer( 'nm_order_nonce', 'nonce' );

    // Sanitize all fields
    $name = sanitize_text_field($_POST['nm_name'] ?? '');
    $email = sanitize_email($_POST['nm_email'] ?? '');
    $bank = sanitize_text_field($_POST['nm_bank'] ?? '');
    $cliq = sanitize_text_field($_POST['nm_cliq'] ?? '');
    $lang = sanitize_text_field($_POST['nm_plan_lang'] ?? '');

    // Validate — every field is required
    if (!$name || !$email || !$bank || !$cliq || !$lang) {
        wp_send_json_error(['message' => 'All fields are required.'], 400);
    }
    if (!is_email($email)) {
        wp_send_json_error(['message' => 'Invalid email address.'], 400);
    }
    if (empty($_FILES['nm_file']['tmp_name'])) {
        wp_send_json_error(['message' => 'Payment screenshot is required.'], 400);
    }

    // Handle file upload
    require_once ABSPATH . 'wp-admin/includes/file.php';
    $uploaded = wp_handle_upload($_FILES['nm_file'], ['test_form' => false]);

    if (isset($uploaded['error'])) {
        wp_send_json_error(['message' => 'Upload failed: ' . $uploaded['error']], 400);
    }

    $attachment = isset($uploaded['file']) ? [$uploaded['file']] : [];

    // Compose email
    // $to      = 'musharbash.nn@gmail.com';
    $to = 'hatemthedev@gmail.com';
    $subject = 'New Ramadan Plan Order — ' . $name;
    $body = "Name: {$name}\n"
        . "Email: {$email}\n"
        . "Bank / App: {$bank}\n"
        . "CliQ Username: {$cliq}\n"
        . "Plan Language: {$lang}";

    $headers = [
        'Content-Type: text/plain; charset=UTF-8',
        'Reply-To: ' . $email,
    ];

    $sent = wp_mail($to, $subject, $body, $headers, $attachment);

    if ($sent) {
        wp_send_json_success(['message' => 'Order submitted successfully.']);
    } else {
        wp_send_json_error(['message' => 'Email could not be sent. Please try again.'], 500);
    }
}

/* ── Localize AJAX URL + nonce ──────────────────────────── */
add_action('wp_enqueue_scripts', function () {
    wp_localize_script('jquery', 'nmAjax', [
        'url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('nm_order_nonce'),
    ]);
});
