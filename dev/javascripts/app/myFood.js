class MyFood extends Website {
    constructor() {
        super()
    }
    init() {
        super.init()

        const t = this


        $window.on('resize', t.resize.bind(t))

        t.newPage()

        t.header = new Header()

        t.resize()

        t.closeLoader()

        t.setupLoader()


    }

    // testBrowser() {
    //     const t = this
    //
    //     console.log("IN TEST BROWSER")
    //     console.log('ici', $("#linkUpdateBrowser").attr("href"))
    //
    //     // lance un timer pour rediriger vers la page si bloquer sur le loader
    //
    //
    //     // if ( $("#template-update-browser").length > 0 || !isEdge ) return null;
    //     //
    //     // // parse l'user agent pour trouver la version du navigateur
    //     // let userAgent = navigator.userAgent
    //     //
    //     // let indexEdge = userAgent.indexOf("Edge/")
    //     // let indexVersion = indexEdge + 5
    //     // let indexDots = userAgent.indexOf(".", indexVersion)
    //     // let version = userAgent.slice( indexVersion, indexDots )
    //     //
    //     // // si la version est === 14 alors on redirige vers la page update navigateur
    //     // if ( version === "14" ) document.location.href = $("#linkUpdateBrowser").attr("href")
    // }


    newPage() {
        super.newPage()
        const t = this

        t.setupCommons()

        t.checkPage()

        if (t.isHome)
            t.setupHome()

        else if (t.isContact)
            t.setupContact()

        else if (t.isFaq)
            t.setupFaq()

        else if (t.isConcept)
            t.setupConcept()

        else if (t.isProduct)
            t.setupProduct()

        else if (t.isShop)
            t.setupShop()

        else if (t.isSingle)
            t.setupSingle()

        else if (t.isBlog)
            t.setupBlog()

        else if (t.isCommunity)
            t.setupCommunity()

        else if (t.isPartnersMedias) {
            t.setupPartnersMedia()
            if (t.isMedia) t.setupMedia()
        }
        else if (t.isRoadmap)
            t.setupRoadmap()

        else if (t.isSinglePionner)
            t.setupSinglePioneer()

        else if (t.isBecomePionner)
            t.scrollAnimations.setupBecomePioneer()
        else
            t.scrollAnimations.setupCommon()


    }

    checkPage() {
        const t = this

        t.isHome = $('#template-home').length > 0

        t.isContact = $('#template-contact').length > 0

        t.isFaq = $('#template-faq').length > 0

        t.isConcept = $('#template-concept-sgh').length > 0 || $('#template-concept-aero').length > 0 || $('#template-concept-technics').length > 0

        t.isCommunity = $('#template-community-pioneers').length > 0 || $('#template-community-team').length > 0 || $('#template-community-hub').length > 0

        t.isBlog = $('#template-blog').length > 0

        t.isProduct = $('#single-product').length > 0

        t.isShop = $('#template-shop-home').length > 0

        t.isSingle = $('#single-blog').length > 0

        t.isPartnersMedias = $('.page-partners-medias').length > 0

        t.isMedia = $('#template-about-medias').length > 0

        t.isRoadmap = $('#template-about-roadmap').length > 0

        t.isSinglePionner = $('#single-pioneer').length > 0

        t.isBecomePionner = $('#template-become-pioneer').length > 0
    }

    setupCommons() {
        const t = this

        t.scrollAnimations = new ScrollAnimation()

        $('.seo-footer').each(function () {
            new Collapsible({
                $: $(this),
                $body: $(this).find('.seo-footer__body'),
                $button: $(this).find('.seo-footer__button')
            })
        })

        new GlobalPopin()


        if ($('.cards-slideshow').length > 0) {
            t.cardsSlideshow = new CardsSlideshow({$: $('.cards-slideshow')})
        }


        if ($('.large-slideshow').length > 0) {
            $('.large-slideshow').each(function () {
                new LargeSlideshow({
                    $: $(this)
                })
            })
        }

        if ($('.medias-slideshow').length > 0) {
            $('.medias-slideshow').each(function () {
                let $medias = $(this)

                new LargeSlideshow({
                    $: $medias,
                    $list: $medias.find('.medias-slideshow__container__list'),
                    $slides: $medias.find('.medias-slideshow__slide'),
                    $arrows: $medias.find('.medias-slideshow__navigation .arrow-button'),
                    slideMargin: 122
                })
            })
        }

        if ($('.single-slideshow').length > 0) {
            $('.single-slideshow').each(function () {
                new LightSlideshow({
                    $: $(this),
                    $slides: $(this).find('.single-slideshow__slide')
                })
            })
        }

        new Buttons()

        new NewsletterInput({
            $: $('.footer__newsletter__input'),
            errorMessage: $('.footer__newsletter__input').attr('data-error-message'),
            validationMessage: $('.footer__newsletter__input').attr('data-validation-message'),
            url: myfood.ajaxurl + "?action=record_newsletter"
        })

        if ($('.selector--mobile').length > 0) {
            $('.selector--mobile').each(function () {
                new Selector({$: $(this)})
            })
        }


        Website.transform_hover()
    }

    setupHome() {
        const t = this

        if ($('.slideshow--cover').length > 0) {
            t.homeSlideshow = new HomeSlideshow({$: $('.slideshow--cover')})
        }

        if ($('.products-tabs').length > 0) {
            t.productsTabs = new ProductsTabs({
                $: $('.products-tabs'),
                headsClass: 'head-selector'
            })
        }

        t.scrollAnimations.setupHome()

        HUB.setupStatsData()
    }

    setupShop() {
        const t = this

        if ($('.products-tabs').length > 0) {
            t.productsTabs = new ProductsTabs({
                $: $('.products-tabs'),
                headsClass: 'head-selector'
            })
        }
        t.scrollAnimations.setupShop()

    }

    setupContact() {
        const t = this

        t.contactMap = new Map({id: '#myfood-gmap'})
    }

    setupFaq() {
        const t = this

        $('.collapsible').each(function () {
            new Collapsible({$: $(this)})
        })

        t.scrollAnimations.setupCommon()

    }

    setupConcept() {
        const t = this

        if ($('.sizes-tabs').length > 0) {
            new SizeTabs({
                $: $('.sizes-tabs'),
                tabsClass: 'sizes-tabs__tab',
                headsClass: 'sizes-tabs__head__tab',
            })
        }

        if ($('.seeds-tabs').length > 0) {
            new SeedsTabs({
                $: $('.seeds-tabs')
            })
        }

        if ($('.customize-tabs').length > 0) {
            new CustomizableTabs({
                $: $('.customize-tabs')
            })
        }

        if ($('#template-concept-aero').length > 0) {
            t.aeroMotion = new Motion({
                animation: 'aerospring',
                $container: $('.layout__motion--aerospring'),
                $: $('.layout__motion--aerospring').parents('.layout')
            })
            t.scrollAnimations.setupAerospring()
        }

        if ($('#template-concept-sgh').length > 0) {
            // t.aquaMotion = new Motion({animation: 'aquaponic', $container: $('.technics-tabs__layout__motion--aquaponic'), $: $('.technics-tabs__layout__motion--aquaponic').parents('.technics-tabs__layout')})
            // t.bioMotion = new Motion({animation: 'bioponic', $container: $('.technics-tabs__layout__motion--bioponic'), $: $('.technics-tabs__layout__motion--bioponic').parents('.technics-tabs__layout')})

            t.scrollAnimations.setupSmartGreenhouse()
        }
        if ($('#template-concept-technics').length > 0) {

            t.aquaMotion = new Motion({
                animation: 'aquaponic',
                $container: $('.technics-tabs__layout__motion--aquaponic'),
                $: $('.technics-tabs__layout__motion--aquaponic').parents('.technics-tabs__layout')
            })

            t.bioMotion = new Motion({
                animation: 'bioponic',
                $container: $('.technics-tabs__layout__motion--bioponic'),
                $: $('.technics-tabs__layout__motion--bioponic').parents('.technics-tabs__layout')
            })


            t.permaMotion = new Motion({
                animation: 'perma',
                $container: $('.layout__motion--perma'),
                $: $('.layout__motion--perma').parents('.layout')
            })

            t.scrollAnimations.setupTechnics()
        }
    }

    setupCommunity() {
        const t = this

        t.scrollAnimations.setupCommunity()
        new Blog( $("#community-hub-blog") )

    }

    setupBlog() {
        const t = this

        t.scrollAnimations.setupCommon()
    }

    setupProduct() {
        const t = this


        if ($('.modules-slideshow').length > 0) {
            new ModulesSlideshow({
                $: $('.modules-slideshow')
            })
        }

        if ($('.dual-tab').length > 0) {
            t.productsTabs = new ProductsTabs({
                $: $('#product-introduction'),
                headsClass: 'head-selector'
            })
        }

        if ($('.contents-tabs .tabs-selector').length > 0) {
            t.productsTabs = new Tabs({
                $: $('.contents-tabs'),
                tabsClass: "contents-tabs__tab"
            })
        }

        new WoocommerceMisc()

        t.scrollAnimations.setupProduct()

        $('.products-nav__link').each(function () {
            let $link = $(this)
            let linkTm = null;
            let time = 4000
            let url = $link.attr('href')

            $link.on('mouseenter', () => {
                clearTimeout(linkTm)
                linkTm = setTimeout(() => {
                    if (url)
                        window.location = url
                }, time)
            })
            $link.on('mouseleave', () => {
                clearTimeout(linkTm)
            })

        })
    }

    setupSingle() {
        const t = this

        if ($('.share-box--fixed').length > 0) {
            new SocialShare({
                $: $('.share-box--fixed'),
                $anchor: $('.page-c__section.single-bottom')
            })
        }

        $('.cover-simple__back-button').on('click', function () {

            let previousUrl = document.referrer
            let currentUrl = document.location.href
            let blogUrl = $(this).attr('data-blog')

            if (!previousUrl || previousUrl === currentUrl) document.location.href = blogUrl
            else document.location.href = previousUrl

        })

        t.scrollAnimations.setupCommon()

    }

    setupPartnersMedia() {
        const t = this

        new Tabs({
            $: $('.page-partners-medias'),
            tabsClass: 'page-partners-medias__container'
        })


        t.scrollAnimations.setupCommon()

    }

    setupMedia() {
        const t = this

        let $partnerTabs = $('.page-partners-medias__container').not(".page-partners-medias__container--active")

        $partnerTabs.css('opacity', 0)
        $partnerTabs.show()

        $('.page-partners-medias__container').each(function () {
            setColHeight({
                $boxes: $(this).find('.media-card'),
                innerElClass: '.media-card__middle',
                nbCols: 2
            })
        })

        $partnerTabs.hide()
        $partnerTabs.css('opacity', 1)

        t.scrollAnimations.setupCommon()

    }

    setupRoadmap() {
        const t = this

        $('.page-roadmap__photo .img-c').each(function (idx) {
            new followOnScroll($(this))
        })

        t.scrollAnimations.setupCommon()

    }

    setupSinglePioneer() {
        const t = this

        $('#single-pioneer-others').each(function () {
            setColHeight({
                $boxes: $(this).find('.pioneer-card'),
                innerElClass: '.card__quote',
                nbCols: 2
            })
        })

        t.scrollAnimations.setupPioneer()

    }

    resize() {
        const t = this


        $('[data-equal-h-col]').each(function () {
            setMinHeight($(this).find('.mh-col'))
        })


        $('.news-dbl-cols').each(function () {
            setColHeight({
                $boxes: $(this).find('.news-card'),
                innerElClass: '.news-card__content',
                nbCols: 2
            })
        })

        if (t.isMedia) t.setupMedia()


        clearTimeout(t.resizeTimeout)

        t.resizeTimeout = setTimeout(Website.setSizes, 500)

        // $('#wrapper').css({height: $('#wrapper').find('main.page-c').outerHeight()})

    }

    setupLoader() {
        const t = this

        // $body.on('click', 'a', function(){
        //     var url = $(this).attr('href')
        //
        //     if (url.indexOf(myfood.host) > -1) {
        //         if (window.location.href.trimSlash() == url || url == '#') return;
        //
        //     }
        // })
    }

    openLoader() {
        const t = this
        TM.to($('.main-loader'), 1, {width: '100%'})
    }

    closeLoader() {
        const t = this

        let $header = $('#main-header')
        $header.addClass('no-css-transition')
        TM.from($header, .8, {
            delay: .8, y: '-100%', onComplete: () => {
                $header.removeClass('no-css-transition')
                $header.attr('style', '')
            }
        })
        // TM.from('.points-line', 5,{delay:.8, })

        TM.from('.slideshow', .8, {delay: 1.4, opacity: 0, y: 100})

        $('.main-loader').addClass('closed')

        // on efface le loader de la redirection
        // clearTimeout(redirectTimer)
        // TM.to($('.main-loader'), 1,{delay:.1, width:'0%'})
    }
}


function callbackJsonP(data) {
    console.log(data)
}

if (typeof mWebView !== 'undefined') {
    if (typeof mWebView.getSettings !== 'undefined') {
        mWebView.getSettings().setMinimumFontSize(1)
        mWebView.getSettings().setMinimumLogicalFontSize(1)
    }
}
