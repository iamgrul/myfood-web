let $window,
    $document,
    $header,
    $body,
    $loader,
    $footer,
    $wrapper

$(window).on('load',()=>{




    $window = $(window)

    $header = $('header')

    $body = $('body')

    $loader = $('#main-loader')

    $footer = $('footer')

    $wrapper = $('#wrapper')

    if(isIE){
        $body.addClass('ie')
    }
    if(isSafari){
        $body.addClass('safari')
    }
    if(isFirefox){
        $body.addClass('firefox')
    }


    // si on est sur la page de browser too old ne pas mettre de JS
    if ( document.getElementById("template-update-browser") ) {
        document.getElementById("main-loader").style.display = "none"
    }
    else {

        // ajoute hook si erreur document
        window.addEventListener('error', function() {
            document.location.href = document.getElementById("linkUpdateBrowser").getAttribute("href")
        })

        window.website = new MyFood()
    }
})
