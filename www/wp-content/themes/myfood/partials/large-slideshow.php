<?php function get_large_slideshow($images = false){
    if(!$images)
        $images = get_field('rowsection_5_gallery', 5986);
    ?>

    <div class="large-slideshow popin-content-container">

        <div class="large-slideshow__container">
            <div class="circle circle--xxl"></div>
            <div class="circle circle--l"></div>
            <div class="large-slideshow__container__list">
                <?php foreach($images as $idx=>$img): ?>
                    <div class="large-slideshow__slide slide" data-open-popin="full-slideshow" data-original-idx="<?php echo $idx; ?>">
                        <div class="img-c crop-img">
                            <?php acf_img_echo($img, 'medium'); ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="large-slideshow__navigation">
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


        <div class="full-slideshow full-screen no-clone">
            <div class="full-slideshow__slides">
                <?php foreach($images as $img): ?>
                    <div class="full-slideshow__slide slide">
                        <?php acf_img_echo($img, 'large'); ?>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="full-slideshow__navigation">

                <div class="full-slideshow__index slideshow-index">
                    <span>01 / <?php echo count($images) < 10 ?  '0'+count($images) : count($images); ?></span>
                </div>

                <div class="full-slideshow__close cbutton cbutton--close-popin">
                    <i class="icon-cross cbutton--close__icon"></i>
                </div>

                <div class="arrow-button arrow-button--prev arrow-button--white">
                    <i class="arrow-button__icon icon-arrow"></i>
                    <small><?php _e('Prev','myfood'); ?></small>
                    <div class="points-button"><span></span></div>
                </div>

                <div class="arrow-button arrow-button--next arrow-button--white">
                    <div class="points-button"><span></span></div>
                    <small><?php _e('Next','myfood'); ?></small>
                    <i class="arrow-button__icon icon-arrow"></i>
                </div>

            </div>
        </div>

    </div>


<?php }