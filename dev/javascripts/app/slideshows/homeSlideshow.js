class HomeSlideshow extends Slideshow{
    constructor(settings){
        super(settings)
        const t=this

        t.auto = true

        t.resetSlsh()

        if(t.auto)
            t.setAuto()

        t.setupTimer()

        t.$mask = t.$.find('.mask')
    }
    resetSlsh(){
        super.resetSlsh()
        const t=this

    }
    setupTimer(){
        const t=this

        t.timerTL = new TimelineMax({paused:true})
        t.$timer = t.$.find('.time-cursor')
        t.timerTL.set(t.$timer,{left:0, width:0})
        t.timerTL.to(t.$timer, t.loopTime/1000, {width:'100%', ease:Linear.easeNone})
        t.timerTL.set(t.$timer,{left:'auto', right:0})
        t.timerTL.to(t.$timer, .5, {width:0, ease:Linear.easeNone})

        t.timerTL.play()
    }
    setAuto(){
        super.setAuto()
        const t=this

        if(t.timerTL){
            t.timerTL.restart()
            t.timerTL.play()
        }
    }
    slide(idx){
        let t=this

        if(t.trans) return false;

        t.trans=true

        let dir = getDirection(t.idx, idx, t.nbSlides)

        t.stripSlide(t.$slides.eq(t.idx), t.$slides.eq(idx), dir, ()=>{
           t.onCompleteSlide(idx)
        })

    }
    stripSlide($slide, $next, dir, cb){
        const t=this


        t.setMaskClass(t.$mask, dir)

        if (t.tl) t.tl.clear()

        t.tl = new TimelineMax()
            .staggerTo($slide.find('.line-mention, .cbutton'), .5,{opacity: 0, x:-30*dir, ease: Quad.easeIn}, .1, 0)
            .staggerTo($slide.find('.mask'), .7, {width: "100%", ease: Quad.easeIn}, .2, 0)
            .call(() => {
            
                t.setMaskClass($slide.find('.mask'), -dir)

                TM.set($next.find('.title__content'), {opacity: 0})

                TM.set($next.find('.line-mention, .cbutton'), {opacity: 0, x: 30*dir })

                TM.set($slide.find('.title__content'), {opacity: 0})

                TM.set($next.find('.h-back .mask'),{width:'100%'})

                t.setMaskClass($next.find('.h-back .mask'), -dir)

            })
            .staggerTo($slide.find('.title-mask'), .4,{width:0, ease:Quad.easeOut})

            .call(()=>{
                TM.set($slide, {opacity:0})
                TM.set($next, {opacity:1})
                cb()

            })
            .to($next.find('.h-back .mask'), .7,{width:0})
            .staggerTo($next.find('.line-mention, .cbutton'), .5,{opacity: 1, x:0, ease: Quad.easeOut}, .2,'+=0')
            .staggerTo($next.find('.title-mask'), .7,{width:'100%'}, .1, '-=.5')
            .call(()=>{

                t.setMaskClass($next.find('.title-mask'), -dir)

                TM.set($next.find('.title__content, .line-mention'), {opacity: 1})

            })
            .to($next.find('.title-mask'), .4,{width:0})

            .call(() => t.trans = false)
    }
    onCompleteSlide(idx){
        const t=this

        t.idx = idx
        t.updateNav()
        t.setAuto()
        t.trans=false
    }
    setMaskClass($el, dir){
        if (dir == 1) $el.removeClass('lf').addClass('rg')
        else $el.removeClass('rg').addClass('lf')
    }
}