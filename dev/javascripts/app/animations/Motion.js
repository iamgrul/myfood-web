class Motion{
  constructor(settings){
    const _self = this

    _self.animation = settings.animation

    _self.$ = settings.$

    _self.$container = settings.$container

    _self.setup()

  }
  setup(){
    const _self = this

    _self.animation = lottie.loadAnimation({
      container: _self.$container[0],
      renderer: 'svg',
      loop: true,
      autoplay: true,
      path: myfood.theme + '/assets/animations/'+_self.animation+'.json'
    })

    _self.$zoom = _self.$.find('.zoom-attraction')

    if(_self.$zoom.length > 0){
      _self.bindEvents()
    }

  }
  bindEvents(){
    const _self = this

    _self.$.on('mousemove', (e)=>{
      _self.attraction(e)
    })

    _self.$.on('mouseleave', ()=>{
      _self.leave()
    })

    $window.on('resize', _self.resize.bind(_self))

    setTimeout(_self.resize.bind(_self), 1000)
  }
  resize(){
    const _self = this

    TM.set(_self.$zoom,{x:0, y:0})

    _self.origin = {
      x:  _self.$zoom.offset().left - _self.$.offset().left,
      y:  _self.$zoom.offset().top - _self.$.offset().top,
      parent: {
        x: _self.$.offset().left,
        y: _self.$.offset().top,
      }
    }
  }
  attraction(e){
    const _self = this

    let x = ((e.pageX - _self.origin.parent.x) - _self.origin.x) * .15,
        y = ((e.pageY - _self.origin.parent.y) - _self.origin.y) * .15

    TM.to( _self.$zoom, .3,{x, y})
  }
  leave(){
    const _self = this

    TM.to( _self.$zoom, .5,{x:0, y:0, ease:Back.easeOut})
  }
}