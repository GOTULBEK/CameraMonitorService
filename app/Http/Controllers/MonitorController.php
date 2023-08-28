<?php
namespace App\Http\Controllers;

use App\Models\Camera;
use Illuminate\Http\Request;

class MonitorController extends Controller
{
    public function setup()
    {
        $cameras = Camera::all();
        return view('monitor-setup', compact('cameras'));
    }

    public function save(Request $request)
    {
        // Validate input
        $request->validate([
            'monitorName' => 'required',
            'roles' => 'array',
            'cameraIds' => 'array',
        ]);

        // Save monitor configuration and associated cameras to the database
        // Adjust this part according to your database structure and models

        return response()->json(['message' => 'Monitor configuration saved successfully']);
    }
}

