<?php /* Template Name: Community - Become a pioneer */ ?>

<?php get_header(); ?>

  <main id="template-become-pioneer" class="page-c <?php echo $post->post_name ?>">

    <div class="points-line"></div>

    <section class="page-c__section">
      <div class="slideshow slideshow--cover--simple">
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

              <div class="slideshow__container__slide__content__title title title--xxl title--beige">
                <div class="slideshow__container__slide__content__title__content">
                  <div class="title-mask mask mask--green"></div>
                  <h1 class="title__content">
                    <?php the_field('headertitle'); ?>
                  </h1>
                </div>
              </div>

              <div class="slideshow__container__slide__content__subtitle-container">
                <div class="title-mask mask mask--green"></div>
                <h3 class="line-mention">
                  <p class="line-mention__content">
                    <?php the_field('subtitle'); ?>
                  </p>
                </h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <?php if (get_field('isB2B')): ?>

      <section class="page-c__section" id="pioneer-company-intro">
        <div class="title title--l title--center title--masked">
          <h2 class="title__content title__content--prefixed">
            <span class="title__content__number">01</span>
            <?php the_field('rowsection_1_title'); ?>
          </h2>
        </div>

        <div class="sizes-tabs">
          <div class="grid-l sizes-tabs__content sizes-tabs__content--rounded" data-equal-h-col="3">
            <?php
            $rowsection_1_items = get_field('rowsection_1_items_b2b');
            foreach ($rowsection_1_items as $idx=>$item): ?>
              <div class="grid-l__third sizes-tabs__content__tab detail-card mh-col <?php if($idx == 0) echo 'fade-in-bottom'; if($idx == 1) echo 'fade-in-bottom-1'; if($idx == 2) echo 'fade-in-bottom-2'; ?> ">
                <i class="detail-card__picto detail-card__picto--circle icon-<?php echo $item['ico']; ?>"></i>
                <div class="detail-card__title title--tab green-text">
                  <?php echo $item['title']; ?>
                </div>
                <p class="detail-card__desc mention--small grey-text">
                  <?php echo $item['text']; ?>
                </p>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </section>

    <?php endif ?>

    <?php if (!get_field('isB2B')): ?>

      <section class="page-c__section" id="pioneer-individual-intro">
        <div class="title title--l title--masked">
          <h2 class="title__content title__content--prefixed">
            <span class="title__content__number">01</span>
            <?php the_field('rowsection_1_title'); ?>
          </h2>
        </div>

        <div class="grid-l">
          <div class="grid-l__demi left-part fade-in-bottom">
            <div class="common-text">
              <?php the_field('rowsection_1_text_b2c'); ?>
            </div>
          </div>
          <div class="grid-l__demi right-part fade-in-bottom-1">
            <div class="img-c crop-img">
              <?php acf_img_echo(get_field('rowsection_1_image_b2c'), 'medium'); ?>
            </div>
          </div>
        </div>

      </section>

    <?php endif ?>

    <section class="page-c__section" id="pioneer-strength">

      <div class="back-rect">
        <div class="back-rect__rect"></div>
      </div>

      <div class="title title--l title--center title--masked">
        <h2 class="title__content title__content--prefixed">
          <span class="title__content__number">02</span>
          <?php the_field('rowsection_2_title'); ?>
        </h2>
      </div>

      <ul class="points-list grid-l">
        <?php

        $rowSection_2_strenghts = get_field('rowsection_2_strenghts');

        foreach ($rowSection_2_strenghts as $idx => $strenghts): ?>

          <li class="points-list__li grid-l__demi">
            <div class="points-list__li__number bullet-point">
              <span><?php echo($idx + 1); ?></span>
            </div>
            <div class="points-list__li__content">
              <div class="points-list__li__content__title title title-xs">
                <h4 class="title__content green-text">
                  <?php echo $strenghts['title']; ?>
                </h4>
              </div>

              <div class="points-list__li__content__desc">
                <p><?php echo $strenghts['description']; ?></p>
              </div>
            </div>
          </li>

        <?php endforeach; ?>
      </ul>

    </section>

    <section class="page-c__section" id="pioneer-greenhouses">

      <div class="title title--l title--center title--masked">
        <h2 class="title__content title__content--prefixed">
          <span class="title__content__number">03</span>
          <?php the_field('rowsection_2_subtitle'); ?>
        </h2>
      </div>

      <div class="sizes-tabs">
        <div class="grid-l sizes-tabs__content sizes-tabs__content--rounded">

          <?php
          $rowsection_2_items = get_field('rowsection_2_items');

          foreach ($rowsection_2_items as $idx => $item): ?>
            <div class="grid-l__third sizes-tabs__content__tab detail-card <?php if($idx == 0) echo 'fade-in-bottom'; if($idx == 1) echo 'fade-in-bottom-1'; if($idx == 2) echo 'fade-in-bottom-2'; ?>">
              <i class="detail-card__picto icon-<?php echo $item['ico']; ?>"></i>
              <p class="detail-card__desc mention--small grey-text">
                <?php echo $item['text']; ?>
              </p>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

    </section>

    <section class="page-c__section" id="pioneer-medias-slideshow">

      <div class="back-rect">
        <div class="back-rect__rect"></div>
      </div>

      <div class="title title--l title--masked">
        <h2 class="title__content title__content--prefixed">
          <span class="title__content__number">04</span>
          <?php the_field('rowsection_3_title'); ?>
        </h2>
      </div>
      <?php get_medias_slideshow(get_field('gallery')); ?>
    </section>


    <section class="page-c__section page-c__section--bottom" id="pioneer-bottom">
      <div class="back-rect">
        <div class="back-rect__rect"></div>
      </div>

      <div class="grid-l page-c__section--bottom__content">
        <div class="grid-l__demi">


          <a class="push-card green-card border-box fade-in-bottom" href="<?php the_field('rowsection_3_leftlink'); ?>" target="_blank"
             rel="noopener">

            <div class="push-card__background img-c crop-img">
              <?php acf_img_echo(get_field('rowsection_3_leftimage'), 'medium'); ?>
            </div>

            <div class="download-button download-button--white">
              <span class="download-button__points"></span>
              <i class="download-button__icon icon-download"></i>
            </div>

            <p class="border-box--quote__content white-text">
              <?php the_field('rowsection_3_lefttext'); ?>
            </p>
          </a>

        </div>

        <div class="grid-l__demi">
          <div class="push-card border-box push-card--shop fade-in-bottom-1">
            <div class="push-card__desc">
              <i class="push-card__desc__icon icon-bag red-text dark-circle"></i>
              <p class="push-card__desc__title">
                <span class="red-text"><?php _e('Book', 'myfood'); ?></span>
                <?php the_field('rowsection_3_righttext'); ?>
              </p>
            </div>
            <div class="push-card__button card__button push-card__button--black">
              <a href="<?php the_field('rowsection_3_rightlink'); ?>" class="push-card__button__link card__button__link">
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