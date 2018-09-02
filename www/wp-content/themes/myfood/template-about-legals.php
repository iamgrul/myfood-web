<?php /* Template Name: About - Legals */ ?>

<?php get_header(); ?>



    <main class="page-c page-simple" id="template-about-legals">

        <div class="points-line"></div>

        <!--    COVER GENERIQUE START -->

        <section class="page-c__section cover-simple">

            <div class="back-rect">
                <div class="back-rect__rect back-rect__rect--full"></div>
            </div>

            <div class="cover-simple__container">

                <p class="title--center title--m green-text cover-simple__subtitle fade-in-bottom"><?php _e('About','myfood'); ?></p>
                <h1 class="title--center title--xxl black-text fade-in-bottom-1"><?php echo get_the_title() ?>.</h1>

            </div>

        </section>

        <!--    COVER GENERIQUE END -->


        <!--    SECTIONS GENERIQUE START -->
        <?php $max_elements = 2 ?>

        <?php for ($i = 0; $i <= $max_elements; $i++) : ?>

            <section class="page-simple__section">

                <div class="page-simple__title title title--l grid-l">
                    <h2 class="title__content title__content--prefixed grid-l__large">
                        <span class="title__content__number"><?php echo '0'.($i + 1) ?></span>
                        Operating Requirement.
                    </h2>
                </div>

                <div class="page-simple__content common-text grid-l">

                    <div class="grid-l__large page-simple__texts">


                        <h3>
                            What are the operating requirement for the installation
                            of a smart greenhouse?
                        </h3>


                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius, ipsum nec feugiat viverra,
                            eros ante commodo metus, vel feugiat dolor odio dignissim turpis. Mauris porttitor elit urna,
                            at dapibus leo pharetra nec. Proin elementum ante nec leo egestas mollis. In commodo dolor in ligula cursus,
                            ac vulputate felis consequat. Suspendisse potenti. Nunc ac nibh finibus, gravida ex sed, maximus orci.
                            Etiam sed urna at enim mollis vestibulum. Etiam mollis, felis a tempus malesuada, urna sapien suscipit dui,
                            at imperdiet ipsum sem in libero. Mauris dui massa, facilisis nec lobortis et, luctus ut risus.
                            Vivamus at nisi eget arcu imperdiet vestibulum in et nibh. Duis a orci nisi. Vestibulum vel ante vehicula,
                            gravida orci scelerisque, feugiat lectus. Sed vestibulum magna vitae sollicitudin aliquam.
                            Nam ullamcorper pretium nisl, sed luctus augue laoreet vitae. Morbi nec iaculis ligula.
                            Aliquam vitae vestibulum diam.
                        </p>


                        <ul>

                            <li>
                                A flat ground is essential for water tanks to be operational
                            </li>

                            <li>
                                The greenhouse must also benefit from a nearby water point in order to fill
                                the tanks and make the refill from time to time.
                            </li>

                            <li>
                                An electrical connection can be also essential to activate the pump of ponds.
                                However, this can be avoided if you choose to install our solar panels:
                                your greenhouse will then be totally autonomous in energy
                            </li>
                        </ul>


                        <p>
                            <strong>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            </strong>
                        </p>


                    </div>

                </div>

            </section>

        <?php endfor; ?>

        <!--    SECTIONS GENERIQUE END -->



    </main>

<?php get_footer(); ?>