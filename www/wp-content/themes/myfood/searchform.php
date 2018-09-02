<form action="<?php echo home_url( '/' ); ?>" id="search-header">
    <input type="text" name="s" class="header__search__input"  placeholder="<?php _e('Search something','myfood'); ?>." />

    <div class="header__search__button cbutton cbutton--border cbutton--border--green cbutton--small">
        <p class="black-text">OK</p>
    </div>

    <div class="header__search__close open-close-search">
        <i class="icon-cross"></i>
    </div>

    <input type="submit" class="hidden">
</form>
