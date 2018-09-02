<?php /* Template Name: FAQ */ ?>

<?php get_header(); ?>

<main id="template-faq" class="page-c">
    <!--    CONCEPT SGH SLIDESHOW START   -->

    <div class="points-line"></div>

    <section class="page-c__section simple-top">
        <div class="back-rect">
            <div class="back-rect__rect"></div>
        </div>
        <div class="simple-top__container">

            <p class="title--m green-text simple-top__subtitle  fade-in-bottom"><?php the_field('pagetitle'); ?></p>
            <h1 class="simple-top__title title--xxl  fade-in-bottom-1"><?php the_field('title'); ?></h1>

        </div>
    </section>

    <section class="page-c__section" id="faq-collapsibles">

        <div class="back-rect">
            <div class="back-rect__rect"></div>
        </div>

        <div class="collapsible-list">

			<?php

			$rowsection_1_items = get_field('rowsection_1_content');
      
			foreach($rowsection_1_items as $item): ?>
                <?php get_collapsible($item); ?>
            <?php endforeach; ?>

        </div>
    </section>
</main>


<?php get_footer(); ?>