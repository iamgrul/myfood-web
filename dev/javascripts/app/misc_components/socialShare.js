class SocialShare{
    constructor(settings){

        const t=this

        t.$ = settings.$

        t.$anchor = settings.$anchor

        t.size()

        t.scroll()

        $window.on('scroll', t.scroll.bind(t))

        $window.on('resize', t.size.bind(t))

        setTimeout(()=>{
            t.size(t)
            t.scroll(t)
        },1000)

    }
    scroll(){
        const t=this

        if($window.scrollTop() > t.maxScroll - $window.height() ){
            t.$.addClass('hooked')
            TM.set(t.$, {y: t.maxScroll - t.$anchor.outerHeight()/2 - t.$.outerHeight()/2 + 20 })
        }else{
            t.$.removeClass('hooked')
            TM.set(t.$, {y: 0})
        }
    }
    size(){
        const t=this

        t.maxScroll = t.$anchor.offset().top + t.$anchor.outerHeight() - 20
    }
}