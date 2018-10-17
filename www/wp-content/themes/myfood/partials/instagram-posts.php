<?php

function get_instagram_with_token_posts(){
    $token = "2884691214.c03edf9.60a609eb014844b0883f4c9dcde64ff6";
    $url = "https://api.instagram.com/v1/users/self/media/recent/?access_token=".$token;

    $nb_posts = 10;

    $json = file_get_contents($url);
    $obj = json_decode($json, true);
    $posts = '';

    $user_url = get_field('instagram_url', 'option');

    if(!empty($obj)){
        ob_start();
        $posts_tab = array();


        foreach($obj['data'] as $idx=>$post){
          if($idx < $nb_posts){
                $posts_tab[] = array(
                  'src'=>$post['images']['low_resolution']['url'],
                  'url'=>$post['link'],
                  'likes'=>$post['likes']['count'],
                  'comments'=>$post['comments']['count']
                  );
            }
        }

        get_instagram_slideshow($posts_tab);

        $posts = ob_get_clean();
    }

    if($posts != ''){
        update_option('ax_last_instagram_date', time());
        update_option('ax_last_instagram_content', $posts);
    }else{
        $posts = get_option('ax_last_instagram_content');
    }

    return $posts;
}

function get_instagram_token_slideshow(){
//    $last = intval(get_option('ax_last_instagram_date'));
//    if (time() - $last > 60*24) {
        echo get_instagram_with_token_posts();
//    } else {
//        echo get_option('ax_last_instagram_content');
//    }
}

function get_instagram_slideshow($posts){

    ?>
    <div class="display-mobile">
        <div class="large-slideshow__container__instagramm_mobile">
            <?php foreach($posts as $post): ?>
                <div class="large-slideshow__slide slide <?php if($post['likes'] || $post['comments']) echo 'black-hv'; ?>">
                    <a class="img-c crop-img" href="<?php echo $post['url']; ?>" target="_blank" rel="noopener">
                        <img src="<?php echo $post['src']; ?>" alt="">
                        <?php if($post['likes']): ?>
                            <span class="likes"><i class="icon-heart"></i><?php echo $post['likes']; ?></span>
                        <?php endif; if($post['comments']): ?>
                            <span class="comments"><?php echo $post['comments']; ?><i class="icon-contact"></i></span>
                        <?php endif; ?>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="large-slideshow no-display-mobile">

        <div class="large-slideshow__container">
            <div class="circle circle--xxl"></div>
            <div class="circle circle--l"></div>
            <div class="large-slideshow__container__list">
                <?php foreach($posts as $post): ?>
                    <div class="large-slideshow__slide slide <?php if($post['likes'] || $post['comments']) echo 'black-hv'; ?>">
                        <a class="img-c crop-img" href="<?php echo $post['url']; ?>" target="_blank" rel="noopener">
                          <img src="<?php echo $post['src']; ?>" alt="">
                            <?php if($post['likes']): ?>
                                <span class="likes"><i class="icon-heart"></i><?php echo $post['likes']; ?></span>
                            <?php endif; if($post['comments']): ?>
                              <span class="comments"><?php echo $post['comments']; ?><i class="icon-contact"></i></span>
                            <?php endif; ?>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="large-slideshow__navigation">
            <div class="arrow-button arrow-button--prev">
                <i class="arrow-button__icon icon-arrow"></i>
                <small><?php _e('Prev','myfood'); ?></small>
                <div class="points-button"><span></span></div>
            </div>

            <div class="arrow-button arrow-button--next">
                <div class="points-button"><span></span></div>
                <small><?php _e('Next','myfood'); ?></small>
                <i class="arrow-button__icon icon-arrow"></i>
            </div>

        </div>
    </div>

    <?php
}
