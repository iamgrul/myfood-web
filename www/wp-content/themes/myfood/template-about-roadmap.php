<?php /* Template Name: About - Roadmap */ ?>

<?php get_header(); ?>

    <main class="page-c page-roadmap" id="template-about-roadmap">

        <div class="points-line"></div>

        <!--    COVER GENERIQUE START -->

        <section class="page-c__section cover-simple">

            <div class="back-rect">
                <div class="back-rect__rect back-rect__rect--full"></div>
            </div>

            <div class="cover-simple__container">

                <p class="title--center title--m green-text cover-simple__subtitle  fade-in-bottom"><?php the_field('pagetitle'); ?></p>
                <h1 class="title--center title--xxl black-text  fade-in-bottom-1"> <?php the_field('title'); ?> </h1>

            </div>

        </section>

        <!--    COVER GENERIQUE END -->

        <div class="page-roadmap__sections-container">

        <!--    SECTIONS ANNEE START -->

                <?php

                $items = get_field('items');

                foreach($items as $item): ?>

                <section class="page-roadmap__section">

                    <div class="back-rect">
                        <div class="back-rect__rect"></div>
                    </div>

                    <div class="page-roadmap__content grid-l">

                        <div class="left-part">
                            <div class="page-roadmap__title title title--l">
                                <h2 class=""><?php echo $item['date'] ?></h2>
                            </div>

                            <div class="page-roadmap__texts common-text">
								<?php echo $item['content'] ?>
                            </div>
                        </div>

                        <div class="page-roadmap__photo right-part">
                            <div class="img-c crop-img">
                                <?php acf_img_echo($item['image'], 'medium'); ?>
                            </div>
                        </div>
                    </div>

                </section>

            <?php endforeach; ?>

            <!--    SECTIONS ANNEE END -->
        </div>

    </main>

<?php get_footer(); ?>