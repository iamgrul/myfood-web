class followOnScroll {
    constructor($element){
        const t = this

        if(isMobile())
            return null;

        t.$photo = $element
        t.$texts = t.$photo.parents('.right-part').siblings()
        t.$parent = t.$photo.parents('.page-roadmap__section')

        if ( t.$texts.innerHeight() > t.$photo.innerHeight() ){
            t.bindEvents()
        }
    }
    bindEvents(){
        const t = this

        $(window).on('resize', t.size.bind(t))

        $(window).on('scroll touchmove', t.onScroll.bind(t))

        t.size()
    }
    onScroll(){
        const t=this

        t.sy = $(window).scrollTop() - t.top

        t.sy = Math.min(t.yMax, Math.max(0, t.sy))

        if(ww <= breakpoints.sm)
            t.sy = -1

        if(t.sy > 0 && t.sy < t.yMax){
            t.$photo.css({ position:'fixed', bottom: '90rem', right: '180rem'})
        }else if(t.sy >= t.yMax){
            t.$photo.css({position:'absolute', bottom: '90rem', right: '90rem'})
        }else{
            t.$photo.css({position:'relative', bottom: 'auto', right: 'auto'})
        }

    }
    size() {
        const t = this

        t.sy = 0

        t.yMax = t.$parent.outerHeight() - t.$photo.outerHeight() - convertRemToPixels(90)

        t.top = t.$parent.offset().top - (wh - t.$photo.outerHeight() - convertRemToPixels(90))

        t.onScroll()
    }
}