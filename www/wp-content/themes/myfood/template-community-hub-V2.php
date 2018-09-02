<?php /* Template Name: Community - HUB V2 */ ?>

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


        <!--    COMMUNITY INTRODUCTION START   -->
        <section class="page-c__section" id="community-hub-introduction">

            <div class="community-hub-introduction__title title title--l title--masked">
                <h2 class="title__content title__content--prefixed">
                    <span class="title__content__number">01</span>
                    <?php the_field('rowsection_1_title'); ?>
                </h2>
            </div>

            <div class="community-hub-introduction__text">

                <div class="common-text fade-in-bottom-2">
                    <?php the_field('rowsection_1_content'); ?>
                </div>

            </div>


            <div id="community-hub-blog">

                <div class="back-rect">
                    <div class="back-rect__rect"></div>
                </div>

                <!--    COMMUNITY BLOG START   -->
                <div class="grid-l mansory-container">
					
                    <?php

                    $rowsection_1_items = get_field('rowsection_1_items');

                    foreach ($rowsection_1_items as $idx => $item): ?>
					<?php $classeSide = $idx % 2 === 0 ? 'grid-l__demi left-part': 'grid-l__demi right-part' ?>
						
						<div class="community-post <?php echo $classeSide?> mansory-item fade-in-bottom-<?php echo $i + 1?>">

                            <div class="community-post__infos">

                                <div class="community-post__avatar inl no-width-100-mobile">
                                    <i class="icon-profile"></i>
                                </div>

                                <div class="community-post__user inl">
                                    <p class="name text--card-sm inl"><?php echo $item['name']; ?></p>
                                    <p class="section text--card-sm inl"><?php echo $item['topics']; ?></p>
                                </div>

                                <p class="community-post__hour inl common-text"><?php echo $item['hour']; ?></p>

                            </div>

                            <div class="community-post__contents">

                                <div class="community-post__description-container">

                                    <div class="common-text">
                                        <?php echo $item['content']; ?>
                                    </div>
                                </div>

                                <div class="community-post__image-container">

                                    <div class="crop-img community-post__image">
                                        <?php acf_img_echo($item['image'], 'large'); ?>
                                    </div>

                                    <div class="community-post__infos-img">
                                        <p class="date text--card-sm"><?php echo $item['date']; ?></p>
                                        <p class="nbPhotos"><?php echo $item['pictures']; ?></p>
                                    </div>

                                </div>

                            </div>

                            <div class="community-post__comments">

                                <div class="community-post__myfood-logo inl no-width-100-mobile">
                                    <img src="<?php get_img('misc/logo_myfood_small.svg')?>" alt="<?php _e("Logo MyFood", "myfood")?>">
                                </div>

                                <div class="community-post__fake-input inl ">
                                    <p class="text--card-sm"><?php _e("Add a comment", "myfood")?></p>
                                </div>

                                <div class="community-post__numbers inl">
                                    <p class="green inl inl-mobile text--card-sm no-width-100-mobile">+1</p>
                                    <p class="inl inl-mobile text--card-sm no-width-100-mobile">1</p>
                                </div>

                            </div>

                        </div>
						
                    <?php endforeach; ?>

                </div>
                <!--    COMMUNITY END START   -->

            </div>

        </section>
        <!--    COMMUNITY INTRODUCTION END   -->

        <!--    COMMUNITY WEBINAR START   -->
        <section class="page-c__section" id="community-hub-webinar">

          <div class="back-rect">
            <div class="back-rect__rect"></div>
          </div>

          <div class="grid-l">
            <div class="grid-l__demi left-part">
              <div class="title title--l title--masked">
                <h2 class="title__content title__content--prefixed">
                  <span class="title__content__number">02</span>
					<?php the_field('rowsection_2_title'); ?>
                </h2>
              </div>

              <div class="common-text fade-in-bottom-2">
                  <?php the_field('rowsection_2_content'); ?>
              </div>
            </div>


            <div class="grid-l__demi right-part">
              <div class="img-c crop-img mission-picture fade-in-bottom-3">
                <?php acf_img_echo(get_field('rowsection_2_image'), 'large'); ?>
              </div>
            </div>
          </div>
        </section>
        <!--    COMMUNITY WEBINAR END   -->
		
		  <!--    COMMUNITY VISUALIZE START   -->
        <section class="page-c__section" id="community-hub-see">

            <div class="back-rect">
                <div class="back-rect__rect"></div>
            </div>

            <div class="title title--l title--masked">
                <h2 class="title__content title__content--prefixed">
                    <span class="title__content__number">03</span>
                    <?php the_field('rowsection_3_title'); ?>
                </h2>
            </div>

            <div class="grid-l">
                <div class="grid-l__demi left-part fade-in-bottom">
                    <div class="common-text">
                        <h3><?php the_field('rowsection_3_subtitle'); ?></h3>
                        <p><?php the_field('rowsection_3_content'); ?></p>
                    </div>
                </div>
                <div class="grid-l__demi right-part">
                    <div class="pictos-list">
                        <div class="pictos-list__picto fade-in-bottom">
                            <i class="icon-desk"></i>
                            <p class="mention mention--small grey-text">
                                <?php _e('Desktop', 'myfood'); ?>
                            </p>
                        </div>

                        <div class="pictos-list__picto fade-in-bottom-1">
                            <i class="icon-tablet"></i>
                            <p class="mention mention--small grey-text">
                                <?php _e('Tablet', 'myfood'); ?>
                            </p>
                        </div>

                        <div class="pictos-list__picto fade-in-bottom-2">
                            <i class="icon-mobile"></i>
                            <p class="mention mention--small grey-text">
                                <?php _e('Mobile', 'myfood'); ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--    COMMUNITY VISUALIZE END   -->


        <!--    COMMUNITY IFRAME START   -->
        <section class="page-c__section" id="community-hub-iframe">

            <div class="back-rect">
                <div class="back-rect__rect"></div>
            </div>

            <div class="grid">
                <iframe style="width:100%;height:1100px;" src="<?php the_field('iframepath'); ?>"></iframe>
            </div>
        </section>
        <!--    COMMUNITY IFRAME END   -->

        <?php get_seo_footer(); ?>
    </main>

<?php get_footer(); ?>