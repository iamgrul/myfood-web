<?php /* Template Name: Shop - Home */ ?>

<?php get_header(); ?>

<main id="template-shop-home" class="page-c">
  <!--    CONCEPT SGH SLIDESHOW START   -->

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

  <section class="page-c__section" id="shop-products-tabs">
    <div class="title title--l title--masked">
      <h2 class="title__content title__content--prefixed">
        <span class="title__content__number">01</span>
        <?php the_field('rowsection_1_title'); ?>
      </h2>
    </div>

    <?php get_products_tabs(get_field('rowsection_1_products')); ?>
  </section>

  <section class="page-c__section" id="shop-products-list">
    <div class="back-rect">
      <div class="back-rect__rect"></div>
    </div>

    <div class="title title--l title--center title--masked">
      <h2 class="title__content title__content--prefixed">
        <span class="title__content__number">02</span>
        <?php the_field('rowsection_2_title'); ?>
      </h2>
    </div>

    <div class="products-box-list">
      <div class="grid-l">
        <?php
        $products = get_posts(array(
          'post_type' => 'product',
          'posts_per_page' => 6,
          'suppress_filters'=>0,
          'tax_query' => array(
            array(
              'taxonomy' => 'product_cat',
              'field' => 'id',
              'terms' => 143
            )
          ),
          'orderby' => array('menu_order' => 'ASC', 'title' => 'ASC'),
        ));

        ?>

        <?php foreach ($products as $idx=>$product):
          $idx = $idx%3

          ?>
          <div class="grid-l__third <?php echo "fade-in-bottom-$idx"; ?>">
            <?php get_product_box($product); ?>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

  </section>

  <section class="page-c__section" id="shop-products-list">
    <div class="back-rect">
      <div class="back-rect__rect"></div>
    </div>

    <div class="title title--l title--center title--masked">
      <h2 class="title__content title__content--prefixed">
        <span class="title__content__number">03</span>
        <?php the_field('rowsection_3_title'); ?>
      </h2>
    </div>

    <div class="products-box-list">
      <div class="grid-l">
        <?php
        $products = get_posts(array(
          'post_type' => 'product',
          'posts_per_page' => 9,
          'suppress_filters'=>0,
		  'meta_key' => 'total_sales',
          'orderby' => array('meta_value_num' => 'DESC'),
          'tax_query' => array(
            array(
              'taxonomy' => 'product_cat',
              'field' => 'id',
              'terms' => 110
            )
          ),
        ));

        ?>

        <?php foreach ($products as $idx=>$product):
          $idx=$idx%3;
          ?>
          <div class="grid-l__third <?php echo "fade-in-bottom-$idx"; ?>">
            <?php get_product_box($product); ?>
          </div>
        <?php endforeach; ?>

        <div class="button-container" style="display: table; margin: 0 auto; padding-top: 65rem">
            <a href="<?php echo get_field('rowsection_3_url')['url']; ?>" class="cbutton cbutton--border cbutton--border--green cbutton--dark cbutton--mask hv">
                <p class="black-text"><?php _e('See more','myfood'); ?></p>
                <span class="cbutton__mask"><i></i></span>
            </a>
        </div>

      </div>
    </div>

  </section>

  <?php get_seo_footer(); ?>

<!-- Event snippet for Shop Click conversion page -->
<script>
  gtag('event', 'conversion', {'send_to': 'AW-991638829/iutoCJTsm4UBEK3q7NgD'});
</script>

</main>

<?php get_footer(); ?>
