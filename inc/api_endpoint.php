<?php
namespace StanfordDaily\Tipster;

require_once __DIR__ . "/SlackClient.php";
require_once __DIR__ . "/HTTPClient.php";

function handle_new_tip() {
    $client = new SlackClient(array(
        "httpClient" => new HTTPClient(),
        "token" => get_option("tipster_slack_token"),
        "channel" => get_option("tipster_slack_channel")
    ));
    $params = $request->get_params();
    $email = isset($params["email"]) ? $params["email"]: "Anonymous";
    $message = $params["message"];
    $client->send_message("Tip from ${email}: ${message}");
}

add_action( 'rest_api_init', function () {
  register_rest_route(StanfordDaily\Tipster\REST_ENDPOINT, '/tips', array(
    'methods' => 'POST',
    'callback' => __NAMESPACE__ . '\handle_new_tip',
  ) );
} );