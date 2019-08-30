<?php
namespace StanfordDaily\Tipster;

class SlackClient
{
    private $token;
    private $channel;
    private $client;

    function __construct($args) {
        $this->client = $args["httpClient"];
        $this->token = $args["token"];
        $this->channel = $args["channel"];
    }

    public function send_message($text) {
        // See https://api.slack.com/methods/chat.postMessage for more options.
        $this->client->post(array(
            "authorization" => $this->token,
            "url" => "https://slack.com/api/chat.postMessage",
            "data" => array(
                "channel" => $this->channel,
                "text" => $text
            )
        ))
    }
}