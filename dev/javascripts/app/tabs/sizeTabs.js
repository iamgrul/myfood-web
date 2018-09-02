class SizeTabs extends Tabs{
    constructor(settings){

        settings.onSwitch = ()=>{
            website.resize()
        }

        super(settings)
    }
    bindEvents(){
        const t=this

        t.$heads.on('click', function(){
            if(ww <= breakpoints.sm)
                return false;

            let idx = $(this).index()
            t.switchTab(idx)
        })

        t.$.find('.sizes-tabs__mobile-head__tab').on('click', function(){
            let idx = $(this).index()

            $(this).addClass('active').siblings().removeClass('active')

            t.switchTab(idx)
        })

        t.collapsibles = []

        t.$.find('.detail-card').each(function(){
            $(this).addClass('collapsed')
            t.collapsibles.push(new Collapsible({
                $: $(this),
                $button: $(this).find('.detail-card__title'),
                $body: $(this).find('.collaps-ct')
            }))
        })

        $window.on('resize', t.size.bind(t))

        t.size()

    }
    size(){
        const t=this

        if(ww > breakpoints.sm){
            t.collapsibles.forEach((collapsible)=>{
                collapsible.deactivate()
            })
        }
    }
}