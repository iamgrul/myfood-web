<?php get_header(); the_post(); ?>

<main class="page-c" id="single-blog">

    <div class="points-line"></div>


    <section class="page-c__section cover-simple cover-simple--image">
        <div class="back-rect">
            <div class="back-rect__rect"></div>
        </div>
        <div class="cover-simple__container">
            <div class="cover-simple__container__img crop-img fade-in-bottom">
                <?php the_post_thumbnail(); ?>
            </div>
        </div>

        <?php

        if ( ICL_LANGUAGE_CODE === 'fr' ) $page_blog = 6008;
        else if ( ICL_LANGUAGE_CODE === 'de' ) $page_blog = 6010;
        else $page_blog = 6004;

        ?>
        <div class="cover-simple__back-button hv" data-blog="<?php echo get_permalink($page_blog); ?>">
            <div class="arrow-button arrow-button--prev">
                <i class="arrow-button__icon icon-arrow"></i>
                <span><?php _e('Back','myfood'); ?></span>
            </div>
        </div>
    </section>

    <div class="single-content fade-in-bottom-1">
        <section class="page-c__section page-c__section--ml single-top ">
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
                    <?php _e('by','myfood'); ?> <?php the_author(); ?>
                </span>
                </div>
            </div>
            <h1 class="title title--l">
                <?php the_title(); ?>
            </h1>
        </section>
        <section class="page-c__section page-c__section--ml single-body">
            <div class="single-body__content common-text">
                <?php the_content(); ?>
            </div>
        </section>

    </div>


    <section class="page-c__section single-bottom">

        <div class="back-rect">
            <div class="back-rect__rect"></div>
        </div>

        <div class="single-bottom__container grid-l">
            <div class="single-bottom__share grid-l__medium">
                <div class="cbutton cbutton--dark cbutton--large">
                    <div class="cbutton__label">
                         <?php _e('Share','myfood'); ?>
                    </div>
                </div>

                <div class="share-box">
                    <?php get_share_list(); ?>
                </div>

            </div>
            <div class="single-bottom__author grid-l__large">
                <div class="single-bottom__author__infos">
                    <div class="author__avatar h-rounded crop-img img-c">
                    <?php 						
						acf_img_echo($avatar, 'medium');
					?>
                    </div>
                    <p class="author__title title--m">
                        <?php the_author(); ?>
                    </p>
                </div>
                <div class="single-bottom__author__quote">
                    <i class="icon-quote red-text"></i>
                    <p class="title title--tab-m green-text">
                        <?php echo get_the_author_meta('description');?>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="page-c__section single-others">

        <div class="back-rect">
            <div class="back-rect__rect"></div>
        </div>

        <div class="title title--l title--center">
            <h2 class="title__content black-text">
                 <?php _e('Other News','myfood'); ?>
            </h2>
        </div>

        <div class="grid-l-news news-dbl-cols">
		
		<?php 
		
		$currentID = get_the_ID();

		$args = array(
                    'post_status' => 'publish',
                    'posts_per_page' => 2,
					'offset' => 1,
                    'orderby' => 'most_recent',
					'post__not_in' => array($currentID),
                    );
					
		$query = new WP_Query($args);
		
		if ( $query->have_posts() ) :
			while ( $query->have_posts() ) : $query->the_post();
				get_news_card();	
			endwhile;
		endif;

		?>
        </div>

    </section>

    <div class="share-box share-box--fixed">
       <?php get_share_list(); ?>
    </div>


</main>
<?php get_footer(); ?>
