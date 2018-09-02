<?php function get_modules_slideshow($modules){ ?>

  <div class="modules-slideshow">

    <div class="modules-slideshow__container">
      <div class="modules-slideshow__container__list">
        <?php
        $loop = count($modules) < 6 ? 2 : 1;
        for($i=0;$i<$loop;$i++):
        foreach($modules as $idx => $module): ?>
          <div class="modules-slideshow__slide slide <?php if($idx!=0) echo 'closed'; ?>">
            <?php get_module_card($module, '', strval($idx+1)); ?>
            <div class="module-details">

              <div class="module-details__mobile-switch">
                <i class="icon-cross cbutton--close__icon"></i>
              </div>

              <div class="module-details__list-ct">
                <ul class="module-details__list">
                  <li class="module-details__item">
                    <i class="module-details__item__icon icon-<?php the_field('item1ico', $module); ?>"></i>
                    <span class="module-details__item__qty"><?php the_field('item1number', $module); ?></span>
                    <p class="module-details__item__mention"><?php the_field('item1name', $module); ?></p>
                  </li>
                  <li class="module-details__item">
                    <i class="module-details__item__icon icon-<?php the_field('item2ico', $module); ?>"></i>
                    <span class="module-details__item__qty"><?php the_field('item2number', $module); ?></span>
                    <p class="module-details__item__mention"><?php the_field('item2name', $module); ?></p>
                  </li>
                  <li class="module-details__item">
                    <i class="module-details__item__icon icon-<?php the_field('item3ico', $module); ?>"></i>
                    <span class="module-details__item__qty"><?php the_field('item3number', $module); ?></span>
                    <p class="module-details__item__mention"><?php the_field('item3name', $module); ?></p>
                  </li>
                  <li class="module-details__item">
                    <i class="module-details__item__icon icon-<?php the_field('item4ico', $module); ?>"></i>
                    <span class="module-details__item__qty"><?php the_field('item4number', $module); ?></span>
                    <p class="module-details__item__mention"><?php the_field('item4name', $module); ?></p>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        <?php endforeach; endfor;?>
      </div>
    </div>

    <div class="modules-slideshow__navigation">
      <div class="arrow-button arrow-button--prev">
        <i class="arrow-button__icon icon-arrow"></i>
        <small><?php _e('Prev','myfood'); ?></small>
        <div class="points-button"><span></span></div>
      </div>

      <div class="arrow-button arrow-button--next">
        <div class="points-button"><span></span></div>
        <small><?php _e('Next', 'myfood'); ?></small>
        <i class="arrow-button__icon icon-arrow"></i>
      </div>

    </div>
  </div>

<?php }