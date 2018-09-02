<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="<?php bloginfo('charset'); ?>"/>
  <title><?php wp_title(''); ?></title>
  <?php  wp_head(); ?>

  <link rel="icon" href="<?php echo site_url('favicon.ico'); ?>">

  <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
  <link rel="manifest" href="/favicon/site.webmanifest">
  <link rel="mask-icon" href="/favicon/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">
  
  <!-- Global site tag (gtag.js) - Google AdWords: 991638829 -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=AW-991638829"></script>
  <script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'AW-991638829');
  </script>


  
</head>

<body <?php body_class(); ?>>


<div class="hidden">
<!--    modifier l'ID du lien pour la redirection-->
<!--    en fonction de la langue-->
    <a href="<?php echo get_permalink(9811)?>" id="linkUpdateBrowser"><?php _e("Link to update browser", "myfood")?></a>
<!--    <a href="--><?php //echo get_permalink(9735)?><!--" id="linkUpdateBrowser">--><?php //_e("Link to update browser", "myfood")?><!--</a>-->
</div>

<div id="main-loader" class="main-loader">
  <div class="main-loader__picto">
    <img src="<?php get_img('misc/loader.gif'); ?>" alt="Loader Myfood" width="160" height="160">
  </div>
</div>

<header id="main-header" class="header">
  <div class="header__logo">
    <?php if(is_home()): ?>
      <h1>
        <a href="<?php echo home_url(); ?>">
          <img src="<?php get_img('misc/myfood-logo.svg'); ?>" alt="MyFood">
        </a>
      </h1>
    <?php else: ?>
      <a href="<?php echo home_url(); ?>">
        <img src="<?php get_img('misc/myfood-logo.svg'); ?>" alt="">
      </a>
    <?php endif; ?>
  </div>

  <div class="header__navs">
    <?php $pages = get_field('menu_pages', 'option'); ?>

    <nav class="header__nav header__nav--main">
      <ul class="main-list">
        <?php foreach($pages as $page):
          $children = get_pages(array(
            'child_of'=>$page->ID,
            'sort_column'=>'menu_order'
          ));
          $url = get_permalink($page); ?>

          <?php if(count($children) > 0): ?>
          <li class="header__nav__link header__nav__link--parent <?php if(strpos(CURRENT_URL, $url) !== false) echo " act ";  echo $page->post_name; ?>">
            <span><?php echo $page->post_title; ?></span>
            <div class="header__nav__link__subs sub-list">
              <ul class="sub-list__container">
                <?php foreach($children as $child):
                  $child_url = get_permalink($child);
                  ?>
                  <li class="sub-list__link <?php if(strpos(CURRENT_URL,$child_url) !== false) echo "act"; ?>">
                    <a href="<?php echo $child_url; ?>">
                      <?php echo $child->post_title; ?>
                    </a>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>
          </li>
        <?php else: ?>
          <li class="header__nav__link <?php if(strpos(CURRENT_URL,$url) !== false) echo "act"; ?>">
            <a href="<?php echo get_permalink($page); ?>">
              <?php echo $page->post_title; ?>
            </a>
          </li>
          <?php
          global $post;
          $pageId = $post->ID;
          $terms = get_terms(['taxonomy' => 'product_cat','hide_empty' => false, 'parent' => 0]);
          $url = get_permalink(SHOP_HOME_URL);
          ?>

          <li class="header__nav__link header__nav__link--parent remove-click <?php if(strpos(CURRENT_URL,$url) !== false) echo "act"; ?> shop-link">
            <a href="<?php echo $url ?>">
              <?php _e('Shop','myfood'); ?>
            </a>
            <div class="header__nav__link__subs sub-list">
              <ul class="sub-list__container">
                <?php foreach($terms as $term):
                  ?>
				  <?php if($term->name != "uncategorized"): ?>
                  <li class="sub-list__link">
                    <a href="<?php echo get_term_link($term); ?>">
                      <?php echo $term->name; ?>
                    </a>
                  </li>
				  <?php endif; ?>
                <?php endforeach; ?>
              </ul>
            </div>
          </li>

        <?php endif; ?>
        <?php endforeach; ?>

      </ul>
    </nav>

    <nav class="header__nav h-float-right">
      <ul class="icons-list">
        <li class="header__nav__link header__nav__link--icon">

          <a href="<?php echo get_permalink(4383); ?>">
            <i class="icon-bag">
              <span class="hidden"><?php _e('Cart','myfood'); ?></span>
            </i>
            <?php $cart_count = WC()->cart->get_cart_contents_count();
            if($cart_count > 0): ?>
              <span class="cart-count-patch"><?php echo $cart_count; ?></span>
            <?php endif; ?>
          </a>
        </li>

        <li class="header__nav__link header__nav__link--icon">
          <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>">
            <i class="icon-profile"><span class="hidden"><?php _e('Account','myfood'); ?></span></i>
          </a>
        </li>

        <li class="header__nav__link header__nav__link--icon open-close-search">
          <i class="icon-search"><span class="hidden"><?php _e('Search','myfood'); ?></span></i>
        </li>
      </ul>
    </nav>

    <div class="header__lang">
      <div class="lang-switch">
        <?php $languages =  icl_get_languages('skip_missing=0');
        foreach($languages as $lang): ?>
          <a class="<?php if(ICL_LANGUAGE_CODE == $lang['code']) echo 'active'; ?>" href='<?php echo $lang['url'] ?>'>
            <?php echo $lang['code']; ?>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </div>

  <div class="header__search">
    <div class="header__search__container">
      <?php get_search_form(); ?>
    </div>
  </div>

  <div id="mobile-burger-bt">
    <div class="bt">
      <span></span><span></span><span></span><span></span>
    </div>
  </div>

</header>

<?php get_sidebar(); ?>

<div id="wrapper">



