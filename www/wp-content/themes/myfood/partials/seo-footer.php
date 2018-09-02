<?php function get_seo_footer($id = 'option'){ ?>

    <section class="page-c__section seo-footer collapsed">
        <div class="seo-footer__container">
            <div class="seo-footer__top">

                <h4 class="seo-footer__title title--tab-m">
                    <?php the_field('footer_title', $id); ?>
                </h4>

                <p class="seo-footer__excerpt common-text">
                    <?php the_field('footer_short', $id); ?>
                </p>

                <div class="seo-footer__button plus-button">
                    <span class="plus-button__icon"></span>
                </div>

            </div>
            <div class="seo-footer__body">
                <div class="seo-footer__body__content common-text common-text--light">
				
					<?php if ( !empty( get_the_content() ) )
					{
						echo the_content();
					}
					else
					{
						the_field('footer_content', $id);
					}
					?>

                </div>
            </div>
        </div>
    </section>

<?php }