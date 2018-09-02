class Tabs{
    constructor(settings){

        const t=this

        t.$ = settings.$

        t.idx = 0

        t.tabsClass = defval(settings.tabsClass, "dual-tab")
        t.headsClass = defval(settings.headsClass, "tabs-selector__tab")

        t.$heads = t.$.find('.'+t.headsClass)
        t.$tabs = t.$.find('.'+t.tabsClass)

        t.tabHeadMobileClass = 'selector--mobile__li'

        t.onSwitch = defval(settings.onSwitch, ()=>{})

        t.init()
    }
    init(){
        const t=this

        t.bindEvents()
    }
    bindEvents(){
        const t=this

        t.$heads.on('click', function(){
            let idx = $(this).index()
            t.switchTab(idx)
        })

        t.$.find('.'+t.tabHeadMobileClass).on('click', function(){
            let idx = $(this).index()
            t.switchTab(idx)
        })
    }
    switchTab(idx){
        const t=this

        TM.to(t.$tabs.eq(t.idx), .5,{opacity: 0, onComplete:()=>{
            TM.set(t.$tabs.eq(t.idx),{display:"none"})
            TM.set(t.$tabs.eq(idx),{display:"block"})

            TM.to(t.$tabs.eq(idx), .5,{opacity:1})

            t.idx = idx

            t.updateNav()

            t.onSwitch()
        }})

        // t.$tabs.eq(idx).show().siblings().hide()

    }
    updateNav(){
        let t=this

        t.$heads.eq(t.idx).addClass(t.headsClass+'--active').siblings().removeClass(t.headsClass+'--active')
    }
}