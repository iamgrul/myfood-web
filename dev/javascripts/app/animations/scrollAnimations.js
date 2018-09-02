class ScrollAnimation {
  constructor() {
    const t = this

    t.maskClasses = ['.title--masked']

    if (isTablet() || isMobile() || ww < breakpoints.sm) {
      t.unmaskEls(true)
    } else {
      t.bindEvents()
    }

    setTimeout(t.onScroll.bind(t), 1000)
  }

  bindEvents() {
    const t = this

    $window.on('scroll', t.onScroll.bind(t))
  }

  onScroll() {
    const t = this

    t.sy = $window.scrollTop()

    t.unmaskEls()

  }

  unmaskEls(all = false) {
    const t = this

    t.maskClasses.forEach((klass) => {
      $(klass).not('.mask-ended').each(function () {
        if ($(this).offset().top < t.sy + wh * .8 || all) {
          $(this).addClass('unmasked mask-ended')
          setTimeout(()=>{
            $(this).removeClass('masked unmasked title--masked')
          }, 1500)
        }
      })
    })

  }
  setupMask(){
    const t = this

    t.maskClasses.forEach((klass) => {
      $(klass).each(function () {
        $(this).addClass('masked')
      })
    })

    if (isTablet() || isMobile() || ww < breakpoints.sm) {
      t.unmaskEls(true)
    }
  }
  setupHome() {
    const t = this

    t.maskClasses.push('.tabs-selector')
    t.maskClasses.push('.products-tabs')
    t.maskClasses.push('.cards-slideshow')
    t.maskClasses.push('.large-push')
    t.maskClasses.push('.points-list')
    t.maskClasses.push('.large-slideshow')
    t.maskClasses.push('.news-card--sticky')
    t.maskClasses.push('.grid-l-stats')

    t.setupCommon()
  }

  setupCommunity() {
    const t = this


    t.maskClasses.push('#community-pioneers-introduction .grid-l')
    t.maskClasses.push('.cards-slideshow')
    t.maskClasses.push('.large-push')
    t.maskClasses.push('.medias-slideshow')
    t.maskClasses.push('.community-post')

    t.setupCommon()
  }
  setupBecomePioneer() {
    const t = this

    t.maskClasses.push('.points-list')
    t.maskClasses.push('.medias-slideshow')

    t.setupCommon()
  }
  setupAerospring() {
    const t = this

    t.maskClasses.push('.points-list')
    t.maskClasses.push('.layout__point')
    t.maskClasses.push('.medias-slideshow')
    t.maskClasses.push('.large-push')
    t.maskClasses.push('.seeds-slideshow')

    t.setupCommon()
  }
  setupSmartGreenhouse() {
    const t = this

    t.maskClasses.push('.points-list')
    t.maskClasses.push('.medias-slideshow')
    t.maskClasses.push('.customize-tabs')
    t.maskClasses.push('.seeds-slideshow')
    t.maskClasses.push('.large-push')

    t.setupCommon()
  }
  setupTechnics() {
    const t = this

    t.maskClasses.push('.layout__point')
    t.maskClasses.push('.points-list')
    t.maskClasses.push('.medias-slideshow')

    t.setupCommon()
  }
  setupPioneer() {
    const t = this

    t.maskClasses.push('.large-slideshow')

    t.setupCommon()

    if (isTablet() || isMobile() || ww < breakpoints.sm) return;

    let pioneerTl = new TimelineMax({delay: 1.2})
    pioneerTl.staggerFrom('.pioneer__title, .pioneer__quote, .common-text', .7,{opacity:0, y:30, ease:Quad.easeOut}, .2, 0)
    pioneerTl.staggerFrom('.pioneer__stats .card__infos__number, .pioneer__stats .card__infos__date', .7,{opacity:0, scale:.8,y:30, ease:Quad.easeOut}, .2, 0)
    pioneerTl.staggerFrom('.pioneer__portrait__avatar, .pioneer__portrait__mention, .pioneer__portrait .cbutton', .7,{opacity:0,y:30, ease:Quad.easeOut}, .2, 0)
  }

  setupShop() {
    const t = this

    t.maskClasses.push('.products-tabs')
    t.setupCommon()
  }
  setupProduct() {
    const t = this

    t.maskClasses.push('.medias-slideshow')
    t.maskClasses.push('.large-push')


    let $topMasks = $('#product-introduction').find('.fade-in-bottom-0, .fade-in-bottom, .fade-in-bottom-1, .fade-in-bottom-2, .fade-in-bottom-3')

    setTimeout(()=>{
      $topMasks.addClass('unmasked mask-ended')
      setTimeout(()=>{
        $topMasks.removeClass('masked unmasked title--masked')
      }, 1500)
    }, 1500)


    t.setupCommon()
  }
  setupCommon(){
    const t = this

    t.maskClasses.push('.scale-in, .scale-in-1')
    t.maskClasses.push('.fade-in-bottom-0, .fade-in-bottom, .fade-in-bottom-1, .fade-in-bottom-2, .fade-in-bottom-3')
    t.setupMask()
  }
}