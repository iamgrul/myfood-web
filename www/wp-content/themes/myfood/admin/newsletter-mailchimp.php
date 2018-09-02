<?php

function record_newsletter() {
    $email = (isset($_GET['email']) && $_GET['email']) ? $_GET['email'] : null;
    $lang = (isset($_GET['language_code']) && $_GET['language_code']) ? $_GET['language_code'] : 'en';

    if($email){

        $api_key = 'XXXXXXXXXXXXXXXXXXXXX-us11';

        // default en EN
        if ( ICL_LANGUAGE_CODE === 'fr' ) $list_id = 'XXXXX';
        else if ( ICL_LANGUAGE_CODE === 'de' ) $list_id = 'XXXXXX';
		else $list_id = 'XXXXXXX';

        mc_subscribe($email,$api_key, $list_id);
    }

    die(json_encode(array('statuts' => 'no mail')));
}

add_action ('wp_ajax_record_newsletter', 'record_newsletter');
add_action ('wp_ajax_nopriv_record_newsletter', 'record_newsletter');


function mc_subscribe($email, $apikey, $listid) {

    $server = substr($apikey,strpos($apikey,'-') +1);
    $auth = base64_encode( 'user:'.$apikey );


    $data = array(
        'apikey'        => $apikey,
        'email_address' => $email,
        'status'        => 'subscribed',
    );
    var_dump($auth);


    $json_data = json_encode($data);

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://'.$server.'.api.mailchimp.com/3.0/lists/'.$listid.'/members/');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization: Basic '.$auth));
    curl_setopt($ch, CURLOPT_USERAGENT, 'PHP-MCAPI/2.0');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);

    $result = curl_exec($ch);

    if($result)
        die (json_encode(array('succes' => 'Bien enregistré')));
    else
        die (json_encode(array('error' => 'Une erreur est survenue')));
}


// OLD ::::
//function record_newsletter() {
//    $email = (isset($_GET['email']) && $_GET['email']) ? $_GET['email'] : null;
//    $lang = (isset($_GET['language_code']) && $_GET['language_code']) ? $_GET['language_code'] : 'en';
//
//    if($email){
//        require_once('lib/MCAPI.class.php');
//
//        $api_key = 'c1545b418e35654689fe02071be2d13f-us11';
//
//        // default en EN
//        if ( ICL_LANGUAGE_CODE === 'fr' ) $list_id = '89cd01ade3';
//        else if ( ICL_LANGUAGE_CODE === 'de' ) $list_id = '9ba687ddf7';
//		else $list_id = '01670f9baa';
//
//        $api = new MCAPI($api_key);
//        $result_api = $api->listSubscribe($list_id, $email, '', '', '', 'true', 'true');
//
//        die(json_encode(array('statuts' => $result_api)));
//    }
//
//    die(json_encode(array('statuts' => 'no mail')));
//}
//add_action ('wp_ajax_record_newsletter', 'record_newsletter');
//add_action ('wp_ajax_nopriv_record_newsletter', 'record_newsletter');