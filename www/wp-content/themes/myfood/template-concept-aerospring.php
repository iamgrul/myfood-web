<?php /* Template Name: Concept - Aerospring */ ?>

<?php get_header(); ?>
  <main id="template-concept-aero" class="page-c">


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

              <div class="slideshow__container__slide__content__button-container">
                <a class="cbutton cbutton--border cbutton--border--green" href="<?php echo get_field('subtitle_link')['url']; ?>">
                  <p>
                    <?php the_field('subtitle'); ?>
                  </p>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="page-c__section page-c__section--dbl-layout" id="aero-introduction">

      <div class="title title--l title--masked">
        <h2 class="title__content title__content--prefixed">
          <span class="title__content__number">01</span>
          <?php the_field('rowsection_1_title'); ?>
        </h2>
      </div>

      <div class="grid-l">
        <div class="grid-l__demi left-part">
          <div class="common-text fade-in-bottom">
            <?php the_field('rowsection_1_text'); ?>
          </div>

          <ul class="points-list points-list--light border-box card--points-list">
            <li class="points-list__li">
              <div class="points-list__li__number bullet-point">
                <span>1</span>
              </div>
              <div class="points-list__li__content">
                <h4 class="title--tab-m">
                  <?php the_field('rowsection_1_detail_item_1'); ?>
                </h4>
                <p class="mention">
                  <?php the_field('rowsection_1_detail_sub_item_1'); ?>
                </p>
              </div>
            </li>
            <li class="points-list__li">
              <div class="points-list__li__number bullet-point">
                <span>2</span>
              </div>
              <div class="points-list__li__content">
                <h4 class="title--tab-m">
                  <?php the_field('rowsection_1_detail_item_2'); ?>
                </h4>
                <p class="mention">
                  <?php the_field('rowsection_1_detail_sub_item_2'); ?>
                </p>
              </div>
            </li>
            <li class="points-list__li">
              <div class="points-list__li__number bullet-point">
                <span>3</span>
              </div>
              <div class="points-list__li__content">
                <h4 class="title--tab-m">
                  <?php the_field('rowsection_1_detail_item_3'); ?>
                </h4>
                <p class="mention">
                  <?php the_field('rowsection_1_detail_sub_item_3'); ?>
                </p>
              </div>
            </li>
            <li class="points-list__li">
              <div class="points-list__li__number bullet-point">
                <span>4</span>
              </div>
              <div class="points-list__li__content">
                <h4 class="title--tab-m">
                  <?php the_field('rowsection_1_detail_item_4'); ?>
                </h4>
                <p class="mention">
                  <?php the_field('rowsection_1_detail_sub_item_4'); ?>
                </p>
              </div>
            </li>
          </ul>

        </div>

        <div class="grid-l__demi right-part">

          <div class="back-rect"><div class="back-rect__rect"></div></div>

          <div class="layout">
            <div class="layout__points">
              <div class="layout__point bullet-point"><span>1</span></div>
              <div class="layout__point bullet-point"><span>2</span></div>
              <div class="layout__point bullet-point"><span>3</span></div>
              <div class="layout__point bullet-point"><span>4</span></div>
            </div>

            <div class="layout__motion layout__motion--aerospring"></div>

            <img class="layout__img fade-in-bottom-2 hidden" src="<?php get_img('layouts/layout_aerospring.png'); ?>" alt="">
            <img class="layout__zoom zoom-attraction" src="<?php get_img('layouts/layout_aerospring_zoom.png'); ?>" alt="">
            <?php //acf_img_echo(get_field('rowsection_1_image'), 'large'); ?>
          </div>

        </div>

      </div>
    </section>

    <section class="page-c__section" id="aero-prerequisites">

      <div class="title title--l title--center title--masked">
        <h2 class="title__content title__content--prefixed">
          <span class="title__content__number">02</span>
          <?php the_field('rowsection_2_title'); ?>
        </h2>
      </div>

      <div class="sizes-tabs">
        <div class="grid-l sizes-tabs__content sizes-tabs__content--rounded"  data-equal-h-col="4">
          <?php

          $rowsection_2_items = get_field('rowsection_2_items');

          foreach($rowsection_2_items as $idx=>$item): ?>
            <div class="grid-l__quarter sizes-tabs__content__tab detail-card mh-col <?php echo "fade-in-bottom-$idx"; ?>">
              <div class="detail-card__title title--tab green-text">
                <?php echo $item['title']; ?>
              </div>

              <i class="detail-card__picto icon-<?php echo $item['ico']; ?>"></i>

              <div class="detail-card__desc common-text">
                <?php echo $item['description']; ?>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

    </section>

    <section class="page-c__section" id="aero-seeds">
      <div class="title title--l  title--masked">
        <h2 class="title__content title__content--prefixed">
          <span class="title__content__number">03</span>
          <?php the_field('rowsection_3_title'); ?>
        </h2>
      </div>

      <?php
      $rowsection_3_vegetablelist = get_field('rowsection_3_vegetablelist');
      get_seeds_slideshow($rowsection_3_vegetablelist, false); ?>

    </section>

      <section class="page-c__section" id="aero-push">
          <div class="back-rect"><div class="back-rect__rect"></div></div>
          <div class="large-push large-push--light">

              <div class="large-push__background img-c crop-img h-back h-back--full">
            <?php acf_img_echo(get_field('rowsection_4_image'), 'medium'); ?>
        </div>
              <a class="" target="_blank" href="<?php the_field('rowsection_4_buttonlink'); ?>">

                  <div class="large-push__content h-front">

                      <div class="h-vertical-mid h-text-center">
                          <div class="cbutton cbutton--border cbutton--border--green" target="_blank" href="<?php the_field('rowsection_4_buttonlink'); ?>">
                              <p>
                                  <?php _e('Download our Cultivation Calendar','myfood'); ?>
                              </p>
                          </div>
                      </div>

                  </div>
              </a>
          </div>

      </section>
    <section class="page-c__section" id="aero-slideshow">

      <div class="back-rect"><div class="back-rect__rect"></div></div>

      <div class="title title--l title--masked">
        <h2 class="title__content title__content--prefixed">
          <span class="title__content__number">04</span>
          <?php the_field('rowsection_5_title'); ?>
        </h2>
      </div>
      <?php get_medias_slideshow(get_field('gallery')); ?>

    </section>

    <section class="page-c__section" id="aero-tutorial">

      <div class="back-rect"><div class="back-rect__rect"></div></div>

      <div class="video-container video-container--maxi">
        <div class="video-container__back img-c crop-img h-back h-back--full">
          <?php acf_img_echo(get_field('rowsection_6_image'), 'large'); ?>
        </div>

        <div class="video-container__front">
          <div class="video-container__front__title title title--l text-right title--masked">
            <h2 class="title__content title__content--prefixed beige-text">
              <span class="title__content__number beige-text">05</span>
              <?php the_field('rowsection_6_installationtutorial'); ?>
            </h2>
          </div>

          <div class="video-container__front__button text-right popin-content-container fade-in-bottom">
            <div class="cbutton cbutton--play cbutton--border--green"   data-open-popin="popin-iframe-c">
              <p>
                <?php _e('Play Tutorial','myfood'); ?>
              </p>
              <i class="icon-arrow cbutton--play__icon"></i>
            </div>

            <div class="popin-iframe-c full-screen iframe-c">

              <div class="cbutton--close-popin"><i class="icon-cross cbutton--close__icon"></i></div>

              <div class="video-player__video-c">
                <iframe width="560" height="315" data-src="<?php the_field('rowsection_6_videourl'); ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

      <section class="page-c__section page-c__section--bottom" id="aero-bottom">

          <div class="page-c__section--bottom__content">
              <a href="<?php echo get_field('rowsection_7_link')['url']; ?>">
                  <div class="push-card border-box push-card--large push-card--shop fade-in-bottom">
                      <div class="push-card__desc">
                          <i class="push-card__desc__icon icon-bag red-text dark-circle"></i>
                          <p class="push-card__desc__title">
                              <span class="red-text"><?php _e('Shop','myfood'); ?></span>
                              <span><?php the_field('rowsection_7_subtitle'); ?></span>
                          </p>
                      </div>

                      <div class="push-card__button card__button push-card__button--black fade-in-bottom-1">
                          <div class="push-card__button__link card__button__link">
                              <span><?php _e('Buy','myfood'); ?></span>
                              <div class="points-button"><span></span></div>
                          </div>
                      </div>
                  </div>
              </a>
          </div>
      </section>
	<?php get_seo_footer(); ?>
  </main>
<?php get_footer(); ?>