class Buttons{
    constructor(){
        const t=this

        $('.cbutton.cbutton--border.cbutton--border--green').each(function(){
            t.setupCircleButton($(this))
        })

        $('.cbutton.cbutton--border.cbutton--border--white').each(function(){
            t.setupCircleButton($(this))
        })


    }
    setupCircleButton($btn){
        const t=this

        //Test 1
        // $btn.append('<span class="cc"></span>' +
        //     '<svg class="circle"><circle cx="62" cy="62" r="45" /></svg>' +
        //     '<svg class="rect" width="'+($btn.outerWidth()+4)+'" height="'+($btn.outerHeight()+4)+'"><rect x="2px" y="2px" rx="20" ry="20" width="'+$btn.outerWidth()+'" height="'+$btn.outerHeight()+'"></rect></svg>');
        // $btn.addClass('cbutton--svg-circle')

        //Test 2
        $btn.addClass('cbutton--mask hv')
        $btn.append('<span class="cbutton__mask"><i></i></span>')

        //Test 3
        // t.bubbles($btn)

    }
    bubbles($btn){
        $btn.addClass('cbutton--mask-circle hv')
        $btn.append('<div class="cbutton__mask">' +
            '<span><i></i><i></i><i></i><i></i><i></i></span>' +
            '</div>')


        $btn.find('.cbutton__mask i').each(function(idx){

            let bezierValues = []
            for(let j = 0; j < 3; j++){
                bezierValues.push({
                    x:(Math.random()-.5) * $btn.width()*2,
                    y:(Math.random()-.5) * $btn.height()*2,
                })
            }
            bezierValues.push({x:0,y:0})

            if(idx > 0){
                TM.to(this, 10+Math.random()*10, {bezier:bezierValues, ease:Linear.easeNone, repeat:-1, yoyo: true});
            }
        })

        $btn.on('mouseenter', ()=>{
            $btn.addClass('hvd')
        })

        $btn.on('mousemove', (e)=>{
            TM.to($btn.find('.cbutton__mask i').eq(0),.1, {x:e.pageX - $btn.offset().left, y:e.pageY - $btn.offset().top, delay:.1})
        })

        $btn.on('mouseleave', ()=>{
            $btn.removeClass('hvd')
        })
    }
}