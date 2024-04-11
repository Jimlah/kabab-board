<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWorkflowRequest;
use App\Http\Requests\UpdateWorkflowRequest;
use App\Models\Project;
use App\Models\Workflow;
use Illuminate\Http\Request;

class WorkflowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Project $project)
    {
        return hybridly('dashboard.workflows.index', compact('project'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Project $project, Request $request)
    {
        if (!$request->isHybrid()) {
            return redirect()->route('projects.workflows.index', compact('project'));
        }
        $workflow = new Workflow();
        return hybridly('dashboard.workflows.create', compact('project', 'workflow'))
            ->base('dashboard.workflows.index', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWorkflowRequest $request, Project $project)
    {
        $project->workflows()->create($request->validated());
        session()->flash('success', 'Workflow created successfully.');
        return redirect()->route('projects.workflows.index', compact('project'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Workflow $workflow)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Workflow $workflow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWorkflowRequest $request, Workflow $workflow)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Workflow $workflow)
    {
        //
    }
}
