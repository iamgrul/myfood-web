class LargeSlideshow{
    constructor(settings){
        let t=this


        t.$ = settings.$

        t.$slides = defval(settings.$slides, t.$.find('.large-slideshow__slide') )

        t.$list = defval(settings.$list,  t.$.find('.large-slideshow__container__list') )

        t.nbSlides = t.$slides.length

        t.idx = 0

        t.$curSlide = null

        t.$nav = defval(settings.$nav, t.$.find('.bullets-nav__bullet'))

        t.$arrows = defval(settings.$arrows, t.$.find('.large-slideshow__navigation .arrow-button'))

        t.loopTime = defval(settings.loopTime, 6000)

        t.trans = false

        t.active = defval(settings.active, true)

        t.auto = defval(settings.auto, false)

        t.slideMargin = defval(settings.slideMargin, 62)

        t.init()
    }
    init(){
        let t=this

        t.resetSlsh()

        if(t.auto)
            t.setAuto()

        if(t.$.find('.full-slideshow').length > 0){
            t.fullSlideshow = new FullSlideshow({
                $ : t.$.find('.full-slideshow')
            })
        }

        if(t.nbSlides < 6){
            let $clones = t.$slides.clone()
            t.$slides.parent().append($clones)
            t.$slides = t.$slides.parent().children()
            t.nbSlides = t.$slides.length
            Website.cropImg()
        }

        t.bindEvents()

        t.size()

        TM.to(t.$, .5,{opacity:1})

    }
    resetSlsh(){
        let t=this

    }
    bindEvents(){
        let t=this

        t.$arrows.click(function(){
            $(this).hasClass('arrow-button--next') ? t.slideNext() : t.slidePrev()
        })

        t.$nav.click(function(){
            t.slide($(this).index())
        })

        $window.on('blur',t.onBlur.bind(t))
        $window.on('focus',t.onFocus.bind(t))

        if(t.fullSlideshow){
            t.$slides.on('click', function(){
                t.fullSlideshow.forceSlide($(this).attr('data-original-idx'))
            })
        }

        if(t.auto) $window.on('scroll',t.onScroll.bind(t))

        $window.on('resize', t.size.bind(t))

        t.setupTouch()

    }
    onBlur(){
        let t=this
        t.active = false
    }
    onFocus(){
        let t=this
        t.active = true
        t.setAuto()
    }
    onScroll(){
        let t=this

        let sc = $window.scrollTop()

        if(sc + wh/2 > t.$.offset().top && !t.autoInit){
            t.autoInit = true
            t.setAuto()
        }
    }
    destroy(){
        let t=this
        $window.off('blur',t.onBlur.bind(t))
        $window.off('focus',t.onFocus.bind(t))

        if(t.auto) $window.off('scroll',t.onScroll.bind(t))

        clearTimeout(t.loop)
    }
    slideNext(){
        let t=this

        let idx = t.idx < t.nbSlides-1 ? t.idx+1 : 0

        t.slide(idx)

    }
    slidePrev(){
        let t=this

        let idx = t.idx > 0  ? t.idx-1 : t.nbSlides-1

        t.slide(idx)
    }
    slide(idx){
        let t=this

        if(t.trans) return false;

        t.trans=true

        let dir = getDirection(t.idx, idx, t.nbSlides)

        if(dir== -1){
            t.slWidth = (t.$.find('.slide').eq(1).offset().left - t.$.find('.slide').eq(0).offset().left)
        }else{
            t.slWidth = (t.$.find('.slide').eq(2).offset().left - t.$.find('.slide').eq(1).offset().left)
        }

        if(dir == -1){
            TM.to(t.$list,.8,{x: -t.slWidth, ease: Power2.easeInOut, onComplete:()=>{
                TM.set(t.$list,{x:0})
                t.$list.find('.slide:last').after(t.$list.find('.slide:first'))
                t.trans=false
            }})
        }else{
            TM.set(t.$list, {x:-t.slWidth});
            t.$list.find('.slide:first').before(t.$list.find('.slide:last'));
            TM.to(t.$list,.8,{x: 0,  ease: Power3.easeInOut, onComplete:()=>{
                t.trans=false
            }})
        }


        if(t.fullSlideshow){
            t.fullSlideshow.forceSlide(idx)
        }

        t.idx = idx
        t.setAuto()
    }
    updateNav(){
        let t=this

        t.$nav.eq(t.idx).addClass('bullets-nav__bullet--active').siblings().removeClass('bullets-nav__bullet--active')
    }
    setupTouch(){
        let t=this

        t.$.addClass('touch')

        t.$.swipe({
            swipeRight: t.slidePrev.bind(t),
            swipeLeft: t.slideNext.bind(t)
        })

    }
    size(){
        const t=this

        let width = (t.$slides.eq(2).offset().left - t.$slides.eq(1).offset().left)  * (t.$slides.length+1)

        if(width < ww){
            width = ww * t.$slides.length
        }


        let nbOnScreen = Math.round(t.$.width()/(t.$slides.width()+t.slideMargin)+1)

        if(nbOnScreen%2==0)
            nbOnScreen += 1

        let marginLeft = - nbOnScreen/2 * (t.$slides.width() + t.slideMargin)
        let left = "50%"

        if(ww <= breakpoints.sm){
            width = (t.$slides.outerWidth() + t.slideMargin) *  (t.$slides.length+2)
        }

        t.$list.css({width, marginLeft, left})
    }
    setAuto(){
        let t=this

        if(!t.auto) return false

        clearInterval(t.loop)

        if(!t.active) return false

        t.loop = setTimeout(function(){
            t.slideNext()
        }, t.loopTime)
    }

}