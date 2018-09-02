class WoocommerceMisc{
    constructor(){
        const t=this


        t.init()
    }
    init(){
        const t=this

        t.fakeAddToCartButton()

    }
    fakeAddToCartButton(){

        $('.fake-add-to-cart').on('click', function(){

            $(this).parents('.product-woocommerce-actions').find('.single_add_to_cart_button').click()

        })

    }

}