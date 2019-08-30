<?php
declare(strict_types=1);

use StanfordDaily\Tipster\SlackClient;
use PHPUnit\Framework\TestCase;

final class SlackClientTest extends TestCase
{

    public function testInit(): void
    {
        $client = SlackClient(array(
            "token" => "token",
            "channel" => "channel"
        ));
    }

}