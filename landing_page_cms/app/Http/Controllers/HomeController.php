<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NavBarSection;
use App\Models\HeroSection;
use App\Models\Stat;
use App\Models\AboutUs;
use App\Models\Accolade;
use App\Models\Specification;
use App\Models\Feature;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        $navBarSections = NavBarSection::all();
        $stats = Stat::all();
        $heroSection = HeroSection::all()->first();
        $aboutUs = AboutUs::all()->first();
        $accolades = Accolade::all();
        $features = Feature::all();
        $specks = Specification::all();
        $test = Testimonial::all();
        
        return view('home', compact('navBarSections', 'heroSection', 'stats', 'aboutUs', 'accolades', 'features', 'specks', 'test'));
    }
    
    public function contact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'message' => 'required'
        ]);
        
        // Add your contact form logic here
        
        return back()->with('success', 'Message sent successfully!');
    }
}