<?php /* Template Name: Shop - List */ ?>

<?php get_header();

$cate = get_queried_object();
$cateID = $cate->term_id;

?>

<main id="template-shop-list" class="page-c">
  <div class="points-line"></div>

  <section class="page-c__section simple-top <?php /*simple-top--with-filter */ ?>">
    <div class="back-rect">
      <div class="back-rect__rect"></div>
    </div>
    <div class="simple-top__container">
      <p class="title--m green-text simple-top__subtitle fade-in-bottom"><?php _e('Shop', 'myfood'); ?></p>
      <h1 class="simple-top__title title--xxl fade-in-bottom-1"><?php echo $cate->name ?></h1>
    </div>
  </section>
    <?php
        if($cateID=== 110 || $cateID === 164 || $cateID=== 169)
        {
            echo "<div class='filter-product-cat-container'>";
            echo "<div class='filter-product-cat-option' data-product_cat=''> $child->name </div>";

            $cate_childs = wc_category_childs($cateID);
            foreach ($cate_childs as $child) {
                echo "<div class='filter-product-cat-option' data-product_cat='.$child->slug'> $child->name </div>";

            }
            echo "</div>";

        }
    ?>
    <style>
        .filter-product-cat-container {
            display: flex;
        }
        .filter-product-cat-option {

        }
    </style>
    <script>
$('.filter-product-cat-option').on('click',   function() {
    const product_cat = (this.getAttribute('data-product_cat'));

    $('.grid-l__third').css('display', 'none');
    $('.grid-l__third' + product_cat).css('display', 'block');

});
    </script>
  <section class="page-c__section" id="shop-products-list">
    <div class="back-rect">
      <div class="back-rect__rect"></div>
    </div>
    <div class="products-box-list">
      <div class="grid-l">
        <?php
        $products = get_posts(array(
          'post_type' => 'product',
          'posts_per_page' => -1,
          'suppress_filters' => 0,
          'tax_query' => array(
            array(
              'taxonomy' => 'product_cat',
              'field' => 'id',
              'terms' => $cateID
            )
          ),
          'orderby' => array('menu_order' => 'ASC', 'title' => 'ASC'),
        ));

        ?>

        <?php
          foreach ($products as $idx=>$product):
            $idx = $idx%3;

          $prod_cats_slug_str = '';
          $prod_cats = wc_get_product_terms($product->ID, 'product_cat');
          foreach ($prod_cats as $pc)
             $prod_cats_slug_str = $prod_cats_slug_str . ' '. $pc->slug;
        ?>

          <div class="grid-l__third <?php echo "fade-in-bottom-$idx $prod_cats_slug_str"; ?>">
            <?php get_product_box($product); ?>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <?php if ($cateID == 105 || $cateID == 143 || $cateID == 144): ?>
    <section class="page-c__section" id="shop-list-tab">

      <div class="title title--l title--center title--masked">
        <h2 class="title__content title__content--prefixed">
          <span class="title__content__number">02</span>
          <?php _e('Compare the different offers', 'myfood'); ?>
        </h2>
      </div>
      <div class="data-tab-c">
        <div class="data-tab">
          <div class="data-tab__pictos">
            <table>
              <tbody>
              <tr>
                <td></td>
                <td><i class="icon-original"></i></td>
                <td><i class="icon-production"></i></td>
                <td><i class="icon-seasons"></i></td>
                <td><i class="icon-autonomy"></i></td>
                <td><i class="icon-signature"></i></td>
              </tr>
              </tbody>
            </table>
          </div>

          <div class="data-tab__body">
            <table>
              <thead>
              <tr class="data-tab__variables">
                <td>
                  <p class="title--m green-text">
                    <i class="icon-greenhouse"></i>
                    family
                  </p>
                </td>
                <td>
                  <p class="title--card-sm"><?php _e('Original', 'myfood'); ?></p>
                  <p class="mention--small"><?php _e('Get started with the essentials', 'myfood'); ?></p>
                </td>
                <td>
                  <p class="title--card-sm"><?php _e('Production', 'myfood'); ?></p>
                  <p class="mention--small"><?php _e('Plus Permaculture', 'myfood'); ?></p>
                </td>
                <td>
                  <p class="title--card-sm"><?php _e('4 Seasons', 'myfood'); ?></p>
                  <p class="mention--small"><?php _e('Grow all year long', 'myfood'); ?></p>
                </td>
                <td>
                  <p class="title--card-sm"><?php _e('Autonomy', 'myfood'); ?></p>
                  <p class="mention--small"><?php _e('Zero carbon footprint', 'myfood'); ?></p>
                </td>
                <td>
                  <p class="title--card-sm"><?php _e('Signature', 'myfood'); ?></p>
                  <p class="mention--small"><?php _e('The full experience', 'myfood'); ?></p>
                </td>
              </tr>
              </thead>
              <tbody>
              <tr>
                <td>
                  <p class="common-text"><?php _e('Smart Greenhouse', 'myfood'); ?></p>
                </td>
                <td><i class="icon-valid"></i></td>
                <td><i class="icon-valid"></i></td>
                <td><i class="icon-valid"></i></td>
                <td><i class="icon-valid"></i></td>
                <td><i class="icon-valid"></i></td>
              </tr>
              <tr>
                <td>
                  <p class="common-text"><?php _e('Aquaponics / Bioponics System', 'myfood'); ?></p>
                </td>
                <td><i class="icon-valid"></i></td>
                <td><i class="icon-valid"></i></td>
                <td><i class="icon-valid"></i></td>
                <td><i class="icon-valid"></i></td>
                <td><i class="icon-valid"></i></td>
              </tr>
              <tr>
                <td>
                  <p class="common-text"><?php _e('Community Support', 'myfood'); ?></p>
                </td>
                <td><i class="icon-valid"></i></td>
                <td><i class="icon-valid"></i></td>
                <td><i class="icon-valid"></i></td>
                <td><i class="icon-valid"></i></td>
                <td><i class="icon-valid"></i></td>
              </tr>
              <tr>
                <td>
                  <p class="common-text"><?php _e('Confort Module', 'myfood'); ?></p>
                </td>
                <td></td>
                <td><i class="icon-valid"></i></td>
                <td><i class="icon-valid"></i></td>
                <td><i class="icon-valid"></i></td>
                <td><i class="icon-valid"></i></td>
              </tr>
              <tr>
                <td>
                  <p class="common-text"><?php _e('Perma Module', 'myfood'); ?></p>
                </td>
                <td></td>
                <td><i class="icon-valid"></i></td>
                <td><i class="icon-valid"></i></td>
                <td><i class="icon-valid"></i></td>
                <td><b><?php _e('Perma Plus', 'myfood'); ?></b></td>
              </tr>
              <tr>
                <td>
                  <p class="common-text"><?php _e('Aerospring Module', 'myfood'); ?></p>
                </td>
                <td></td>
                <td><i class="icon-valid"></i></td>
                <td><i class="icon-valid"></i></td>
                <td><i class="icon-valid"></i></td>
                <td><i class="icon-valid"></i></td>
              </tr>
              <tr>
                <td>
                  <p class="common-text"><?php _e('Winter Module', 'myfood'); ?></p>
                </td>
                <td></td>
                <td></td>
                <td><i class="icon-valid"></i></td>
                <td><i class="icon-valid"></i></td>
                <td><i class="icon-valid"></i></td>
              </tr>
              <tr>
                <td>
                  <p class="common-text"><?php _e('Solar Module', 'myfood'); ?></p>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td><i class="icon-valid"></i></td>
                <td><i class="icon-valid"></i></td>
              </tr>
              <tr>
                <td>
                  <p class="common-text"><?php _e('Habitat Module', 'myfood'); ?></p>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td><i class="icon-valid"></i></td>
                <td><i class="icon-valid"></i></td>
              </tr>
              <tr>
                <td>
                  <p class="common-text"><?php _e('Installation', 'myfood'); ?></p>
                </td>
                <td><b>+€1200 <?php _e('(optionnal)', 'myfood'); ?></b></td>
                <td><b>+€1200 <?php _e('(optionnal)', 'myfood'); ?></b></td>
                <td><i class="icon-valid"></i></td>
                <td><i class="icon-valid"></i></td>
                <td><i class="icon-valid"></i></td>
              </tr>
              <tr>
                <td>
                  <p class="common-text"><?php _e('8 Zigprow towers extension', 'myfood'); ?></p>
                </td>
                <td><b>+€600</b></td>
                <td><b>+€600</b></td>
                <td><b>+€600</b></td>
                <td><b>+€600</b></td>
                <td><b>+€600</b></td>
              </tr>
              </tbody>

              <tfoot>
              <tr>
                <td>
                  <p class="title--m">
                    <?php _e('Total', 'myfood'); ?>
                  </p>
                </td>
                <td>
                  <p class="title--card-sm">€7990 <sup><?php _e('incl. tax', 'myfood'); ?></sup></p>
                  <p class="mention--small"><?php _e('Free shipping', 'myfood'); ?></p>
                </td>
                <td>
                  <p class="title--card-sm">€9990 <sup><?php _e('incl. tax', 'myfood'); ?></sup></p>
                  <p class="mention--small"><?php _e('Free shipping', 'myfood'); ?></p>
                </td>
                <td>
                  <p class="title--card-sm">€13990 <sup><?php _e('incl. tax', 'myfood'); ?></sup></p>
                  <p class="mention--small"><?php _e('Free shipping/Installation incl.', 'myfood'); ?></p>
                </td>
                <td>
                  <p class="title--card-sm">€16990 <sup><?php _e('incl. tax', 'myfood'); ?></sup></p>
                  <p class="mention--small"><?php _e('Free shipping/Installation incl.', 'myfood'); ?></p>
                </td>
                <td>
                  <p class="title--card-sm">€22990 <sup><?php _e('incl. tax', 'myfood'); ?></sup></p>
                  <p class="mention--small"><?php _e('Free shipping/Installation incl.', 'myfood'); ?></p>
                </td>
              </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>

    </section>
  <?php endif ?>

  <?php if ($cateID == 107 || $cateID == 166 || $cateID == 175): ?>

    <section class="page-c__section" id="shop-list-tab">

      <div class="title title--l title--center title--masked">
        <h2 class="title__content title__content--prefixed">
          <span class="title__content__number">02</span>
          <?php _e('Compare the different offers', 'myfood'); ?>
        </h2>
      </div>

      <div class="data-tab-c">
        <div class="data-tab data-tab--city">
          <div class="data-tab__pictos">
            <table>
              <tbody>
              <tr>
                <td></td>
                <td><i class="icon-original"></i></td>
                <td><i class="icon-signature"></i></td>
              </tr>
              </tbody>
            </table>
          </div>

          <div class="data-tab__body">
            <table>
              <thead>
              <tr class="data-tab__variables">
                <td>
                  <p class="title--m green-text">
                    <i class="icon-greenhouse"></i>
                    city
                  </p>
                </td>
                <td>
                  <p class="title--card-sm"><?php _e('Original', 'myfood'); ?></p>
                  <p class="mention--small"><?php _e('Get started with the essentials', 'myfood'); ?></p>
                </td>
                <td>
                  <p class="title--card-sm"><?php _e('Signature', 'myfood'); ?></p>
                  <p class="mention--small"><?php _e('The full experience', 'myfood'); ?></p>
                </td>
              </tr>
              </thead>
              <tbody>
              <tr>
                <td>
                  <p class="common-text"><?php _e('Smart Greenhouse', 'myfood'); ?></p>
                </td>
                <td><i class="icon-valid"></i></td>
                <td><i class="icon-valid"></i></td>
              </tr>
              <tr>
                <td>
                  <p class="common-text"><?php _e('Aquaponics / Bioponics System', 'myfood'); ?></p>
                </td>
                <td><i class="icon-valid"></i></td>
                <td><i class="icon-valid"></i></td>
              </tr>
              <tr>
                <td>
                  <p class="common-text"><?php _e('Community Support', 'myfood'); ?></p>
                <td><i class="icon-valid"></i></td>
                <td><i class="icon-valid"></i></td>
              </tr>
              <tr>
                <td>
                  <p class="common-text"><?php _e('Habitat Module', 'myfood'); ?></p>
                </td>
                <td></td>
                <td><i class="icon-valid"></i></td>
              </tr>
              <tr>
                <td>
                  <p class="common-text"><?php _e('Installation', 'myfood'); ?></p>
                </td>
                <td><b>+€1200 <?php _e('(optionnal)', 'myfood'); ?></b></td>
                <td><i class="icon-valid"></i></td>
              </tr>
              <tr>
                <td>
                  <p class="common-text"><?php _e('4 Zigprow towers extension', 'myfood'); ?></p>
                </td>
                <td><b>+€600</b></td>
                <td><b>+€600</b></td>
              </tr>
              </tbody>

              <tfoot>
              <tr>
                <td>
                  <p class="title--m">
                    <?php _e('Total', 'myfood'); ?>
                  </p>
                </td>
                <td>
                  <p class="title--card-sm">€3900 <sup><?php _e('incl. tax', 'myfood'); ?></sup></p>
                  <p class="mention--small"><?php _e('Free shipping', 'myfood'); ?></p>
                </td>
                <td>
                  <p class="title--card-sm">€5990 <sup><?php _e('incl. tax', 'myfood'); ?></sup></p>
                  <p class="mention--small"><?php _e('Free shipping/Installation incl.', 'myfood'); ?></p>
                </td>
              </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>

    </section>
  <?php endif ?>


  <section class="page-c__section" id="shop-list-bottom">

    <div class="large-push large-push--large">
      <div class="large-push__background img-c crop-img h-back h-back--full">
        <img src="https://myfood.eu/wp-content/uploads/2018/04/ellange-luxembourg-company-grosbusch.jpg" alt="">
      </div>

      <div class="large-push__content h-front">
        <div class="large-push__title title title--l title--masked">
          <h2 class="title__content title__content--prefixed beige-text">
            <span class="title__content__number beige-text">03</span>
            <p class="title--m green-text"><?php _e('Our Concept', 'myfood'); ?></p>
            <?php _e('Our Smart Greenhouse', 'myfood'); ?>
          </h2>
        </div>

        <a href="<?php _e('https://myfood.eu/our-technology/smart-greenhouse/', 'myfood'); ?>"
           class="cbutton cbutton--border cbutton--border--green fade-in-bottom">
          <p>
            <?php _e('Discover', 'myfood'); ?>
          </p>
        </a>
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
