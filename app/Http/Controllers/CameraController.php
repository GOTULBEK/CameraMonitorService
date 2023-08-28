<?php

namespace App\Http\Controllers;

use App\Http\Requests\CameraRequest;
use App\Models\Camera;
use Illuminate\Http\Request;
class CameraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){

        $cameras = Camera::all(); // Retrieve all cameras from the database
        return view('cameras', compact('cameras')); // Pass cameras to the view
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(CameraRequest $request)
    {
        return Camera::create($request->all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CameraRequest $request)
    {
        return Camera::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Camera::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return Camera::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return Camera::findOrFail($id)->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return Camera::findOrFail($id)->delete();
    }
    public function assignToMonitor(Request $request, string $cameraId){
        // Validate the input
        $validatedData = $request->validate([
            'monitor_id' => 'required|exists:monitors,id'
        ]);

        // Find the camera and update its monitor association
        $camera = Camera::findOrFail($cameraId);
        $camera->monitor_id = $validatedData['monitor_id'];
        $camera->save();

        return response()->json(['message' => 'Camera assigned to monitor successfully']);
    }
}
