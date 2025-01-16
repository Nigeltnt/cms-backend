<?php

namespace App\Http\Controllers;

use App\Models\HeroSection;
use Illuminate\Http\Request;

class HeroSectionController extends Controller
{
    public function index()
    {
        $hero = HeroSection::first();
        return view('admin.hero.index', compact('hero'));
    }

    public function update(Request $request, HeroSection $hero)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'button_text' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            //$imagePath = $request->file('image')->store('hero_images', 'public');
            $image = $request->file('image');
            $imagePath = 'img/' . $image->getClientOriginalName(); // Define the path in public/img
            $image->move(public_path('img'), $image->getClientOriginalName()); // Move the file to public/img   
            $data['image'] = $imagePath;
        }

        $hero->update($data);

        return redirect()->back()->with('success', 'Hero section updated successfully.');
    }
}
