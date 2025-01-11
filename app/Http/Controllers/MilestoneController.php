<?php

namespace App\Http\Controllers;

use App\Models\Grant;
use App\Models\Milestone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class MilestoneController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Gate::allows('isLeader') || Gate::allows('isStaff')) {
                return $next($request);
            }
            abort(403);
        });
    }
 
    public function index($grant_id)
    {
        $grant = Grant::findOrFail($grant_id);
        $milestones = $grant->milestones; 
        return redirect()->route('grants.index', ['grant_id' => $grant_id]);
    }

   
    public function create($grantId)
    {
        $grant = Grant::findOrFail($grantId);
        return view('milestones.create', compact('grant'));
    }

  
    public function store(Request $request, $grantId)
    {
        $request->validate([
            'milestone_name' => 'required|string|max:255',
            'target_completion_date' => 'required|date',
            'deliverable' => 'required|string|max:255',
        ]);

        $grant = Grant::findOrFail($grantId);

        $grant->milestones()->create([
            'milestone_name' => $request->milestone_name,
            'target_completion_date' => $request->target_completion_date,
            'deliverable' => $request->deliverable,
        ]);

        return redirect()->route('grants.show', $grantId)->with('success', 'Milestone created successfully');
    }

 
    public function edit($grantId, $milestoneId)
    {
        $grant = Grant::findOrFail($grantId);
        $milestone = $grant->milestones()->findOrFail($milestoneId);
        return view('milestones.edit', compact('grant', 'milestone'));
    }

    
    public function update(Request $request, $grantId, $milestoneId)
    {
       
        $request->validate([
            'status' => 'required|string|max:50',
            'remark' => 'nullable|string|max:500',
        ]);

        
        $milestone = Milestone::where('id', $milestoneId)
                              ->where('grant_id', $grantId)
                              ->firstOrFail();

        
        $milestone->update([
            'status' => $request->status,
            'remark' => $request->remark,
            'updated_at' => now(), 
        ]);

        return redirect()->route('grants.show', $grantId)
                         ->with('success', 'Milestone updated successfully.');
    }

   
    public function destroy($id)
    {
        $milestone = Milestone::findOrFail($id);
        $milestone->delete();

        return redirect()->back()->with('success', 'Milestone deleted successfully.');
    }
}
