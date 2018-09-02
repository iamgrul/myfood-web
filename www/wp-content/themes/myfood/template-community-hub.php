<?php /* Template Name: Community - HUB */ ?>

<?php get_header(); ?>


<main id="template-community-hub" class="page-c">

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
                                    <?php the_field('title'); ?>
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="page-c__section" id="community-hub-introduction">

        <div class="back-rect">
            <div class="back-rect__rect"></div>
        </div>

        <div class="title title--l title--masked">
            <h2 class="title__content title__content--prefixed">
                <span class="title__content__number">01</span>
                <?php the_field('rowsection_1_title'); ?>
            </h2>
        </div>

        <div class="grid-l">
            <div class="grid-l__demi left-part fade-in-bottom">
                <div class="common-text">
                    <h3><?php the_field('rowsection_1_subtitle'); ?></h3>
                    <p><?php the_field('rowsection_1_content'); ?></p>
                </div>
            </div>
            <div class="grid-l__demi right-part">
                <div class="pictos-list">
                    <div class="pictos-list__picto fade-in-bottom">
                        <i class="icon-desk"></i>
                        <p class="mention mention--small grey-text">
                            <?php _e('Desktop','myfood'); ?>
                        </p>
                    </div>

                    <div class="pictos-list__picto fade-in-bottom-1">
                        <i class="icon-tablet"></i>
                        <p class="mention mention--small grey-text">
                            <?php _e('Tablet','myfood'); ?>
                        </p>
                    </div>

                    <div class="pictos-list__picto fade-in-bottom-2">
                        <i class="icon-mobile"></i>
                        <p class="mention mention--small grey-text">
                            <?php _e('Mobile','myfood'); ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="page-c__section" id="community-hub-iframe">
	    <div class="grid">
			<iframe style="width:100%;height:1100px;" src="<?php the_field('iframepath'); ?>"></iframe>
		</div>
	</section>
	
	<?php get_seo_footer(); ?>
</main>

<?php get_footer(); ?>