<?php /* Template Name: Contact */ ?>

<?php get_header(); ?>

<main id="template-contact" class="page-c">

    <div class="points-line"></div>

    <section class="page-c__section">
        <div class="slideshow slideshow--cover--center">
            <div class="slideshow__sidebar">
                <h2 class="slideshow__sidebar__title">
                    <?php the_field('lefttitle'); ?>
                </h2>
                <i class="slideshow__sidebar__icon icon-scroll"></i>
            </div>

            <div class="slideshow__container">
                <div class="slideshow__container__slide">

                    <div class="slideshow__container__slide__image img-c crop-img h-back h-back--full">
                        <?php acf_img_echo(get_field('headerimage'), 'large'); ?>
                    </div>

                    <div class="slideshow__container__slide__content">
                        <div class="slideshow__container__slide__content__title title title--xxl title--beige title--center">
                            <div class="slideshow__container__slide__content__title__content">
                                <div class="title-mask mask mask--green"></div>
                                <h1 class="title__content">
                                    <?php the_field('pagetitle'); ?>
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="page-c__section contact-main">
        <div class="grid-l">
            <div class="grid-l__demi">
                <div class="contact-box">
                    <p class="contact-box__title"><?php _e('Global', 'myfood'); ?></p>
                    <a href="mailto:<?php the_field('globalmail'); ?>" class="contact-box__content contact-box__content--l"><?php the_field('globalmail'); ?></a>
                </div>
            </div>

            <div class="grid-l__demi">
                <div class="contact-box">
                    <p class="contact-box__title"><?php _e('Phone', 'myfood'); ?></p>
                    <a href="tel:<?php the_field('phone'); ?>" class="contact-box__content contact-box__content--l"><?php the_field('phone'); ?></a>
                </div>
            </div>
        </div>
    </section>

    <section class="page-c__section contact-more">
        <div class="back-rect"><div class="back-rect__rect"></div></div>

        <div class="grid-l">

            <div class="grid-l__demi">
                <div class="contact-box">
                    <p class="contact-box__title"><?php _e('Sales', 'myfood'); ?></p>
                    <a href="mailto:<?php the_field('salesmail'); ?>" class="contact-box__content"><?php the_field('salesmail'); ?></a>
                </div>
            </div>

            <div class="grid-l__demi">
                <div class="contact-box">
                    <p class="contact-box__title"><?php _e('Job', 'myfood'); ?></p>
                    <a href="mailto:<?php the_field('jobmail'); ?>" class="contact-box__content"><?php the_field('jobmail'); ?></a>
                </div>
            </div>

            <div class="grid-l__demi">
                <div class="contact-box">
                    <p class="contact-box__title"><?php _e('Support', 'myfood'); ?></p>
                    <a href="mailto:<?php the_field('supportmail'); ?>" class="contact-box__content"><?php the_field('supportmail'); ?></a>
                </div>
            </div>

            <div class="grid-l__demi">
                <div class="contact-box">
                    <p class="contact-box__title"><?php _e('Administrative', 'myfood'); ?></p>
                    <a href="mailto:<?php the_field('administrativemail'); ?>" class="contact-box__content"><?php the_field('administrativemail'); ?></a>
                </div>
            </div>

        </div>
    </section>


    <section class="page-c__section contact-address">
        <div class="back-rect"><div class="back-rect__rect"></div></div>

        <div class="grid-l">
            <div class="grid-l__demi address-part">
                <p class="title-address"><?php _e('Address', 'myfood'); ?></p>
                <address>
                    <p class="title--ml">
                        <span class="green-text">
                            <?php the_field('address'); ?>
                        </span>
                        <?php the_field('city'); ?>
                    </p>

                </address>
                <small class="mention">
                    <?php the_field('mention'); ?>
                </small>
            </div>

            <div class="grid-l__demi">
                <div id="myfood-gmap" class="gmap" data-lng="7.5157036" data-lat="48.5354167"></div>
            </div>
        </div>

    </section>



</main>


<?php get_footer(); ?>