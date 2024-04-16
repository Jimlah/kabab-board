<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Tables\ProjectsTable;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Hybridly\Support\Header;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return hybridly('dashboard.projects.index', [
            'projects' => ProjectsTable::make(),
            'users' => User::query()
                ->select(['id', 'first_name', 'last_name'])
                ->whereHas('projects')
                ->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if (!$request->isHybrid()) {
            return redirect()->route('projects.index');
        }

        $project = new Project();
        return hybridly('dashboard.projects.create', compact('project'))
            ->base('dashboard.projects.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $project = Project::create([...$request->validated(), 'user_id' => auth()->id()]);
        session()->flash('success', 'Project created successfully.');
        return redirect()->route('projects.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project, Request $request)
    {
        if (!$request->isHybrid()) {
            return redirect()->route('projects.index');
        }
        return hybridly('dashboard.projects.create', compact('project'))
            ->base('dashboard.projects.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $project->update($request->validated());
        session()->flash('success', 'Project updated successfully.');
        return redirect()->route('projects.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }
}
