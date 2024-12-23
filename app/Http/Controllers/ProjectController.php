<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        return response()->json(Project::with('category', 'user')->get(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'photo' => 'nullable|string',
            'project_category_id' => 'required|exists:project_categories,id',
            'start_date' => 'required|date',
            'user_id' => 'required|exists:users,id',
        ]);

        $project = Project::create($data);
        return response()->json($project, 201);
    }

    public function show($id)
    {
        $project = Project::with('category', 'user')->findOrFail($id);
        return response()->json($project, 200);
    }

    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);
        $data = $request->all();
        $project->update($data);
        return response()->json($project, 200);
    }

    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();
        return response()->json(['message' => 'Project deleted successfully'], 200);
    }
}
