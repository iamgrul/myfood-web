<?php /* Template Name: Concept - Smart Greenhouse */ ?>

<?php get_header(); ?>

  <main id="template-concept-sgh" class="page-c">

    <!--    CONCEPT SGH SLIDESHOW START   -->

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
                        <?php the_field('headertitle'); ?>
                  </h1>
                </div>
              </div>

              <div class="slideshow__container__slide__content__button-container">
                <a class="cbutton cbutton--border cbutton--border--green"
                   href="<?php echo get_field('subtitle_link')['url']; ?>">
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

    <!--    CONCEPT SGH SLIDESHOW END   -->
    <!--    CONCEPT SGH INTRODUCTION START   -->
    <section class="page-c__section" id="concept-sgh-introduction">

      <div class="back-rect">
        <div class="back-rect__rect"></div>
      </div>

      <div class="grid-l">
        <div class="grid-l__demi left-part">
          <div class="title title--l title--masked">
            <h2 class="title__content title__content--prefixed">
              <span class="title__content__number">01</span>
              <?php the_field('rowsection_1_title'); ?>
            </h2>
          </div>

          <div class="common-text fade-in-bottom-2">
            <?php the_field('rowsection_1_text'); ?>
          </div>
        </div>
        <div class="grid-l__demi right-part">
          <div class="img-c crop-img mission-picture fade-in-bottom-3">
            <?php acf_img_echo(get_field('rowsection_1_image'), 'large'); ?>
          </div>
        </div>
      </div>
    </section>

    <!--    CONCEPT SGH INTRODUCTION END   -->

    <!--    CONCEPT SGH SIZES START   -->
    <section class="section page-c__section" id="concept-sgh-sizes">

      <div class="back-rect">
        <div class="back-rect__rect"></div>
      </div>

      <div class="title title--l title--center title--masked">
        <h2 class="title__content title__content--prefixed">
          <span class="title__content__number">02</span>
          <?php the_field('rowsection_2_title'); ?>
        </h2>
      </div>

      <div class="grid-l sizes-tabs">

        <div class="sizes-tabs__mobile-head">
          <div class="sizes-tabs__mobile-head__tab active">
            <h3 class="layout-card__title title--tab-l green-text">
              CITY
            </h3>
          </div>
          <div class="sizes-tabs__mobile-head__tab">
            <h3 class="layout-card__title title--tab-l green-text">
              FAMILY
            </h3>
          </div>
        </div>

        <div class="sizes-tabs__head">

          <div class="grid-l__demi grid-l__demi sizes-tabs__head__tab sizes-tabs__head__tab--active layout-card fade-in-bottom">
            <div class="layout-card__top">
              <h3 class="layout-card__title title--tab-l green-text">
                CITY
              </h3>
              <div class="points-button"><span></span></div>
            </div>

            <div class="layout-card__main layout-card__main--city">
              <div class="layout-card__main__img">
                <img src="<?php get_img('/layouts/SGH_city.svg'); ?>" alt="" class="layout-card__main__img__layout">
                <img src="<?php get_img('/layouts/SGH_city_ombre.png'); ?>" alt=""
                     class="layout-card__main__img__shadow">
                <img src="<?php get_img('/layouts/SGH_city_data.svg'); ?>" alt="" class="layout-card__main__img__data">
              </div>
              <p class="layout-card__main__content mention mention--small">
                <?php the_field('rowsection_2_left_description'); ?>
              </p>
            </div>
          </div>

          <div class="grid-l__demi sizes-tabs__head__tab layout-card fade-in-bottom-2">
            <div class="layout-card__top">
              <h3 class="layout-card__title title--tab-l green-text">
                FAMILY
              </h3>
              <div class="points-button"><span></span></div>
            </div>

            <div class="layout-card__main layout-card__main--family">
              <div class="layout-card__main__img">
                <img src="<?php get_img('/layouts/SGH_family.svg'); ?>" alt="" class="layout-card__main__img__layout">
                <img src="<?php get_img('/layouts/SGH_family_ombre.png'); ?>" alt=""
                     class="layout-card__main__img__shadow">
                <img src="<?php get_img('/layouts/SGH_family_data.svg'); ?>" alt=""
                     class="layout-card__main__img__data">
              </div>
              <p class="layout-card__main__content mention mention--small">
                <?php the_field('rowsection_2_right_description'); ?>
              </p>
            </div>
          </div>
        </div>
        <div class="grid-l sizes-tabs__content">
          <?php
          $item_lists = array('rowsection_2_cityitemlist', 'rowsection_2_familyitemlist');
          foreach ($item_lists as $item_list):
            $items = get_field($item_list); ?>
            <div class="sizes-tabs__tab" data-equal-h-col="4">
              <?php foreach ($items as $item): ?>

                <div class="grid-l__quarter sizes-tabs__content__tab detail-card mh-col">
                  <div class="detail-card__title title--tab green-text">
                    <?php echo $item['title']; ?>
                    <i class="icon-arrow"></i>
                  </div>

                  <div class="collaps-ct">
                    <i class="detail-card__picto icon-<?php echo $item['ico']; ?>"></i>
                    <div class="detail-card__desc common-text">
                      <?php echo $item['description']; ?>
                    </div>
                  </div>

                </div>

              <?php endforeach; ?>
            </div>
          <?php endforeach; ?>
        </div>
      </div>


    </section>
    <!--    CONCEPT SGH SIZES END   -->


    <!--    CONCEPT SGH FARMING START   -->

    <section class="section page-c__section" id="concept-sgh-technics">

      <div class="back-rect">
        <div class="back-rect__rect"></div>
      </div>

      <div class="title title--l title--center title--masked">
        <h2 class="title__content title__content--prefixed">
          <span class="title__content__number">03</span>
          <?php the_field('rowsection_3_title'); ?>
        </h2>
      </div>

      <div class="technics-tabs">
        <div class="grid-l" data-equal-h-col="4">
          <div class="grid-l__demi technics-tabs__tab">
            <div class="technics-tabs__title">
              <h3 class="title title--m green-text fade-in-bottom">
                <?php the_field('rowsection_3_aquaponic_title'); ?>
                <i class="technics-tabs__title__icon icon-poisson"></i>
              </h3>
            </div>

            <div class="technics-tabs__layout">
              <div class="technics-tabs__layout__motion technics-tabs__layout__motion--aquaponic"></div>
              <img src="<?php get_img('/layouts/layout_aquaponic.png'); ?>" alt="" class="technics-tabs__layout__main hidden">
              <img src="<?php get_img('/layouts/layout_aerospring_zoom.png'); ?>" alt=""
                   class="technics-tabs__layout__zoom--root  zoom-attraction">
              <img src="<?php get_img('/layouts/layout_aquaponic_zoom.png'); ?>" alt=""
                   class="technics-tabs__layout__zoom scale-in">
              <span class="technics-tabs__or"><?php _e('Or', 'myfood'); ?></span>
            </div>

            <div class="technics-tabs__details mh-col">
              <div class="technics-tabs__details__container">
                <div class="technics-tabs__details__title title--tab green-text">
                  <?php the_field('rowsection_3_aquaponic_subtitle'); ?>
                </div>
                <div class="common-text black-text">
                  <p><?php the_field('rowsection_3_aquaponic_content'); ?></p>
                </div>
              </div>
            </div>
          </div>


          <div class="grid-l__demi technics-tabs__tab">
            <div class="technics-tabs__title">
              <h3 class="title title--m red-text fade-in-bottom-1">
                <?php the_field('rowsection_3_bioponic_title'); ?>
                <i class="technics-tabs__title__icon icon-bioponie"></i>
              </h3>
            </div>

            <div class="technics-tabs__layout">
              <div class="technics-tabs__layout__motion technics-tabs__layout__motion--bioponic"></div>

              <img src="<?php get_img('/layouts/layout_bioponic.png'); ?>" alt="" class="technics-tabs__layout__main hidden">
              <img src="<?php get_img('/layouts/layout_aerospring_zoom.png'); ?>" alt=""
                   class="technics-tabs__layout__zoom--root  zoom-attraction">
              <img src="<?php get_img('/layouts/layout_bioponic_zoom.png'); ?>" alt=""
                   class="technics-tabs__layout__zoom scale-in-1">
            </div>

            <div class="technics-tabs__details mh-col">
              <div class="technics-tabs__details__container">
                <div class="technics-tabs__details__title title--tab red-text">
                  <?php the_field('rowsection_3_bioponic_subtitle'); ?>
                </div>
                <div class="common-text black-text">
                  <p><?php the_field('rowsection_3_bioponic_content'); ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </section>

    <!--    CONCEPT SGH SIZES END   -->

    <!--    CONCEPT SGH CUSTOM START   -->

    <section class="page-c__section" id="concept-sgh-custom">

      <div class="back-rect">
        <div class="back-rect__rect"></div>
      </div>

      <div class="grid-l top-part">
        <div class="grid-l__large">
          <div class="title title--l title--masked">
            <h2 class="title__content title__content--prefixed">
              <span class="title__content__number">04</span>
              <?php the_field('rowsection_4_title'); ?>
            </h2>
          </div>
        </div>
        <div class="grid-l__medium">
          <h3 class="line-mention">
            <p class="line-mention__content line-mention__content--black">
              <?php the_field('rowsection_4_subtitle'); ?>
            </p>
          </h3>
        </div>
      </div>

      <?php
      $modules = get_field('rowsection_4_modules');
      get_customizable_tabs($modules); ?>

    </section>
    <!--    CONCEPT SGH SIZES END   -->


    <!--    CONCEPT SGH SEEDS START   -->

    <section class="page-c__section" id="concept-sgh-seeds">
      <div class="title title--l title--masked">
        <h2 class="title__content title__content--prefixed">
          <span class="title__content__number">05</span>
          <?php the_field('rowsection_5_title'); ?>
        </h2>
      </div>

      <?php get_seeds_slideshow(); ?>

    </section>

    <!--    CONCEPT SGH SEEDS END   -->


    <!--    CONCEPT SGH PUSH START   -->
    <section class="page-c__section" id="concept-sgh-push">
      <div class="large-push large-push--light">
        <div class="large-push__background img-c crop-img h-back h-back--full">
          <?php acf_img_echo(get_field('rowsection_5_image'), 'large'); ?>
        </div>

        <div class="large-push__content h-front">
          <div class="h-vertical-mid h-text-center">
            <a class="cbutton cbutton--border cbutton--border--green" target="_blank"
               href="<?php the_field('rowsection_5_buttonlink'); ?>">
              <p>
                <?php _e('Download our Cultivation Calendar', 'myfood'); ?>
              </p>
            </a>
          </div>
        </div>
      </div>
    </section>
    <!--    CONCEPT SGH PUSH END   -->


    <!--    CONCEPT SGH HUB START   -->
    <section class="page-c__section" id="concept-sgh-hub">

      <div class="back-rect">
        <div class="back-rect__rect"></div>
      </div>

      <div class="title title--l title--center title--masked">
        <h2 class="title__content title__content--prefixed">
          <span class="title__content__number">06</span>
          <?php the_field('rowsection_6_myfoodhub'); ?>
        </h2>
      </div>

      <div class="grid-l">
        <div class="grid-l__demi img-part">
          <div class="crop-img img-c  fade-in-bottom">
            <?php acf_img_echo(get_field('rowsection_6_image'), 'large'); ?>
          </div>
        </div>

        <div class="grid-l__demi">
          <div class="content-part fade-in-bottom">
            <h3 class="title title--m green-text">
              <?php the_field('rowsection_6_subtitle'); ?>
            </h3>

            <div class="common-text black-text">
              <?php the_field('rowsection_6_text'); ?>
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
    <!--    CONCEPT SGH HUB END   -->

    <!--    CONCEPT SGH TUTORIAL START   -->
    <section class="page-c__section" id="concept-sgh-tutorial">

      <div class="video-container video-container--maxi">
        <div class="video-container__back img-c crop-img h-back h-back--full">
          <?php acf_img_echo(get_field('rowsection_7_installationtimelapse_image'), 'large'); ?>
        </div>

        <div class="video-container__front">
          <div class="video-container__front__title title title--l text-right title--masked">
            <h2 class="title__content title__content--prefixed beige-text">
              <span class="title__content__number beige-text">06</span>
              <?php the_field('rowsection_7_installationtimelapse'); ?>
            </h2>
          </div>

          <div class="video-container__front__button text-right popin-content-container">
            <div class="cbutton cbutton--play cbutton--border--green fade-in-bottom" data-open-popin="popin-iframe-c">
              <p>
                <?php _e('Play tutorial', 'myfood'); ?>
              </p>
              <i class="icon-arrow cbutton--play__icon"></i>
            </div>

            <div class="popin-iframe-c full-screen iframe-c">
              <div class="cbutton--close-popin"><i class="icon-cross cbutton--close__icon"></i></div>

              <div class="video-player__video-c">
                <iframe width="560" height="315"
                        data-src="https://www.youtube.com/embed/<?php the_field('rowsection_7_videourl'); ?>"
                        frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--    CONCEPT SGH TUTORIAL END   -->

    <section class="page-c__section page-c__section--bottom" id="concept-sgh-bottom">
      <div class="back-rect">
        <div class="back-rect__rect"></div>
      </div>

      <div class="grid-l page-c__section--bottom__content">
        <div class="grid-l__demi">
          <div class="push-card border-box fade-in-bottom">
            <div class="push-card__background img-c crop-img">
              <?php acf_img_echo(get_field('rowsection_8_left_image'), 'large'); ?>
            </div>
            <div class="push-card__desc">
              <i class="push-card__desc__icon icon-contact green-text"></i>
              <p class="push-card__desc__title beige-text">
                <?php the_field('rowsection_8_left_title'); ?>
              </p>
            </div>
            <div class="push-card__button card__button">
              <a class="card__button__link" href="<?php echo get_field('rowsection_8_left_link')['url']; ?>">
                <span class="beige-text"><?php _e('Learn more', 'myfood'); ?></span>
                <div class="points-button points-button--beige"><span></span></div>
              </a>
            </div>
          </div>
        </div>

        <div class="grid-l__demi">
          <div class="push-card border-box push-card--shop fade-in-bottom-1">
            <div class="push-card__desc">
              <i class="push-card__desc__icon icon-bag red-text dark-circle"></i>
              <p class="push-card__desc__title">
                <span class="red-text"><?php _e('Book', 'myfood'); ?></span>
                <?php the_field('rowsection_8_right_title'); ?>
              </p>
            </div>
            <div class="push-card__button card__button push-card__button--black">
              <a class="push-card__button__link card__button__link"
                 href="<?php echo get_field('rowsection_8_right_link')['url']; ?>">
                <span><?php _e('Book', 'myfood'); ?></span>
                <div class="points-button"><span></span></div>
              </a>
            </div>
          </div>
        </div>

      </div>
    </section>

	<?php get_seo_footer(); ?>

  </main>


<?php get_footer(); ?>