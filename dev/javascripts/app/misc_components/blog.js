class Blog {
    constructor($element) {
        const t = this

        t.$ = $element
        t.$rect = $element.find('.back-rect')

        t.container = $('.mansory-container')
        t.itemsClassName = '.mansory-item'

        t.init()
        t.bindEvents()
    }

    init(){
        const t = this

        t.setUpMansory()
        t.calcRectPos()
    }

    bindEvents(){
        const t = this

        $(window).on("resize", t.calcRectPos.bind(t))
    }

    calcRectPos() {
        const t = this

        // pas pour le breakpoint sm
        if ( $(window).innerWidth() < 840 || $(window).innerHeight() < 500  ) {
            TM.set(t.$rect, {bottom: 0 })
            return null
        }

        let $comment = t.$.find(".community-post").eq(0).find(".community-post__comments")
        let commentH = $comment.innerHeight()

        TM.set(t.$rect, {bottom: commentH - 1 })
    }

    setUpMansory() {
        const t = this

        // pas pour le breakpoint sm
        if ( $(window).innerWidth() < 840 || $(window).innerHeight() < 500  ) return null

        t.container.masonry({
          itemSelector: t.itemsClassName,
        })
    }
}