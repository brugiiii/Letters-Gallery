<?php
$form_data = $args["form_data"] ?? null;
$first_name = $form_data["first_name"] ?? null;
$last_name = $form_data["last_name"] ?? null;
$email = $form_data["email"] ?? null;
$address = $form_data["address"] ?? null;
$post_code = $form_data["post_code"] ?? null;
$city = $form_data["city"] ?? null;
$state = $form_data["state"] ?? null;
$country = $form_data["country"] ?? null;
$phone_number = $form_data["phone_number"] ?? null;
$links = $form_data["links"] ?? null;
$comments = $form_data["comments"] ?? null;

$formatted_data = array(array("title" => "First Name", "value" => $first_name), array("title" => "Last Name", "value" => $last_name), array("title" => "Email", "value" => $email), array("title" => "Address", "value" => $address), array("title" => "Post Code", "value" => $post_code), array("title" => "City", "value" => $city), array("title" => "State", "value" => $state), array("title" => "Country", "value" => $country), array("title" => "Phone Number", "value" => $phone_number), array("title" => "Link", "value" => $links), array("title" => "Comments", "value" => $comments));

$date = strtotime("2024-05-07");
$formatted_date = date("F j, Y", $date);
?>

<html>
<body>
<div marginwidth="0" marginheight="0" style="background-color:#f7f7f7;padding:0;text-align:center" bgcolor="#f7f7f7">
    <table width="100%" id="m_-679262692565835892outer_wrapper" style="background-color:#f7f7f7" bgcolor="#f7f7f7">
        <tbody>
        <tr>
            <td></td>
            <td width="600">
                <div id="m_-679262692565835892wrapper" dir="ltr"
                     style="margin:0 auto;padding:70px 0;width:100%;max-width:600px" width="100%">
                    <table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">
                        <tbody>
                        <tr>
                            <td align="center" valign="top">
                                <div id="m_-679262692565835892template_header_image">
                                </div>
                                <table border="0" cellpadding="0" cellspacing="0" width="100%"
                                       id="m_-679262692565835892template_container"
                                       style="background-color:#fff;border:1px solid #dedede;border-radius:3px"
                                       bgcolor="#fff">
                                    <tbody>
                                    <tr>
                                        <td align="center" valign="top">

                                            <table border="0" cellpadding="0" cellspacing="0" width="100%"
                                                   id="m_-679262692565835892template_header"
                                                   style="background-color:#7f54b3;color:#fff;border-bottom:0;font-weight:bold;line-height:100%;vertical-align:middle;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;border-radius:3px 3px 0 0"
                                                   bgcolor="#7f54b3">
                                                <tbody>
                                                <tr>
                                                    <td id="m_-679262692565835892header_wrapper"
                                                        style="padding:36px 48px;display:block">
                                                        <h1 style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:30px;font-weight:300;line-height:150%;margin:0;text-align:left;color:#fff;background-color:inherit"
                                                            bgcolor="inherit">Letters Gallery Members Request</h1>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center" valign="top">

                                            <table border="0" cellpadding="0" cellspacing="0" width="100%"
                                                   id="m_-679262692565835892template_body">
                                                <tbody>
                                                <tr>
                                                    <td valign="top" id="m_-679262692565835892body_content"
                                                        style="background-color:#fff" bgcolor="#fff">

                                                        <table border="0" cellpadding="20" cellspacing="0" width="100%">
                                                            <tbody>
                                                            <tr>
                                                                <td valign="top" style="padding:48px 48px 32px">
                                                                    <div id="m_-679262692565835892body_content_inner"
                                                                         style="color:#636363;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:14px;line-height:150%;text-align:left"
                                                                         align="left">

                                                                        <p style="margin:0 0 16px">You've received the
                                                                            members request from</p>

                                                                        <h2 style="color:#7f54b3;display:block;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:18px;font-weight:bold;line-height:130%;margin:0 0 18px;text-align:left">
                                                                            [Code: ] (<?= $formatted_date; ?>)</h2>

                                                                        <div style="margin-bottom:40px">
                                                                            <table cellspacing="0" cellpadding="6"
                                                                                   border="1"
                                                                                   style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;width:100%;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif"
                                                                                   width="100%">
                                                                                <tbody>
                                                                                <?php
                                                                                foreach ($formatted_data as $data) {
                                                                                    if ($data["value"]) {
                                                                                        ?>
                                                                                        <tr>
                                                                                            <th scope="col"
                                                                                                style="color:#7f54b3;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left"
                                                                                                align="left"><?= $data["title"]; ?>
                                                                                            </th>
                                                                                            <th scope="col"
                                                                                                style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left"
                                                                                                align="left"><?= $data["value"]; ?>
                                                                                            </th>
                                                                                        </tr>
                                                                                        <?php
                                                                                    }
                                                                                }
                                                                                ?>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>

                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>

                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </td>
            <td></td>
        </tr>
        </tbody>
    </table>
</div>
</body>
</html>