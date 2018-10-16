<?php function get_news_card($id){ ?>

    <article class="news-card news-card--light">
        <a href="<?php the_permalink(); ?>">
            <div class="news-card__cover crop-img img-c" >
                <?php echo get_the_post_thumbnail(); ?>
            </div>

            <div class="news-card__content">
                <div class="news-card__author author">
                    <div class="author__avatar h-rounded crop-img img-c">
                        <?php
                        $author_id = get_the_author_meta('ID');
                        $avatar = get_field('avatar', 'user_'. $author_id );

                        acf_img_echo($avatar, 'medium');
                        ?>
                    </div>
                    <div class="author__details">
                        <time class="author__date red-text" datetime="2018-02-02 12:00">
                            <?php the_date(); ?>
                        </time>
                        <span class="author__name">
                            <?php _e('by','myfood'); ?> <?php the_author();  ?>
                        </span>
                        <span class="author__category">
                            <?php

                            $tags = get_the_terms( $id,'category');

                            for ($i = 0; $i <= count($tags); $i++ ) {

                                echo $tags[$i]->name;
                                if ( $i < count($tags) - 1 ) echo " - ";
                            }
                            ?>
                        </span>
                    </div>
                </div>

                <div class="news-card__title title title--ml" >
                    <?php the_title(); ?>
                </div>
            </div>

            <div class="news-card__button card__button">
                <div  class="card__button__link">
                    <?php _e('Read','myfood'); ?>
                    <div class="points-button"><span></span></div>
                </div>
            </div>
        </a>
    </article>

<?php }

function get_sticky_news_card($id){ ?>

    <article class="news-card news-card--sticky">
        <a class="news-card--sticky__cover crop-img img-c" href="<?php the_permalink(); ?>">
            <?php echo get_the_post_thumbnail(); ?>
        </a>

        <div class="news-card__content news-card--sticky__content">
            <div class="news-card__author author">
                <div class="author__avatar h-rounded crop-img img-c">
                    <?php
                    $author_id = get_the_author_meta('ID');
                    $avatar = get_field('avatar', 'user_'. $author_id );

                    acf_img_echo($avatar, 'medium');
                    ?>
                </div>
                <div class="author__details">
                    <time class="author__date red-text" datetime="2018-02-02 12:00">
                        <?php the_date(); ?>
                    </time>
                    <span class="author__name">
                        <?php _e('by','myfood'); ?> <?php the_author();  ?>
                    </span>
                    <span class="author__category">
                        <?php

                        $tags = get_the_terms( $id,'category');

                        for ($i = 0; $i <= count($tags); $i++ ) {

                            echo $tags[$i]->name;
                            if ( $i < count($tags) - 1 ) echo " - ";
                        }
                        ?>
                    </span>
                </div>
            </div>

            <a class="news-card__title title title--ml" href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
            </a>

            <div class="news-card__excerpt corps">
                <p><?php the_excerpt(); ?></p>
            </div>

            <div class="news-card__button card__button">
                <a href="<?php the_permalink(); ?>" class="card__button__link">
                    <?php _e('Read','myfood'); ?>
                    <div class="points-button"><span></span></div>
                </a>
            </div>
        </div>
    </article>
<?php }