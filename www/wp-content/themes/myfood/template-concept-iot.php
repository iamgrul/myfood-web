	<?php /* Template Name: Concept - IOT */ ?>

<?php get_header(); ?>

    <main id="template-concept-iot" class="page-c">

        <div class="points-line"></div>

        <!--    CONCEPT IOT COVER START   -->
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
                                        <?php the_field('headertitle'); ?>
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--    CONCEPT IOT COVER END   -->


        <!--    CONCEPT IOT HUB START   -->
        <section class="page-c__section" id="concept-iot-hub">


            <div class="title title--l title--center title--masked">
                <h2 class="title__content title__content--prefixed">
                    <span class="title__content__number">01</span>
                    <?php the_field('rowsection_1_myfoodhub'); ?>
                </h2>
            </div>

            <div class="grid-l">
                <div class="grid-l__demi img-part">
                    <div class="crop-img img-c  fade-in-bottom">
                        <?php acf_img_echo(get_field('rowsection_1_image'), 'large'); ?>
                    </div>
                </div>

                <div class="grid-l__demi">
                    <div class="content-part fade-in-bottom">
                        <h3 class="title title--m green-text">
                            <?php the_field('rowsection_1_subtitle'); ?>
                        </h3>

                        <div class="common-text black-text">
                            <?php the_field('rowsection_1_text'); ?>
                        </div>
                    </div>

                    <div class="pictos-list">
                        <p class="pictos-list__title title--tab fade-in-bottom">
							<?php _e('Available on', 'myfood'); ?>
                        </p>
                        <div class="pictos-list__picto fade-in-bottom-1">
                            <i class="icon-desk"></i>
                            <p class="mention mention--small grey-text">
                                <?php _e('Desktop', 'myfood'); ?>
                            </p>
                        </div>

                        <div class="pictos-list__picto fade-in-bottom-2">
                            <i class="icon-tablet"></i>
                            <p class="mention mention--small grey-text">
                                <?php _e('Tablet', 'myfood'); ?>
                            </p>
                        </div>

                        <div class="pictos-list__picto fade-in-bottom-3">
                            <i class="icon-mobile"></i>
                            <p class="mention mention--small grey-text">
                                <?php _e('Mobile', 'myfood'); ?>
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!--    CONCEPT IOT HUB END   -->


        <!--    CONCEPT IOT CPU START   -->
        <section class="page-c__section page-c__section--dbl-layout" id="concept-iot-introduction">
            <div class="back-rect">
                <div class="back-rect__rect"></div>
            </div>

            <div class="title title--l title--masked">
                <h2 class="title__content title__content--prefixed">
                    <span class="title__content__number">02</span>
                    <?php the_field('rowsection_2_title'); ?>
                </h2>
            </div>

            <div class="grid-l page-c__section--dbl-layout__grid">
                <div class="grid-l__demi left-part">

                    <div class="common-text fade-in-bottom">
                        <?php the_field('rowsection_2_text'); ?>
                    </div>

                    <ul class="points-list points-list--light border-box card--points-list">
                        <li class="points-list__li">
                            <div class="points-list__li__number bullet-point">
                                <span>1</span>
                            </div>
                            <div class="points-list__li__content">
                                <h4 class="title--tab-m">
                                    <?php the_field('rowsection_2_detail_item_1'); ?>
                                </h4>
                                <p class="mention">
                                    <?php the_field('rowsection_2_detail_sub_item_1'); ?>
                                </p>
                            </div>
                        </li>
                        <li class="points-list__li">
                            <div class="points-list__li__number bullet-point">
                                <span>2</span>
                            </div>
                            <div class="points-list__li__content">
                                <h4 class="title--tab-m">
                                    <?php the_field('rowsection_2_detail_item_2'); ?>
                                </h4>
                                <p class="mention">
                                    <?php the_field('rowsection_2_detail_sub_item_2'); ?>
                                </p>
                            </div>
                        </li>
                        <li class="points-list__li">
                            <div class="points-list__li__number bullet-point">
                                <span>3</span>
                            </div>
                            <div class="points-list__li__content">
                                <h4 class="title--tab-m">
                                    <?php the_field('rowsection_2_detail_item_3'); ?>
                                </h4>
                                <p class="mention">
                                    <?php the_field('rowsection_2_detail_sub_item_3'); ?>
                                </p>
                            </div>
                        </li>
                        <li class="points-list__li">
                            <div class="points-list__li__number bullet-point">
                                <span>4</span>
                            </div>
                            <div class="points-list__li__content">
                                <h4 class="title--tab-m">
                                    <?php the_field('rowsection_2_detail_item_4'); ?>
                                </h4>
                                <p class="mention">
                                    <?php the_field('rowsection_2_detail_sub_item_4'); ?>
                                </p>
                            </div>
                        </li>
                    </ul>

                </div>

                <div class="grid-l__demi right-part">
                    <div class="back-rect">
                        <div class="back-rect__rect"></div>
                    </div>

                    <div class="layout">
                        <div class="layout__img fade-in-bottom-2">
                            <?php acf_img_echo(get_field('rowsection_2_image'), 'large'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--    CONCEPT IOT CPU END   -->


        <!--    CONCEPT IOT CONTRIBUTIONS START   -->
        <section class="page-c__section" id="concept-iot-contributions">

            <div class="back-rect">
                <div class="back-rect__rect"></div>
            </div>

            <div class="green-push">
                <div class="green-push__title title title--white title--l title--masked">
                    <h2 class="title__content title__content--prefixed">
                        <span class="title__content__number">03</span>
                        <?php the_field('rowsection_3_title'); ?>
                    </h2>
                </div>
                <div class="green-push__content">
                    <div class="common-text fade-in-bottom">
						<?php the_field('rowsection_3_subtitle'); ?>
                    </div>

                    <div class="green-push__content__ctas fade-in-bottom-1">
                        <a href="<?php the_field('rowsection_3_left_link'); ?>" target="_blank" rel="noopener"
                           class="cbutton cbutton--border cbutton--border--white">
                            <p>
                                <?php the_field('rowsection_3_left_text'); ?>
                            </p>
                        </a>

                        <a href="<?php the_field('rowsection_3_right_link'); ?>" target="_blank" rel="noopener"
                           class="cbutton cbutton--border cbutton--border--white">
                            <p>
                                <?php the_field('rowsection_3_right_text'); ?>
                            </p>
                        </a>
                    </div>
                </div>

                <div class="circles">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </section>
        <!--    CONCEPT IOT CONTRIBUTIONS END   -->


        <!--    CONCEPT IOT PUSH BOTTOM START   -->
        <section class="page-c__section" id="concept-iot-bottom">
            <div class="back-rect">
                <div class="back-rect__rect"></div>
            </div>

            <div class="concept-bottom" data-equal-h-col="2">
                <div class="grid-l">
                    <div class="grid-l__demi concept-bottom__part mh-col">
                        <div class="concept-bottom__bg crop-img">
                            <?php acf_img_echo(get_field('rowsection_left_image'), 'medium'); ?>
                        </div>
                        <a class="concept-bottom__content fade-in-bottom"
                           href="<?php the_field('prefooter_left_link'); ?>">
                            <h3 class="concept-bottom__content__title title--l white-text">
                                <?php the_field('rowsection_left'); ?>
                            </h3>
                            <div class="cbutton cbutton--border cbutton--border--green">
                                <p><?php _e('Discover', 'myfood'); ?></p>
                            </div>
                        </a>

                    </div>

                    <div class="grid-l__demi concept-bottom__part mh-col">
                        <div class="concept-bottom__bg crop-img">
                            <?php acf_img_echo(get_field('rowsection_right_image'), 'medium'); ?>
                        </div>
                        <a class="concept-bottom__content fade-in-bottom-1"
                           href="<?php the_field('prefooter_right_link'); ?>">
                            <h3 class="concept-bottom__content__title title--l white-text">
                                <?php the_field('rowsection_right'); ?>
                            </h3>
                            <div class="cbutton cbutton--border cbutton--border--green">
                                <p><?php _e('Discover', 'myfood'); ?></p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!--    CONCEPT IOT PUSH BOTTOM END   -->


        <?php get_seo_footer(); ?>

    </main>


<?php get_footer(); ?>