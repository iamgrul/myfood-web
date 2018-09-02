class Selector extends Collapsible{
    init(){
        const t=this

        t.$selection = t.$.find('.selector--mobile__selection')

        t.$list = t.$.find('.selector--mobile__list')

        t.$li = t.$.find('.selector--mobile__li')

        t.$button = t.$selection

        t.$body = t.$list

        t.collapsed = true

        t.height = 0

        t.resize()

        t.bindEvents()
    }
    bindEvents(){
        super.bindEvents()

        const t=this

        t.$li.on('click', function(){

            t.$selection.find('.selector--mobile__selection__label').text($(this).text())

            t.changeState()
        })
    }
}