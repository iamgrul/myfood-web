<?php function get_customizable_tabs($modules){ ?>


    <div class="customize-tabs">

        <div class="customize-tabs__tabs">
            <div class="grid-l customize-tabs__detail-view switch-tab">
                <div class="grid-l__large">
                    <div class="customize-tabs__layout layout">
                        <div class="layout__content">
                            <div class="layout__points">
                                <div class="layout__point bullet-point active"><span>1</span></div>
                                <div class="layout__point bullet-point"><span>2</span></div>
                                <div class="layout__point bullet-point"><span>3</span></div>
                                <div class="layout__point bullet-point"><span>4</span></div>
                                <div class="layout__point bullet-point"><span>5</span></div>
                                <div class="layout__point bullet-point"><span>6</span></div>
                                <div class="layout__point bullet-point"><span>7</span></div>
                            </div>
                            <div class="customize-tabs__layout__img layout__img">
                                <?php echo_img('layouts/sgh_family.png'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid-l__medium customize-tabs__detail-card">
                    <?php foreach($modules as $i=>$module): ?>
                        <?php get_customizeble_module_card($module, $i==0 ? 'active': '', ($i+1)); ?>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="customize-tabs__cards-view switch-tab">
                <?php get_modules_slideshow($modules); ?>
            </div>
        </div>



        <div class="customize-tabs__navigation">
            <div class="arrow-button arrow-button--prev arrow-button--white">
                <i class="arrow-button__icon icon-arrow"></i>
                <small><?php _e('Prev','myfood'); ?></small>
                <div class="points-button"><span></span></div>
            </div>

            <div class="navigation-switch">
                <p class="navigation-switch__button navigation-switch__button--active">
                    <span><?php _e('General View','myfood'); ?></span> <i class="icon-greenhouse"></i>
                </p>

                <p class="navigation-switch__button">
                    <i class="icon-deck"></i> <span><?php _e('All Modules','myfood'); ?></span>
                </p>
            </div>

            <div class="arrow-button arrow-button--next arrow-button--white">
                <div class="points-button"><span></span></div>
                <small><?php _e('Next', 'myfood'); ?></small>
                <i class="arrow-button__icon icon-arrow"></i>
            </div>
        </div>
    </div>


<?php }