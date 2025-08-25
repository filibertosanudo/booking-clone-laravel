@extends('layouts.app')

@section('content')
<div class="container mx-auto py-6">

    <h1 class="text-3xl font-bold mb-6">{{ $listing->title }}</h1>

    <div class="border rounded-lg p-4 mb-4 shadow hover:shadow-lg transition">

        <div class="flex justify-between items-center mb-2">
            <h2 class="text-xl font-semibold">{{ $listing->title }}</h2>
            <span class="text-gray-700 font-medium">${{ number_format($listing->price, 2) }}</span>
        </div>

        <p class="text-gray-800 mb-2">{{ $listing->description }}</p>

        <p class="text-gray-600 mb-2"><strong>Ubicación:</strong> {{ $listing->location }}</p>

        <p class="text-gray-600 mb-2"><strong>Publicado por:</strong> {{ $listing->user->name }}</p>

        <p class="text-gray-600 mb-2">
            <strong>Categorías:</strong>
            @foreach ($listing->categories as $category)
                <span class="inline-block bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-xs mr-1">
                    {{ $category->name }}
                </span>
            @endforeach
        </p>

        <p class="text-gray-600">
            <strong>Rating promedio:</strong>
            @php
                $avgRating = $listing->reviews->avg('rating');
                $countReviews = $listing->reviews->count();
            @endphp
            @if($countReviews > 0)
                {{ number_format($avgRating, 1) }} / 5 ({{ $countReviews }} reseñas)
            @else
                Sin reseñas
            @endif
        </p>

    </div>

</div>
@endsection
