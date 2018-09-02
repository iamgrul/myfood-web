<?php /* Template Name: Community - Team */ ?>

<?php get_header(); ?>


<main id="template-community-team" class="page-c">

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
                        <?php acf_img_echo(get_field('teamimage'), 'large'); ?>
                    </div>

                    <div class="slideshow__container__slide__content">

                        <div class="slideshow__container__slide__content__title title title--xxl title--beige title--center">
                            <div class="slideshow__container__slide__content__title__content">
                                <div class="title-mask mask mask--green"></div>
                                <h1 class="title__content">
                                    <?php the_field('title'); ?>
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="page-c__section" id="community-team-list">
        <div class="team-list">
            <div class="grid-l fade-in-bottom">
                <?php get_team_box(get_field('teammember')); ?>
            </div>
        </div>
    </section>
	
	<?php get_seo_footer(); ?>

</main>



<?php get_footer(); ?>