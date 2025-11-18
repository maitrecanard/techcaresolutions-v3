<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class DiscordService
{
    public static function sendToChannel(string $botName, string $channel, string $message): bool
    {
        $webhookUrl = config("services.discord.$channel");

        if (!$webhookUrl) {
            \Log::warning("Webhook Discord introuvable pour le canal : $channel");
            return false;
        }

        return Http::post($webhookUrl, [
            'content' => $message,
            'username' => $botName,
        ])->successful();
    }
}
