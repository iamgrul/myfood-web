class FullSlideshow extends Slideshow{
    constructor(settings){
        super(settings)
    }
    forceSlide(idx){
        const t=this

        if(typeof idx != 'number')
            idx = parseInt(idx)

        TM.set(t.$slides.eq(t.idx),{opacity:0})

        TM.set(t.$slides.eq(idx),{opacity:1})
        t.idx = idx
        t.updateNav()
        t.setAuto()
        t.trans=false
    }
}