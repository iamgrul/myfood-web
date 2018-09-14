<?php function get_medias_slideshow($images = null){
    if(!$images)
        $images = get_field('rowsection_5_gallery', 5986);
    ?>
    <div class="medias-slideshow popin-content-container">
        <div class="medias-slideshow__container">
            <div class="medias-slideshow__container__list">
                <?php foreach($images as $idx=>$img): ?>
                <div class="medias-slideshow__slide slide" data-open-popin="full-slideshow" data-original-idx="<?php echo $idx; ?>">
                    <?php if($img['acf_fc_layout']=='single_image'): ?>
                        <div class="simple-img img-c crop-img">
                            <?php acf_img_echo($img['image'], 'medium'); ?>
                        </div>
                    <?php else: ?>
                        <div class="video-player">
                            <div class="video-player__cover" data-open-popin="popin-iframe-c">
                                <div class="cbutton cbutton--play cbutton--border--green video-player__cover__button">
                                    <i class="icon-arrow cbutton--play__icon cbutton--play__icon--solo"></i>
                                </div>
                                <div class="video-player__cover__img img-c crop-img">
                                    <?php acf_img_echo($img['cover']); ?>
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

        <div class="full-slideshow full-screen no-clone">
            <div class="full-slideshow__slides">
                <?php foreach($images as $img): ?>
                    <div class="full-slideshow__slide slide">
                        <?php if($img['acf_fc_layout']=='single_image'): ?>
                            <?php acf_img_echo($img['image'], 'large'); ?>
                        <?php else: ?>
                            <div class="video-player__video-c">
                                <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $img['iframe'] ?>?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                            </div>
                        <?php endif; ?>
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