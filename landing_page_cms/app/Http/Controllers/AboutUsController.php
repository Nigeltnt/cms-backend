<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index()
    {
        $about = AboutUs::first();

        if (!$about) {
            AboutUs::create([
                'title' => 'About Us',
                'subtitle' => 'Subtitle',
                'description' => 'Description',
                'bullet_points' => 'Bullet Points',
                'image' => 'img/default.jpg',
                'image2' => 'img/default.jpg',
            ]);
            $about = AboutUs::first();
        }
        return view('admin.aboutus.index', compact('about'));
    }

    public function update(Request $request, AboutUs $about)
    {
        $about = AboutUs::all()->first();
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'bullet_points' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = 'img/' . $image->getClientOriginalName(); // Define the path in public/img
            $image->move(public_path('img'), $image->getClientOriginalName()); // Move the file to public/img   
            $data['image'] = $imagePath; // Store the path in data array
        }
        
        if ($request->hasFile('image2')) {
            $image2 = $request->file('image2');
            $imagePath2 = 'img/' . $image2->getClientOriginalName(); // Define the path for the second image
            $image2->move(public_path('img'), $image2->getClientOriginalName()); // Move the second file
            $data['image2'] = $imagePath2; // Store the path for the second image
        }

        $about->update($data);

        return redirect()->back()->with('success', 'About Us section updated successfully.');
    }
}
