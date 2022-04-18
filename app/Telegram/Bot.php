<?php

namespace App\Telegram;

use GuzzleHttp\Client;

class Bot
{
    private Client $client;

    private string $chatId;

    public function __construct($token)
    {
        $this->client = new Client([
            "base_uri" => "https://api.telegram.org/bot{$token}/"
        ]);

        $this->fetChatId();
    }

    private function fetChatId () {
        $response = $this->getUpdates();
        $this->chatId = $response->result[0]->message->chat->id;
    }

    public function getMe() {
        $response = $this->client->get( 'getMe');
        return json_decode($response->getBody()->getContents());
    }

    public function getUpdates () {
        $response = $this->client->get( 'getUpdates');
        return json_decode($response->getBody()->getContents());
    }

    public function sendMessage(string $message) {
        $response = $this->client->post('sendMessage', [
            'json' => [
                "chat_id" => $this->chatId,
                "text" => $message
            ]
        ]);

        return json_decode($response->getBody()->getContents());
    }
}
