<?php /* Template Name: Blog */ ?>

<?php get_header(); ?>

  <main class="page-c" id="template-blog">

    <div class="points-line"></div>

    <!--    COVER GENERIQUE START -->

    <section class="page-c__section cover-simple">

      <div class="back-rect">
        <div class="back-rect__rect back-rect__rect--full"></div>
      </div>

      <div class="cover-simple__container">

        <p class="title--center title--m green-text cover-simple__subtitle fade-in-bottom-1">
          <?php the_field('lefttitle'); ?>
        </p>
        <h1 class="title--center title--xxl black-text  fade-in-bottom-2">
          <?php the_field('title'); ?>
        </h1>

      </div>

    </section>

    <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; ?>

    <!--    COVER GENERIQUE END -->

    <?php if ($paged == 1): ?>

      <section class="page-c__section" id="blog-sticky">

        <div class="back-rect">
          <div class="back-rect__rect back-rect__rect--full"></div>
        </div>

        <div class="fade-in-bottom-3">
          <?php

          $argsSticky = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => 1,
            'offset' => 0,
            'orderby' => 'most_recent',
          );

          $querySticky = new WP_Query($argsSticky);

          if ($querySticky->have_posts()) :
            while ($querySticky->have_posts()) : $querySticky->the_post();
              get_sticky_news_card();
            endwhile;
          endif;

          ?>
        </div>
      </section>

    <?php endif; ?>

    <section class="page-c__section" id="blog-news-list">

      <div class="back-rect">
        <div class="back-rect__rect back-rect__rect--full"></div>
      </div>

      <div class="grid-l-news news-dbl-cols">
        <?php

        $argsPaged = array(
          'posts_per_page' => 6,
          'paged' => $paged,
          'post_type' => 'post',
          'post_status' => 'publish',
          'orderby' => 'most_recent'
        );

        if ($paged == 1) {
          $argsPaged['offset'] = 1;
        }

        $query = new WP_Query($argsPaged);

        if ($query->have_posts()) :
          while ($query->have_posts()) : $query->the_post();
            get_news_card();
          endwhile;
        endif;

        wp_reset_query();

        ?>
      </div>

      <div class="pagination">
        <?php echo paginate_links(array(
          'current' => max(1, get_query_var('paged')),
          'total' => $query->max_num_pages,
          'prev_text' => __('<div class="arrow-button arrow-button--prev"><i class="arrow-button__icon icon-arrow"></i><small>Prev</small><div class="points-button"><span></span></div></div>', 'myfood'),
          'next_text' => __('<div class="arrow-button arrow-button--next"><div class="points-button"><span></span></div><small>Next</small><i class="arrow-button__icon icon-arrow"></i></div>', 'myfood'),
        )); ?>
      </div>
    </section>

  </main>


<?php get_footer(); ?>