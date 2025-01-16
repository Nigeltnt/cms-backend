<?php

namespace App\Http\Controllers;

use App\Models\Accolade;
use Illuminate\Http\Request;

class AccoladeController extends Controller
{
    public function index()
    {
        $acco = Accolade::first();
        return view('admin.acco.index', compact('acco'));
    }

    public function store(Request $request, Accolade $acco)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
            'color' => 'required|string|max:255',
        ]);

        $acco->create($data);

        return redirect()->back()->with('success', 'Accolades section created successfully.');
    }

    public function update(Request $request, Accolade $acco)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
            'color' => 'required|string|max:255',
        ]);

        $acco->update($data);

        return redirect()->back()->with('success', 'Accolades section updated successfully.');
    }
}

