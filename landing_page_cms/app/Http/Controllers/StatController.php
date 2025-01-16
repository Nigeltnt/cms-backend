<?php

namespace App\Http\Controllers;

use App\Models\Stat;
use Illuminate\Http\Request;

class StatController extends Controller
{
    public function index()
    {
        $stat = Stat::first();
        return view('admin.stat.index', compact('stat'));
    }

    public function store(Request $request, Stat $stat)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
        ]);

        $stat->create($data);

        return redirect()->back()->with('success', 'Stat section updated successfully.');
    }

    public function update(Request $request, Stat $stat)
    {
        //dd($sta);
        $stat = Stat::all()->first();
        
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
        ]);

        $stat->update($data);
        
        return redirect()->back()->with('success', 'Stat section updated successfully.');
    }
}

