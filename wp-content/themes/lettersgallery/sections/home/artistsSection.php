<section class="artists">
    <div class="container">
        <h2 class="h2 mb-0 section-title">
            <?= the_field('artist_title'); ?>
        </h2>
        <?= get_template_part('templates/home/artists'); ?>
        <button class="artists-button bg-transparent text-capitalize">
            <span class="more">
                <?= translate_and_output('view_all_artists'); ?>
            </span>
            <span class="less">
                <?= translate_and_output('show_less_artists'); ?>
            </span>
        </button>
    </div>
</section>