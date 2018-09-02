<?php

get_header();

$posts_type = array(
    'post' => array('label' => __('News', 'myfood'), 'posts' => array()),
//    'product' => array('label' => __('Products', 'myfood'), 'posts' => array()),
    'pioneer' => array('label' => __('Pioneers', 'myfood'), 'posts' => array()),
    'page' => array('label' => __('Pages', 'myfood'), 'posts' => array())
);


$search = get_query_var('s');

if (have_posts()) {
    while (have_posts()) {
        the_post();
        if (isset($posts_type[$post->post_type])) {
            $posts_type[$post->post_type]['posts'][] = $post;
        }
    }
}
?>

    <main class="page-c page-simple" id="search-page">

        <div class="points-line"></div>

        <!--    COVER GENERIQUE START -->

        <section class="page-c__section cover-simple">
            <div class="cover-simple__container">
                <p class="title--center title--m green-text cover-simple__subtitle"><?php _e('Search', 'myfood'); ?></p>
                <h1 class="title--center title--xxl black-text"><?php echo $s ?></h1>
            </div>
        </section>

        <!--    COVER GENERIQUE END -->
        <?php foreach ($posts_type as $type => $post_type):
            if (count($post_type['posts'])): ?>

                <?php if ($type == "post"): ?>
                    <section class="page-search__section">
                        <div class="back-rect">
                            <div class="back-rect__rect back-rect__rect--full"></div>
                        </div>

                        <h1 class="page-search__section__title title--xl black-text"><?php echo $post_type['label']; ?>
                            <sup class="mention">(<?php echo count($post_type['posts']); ?>)</sup>
                        </h1>

                        <div class="grid-l post-list news-dbl-cols">
                            <?php foreach ($post_type['posts'] as $post): ?>
                                <div class="grid-l__demi post-box">
                                    <?php get_news_card($post); ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </section>
                <?php elseif ($type == "product"): ?>
                    <section class="page-search__section">
                        <div class="back-rect">
                            <div class="back-rect__rect back-rect__rect--full"></div>
                        </div>
                        <h1 class="page-search__section__title title--xl black-text"><?php echo $post_type['label']; ?>
                            <sup class="mention">(<?php echo count($post_type['posts']); ?>)</sup>
                        </h1>
                        <div class="grid-l post-list">
                            <?php foreach ($post_type['posts'] as $post): ?>
                                <div class="grid-l__demi post-box">
                                    <?php get_product_box(); ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </section>
                <?php elseif ($type == "pioneer"): ?>
                    <section class="page-search__section">
                        <div class="back-rect">
                            <div class="back-rect__rect back-rect__rect--full"></div>
                        </div>
                        <h1 class="page-search__section__title title--xl black-text"><?php echo $post_type['label']; ?>
                            <sup class="mention">(<?php echo count($post_type['posts']); ?>)</sup>
                        </h1>
                        <div class="grid-l post-list">
                            <?php foreach ($post_type['posts'] as $post): ?>
                                <div class="grid-l__demi post-box">
                                    <?php get_pioneer_card($post); ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </section>
                <?php elseif ($type == "page"): ?>
                    <section class="page-search__section">
                        <div class="back-rect">
                            <div class="back-rect__rect back-rect__rect--full"></div>
                        </div>
                        <h1 class="page-search__section__title title--xl black-text"><?php echo $post_type['label']; ?>
                            <sup class="mention">(<?php echo count($post_type['posts']); ?>)</sup>
                        </h1>
                        <div class="common-text">
                            <ul class="grid-l post-list page-list">
                                <?php foreach ($post_type['posts'] as $post): ?>
                                    <li class="grid-l__demi title--tab-m">
                                        <a href="<?php echo get_permalink($post->ID); ?>"><?php echo $post->post_title; ?></a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </section>
                <?php endif; ?>
            <?php endif; endforeach; ?>
        <!--    SECTIONS GENERIQUE END -->
    </main>
<?php get_footer(); ?>