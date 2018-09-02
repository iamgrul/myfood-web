<?php /* Template Name: Update browser */ ?>

<?php get_header(); ?>

<main id="template-update-browser" class="page-c">

    <div class="points-line"></div>

    <!--    COVER GENERIQUE START -->
    <section class="page-c__section cover-simple">

        <div class="back-rect">
            <div class="back-rect__rect back-rect__rect--full"></div>
        </div>

        <div class="cover-simple__container">

            <p class="title--center title--m green-text cover-simple__subtitle  fade-in-bottom"><?php _e("Sorry", "myfood") ?></p>
            <h1 class="title--center title--xxl black-text  fade-in-bottom-1"><?php _e("Your browser is too old", "myfood")?></h1>
            <p class="title--tab fade-in-bottom-2"><?php _e("Please update to the new version or change your browser", "myfood")?></p>

        </div>

    </section>
    <!--    COVER GENERIQUE END -->

</main>


<?php get_footer(); ?>