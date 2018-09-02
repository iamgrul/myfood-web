class Collapsible{
    constructor(settings){
        const t=this

        t.settings = settings

        t.$ = settings.$

        t.init()
    }
    init(){
        const t=this

        t.$button = defval(t.settings.$button, t.$.find('.collapsible__button'))

        t.$body = defval(t.settings.$body, t.$.find('.collapsible__body'))

        t.collapsed = true

        t.height = 0

        t.resize()

        t.bindEvents()
    }
    bindEvents(){
        const t=this

        t.$button.on('click', t.changeState.bind(t))

        $window.on('resize', t.resize.bind(t))
    }
    resize(){
        const t=this


        t.$body.css({height:'auto'})
        t.height = t.$body.outerHeight()

        if(t.collapsed)
            t.$body.css({height:0})

    }
    changeState(){
        const t=this

        t.collapsed = !t.collapsed

        if(t.collapsed){
            TM.to(t.$body, .5,{height: 0})
            t.$.addClass('collapsed')
        }else{
            TM.to(t.$body, .5,{height: t.height})
            t.$.removeClass('collapsed')
        }
    }
    deactivate(){
        const t=this

        t.collapsed = false

        t.resize()

        t.$.removeClass('collapsed')

    }

}