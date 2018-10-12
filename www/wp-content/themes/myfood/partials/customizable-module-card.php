<?php function get_customizeble_module_card($module, $class = "", $bullet = null){ ?>

    <div class="card card--module <?php echo $class; ?> popin-content-container">
        <div class="card__container" data-open-popin="module-popin">
            <div class="card__module"   >
                <?php if($bullet): ?>
                <div class="card__module__point bullet-point">
                    <span><?php echo $bullet; ?></span>
                </div>
                <?php endif; ?>
                <div class="card__module__img">
                    <?php acf_img_echo(get_field('image', $module), 'medium'); ?>
                </div>
                <h4 clascustomize-tabs__tabss="card__module__title title title--tab-m">
                    <span class="green-text"><?php _e('Module','myfood'); ?></span> <?php the_field('name', $module); ?>
                </h4>
                <div class="card__module__mention mention mention--small">
                    <?php the_field('description', $module); ?>
                </div>
            </div>

            <div class="card__button card__button--module">
                <div class="card__button__link" >
                    <span><?php _e('Learn more','myfood'); ?></span>
                    <div class="points-button"><span></span></div>
                </div>
            </div>
        </div>
        <div class="module-popin">
            <div class="module-popin__content">

                <div class="module-popin__top">
                    <div class="module-popin__top__point bullet-point">
                        <span><?php echo $bullet; ?></span>
                    </div>
                    <div class="module-popin__top__title">
                        <h3 class="title--tab-m"> <span class="green-text"><?php _e('Module','myfood'); ?></span> <?php the_field('name', $module); ?></h3>
                        <p class="mention"><?php the_field('description', $module); ?></p>
                    </div>

                    <div class="module-popin__close cbutton cbutton--close">
                        <i class="icon-cross cbutton--close__icon"></i>
                    </div>
                </div>

                <div class="module-popin__body">
                    <div class="module-popin__body__content common-text green-text">
						          <?php the_field('largedescription', $module); ?>
                    </div>
                    <div class="module-popin__body__layout">
                      <?php acf_img_echo(get_field('image', $module), 'medium'); ?>
                    </div>
                </div>
            </div>
            <div class="module-popin__img crop-img img-c">
                <?php acf_img_echo(get_field('picture', $module), 'large'); ?>
            </div>
        </div>
    </div>

<?php }