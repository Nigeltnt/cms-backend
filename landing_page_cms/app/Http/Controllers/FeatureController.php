<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Services\FeatureService;
use App\Http\Requests\Feature\FeatureCreateRequest;
use App\Models\Feature;
use App\Http\Traits\HasMedia;


class FeatureController extends Controller
{
    public function __construct(protected readonly FeatureService $featureService) {}

    public function index(): View
    {
        $features = Feature::all();
        return view('admin.features.index', compact('features'));
    }

    public function create(): View
    {
        return view('admin.features.create');
    }

    public function store(FeatureCreateRequest $request): RedirectResponse
    {
        $data = $request->validated();
        
        $feature = $this->featureService->create($data);
        $feature->addMedia($data['image']);

        return redirect()->route('admin.features.index')->with('success', 'Feature created successfully.');
    }

    public function edit(Feature $feature): View
    {
        return view('admin.features.edit', compact('feature'));
    }

    public function update(Feature $feature): RedirectResponse
    {
        $data = request()->validate([
            'title' => 'required|string|max:255',
            'html' => 'required|string',
            'image' => 'required|string|max:255',
        ]); //Move this to a request file

        $feature->update($data); // move this to the FeatureService service

        return redirect()->back()->with('success', 'Feature updated successfully.');
    }

    public function destroy(Feature $feature): RedirectResponse
    {
        $feature->delete();// move this to the FeatureService service
        return redirect()->back()->with('success', 'Feature deleted successfully.');
    }
}
