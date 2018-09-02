<?php get_header(); ?>


    <main class="page-c page-simple" id="template-about-legals">

        <div class="points-line"></div>

        <!--    COVER GENERIQUE START -->

        <section class="page-c__section">
            <div class="slideshow slideshow--cover--center">
                <div class="slideshow__sidebar">
                    <h2 class="slideshow__sidebar__title">
                        <?php _e('404', 'myfood'); ?>
                    </h2>
                    <i class="slideshow__sidebar__icon icon-scroll"></i>
                </div>

                <div class="slideshow__container">
                    <div class="slideshow__container__slide">

                        <div class="slideshow__container__slide__image img-c crop-img h-back h-back--full">
                            <?php echo_img("background/default_cover.png"); ?>
                        </div>

                        <div class="slideshow__container__slide__content">
                            <div class="slideshow__container__slide__content__title title title--xxl title--beige">
                                <div class="slideshow__container__slide__content__title__content">
                                    <div class="title-mask mask mask--green"></div>
                                    <h2 class="title__content">
                                        <?php _e('This page isn\'t available.', 'myfood'); ?>
                                    </h2>
                                </div>
                            </div>

                            <div class="slideshow__container__slide__content__subtitle-container">
                                <div class="title-mask mask mask--green"></div>
                                <h3 class="line-mention">
                                    <p class="line-mention__content">
                                        <?php _e('The link you followed may be broken, or the page may have been removed.', 'myfood'); ?>
                                    </p>
                                </h3>
                            </div>

                            <div class="slideshow__container__slide__content__button-container">
                                <a class="cbutton cbutton--border cbutton--border--green" href="<?php echo home_url(); ?>">
                                    <p>
                                        <?php _e('Go to home page', 'myfood'); ?>
                                    </p>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php get_footer(); ?>