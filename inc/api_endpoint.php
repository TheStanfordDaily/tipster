<?php
namespace StanfordDaily\Tipster;

include "./SlackClient.php";

function handle_new_tip() {
    $client = new SlackClient(array(
        "token" => get_option("tipster_slack_token"),
        "channel" => get_option("tipster_slack_channel")
    ));
    $params = $request->get_params();
    $client->send_message(array(
        "email" => isset($params["email"]) ? $params["email"]: "",
        "message" => $params["message"]
    ));
}

add_action( 'rest_api_init', function () {
  register_rest_route(StanfordDaily\Tipster\REST_ENDPOINT, '/tips', array(
    'methods' => 'POST',
    'callback' => __NAMESPACE__ . '\handle_new_tip',
  ) );
} );