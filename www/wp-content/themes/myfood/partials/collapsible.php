<?php function get_collapsible($content){
    ?>

    <div class="collapsible collapsed">
        <div class="collapsible__top">
            <div class="collapsible__title title">
                <span class="prefix"><?php echo $content['number']; ?></span>
                <h2 class="title__content title--m">
                    <?php echo $content['title']; ?>
                </h2>

            </div>

            <div class="cbutton cbutton--circle cbutton--close cbutton--border--green collapsible__button">
                <i class="icon-cross cbutton--close__icon"></i>
            </div>
        </div>

        <div class="collapsible__body">
            <div class="common-text">
                <?php echo $content['content']; ?>
            </div>
        </div>
    </div>


<?php }