<?php /* Template Name: About - Legals */ ?>

<?php get_header(); ?>



    <main class="page-c page-simple" id="template-about-legals">

        <div class="points-line"></div>

        <!--    COVER GENERIQUE START -->

        <section class="page-c__section cover-simple">

            <div class="back-rect">
                <div class="back-rect__rect back-rect__rect--full"></div>
            </div>

            <div class="cover-simple__container">

                <p class="title--center title--m green-text cover-simple__subtitle fade-in-bottom"><?php the_field('pagetitle'); ?></p>
                <h1 class="title--center title--xxl black-text fade-in-bottom-1"><?php the_field('title'); ?></h1>

            </div>

        </section>

        <!--    COVER GENERIQUE END -->


        <!--    SECTIONS GENERIQUE START -->
            <?php

            $items = get_field('items');
			$i = 1;

            foreach($items as $item): ?>

            <section class="page-simple__section">
                <div class="page-simple__title title title--l grid-l">
                    <h2 class="title__content title__content--prefixed grid-l__large">
                        <span class="title__content__number"><?php echo '0'.($i) ?></span>
                        <?php echo $item['title'] ?>
                    </h2>
                </div>

                <div class="page-simple__content common-text grid-l">

                    <div class="grid-l__large page-simple__texts">
                        <h3>
                            <?php echo $item['subtitle'] ?>
                        </h3>

                        <?php echo $item['content'] ?>

                    </div>
                </div>
            </section>

        <?php
		$i++;		
		endforeach; ?>

        <!--    SECTIONS GENERIQUE END -->

    </main>

<?php get_footer(); ?>