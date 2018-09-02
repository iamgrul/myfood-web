<?php function get_product_box($product){ ?>

  <div class="card card--product">
    <div class="card__container">

      <a class="card__top" href="<?php echo get_permalink($product->ID); ?>">
        <?php
        $nocrop_img = get_field('tinyimage', $product->ID);
        if($nocrop_img): ?>
          <div class="img-c center-img">
            <?php acf_img_echo($nocrop_img, 'medium'); ?>
          </div>
        <?php else: ?>
          <div class="img-c crop-img">
            <?php acf_img_echo(get_field('featured_image', $product->ID), 'medium'); ?>
          </div>
        <?php endif; ?>
      </a>

      <a class="card__main" href="<?php echo get_permalink($product->ID); ?>">
        <p class="mention--term green-text">
          <?php
          $terms = get_the_terms($product->ID, 'product_cat' );
          foreach ( $terms as $term ){
            if ( $term->parent == 0 ) {
              echo $term->name . "&nbsp;";
            }
          }
          ?>
        </p>

        <div class="card__content">
          <h3 class="title title--card-sm">
            <?php the_field('productname', $product->ID); ?>
          </h3>

          <p class="mention mention--small grey-text">
            <?php the_field('catchphrase', $product->ID); ?>
          </p>
        </div>
      </a>

      <div class="card__button card__button">
        <a href="<?php echo get_permalink($product->ID); ?>" class="card__button__link card__button__link--add-to-bag">
          <span class="card__button__price title--m"> <?php the_field('productfullprice', $product->ID); ?></span>
          <div class="points-button">
            <p class="points-button__mention"><?php _e('Buy','myfood'); ?></p>
            <span></span>
          </div>
        </a>
      </div>

    </div>
  </div>

  <?php
}