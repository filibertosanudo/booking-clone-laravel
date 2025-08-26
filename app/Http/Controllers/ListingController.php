<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;
use App\Models\Category;

class ListingController extends Controller
{
    // Listings del usuario autenticado
    public function index()
    {
        $listings = Listing::with('categories', 'reviews')->get();
        return view('listings.index', compact('listings'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('listings.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category_ids' => 'array|exists:categories,id'
        ]);

        $listing = auth()->user()->listings()->create($validated);

        if (isset($validated['category_ids'])) {
            $listing->categories()->sync($validated['category_ids']);
        }

        return redirect()->route('listings.index')->with('success', 'Listing creado correctamente.');
    }

    public function show(Listing $listing)
    {
        $listing->load('categories', 'reviews.user');

        $userReview = auth()->check()
            ? $listing->reviews()->where('user_id', auth()->id())->first()
            : null;

        return view('listings.show', compact('listing', 'userReview'));
    }

    public function edit(Listing $listing)
    {
        $categories = Category::all();
        return view('listings.edit', compact('listing', 'categories'));
    }

     public function update(Request $request, Listing $listing)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category_ids' => 'array|exists:categories,id'
        ]);

        $listing->update($validated);

        if (isset($validated['category_ids'])) {
            $listing->categories()->sync($validated['category_ids']);
        }

        return redirect()->route('listings.index')->with('success', 'Listing actualizado correctamente.');
    }

    public function destroy(Listing $listing)
    {
        $listing->delete();
        return redirect()->route('listings.index')->with('success', 'Listing eliminado correctamente.');
    }

    public function buscar(Request $request)
    {
        $q = $request->get('q', '');
        $destinos = [];

        if (strlen($q) >= 2) {
            $destinos = Listing::where('location', 'like', "%{$q}%")
                ->select('location')
                ->distinct()
                ->limit(5)
                ->pluck('location'); // devuelve solo array plano
        }

        return response()->json($destinos);
    }
}
