<?php

namespace App\Http\Controllers;

use App\Models\Grant;
use App\Models\User;
use App\Models\Academician;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;

class GrantController extends Controller
{
    /**
     * Display a listing of the grants.
     *
     * @return \Illuminate\Contracts\View\View
     */
    
    public function index(): View
    {
        
        $grants = Grant::with('milestones', 'projectLeader')->get();
        return view('grants.index', compact('grants'));
    }

    public function create()
    {
        if (Gate::denies('isAdmin')) {
            abort(403);
        }

        $academicians = Academician::all();
        return view('grants.create', compact('academicians'));
    }
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'project_leader_id' => 'required|exists:academicians,id',
            'grant_amount' => 'required|string|max:255',
            'grant_provider' => 'required|string|max:255',
            'project_title' => 'required|string|max:255',
            'start_date' => 'required|date',
            'duration_months' => 'required|integer',
            'members' => 'required|array', 
            'members.*' => 'exists:academicians,id',
        ]);

       
        $grant = Grant::create([
            'project_leader_id' => $request->project_leader_id,
            'grant_amount' => $request->grant_amount,
            'grant_provider' => $request->grant_provider,
            'project_title' => $request->project_title,
            'start_date' => $request->start_date,
            'duration_months' => $request->duration_months,
        ]);

       
        $grant->members()->attach($request->members);

        return redirect()->route('grants.index')->with('success', 'Grant created successfully.');
    }

    public function edit(Grant $grant): View
    {
       
        $academicians = Academician::all();
        return view('grants.edit', compact('grant', 'academicians'));
    }

    public function update(Request $request, Grant $grant): RedirectResponse
    {

        $request->validate([
            'project_leader_id' => 'required|exists:academicians,id',
            'grant_amount' => 'required|string|max:255',
            'grant_provider' => 'required|string|max:255',
            'project_title' => 'required|string|max:255',
            'start_date' => 'required|date',
            'duration_months' => 'required|integer',
        ]);

        $grant->update([
            'project_leader_id' => $request->project_leader_id,
            'grant_amount' => $request->grant_amount,
            'grant_provider' => $request->grant_provider,
            'project_title' => $request->project_title,
            'start_date' => $request->start_date,
            'duration_months' => $request->duration_months,
        ]);

        return redirect()->route('grants.index')->with('success', 'Grant updated successfully.');
    }

    public function destroy(Grant $grant): RedirectResponse
    {
        if (Gate::denies('isAdmin') && Gate::denies('isLeader')) {
            abort(403);
        }
        $grant->milestones()->delete();
        $grant->delete();

        return redirect()->route('grants.index')->with('success', 'Grant deleted successfully.');
    }

    public function show($id): View
    {
        $grant = Grant::with('milestones', 'projectLeader', 'members')->findOrFail($id);

        $academicians = Academician::whereNotIn('id', function ($query) use ($grant) {
            $query->select('academician_id')
                ->from('grant_academician')
                ->where('grant_id', $grant->id);
        })->get();

        return view('grants.show', compact('grant', 'academicians'));
    }

    public function addMember(Request $request, $grantId): RedirectResponse
    {
        $request->validate([
            'academician_id' => 'required|exists:academicians,id',
        ]);

        $grant = Grant::findOrFail($grantId);

    
        if (!$grant->members()->where('academician_id', $request->academician_id)->exists()) {
            $grant->members()->attach($request->academician_id);
        }

        return redirect()->route('grants.show', $grantId)->with('success', 'Project member added successfully!');
    }
    public function removeMember(Grant $grant, Academician $academician)
    {
    
        $grant->members()->detach($academician->id);

       
        return redirect()->route('grants.show', $grant->id)
                         ->with('success', 'Member removed successfully');
    }
}
