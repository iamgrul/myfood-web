class SeedSlideshow{
    constructor(settings){
        const t=this

        t.$ = settings.$
        t.baseSlideClass = '.seeds-slideshow__slide'
        t.slideClass = '.seeds-slideshow__slide'
        t.nbCells = 9


        t.$next = t.$.find('.arrow-button--next')
        t.bindEvents()
    }
    bindEvents(){
        const t=this

        t.$next.on('click', ()=>{
            t.slide()
        })

    }
    slide(){
        const t=this

        TM.staggerTo(t.$.find(t.slideClass).slice(0, t.nbCells), .4, {opacity:0}, .03, ()=>{

            for(var i = 0; i < t.nbCells; i++){
                t.$.find(t.slideClass+':last').after(t.$.find(t.slideClass+':first'))
            }

            Website.cropImg()
            TM.set(t.$.find(t.slideClass), {opacity:0})
            TM.staggerTo(t.$.find(t.slideClass).slice(0, t.nbCells), .4, {opacity:1, scale:1}, .03)
        })
    }
}