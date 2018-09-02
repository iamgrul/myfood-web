<?php function get_medias_slideshow($images = null){
    if(!$images)
        $images = get_field('rowsection_5_gallery', 5986);
    ?>
    <div class="medias-slideshow">
        <div class="medias-slideshow__container">
            <div class="medias-slideshow__container__list">
                <?php foreach($images as $idx=>$img): ?>
                <div class="medias-slideshow__slide slide">
                    <?php if($img['acf_fc_layout']=='single_image'): ?>
                        <div class="simple-img img-c crop-img">
                            <?php acf_img_echo($img['image'], 'medium'); ?>
                        </div>
                    <?php else: ?>
                        <div class="video-player popin-content-container">
                            <div class="video-player__cover" data-open-popin="popin-iframe-c">
                                <div class="cbutton cbutton--play cbutton--border--green video-player__cover__button">
                                    <i class="icon-arrow cbutton--play__icon cbutton--play__icon--solo"></i>
                                </div>
                                <div class="video-player__cover__img img-c crop-img">
                                    <?php acf_img_echo($img['cover']); ?>
                                </div>
                            </div>
                            <div class="video-player__video-c">
                                <div class="popin-iframe-c full-screen iframe-c">
                                    <div class="cbutton--close-popin"><i class="icon-cross cbutton--close__icon"></i></div>

                                    <div class="video-player__video-c">
                                        <iframe width="560" height="315" data-src="https://www.youtube.com/embed/<?php echo $img['iframe'] ?>?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="medias-slideshow__navigation">
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