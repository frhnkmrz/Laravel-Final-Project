<?php

namespace App\Http\Controllers;

use App\Models\Academician;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Gate;

class AcademicianController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Gate::allows('isAdmin') || Gate::allows('isLeader') || Gate::allows('isStaff')) {
                return $next($request);
            }
            abort(403);
        });
    }
    /**
     * Display a listing of the academicians with pagination.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        
        $academicians = Academician::paginate(10);
        return view('academicians.index', compact('academicians'));
    }

    /**
     * Show the form for creating a new academician.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        if (Gate::denies('isAdmin') && Gate::denies('isLeader')) {
            abort(403);
        }
        return view('academicians.create');
    }

    /**
     * Store a newly created academician in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate the input data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:academicians,email',
            'position' => 'required|string|max:255',
            'college' => 'required|string|max:255',
            'department' => 'required|string|max:255', 
            'staff_number' => 'required|string|max:255',
        ]);

        // Create a new academician
        Academician::create([
            'name' => $request->name,
            'email' => $request->email,
            'position' => $request->position,
            'college' => $request->college,
            'department' => $request->department,
            'staff_number' => $request->staff_number, 
        ]);

        
        return redirect()->route('academicians.index')->with('success', 'Academician created successfully.');
    }

    /**
     * Show the form for editing an academician.
     *
     * @param  \App\Models\Academician  $academician
     * @return \Illuminate\Http\Response
     */
    public function edit(Academician $academician): View
    {
        if (Gate::denies('isAdmin') && Gate::denies('isLeader')) {
            abort(403);
        }
        return view('academicians.edit', compact('academician'));
    }

    /**
     * Update the specified academician in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Academician  $academician
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Academician $academician): RedirectResponse
    {
       
        $request->validate([
            'name' => 'required|string|max:255',
            'staff_number' => 'required|string|unique:academicians,staff_number,' . $academician->id . '|max:255',
            'email' => 'required|email|unique:academicians,email,' . $academician->id,
            'college' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'position' => 'required|in:Professor,Assoc Prof,Senior Lecturer,Lecturer',
        ]);

        
        $academician->update([
            'name' => $request->name,
            'staff_number' => $request->staff_number,
            'email' => $request->email,
            'college' => $request->college,
            'department' => $request->department,
            'position' => $request->position,
        ]);

       
        return redirect()->route('academicians.index')->with('success', 'Academician updated successfully.');
    }

    /**
     * Remove the specified academician from the database.
     *
     * @param  \App\Models\Academician  $academician
     * @return \Illuminate\Http\Response
     */
    public function destroy(Academician $academician): RedirectResponse
    {
        if (Gate::denies('isAdmin') && Gate::denies('isLeader')) {
            abort(403);
        }
        
        $academician->delete();


        return redirect()->route('academicians.index')->with('success', 'Academician deleted successfully.');
    }
}
