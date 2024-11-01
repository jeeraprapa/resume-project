<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Http\Request;
use Inertia\Inertia;

class InformationController extends Controller
{
    public function index()
    {
        return Inertia::render('Information/Index', [
            'information' => Information::all()
        ]);
    }

    public function create()
    {
        return Inertia::render('Information/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'job' => 'required',
            'email' => 'required',
            'phone' => 'required|numeric',
            'address' => 'required',
            'description' => 'nullable',
            'github' => 'nullable',
            'status' => 'nullable',
        ]);

        $information = new Information();
        $information->name = $request->name;
        $information->job = $request->job;
        $information->email = $request->email;
        $information->phone = $request->phone;
        $information->address = $request->address;
        $information->description = $request->description;
        $information->github = $request->github;
        $information->status = $request->status;
        $information->save();

        return response()->json(['message' => 'Information created!']);
    }

    public function edit($id)
    {
        $information = Information::find($id);
        return view('information', compact('information'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'job' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'description' => 'required',
            'github' => 'required',
            'status' => 'required',
        ]);

        $information = Information::find($id);
        $information->name = $request->name;
        $information->job = $request->job;
        $information->email = $request->email;
        $information->phone = $request->phone;
        $information->address = $request->address;
        $information->description = $request->description;
        $information->github = $request->github;
        $information->status = $request->status;
        $information->save();

        return redirect()->route('information.index');
    }

    public function destroy($id)
    {
        $information = Information::find($id);
        $information->delete();

        return redirect()->route('information.index');
    }
}
