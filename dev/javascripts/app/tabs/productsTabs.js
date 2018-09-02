class ProductsTabs extends Tabs{
    constructor(settings){
        super(settings)

        const t = this

        t.$mask = t.$.find('.dual-tab__mask')
        t.tabs = []

        t.$tabs.each(function(){
            t.setupTab($(this))
        })

    }
    setupTab($tab){
        const t=this

        let tab = {}

        tab.switchTab = new Tabs({
            $:$tab,
            tabsClass:'switch-tab',
            headsClass:'navigation-switch__button',
            onSwitch: function(){
                if(tab.slideshow && this.idx == 1){
                    TM.to(tab.slideshow.$arrows, .5,{opacity:1, display:"block"})
                    Website.cropImg()
                }else{
                    TM.to(tab.slideshow.$arrows, .5,{opacity:0, onComplete:()=>{
                        TM.set(tab.slideshow.$arrows, {display:"none"})
                    }})
                }
            }
        })

        if($tab.find('.images-slideshow__image').length > 1){

            tab.slideshow = new LightSlideshow({
                $: $tab.find('.dual-tab__medias__slideshow'),
                $arrows: $tab.find('.arrow-button'),
                $slides: $tab.find('.images-slideshow__image'),
            })

        }
    }
    switchTab(idx){
        const t=this

        t.$mask.removeClass('rg').addClass('lf')

        t.tl = new TimelineMax()
            .to(t.$mask,.6, {width:"100%", ease:Quad.easeIn})
            .staggerTo(t.$tabs.eq(t.idx).find('.title, .mention, .border-box'), .5, {opacity:0, y:20}, .1, 0)
            .call(()=>{
                t.$mask.removeClass('lf').addClass('rg')

                TM.set(t.$tabs.eq(t.idx), {display:"none", opacity:0})
                TM.set(t.$tabs.eq(idx), {opacity:1, display:"block"})
                TM.set(t.$tabs.eq(idx).find('.title, .mention, .border-box'), {opacity:0, y:-20})
                t.idx = idx
                t.updateNav()
            })
            .staggerTo(t.$tabs.eq(idx).find('.title, .mention, .border-box'), .5, {opacity:1, y:0}, .1)
            .to(t.$mask,.4,{width:'0', ease:Quad.easeOut}, '-=.4')
            .call(()=>t.trans=false)
    }
}