<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VisitorsApiController extends Controller
{
    public function countVisitor(Request $request)
    {   
        $data = $request->validate([
            "ip" => "required|ip",
            "country" => "required|string",
        ]);

        $visitor = new \App\Models\Visitors();
        $visitor->ip = $data['ip'];
        $visitor->country = $data['country'];

        try {
            $visitor->save();
        } catch (\Exception $e) {
            // Log the error or handle it as needed
            \Log::error('Failed to save visitor: ' . $e->getMessage());
            return response()->json(['message' => 'Failed to save visitor'], 500);
        }


        return response()->json(['message' => 'Visitor counted successfully'], 201);
    }
}