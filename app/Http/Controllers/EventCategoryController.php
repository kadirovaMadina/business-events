<?php

namespace App\Http\Controllers;

use App\Models\EventCategory;
use Illuminate\Http\Request;

class EventCategoryController extends Controller
{
    public function index()
    {
        return response()->json(EventCategory::all(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $category = EventCategory::create($data);
        return response()->json($category, 201);
    }

    public function show($id)
    {
        $category = EventCategory::findOrFail($id);
        return response()->json($category, 200);
    }

    public function update(Request $request, $id)
    {
        $category = EventCategory::findOrFail($id);
        $data = $request->all();
        $category->update($data);
        return response()->json($category, 200);
    }

    public function destroy($id)
    {
        $category = EventCategory::findOrFail($id);
        $category->delete();
        return response()->json(['message' => 'Category deleted successfully'], 200);
    }
}
