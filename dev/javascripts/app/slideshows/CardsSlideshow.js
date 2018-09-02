class CardsSlideshow{
    constructor(settings){
        let t=this

        t.$ = settings.$

        t.$list = t.$.find('.cards-slideshow__container')
        t.$slides = defval(settings.$slides, t.$.find('.slide') )

        t.nbSlides = t.$slides.length

        t.idx = 1

        t.$curSlide = null

        t.$arrows = defval(settings.$arrows, t.$.find('.arrow-button'))

        t.loopTime = defval(settings.loopTime, 6000)

        t.bindEvents()

        t.trans = false

        t.active = defval(settings.active, true)

        t.auto = defval(settings.auto, false)

        t.init()

        t.cards[t.idx].$.addClass('act')

    }
    init(){
        let t=this

        t.cards = []

        t.$slides.each(function(){
            t.cards.push(t.setupCard($(this)))
        })

        t.cards[t.idx].tl.progress(0)

        TM.to(t.$slides, .5,{opacity:1})

        t.resetSlsh()

        if(t.auto)
            t.setAuto()

        t.setupTouch()



    }
    resetSlsh(){
        let t=this

    }
    bindEvents(){
        let t=this

        t.$arrows.click(function(){
            $(this).hasClass('arrow-button--next') ? t.slideNext() : t.slidePrev()
        })

        $window.on('blur',t.onBlur.bind(t))
        $window.on('focus',t.onFocus.bind(t))

        if(t.auto) $window.on('scroll',t.onScroll.bind(t))
        $window.on('resize',t.size.bind(t))

        t.$slides.on('click', function(e){
            if($(this).index() != 1){
              e.preventDefault()
              $(this).index()==0 ? t.slidePrev() : t.slideNext()
            }
        })
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
            t.slWidth = (t.$list.find('.slide').eq(1).offset().left - t.$list.find('.slide').eq(0).offset().left)
        }else{
            t.slWidth = (t.$list.find('.slide').eq(2).offset().left - t.$list.find('.slide').eq(1).offset().left)
        }

        if(ww <= breakpoints.sm){
            TM.to(t.$list, .3,{height: t.cards[t.idx].$.outerHeight(), opacity:0})
        }

        t.cards[t.idx].tl.play()

        t.cards[idx].tl.reverse()

        t.cards[t.idx].$.removeClass('act')

        t.cards[idx].$.addClass('act')

        // TM.to({x:0}, .5,{x:1, onComplete:()=>{

            if(dir == -1){
                TM.to(t.$slides,.7,{x: -t.slWidth, ease: Quad.easeOut, onComplete:()=>{
                    TM.set(t.$slides,{x:0})
                    t.$list.find('.slide:last').after(t.$list.find('.slide:first'))
                    t.trans=false
                    // t.cards[idx].tl.reverse()
                    if(ww <= breakpoints.sm){
                        TM.to(t.$list, .3,{height: t.cards[idx].$.outerHeight(), opacity:1})
                    }
                }})
            }else{
                TM.set(t.$slides, {x:-t.slWidth});
                t.$list.find('.slide:first').before(t.$list.find('.slide:last'));
                TM.to(t.$slides,.7,{x: 0, ease: Quad.easeOut, onComplete:()=>{
                    t.trans=false
                    if(ww <= breakpoints.sm){
                        TM.to(t.$list, .3,{height: t.cards[idx].$.outerHeight(), opacity:1})
                    }
                }})
            }

            t.idx = idx
            t.setAuto()
        // }})


    }
    setupCard($card){
        const t=this

        let ease = Cubic.easeInOut

        let card = {
            $:$card,
            tl: new TimelineMax({paused:true})
        }

        card.tl
        // .to($card, .5, {y: $card.find('.card__top').height(), ease})
        // .to($card.find('.card__infos'), .5, {top:0, ease}, 0)
            .to($card.find('.card__bottom'), .5, {height:0, ease}, .3)
            .to($card.find('.mask'), .3, {height:'100%',ease}, 0)
            .to($card.find('.card__top'), .5, {height:0, ease}, .3)
            .staggerTo($card.find('.card__infos__number, .card__infos__date'), .5, {opacity:0, y:20, ease}, -.1, 0.5)


        // card.tl
        //     // .to($card, .5, {y: $card.find('.card__top').height(), ease})
        //     // .to($card.find('.card__infos'), .5, {top:0, ease}, 0)
        //     .to($card.find('.card__bottom'), .5, {height:0, ease}, 0)
        //     .to($card.find('.mask'), .3, {height:'100%',ease}, .5)
        //     .to($card.find('.card__top'), .5, {height:0, ease}, .8)
        //     .staggerTo($card.find('.card__infos__number, .card__infos__date'), .5, {opacity:0, y:20, ease}, -.1, 0.5)

        card.tl.progress(1)

        return card

    }
    setupTouch(){
        let t=this

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
    size(){
        const t=this

        let ease = Cubic.easeInOut


        t.cards.forEach((card, idx)=>{
            TM.set(card.$.find('.card__bottom, .card__top'), {height:'auto'})
            TM.set(card.$.find('.mask'), {height:0})

            card.tl.kill().clear()

            card.tl
                .to(card.$.find('.card__bottom'), .5, {height:0, ease}, .3)
                .to(card.$.find('.mask'), .3, {height:'100%',ease}, 0)
                .to(card.$.find('.card__top'), .5, {height:0, ease}, .3)
                .staggerTo(card.$.find('.card__infos__number, .card__infos__date'), .5, {opacity:0, y:20, ease}, -.1, 0.5)

            if(idx != t.idx)
                card.tl.progress(1)
        })


    }

}