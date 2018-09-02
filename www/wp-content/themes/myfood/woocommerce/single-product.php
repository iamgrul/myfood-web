<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see      https://docs.woocommerce.com/document/template-structure/
 * @author    WooThemes
 * @package  WooCommerce/Templates
 * @version     1.6.4
 */

get_header('shop');

do_action('woocommerce_before_main_content');

$cats = get_the_terms($post, 'product_cat');

?>


<main id="single-product" class="page-c <?php if ($product->is_type('variable')) echo 'variable-product'; else echo 'simple-product'; ?>">
  <?php do_action('woocommerce_before_single_product'); ?>

  <div class="points-line"></div>

  <section class="page-c__section" id="product-introduction">

    <div class="dual-tab dual-tab--single">
      <div class="dual-tab__left">
        <div class="dual-tab__mask-container">
          <div class="dual-tab__mask mask  mask--green"></div>
        </div>

        <div class="dual-tab__medias">
          <div class="dual-tab__medias__layout switch-tab">
            <div class="share-box">
              <?php get_share_list(); ?>
            </div>

            <div class="dual-tab__medias__layout__image fade-in-bottom">
              <?php acf_img_echo(get_field('featured_image'), 'large'); ?>
            </div>
          </div>

          <?php $images = get_field('images');
          if ($images): ?>
            <div class="dual-tab__medias__slideshow switch-tab">
              <div class="images-slideshow">
                <div class="mask mask--green"></div>
                <?php foreach ($images as $image): ?>
                  <div class="images-slideshow__image">
                    <div class="crop-img img-c">
                      <?php acf_img_echo($image, 'large'); ?>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
          <?php endif; ?>
        </div>

        <div class="dual-tab__navigation">
          <?php if ($images): ?>
            <div class="arrow-button arrow-button--prev arrow-button--white">
              <i class="arrow-button__icon icon-arrow"></i>
              <small><?php _e('Prev', 'myfood'); ?></small>
              <div class="points-button"><span></span></div>
            </div>
          <?php endif; ?>

          <div class="navigation-switch fade-in-bottom">
            <?php if (get_field('issuperproduct')): ?>
              <p class="navigation-switch__button navigation-switch__button--active">
                <span><?php _e('Layout', 'myfood'); ?></span> <i class="icon-greenhouse"></i>
              </p>

              <?php if ($images): ?>
                <p class="navigation-switch__button">
                  <i class="icon-pictures"></i> <span><?php _e('Visual', 'myfood'); ?></span>
                </p>
              <?php endif; ?>

            <?php else: ?>
              <p class="navigation-switch__button navigation-switch__button--active">
                <i class="icon-pictures"></i> <span><?php _e('Visual', 'myfood'); ?></span>
              </p>
            <?php endif ?>
          </div>

          <?php if ($images): ?>
            <div class="arrow-button arrow-button--next arrow-button--white">
              <div class="points-button"><span></span></div>
              <small><?php _e('Next', 'myfood'); ?></small>
              <i class="arrow-button__icon icon-arrow"></i>
            </div>
          <?php endif; ?>

        </div>

      </div>
      <div class="dual-tab__right">
        <div class="dual-tab__mask mask"></div>

        <div class="dual-tab__content product-woocommerce-actions">

          <div class="dual-tab__content__term title--tab fade-in-bottom">
            <span class="green-text">
			<?php
				$terms = get_the_terms($product->ID, 'product_cat');
				foreach ($terms as $term) {
				  if ($term->parent == 0) {
					echo $term->name;
				  }
				}
            ?>
			</span>
          </div>


          <h1 class="dual-tab__content__title title title--ml fade-in-bottom-1">
            <?php the_field('productname'); ?>
          </h1>
          <div class="fade-in-bottom-2">
            <?php if ($product->is_type('variable')): ?>
              <div class="dual-tab__content__variations">
                <?php do_action('woocommerce_variable_add_to_cart'); ?>
              </div>
              <div class="dual-tab__content__price title--ml green-text">
                <span class="price"><?php the_field('productfullprice'); ?> <?php _e('incl. tax', 'myfood'); ?></span>
              </div>
            <?php else: ?>
              <?php do_action('woocommerce_single_product_summary'); ?>
            <?php endif; ?>
          </div>


          <div class="dual-tab__content__cta fake-add-to-cart fade-in-bottom">
            <?php if (get_field('issuperproduct')): ?>
              <span><?php _e('Book', 'myfood'); ?></span>
            <?php else: ?>
              <span><?php _e('Order', 'myfood'); ?></span>
            <?php endif ?>
            <div class="points-button points-button--beige"><span></span></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="page-c__section" id="product-presentation">

    <div class="contents-tabs">
      <div class="contents-tabs__head title title--l fade-in-bottom">
        <div class="title__content title__content--prefixed">
          <span class="title__content__number">01</span>
          <?php if (get_field('issuperproduct') OR get_field('isaerospring')): ?>
            <div class="tabs-selector multiple">
              <p class="tabs-selector__tab tabs-selector__tab--active title title--tab">
                <?php _e('Presentation', 'myfood'); ?>
              </p>

              <p class="tabs-selector__tab title title--tab">
                <?php _e('Technical Specifications', 'myfood'); ?>
              </p>
            </div>


            <div class="selector--mobile">
              <p class="selector--mobile__selection">
                <span class="selector--mobile__selection__label"><?php _e('Presentation', 'myfood'); ?></span>
                <span class="icon-arrow"></span>
              </p>
              <ul class="selector--mobile__list">
                <li class="head-selector selector--mobile__li"><?php _e('Presentation', 'myfood'); ?></li>
                <li class="head-selector selector--mobile__li"><?php _e('Technical Specifications', 'myfood'); ?></li>
              </ul>
            </div>
          <?php else: ?>
            <div class="tabs-selector">
              <p class="tabs-selector__tab tabs-selector__tab--active title title--tab">
                <?php _e('Presentation', 'myfood'); ?>
              </p>

            </div>
          <?php endif ?>
        </div>
      </div>

      <div class="contents-tabs__body">
        <div class="back-rect">
          <div class="back-rect__rect"></div>
        </div>

        <div class="contents-tabs__tab contents-tabs__tab--active">
          <div class="grid-l">

            <div class="grid-l__demi">
              <h2 class="contents-tabs__tab__title title--ml">
                <?php _e('Presentation', 'myfood'); ?>
              </h2>

              <div class="common-text black-text">
                <?php the_field('presentationtextarea_1'); ?>
              </div>
            </div>

            <div class="grid-l__demi contents-tabs__tab__cards">

              <div class="border-box border-box--quote card">
                <i class="border-box--quote__icon icon-quote red-text"></i>
                <p class="border-box--quote__content green-text">
                  <?php the_field('catchphrase'); ?>
                </p>
              </div>

              <div class="break-inline"></div>

              <?php if (get_field('issuperproduct')): ?>
                <a class="green-card card" href="<?php echo get_field('productsheet_link')['url']; ?>" target="_blank">
                  <div class="download-button download-button--white">
                    <span class="download-button__points"></span>
                    <i class="download-button__icon icon-download"></i>
                  </div>
                  <p class="border-box--quote__content white-text">
                    <?php _e('Download the complete product Datasheet', 'myfood'); ?>
                  </p>
                </a>
              <?php endif ?>
            </div>
          </div>
        </div>

        <?php if (get_field('issuperproduct') OR get_field('isaerospring')): ?>
          <div class="contents-tabs__tab">
            <div class="grid-l">

              <div class="grid-l__demi">
                <h2 class="contents-tabs__tab__title title--ml">
                  <?php _e('Technical Specifications', 'myfood'); ?>
                </h2>

                <div class="common-text black-text">
                  <?php the_field('specificationtextarea_1'); ?>
                </div>
              </div>

              <div class="grid-l__demi">
                <h2 class="contents-tabs__tab__title title--ml">
                  <?php _e('Product Content', 'myfood'); ?>
                </h2>

                <div class="common-text black-text">
                  <?php the_field('specificationtextarea_2'); ?>
                </div>
              </div>
            </div>
          </div>
        <?php endif ?>
      </div>
    </div>
  </section>

  <?php if (get_field('issuperproduct')):
    $modules = get_field('rowsection_2_modules');

    if ($modules):?>
      <section class="page-c__section" id="product-modules">
      <div class="back-rect">
        <div class="back-rect__rect"></div>
      </div>

      <div class="title title--l title--masked">
        <h2 class="title__content title__content--prefixed">
          <span class="title__content__number">02</span>
          <?php _e('Featured Modules', 'myfood'); ?>
        </h2>
      </div>
      <?php get_modules_slideshow($modules);
    endif ?>

    </section>

    <section class="page-c__section" id="product-services">
      <div class="back-rect">
        <div class="back-rect__rect"></div>
      </div>

      <div class="large-push large-push--large">
        <div class="large-push__background img-c crop-img h-back h-back--full">
          <img src="<?php get_img('misc/Installation-one-Day.jpg'); ?>" alt="">
        </div>

        <div class="large-push__content h-front">
          <div class="large-push__title title title--l">
            <h2 class="title__content title__content--prefixed beige-text">
              <span class="title__content__number beige-text">03</span>
              <?php _e('Delivery, Installation and Support', 'myfood'); ?>
            </h2>
          </div>

          <div class="large-push__content__text common-text beige-text">
            <p><?php _e('Our smart greenhouses are delivered between 5 and 6 weeks after your order. Full installation in 1 day.', 'myfood'); ?></p>
            <p><?php _e('Start cultivating the next day!', 'myfood'); ?></p>
            <p><?php _e('Free access to the Hub web-app and Pioneer Community support.', 'myfood'); ?></p>
          </div>
        </div>
      </div>
    </section>

    <section class="page-c__section page-c__section--bottom" id="product-pushes">
      <div class="back-rect">
        <div class="back-rect__rect"></div>
      </div>

      <div class="grid-l page-c__section--bottom__content">
        <div class="grid-l__demi">
          <div class="push-card border-box fade-in-bottom">

            <div class="push-card__background img-c crop-img">
              <img src="<?php get_img('misc/MyFood-Hub-1010-APP.jpg'); ?>" alt="">
            </div>

            <div class="push-card__desc">
              <i class="push-card__desc__icon icon-contact red-text"></i>
              <p class="push-card__desc__title beige-text">
                <span class="red-text"><?php _e('myfood Hub', 'myfood'); ?></span>
                <?php _e('to manage your Smart Greenhouses', 'myfood'); ?>
              </p>
            </div>
            <div class="push-card__button card__button">
              <a href="<?php echo get_field('supportednetwork_link')['url']; ?>" class="card__button__link">
                <span class="beige-text"><?php _e('Learn more', 'myfood'); ?></span>
                <div class="points-button points-button--beige"><span></span></div>
              </a>
            </div>

          </div>
        </div>

        <div class="grid-l__demi">
          <div class="push-card border-box fade-in-bottom-1">
            <div class="push-card__desc">
              <i class="push-card__desc__icon icon-contact green-text dark-circle"></i>
              <p class="push-card__desc__title">
                <span class="green-text"><?php _e('An helpful', 'myfood'); ?></span>
                <?php _e('Community of Pioneer Citizen to support you', 'myfood'); ?>
              </p>
            </div>
            <div class="push-card__button card__button">
              <a href="<?php echo get_field('meetthepioneer_link')['url']; ?>" class="card__button__link">
                <span><?php _e('Learn more', 'myfood'); ?></span>
                <div class="points-button"><span></span></div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>

  <?php endif ?>

  <?php if (get_field('hasgallery')): ?>
    <section class="page-c__section" id="product-medias-slideshow">
      <div class="title title--l title--masked">
        <h2 class="title__content title__content--prefixed">
          <?php if (get_field('issuperproduct')): ?>
            <span class="title__content__number">04</span>
          <?php else: ?>
            <span class="title__content__number">02</span>
          <?php endif ?>
          <?php _e('Look at our Installations & Tutorials', 'myfood'); ?>
        </h2>
      </div>

      <?php
      $slideshow = get_field('gallery');
      if ($slideshow) get_medias_slideshow($slideshow); ?>

    </section>
  <?php endif ?>

  <?php if (get_field('issuperproduct')): ?>
    <section class="page-c__section" id="product-nav">

      <div class="back-rect">
        <div class="back-rect__rect"></div>
      </div>

      <div class="products-nav">
        <div class="grid-l">
          <a class="grid-l__demi products-nav__link" href="<?php echo get_field('prefooter_left_link')['url']; ?>">
            <h2 class="products-nav__link__title dual-tab__content__title title title--xl fade-in-bottom">
              <?php the_field('prefooter_left_subtext'); ?>
            </h2>

            <div class="products-nav__link__label title--m fade-in-bottom">
              <span><?php _e('Previous', 'myfood'); ?></span>
              <div class="points-button"><span></span></div>
            </div>
          </a>

          <a class="grid-l__demi products-nav__link" href="<?php echo get_field('prefooter_right_link')['url']; ?>">
            <h2 class="products-nav__link__title dual-tab__content__title title title--xl fade-in-bottom-1">
              <?php the_field('prefooter_right_subtext'); ?>
            </h2>

            <div class="products-nav__link__label title--m fade-in-bottom-1">
              <span><?php _e('Next', 'myfood'); ?></span>
              <div class="points-button"><span></span></div>
            </div>
          </a>

        </div>
      </div>
    </section>
  <?php else: ?>
    <section class="page-c__section" id="shop-products-list">
      
	   <div class="back-rect">
        <div class="back-rect__rect"></div>
      </div>

      <div class="title title--l title--center title--masked">
        <h2 class="title__content title__content--prefixed">
          <?php if (get_field('hasgallery')): ?>
            <span class="title__content__number">03</span>
          <?php else: ?>
            <span class="title__content__number">02</span>
          <?php endif ?>
          <?php _e('Related Products', 'myfood'); ?>
        </h2>
      </div>

      <div class="products-box-list">
        <div class="grid-l">
          <?php
		  global $product;
		  $relatedProducts;
		  $upsells = $product->get_upsells();

		  if(empty($upsells))
		  {
		    $relatedProducts = get_posts(array(
            'post_type' => 'product',
            'posts_per_page' => 3,
            'suppress_filters' => 0,
            'tax_query' => array(
              array(
                'taxonomy' => 'product_cat',
                'field' => 'id',
                'terms' => 110
              )
            ),
			));
		  }
		  else
		  {
		  $args = array(
						'post_type' => 'product',
						'posts_per_page' => 3,
						'suppress_filters' => 0,
						'post__in' => $upsells
					   );

		  $relatedProducts = get_posts($args);
		  }  
  
          ?>	  

          <?php foreach ($relatedProducts as $idx=>$product):
            $idx= $idx%3;
            ?>
            <div class="grid-l__third <?php echo "fade-in-bottom-$idx"; ?>">
              <?php get_product_box($product); ?>
            </div>
          <?php endforeach; ?>
        </div>
      </div>


    </section>
  <?php endif ?>

  <?php do_action('woocommerce_after_single_product'); ?>

</main>


<?php
do_action('woocommerce_after_main_content');

get_footer('shop'); ?>
