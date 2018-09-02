class NewsletterInput {
    constructor(settings) {
        const t = this
        
        t.$ = settings.$

        t.$input = t.$.find('input')
        t.$btn = t.$.find('.valid-newsletter-input')

        t.errorMessage = defval(settings.errorMessage, "Veuillez entrer une adresse valide")
        t.validationMessage = defval(settings.validationMessage, "Merci vous êtes bien inscrit(e)")
        t.url = settings.url

        t.submited = false
        t.$btn.on('click', t.submit.bind(t))
    }
    submit() {
        const t =this

        let email = t.$input.val()

        t.submited = true

        if(email === '' || !t.validate(email)) {

            t.$input.val('')
            t.$input.attr("placeholder", t.errorMessage)

            t.submited = false

        } else {

            let language_code = t.$.find('input[name="language_code"]').val()

            $.ajax({
                url: t.url + '&email=' + email + '&language_code=' + language_code,
                type: "GET",
                success: function (data, success, jqXHR) {
                    t.$input.val('')
                    t.$input.attr("placeholder", t.validationMessage)
                }
            })
        }
    }
    validate(email) {
        const regex = /^(([^<>()[\]\\.,:\s@\"]+(\.[^<>()[\]\\.,:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        return regex.test(email)
    }

}