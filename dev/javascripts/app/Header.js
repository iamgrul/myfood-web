class Header{
  constructor(){
    const t=this
    t.init()
  }


  init(){
    const t=this

    t.$ = $('#main-header')

    t.maxTop = convertRemToPixels(90)

    if($window.scrollTop() > t.maxTop) {
      t.$.addClass('fx')
    }

    t.sc = 0

    t.lastSc = 0

    $window.on('scroll', t.onScroll.bind(t))

    t.setupSearch()

    t.setupSidebar()

    t.initMobileMenu()

    t.setupHover()

    t.checkShop()

    t.GDRPinit();

      $window.on('resize', ()=>{
      t.maxTop = convertRemToPixels(90)
    })
  }
  setupHover(){
    const t=this

    if(isTablet()){
      $window.on('click', function(e){
        if(!$(e.target).parents('.header__nav--main').length > 0 && ww > breakpoints.sm){
          t.$.find('.header__nav__link').removeClass('hvd')
        }
      })
    }else{
      t.$.find('.header__nav__link').on('mouseenter', function(){
        if(ww > breakpoints.sm){
          t.$.find('.force-open').removeClass('hvd')
          $(this).addClass('hvd')
        }
      })
      t.$.find('.header__nav__link').on('mouseleave', function(){
        if(ww > breakpoints.sm){
          $(this).removeClass('hvd')
          t.$.find('.force-open').addClass('hvd')
        }
      })
    }
  }
  onScroll(){
    const t=this

    t.sc = $window.scrollTop()

    if(t.sc > t.maxTop ) {
      t.$.addClass('masked fx')
    }  else {
      t.$.removeClass('masked fx')
    }

    if(t.lastSc - t.sc > 0 && t.$.addClass('masked'))  t.$.removeClass('masked')

    t.lastSc = t.sc
  }
  initMobileMenu(){
    const t=this

    t.menuOpened = false

    t.$menuBtn = t.$.find('#mobile-burger-bt')

    $window.on('click',(e)=>{
      if(!$(e.target).parents('#main-header').length > 0)
        t.closeMobileMenu()
    })

    t.$menuBtn.on('click',()=>{
      if(t.menuOpened)
        t.closeMobileMenu()
      else
        t.openMobileMenu()
    })

    t.setupSubNav()

  }
  openMobileMenu(){
    const t=this

    t.menuOpened = true
    t.$.addClass('menu-open')
    t.$menuBtn.addClass('open')
    disable_scroll()

  }
  closeMobileMenu(){
    const t=this

    if(!t.menuOpened) return false

    t.menuOpened = false
    t.$.removeClass('menu-open')
    t.$menuBtn.removeClass('open')
    enable_scroll()
  }
  setupSubNav(){
    const t=this

    t.$.find('.header__nav__link--parent').each(function(){
      let $link =  $(this),
        $sub =  $link.find('.sub-list'),
        height = $sub.find('ul').outerHeight()


      $link.on('click', (e)=>{

        if($link.hasClass('.remove-click'))
            e.preventDefault()

        $link.toggleClass('hvd')

        if(ww > breakpoints.sm){
          $link.siblings().removeClass('hvd')
        }

        if(ww <= breakpoints.sm){
          if($link.hasClass('hvd')){
            TM.to($sub, .5, {height})
          }else{
            TM.to($sub, .5, {height: 0})
          }
        }
      })

      let resizeTM;
      function resizeSub(){
        clearTimeout(resizeTM)
        resizeTM = setTimeout(()=>{
          $sub.css({height:'auto'})
          $sub.attr('style','')
          height = $sub.find('ul').outerHeight()
          if(ww <= breakpoints.sm)
            TM.set($sub, {height: 0})
          else
            $sub.attr('style','')
        }, 500)
      }

      $window.on('resize', resizeSub)

      resizeSub()
    })


  }
  setupSearch(){
    const t=this

    t.$searchButton = t.$.find('.open-close-search')
    t.$searchBar = t.$.find('.header__search')

    t.$searchButton.on('click', ()=>{
      t.$searchBar.toggleClass('open')
    })

    t.$submitBt = t.$.find('.header__search__button')

    t.$submitBt.on('click', ()=>{
      t.$searchBar.find('input[type="submit"]').click()
    })
  }

  setupSidebar(){
    const t=this
    t.$sidebar = $('#main-sidebar')

    t.$sidebarButton = t.$sidebar.find('.sidebar__button')

    t.$sidebarButton.on('click', ()=>{
        // t.$sidebar.toggleClass('open')
    })

    t.$sidebar.find('.overlay').on('click', ()=>{
      t.$sidebar.removeClass('open')
    })

    t.$sidebar.find('.sidebar__open-zone').on('click', ()=>{
      // t.$sidebar.toggleClass('open')
    })
    t.$sidebar.find('.sidebar__content__push').on('mouseenter', function(){
      $(this).addClass('active').siblings().removeClass('active')
    })
  }

  checkShop(){
    const t=this

    t.$shopLink =  t.$.find('.shop-link')
    if($body.hasClass('woocommerce') || $body.hasClass('page-template-template-shop-home')){
      t.$shopLink.addClass('force-open hvd')
      $('#wrapper').addClass('shop-header-opened')
    }

  }

    GDRPinit() {
        if(this.getCookie('GDRPaccepted') !== 'true')
            this.GDRPcreate();
    }
    GDRPcreate() {
        $('.gdrp-popup-button-close').on('mouseup', this.GDRPclose.bind(this));
        let a = $('#gdrp-popup');
        if (a.length > 0)
            TM.to(a, .5, {left: 0})
    }
    GDRPclose() {
        this.setCookie('GDRPaccepted', 'true', 365);
        TM.to($('#gdrp-popup'), .5, {top: '100%'});
    }
    setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = "expires="+d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }
    getCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for(var i = 0; i <ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }
}

