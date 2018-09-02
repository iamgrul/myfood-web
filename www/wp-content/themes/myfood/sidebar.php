<sidebar id="main-sidebar" class="sidebar">
    <div class="overlay"></div>
    <div class="sidebar__open-zone"></div>
    <div class="sidebar__mention">
        <p><?php _e('Get in Touch!','myfood'); ?></p>
    </div>

    <div class="sidebar__bottom sidebar__button">
        <i class="sidebar__bottom__icon icon-contact white-text"></i>
        <i class="sidebar__bottom__icon icon-cross white-text"></i>
    </div>

    <div class="sidebar__content">
        <div class="sidebar__vam">
            <a class="sidebar__content__push active" onclick='gtag_report_conversion()' href="<?php the_field('become_a_pioneer_url', 'option') ?>" target="_blank">
                <i class="sidebar__content__push__icon icon-contact"></i>
                <div class="sidebar__content__push__title title--xl">
                    <?php _e('Become a Pioneer','myfood'); ?>
                </div>
                <small class="sidebar__content__push__mention mention">
                    <?php _e('Join the Community','myfood'); ?>
                </small>
            </a>
            <a class="sidebar__content__push" onclick='gtag_report_conversion()' href="<?php the_field('contact_page', 'option')['url'] ?>">
                <i class="sidebar__content__push__icon icon-contact"></i>
                <div class="sidebar__content__push__title title--xl">
                    <?php _e('Contact Us','myfood'); ?>
                </div>
                <small class="sidebar__content__push__mention mention">
                    <?php _e('For any informations or suggestions','myfood'); ?>
                </small>
            </a>
        </div>

    </div>

    <div class="sidebar__red-mask"></div>
	
		<script type="text/javascript">
		function gtag_report_conversion(url) {
		  var callback = function () {
			if (typeof(url) != 'undefined') {
			  window.location = url;
			}
		  };
		  gtag('event', 'conversion', {
			  'send_to': 'AW-991638829/YO5YCIr45YQBEK3q7NgD',
			  'event_callback': callback
		  });
		  return false;
		}
		</script>
</sidebar>


