<?php
add_action('wpcf7_before_send_mail', 'send_message_to_telegram');
add_action('admin_head', 'hide_product_description_field');

function get_image($name)
{
    echo get_template_directory_uri() . "/assets/images/" . $name;
}

function hide_product_description_field()
{
    global $post_type;
    if ($post_type == 'product') { // Перевіряємо, чи ми на сторінці редагування товару
        echo '<style>#postdivrich { display: none !important; }</style>';
    }
}

function send_email_message($email) {
    $to = get_option('admin_email');
    $subject = 'Message from Website Form Submission';

    // Get current WordPress site URL
    $site_url = get_site_url();
    $site_host = parse_url($site_url, PHP_URL_HOST);

    // Styling for email message
    $message = '<html><head>';
    $message .= '<style>';
    $message .= '@import url("https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap");';
    $message .= 'body { font-family: Montserrat, Arial, sans-serif; background-color: #3F352C; color: #ffffff; font-size: 16px; }';
    $message .= 'h2 { color: #ffffff; font-size: 24px; }';
    $message .= 'p { margin-bottom: 10px; font-size: 18px; }';
    $message .= 'strong { color: #ffffff; font-size: 18px; }';
    $message .= '</style>';
    $message .= '</head><body>';
    $message .= '<h2>Message from Website Form</h2>';
    $message .= '<p>Contact details:</p>';
    $message .= "<p><strong>Email:</strong> $email</p>";
    $message .= '</body></html>';

    $headers = array(
        'Content-Type: text/html; charset=UTF-8',
        'From: webmaster@' . $site_host,
        'Reply-To: webmaster@' . $site_host,
        'X-Mailer: PHP/' . phpversion()
    );

    // Sending HTML email
    wp_mail($to, $subject, $message, $headers);
}