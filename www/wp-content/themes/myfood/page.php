<?php get_header(); ?>

    <main class="page-c page-simple">

        <div class="points-line"></div>

        <!--    COVER GENERIQUE START -->

        <section class="page-c__section cover-simple">

            <div class="back-rect">
                <div class="back-rect__rect back-rect__rect--full"></div>
            </div>

            <div class="cover-simple__container">
                <h1 class="title--center title--xxl black-text"><?php echo get_the_title() ?>.</h1>
            </div>

        </section>

        <!--    COVER GENERIQUE END -->
        <section class="page-simple__section">
            <div class="page-simple__content common-text grid-l">
                <div class="grid-l__large page-simple__texts common-text"><?php the_content(); ?></div>
            </div>
        </section>
        <!--    SECTIONS GENERIQUE END -->
    </main>
<?php get_footer(); ?>