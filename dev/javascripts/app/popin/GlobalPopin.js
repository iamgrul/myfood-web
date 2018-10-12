class GlobalPopin{
    constructor(){
        let t=this

        t.$ = $('#global-popin')

        t.init()
    }
    init(){
        let t=this

        t.opened = false
        t.$popCt = t.$.find('.popin-ct')
        t.$popC = t.$.find('.pop-ct')
        t.$close = t.$.find('.close-bt, .overlay')
        t.originalYPos = $window.scrollTop()

        t.$originalParent = null

        //bind --------------
        t.$close.on('click', t.close.bind(t))
        t.initClickOpenPopin()
    }
    open($content = null){
        let t=this

        let maxH = wh

        if($content){
            t.$popC.empty()
            t.$popC.append($content)
        }


        Website.cropImg()

        if($content.hasClass('full-screen')){
            t.$.addClass('full-screen')
        }else{
            t.$.removeClass('full-screen')
        }


        if(!t.opened) {
            t.opened = true
            t.$.css({display:"block"})

            Website.cropImg()

            t.$popCt.removeClass('scroll')
            $body.addClass('pop-opened')

            TM.to(t.$, .7,{opacity:1, onComplete:()=>{
                // t.originalYPos = $window.scrollTop()
                // $body.css({marginTop:-t.originalYPos})
            }})

        }


        t.$close = t.$.find('.cbutton--close, .overlay, .cbutton--close-popin')
        t.$close.on('click', t.close.bind(t))

    }
    close(){
        let t=this

        if(!t.opened) return

        t.opened = false

        TM.to(t.$, .7,{opacity:0, onComplete:()=>{

            if(t.$content.hasClass('no-clone')){
                t.$originalParent.append(t.$content)
            }else{
                t.$popC.empty()
            }

            t.$.css({display:"none"})
        }})
        $body.removeClass('pop-opened')

        // $body.css({marginTop:'0'})
        // $window.scrollTop(t.originalYPos)
    }
    initClickOpenPopin(){
        let t=this

        $body.on('click', '[data-open-popin]', function(){
            t.$content = $(this).parents('.popin-content-container').find('.' + $(this).attr('data-open-popin'))

            if(t.$content.hasClass('no-clone')){
                t.$originalParent = t.$content.parent()
            }else{
                t.$content =  t.$content.clone()

                if(t.$content.hasClass('iframe-c') && t.$content.find('iframe').attr('data-src')){
                    t.$content.find('iframe').attr('src', t.$content.find('iframe').attr('data-src'))
                }
            }

            t.open(t.$content)

        })
    }
}