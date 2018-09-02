class LightSlideshow extends Slideshow{
    constructor(settings){
        super(settings)
        const t=this

        t.$mask = t.$.find('.mask')

    }
    slide(idx){
        const t=this

        let dir =1

        if(idx == 0 && t.idx == t.nbSlides-1){
            dir = 1
        }else if(idx == t.nbSlides-1 && t.idx == 0){
            dir = -1
        }else{
            dir =  idx > t.idx ? 1 : -1
        }

        if(dir==1)t.$mask.removeClass('rg').addClass('lf')
        else t.$mask.removeClass('lf').addClass('rg')

        if(t.tl) t.tl.clear()

        t.tl = new TimelineMax()
         .to(t.$mask,.6, {width:"100%", ease:Quad.easeIn})
         .call(()=>{
             if(dir==1) t.$mask.removeClass('lf').addClass('rg')
             else t.$mask.removeClass('rg').addClass('lf')

             TM.set(t.$slides.eq(t.idx), {opacity:0})
             TM.set(t.$slides.eq(idx), {opacity:1})
             t.idx = idx
             t.updateNav()
             t.setAuto()
         })
         .to(t.$mask,.4,{width:'0', ease:Quad.easeOut})
         .call(()=>t.trans=false)

    }
}