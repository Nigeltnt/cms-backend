<?php

namespace App\Http\Controllers;

use App\Models\Specification;
use Illuminate\Http\Request;

class SpecificationController extends Controller
{
    public function index()
    {
        $specs = Specification::first();
        return view('admin.specs.index', compact('specs'));
    }

    public function store(Request $request)
    {
        
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
        ]);
        
        //dd($data);
        Specification::create($data);
        

        return redirect()->back()->with('success', 'Specifications section created successfully.');
    }

    public function update(Request $request, Specification $specs)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
        ]);

        $specs->update($data);

        return redirect()->back()->with('success', 'Specifications section updated successfully.');
    }
}

