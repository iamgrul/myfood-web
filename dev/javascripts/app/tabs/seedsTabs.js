class SeedsTabs{
  constructor(settings){
    const t = this

    t.$ = settings.$

    t.slideshow = new SeedSlideshow({$:t.$.find('.seeds-slideshow__seasons')})

    t.tabHeadClass = 'tabs-selector__tab'
    t.tabHeadMobileClass = 'selector--mobile__li'
    t.switchClass = 'navigation-switch__button'

    t.$vegetableTypes = t.$.find('.'+t.tabHeadClass).on('click', function(){
      $(this).addClass(t.tabHeadClass+'--active').siblings().removeClass(t.tabHeadClass+'--active')
      t.filterSeeds()
    })

    t.vegetableFiltersActive = t.$vegetableTypes.length > 0

    t.$seasons = t.$.find('.'+t.switchClass).on('click', function(){
      $(this).addClass(t.switchClass+'--active').siblings().removeClass(t.switchClass+'--active')
      t.filterSeeds()
    })

    t.$vegetableTypesMobile = t.$.find('.'+t.tabHeadMobileClass).on('click', function(){
      $(this).addClass(t.tabHeadMobileClass+'--active').siblings().removeClass(t.tabHeadMobileClass+'--active')
      t.filterSeeds()
    })


    t.$slidesCt = t.$.find('.seeds-slideshow__content__slides')
    t.baseSlideClass = '.seeds-slideshow__slide'
    t.nbCells = 9

    t.filterSeeds()

  }
  filterSeeds(){
    const t=this

    t.slideClass = t.baseSlideClass

    if(t.vegetableFiltersActive){
      if(ww > breakpoints.sm){
        t.slideClass += '.'+ t.$vegetableTypes.filter('.'+t.tabHeadClass+'--active').attr('data-klass')
      }else{
        t.slideClass += '.'+ t.$vegetableTypesMobile.filter('.'+t.tabHeadMobileClass+'--active').attr('data-klass')
      }
    }

    t.slideClass += '.'+ t.$seasons.filter('.'+t.switchClass+'--active').attr('data-klass')

    // console.log(t.$slidesCt.find(t.slideClass).length)

    TM.staggerTo(t.$slidesCt.find(t.baseSlideClass).not('.hidden').slice(0, t.nbCells+1), .4, {opacity:0}, .03, ()=>{

      t.$slidesCt.prepend(t.$slidesCt.find(t.slideClass))

      t.$slidesCt.find(t.baseSlideClass).addClass('hidden')

      t.$slidesCt.find(t.slideClass).removeClass('hidden')

      $window.trigger('resize')

      TM.set(t.$slidesCt.find(t.slideClass), {opacity:0})

      TM.staggerTo(t.$slidesCt.find(t.baseSlideClass).not('.hidden'), .4, {opacity:1, scale:1}, .03)
    })


  }

}