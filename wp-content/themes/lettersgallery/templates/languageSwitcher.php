<?php
$is_visible = get_field("language_switcher", 11);

if (function_exists('pll_the_languages') && $is_visible) {
    $current_language = pll_current_language();
    ?>
    <ul class="language-switcher">
        <?php
        $languages = pll_the_languages(array('raw' => 1));
        foreach ($languages as $language) {
            $classes = 'language-switcher__link';
            if ($language['slug'] === $current_language) {
                $classes .= ' active';
            }
            ?>
            <li class="language-switcher__item d-flex">
                <a class="<?= esc_attr($classes); ?>" href="<?= esc_url($language['url']); ?>">
                    <?= esc_html($language['slug']); ?>
                </a>
            </li>
            <?php
        }
        ?>
    </ul>
    <?php
}
?>
