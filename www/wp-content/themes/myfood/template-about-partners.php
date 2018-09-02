<?php /* Template Name: About - Partners */ ?>

<?php get_header(); ?>

<?php 
        if ( ICL_LANGUAGE_CODE === 'fr' ) $children_terms = get_term_children(226, 'partnertype');
        else if ( ICL_LANGUAGE_CODE === 'de' ) $children_terms = get_term_children(225, 'partnertype');
		else $children_terms = get_term_children(227, 'partnertype');
?>

    <main class="page-c page-partners-medias" id="template-about-partners">
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

        <div class="page-partners-medias__nav page-partners-medias__nav--desk tabs-selector">
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


        <!--    PARTNERS START -->

        <section class="page-partners-medias__section">

		<?php foreach ( $children_terms as $key => $term ) : ?>
		
			<?php $term_name = get_term($term, 'partnertype')->name?>

            <!--    CONTAINER PARTNER  START -->
            <div class="page-partners-medias__container grid-l <?php if(!$key) echo 'page-partners-medias__container--active'; ?>">

                <div class="intro__rect">
                    <div class="back-rect"><div class="back-rect__rect"></div></div>
                    <div class="intro__rect__content">
                        <i class="icon-heart icon-c__circle icon-c__circle--center"></i>
                        <h2 class="title title--m">
                            <?php the_field('catchphrase'); ?>
                        </h2>
                    </div>
                </div>

                <div class="grid-l">
				
				    <?php

                            $partners = get_posts(array(
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

                    <?php foreach($partners as $partner): ?>

                        <div class="partner-card grid-l__demi">

                            <a target="_blank" href="<?php echo $partner->link; ?>">

                                <div class="partner-card__logo">
                                    <div class="img-c">
                                        <?php acf_img_echo(get_field('image', $partner->ID)); ?>
                                    </div>
                                </div>

                                <div class="partner-card__texts">
                                    <p class="partner-card__title title-xs-aktiv green-text"><?php echo $partner->name; ?></p>
                                    <p class="partner-card__description"><?php echo $partner->description; ?></p>
                                </div>

                            </a>

                        </div>

                    <?php endforeach; ?>
                </div>
            </div>
            <!--    CONTAINER PARTNER END -->
            <?php endforeach; ?>
        </section>

        <!--    PARTNERS END -->

    </main>

<?php get_footer(); ?>