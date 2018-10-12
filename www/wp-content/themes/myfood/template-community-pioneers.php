<?php /* Template Name: Community - Pioneers */ ?>

<?php get_header(); ?>

<main id="template-community-pioneers" class="page-c">

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
            <?php acf_img_echo(get_field('image'), 'large'); ?>
          </div>

          <div class="slideshow__container__slide__content">

            <div class="slideshow__container__slide__content__title title title--xxl title--beige">
              <div class="slideshow__container__slide__content__title__content">
                <div class="title-mask mask mask--green"></div>
                <h1 class="title__content">
                  <?php the_field('pagetitle'); ?>
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

  <section class="page-c__section" id="community-pioneers-introduction">

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
      <div class="grid-l__demi left-part">
        <div class="common-text">
          <?php the_field('rowsection_1_text'); ?>
        </div>
      </div>
      <div class="grid-l__demi right-part">
        <div class="circle circle--m"></div>
        <div class="circle circle--xl"></div>
        <div class="img-c crop-img mission-picture">
          <?php acf_img_echo(get_field('rowsection_1_image'), 'medium'); ?>
        </div>
      </div>
    </div>
  </section>

  <section class="page-c__section" id="community-pioneers-pioneers">


    <div class="back-rect">
      <div class="back-rect__rect"></div>
    </div>

    <div class="title title--l grid-l title--masked">
      <h2 class="title__content title__content--prefixed grid-l__large">
        <span class="title__content__number">02</span>
        <?php the_field('rowsection_2_title'); ?>
      </h2>
      <div class="grid-l__medium">
        <h3 class="line-mention">
          <p class="line-mention__content line-mention__content--black">
            <?php the_field('rowsection_2_subtitle'); ?>
          </p>
        </h3>
      </div>
    </div>

    <?php get_cards_slideshow(get_field('rowsection_2_pioneers')); ?>

  </section>

  <section class="page-c__section" id="community-pioneers-push">

    <div class="back-rect">
      <div class="back-rect__rect"></div>
    </div>
      <div class="large-push">
          <a  href="<?php the_field('rowsection_3_bottom_link'); ?>" target="_blank" rel="noopener">
              <div class="large-push__background img-c crop-img h-back h-back--full">
        <?php acf_img_echo(get_field('rowsection_3_image'), 'large'); ?>
      </div>
              <div class="large-push__content h-front">

                  <div class="h-vertical-mid">
                      <div class="title title--m">
                          <h2 class="title__content">
                              <?php the_field('rowsectioni_3_bottom_text'); ?>
                          </h2>
                      </div>
                      <div class="cbutton cbutton--border cbutton--border--green float-right"
                      <p>
                          <?php _e('Schedule', 'myfood'); ?>
                      </p>
                  </div>
              </div>
      </div>
      </a>
      </div>
  </section>

  <section class="page-c__section" id="community-pioneers-slideshow">
    <div class="back-rect">
      <div class="back-rect__rect"></div>
    </div>


    <div class="title title--l title--masked">
      <h2 class="title__content title__content--prefixed">
        <span class="title__content__number">03</span>
        <?php the_field('rowsection_4_title'); ?>
      </h2>
    </div>

    <?php get_medias_slideshow(get_field('rowsection_4_gallery')); ?>

  </section>

  <section class="page-c__section page-c__section--bottom" id="community-pioneers-bottom">
    <div class="back-rect">
      <div class="back-rect__rect"></div>
    </div>

    <div class="grid-l page-c__section--bottom__content">
      <div class="grid-l__demi">
          <a href="<?php echo get_field('rowsection_6_left_link')['url']; ?>">
        <div class="push-card border-box fade-in-bottom">
          <div class="push-card__background img-c crop-img">
            <?php acf_img_echo(get_field('rowsection_6_left_image'), 'medium'); ?>
          </div>
          <div class="push-card__desc">
            <i class="push-card__desc__icon icon-profile green-text"></i>
            <p class="push-card__desc__title beige-text">
              <?php the_field('rowsection_6_left_text'); ?>
            </p>
          </div>
          <div class="push-card__button card__button">
            <a href="<?php echo get_field('rowsection_6_left_link')['url']; ?>" class="card__button__link">
              <span class="beige-text"><?php _e('Learn more', 'myfood'); ?></span>
              <div class="points-button points-button--beige"><span></span></div>
            </a>
          </div>
        </div>
          </a>
      </div>

      <div class="grid-l__demi">

          <a href="<?php echo get_field('rowsection_6_right_link')['url']; ?>">
        <div class="push-card border-box fade-in-bottom-1">

          <div class="push-card__desc">
            <i class="push-card__desc__icon icon-profile red-text"></i>
            <p class="push-card__desc__title">
              <?php the_field('rowsection_6_right_text'); ?>
            </p>
          </div>
          <div class="push-card__button card__button">
            <a href="<?php echo get_field('rowsection_6_right_link')['url']; ?>" class="card__button__link">
              <span><?php _e('Learn more', 'myfood'); ?></span>
              <div class="points-button"><span></span></div>

            </a>
          </div>
        </div>
          </a>
      </div>

    </div>
  </section>

  <?php get_seo_footer(); ?>

</main>


<?php get_footer(); ?>
