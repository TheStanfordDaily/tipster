<?php
/**
 * Plugin Name: Tipster
 * Plugin URI: https://github.com/TheStanfordDaily/tipster
 * Description: Adds a REST endpoint to WordPress that can accept tips and send it over to a Slack channel.
 * Author: The Stanford Daily Tech Team
 * Version: 0.1
 * Author URI: https://github.com/TheStanfordDaily
 */
// https://codex.wordpress.org/Creating_Tables_with_Plugins
namespace StanfordDaily\Tipster;

const REST_ENDPOINT = "tipster/v1";

include  __DIR__ . "/inc/options_page.php";
include  __DIR__ . "/inc/api_endpoint.php";