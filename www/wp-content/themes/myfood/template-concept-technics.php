<?php /* Template Name: Concept - Technics */ ?>

<?php get_header(); ?>

  <main id="template-concept-technics" class="page-c">

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
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="page-c__section" id="technics-requirements">
      <div class="title title--l title--center title--masked">
        <h2 class="title__content title__content--prefixed">
          <span class="title__content__number">01</span>
          <?php the_field('rowsection_1_title'); ?>
        </h2>
      </div>

      <div class="sizes-tabs">
        <div class="grid-l sizes-tabs__content sizes-tabs__content--rounded">
          <?php

          $rowsection_1_items = get_field('rowsection_1_items');

          foreach($rowsection_1_items as $idx=>$item): ?>
            <div class="grid-l__third sizes-tabs__content__tab detail-card <?php echo "fade-in-bottom-$idx"; ?>">
              <i class="detail-card__picto detail-card__picto--circle red-text icon-<?php echo $item['ico']; ?>"></i>
              <div class="detail-card__title title--tab green-text">
                <p class="detail-card__title__number"><?php echo $item['text']; ?><sup>%</sup></p>
                <?php echo $item['description']; ?>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <section class="page-c__section page-c__section--dbl-layout"  id="technics-introduction">
      <div class="back-rect"><div class="back-rect__rect"></div></div>


      <div class="title title--l title--masked">
        <h2 class="title__content title__content--prefixed">
          <span class="title__content__number">02</span>
          <?php the_field('rowsection_2_title'); ?>
        </h2>
      </div>

      <div class="grid-l page-c__section--dbl-layout__grid">
        <div class="grid-l__demi left-part">

          <div class="common-text fade-in-bottom">
            <?php the_field('rowsection_2_text'); ?>
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
            <div class="layout__img fade-in-bottom-2">
              <?php acf_img_echo(get_field('rowsection_1_image'), 'large'); ?>
            </div>
          </div>
        </div>
      </div>
    </section>


    <section class="page-c__section page-c__section--dbl-layout" id="technics-permaculture">
      <div class="back-rect"><div class="back-rect__rect"></div></div>

      <div class="grid-l">
        <div class="title title--l grid-l__demi title--masked">
          <h2 class="title__content title__content--prefixed">
            <span class="title__content__number">03</span>
            <?php the_field('rowsection_3_title'); ?>
          </h2>
        </div>
      </div>

      <div class="grid-l page-c__section--dbl-layout__grid">
        <div class="grid-l__demi left-part">

          <div class="common-text">
            <?php the_field('rowsection_3_text'); ?>
          </div>

          <ul class="points-list points-list--light border-box card--points-list">
            <li class="points-list__li">
              <div class="points-list__li__number bullet-point">
                <span>1</span>
              </div>
              <div class="points-list__li__content">
                <h4 class="title--tab-m">
                  <?php the_field('rowsection_3_detail_item_1'); ?>
                </h4>
                <p class="mention">
                  <?php the_field('rowsection_3_detail_sub_item_1'); ?>
                </p>
              </div>
            </li>
            <li class="points-list__li">
              <div class="points-list__li__number bullet-point">
                <span>2</span>
              </div>
              <div class="points-list__li__content">
                <h4 class="title--tab-m">
                  <?php the_field('rowsection_3_detail_item_2'); ?>
                </h4>
                <p class="mention">
                  <?php the_field('rowsection_3_detail_sub_item_2'); ?>
                </p>
              </div>
            </li>
            <li class="points-list__li">
              <div class="points-list__li__number bullet-point">
                <span>3</span>
              </div>
              <div class="points-list__li__content">
                <h4 class="title--tab-m">
                  <?php the_field('rowsection_3_detail_item_3'); ?>
                </h4>
                <p class="mention">
                  <?php the_field('rowsection_3_detail_sub_item_3'); ?>
                </p>
              </div>
            </li>
          </ul>

        </div>

        <div class="grid-l__demi right-part">
          <div class="layout">
            <div class="layout__points">
              <div class="layout__point bullet-point"><span>1</span></div>
              <div class="layout__point bullet-point"><span>2</span></div>
              <div class="layout__point bullet-point"><span>3</span></div>
            </div>
            <div class="layout__motion layout__motion--perma fade-in-bottom-2"></div>
            <img src="<?php get_img('/layouts/layout_perma.png'); ?>" alt="" class="layout__img fade-in-bottom-2 hidden">
            <img src="<?php get_img('/layouts/layout_perma_zoom.png'); ?>" alt="" class="layout__zoom  zoom-attraction">
          </div>
        </div>
      </div>
    </section>

    <section class="page-c__section" id="technics-studies">

      <div class="back-rect"><div class="back-rect__rect"></div></div>


      <div class="title title--l title--center title--masked">
        <h2 class="title__content title__content--prefixed">
          <span class="title__content__number">04</span>
          <?php the_field('rowsection_4_title'); ?>
        </h2>
      </div>

      <div class="grid-l study">
        <div class="grid-l__demi fade-in-bottom">
          <div class="study__card">
            <div class="study__card__bg img-c crop-img">
              <?php acf_img_echo(get_field('rowsection_4_study1_image'), 'medium'); ?>
            </div>
            <a class="study__card__button" download href="<?php the_field('rowsection_4_study1_buttonlink'); ?>">
              <div class="download-button download-button--white">
                <span class="download-button__points"></span>
                <i class="download-button__icon icon-download"></i>
              </div>
              <p class="study__card__button__label white-text"><?php _e('Download Study','myfood'); ?></p>
            </a>
          </div>
        </div>

        <div class="grid-l__demi study__content-container">
          <div class="study__content fade-in-bottom-1">

            <h3 class="study__content__title title--m"><?php the_field('rowsection_4_study1_title'); ?></h3>
            <div class="study__content__text common-text">
              <p><?php the_field('rowsection_4_study1_description'); ?></p>
            </div>

            <div class="study__quote">
              <i class="study__quote__icon icon-quote red-text"></i>
              <p class="study__quote__content green-text">
                <?php the_field('rowsection_4_study1_highlight'); ?>
              </p>
            </div>

            <a class="study__download-mobile" download href="<?php the_field('rowsection_4_study1_buttonlink'); ?>">
              <div class="download-button download-button--white">
                <span class="download-button__points"></span>
                <i class="download-button__icon icon-download"></i>
              </div>
              <p class="study__card__button__label white-text"><?php _e('Download Study','myfood'); ?></p>
            </a>
          </div>
        </div>

      </div>

      <div class="grid-l study">
        <div class="grid-l__demi fade-in-bottom">
          <div class="study__card">
            <div class="study__card__bg img-c crop-img">
              <?php acf_img_echo(get_field('rowsection_4_study2_image'), 'medium'); ?>
            </div>
            <a class="study__card__button" download href="<?php the_field('rowsection_4_study2_buttonlink'); ?>">
              <div class="download-button download-button--white">
                <span class="download-button__points"></span>
                <i class="download-button__icon icon-download"></i>
              </div>
              <p class="study__card__button__label white-text"><?php _e('Download Study','myfood'); ?></p>
            </a>
          </div>
        </div>

        <div class="grid-l__demi study__content-container">
          <div class="study__content fade-in-bottom-1">

            <h3 class="study__content__title title--m"><?php the_field('rowsection_4_study2_title'); ?></h3>
            <div class="study__content__text common-text">
              <p><?php the_field('rowsection_4_study2_description'); ?></p>
            </div>

            <div class="study__quote">
              <i class="study__quote__icon icon-quote red-text"></i>
              <p class="study__quote__content green-text">
                <?php the_field('rowsection_4_study2_highlight'); ?>
              </p>
            </div>

            <a class="study__download-mobile" download href="<?php the_field('rowsection_4_study2_buttonlink'); ?>">
              <p class="study__card__button__label white-text"><?php _e('Download Study','myfood'); ?></p>
              <div class="download-button download-button--white">
                <span class="download-button__points"></span>
                <i class="download-button__icon icon-download"></i>
              </div>
            </a>
          </div>
        </div>

      </div>

    </section>

    <section class="page-c__section" id="technics-bottom">
      <div class="back-rect"><div class="back-rect__rect"></div></div>

      <div class="concept-bottom" data-equal-h-col="2">
        <div class="grid-l">
          <div class="grid-l__demi concept-bottom__part mh-col">
            <div class="concept-bottom__bg crop-img">
              <?php acf_img_echo(get_field('rowsection_left_image'), 'medium'); ?>
            </div>
            <a class="concept-bottom__content fade-in-bottom" href="<?php echo get_field('prefooter_left_link')['url']; ?>">
              <h3 class="concept-bottom__content__title title--l white-text">
                <?php the_field('rowsection_left'); ?>
              </h3>
              <div class="cbutton cbutton--border cbutton--border--green">
                <p><?php _e('Discover','myfood'); ?></p>
              </div>
            </a>

          </div>

          <div class="grid-l__demi concept-bottom__part mh-col">
            <div class="concept-bottom__bg crop-img">
              <?php acf_img_echo(get_field('rowsection_right_image'), 'medium'); ?>
            </div>
            <a class="concept-bottom__content fade-in-bottom-1" href="<?php echo get_field('prefooter_right_link')['url']; ?>">
              <h3 class="concept-bottom__content__title title--l white-text">
                <?php the_field('rowsection_right'); ?>
              </h3>
              <div class="cbutton cbutton--border cbutton--border--green">
                <p><?php _e('Discover','myfood'); ?></p>
              </div>
            </a>
          </div>
        </div>
      </div>
    </section>

	<?php get_seo_footer(); ?>
	
  </main>

<?php get_footer(); ?>