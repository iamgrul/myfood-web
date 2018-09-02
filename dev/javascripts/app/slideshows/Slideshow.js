class Slideshow{
    constructor(settings){
        const t=this

        t.$ = settings.$

        t.$slides = defval(settings.$slides, t.$.find('.slide') )

        t.nbSlides = t.$slides.length

        t.idx = 0

        t.$curSlide = null

        t.$nav = defval(settings.$nav, t.$.find('.bullets-nav__bullet'))

        t.$arrows = defval(settings.$arrows, t.$.find('.arrow-button'))

        t.$index = t.$.find('.slideshow-index')

        t.loopTime = defval(settings.loopTime, 6000)

        t.bindEvents()

        t.trans = false

        t.active = defval(settings.active, true)

        t.auto = defval(settings.auto, false)

        t.setupIndex()

        t.init()

    }
    init(){
        const t=this

        t.resetSlsh()

        if(t.auto)
            t.setAuto()

        t.setupTouch()

    }
    resetSlsh(){
        const t=this

        TM.set(t.$slides,{opacity:0})

        TM.set(t.$slides.eq(0), {opacity:1})

    }
    bindEvents(){
        const t=this

        t.$arrows.click(function(){
            $(this).hasClass('arrow-button--next') ? t.slideNext() : t.slidePrev()
        })

        t.$nav.click(function(){
            t.slide($(this).index())
        })

        $window.on('blur',t.onBlur.bind(t))
        $window.on('focus',t.onFocus.bind(t))

        if(t.auto) $window.on('scroll',t.onScroll.bind(t))
    }
    onBlur(){
        const t=this
        t.active = false
    }
    onFocus(){
        const t=this
        t.active = true
        t.setAuto()
    }
    onScroll(){
        const t=this

        let sc = $window.scrollTop()

        if(sc + wh/2 > t.$.offset().top && !t.autoInit){
            t.autoInit = true
            t.setAuto()
        }
    }
    destroy(){
        const t=this
        $window.off('blur',t.onBlur.bind(t))
        $window.off('focus',t.onFocus.bind(t))

        if(t.auto) $window.off('scroll',t.onScroll.bind(t))

        clearTimeout(t.loop)
    }
    slideNext(){
        const t=this

        let idx = t.idx < t.nbSlides-1 ? t.idx+1 : 0

        t.slide(idx)

    }
    slidePrev(){
        const t=this

        let idx = t.idx > 0  ? t.idx-1 : t.nbSlides-1

        t.slide(idx)
    }
    slide(idx){
        const t=this

        if(t.trans) return false;

        t.trans=true

        TM.to(t.$slides.eq(t.idx), .5,{opacity:0})

        TM.to(t.$slides.eq(idx), .5,{opacity:1, onComplete:()=>{
            t.idx = idx
            t.updateNav()
            t.setAuto()
            t.trans=false
        }})

    }
    updateNav(){
        const t=this

        t.$nav.eq(t.idx).addClass('bullets-nav__bullet--active').siblings().removeClass('bullets-nav__bullet--active')

        t.setupIndex()
    }
    setupTouch(){
        const t=this

        t.$.addClass('touch')

        t.$.swipe({
            swipeRight: t.slidePrev.bind(t),
            swipeLeft: t.slideNext.bind(t)
        })

    }
    setAuto(){
        const t=this

        if(!t.auto) return false

        clearInterval(t.loop)

        if(!t.active) return false

        t.loop = setTimeout(function(){
            t.slideNext()
        }, t.loopTime)
    }
    setupIndex(){
        const t=this

        if(t.$index.length){
            t.$index.find('span').text( addLeadingZero(t.idx+1) + ' / ' + addLeadingZero(t.nbSlides))
        }

    }

}