<?php function get_seeds_slideshow($vegetables = null, $filters = true){

    if(!$vegetables){
        $vegetables = get_posts(array(
            'posts_per_page'=>-1,
            'post_type'=>'vegetable',
            'suppress_filters'=>0
        ));
    }

    $seasons = get_terms(array(taxonomy=>'season'));
    $types = get_terms(array(taxonomy=>'vegetabletype'));
    ?>
    <div class="seeds-slideshow seeds-tabs"  data-equal-h-col="2">
        <?php if($filters): ?>
          <div class="seeds-slideshow__tabs tabs-selector">
              <?php foreach($types as $idx=>$t):
                  $icon = get_field('icon', $t); ?>
                  <div class="tabs-selector__tab title title--tab <?php if($idx==0) echo 'tabs-selector__tab--active'; ?>" data-klass="<?php echo $t->slug; ?>">
                      <i class="icon-<?php echo $icon; ?> title--tab__picto"></i>
                      <div class="title__content">
                          <?php echo $t->name; ?>
                      </div>
                  </div>
              <?php endforeach; ?>
          </div>
        <?php endif; ?>
        <div class="seeds-slideshow__navigation navigation-switch navigation-switch--vertical">
            <div class="navigation-switch--vertical__buttons-c">
                <?php foreach($seasons as $i=>$s):
                    $icon = get_field('icon', $s);
                    if($i==0): ?>
                        <p class="navigation-switch__button navigation-switch__button--active" data-klass="<?php echo $s->slug; ?>">
                            <span><?php echo $s->name; ?></span> <i class="icon-<?php echo $icon; ?>"></i>
                        </p>
                    <?php else: ?>
                        <p class="navigation-switch__button" data-klass="<?php echo $s->slug; ?>">
                            <i class="icon-<?php echo $icon; ?>"></i> <span><?php echo $s->name; ?></span>
                        </p>
                    <?php endif;
                endforeach; ?>
            </div>
        </div>

        <div class="selector--mobile">
            <p class="selector--mobile__selection">
                <span class="selector--mobile__selection__label"><?php echo $types[0]->name; ?></span>
                <span class="icon-arrow"></span>
            </p>
            <ul class="selector--mobile__list">
                <?php foreach($types as $idx=>$t): ?>
                    <li class="selector--mobile__li <?php if($idx==0) echo 'selector--mobile__li--active'; ?>" data-klass="<?php echo $t->slug; ?>"><?php echo $t->name; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div class="seeds-slideshow__content mh-col">
            <div class="seeds-slideshow__tab">
                <div class="seeds-slideshow__seasons">
                    <div class="seeds-slideshow__content__slides">
                        <?php foreach($vegetables as $vege):
                            $img = get_field('image', $vege);
                            $season = get_the_terms($vege, 'season');
                            $vegetabletype = get_the_terms($vege, 'vegetabletype');

                            $class = '';
                            if($season){
                                foreach($season as $s) $class .= ' '.$s->slug;
                            }
                            if($vegetabletype && $filters){
                                foreach($vegetabletype as $t) $class .= ' '.$t->slug;
                            } ?>
                            <div class="seeds-slideshow__slide <?php echo $class; ?>">
                                <div class="seeds-slideshow__slide__img">
                                    <div class="h-rounded crop-img img-c">
                                        <?php acf_img_echo($img, 'medium');
										
										$firstLine = get_field('firstline', $vege);
										$secondLine = get_field('secondline', $vege);
										
										?>
									      <div class="img-hover">
                                            <div class="container-texts">
                                                <p><?php echo $firstLine ?></p>
                                                <p><?php echo $secondLine ?></p>
                                            </div>
                                          </div>	
                                    </div>
                                </div>
                                <p class="seeds-slideshow__slide__mention mention">
                                    <?php echo get_the_title($vege); ?>
                                </p>
                            </div>
                        <?php endforeach; ?>
                        <div class="seeds-slideshow__next-seeds">
                            <div class="seeds-slideshow__next-seeds__ct">
                                <div class="arrow-button arrow-button--next">
                                    <div class="points-button"><span></span></div>
                                    <small><?php _e('Next','myfood'); ?></small>
                                    <i class="arrow-button__icon icon-arrow"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="seeds-slideshow__back-grid mh-col">
            <div class="seeds-slideshow__back-grid__stamps">
                <?php for($d=0; $d<10; $d++): ?>
                    <div class="seeds-slideshow__back-grid__stamp"></div>
                <?php endfor; ?>
            </div>
        </div>
    </div>
<?php }