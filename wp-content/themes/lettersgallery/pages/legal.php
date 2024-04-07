<?php
/*
Template Name: Legal
*/
?>

<?php
get_header();

$fields_visible = get_field("fields_visible");
$fields_hidden = get_field("fields_hidden")
?>

<main>
    <section class="legal">
        <div class="container">

            <?php get_template_part("templates/breadcrumbs"); ?>

            <h1 class="h2 mb-0 title">
                <?= the_field("title"); ?>
            </h1>

           <div class="legal-wrapper">
               <?php
               foreach ($fields_visible as $field) {
                   ?>
                   <h2 class="h8 fw-semibold text-uppercase mb-0">
                       <?= $field["title"]; ?>
                   </h2>
                   <?php
                   echo $field["text"];
               }

               if (!empty($fields_hidden)) {
                   ?>
                   <div class="legal-inner">
                       <?php
                       foreach ($fields_hidden as $field) {
                           ?>
                           <h2 class="h8 fw-semibold text-uppercase mb-0">
                               <?= $field["title"]; ?>
                           </h2>
                           <?php
                           echo $field["text"];
                       }
                       ?>
                   </div>
                   <button type="button" class="p-0 bg-transparent border-0 d-flex align-items-center gap-2 text-uppercase fw-medium legal-button">
                       <span>
                           <?= translate_and_output("read_more"); ?>
                       </span>
                       <span>
                           <?= translate_and_output("show_less"); ?>
                       </span>
                       <svg class="legal-icon" width="23" height="15">
                           <use href="<?php get_image('sprite.svg#arrow-right-small'); ?>"></use>
                       </svg>
                   </button>
                   <?php
               }
               ?>
           </div>

        </div>
    </section>

    <?= get_template_part("templates/scrollTop"); ?>
</main>

<?php get_footer(); ?>

