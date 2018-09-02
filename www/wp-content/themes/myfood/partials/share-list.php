<?php function get_share_list(){
    global $post; ?>

    <ul class="share-box__list">
        <li class="share-box__list__item hv">
            <i class="icon-twitter"></i>
            <div class="share-box__link share-box__link--twitter">
                <a href="https://twitter.com/share" class="twitter-share-button" data-hashtags="myfood">Tweet</a>
                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
            </div>
        </li>
        <li class="share-box__list__item hv">
            <i class="icon-linkedin"></i>
            <div class="share-box__link share-box__link--linkedin">
                <script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: fr_FR</script>
                <script type="IN/Share"></script>
            </div>
        </li>
        <li class="share-box__list__item hv">
            <i class="icon-fb"></i>
            <div class="share-box__link share-box__link--facebook">
                <div class="fb-share-button" data-href="<?php echo get_permalink($post->ID); ?>/" data-layout="button"></div>

                <div id="fb-root"></div>
                <script>(function(d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0];
                        if (d.getElementById(id)) return;
                        js = d.createElement(s); js.id = id;
                        js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.5";
                        fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));
                </script>

            </div>
        </li>
    </ul>
<?php  }