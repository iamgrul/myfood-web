<?php /* Template Name: About - Medias */ ?>

<?php get_header(); ?>


<?php 
        if ( ICL_LANGUAGE_CODE === 'fr' ) $children_terms = get_term_children(151, 'partnertype');
        else if ( ICL_LANGUAGE_CODE === 'de' ) $children_terms = get_term_children(221, 'partnertype');
		else $children_terms = get_term_children(119, 'partnertype');
?>

    <main class="page-c page-partners-medias" id="template-about-medias">

        <div class="points-line"></div>

        <!--    COVER GENERIQUE START -->

        <section class="page-c__section cover-simple">

            <div class="back-rect">
                <div class="back-rect__rect back-rect__rect--full"></div>
            </div>

            <div class="cover-simple__container">

                <p class="title--center title--m green-text cover-simple__subtitle  fade-in-bottom"><?php the_field('pagetitle'); ?></p>
                <h1 class="title--center title--xxl black-text  fade-in-bottom-1"> <?php the_field('title'); ?> </h1>

            </div>

        </section>

        <!--    COVER GENERIQUE END -->

        <!--    NAV ONGLET START -->

        <div class="page-partners-medias__nav page-partners-medias__nav--desk page-partners-medias__nav--medias tabs-selector">

            <?php foreach ($children_terms as $idx => $term) : ?>

                    <?php $term_name = get_term($term, 'partnertype')->name ?>
                    <div class="tabs-selector__tab <?php if($idx === 0) echo 'tabs-selector__tab--active'?> title title--tab">
                        <div class="title__content">
                            <?php echo $term_name ?>
                        </div>
                    </div>

            <?php endforeach; ?>

        </div>


        <div class="page-partners-medias__nav page-partners-medias__nav--mobile selector--mobile">

            <?php $first_selected = get_term($children_terms[0], 'partnertype')->name ?>

            <p class="selector--mobile__selection">
                <span class="selector--mobile__selection__label"><?php echo $first_selected ?></span>
                <span class="icon-arrow"></span>
            </p>

            <ul class="selector--mobile__list">

                <?php foreach ($children_terms as $term) : ?>

                        <?php $term_name = get_term($term, 'partnertype')->name ?>

                        <li class="selector--mobile__li selector--mobile__li--active">
                           <?php echo $term_name ?>
                        </li>

                <?php endforeach; ?>

            </ul>

        </div>

        <!--    NAV ONGLET END -->



        <!--    CONTAINER PARTNER START -->

        <section class="page-partners-medias__section">

            <?php foreach ( $children_terms as $key => $term ) : ?>

                <?php $term_name = get_term($term, 'partnertype')->name?>

                <div class="grid-l page-partners-medias__container <?php if (!$key) echo 'page-partners-medias__container--active' ?>">

                    <div class="intro__rect">

                        <div class="back-rect"><div class="back-rect__rect"></div></div>

                        <div class="intro__rect__content">

                            <i class="icon-heart icon-c__circle icon-c__circle--center inl"></i>

                            <h2 class="title title--m inl">
                                <?php echo get_field('catchphrase'); ?>
                            </h2>

                        </div>

                    </div>

                    <div class="grid-l">

                        <?php

                            $medias = get_posts(array(
                                'post_type' => 'partner',
                                'posts_per_page' => -1,
                                'suppress_filters'=>0,
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'partnertype',
                                        'field' => 'id',
                                        'terms' => array($term)
                                    )
                                ),
                            ));

                        ?>

                        <?php foreach ($medias as $media): ?>

                            <div class="media-card grid-l__demi">

                                <div class="media-card__content">

                                    <div class="media-card__top">

                                        <div class="img-c">
                                           <?php acf_img_echo(get_field('image', $media->ID)) ?>
                                        </div>

                                    </div>

                                    <div class="media-card__middle">

                                        <div class="infos grid-l">

                                            <?php $hasDate = isset($media->date) && trim($media->date); ?>

                                            <?php if ( $hasDate ) :?>
                                                <p class="date red-text grid-l__demi inl"><?php echo $media->date; ?></p>
                                            <?php endif; ?>

                                            <p class="type <?php if ($hasDate) echo 'grid-l__demi' ?> inl"><?php echo $term_name?></p>

                                        </div>

                                        <div class="media-card__titles">
                                            <p class="title-xs-aktiv green-text"><?php echo $media->name; ?></p>
                                            <?php if ($media->description) : ?>
                                                <p class="title-xxs"><?php echo $media->description; ?></p>
                                            <?php endif;?>
                                        </div>

                                        <div class="content">
                                            <p><?php echo $media->quote; ?></p>
                                        </div>

                                    </div>

                                    <div class="media-card__bottom">

                                        <a href="<?php echo $media->link; ?>" class="card__button__link" target="_blank" rel="noopener">
                                            <span><?php _e('Discover','myfood'); ?></span>
                                            <div class="points-button"><span></span></div>
                                        </a>

                                    </div>

                                </div>

                            </div>

                        <?php endforeach; ?>

                    </div>

                </div>

            <?php endforeach; ?>

        </section>

        <!--    CONTAINER PARTNER END -->

    </main>

<?php get_footer(); ?>