<?php

namespace App\Http\Controllers;

use App\Models\Workshop;
use Illuminate\Http\Request;

class WorkshopController extends Controller
{
    public function index()
    {
        $workshops = Workshop::all();
        return view('workshops.index', compact('workshops'));
    }

    public function create()
    {
        return view('workshops.create');
    }

    public function store(Request $request)
    {
        Workshop::create($request->all());
        return redirect('workshops')->with('success', 'Workshop created successfully.');
    }

    public function edit($id)
    {
        $workshop = Workshop::findOrFail($id);
        return view('workshops.edit', compact('workshop'));
    }

    public function update(Request $request, $id)
    {
        $workshop = Workshop::findOrFail($id);
        $workshop->update($request->all());
        return redirect('workshops')->with('success', 'Workshop updated successfully.');
    }

    public function destroy($id)
    {
        $workshop = Workshop::findOrFail($id);
        $workshop->delete();
        return redirect('workshops')->with('success', 'Workshop deleted successfully.');
    }
}
