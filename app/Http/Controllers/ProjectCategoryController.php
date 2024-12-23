<?php

namespace App\Http\Controllers;

use App\Models\ProjectCategory;
use Illuminate\Http\Request;

class ProjectCategoryController extends Controller
{
    public function index()
    {
        return response()->json(ProjectCategory::all(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $category = ProjectCategory::create($data);
        return response()->json($category, 201);
    }

    public function show($id)
    {
        $category = ProjectCategory::findOrFail($id);
        return response()->json($category, 200);
    }

    public function update(Request $request, $id)
    {
        $category = ProjectCategory::findOrFail($id);
        $data = $request->all();
        $category->update($data);
        return response()->json($category, 200);
    }

    public function destroy($id)
    {
        $category = ProjectCategory::findOrFail($id);
        $category->delete();
        return response()->json(['message' => 'Category deleted successfully'], 200);
    }
}
