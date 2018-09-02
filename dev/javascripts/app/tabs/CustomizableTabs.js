class CustomizableTabs{
    constructor(settings){
        const t=this

        t.$ = settings.$

        t.init()

    }
    init(){
        const t=this

        t.modulesSlideshow = new ModulesSlideshowCustom({
            $: t.$.find('.modules-slideshow'),
            $arrows: t.$.find('.arrow-button')
        })

        t.modulesSlideshow.hidden = true

        t.switchTab = new Tabs({
            $:t.$,
            tabsClass:'switch-tab',
            headsClass:'navigation-switch__button',
            onSwitch: function(){
                if(this.idx == 1){
                    t.modulesSlideshow.$arrows.addClass('active')
                    t.modulesSlideshow.hidden = false
                    t.modulesSlideshow.size()
                }else{
                    t.modulesSlideshow.hidden = true
                    t.modulesSlideshow.$arrows.removeClass('active')
                }
                Website.cropImg()
            }
        })

        t.setupLayout()

        t.modulesSlideshow.size()

    }
    setupLayout(){
        const t=this

        t.$points = t.$.find('.layout__point')

        t.cardIndex = 0

        t.$detailsCards = t.$.find('.customize-tabs__detail-card .card--module')

        t.bindEvents()

    }
    bindEvents(){
        const t=this

        t.$points.on('click', function(){
            let $point = $(this)
            $point.addClass('active').siblings().removeClass('active')
            t.changeCard($point.index())
        })

        $window.on('resize', t.size.bind(t))

    }
    changeCard(idx){
        const t=this

        TM.to(t.$detailsCards.eq(t.cardIndex), .5,{opacity:0, y:30, onComplete:()=>{
            t.$detailsCards.eq(idx).addClass('active').siblings().removeClass('active')
            TM.set(t.$detailsCards.eq(idx), {opacity:0, y:30})

            TM.to(t.$detailsCards.eq(idx), .5,{opacity:1, y:0})

            t.cardIndex = idx
        }})
    }
    size(){
        const t=this

        t.modulesSlideshow.size()

    }

}