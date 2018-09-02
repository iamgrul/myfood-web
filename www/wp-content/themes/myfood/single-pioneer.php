	<?php /* Template Name: Single - Pioneer */ ?>

<?php get_header(); ?>


<main id="single-pioneer" class="page-c">

    <div class="points-line"></div>

    <section class="page-c__section" id="single-pioneer-introduction">

        <div class="grid-l pioneer">
            <div class="grid-l__demi pioneer__right">

                <div class="pioneer__portrait">

                    <div class="pioneer__stats pioneer-infos-mobile">
                        <div class="card__infos__number h-rounded">
                            <span>#<?php the_field('rowsection_1_number'); ?></span>
                        </div>
                        <div class="card__infos__date h-rounded">
                            <small><?php _e('Since','myfood'); ?></small>
                            <span><?php the_field('rowsection_1_entrydate'); ?></span>
                        </div>
                        <div class="pioneer__title title title--l">
                            <h1 class="title__content"><?php _e('Meet','myfood'); ?> <span><?php the_field('page_title'); ?></span></h1>
                        </div>
                    </div>

                    <div class="pioneer__portrait__avatar h-rounded crop-img img-c">
                        <?php acf_img_echo(get_field('rowsection_1_picture'), 'large'); ?>
                    </div>

                    <address class="pioneer__portrait__mention mention--l">
                        <i class="icon-pin"></i>
                        <span><?php the_field('rowsection_1_localization'); ?></span>
                    </address>
                    <p class="pioneer__portrait__mention mention--l">
                        <i class="icon-work"></i>
                        <span><?php the_field('title'); ?></span>
                    </p>
                    <a class="cbutton cbutton--border cbutton--border--green" href="<?php the_field('rowsection_3_visiturl'); ?>" target="_blank" rel="noopener">
                        <p class="black-text">
                            <?php _e('Schedule a visit','myfood'); ?>
                        </p>
                    </a>
                </div>
            </div>
            <div class="grid-l__demi pioneer__left">
                <div class="pioneer__stats">
                    <div class="card__infos__number h-rounded">
                        <span>#<?php the_field('rowsection_1_number'); ?></span>
                    </div>
                    <div class="card__infos__date h-rounded">
                        <small><?php _e('Since','myfood'); ?></small>
                        <span><?php the_field('rowsection_1_entrydate'); ?></span>
                    </div>
                </div>

                <div class="pioneer__content">
                    <div class="pioneer__title title title--l">
                        <h1 class="title__content">
                            <?php _e('Meet','myfood'); ?> <span><?php the_field('page_title'); ?></span>
                        </h1>
                    </div>

                    <div class="pioneer__quote">
                        <i class="icon-quote red-text"></i>
                        <h2 class="title title--m green-text">
                            <?php the_field('rowsection_1_catchphrase'); ?>
                        </h2>
                    </div>

                    <div class="common-text">
                        <?php the_field('rowsection_1_largetext'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="page-c__section" id="single-pioneer-interview">

        <div class="back-rect">
            <div class="back-rect__rect"></div>
        </div>

        <div class="pioneer__title title title--l title--center title--masked">
            <h2 class="title__content black-text">
                <?php _e('Interview','myfood'); ?>
            </h2>
        </div>

        <div class="video-player popin-content-container fade-in-bottom">
            <div class="video-player__cover img-c crop-img" data-open-popin="popin-iframe-c">
                <div class="cbutton cbutton--play cbutton--border--green video-player__cover__button">
                    <i class="icon-arrow cbutton--play__icon cbutton--play__icon--solo"></i>
                </div>
                <?php acf_img_echo(get_field('rowsection_1_cover'), 'large'); ?>
            </div>
            <div class="video-player__video-c">
                <div class="popin-iframe-c full-screen">
                    <div class="cbutton--close-popin"><i class="icon-cross cbutton--close__icon"></i></div>

                    <div class="video-player__video-c">
                        <iframe width="560" height="315" src="<?php the_field('rowsection_2_interviewurl'); ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section class="page-c__section" id="single-pioneer-installation">
        <div class="back-rect">
            <div class="back-rect__rect"></div>
        </div>

        <div class="pioneer__title title title--l title--center title--masked">
            <h2 class="title__content black-text">
                <?php _e('Watch the installation step by step','myfood'); ?>
            </h2>
        </div>

        <div class="fade-in-bottom">
          <?php get_single_slideshow(get_field('rowsection_3_images')); ?>
        </div>

        <div class="button-container fade-in-bottom">
            <a class="cbutton cbutton--border cbutton--border--green cbutton--dark" href="<?php the_field('rowsection_3_visiturl'); ?>" target="_blank" rel="noopener">
                <p class="black-text">
                    <?php _e('Schedule a Visit','myfood'); ?>
                </p>
            </a>
        </div>
    </section>

    <section class="page-c__section" id="single-pioneer-production">

        <div class="back-rect">
            <div class="back-rect__rect"></div>
        </div>

        <div class="title title--l title--center title--masked">
            <h2 class="title__content black-text">
                <?php _e('Enjoy the Homemade Production','myfood'); ?>
            </h2>
        </div>

        <?php get_large_slideshow(get_field('rowsection_4_productionimage')); ?>
    </section>

    <section class="page-c__section" id="single-pioneer-others">
        <div class="back-rect">
            <div class="back-rect__rect"></div>
        </div>

        <div class="title title--l title--center title--masked">
            <h2 class="title__content black-text">
                <?php _e('Meet other Pioneer Citizens','myfood'); ?>
            </h2>
        </div>		
		
        <div class="pioneer-list">
            <div class="grid-l">
               <?php
                $otherpioneers = get_field('rowsection_5_otherpioneers');
                foreach($otherpioneers as $idx=>$pioneer): ?>
                    <div class="grid-l__demi <?php echo "fade-in-bottom-$idx"; ?>">
                        <?php get_pioneer_card($pioneer); ?>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>

    </section>

</main>

<?php get_footer(); ?>