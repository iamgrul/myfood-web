</div>
<?php get_gdrpbox(); ?>

<footer id="footer" class="footer">

  <div class="footer__top">
    <div class="footer__logo">
      <a href="<?php echo home_url(); ?>">
        <img src="<?php get_img('misc/myfood-logo.svg'); ?>" alt="">
      </a>
    </div>


    <div class="footer__top__right">
      <div class="footer__button">
        <?php if($presskit = get_field('press_kit', 'option')): ?>
          <a class="cbutton cbutton--border cbutton--border--green" href="<?php echo $presskit; ?>" download  target="_blank">
            <p class="black-text">
              <?php _e('Download Press Kit','myfood'); ?>
            </p>
          </a>
        <?php endif; ?>
      </div>

      <ul class="footer__socials">
        <?php if($fb = get_field('facebook_url', 'option')): ?>
          <li class="footer__socials__link hv fb">
            <a href="<?php echo $fb; ?>" rel="noopener" target="_blank"><i class="icon-fb"></i></a>
          </li>
        <?php endif; ?>
        <?php if($twitter = get_field('twitter_url', 'option')): ?>
          <li class="footer__socials__link hv tw">
            <a href="<?php echo $twitter; ?>" rel="noopener" target="_blank"><i class="icon-twitter"></i></a>
          </li>
        <?php endif; ?>
        <?php if($insta = get_field('instagram_url', 'option')): ?>
          <li class="footer__socials__link hv insta">
            <a href="<?php echo $insta; ?>" rel="noopener" target="_blank"><i class="icon-insta"></i></a>
          </li>
        <?php endif; ?>
        <?php if($lkd = get_field('linkedin_url', 'option')): ?>
          <li class="footer__socials__link hv lkd">
            <a href="<?php echo $lkd; ?>" rel="noopener" target="_blank"><i class="icon-linkedin"></i></a>
          </li>
        <?php endif; ?>
        <?php if($yt = get_field('youtube_url', 'option')): ?>
          <li class="footer__socials__link hv yt">
            <a href="<?php echo $yt; ?>" rel="noopener" target="_blank"><i class="icon-youtube"></i></a>
          </li>
        <?php endif; ?>
      </ul>
    </div>



  </div>



  <?php $pages = get_field('footer_nav', 'option'); ?>
  <div class="footer__main">

    <?php foreach($pages as $page):
      $children = get_pages(array(
        'child_of'=>$page->ID,
        'sort_column'=>'menu_order'
      )); ?>

      <div class="footer__main__nav">
        <?php if(count($children) > 0): ?>
          <span class="footer__main__nav__title"><?php echo $page->post_title; ?></span>
          <ul class="footer__main__nav__list">
            <?php foreach($children as $child): ?>
              <li>
                <a href="<?php echo get_permalink($child); ?>">
                  <?php echo $child->post_title; ?>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
        <?php else: ?>
          <a class="footer__main__nav__title" href="<?php echo get_permalink($page); ?>"><?php echo $page->post_title; ?></a>
        <?php endif; ?>
      </div>
    <?php endforeach; ?>

    <div class="footer__main__nav">

      <?php $terms = get_terms(['taxonomy' => 'product_cat','hide_empty' => false, 'parent' => 0]);?>
      <a class="footer__main__nav__title" href="<?php echo get_permalink(SHOP_HOME_URL); ?>"><?php _e('Shop','myfood'); ?></a>
      <ul class="footer__main__nav__list">
        <?php foreach($terms as $term): ?>
		<?php if($term->name != "uncategorized"): ?>
          <li>
            <a href="<?php echo get_term_link($term); ?>">
              <?php echo $term->name; ?>
            </a>
          </li>
		<?php endif; ?>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>

  <div class="footer__newsletter">
    <div class="footer__newsletter__labels">
      <label for="newsletter-input" class="green-text"><?php _e('Newsletter','myfood'); ?></label>
      <small><?php _e('Subscribe to our newsletter and follow our new adventures','myfood'); ?></small>
    </div>
    <div class="footer__newsletter__input"  data-error-message="<?php _e('Invalid email address','myfood'); ?>"  data-validation-message="<?php _e('Thank you for subscribing','myfood'); ?>">
      <input type="text" placeholder="<?php _e('Your email address','myfood'); ?>" id="newsletter-input">
      <input type="hidden" name="language_code" value="<?php echo ICL_LANGUAGE_CODE; ?>">
      <span class="valid-newsletter-input"><?php _e('OK','myfood'); ?></span>
    </div>
  </div>

  <div class="footer__bottom">

    <ul class="footer__bottom__nav">
      <li>
        <a href="<?php the_field('blog_page', 'option'); ?>" class="green-text">
          <?php _e('Blog','myfood'); ?>
        </a>
      </li>
      <li>
        <a href="<?php the_field('faq_page', 'option'); ?>" class="green-text">
          <?php _e('FAQ','myfood'); ?>
        </a>
      </li>
      <li>
        <a href="<?php the_field('contact_page', 'option'); ?>" class="red-text">
          <?php _e('Contact','myfood'); ?>
        </a>
      </li>
    </ul>

    <small class="footer__bottom__legals">
      <a href=""><?php _e('CGV','myfood'); ?></a> - <a href=""><?php _e('Legal','myfood'); ?></a> - <?php echo date('Y'); ?>. <?php _e('myfood France SAS All Rights reserved.','myfood'); ?>
    </small>
  </div>

  <svg xmlns="http://www.w3.org/2000/svg" version="1.1" id="goey-effect-svg">
    <defs>
      <filter id="fancy-goo">
        <feGaussianBlur in="SourceGraphic" stdDeviation="7" result="blur" />
        <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7" result="goo" />
        <feComposite in="SourceGraphic" in2="goo" operator="atop"/>
      </filter>
    </defs>
  </svg>

</footer>


<div id="global-popin">
  <div class="popin-ct">
    <div class="overlay"></div>
    <div class="close-bt"><span></span><span></span></div>
    <div class="pop-ct"></div>
  </div>
</div>

<?php wp_footer(); ?>
</body>
</html>