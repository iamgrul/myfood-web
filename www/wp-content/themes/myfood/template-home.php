<?php /* Template Name: Home */ ?>

<?php get_header(); ?>

<main id="template-home" class="page-c">

<!--    HOME SLIDESHOW START   -->

    <div class="points-line"></div>

    <section class="page-c__section">
        <div class="slideshow slideshow--cover">
            <div class="slideshow__sidebar">

                <h2 class="slideshow__sidebar__title">
                    <?php the_field('lefttitle'); ?>
                </h2>

                <i class="slideshow__sidebar__icon icon-scroll"></i>
            </div>

            <div class="slideshow__container">
                <?php

                $header_gallery = get_field('headergallery');

                foreach($header_gallery as $slide): ?>
                    <div class="slideshow__container__slide slide">

                        <div class="slideshow__container__slide__image img-c crop-img h-back h-back--full">
                            <div class="mask mask"></div>
                            <?php acf_img_echo($slide['image'], 'large'); ?>
                        </div>

                        <div class="slideshow__container__slide__content">

                            <div class="slideshow__container__slide__content__title title title--xxl title--beige">
                                <div class="slideshow__container__slide__content__title__content">
                                    <div class="title-mask mask mask--green"></div>

                                    <h2 class="title__content">
                                        <?php echo $slide['title']; ?>
                                    </h2>
                                </div>
                            </div>

                            <div class="slideshow__container__slide__content__subtitle-container">
                                <h3 class="line-mention">
                                    <p class="line-mention__content">
                                        <?php echo $slide['subtitle']; ?>
                                    </p>
                                </h3>
                            </div>

                            <div class="slideshow__container__slide__content__button-container">
                                <a class="cbutton cbutton--border cbutton--border--green" href="<?php echo $slide['link']['url']; ?>">
                                    <p>
                                        <?php echo $slide['linktext']; ?>
                                    </p>
                                </a>
                            </div>
                        </div>

                    </div>
                <?php endforeach; ?>
            </div>

            <div class="slideshow__navigation">

                <div class="slideshow__navigation__container">
                    <div class="slideshow__navigation__container__time-strip time-cursor"></div>

                    <div class="slideshow__navigation__container__prev">
                        <div class="arrow-button arrow-button--prev">
                            <i class="arrow-button__icon icon-arrow"></i>
                            <small><?php _e('Prev','myfood'); ?></small>
                            <div class="points-button"><span></span></div>
                        </div>
                    </div>

                    <div class="slideshow__navigation__container__bullets bullets-nav">
                        <?php foreach($header_gallery as $idx=>$slide): ?>
                            <div class="bullets-nav__bullet <?php if($idx==1) echo 'bullets-nav__bullet--active'; ?> ">
                                <span><?php echo ($idx+1); ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="slideshow__navigation__container__next">
                        <div class="arrow-button arrow-button--next">
                            <div class="points-button"><span></span></div>
                            <small><?php _e('Next','myfood'); ?></small>
                            <i class="arrow-button__icon icon-arrow"></i>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>

<!--    HOME SLIDESHOW END   -->

<!--    HOME PRODUCTS START   -->

    <section class="page-c__section" id="home-products">

        <div class="title title--l title--masked">
            <h2 class="title__content title__content--prefixed">
                <span class="title__content__number">01</span>
                <?php the_field('rowsection_1_title'); ?>
            </h2>
        </div>

        <?php get_products_tabs(get_field('rowsection_1_products')); ?>

    </section>

<!--    HOME PRODUCTS END   -->

<!--    HOME PIONNER START   -->

    <section class="page-c__section" id="home-pioneer">


        <div class="back-rect">
            <div class="back-rect__rect"></div>
        </div>

        <div class="title title--l grid-l title--masked">

            <div class="title__container-anim grid-l__large">
                <h2 class="title__content title__content--prefixed">
                    <span class="title__content__number">02</span>
                    <?php the_field('rowsection_2_title'); ?>
                </h2>
            </div>

            <div class="grid-l__medium">
                <h3 class="line-mention">
                    <p class="line-mention__content line-mention__content--black">
                        <?php the_field('rowsection_2_subtitle'); ?>
                    </p>
                </h3>
            </div>
        </div>

        <?php
            $pioneers = get_field('rowsection_2_pioneers');
            if($pioneers) get_cards_slideshow($pioneers);
        ?>

    </section>

<!--    HOME PIONNER END   -->

<!--    HOME COMMUNITY START   -->
    <section class="page-c__section" id="home-community">
        <div class="large-push">
            <div class="large-push__background img-c crop-img h-back h-back--full">
                <?php acf_img_echo(get_field('rowsection_2_image'), 'large'); ?>
            </div>

            <div class="large-push__content h-front">
                <div class="h-vertical-mid">
                    <div class="title title--m">
                        <h2 class="title__content">
                            <?php the_field('rowsection_2_subtext'); ?>
                        </h2>
                    </div>

                    <a class="cbutton cbutton--border cbutton--border--green float-right" href="<?php echo get_field('rowsection_2_subtext_link')['url']; ?>">
                        <p>
                            <?php _e('Discover','myfood'); ?>
                        </p>
                    </a>
                </div>
            </div>
        </div>
    </section>
<!--    HOME COMMUNITY END   -->

<!--    HOME MISSION START   -->
    <section class="page-c__section" id="home-mission">

        <div class="back-rect">
            <div class="back-rect__rect"></div>
        </div>

        <div class="grid-l top-part">
            <div class="grid-l__large">
                <div class="title title--l title--masked">
                    <h2 class="title__content title__content--prefixed">
                        <span class="title__content__number">03</span><?php the_field('rowsection_3_title'); ?>
                    </h2>
                </div>
            </div>
            <?php if(get_field('rowsection_3_subtitle')): ?>
            <div class="grid-l__medium">
                <h3 class="line-mention">
                    <p class="line-mention__content line-mention__content--black">
                        <?php the_field('rowsection_3_subtitle'); ?>
                    </p>
                </h3>
            </div>
            <?php endif; ?>
        </div>

        <div class="grid-l">
            <div class="grid-l__large">
                <ul class="points-list">
                    <?php foreach(get_field('rowsection_3_items') as $idx=>$item): ?>
                    <li class="points-list__li">
                        <div class="points-list__li__number bullet-point">
                            <span><?php echo ($idx+1); ?></span>
                        </div>
                        <div class="points-list__li__content">
                            <div class="points-list__li__content__title title title-xs">
                                <h4 class="title__content green-text">
                                    <?php echo $item['title']; ?>
                                </h4>
                            </div>

                            <div class="points-list__li__content__desc">
                                <p><?php echo $item['description']; ?></p>
                            </div>
                        </div>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>


            <div class="grid-l__medium img-part">
                <div class="img-c crop-img mission-picture">
                    <?php acf_img_echo(get_field('rowsection_3_image'), 'large'); ?>
                </div>
            </div>
        </div>
    </section>
<!--    HOME MISSION END     -->

<!--    HOME LIFESTYLE START     -->
    <section class="page-c__section" id="home-lifestyle">
        <div class="title title--l title--masked">
            <h2 class="title__content title__content--prefixed">
                <span class="title__content__number">04</span>
                <?php the_field('rowsection_4_title'); ?>
            </h2>
        </div>

       <?php get_instagram_token_slideshow(); ?>

    </section>
<!--    HOME LIFESTYLE END     -->

<!--    HOME BLOG START     -->
    <section class="page-c__section" id="home-blog">
        <div class="back-rect">
            <div class="back-rect__rect"></div>
            <div class="back-rect__rect back-rect__rect--bottom"></div>
        </div>

        <div class="title title--l title--center title--masked">
            <h2 class="title__content title__content--prefixed">
                <span class="title__content__number">05</span>
                <?php the_field('rowsection_5_title'); ?>
            </h2>
        </div>
		
		<?php 
		
		$argsSticky = array(
					'post_type' => 'post',
                    'post_status' => 'publish',
                    'posts_per_page' => 1,
					'offset' => 0,
                    'orderby' => 'most_recent',
                    );
					
		$querySticky = new WP_Query($argsSticky);
		
		if ( $querySticky->have_posts() ) :
			while ( $querySticky->have_posts() ) : $querySticky->the_post();
				get_sticky_news_card();	
			endwhile;
		endif;
								
		?>

        <div class="grid-l-news news-dbl-cols">
            <?php
            $args = array(
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'posts_per_page' => 2,
                        'offset' => 1,
                        'orderby' => 'most_recent',
                        );

            $query = new WP_Query($args);

            if ( $query->have_posts() ) :
                while ( $query->have_posts() ) : $query->the_post();
                    get_news_card();
                endwhile;
            endif;

            wp_reset_query();
            ?>
        </div>

        <div class="button-container">
            <a class="cbutton cbutton--border cbutton--border--green cbutton--dark" href="<?php the_field('blog_page', 'option'); ?>">
                <p class="black-text">
                    <?php _e('All articles','myfood'); ?>
                </p>
            </a>
        </div>

    </section>
<!--    HOME BLOG END     -->

<!--    HOME NETWORK START     -->
    <section class="page-c__section" id="home-network">

        <div class="back-rect">
            <div class="back-rect__rect"></div>
        </div>

        <div class="title title--l title--center title--masked">
            <h2 class="title__content title__content--prefixed">
                <span class="title__content__number">06</span>
                <?php the_field('rowsection_6_title'); ?>
            </h2>
        </div>

        <div class="grid-l-stats" data-equal-h-col>
            <div class="stat-card border-box mh-col">
                <p class="stat-card__number">
                    <span id="stat-value-production-unit-number"></span>
                </p>
                <div class="stat-card__desc">
                    <i class="stat-card__desc__icon icon-greenhouse"></i>
                    <p class="stat-card__desc__title">
                        <?php the_field('rowsection6_totalsmartgreenhouse'); ?>
                    </p>
                </div>
            </div>

            <div class="stat-card border-box mh-col">
                <p class="stat-card__number">
                    <span id="stat-value-total-monthly-production"></span> <sup>kg</sup>
                </p>
                <div class="stat-card__desc">
                    <i class="stat-card__desc__icon icon-heart"></i>
                    <p class="stat-card__desc__title">
                        <?php the_field('rowsection6_totalestimatedprod'); ?>
                    </p>
                </div>
            </div>

            <div class="stat-card border-box mh-col">
                <p class="stat-card__number">
                    <span id="stat-value-total-spared-co2"></span> <sup>kg</sup>
                </p>
                <div class="stat-card__desc">
                    <i class="stat-card__desc__icon icon-cloud"></i>
                    <p class="stat-card__desc__title">
                        <?php the_field('rowsection6_totalsparedco2'); ?>
                    </p>
                </div>
            </div>
        </div>
    </section>

	<script type="text/javascript">

		window.onload = function onLoad(e){

				$("#stat-value-production-unit-number");
				$("#stat-value-total-monthly-production");
				$("#stat-value-total-spared-co2");
					
				$.ajax({type:'GET',                                                                 
								url: 'https://hub.myfood.eu/opendata/productionunits/stats',
								dataType:'jsonp',
								success: function(data) { 
										$("#stat-value-production-unit-number").text(data.productionUnitNumber);
										$("#stat-value-total-monthly-production").text(data.totalMonthlyProduction);
										$("#stat-value-total-spared-co2").text(data.totalMonthlySparedCO2);
								},
								error: function(error) { console.log(error); },
								jsonpCallback:'callbackName'             
				});

				};
	</script>

    <!--    HOME NETWORK END     -->

    <?php get_seo_footer(); ?>

</main>


<?php get_footer(); ?>