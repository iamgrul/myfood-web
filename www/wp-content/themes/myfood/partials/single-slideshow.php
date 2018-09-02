<?php function get_single_slideshow($images = false){
    if(!$images) return; 
    ?>
    <div class="single-slideshow">

        <div class="single-slideshow__container">
            <div class="single-slideshow__mask mask mask--green"></div>
            <div class="single-slideshow__container__slides">
                <?php foreach($images as $idx=>$img): ?>
                    <div class="single-slideshow__slide crop-img img-c">
                        <?php acf_img_echo($img, 'large', 'single-slideshow__slide__img'); ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="single-slideshow__navigation">
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