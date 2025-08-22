<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Listing;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    // Guardar nueva review
    public function store(Request $request, Listing $listing)
    {
        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string'
        ]);

        $listing->reviews()->create([
            'user_id' => auth()->id(),
            'rating' => $validated['rating'],
            'comment' => $validated['comment'] ?? ''
        ]);

        return redirect()->route('listings.show', $listing)->with('success', 'Review agregada correctamente.');
    }

    // Editar review (opcional, solo propio usuario)
    public function edit(Review $review)
    {
        $this->authorize('update', $review); // política
        return view('reviews.edit', compact('review'));
    }

    // Actualizar review
    public function update(Request $request, Review $review)
    {
        $this->authorize('update', $review); // política

        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string'
        ]);

        $review->update($validated);

        return redirect()->route('listings.show', $review->listing)->with('success', 'Review actualizada correctamente.');
    }

    // Eliminar review
    public function destroy(Review $review)
    {
        $this->authorize('delete', $review); // política
        $review->delete();
        return redirect()->route('listings.show', $review->listing)->with('success', 'Review eliminada correctamente.');
    }
}
