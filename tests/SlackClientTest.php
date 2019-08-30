<?php
declare(strict_types=1);

use StanfordDaily\Tipster\SlackClient;
use StanfordDaily\Tipster\HTTPClient;
use PHPUnit\Framework\TestCase;

final class SlackClientTest extends TestCase
{

    public function testSendMessage(): void
    {

        $expectedCall = array(
            "authorization" => "token",
            "url" => "https://slack.com/api/chat.postMessage",
            "data" => array(
                "channel" => "channel",
                "text" => "text"
            )
        );

        $clientMock = $this->getMockBuilder(HTTPClient::class)
                         ->setMethods(['post'])
                         ->getMock();

        $clientMock->expects($this->once())
            ->method('update')
            ->with($this->equalTo($expectedCall));

        $client = new SlackClient(array(
            "token" => "token",
            "channel" => "channel"
        ));

        $client->send_message("Test message");
    }

}