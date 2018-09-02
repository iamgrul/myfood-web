<?php function get_pioneer_card($pioneer){ ?>

    <div class="card pioneer-card">
        <div class="card__infos">
            <div class="card__infos__number h-rounded">
                <span>#<?php the_field('rowsection_1_number', $pioneer->ID); ?></span>
            </div>
            <div class="card__infos__avatar h-rounded crop-img img-c">
                <?php acf_img_echo(get_field('rowsection_1_picture', $pioneer->ID), 'medium'); ?>
            </div>
            <div class="card__infos__date h-rounded">
                <small><?php _e('Since','myfood'); ?></small>
                <span><?php the_field('rowsection_1_entrydate', $pioneer->ID); ?></span>
            </div>
        </div>
        <div class="card__container">
            <div class="card__top">
                <a class="img-c crop-img" href="<?php echo get_permalink($pioneer->ID); ?>">
                    <?php acf_img_echo(get_field('featured_image', $pioneer->ID), 'medium'); ?>
                </a>
            </div>
            <div class="card__main">
                <a class="card__content h-text-center" href="<?php echo get_permalink($pioneer->ID); ?>">
                    <h4 class="title title--sm card__content__title">
                        <?php the_field('page_title', $pioneer->ID); ?>
                    </h4>
                    <address class="card__content__mention mention mention--light">
                        <i class="icon-pin"></i>
                        <?php the_field('rowsection_1_localization', $pioneer->ID); ?>
                    </address>
                    <p class="card__content__mention mention mention--light">
                        <i class="icon-work"></i>
                        <?php the_field('title', $pioneer->ID); ?>
                    </p>
                </a>
            </div>
            <div class="card__quote border-box--quote h-text-center">
                <i class="border-box--quote__icon icon-quote red-text"></i>
                <p class="border-box--quote__content green-text">
                    <?php the_field('rowsection_1_catchphrase', $pioneer->ID); ?>
                </p>
            </div>
            <div class="card__button">
                <a href="<?php echo get_permalink($pioneer->ID); ?>" class="card__button__link">
                    <span><?php _e('Discover','myfood'); ?></span>
                    <div class="points-button"><span></span></div>
                </a>
            </div>
        </div>
    </div>

<?php }