<?php
$current_lang = pll_current_language();
$post_id = pll_get_post(11, $current_lang);
$form_fields = get_field("popup_form_fields");
?>
<div class="popup-inner">
    <p class="popup-text text-center">
        <?= the_field('popup_text', $post_id); ?>
    </p>

    <form class="popup-form">
        <?php
        foreach ($form_fields as $field) {
            $acf_fc_layout = $field['acf_fc_layout'];

            $required = $field['required'] ? "required" : "";
            $type = $acf_fc_layout === "phone_number" ? "tel" : ($acf_fc_layout === "email" ? "email" : "text");
            $attributes = "name=\"{$acf_fc_layout}\" placeholder=\"{$field['placeholder']}\" type=\"{$type}\" {$required}";
            ?>
            <label class="popup-form__field">
                <span class="popup-form__title p4">
                    <?= $field["title"]; ?>
                </span>
                <?php
                if ($acf_fc_layout === "comments") {
                    ?>
                    <textarea class="popup-form__input" <?= $attributes; ?>></textarea>
                    <?php
                } else {
                    ?>
                    <input class="popup-form__input" <?= $attributes; ?>>
                    <?php
                }
                ?>
            </label>
            <?php
        }
        ?>
        <button class="popup-form__button" type="submit">
            <?= the_field('popup_button', $post_id); ?>
        </button>
    </form>
</div>