<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Webinar;


class WebinarController extends Controller
{
    public function index()
    {
        $webinars = Webinar::orderBy('date', 'asc')->get();
        return view('webinars.index', compact('webinars'));
    }
    public function create()
    {
        return view('webinars.create');
    }
    public function show(Webinar $webinar)
    {
        return view('webinars.show', compact('webinar'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'date' => 'required|date',
            'time' => 'required',
        ]);

        Webinar::create($request->all());
        return redirect()->route('webinars.index')->with('success', 'Webinar created successfully!');
    }

    public function edit(Webinar $webinar)
    {
        return view('webinars.edit', compact('webinar'));
    }

    public function update(Request $request, Webinar $webinar)
    {
        $request->validate([
             'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date',
            'time' => 'required',
            'link' => 'nullable|url',
        ]);

        $webinar->update($request->all());
        return redirect()->route('webinars.index')->with('success', 'Webinar updated successfully!');
    }

    public function destroy(Webinar $webinar)
    {
        $webinar->delete();
        return redirect()->route('webinars.index')->with('success', 'Webinar deleted successfully!');
    }
}
