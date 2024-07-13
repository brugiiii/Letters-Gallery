<?php
$skip_iteration_id = isset($args["skip_iteration_id"]) ? $args["skip_iteration_id"] : null;


$email = get_field("email", 11);
$address = get_field("address", 11);
$phone = get_field("phone", 11);

$contacts = array(array("data" => $email, "icon" => "mail"), array("data" => $phone, "icon" => "phone"), array("data" => $address, "icon" => "location"))
?>

<ul class="contacts">
    <?php
    foreach ($contacts as $index => $contact) {
        if ($index + 1 === $skip_iteration_id) continue
        ?>
        <li class="contacts__item">
            <a class="contacts__link d-flex align-items-end" href="<?= $contact["data"]["url"]; ?>"
               target="<?= $contact["data"]["target"]; ?>">
                <svg class="contacts__icon icon" width="24" height="24">
                    <use href="<?php get_image('sprite.svg#' . $contact["icon"]); ?>"></use>
                </svg>
                <?= $contact["data"]["title"]; ?>
            </a>
        </li>
        <?php
    }
    ?>
</ul>