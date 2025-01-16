<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $testy = Testimonial::first();
        return view('admin.test.index', compact('testy'));
    }

    public function store(Request $request)
    {
        
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'testimony' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);
        
        //dd($data);
        Testimonial::create($data);
        

        return redirect()->back()->with('success', 'Testimonial section created successfully.');
    }

    public function update(Request $request, Testimonial $testy)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'testimony' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            //$imagePath = $request->file('image')->store('hero_images', 'public');
            $image = $request->file('image');
            $imagePath = 'img/' . $image->getClientOriginalName(); // Define the path in public/img
            $image->move(public_path('img'), $image->getClientOriginalName()); // Move the file to public/img   
            $data['image'] = $imagePath;
        }

        $testy->update($data);

        return redirect()->back()->with('success', 'Testimonial section updated successfully.');
    }
}

