<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\DiscordService;
use Illuminate\Http\Request;

class VisitorsApiController extends Controller
{
    public function countVisitor(Request $request)
    {   
        $data = $request->validate([
            "ip" => "required|ip",
            "country" => "required|string",
        ]);

        try {
            $this->saveVisitor($data['ip'], $data['country']);
        } catch (\Exception $e) {
            // Log the error or handle it as needed
            \Log::error('Failed to save visitor: ' . $e->getMessage());
            return response()->json(['message' => 'Failed to save visitor'], 500);
        }

        DiscordService::sendToChannel(
            'VisitorBot',
            'visitor',
            "Nouveau visiteur depuis le pays : " . $data['country']
        );
        return response()->json(['message' => 'Visitor counted successfully'], 201);
    }

    public function countVisitorIndustry(Request $request)
    {   
        $data = $request->validate([
            "ip" => "required|ip",
            "country" => "required|string",
        ]);

        try {
            $this->saveVisitor($data['ip'], $data['country']);
        } catch (\Exception $e) {
            // Log the error or handle it as needed
            \Log::error('Failed to save visitor: ' . $e->getMessage());
            return response()->json(['message' => 'Failed to save visitor'], 500);
        }

        DiscordService::sendToChannel(
            'VisitorBot',
            'visitor_industry',
            "Nouveau visiteur depuis le pays : " . $data['country']
        );
        return response()->json(['message' => 'Visitor counted successfully'], 201);
    }

    private function saveVisitor($ip, $country)
    {
        $visitor = new \App\Models\Visitors();
        $visitor->ip = $ip;
        $visitor->country = $country;

        try {
            $visitor->save();
        } catch (\Exception $e) {
            // Log the error or handle it as needed
            \Log::error('Failed to save visitor: ' . $e->getMessage());
            return response()->json(['message' => 'Failed to save visitor'], 500);
        }
    }
}