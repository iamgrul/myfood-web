class ModulesSlideshow {
  constructor(settings) {
    let t = this

    t.$ = settings.$

    t.$slides = defval(settings.$slides, t.$.find('.slide'))


    t.$list = t.$.find('.modules-slideshow__container__list')

    t.nbSlides = t.$slides.length

    t.idx = 0
    t.activeIndex = 2

    t.$curSlide = null

    t.$nav = defval(settings.$nav, t.$.find('.bullets-nav__bullet'))

    t.$arrows = defval(settings.$arrows, t.$.find('.arrow-button'))

    t.loopTime = defval(settings.loopTime, 6000)

    t.bindEvents()

    t.trans = false

    t.active = defval(settings.active, true)

    t.auto = defval(settings.auto, false)

    t.init()

    t.size()


  }

  init() {
    let t = this

    t.cards = []

    let minHeight = 0

    // console.log(t.nbSlides)
    //
    // if(t.$slides.length < 4){
    //   let $clones = t.$slides.clone().addClass('closed')
    //
    //   t.$list.append($clones)
    //   t.$slides = t.$list.children()
    //   t.nbSlides = t.$slides.length
    //   console.log(t.nbSlides)
    //   Website.setSizes()
    //   t.size()
    // }

    t.$slides.each(function () {
      minHeight = Math.max(minHeight, $(this).outerHeight())
      t.cards.push(t.setupCard($(this)))
    })

    t.cards[t.idx].tl.progress(0)

    t.resetSlsh()

    if (t.auto)
      t.setAuto()

    t.setupTouch()

    t.$list.css({minHeight})

    TM.to(t.$, .5, {opacity: 1})
  }

  resetSlsh() {
    let t = this

    for (let i = 0; i < 2; i++) {
      t.$list.find('.slide:first').before(t.$list.find('.slide:last'));
    }

  }

  bindEvents() {
    let t = this

    t.$arrows.click(function () {
      $(this).hasClass('arrow-button--next') ? t.slideNext() : t.slidePrev()
    })

    t.$nav.click(function () {
      t.slide($(this).index())
    })

    t.$slides.on('click', function(){
      let gap = $(this).index() - t.activeIndex

      if(gap > 0){
        t.slideNext(Math.abs(gap))
      }else{
        t.slidePrev(Math.abs(gap))
      }

      // t.slide(0, t.activeIndex - $(this).index())
    })

    $window.on('blur', t.onBlur.bind(t))
    $window.on('focus', t.onFocus.bind(t))

    if (t.auto) $window.on('scroll', t.onScroll.bind(t))

    $window.on('resize', t.size.bind(t))

  }
  onBlur() {
    let t = this
    t.active = false
  }
  onFocus() {
    let t = this
    t.active = true
    t.setAuto()
  }
  onScroll() {
    let t = this

    let sc = $window.scrollTop()

    if (sc + wh / 2 > t.$.offset().top && !t.autoInit) {
      t.autoInit = true
      t.setAuto()
    }
  }
  destroy() {
    let t = this
    $window.off('blur', t.onBlur.bind(t))
    $window.off('focus', t.onFocus.bind(t))

    if (t.auto) $window.off('scroll', t.onScroll.bind(t))

    clearTimeout(t.loop)
  }
  slideNext(move = 1) {
    let t = this

    let idx = t.idx

    for(let i=0;i<move;i++) {
      idx = idx < t.nbSlides - 1 ? idx + 1 : 0
    }

    t.slide(idx,move, -1)

  }
  slidePrev(move = 1) {
    let t = this

    let idx = t.idx

    for(let i=0;i<move;i++){
      idx = idx > 0 ? idx - 1 : t.nbSlides - 1
    }

    t.slide(idx,move, 1)
  }

  slide(idx, move=1, dir=1) {
    let t = this

    if (t.trans) return false;

    t.trans = true

    dir = dir || getDirection(t.idx, idx, t.nbSlides)

    if (t.cards[t.idx].$.find('.module-details').length > 0)
      t.cards[t.idx].$.find('.module-details').removeClass('open')

    t.cards[t.idx].tl.play()

    if (dir == -1) {
      t.slWidth = (t.$list.find('.slide').eq(1).offset().left - t.$list.find('.slide').eq(0).offset().left)
    } else {
      t.slWidth = (t.$list.find('.slide').eq(2).offset().left - t.$list.find('.slide').eq(1).offset().left)
    }

    setTimeout(() => {
      if (dir == -1) {
        TM.to(t.$list, .8, {
          x: -t.slWidth*move, ease: Power2.easeInOut, onComplete: () => {
            TM.set(t.$list, {x: 0})

            for(let i=0;i<move;i++){
              t.$list.find('.slide:last').after(t.$list.find('.slide:first'))
            }

            t.trans = false
          }
        })
      } else {
        TM.set(t.$list, {x: -t.slWidth*move});
        for(let i=0;i<move;i++){
          t.$list.find('.slide:first').before(t.$list.find('.slide:last'));
        }
        TM.to(t.$list, .8, {
          x: 0, ease: Power3.easeInOut, onComplete: () => {
            t.trans = false
          }
        })
      }

      t.cards[idx].tl.reverse()
      t.cards[idx].$.removeClass('closed').siblings().addClass('closed')

    }, 500)

    t.idx = idx
    t.setAuto()
  }

  updateNav() {
    let t = this

    t.$nav.eq(t.idx).addClass('bullets-nav__bullet--active').siblings().removeClass('bullets-nav__bullet--active')
  }

  setupTouch() {
    let t = this

    t.$.addClass('touch')

    t.$.swipe({
      swipeRight: ()=>{t.slidePrev()},
      swipeLeft: ()=>{t.slideNext()}
    })

  }

  setAuto() {
    let t = this

    if (!t.auto) return false

    clearInterval(t.loop)

    if (!t.active) return false

    t.loop = setTimeout(function () {
      t.slideNext()
    }, t.loopTime)
  }

  setupCard($card) {
    const t = this

    let ease = Cubic.easeInOut

    let card = {
      $: $card,
      tl: new TimelineMax({paused: true})
    }

    card.tl
      .to($card.find('.module-details'), .5, {width: 0, ease}, .8)
      .to($card.find('.module-details__list'), .5, {opacity: 0, ease}, 0)
      .to($card.find('.card__button'), .5, {height: 0, ease}, .3)
      .to($card.find('.card__module__mention'), .5, {height: 0, opacity: 0, ease}, .3)
      .to($card.find('.card__module__point'), .5, {opacity: 0, y: 20, ease}, -.1, 0.5)

    card.tl.progress(1)

    if (card.$.find('.module-details').length > 0) {
      card.$.find('.module-details__mobile-switch').on('click', () => {
        card.$.find('.module-details').toggleClass('open')
      })
    }

    return card

  }

  size() {
    const t = this

    let width = (t.$slides.eq(1).offset().left - t.$slides.eq(0).offset().left) * (t.$slides.length + 1)

    if (ww <= breakpoints.sm) {
      width = ww * (t.$slides.length + 2)
    }

    t.$list.css({width})

    let ease = Cubic.easeInOut

    t.cards.forEach((card, idx) => {
      card.tl.clear().kill()

      TM.set(card.$.find('.card__module__mention, .card__button, .card__module__point'), {height: 'auto'})
      TM.set(card.$.find('.module-details'), {width: 'auto'})
      TM.set(card.$.find('.module-details__list'), {opacity: 1})
      TM.set(card.$.find('.card__button'), {height: 'auto'})
      TM.set(card.$.find('.card__module__mention'), {height: 'auto', opacity: 1})
      TM.set(card.$.find('.card__module__point'), {opacity: 1, y: 0})

      card.tl
        .to(card.$.find('.module-details'), .5, {width: 0, ease}, 0)
        .to(card.$.find('.module-details__list'), .5, {opacity: 0, ease}, .8)
        .to(card.$.find('.card__button'), .5, {height: 0, ease}, .3)
        .to(card.$.find('.card__module__mention'), .5, {height: 0, opacity: 0, ease}, .3)
        .to(card.$.find('.card__module__point'), .5, {opacity: 0, y: 20, ease}, -.1, 0.5)

      if (idx != t.idx)
        card.tl.progress(1)
    })

  }
}