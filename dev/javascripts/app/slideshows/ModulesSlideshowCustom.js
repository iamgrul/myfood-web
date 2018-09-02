class ModulesSlideshowCustom extends ModulesSlideshow{
  constructor(settings){
    super(settings)

    this.hidden = false
  }
  setupCard($card){
    const t=this

    let ease = Cubic.easeInOut

    let card = {
      $:$card,
      tl: new TimelineMax({paused:true})
    }

    card.tl
      .to($card.find('.card__button'), .5, {height:0, ease}, 0)
      .to($card.find('.card__module__mention'), .5, {height:0, opacity:0, ease}, 0)
      .to($card.find('.card__module__point'), .5, {opacity:0, y:20, ease}, -.1, 0.5)

    card.tl.progress(1)

    return card

  }
  size(){
    const t=this

    if(t.hidden)
      return;

    let width = (t.$slides.eq(2).offset().left - t.$slides.eq(1).offset().left)  * (t.$slides.length+2)

    if(width < ww){
      width = ww * t.$slides.length
    }

    t.slideMargin = 60

    let nbOnScreen = Math.round(t.$.width()/(t.$slides.width()+t.slideMargin)+1)

    if(nbOnScreen%2==0)
      nbOnScreen += 1

    let marginLeft = - nbOnScreen/2 * (t.$slides.width() + t.slideMargin)
    let left = "50%"

    if(ww <= breakpoints.md){
      width = ww *  (t.$slides.length+1)
    }

    t.$list.css({width})

    let ease = Cubic.easeInOut

    t.cards.forEach((card, idx)=>{
      card.tl.clear().kill()

      TM.set(card.$.find('.card__button'),{height:'auto'})
      TM.set(card.$.find('.card__module__mention'),{height:'auto', opacity:1})
      TM.set(card.$.find('.card__module__point'), {opacity:1, y:0})

      card.tl
        .to(card.$.find('.card__button'), .5, {height:0, ease}, 0)
        .to(card.$.find('.card__module__mention'), .5, {height:0, opacity:0, ease}, 0)
        .to(card.$.find('.card__module__point'), .5, {opacity:0, y:20, ease}, -.1, 0.5)

      if(idx != t.idx)
        card.tl.progress(1)
    })

  }
}