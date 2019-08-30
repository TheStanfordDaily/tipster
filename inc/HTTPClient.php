<?php
namespace StanfordDaily\Tipster;

class HTTPClient {
    /*
     * Sent a POST request with a json body.
     * $args: {
     *  "url": URL to send request to
     *  "data": array that will be serialized to a JSON body.
     *  "authorization": authorization token to be sent in the Authorization header.
     * }
     */
    function post($args) {
        $url = $args["url"];
        $data = $args["data"];
        $authorization = $args["authorization"];                                                                
        $data_string = json_encode($data);                                                                                   
                                                                                                                             
        $ch = curl_init($url);                                                                      
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
            'Content-Type: application/json',                                                                                
            'Content-Length: ' . strlen($data_string),
            'Authorization: ' . $authorization
        )                                                                       
        );                                                                                                                   
                                                                                                                             
        $result = curl_exec($ch);
        curl_close($ch);
        return json_decode($result, true);
    }
}