<?php

namespace App\Http\Controllers;

use App\Models\Nursery;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NurseryController extends Controller
{
    /**
     * Searchable, filterable directory of nurseries.
     */
    public function index(Request $request): View
    {
        $query = Nursery::query();

        // Free-text search across bilingual names + city.
        if ($term = trim((string) $request->get('q'))) {
            $query->where(function ($q) use ($term) {
                $q->where('name_en', 'ilike', "%{$term}%")
                  ->orWhere('name_ar', 'ilike', "%{$term}%")
                  ->orWhere('city', 'ilike', "%{$term}%")
                  ->orWhere('district', 'ilike', "%{$term}%");
            });
        }

        // City filter.
        if ($city = $request->get('city')) {
            $query->where('city', $city);
        }

        // Attribute filters.
        if ($request->boolean('verified')) {
            $query->where('is_verified', true);
        }
        if ($request->boolean('bilingual')) {
            $query->where('is_bilingual', true);
        }

        $nurseries = $query->orderByDesc('is_verified')
            ->orderByDesc('rating')
            ->paginate(9)
            ->withQueryString();

        $cities = Nursery::query()->distinct()->orderBy('city')->pluck('city');

        return view('home', compact('nurseries', 'cities'));
    }

    public function show(Nursery $nursery): View
    {
        return view('nurseries.show', compact('nursery'));
    }
}
