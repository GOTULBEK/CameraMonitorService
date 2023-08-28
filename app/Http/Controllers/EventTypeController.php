<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventTypeRequest;
use App\Models\Event_type;

class EventTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Event_type::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(EventTypeRequest $request)
    { 
        // return Event_type::create($request->all());
        return $request->all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventTypeRequest $request)
    {
        return Event_type::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Event_type::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return Event_type::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventTypeRequest $request, string $id)
    {
        return Event_type::findOrFail($id)->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return Event_type::findOrFail($id)->delete();
    }
}
