<?php
$color = isset($args["color"]) ? $args["color"] : "white";
$socials = [
    ["name" => "instagram", "icon" => "instagram"],
    ["name" => "facebook", "icon" => "facebook"],
    ["name" => "tiktok", "icon" => "tiktok-" . $color]
];
?>

<ul class="socials">
    <?php foreach ($socials as $social) : ?>
        <?php
        $socialData = get_field($social['name'], 11);
        if (!$socialData) continue;
        ?>
        <li class="socials__item">
            <a class="socials__link" href="<?= $socialData['url']; ?>" target="<?= $socialData['target']; ?>"
               rel="noopener nofollow noreferrer">
                <svg class="socials__icon icon" width="36" height="36">
                    <use href="<?php get_image('sprite.svg#' . $social['icon']); ?>"></use>
                </svg>
            </a>
        </li>
    <?php endforeach; ?>
</ul>
