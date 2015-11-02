<?php

/**
 * @param $url
 * @param $token
 * @return mixed
 */
function api_request($token, $url)
{
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => $url,
        CURLOPT_HTTPHEADER => [
            'token: '.$token
        ]
    ));
    $response = curl_exec($curl);
    curl_close($curl);

    return json_decode($response, true);
}

?>