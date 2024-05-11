<?php
function get_image($name)
{
    echo get_template_directory_uri() . "/assets/images/" . $name;
}

function send_email_message($formData)
{
//    $to = get_option('admin_email');
    $to = "edyabrug91@gmail.com";
    $subject = 'Message from Website Form Submission';

    // Get current WordPress site URL
    $site_url = get_site_url();
    $site_host = parse_url($site_url, PHP_URL_HOST);

    // Styling for email message
    ob_start();
    get_template_part("templates/emailMessage", null, array("form_data" => $formData));
    $message = ob_get_clean();

    $headers = array(
        'Content-Type: text/html; charset=UTF-8',
        'From: webmaster@' . $site_host,
        'Reply-To: webmaster@' . $site_host,
        'X-Mailer: PHP/' . phpversion()
    );

    // Sending HTML email
    wp_mail($to, $subject, $message, $headers);
}