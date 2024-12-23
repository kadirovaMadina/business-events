<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        return response()->json(Event::with('category')->get(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'event_date' => 'required|date',
            'photo' => 'nullable|string',
            'location' => 'required|string|max:255',
            'event_category_id' => 'required|exists:event_categories,id',
            'is_active' => 'required|boolean',
        ]);

        $event = Event::create($data);
        return response()->json($event, 201);
    }

    public function show($id)
    {
        $event = Event::with('category')->findOrFail($id);
        return response()->json($event, 200);
    }

    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        $data = $request->all();
        $event->update($data);
        return response()->json($event, 200);
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
        return response()->json(['message' => 'Event deleted successfully'], 200);
    }
}
