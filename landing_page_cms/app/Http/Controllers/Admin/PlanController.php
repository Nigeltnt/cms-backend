<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index()
    {
        $plans = Plan::first();
        return view('admin.plans.index', compact('plans'));
    }

    public function store(Request $request, Plan $plans)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
            'image' => 'required|string|max:255',
        ]);

        $plans->create($data);

        return redirect()->back()->with('success', 'Plans section created successfully.');
    }

    public function update(Request $request, Plan $plans)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
            'image' => 'required|string|max:255',
        ]);

        $plans->update($data);

        return redirect()->back()->with('success', 'Plans section updated successfully.');
    }
}
