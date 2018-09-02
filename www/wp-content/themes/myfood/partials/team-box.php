<?php function get_team_box($teammembers){ ?>

<?php foreach($teammembers as $idx=>$member): ?>
<div class="grid-l__demi">
    <div class="card card--team team-box">
        <div class="card__infos">
            <div class="card__infos__avatar h-rounded crop-img img-c">
                <?php acf_img_echo(get_field('image', $member->ID), 'medium'); ?>
            </div>
            <div class="card__infos__social">
                <a class="bullet-point bullet-point--social" href="<?php the_field('linkedinprofilurl', $member->ID) ?>" target="_blank">
                    <span><i class="icon-linkedin"></i></span>
                </a>
            </div>
        </div>

        <div class="card__content">
            <h3 class="card__content__title title--m">
                <?php the_field('firstname', $member->ID) ?> <span class="card__content__title__lastname"><?php the_field('lastname', $member->ID) ?></span>
            </h3>
            <div class="card__content__job mention--job">
                <?php the_field('title', $member->ID) ?>
            </div>
            <div class="card__content__tags mention--light">
                <?php the_field('skills', $member->ID) ?>
            </div>
        </div>

        <div class="card__contact">
            <a class="title title--m red-text">
                <i class="icon-contact"></i>
                <?php the_field('mail', $member->ID) ?>
            </a>
        </div>

        <div class="card__quote border-box--quote ">
            <i class="border-box--quote__icon icon-quote red-text"></i>
            <p class="border-box--quote__content green-text">
                <?php the_field('catchphrase', $member->ID) ?>
            </p>
        </div>
    </div>
</div>
<?php endforeach; ?>

<?php }