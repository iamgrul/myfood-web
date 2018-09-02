<?php function get_products_tabs($products){ ?>

<div class="products-tabs">
    <img src="<?php get_img('icons/icon-greenhouse-hover.svg'); ?>" alt="" style="display: none">
    <img src="<?php get_img('icons/icon-city-hover.svg'); ?>" alt="" style="display: none">
    <img src="<?php get_img('icons/icon-aerospring-hover.svg'); ?>" alt="" style="display: none">

    <div class="products-tabs__head tabs-selector">
        <?php foreach($products as $idx => $product): ?>
        <div class="head-selector tabs-selector__tab title title--tab <?php if($idx==0) echo 'head-selector--active'; ?>">

            <i class="title--tab__picto icon-<?php echo $product['ico']; ?>"></i>

            <div class="title__content">
                <?php echo $product['categoryname']; ?>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <div class="selector--mobile">
        <p class="selector--mobile__selection">
            <span class="selector--mobile__selection__label"><?php echo $products[0]['categoryname']; ?></span>
            <span class="icon-arrow"></span>
        </p>
        <ul class="selector--mobile__list">
            <?php foreach($products as $idx => $product): ?>
                <li class="head-selector selector--mobile__li"><?php echo $product['categoryname']; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div class="products-tabs__body">
    <?php foreach($products as $idx=>$product): ?>

        <div class="products-tabs__body__tab dual-tab <?php if($idx==0) echo 'dual-tab--active'; ?>">
            <div class="dual-tab__left">
                <div class="dual-tab__mask-container">
                    <div class="dual-tab__mask mask  mask--green"></div>
                </div>

                <div class="dual-tab__medias">
                    <div class="dual-tab__medias__layout switch-tab">

                        <div class="dual-tab__medias__layout__price">
                            <p><?php _e('Start from', 'myfood'); ?></p>
                            <span class="green-text"><?php echo $product['startprice']; ?></span>
                        </div>

                        <div class="dual-tab__medias__layout__image">
                            <?php acf_img_echo($product['productimage'], 'large'); ?>
                        </div>
                    </div>

                    <div class="dual-tab__medias__slideshow switch-tab">
                        <div class="images-slideshow">
                            <div class="mask mask--green"></div>
							
                            <?php foreach($product['visualimages'] as $image): ?>
                                <div class="images-slideshow__image">
                                    <div class="crop-img img-c">
                                        <?php acf_img_echo($image, 'large'); ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <div class="dual-tab__navigation">

                    <div class="arrow-button arrow-button--prev arrow-button--white">
                        <i class="arrow-button__icon icon-arrow"></i>
                        <small><?php _e('Prev','myfood'); ?></small>
                        <div class="points-button"><span></span></div>
                    </div>

                    <div class="navigation-switch">
                        <p class="navigation-switch__button navigation-switch__button--active">
                            <span><?php _e('Layout','myfood'); ?></span> <i class="icon-greenhouse"></i>
                        </p>

                        <p class="navigation-switch__button">
                            <i class="icon-pictures"></i> <span><?php _e('Visual','myfood'); ?></span>
                        </p>
                    </div>

                    <div class="arrow-button arrow-button--next arrow-button--white">
                        <div class="points-button"><span></span></div>
                        <small><?php _e('Next','myfood'); ?></small>
                        <i class="arrow-button__icon icon-arrow"></i>
                    </div>

                </div>

            </div>
            <div class="dual-tab__right">
                <div class="dual-tab__content">
                    <div class="dual-tab__content__title title title--xl">
                        <div class="title__content">
                            <?php echo $product['modelname']; ?>
                        </div>
                    </div>

                    <p class="dual-tab__content__technicals mention">
                        <?php echo $product['detail']; ?>
                    </p>

                    <div class="dual-tab__content__quote border-box border-box--quote">
                        <i class="border-box--quote__icon icon-quote red-text"></i>
                        <p class="border-box--quote__content green-text">
                            <?php echo $product['modelecatchup']; ?>
                        </p>
                    </div>

                    <a class="dual-tab__content__cta" href="<?php echo $product['learnmorelink']['url']; ?>">
                        <span><?php _e('Order Now','myfood'); ?></span>
                        <div class="points-button points-button--beige"><span></span></div>
                    </a>

                </div>
            </div>
        </div>

    <?php endforeach; ?>
    </div>
</div>

    <?php
}