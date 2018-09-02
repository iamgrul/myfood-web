class Website {
    constructor() {
        const t = this

        t.test = true

        t.init()
    }
    init() {
        const t = this

        t.objsToDestroy = []

        t.bindEvents()

        if (isTablet() || isMobile())
            $body.addClass('mobile-tablet')
    }

    newPage() {
        const t = this

        t.$main = $('main')

        t.destroyObjs()

        Website.lazyLoad()

        Website.transformSvgImg()

        Website.setSizes()

        Website.setupMailLinks()

        Website.removeHover()
    }
    destroyObjs() {
        const t = this

        t.objsToDestroy.forEach((obj)=> {

            obj.destroy()
        })

        t.objsToDestroy = []

    }

    bindEvents() {
        const t = this

        $window.on('resize', Website.setSizes)

        $window.on('ajax_start_load_page', ()=>{})

        $window.on('ajax_page_loaded', ()=>{})

    }
    static removeHover() {
        const t = this

        if (isTablet() || isMobile())
            $('.hv').removeClass('hv')

    }
    static console(thing) {
        const t = this

        if (t.test)
            console.log(thing)
    }

    static setSizes() {
        const t = this

        ww = $window.width()
        wh = $window.height()

        Website.cropImg()
    }

    static cropImg() {
        const t = this



        $('.crop-img').each(function () {
            let $img = $(this).find('img, video')

            let src = ''

            if ($img.hasClass('lzld') || $img.hasClass('mobile-img')) {
                $img.on('load', ()=> {
                    $img.removeClass('lzld')
                    TM.to($img.parents('.bd-sh'), 0, {className: '-=bd-sh', delay: .4})
                })
                if (ww < 720) {
                    src = ($img.hasClass('mobile-img') && $img.attr('data-src-mobile') != '') ? $img.attr('data-src-mobile') : $img.attr('data-src-medium')
                } else {
                    src = $img.attr('data-src')
                }
                $img.attr('src', src)
            }

            if ($img.hasClass('loaded')) {
                simpleCrop($img)
            } else {
                cropImage($img, ()=>$img.addClass('loaded'))
            }
        })

        $window.trigger('resized')
    }

    static lazyLoad() {
        $('.lzld').each(function () {
            let $img = $(this)

            if(!$img.parents('.crop-img').length > 0){
                TM.set($img, {opacity: 0})

                $img.on('load', ()=>TM.set($img, {opacity: 1}))

                $img.attr('src', $img.attr('data-src'))

                $img.removeClass('lzld')
            }
        })
    }

    static setupMailLinks() {
        const t = this

        const regex = '[at]'

        $('.safe-mail-link').each(function () {
            let $lk = $(this)

            if($lk.attr('href').indexOf(regex) > -1){
                $lk.attr('href', $lk.attr('href').replace(regex, '@'))
            }

            if($lk.text().indexOf(regex) > -1){
                $lk.text($lk.text().replace(regex, '@'))
            }
        })
    }

    static  transformSvgImg() {
        const t = this

        $('img.svg').each(function () {
            let $img = $(this),
                imgID = $img.attr('id'),
                imgClass = $img.attr('class'),
                imgURL = $img.attr('src')

            $.get(imgURL, (data)=> {
                let $svg = $(data).find('svg')
                if (typeof imgID !== 'undefined') {
                    $svg = $svg.attr('id', imgID)
                }
                if (typeof imgClass !== 'undefined') {
                    $svg = $svg.attr('class', imgClass + ' replaced-svg')
                }
                $svg = $svg.removeAttr('xmlns:a')
                $img.replaceWith($svg)
            }, 'xml')
        })
    }
    static disableScroll(){
        if (window.addEventListener) {
            window.addEventListener('DOMMouseScroll', Website.wheel, {passive: true});
        }
        window.onmousewheel = document.onmousewheel = Website.wheel
        document.onkeydown = keydown
        window.SCROLL_ENABLE = false
    }
    static enableScroll(){
        if (window.removeEventListener) {
            window.removeEventListener('DOMMouseScroll', Website.wheel, {passive: true})
        }
        window.onmousewheel = document.onmousewheel = document.onkeydown = null

        setTimeout(function(){
            window.SCROLL_ENABLE = true
        }, 100)
    }
    static wheel(e){
        Website.preventDefault(e)
    }
    static preventDefault(e){
        e = e || window.event
        if (e.preventDefault)
            e.preventDefault()
        e.returnValue = false
    }
    static keyDown(e){
        let  keys = [37, 38, 39, 40, 32]

        key.forEach((key)=>{
            if (e.keyCode === key) {
                Website.preventDefault(e)
                return
            }
        })
    }

    static transform_hover(){
        if(isMobile() || isTablet()){
            try {
                var pattern = /:hover\b/,
                    sheet, rule, selectors, newSelector,
                    selectorAdded, newRule, i, j, k;
                for (i=0; i<document.styleSheets.length; i++) {
                    sheet = document.styleSheets[i];
                    for (j=sheet.cssRules.length-1; j>=0; j--) {
                        rule = sheet.cssRules[j];
                        if (rule.type !== CSSRule.STYLE_RULE || !pattern.test(rule.selectorText)) {
                            continue;
                        }
                        selectors = rule.selectorText.split(',');
                        newSelector = '';
                        selectorAdded = false;
                        // Iterate over the selectors and test them against the pattern
                        for (k=0; k<selectors.length; k++) {
                            // Add string to the new selector if it didn't match
                            if (pattern.test(selectors[k])) {
                                continue;
                            }
                            if (!selectorAdded) {
                                newSelector += selectors[k];
                                selectorAdded = true;
                            } else {
                                newSelector += ", " + selectors[k];
                            }
                        }
                        // Remove the rule, and add the new one if we've got something
                        // added to the new selector
                        if (selectorAdded) {
                            newRule = rule.cssText.replace(/([^{]*)?/, newSelector + ' ');
                            sheet.deleteRule(j);
                            sheet.insertRule(newRule, j);
                        } else {
                            sheet.deleteRule(j);
                        }
                    }
                }
            } catch(e){}
        }
    }
}

