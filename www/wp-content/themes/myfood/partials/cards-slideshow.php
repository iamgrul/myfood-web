<?php function get_cards_slideshow($pioneers){ ?>

    <div class="cards-slideshow">
        <div class="cards-slideshow__container">
            <?php foreach($pioneers as $idx=>$pioneer): ?>
                <div class="cards-slideshow__container__card card slide">


                    <div class="card__infos">
                        <div class="card__infos__number h-rounded">
                            <span>#<?php the_field('rowsection_1_number', $pioneer->ID) ?></span>
                        </div> 
                        <div class="card__infos__avatar h-rounded crop-img img-c">
                            <?php acf_img_echo(get_field('rowsection_1_picture', $pioneer->ID), 'medium'); ?>
                        </div>
                        <div class="card__infos__date h-rounded">
                            <small><?php _e('Since','myfood'); ?></small>
                            <span><?php the_field('rowsection_1_entrydate', $pioneer->ID); ?></span>
                        </div>
                    </div>

                    <div class="card__fake-top"> </div>
                    <a href="<?php echo get_permalink($pioneer->ID); ?>">
                        <div class="card__top">
                            <div class="img-c crop-img" >
                                <div class="mask mask--beige"></div>
                                <?php acf_img_echo(get_field('featured_image', $pioneer->ID), 'medium'); ?>
                            </div>
                        </div>

                        <div class="card__container">
                            <div class="card__main">
                                <div class="card__content h-text-center" >
                                    <h4 class="title title--sm card__content__title">
                                        <?php the_field('page_title', $pioneer->ID) ?>
                                    </h4>
                                    <address class="card__content__mention mention mention--light">
                                        <i class="icon-pin"></i>
                                        <?php the_field('rowsection_1_localization', $pioneer->ID) ?>
                                    </address>
                                    <p class="card__content__mention mention mention--light">
                                        <i class="icon-work"></i>
                                        <?php the_field('title', $pioneer->ID) ?>
                                    </p>
                                </div>
                            </div>
                            <div class="card__bottom">
                                <div class="card__quote border-box--quote h-text-center">
                                    <i class="border-box--quote__icon icon-quote red-text"></i>

                                    <p class="border-box--quote__content green-text">
                                        <?php the_field('rowsection_1_catchphrase', $pioneer->ID) ?>
                                    </p>
                                </div>
                                <div class="card__button">
                                    <div  class="card__button__link">
                                        <span><?php _e('Discover','myfood'); ?></span>
                                        <div class="points-button"><span></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="cards-slideshow__navigation">
            <div class="arrow-button arrow-button--prev">
                <i class="arrow-button__icon icon-arrow"></i>
                <small><?php _e('Prev','myfood'); ?></small>
                <div class="points-button"><span></span></div>
            </div>

            <div class="arrow-button arrow-button--next">
                <div class="points-button"><span></span></div>
                <small><?php _e('Next','myfood'); ?></small>
                <i class="arrow-button__icon icon-arrow"></i>
            </div>
        </div>
    </div>



<?php }